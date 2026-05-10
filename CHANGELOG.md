# Changelog

All notable changes to **Sitedown Styles** are documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/) and this project adheres to [Semantic Versioning](https://semver.org/).

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
