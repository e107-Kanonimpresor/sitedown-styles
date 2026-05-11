# User Guide Pattern — 4-Layer Architecture

> **Status:** Proposal v1 · **Scope:** internal refactor of `sitedown_styles` (Phase A)
> followed by submission to e107 core as a documentation/convention enhancement (Phase B).
> **Author:** Martin Costa (Kanonimpresor) · **Plugin:** `sitedown_styles` v2.x

---

## 1. Why this document exists

Several e107 plugins ship an **in-admin "User Guide"** (a tab inside the plugin's
admin page that explains install / configuration / troubleshooting without
forcing the user to leave the back-office). After auditing four real plugins —
`vstore` (CaMer0n, clean reference but no in-admin guide), `estate` (Vodhin,
archaic mixed concerns), `booking` (Kanonimpresor, mixed quality) and
`sitedown_styles` (this plugin, v1.x had the same proxy-shortcode anti-pattern) —
we found three recurring problems:

1. **Indirection without value.** Shortcode batches contain dozens of methods
   like `sc_xxx() { return defset('LAN_…', 'fallback'); }` — they are *not*
   shortcodes (no logic, no data composition), they are pure wrappers around a
   LAN constant. They double the maintenance surface for zero gain.
2. **Translatable strings carry HTML.** Constants store `'Browse to <code>...</code>'`
   instead of plain text. Translators end up touching markup, layout becomes
   un-themeable, and accessibility audits fail on copy-only changes.
3. **Help strings are loaded on every admin page.** The Guide tab can easily
   declare 70-100 LAN constants. e107 loads `<Lang>_admin.php` on **every**
   admin request — so users pay the memory/parser cost even when they never
   open the Guide tab.

This document defines the pattern that fixes all three at once and proposes a
new convention — `<Lang>_admin_help.php` — that other plugins (and eventually
e107 core itself) can adopt.

---

## 2. The 4 layers

```
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 1 — CONTROLLER                                                    │
│   admin_config.php :: guidePage()                                       │
│   • Lazy-loads the help language file                                   │
│   • Resolves dynamic data (paths, install state, current theme, …)      │
│   • Pre-pass: substitutes {LAN_PLUGIN_<NS>_HELP_*} via _resolveHelpLans │
│   • Pushes the array template through e107::getRender() / parseTemplate │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 2 — TEMPLATE                                                      │
│   templates/sitedown_styles_guide_template.php                          │
│   • Pure HTML structure. No PHP logic beyond array assignment.          │
│   • References LAN constants directly via {LAN_PLUGIN_SS_HELP_*}.       │
│   • References shortcodes ONLY when real logic is needed: {SS_HELP_*}   │
│   • Theme-overridable in the standard e107 way.                         │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 3 — LANGUAGE FILE  ← NEW CONVENTION                               │
│   languages/<Lang>/<Lang>_admin_help.php                                │
│   • Plain text only. NO HTML structure (inline <code>/<strong>/<em>     │
│     allowed for emphasis; no <div>/<ul>/<table>).                       │
│   • Loaded on demand by the controller, not on every admin request.     │
│   • Naming: LAN_PLUGIN_<PLUGIN>_HELP_<SECTION>_<KEY>                    │
└─────────────────────────────────────────────────────────────────────────┘
                              │
                              ▼
┌─────────────────────────────────────────────────────────────────────────┐
│ LAYER 4 — SHORTCODE BATCH                                               │
│   shortcodes/batch/sitedown_styles_help_shortcodes.php                  │
│   • ONLY methods with real responsibility:                              │
│       - dynamic data (paths, version, active theme name)                │
│       - state badges (✓ installed / ✗ missing)                          │
│       - generated lists (templates discovered on disk)                  │
│   • Target size: ≤ 10 sc_* methods. NEVER wrap a LAN constant.          │
└─────────────────────────────────────────────────────────────────────────┘
```

---

## 3. What goes where (decision matrix)

