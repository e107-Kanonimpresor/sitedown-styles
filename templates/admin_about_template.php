<?php
/**
 * Sitedown Styles — Admin "About" page template.
 *
 * Defines a set of HTML chunks consumed by
 * `sitedown_styles_ui::aboutPage()`.
 *
 * Placeholder convention: {ALL_CAPS_KEYS} resolved with a single str_replace
 * pass in the controller (no shortcode batch needed).
 *
 * All markup uses NATIVE e107 admin classes (Bootstrap 3 utilities + e107
 * admin theme) so it inherits the same look as the rest of the panel:
 *   - `panel panel-default` / `panel-heading` / `panel-body` for cards
 *   - `row` / `col-md-6` for the metadata grid
 *   - `btn btn-*` for buttons
 *   - `text-right` / `pull-right` / `text-muted` / `text-center` for layout
 *   - `media` / `media-left` / `media-body` for icon+text rows
 *   - `label label-*` for the version badge (BS3 equivalent of BS5 badge)
 *
 * No custom CSS file is shipped — the page is fully styled by e107's admin
 * theme stylesheet.
 */
if (!defined('e107_INIT')) { exit; }

// ---------------------------------------------------------------------------
// 1. Header card — identity (name + version + summary + release/compat info)
// ---------------------------------------------------------------------------
$ADMIN_ABOUT_HEADER = '
<div class="panel panel-primary">
    <div class="panel-body">
        <div class="row">
            <div class="col-sm-8">
                <h3 style="margin-top:0">
                    <i class="fa fa-paint-brush"></i>
                    {NAME}
                    <span class="label label-primary" style="vertical-align:middle">v{VERSION}</span>
                </h3>
                <p class="text-muted" style="margin-bottom:0">{SUMMARY}</p>
            </div>
            <div class="col-sm-4 text-right">
                <p class="text-muted small" style="margin:0">
                    <i class="fa fa-calendar"></i> {LBL_RELEASED}: <strong>{RELEASED}</strong><br>
                    <i class="fa fa-cube"></i> {COMPAT}
                </p>
            </div>
        </div>
    </div>
</div>';

// ---------------------------------------------------------------------------
// 2. Metadata card — 2-column grid of key facts (author, agency, …)
// ---------------------------------------------------------------------------
$ADMIN_ABOUT_METADATA = '
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-id-card"></i> {LBL_METADATA}</div>
    <div class="panel-body">
        <div class="row">{META_ROWS}</div>
    </div>
</div>';

$ADMIN_ABOUT_META_ROW = '
<div class="col-md-6" style="margin-bottom:15px">
    <div class="media">
        <div class="media-left media-middle">
            <span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
                <i class="fa {ICON}"></i>
            </span>
        </div>
        <div class="media-body">
            <small class="text-muted text-uppercase">{LABEL}</small><br>
            <strong>{VALUE}</strong>
        </div>
    </div>
</div>';

// ---------------------------------------------------------------------------
// 3. Description card — extended description + changelog hint
// ---------------------------------------------------------------------------
$ADMIN_ABOUT_DESCRIPTION = '
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-info-circle"></i> {LBL_DESCRIPTION}</div>
    <div class="panel-body">
        <p>{DESCRIPTION}</p>
        <hr>
        <p class="small text-muted" style="margin-bottom:0">
            <i class="fa fa-code-fork"></i> {LBL_CHANGELOG_HINT}
            <a href="{CHANGELOG_URL}" target="_blank" rel="noopener">CHANGELOG.md</a>
        </p>
    </div>
</div>';

// ---------------------------------------------------------------------------
// 4. Support card — intro + button bar (docs / bug / repo / changelog / …)
// ---------------------------------------------------------------------------
$ADMIN_ABOUT_SUPPORT = '
<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-life-ring"></i> {LBL_SUPPORT}</div>
    <div class="panel-body">
        <p class="text-muted">{SUPPORT_INTRO}</p>
        <p>{BUTTONS}</p>
    </div>
</div>';

$ADMIN_ABOUT_BUTTON = '<a href="{URL}" target="_blank" rel="noopener" class="btn {CLASS}" style="margin-right:6px;margin-bottom:6px">
    <i class="fa {ICON}"></i> {LABEL}
</a>';

// ---------------------------------------------------------------------------
// 5. Footer — copyright + license badge (always last)
// ---------------------------------------------------------------------------
$ADMIN_ABOUT_FOOTER = '
<div class="text-center text-muted small" style="margin-top:20px;padding-top:10px;border-top:1px solid #eee">
    &copy; {YEAR} {AGENCY} &middot; {LBL_RELEASED_UNDER}
    <a href="{LICENSE_URL}" target="_blank" rel="noopener">{LICENSE}</a>
</div>';
