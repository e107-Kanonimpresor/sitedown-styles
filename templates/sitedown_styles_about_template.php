<?php
/*
 * Sitedown Styles — Admin "About" page template (e107 array template).
 *
 * Architecture: 4-layer pattern documented in
 *   docs/architecture/USER_GUIDE_PATTERN.md
 *
 *   Layer 1 — Controller : admin_config.php :: aboutPage()
 *   Layer 2 — Template   : THIS FILE — pure HTML, references
 *                          {LAN_PLUGIN_SS_ABOUT_*}  (translations, Layer 3)
 *                          {SS_ABOUT_*}             (dynamic data, Layer 4)
 *   Layer 3 — Languages  : languages/<Lang>/<Lang>_admin_about.php
 *                          (LAZY-loaded by aboutPage())
 *   Layer 4 — Shortcodes : shortcodes/batch/sitedown_styles_about_shortcodes.php
 *                          (dynamic plugin metadata, button bar, year, …)
 *
 * Loaded by:  e107::getTemplate('sitedown_styles', 'sitedown_styles_about')
 * Theme override path:
 *   e107_themes/<theme>/templates/sitedown_styles/sitedown_styles_about_template.php
 *
 * NOTE: parseTemplate() in core does NOT auto-resolve LAN tokens — it only
 * dispatches shortcodes. The controller runs `_resolveLans()` (regex pre-pass)
 * to substitute {LAN_PLUGIN_SS_ABOUT_*} BEFORE handing the chunk off to
 * parseTemplate(). {SS_ABOUT_*} tokens flow through the parser as usual.
 *
 * Markup uses NATIVE e107 admin classes (Bootstrap 3 + e107 admin theme):
 *   panel/panel-* · row/col-md-6 · btn btn-* · media · label label-*
 * No custom CSS file is shipped — page inherits the e107 admin theme.
 */

if (!defined('e107_INIT')) { exit; }


$SITEDOWN_STYLES_ABOUT_TEMPLATE['body'] = '
<!-- ────────────────────────────────────────────────────────────────────
     1. Header card — identity (name + version + summary + release info)
     ──────────────────────────────────────────────────────────────────── -->
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <h3 style="margin-top:0">
                    <i class="fa fa-paint-brush"></i>
                    {SS_ABOUT_NAME}
                    <span class="label label-primary" style="vertical-align:middle">v{SS_ABOUT_VERSION}</span>
                </h3>
                <p class="text-muted" style="margin-bottom:0">{LAN_PLUGIN_SS_ABOUT_SUMMARY}</p>
            </div>
            <div class="col-sm-4 text-right">
                <p class="text-muted small" style="margin:0">
                    <i class="fa fa-calendar"></i> {LAN_PLUGIN_SS_ABOUT_RELEASED}: <strong>{SS_ABOUT_RELEASED}</strong><br>
                    <i class="fa fa-cube"></i> {SS_ABOUT_COMPAT}
                </p>
            </div>
        </div>
    </div>
</div>

<!-- ────────────────────────────────────────────────────────────────────
     2. Metadata grid — author / agency / contact / license
        Rows are rendered by {SS_ABOUT_METADATA_ROWS} because the row
        repetition is logic, not structure.
     ──────────────────────────────────────────────────────────────────── -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-id-card"></i> {LAN_PLUGIN_SS_ABOUT_METADATA}</div>
    <div class="panel-body">
        <div class="row">{SS_ABOUT_METADATA_ROWS}</div>
    </div>
</div>

<!-- ────────────────────────────────────────────────────────────────────
     3. Description card — extended description + changelog hint
     ──────────────────────────────────────────────────────────────────── -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-info-circle"></i> {LAN_PLUGIN_SS_ABOUT_DESCRIPTION}</div>
    <div class="panel-body">
        <p>{LAN_PLUGIN_SS_ABOUT_DESCRIPTION_BODY}</p>
        <hr>
        <p class="small text-muted" style="margin-bottom:0">
            <i class="fa fa-code-fork"></i> {LAN_PLUGIN_SS_ABOUT_CHANGELOG_HINT}
            <a href="{SS_ABOUT_CHANGELOG_URL}" target="_blank" rel="noopener">CHANGELOG.md</a>
        </p>
    </div>
</div>

<!-- ────────────────────────────────────────────────────────────────────
     4. Support card — intro + button bar (docs / bug / repo / …)
     ──────────────────────────────────────────────────────────────────── -->
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-life-ring"></i> {LAN_PLUGIN_SS_ABOUT_SUPPORT}</div>
    <div class="panel-body">
        <p class="text-muted">{LAN_PLUGIN_SS_ABOUT_SUPPORT_INTRO}</p>
        <p>{SS_ABOUT_BUTTONS}</p>
    </div>
</div>

<!-- ────────────────────────────────────────────────────────────────────
     5. Footer — copyright + license badge
     ──────────────────────────────────────────────────────────────────── -->
<div class="text-center text-muted small" style="margin-top:20px;padding-top:10px;border-top:1px solid #eee">
    &copy; {SS_ABOUT_YEAR} {SS_ABOUT_AGENCY} &middot; {LAN_PLUGIN_SS_ABOUT_RELEASED_UNDER}
    <a href="{SS_ABOUT_LICENSE_URL}" target="_blank" rel="noopener">{SS_ABOUT_LICENSE}</a>
</div>
';