| Need                                                     | Layer            | Example                                                 |
| -------------------------------------------------------- | ---------------- | ------------------------------------------------------- |
| Static translatable label                                | Language file    | `LAN_PLUGIN_SS_HELP_OVERVIEW_TITLE`                     |
| Static translatable paragraph (with inline `<code>`)     | Language file    | `LAN_PLUGIN_SS_HELP_INSTALL_S2`                         |
| HTML layout (panels, grids, tables)                      | Template         | `<div class="bg-feature-card">…</div>`                  |
| Path computed at runtime (`THEME`, plugin dir)           | Shortcode        | `{SS_HELP_THEME_PATH}`                                  |
| State badge (file exists? pref set?)                     | Shortcode        | `{SS_HELP_STUB_STATUS}`                                 |
| List built from a directory scan / DB query              | Shortcode        | `{SS_HELP_DETECTED_TEMPLATES}`                          |
| Number / version pulled from `plugin.xml`                | Shortcode        | `{SS_HELP_VERSION}`                                     |
| Conditional callout (only show if X)                     | Controller       | `parseTemplate` of a sub-key chosen in PHP              |

**Rule of thumb:** if the only thing your `sc_xxx()` does is `return defset('LAN_X', '…');`,
delete it. Use `{LAN_X}` in the template — and let the controller's
`_resolveHelpLans()` pre-pass substitute it before `parseTemplate()` runs.

> ⚠️ **Important — `parseTemplate()` does NOT auto-resolve `{LAN_*}` tokens.**
> e107's `e_parse::parseTemplate()` only dispatches *shortcodes*; bare LAN
> tokens are silently dropped. The 4-layer pattern relies on a tiny pre-pass
> in the **Controller layer** to bridge that gap:
>
> ```php
> private function _resolveHelpLans($html)
> {
>     return preg_replace_callback(
>         '/\{(LAN_PLUGIN_<NS>_HELP_[A-Z0-9_]+)\}/',
>         static function ($m) {
>             return defined($m[1]) ? constant($m[1]) : $m[0];
>         },
>         $html
>     );
> }
> ```
>
> Why a pre-pass instead of concatenated PHP strings (`'…'.LAN_FOO.'…'`)?
> Because that approach forces raw HTML into language files — exactly what
> Layer 3 forbids. The pre-pass keeps the template a single readable HTML
> blob *and* keeps LAN constants pure text. Cost is one regex per tab,
> only when the user opens the Guide page.
>
> Tokens whose constant is undefined are left intact (`{LAN_PLUGIN_…}`)
> so missing translations show up loudly during development.

---

## 4. The `<Lang>_admin_help.php` convention

### 4.1 File location

```
e107_plugins/<plugin>/languages/<Lang>/<Lang>_admin_help.php
```

Mirrors the existing `<Lang>_admin.php` / `<Lang>_front.php` / `<Lang>_log.php`
convention. The suffix `_admin_help` makes the intent explicit: **strings
needed only inside the admin Guide tab**.

### 4.2 How to load it

```php
// admin_config.php — inside guidePage() or the Guide tab handler:
e107::lan('sitedown_styles', 'admin_help', true);
```

The third parameter (`true`) is the standard "admin context" flag e107 already
uses for `admin.php` files. The handler resolves to:

1. `e107_plugins/<plugin>/languages/<CurrentAdminLanguage>/<Lang>_admin_help.php`
2. fallback to `English/English_admin_help.php` if missing.

This is **lazy** — the file is only parsed when the user opens the Guide page.
Other admin requests pay nothing.

### 4.3 What goes inside

```php
<?php
if (!defined('e107_INIT')) { exit; }

// ─────────────────────────────────────────────────────────────────────────
// Tab labels
// ─────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SS_HELP_TAB_OVERVIEW',      'Overview');
define('LAN_PLUGIN_SS_HELP_TAB_INSTALL',       'Install');
// …

// ─────────────────────────────────────────────────────────────────────────
// Overview tab — body copy
// ─────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TITLE',    'Overview');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_P1',       'Sitedown Styles replaces the default e107 maintenance page with one of 8 Bootstrap 5 templates targeted at different business niches.');
// …
```

