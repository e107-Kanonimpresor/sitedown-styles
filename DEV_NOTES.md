# Sitedown Styles — Developer Notes

> Last updated: **2026-05-10** (v2.0.0 release prep — feature-complete, entering maintenance mode).

This document is the **architectural memory** of `sitedown_styles`. The `README*.md` files explain *what* the plugin does; this file explains *why it is built the way it is*, what we deliberately did **not** do, and what to keep in mind when contributing.

It is modelled after the [chatbox plugin DEV\_NOTES](https://github.com/Jimako-e107-plugins/chatbox/blob/main/DEV_NOTES.md) — read that one too if you plan to contribute to several Jimako-e107 plugins.

---

## 1. Rewrite goals (high-level)

The 2.x line was a full rewrite of the original 1.x monolithic templates. Four parallel goals — **never mixed in a single PR**:

1. **Single master template + per-skin CSS** — kill the 8 monolithic `<style>_template.php` files. Centralise the semantic skeleton in `templates/sitedown_styles_template.php` (using `{SS_*}` placeholders) and let each of the 8 skins live entirely in `css/<style>.css`.
2. **Multilingual admin UI** with full EN / ES / PT-PT parity (target: `comm -23` → 0). All admin strings must exist in all three locales; no in-place strings in PHP.
3. **Theme integration cascade** — keep the e107 standard discovery order intact (`THEME/templates/sitedown_template.php` → `THEME/sitedown_template.php` → `e_CORE`). The plugin *plugs into* this chain via the stub in `theme_integration/sitedown_template.php`; it never short-circuits it.
4. **Cross-version compatibility** with both **e107 master** and **e107 2.3.x Lite** (Jimmi08 fork). Any admin handler API that exists only in master must be **runtime-guarded** with `method_exists()`.

---

## 2. File layout

```
sitedown_styles/
├── plugin.xml                  ← e107 manifest (prefs, admin links, screenshots)
├── plugin.php                  ← install / uninstall hooks (sitedown_styles_setup)
├── admin_config.php            ← admin UI (e_admin_dispatcher + e_admin_ui)
├── e_sitedown.php              ← core hook: builds $SITEDOWN_TABLE for sitedown.php
├── preview.php                 ← admin-only per-skin live preview
├── _opcache_reset.php          ← dev helper, NOT shipped behaviour
│
├── templates/
│   ├── sitedown_styles_template.php   ← single master template ({SS_*} placeholders)
│   └── admin_about_template.php       ← BS3 markup for admin About page
│
├── shortcodes/
│   └── sitedown_shortcodes.php ← {SITEDOWN_*} core-style shortcodes (front)
│
├── css/
│   ├── _base.css               ← ALL widget skeletons (.ss-services, .ss-metrics…)
│   └── <style>.css             ← 8 skins: agency / business / construction /
│                                 creative / gardening / handyman / marketing /
│                                 restaurant — colour, typography, decor only
│
├── js/
│   └── sitedown_styles.js      ← countdown, progress, behaviours
│
├── images/                     ← icons (16/32/128/256), skin previews
│
├── languages/
│   ├── English/
│   │   ├── English_admin.php   ← admin UI strings (LAN_PLUGIN_SITEDOWN_STYLES_*)
│   │   ├── English_front.php   ← front strings (visitor-facing)
│   │   └── English_global.php  ← shared (loaded everywhere)
│   ├── Spanish/  (same triplet)
│   └── Portuguese/  (same triplet)
│
├── theme_integration/
│   └── sitedown_template.php   ← copy-into-theme stub; calls e_sitedown::getTemplate()
│
├── sitedown_e107_prototipos/   ← raw HTML prototypes (reference for skin authors)
│
├── README.md / .es-ES.md / .pt-PT.md
├── CHANGELOG.md
├── DIAGNOSTICO_E107_SITEDOWN.md     ← integration-design rationale
├── GUIA_DESARROLLO_PLUGINS_E107.md  ← general e107-plugin author reference
└── DEV_NOTES.md                ← this file
```

### Key file decisions

- **No `e_help.php`.** Deprecated in modern e107. The admin Help sidebar is rendered inline by `renderHelp()` inside `admin_config.php` — see §3.4.
- **No `e_cron.php`, `e_event.php`, `e_notify.php`, `e_module.php`.** The plugin is a passive renderer; no scheduled tasks, no cross-plugin events. If you ever add countdown auto-disable or notify-on-deploy, add those files following [GUIA\_DESARROLLO\_PLUGINS\_E107.md](GUIA_DESARROLLO_PLUGINS_E107.md).
- **Language file convention** mirrors core e107: `_global` (loaded everywhere via `e107::lan('sitedown_styles', true, true)`), `_front` (only loaded by `e_sitedown::getTemplate()`), `_admin` (only loaded by `admin_config.php`). Keep them disjoint to minimise memory in front requests.

---

## 3. Architectural decisions (by theme)

### 3.1 Master template + per-skin CSS

**Decision**: one HTML skeleton, eight CSS skins.

`templates/sitedown_styles_template.php` defines a single `$SITEDOWN_TEMPLATE` HTML string with `{SS_*}` placeholders (`{SS_LOGO}`, `{SS_TITLE}`, `{SS_SUBTITLE}`, `{SS_FEATURES}`, `{SS_EXTRA}`, `{SS_DECOR}`, `{SS_COUNTDOWN}`, `{SS_PROGRESS}`, `{SS_NEWSLETTER}`, `{SS_SOCIAL}`, `{SS_CONTACT}`, …).

`e_sitedown::getTemplate()` calls `str_replace()` on those placeholders **before** handing the result to core's `$tp->parseTemplate(..., e107::getScBatch('sitedown'))`. So **two placeholder layers coexist on purpose**:

- `{SS_*}` — plugin-local, resolved by `processTemplate()`.
- `{SITEDOWN_*}`, `{SITENAME}`, … — core shortcodes, resolved later by e107.

If you add a placeholder, you must add it to **both** `processTemplate()` in `e_sitedown.php` **and** `processPreviewTemplate()` in `preview.php` — otherwise the live page and the admin preview will diverge. This is a recurring footgun; we explicitly call it out in `.github/copilot-instructions.md`.

### 3.2 Skin extension API (render hooks)

Skins should not need to ship their own template — they extend through three optional hooks on `sitedown_styles_sitedown`:

- `renderLogoBlock($style, $copy)` — custom brand markup (e.g. restaurant ornate icons).
- `renderFeaturesBlock($style, $copy)` — service chips, metrics, info-cards.
- `renderExtraBlock($style, $copy)` — secondary widgets (dashboards, progress bars, emergency boxes).
- `renderDecor($style, $copy)` — background and decorative layers.

Each hook receives the active style key and the merged `$copy` array (LAN defaults + admin overrides — see §3.5). They return raw HTML strings that get inlined into the master template. **Never echo from these methods** — return.

### 3.3 Three sources of HTML markup

When you need to produce HTML, pick the right source:

1. **PHP strings inside hook methods** (`renderFeaturesBlock`, etc.) — use only for small, tightly coupled fragments that depend on runtime data.
2. **Template files in `templates/`** — for any markup longer than ~10 lines or that a designer might want to tweak. Example: `templates/admin_about_template.php` is a pure BS3 chunk consumed by `admin_config.php::aboutPage()` via `strtr()` substitution.
3. **Shortcode return values** in `shortcodes/sitedown_shortcodes.php` — for tokens that core e107 must resolve at the end of the pipeline (`{SITEDOWN_MESSAGE}`, `{SITEDOWN_DATE}`, `{SITEDOWN_COUNTDOWN}`).

Do **not** mix sources for the same surface. The About page is rendered from a template; the admin Help sidebar is built in PHP — both choices are deliberate (the Help block is short and conditional; the About page is long and content-heavy).

### 3.4 Bootstrap: BS3 in admin, BS5 in front — strict

**Critical rule** — never violated:

- **e107 admin** (everything under `admin_config.php`, including the About page and the Help sidebar) is **Bootstrap 3 only**. Use `panel`, `panel-default`, `well`, `label-info`, `glyphicon glyphicon-*`, `col-md-*`. e107's admin theme does not load BS5; using BS5 utility classes silently breaks the layout.
- **Frontend templates** (everything under `templates/sitedown_styles_template.php` + the 8 skins) are **Bootstrap 5 only**. Use `card`, `badge`, `bi bi-*`, `col-md-*` (BS5 grid). BS5 + Bootstrap Icons are pulled from CDN inside each skin's `<style>` block — **no build step**.

If you find yourself wanting to "share" a class name between admin and front, you are about to break something. Don't.

### 3.5 Copy editor — admin-overridable strings without code edits

Each skin ships default strings via `LAN_PLUGIN_SITEDOWN_STYLES_COPY_*` constants (e.g. `LAN_PLUGIN_SITEDOWN_STYLES_COPY_AGENCY_TITLE`). The admin **Texts** page (`admin_config.php?mode=main&action=copy`) lets users override any of them per skin via prefs named `sitedown_copy_<style>_<field>`.

`getTplCopy($style)`:

1. Calls `getTplCopyDefaults($style)` → returns the LAN_* fallbacks.
2. Loops over the admin overrides and replaces non-empty values.
3. Returns the merged array consumed by every `render*Block()` hook and by `processTemplate()`.

**Never read the LAN constant directly inside a render hook.** Always go through `$copy['title']`, `$copy['cta_label']`, etc. This is what makes the Copy editor work.

### 3.6 Plugin preferences — always namespaced

All prefs live under `e107::getPlugConfig('sitedown_styles')`. We never write to core prefs (`e107::pref('core', ...)`). Defaults are declared in **two places that must stay in sync**:

- `<pluginPrefs>` in `plugin.xml` (used at install time by `sitedown_styles_setup::install_post`).
- `$prefs` in `admin_config.php` (the `e_admin_ui` schema — `type`, `data`, `tab`, `writeParms`, `help`).

If you add a new pref:

1. Add it to `<pluginPrefs>` in `plugin.xml`.
2. Add it to `$prefs` in `admin_config.php`.
3. Add the LAN_* labels in **all three locales** (EN/ES/PT).
4. Surface it through a getter on `sitedown_styles_sitedown` if templates or skins need to read it.

### 3.7 Cross-version compat — `method_exists()` guards

e107 master and e107 2.3.4 Lite have slightly different admin handler surfaces. The pattern: never assume a method exists on `e_admin_dispatcher` / `e_admin_ui` beyond what 2.3.4 Lite ships.

Concrete example — `appendBreadcrumbContext()` in `admin_config.php`:

```php
private function appendBreadcrumbContext($suffix)
{
    if (!method_exists($this, 'getMenuData') || !method_exists($this, 'setMenuData'))
    {
        return; // Lite 2.3.4 — silent no-op
    }
    // … master path
}
```

Lite 2.3.4 has `getMenuData()` but **not** `setMenuData()` → the breadcrumb suffix becomes a no-op there, while the full feature lights up on master. Same approach for any future API divergence.

### 3.8 Sitedown rendering pipeline (end-to-end)

This is the order of operations on a real maintenance-mode request. Memorise it before changing anything in `sitedown.php` or `e_sitedown.php`.

1. `sitedown.php` (root) sees `pref['maintainance_flag']` is on (note the historic typo).
2. Main admin (`getperms('0')`) bypasses the flag — useful for previewing without taking the site down.
3. Template discovery cascade:
   - `THEME/templates/sitedown_template.php`
   - `THEME/sitedown_template.php`
   - `e_CORE.'templates/sitedown_template.php'`
4. The first found file is `include`d and **must set `$SITEDOWN_TABLE`** (a string).
5. `sitedown.php` runs `$tp->parseTemplate($SITEDOWN_TABLE, true, e107::getScBatch('sitedown'))` to resolve core shortcodes.

Where `sitedown_styles` plugs in: the user copies `theme_integration/sitedown_template.php` into their active theme. That stub does:

```php
$styles = new sitedown_styles_sitedown();
$SITEDOWN_TABLE = $styles->getTemplate();
```

`getTemplate()` reads the master template, runs `processTemplate()` (resolves `{SS_*}`), and returns the string for the core to finish with `{SITEDOWN_*}` shortcodes.

### 3.9 Admin About + Help pattern

The admin Help sidebar is rendered by `renderHelp($action)` in `admin_config.php` — a single method that returns BS3 markup based on the current `$action`. It is wired by overriding `renderHelp()` on the `e_admin_ui` subclass. **No `e_help.php` file is needed** (and would be ignored by modern e107 anyway).

The About page (`?mode=main&action=about`) is the canonical example of the **template + controller separation** we want to follow for any future long admin page:

- `templates/admin_about_template.php` — pure BS3 HTML with `{ABOUT_*}` tokens.
- `aboutPage()` — controller: loads the template, builds the `$vars` array, runs `strtr($tpl, $vars)`, returns the result.

No business logic in the template; no markup in the controller.

### 3.10 Forward compatibility — e107 2.3.x Lite GitHub marketplace

[Lite issue #32](https://github.com/Jimmi08/e107-2.3.x-Lite/issues/32) replaces the e107.org Marketplace with a **GitHub-based Plugin & Theme Discovery** service. What it changes for us:

- A new central registry `pluginpack.xml` (shipped in `e107_plugins/`) lists approved repos with `<plugin organization repo folder branch name compatibility infourl>`.
- Per-plugin metadata is fetched live from `raw.githubusercontent.com/<org>/<repo>/<branch>/e107_plugins/<folder>/plugin.xml` — so **everything in our `plugin.xml` becomes the public spec sheet**: name, version, author, category, description, date, compatibility.
- Downloads will use `https://codeload.github.com/<org>/<repo>/zip/<branch>` — i.e. our git tag = the install artifact.
- A **new `<screenshot>` tag** (singular, aligned with `theme.xml`) is being added to `plugin.xml` for marketplace previews.

Already done in this plugin (v2.0.0 ready):

- ✅ `compatibility="2.3"` set in `plugin.xml`.
- ✅ Author block is current and uses a public URL.
- ✅ Both `<screenshots><image>…</image></screenshots>` (legacy) and `<screenshot>…</screenshot>` (new spec) are present — see `plugin.xml`. Drop the legacy block once Lite 2.3.x ships and master adopts the same change.
- ✅ Repository follows the layout the registry expects: plugin folder = `e107_plugins/sitedown_styles/`.

To do once the Lite changes land:

- Submit a PR to the central `pluginpack.xml` registry once the URL is published (sub-issue #38).
- If sub-issue #36 (update detection via remote `plugin.xml` fetch) goes live, make sure every release **bumps both `version` and `date`** in `plugin.xml` — the Update widget compares those.

Sub-issues #33–#39 of Lite #32 do not change anything we ship. The plugin install/uninstall flow, `plugin_handler.php`, and language pack download are explicitly **out of scope** for that overhaul.

---

## 4. Working conventions

### 4.1 Issue / PR discipline

One theme per issue, one issue per PR. Don't bundle "small fixes" with a refactor — they always become hard to review. The four §1 goals were each tracked as a separate epic.

### 4.2 Phased work

For any non-trivial change:

1. **Inventory** — list every file/string/pref the change touches. Open a draft PR with just the inventory comment.
2. **Design** — write the chosen approach in this file (or in DIAGNOSTICO when it's a bigger architectural call).
3. **Implementation** — code. Smallest possible diff that satisfies inventory + design.

### 4.3 Surface-by-surface, not file-by-file

When refactoring, work on one **user-visible surface** at a time (the front page; the Texts admin page; the About page). Don't open every file in `templates/` at once because they share names. The risk of skin drift is real — keep one skin perfect, then port the change to the other seven.

### 4.4 Minimal-diff discipline

Don't reformat code you didn't touch. Don't reorder array keys. Don't "improve" comments in unrelated files. Reviewers should be able to trust that every line of the diff is intentional.

### 4.5 Out-of-scope discipline

If you spot a bug while doing something else, **open an issue** — don't fix it in the same PR. Exceptions: trivial typos in strings you were already editing.

---

## 5. Known issues (intentional non-fixes)

These are documented here so nobody "fixes" them by accident.

- **License column in the Plugin Manager is empty.** This column is reserved by core for the marketplace price/license badge ("Free" / "$X") and is only populated for plugins fetched from the e107.org feed. Local plugins **cannot** populate it from `plugin.xml` — there is no XML tag for it. Will likely change with Lite #32 (GitHub registry); at that point we'll revisit.
- **`maintainance_flag` typo** (missing `e`) is core. Don't "fix" it in our code — every other plugin and the core itself reads the typo'd key.
- **PayPal donate URL must be the public form** (`donate/?hosted_button_id=…`), not the merchant management URL (`mep/donate/buttons/manage/…`). The admin Settings tab and the About page use the public form.
- **Two placeholder layers** (`{SS_*}` + `{SITEDOWN_*}`) — see §3.1. This is by design; do not flatten them into one.
- **`GUIA_DESARROLLO_PLUGINS_E107.md` still references "KreativeKey"** in one example block. That block is illustrative material about how to define an author; it is not a live config and is not consumed at runtime. Leave it or update with a TODO note — do **not** "search & replace" it across the doc, the surrounding prose depends on it.

---

## 6. Things to read

In order, when onboarding:

1. **`README.md`** (or your locale variant: `README.es-ES.md`, `README.pt-PT.md`) — what the plugin does and how to install it.
2. **This file** — the why behind the structure.
3. **`DIAGNOSTICO_E107_SITEDOWN.md`** — original integration-design rationale; explains why we plug into the theme cascade instead of replacing `sitedown.php`.
4. **`GUIA_DESARROLLO_PLUGINS_E107.md`** — general e107 plugin author reference (hooks list, admin UI patterns, BS3 rule, separation of concerns).
5. **`CHANGELOG.md`** — what changed between versions, with migration notes.
6. **The chatbox plugin's [DEV\_NOTES](https://github.com/Jimako-e107-plugins/chatbox/blob/main/DEV_NOTES.md)** — same author family, same conventions, more architectural depth around prefs migration and JS behaviours.
7. **[e107 2.3.x Lite issue #32](https://github.com/Jimmi08/e107-2.3.x-Lite/issues/32)** + sub-issues #33–#39 — the upcoming GitHub-based marketplace; affects how this plugin gets discovered and updated.
