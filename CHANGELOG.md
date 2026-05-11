# Changelog

All notable changes to **Sitedown Styles** are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) and this project adheres to [Semantic Versioning](https://semver.org/).

---

## [2.2.0] — 2026-05-11

Continuation of the v2.1.0 4-layer refactor: the **About tab** is now built on
the same architecture, plugin metadata flows from a single source of truth, and
two legacy template filenames are aligned with the e107 plugin-slug convention.

### Added

- **`templates/sitedown_styles_about_template.php`** — Layer 2 of the About tab. Single HTML blob referencing `{LAN_PLUGIN_SS_ABOUT_*}` (translations) and `{SS_ABOUT_*}` (dynamic data).
- **`languages/<Lang>/<Lang>_admin_about.php`** in EN, ES, PT — Layer 3, lazy-loaded by `aboutPage()` (never paid for on other admin pages).
- **`shortcodes/batch/sitedown_styles_about_shortcodes.php`** — Layer 4, 9 dynamic getters (identity, metadata grid, button bar, year, license). Plugin identity injected via `$sc->setVars($this->getPluginInfo())`, so the sidebar widget and the About page stay in sync automatically.
- Generalized helper `sitedown_styles_ui::_resolveLans($html, $prefix)` reused by both `guidePage()` and `aboutPage()` (replaces the previous `_resolveHelpLans()` specific to `LAN_PLUGIN_SS_HELP_*`).

### Changed

- **Single source of truth for the version string.** `getPluginInfo()` now reads `version` and release `date` dynamically from `plugin.xml` via `e107::getPlug()->load('sitedown_styles')->getMeta()`. Future release bumps only need to touch `plugin.xml` + this file; the in-admin sidebar widget and About page update automatically.
- **About tab refactored to the 4-layer pattern** — `aboutPage()` shrank from a 90-line `strtr` chain to a thin orchestrator (lazy-load LAN, getTemplate + getScBatch + setVars, pre-pass + parseTemplate).
- **Two template files renamed** to follow the e107 plugin-slug convention (other plugins and core all prefix templates with the plugin folder name):
  - `templates/admin_copy_template.php` → `templates/sitedown_styles_copy_template.php`
  - `templates/admin_templates_template.php` → `templates/sitedown_styles_templates_template.php`
- All references in `admin_config.php` updated accordingly (4 occurrences).

### Removed

- `templates/admin_about_template.php` (legacy 7-chunk `strtr` template, replaced by the Layer-2 single-blob template above).
- 16 obsolete `LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_*` constants from each `<Lang>_admin.php` file (migrated to the new `<Lang>_admin_about.php` under the cleaner `LAN_PLUGIN_SS_ABOUT_*` namespace). The shared menu caption `LAN_PLUGIN_SITEDOWN_STYLES_ABOUT` and the sidebar `LAN_PLUGIN_SITEDOWN_STYLES_BTN_DOCS / SUPPORT / DONATE` constants are intentionally preserved.

### Verification

- `php -l` clean on all 12 touched / new files.
- No orphan references to the old constants (`LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_*`), the old method (`_resolveHelpLans`), or the renamed templates (`admin_copy_template.php`, `admin_templates_template.php`).
- README badges + `plugin.php` `@version` aligned with `plugin.xml` (`2.2.0`).

---

## [2.1.0] — 2026-05-11

Internal refactor of the in-admin **User Guide** to a clean 4-layer architecture.
Pure refactor: zero behavioural change for end users — existing settings, templates,
preview and rendering paths are untouched.

### Added

- **`docs/architecture/USER_GUIDE_PATTERN.md`** — full design document for the 4-layer pattern (Controller → Template → `<Lang>_admin_help.php` → Shortcode batch with logic only). Reusable as a proposal for e107 core (Phase B).
- **`languages/<Lang>/<Lang>_admin_help.php`** in EN, ES, PT — new convention modeled after the existing `<Lang>_admin.php` / `<Lang>_log.php` pattern. **Lazy-loaded** by `guidePage()`, so the cost is paid only when the user opens the Guide tab.
- **Live state badge** in the *Install* tab (`{SS_HELP_STUB_STATUS}`) — green when the theme integration stub is detected, red otherwise. Real example of "shortcode that exists because it has logic, not as a LAN proxy".
- **Dynamic shortcodes** with real responsibilities: `{SS_HELP_VERSION}`, `{SS_HELP_ACTIVE_THEME}`, `{SS_HELP_DETECTED_TEMPLATES}`.
- **Controller pre-pass** `_resolveHelpLans()` in `admin_config.php` that substitutes `{LAN_PLUGIN_SS_HELP_*}` tokens via `defined()` / `constant()` before the template reaches `parseTemplate()`. Keeps the template a single readable HTML blob and the LAN files free of markup.

### Changed

- **`shortcodes/batch/sitedown_styles_guide_shortcodes.php`** trimmed from 263 → 129 lines (−51%). 60+ proxy methods (each one a `return defset('LAN_…')`) deleted; only 4 methods with real runtime logic remain, plus 17 `sc_tok_*` literal-token escapers used inside the placeholder-reference table.
- **`languages/<Lang>/<Lang>_admin.php`** in EN, ES, PT trimmed from 442 → 246 lines (−44%). The 146 Guide-only LAN constants migrated out into the new `<Lang>_admin_help.php` files.
- **`admin_config.php::guidePage()`** now lazy-loads the help language pack and uses the new `LAN_PLUGIN_SS_HELP_TAB_*` constants for tab captions.
- **`templates/sitedown_styles_guide_template.php`** restructured to reference `{LAN_PLUGIN_SS_HELP_*}` directly (resolved by the controller pre-pass) and `{SS_HELP_*}` only for dynamic data. Two pre-existing template/LAN mismatches fixed in passing.

### Naming convention

- Help LAN constants: `LAN_PLUGIN_SS_HELP_<SECTION>_<KEY>` (replaces the legacy `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*`).
- Help shortcode tokens: `{SS_HELP_*}` — **reserved exclusively for dynamic logic**.

### Verification

- Cross-language parity: EN ≡ ES ≡ PT (146 + 4 LANs each, verified by `diff` exit 0).
- All 6 modified PHP files pass `php -l`.
- End-to-end runtime test: 0 missing constants, 0 raw `LAN_*` tokens leaking into the rendered output.

---

## [2.0.0] — 2026-05-04

Major architectural rewrite. Single master template + per-skin CSS files.

### Added

- **Master template architecture** — `templates/sitedown_styles_template.php` is a single semantic skeleton with `{SS_*}` placeholders shared by every skin.
- **Per-skin CSS files** in `css/<style>.css` (8 skins) plus shared `css/_base.css` that owns ALL widget skeletons (`.ss-services`, `.ss-services-grid`, `.ss-metrics`, `.ss-progress`, `.ss-emerg-box`, `.ss-dash-header`, `.ss-chart-section`, `.ss-stats-row`, `.ss-info-cards`).
- **Skin extension API** in `e_sitedown.php`:
  - `renderLogoBlock($style, $copy)` — custom brand markup (e.g. restaurant ornate icons).
  - `renderFeaturesBlock($style, $copy)` — service chips, metrics, info-cards…
  - `renderExtraBlock($style, $copy)` — secondary widgets (dashboards, progress, emergency boxes).
  - `renderDecor($style, $copy)` — background and decorative layers.
- **Copy editor** admin page (`admin_config.php?mode=main&action=copy`) — overrides per-skin `TPL_*` strings via `sitedown_copy_<style>_<field>` prefs without touching code or language files. Empty fields fall back to the LAN_* defaults.
- 13 new `LAN_PLUGIN_SITEDOWN_STYLES_COPY_*` constants (EN + ES).

### Changed

- All shared widget skeletons live in `css/_base.css`. Skins only override colours, fonts and decor.
- `getTplCopy()` refactored — defaults extracted to `getTplCopyDefaults()` and merged with admin overrides.
- Admin menu adds a 5th entry: **Texts** (between Settings and Preview).

### Fixed

- **Construction skin layout collapse** — widget skeletons centralised in `_base.css`.
- `.ss-card` overflow on dense skins — `overflow-y: auto` with `max-height: calc(100vh - …)`.

### Removed

- **8 legacy monolithic templates** (`templates/<style>_template.php`) — all rendering now goes through the master template.
- **`getTemplateV2()`** — folded into `getTemplate()`.
- **`processTemplate()`**, **`getDefaultTemplate()`**, **`getSharedLabels()`** — only used by the v1 path.
- **`pref['sitedown_use_master_template']`** and the `LAN_*_USE_MASTER` strings — no longer needed.
- **`?v2=` query override** in `preview.php` — the V1 fallback (`processPreviewTemplate()`, ~200 lines) is gone too. Preview always renders through the master template.
- **Cache-buster floor** (`$minVer = max(prefVer, …)`) — replaced with a straight read of `sitedown_css_version`.

### Migration notes (1.x → 2.x)

- **No action required.** Existing installs render through the master template automatically. The legacy fallback no longer exists; if you customised one of the 8 monolithic templates, port your changes to a skin CSS file (`css/<style>.css`) or to a `render*Block()` hook in `e_sitedown.php`.
- To customise visible texts, open admin → *Sitedown Styles* → **Texts** and override per skin.

---

## [1.1.0] — 2026-05-01

### Added
- **In-admin User Guide** (`main/guide`) with Bootstrap 5 tabs: Overview, Install, Configuration, Activation, Placeholders, Troubleshooting. Implements the pattern documented in `GUIA_DESARROLLO_PLUGINS_E107.md` (§ *Patrón: Guía de Usuario integrada en Admin*).
- Complete `LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_*` constants in `English_admin.php` and `Spanish_admin.php` (mirrored).
- Real plugin icons wired in `plugin.xml` (`adminLinks`): `images/web-optimization-16.png`, `web-optimization-32.png`, `web-optimization-128.png`. Screenshot updated to `images/web-optimization-256.png`.
- `README.es-ES.md` and `README.pt-PT.md` mirrored from the English README, including the Theme Integration and Troubleshooting sections.
- Theme integration step now explicitly documented in all three READMEs (the plugin alone does not hook the maintenance template — the stub must be copied into `THEME/templates/sitedown_template.php`).

### Changed
- Admin menu key renamed `main/settings` → `main/prefs` so the e107 framework auto-binds `PrefsObserver`/`PrefsSaveTrigger` and actually persists the preferences form.
- Admin menu now exposes 4 entries with proper Font Awesome icons: Templates (`fa-th`), Settings (`fa-cog`), Preview (`fa-eye`), Guide (`fa-book`).
- Template selection POST handler now validates the slug against the whitelist before saving.
- `init()` no longer enqueues a non-existent `css/admin.css`.

### Fixed
- **Fatal `Call to undefined method e107::load()`** in `admin_config.php` (line 20) — removed the dead `e107::load('sitedown_styles')` + `new sitedown_styles()` lines that referenced an inexistent class.
- **Fatal `Call to undefined method e_admin_ui::settingsPage()`** — replaced the broken `parent::settingsPage()` shim with direct delegation to the framework's `PrefsPage()` (then dropped the shim entirely after renaming the menu entry).
- **Fatal `Cannot access offset of type string on string`** in `e107_admin/plugin.php:773` during uninstall — caused by empty XML nodes in `plugin.xml` (`<userClasses></userClasses>`, `<extendedFields></extendedFields>`, `<dependencies></dependencies>`, `<siteLinks></siteLinks>`) being parsed as `""` strings under PHP 8+. All four nodes removed.
- **404 on `/e107_plugins/sitedown_styles/fa-paint-brush.glyph`** after login — the `adminLinks` `icon`/`iconSmall` attributes do not honor `.glyph` syntax; `e107_handlers/plugin_class.php::getIcon()` concatenates the value as a literal image path. Replaced with real PNG file references.
- Settings tab now actually persists changes (was rendering correctly but the framework save trigger never ran due to the wrong menu key).

### Removed
- Empty XML container tags from `plugin.xml` to avoid PHP 8+ parser quirks.
- Dead `e107::load()` invocation and unused `$sitedownStyles` instance variable.
- Custom `settingsPage()` shim (functionality now provided directly by the `main/prefs` action → `PrefsPage()`).

---

## [1.0.0] — 2025-01-09

### Added
- Initial release with 8 Bootstrap 5 maintenance templates: Agency Pro, Business Corp, BuilderPro, Creative Studio, GreenThumb, FixIt Pro, Growth Labs, Gourmet Table.
- Admin panel (`admin_config.php`) with template selector and preferences for content, countdown, progress bar, social links and contact info.
- Plugin sitedown handler (`e_sitedown.php` → `sitedown_styles_sitedown::getTemplate()`) producing the final HTML via two-layer placeholder substitution.
- Per-template admin preview at `/e107_plugins/sitedown_styles/preview.php?style=<key>` (admin-only, `SITEDOWN_PREVIEW_MODE` guard).
- Theme integration stub at `theme_integration/sitedown_template.php` to be copied into the active theme.
- English and Spanish admin language files.
- Documentation: `README.md`, `DIAGNOSTICO_E107_SITEDOWN.md`, `GUIA_DESARROLLO_PLUGINS_E107.md`.