**Allowed inside strings:** plain text, inline `<code>`, `<strong>`, `<em>`,
HTML-encoded examples (`&lt;your_theme&gt;`).
**Forbidden inside strings:** structural HTML (`<div>`, `<ul>`, `<table>`,
`<button>`, `<span class="…">`). If you need structure, put it in the template.

### 4.4 Naming convention

```
LAN_PLUGIN_<PLUGIN>_HELP_<SECTION>_<KEY>

PLUGIN  = uppercase plugin slug, abbreviated if long  (SS for sitedown_styles)
SECTION = OVERVIEW | INSTALL | CONFIG | ACTIV | SC | TS | CREDITS | …
KEY     = TITLE | INTRO | P1 | S1 | NOTE | TIP | …
```

The short `SS_HELP_*` prefix is intentional: it avoids the 60-char prefix
pollution we suffered with `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*`.

---

## 5. What a clean shortcode batch looks like

```php
// shortcodes/batch/sitedown_styles_help_shortcodes.php
class plugin_sitedown_styles_sitedown_styles_help_shortcodes extends e_shortcode
{
    /** Detect whether the theme stub is installed. */
    public function sc_ss_help_stub_status()
    {
        $stub = THEME . 'templates/sitedown_template.php';
        if (is_file($stub)) {
            return '<span class="label label-success"><i class="fa fa-check"></i> '
                . LAN_PLUGIN_SS_HELP_STUB_OK . '</span>';
        }
        return '<span class="label label-danger"><i class="fa fa-times"></i> '
            . LAN_PLUGIN_SS_HELP_STUB_MISSING . '</span>';
    }

    /** Plugin version pulled from plugin.xml (cached by core). */
    public function sc_ss_help_version()
    {
        $info = e107::getPlugin()->getMeta('sitedown_styles');
        return e107::getParser()->toHtml($info['@attributes']['version'] ?? '?');
    }

    /** Active admin theme name — used in install instructions. */
    public function sc_ss_help_active_theme()
    {
        return e107::getParser()->toHtml(e107::getPref('sitetheme', 'bootstrap5'));
    }

    /** List of skin templates discovered on disk. */
    public function sc_ss_help_detected_templates()
    {
        $dir = e_PLUGIN . 'sitedown_styles/templates/';
        $found = glob($dir . '*_template.php') ?: [];
        $names = array_map(static function ($f) {
            return '<code>' . basename($f, '_template.php') . '</code>';
        }, $found);
        return $names ? implode(', ', $names) : LAN_PLUGIN_SS_HELP_NONE;
    }
}
```

**Target metrics for `sitedown_styles` after refactor:**

| Metric                                | Before   | After (target) |
| ------------------------------------- | -------- | -------------- |
| `sc_*` methods in guide batch          | 62       | ≤ 6            |
| LOC of the guide shortcode batch       | 263      | ≤ 80           |
| LANs loaded on every admin request     | ~70      | 0              |
| LANs loaded only on Guide tab          | 0        | ~70            |
| HTML strings inside language files     | many     | 0 structural   |

---

## 6. Migration recipe (Phase A — `sitedown_styles`)

1. **Create** `languages/English/English_admin_help.php`. Copy section 9 of
   `English_admin.php` into it. **Rename** every constant from
   `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*` to `LAN_PLUGIN_SS_HELP_*`. Strip
   structural HTML; keep inline `<code>/<strong>/<em>`.
2. **Mirror** the file to `Spanish/Spanish_admin_help.php` and
   `Portuguese/Portuguese_admin_help.php`.
3. **Delete** section 9 (and its v2 booking-pattern additions) from the three
   `<Lang>_admin.php` files.
