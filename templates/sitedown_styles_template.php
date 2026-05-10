<?php
/*
 * Sitedown Styles — Master Template (v2 architecture)
 *
 * SINGLE template that renders all 8 skins. The active skin CSS is loaded
 * via {SS_STYLE_CSS}. The HTML structure is semantic and skin-agnostic;
 * skins control look & feel via css/<style>.css overriding CSS variables
 * and adding decorative elements through ::before/::after pseudo-elements.
 *
 * Placeholders:
 *   - {SS_*}          — resolved by sitedown_styles_sitedown::buildVars()
 *   - {SITEDOWN_*}    — resolved by core (sitedown.php parseTemplate)
 *   - {SITENAME}, {LOGO}, {XURL_ICONS} — resolved by core
 *
 * @package sitedown_styles
 * @since   2.0.0
 */

if (!defined('e107_INIT') && !defined('SITEDOWN_PREVIEW_MODE')) { exit; }

$SITEDOWN_TEMPLATE = '<!DOCTYPE html>
<html lang="{SS_LANG}"{SS_DIR}>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>{SITEDOWN_TABLE_PAGENAME}</title>
    <link rel="icon" href="{SITEDOWN_FAVICON}" type="image/x-icon">
    <link rel="shortcut icon" href="{SITEDOWN_FAVICON}" type="image/x-icon">

    <!-- e107 / theme inherited CSS (resolved by core shortcodes) -->
    <link rel="stylesheet" href="{SITEDOWN_E107_CSS}">
    <link rel="stylesheet" href="{SITEDOWN_THEME_CSS}">
    <link rel="stylesheet" href="{SITEDOWN_SOCIAL_CSS}">

    <!-- Vendor: Bootstrap 5 + Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Sitedown Styles base + active skin -->
    <link href="{SS_BASE_CSS}" rel="stylesheet">
    <link href="{SS_STYLE_CSS}" rel="stylesheet">

    {SS_FONT_CSS}
    {SS_INLINE_VARS}
</head>
<body class="ss ss--{SS_STYLE}">
    {SS_DECOR}

    <div class="ss-stage">
        <div class="ss-card">

            <header class="ss-header ss-block">
                {SS_LOGO_BLOCK}
            </header>

            <main class="ss-main {SS_MAIN_MOD}">
                <section class="ss-left">
                    <div class="ss-block">{SS_BADGE_BLOCK}</div>
                    <div class="ss-block">{SS_TITLE_BLOCK}</div>
                    <div class="ss-block">{SS_DESCRIPTION_BLOCK}</div>
                    <div class="ss-block">{SS_FEATURES_BLOCK}</div>
                </section>
                <section class="ss-right">
                    <div class="ss-block">{SS_COUNTDOWN_BLOCK}</div>
                    <div class="ss-block">{SS_NEWSLETTER_BLOCK}</div>
                    <div class="ss-block">{SS_CONTACT_BLOCK}</div>
                    <div class="ss-block">{SS_EXTRA_BLOCK}</div>
                </section>
            </main>

            <footer class="ss-footer ss-block">
                {SS_SOCIAL_BLOCK}
                {SS_QUOTE_BLOCK}
            </footer>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {SS_COUNTDOWN_JS}
</body>
</html>';