4. **Edit** `admin_config.php` → in `guidePage()` (or the `getValues()` of the
   Guide controller), prepend:
   ```php
   e107::lan('sitedown_styles', 'admin_help', true);
   ```
5. **Rewrite** `templates/sitedown_styles_guide_template.php`:
   - Replace every `{SSG_FOO}` proxy with `{LAN_PLUGIN_SS_HELP_FOO}`.
   - Keep `{SS_HELP_*}` only where the new shortcode batch provides logic.
6. **Replace** `shortcodes/batch/sitedown_styles_guide_shortcodes.php` with the
   new lean `sitedown_styles_help_shortcodes.php` (≤ 6 methods). Delete the old
   file once the template stops referencing it.
7. **Smoke test**: open Admin → Sitedown Styles → User Guide in EN / ES / PT.
   Verify: tabs render, no missing-LAN warnings, no missing-shortcode warnings,
   page-load weight of other admin pages unchanged.

---

## 7. Phase B — proposing this to e107 core

Once Phase A is shipped in `sitedown_styles` v2.1.0 we open a discussion in
`e107inc/e107` (continuation of #5605) with:

- This document as the formal proposal.
- `sitedown_styles` as the working reference implementation.
- A patch to `e_handler::e107_lan_loader()` (only if needed) so the `'help'`
  context is documented and validated.
- Updates to `_blank` plugin to ship an empty `English_admin_help.php` template
  so future plugin authors discover the convention by copy-paste, the same way
  they discover `e_admin.php` / `e_cron.php` today.

---

## 8. Out of scope (explicit non-goals)

- **Front-end help.** This pattern is for the **admin** Guide tab only. Front-
  end help (e.g. tooltip strings on a public form) belongs in `<Lang>_front.php`.
- **Inline contextual help on form fields.** e107 already supports `'help'` in
  the `$prefs` array of `e_admin_ui` — that mechanism is unchanged and stays in
  `<Lang>_admin.php`.
- **Auto-generated documentation.** This proposal does NOT introduce a
  Markdown-to-HTML pipeline or any build step. Plugins remain drop-in.

---

## 9. Anti-patterns this proposal eliminates

```php
// ❌ DO NOT DO THIS — adds indirection, hides missing translations,
//    doubles maintenance surface, loads on every admin request.
public function sc_ssg_overview_title()
{
    return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_TITLE', 'Overview');
}
```

```html
<!-- ❌ DO NOT DO THIS — structural HTML inside a translation string. -->
define('LAN_PLUGIN_X_HELP_INSTALL', '<div class="alert"><strong>Note:</strong> copy <code>file.php</code></div>');
```

```php
// ✅ DO THIS — template owns the structure, language owns the words,
//    shortcode owns the dynamic part only.
$TPL['install'] = '
<div class="alert alert-info">
    <strong>{LAN_PLUGIN_SS_HELP_NOTE_LABEL}</strong>
    {LAN_PLUGIN_SS_HELP_INSTALL_S2}
    {SS_HELP_STUB_STATUS}
</div>';
```

---

## 10. Open questions (to be resolved during Phase A)

1. Should we also rename existing `LAN_PLUGIN_SITEDOWN_STYLES_*` constants to
   the shorter `LAN_PLUGIN_SS_*` form globally, or limit the rename to the new
   `*_HELP_*` family to keep the diff scoped? — **Tentative answer:** limit to
   `*_HELP_*` for v2.1.0; consider a global rename for v3.0.0.
2. Do we ship a back-compat shim that defines the old `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*`
   constants as aliases of the new ones, in case someone overrode them in a
   custom theme? — **Tentative answer:** no; the constants were never
   documented as a public API.
3. For the `e107::lan()` call, do we use `'admin_help'` as the context string
   or the shorter `'help'`? — **Tentative answer:** `'admin_help'` to be
   symmetrical with the existing `'admin'` context flag and make the file
   suffix self-documenting.
