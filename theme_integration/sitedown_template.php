<?php
/*
 * Sitedown Styles Plugin - Theme Integration File
 *
 * INSTALLATION:
 * Copy this file to your theme's templates folder:
 *   e107_themes/YOUR_THEME/templates/sitedown_template.php
 *
 * This file hooks e107's sitedown system to use templates from the
 * Sitedown Styles plugin. The fallback below preserves e107's structural
 * placeholders so that even WITHOUT the plugin the maintenance page keeps:
 *   - Dynamic <html lang dir> (CORE_LC / TEXTDIRECTION)
 *   - <meta name="robots" content="noindex,nofollow">  (SEO during outage)
 *   - {SITEDOWN_FAVICON}, {SITEDOWN_TABLE_PAGENAME},
 *     {SITEDOWN_E107_CSS}, {SITEDOWN_THEME_CSS}, {SITEDOWN_SOCIAL_CSS},
 *     {SITEDOWN_TABLE_MAINTAINANCETEXT}, {LOGO: ...}, {XURL_ICONS: ...}
 *   so that core's $tp->parseTemplate(..., true, getScBatch('sitedown'))
 *   in /sitedown.php resolves them correctly.
 *
 * @package     sitedown_styles
 * @version     1.1
 */

if (!defined('e107_INIT')) { exit; }

// Check if the Sitedown Styles plugin is installed and active
$pluginPath = e_PLUGIN . 'sitedown_styles/e_sitedown.php';

if (file_exists($pluginPath)) {
    // Load the plugin's sitedown handler
    require_once($pluginPath);

    // Get the template from the plugin
    if (function_exists('sitedown_styles_get_template')) {
        $SITEDOWN_TABLE = sitedown_styles_get_template();
    } else {
        // Fallback if function doesn't exist
        $handler = new sitedown_styles_sitedown();
        $SITEDOWN_TABLE = $handler->getTemplate();
    }
} else {
    // Plugin not installed - structural fallback that still respects e107's
    // sitedown shortcode pipeline. Core /sitedown.php will resolve the
    // {SITEDOWN_*} and {LOGO}/{XURL_ICONS} placeholders below.
    $lang = defined('CORE_LC') ? CORE_LC : 'en';
    $dir  = (defined('TEXTDIRECTION') && TEXTDIRECTION === 'rtl') ? ' dir="rtl"' : '';

    $SITEDOWN_TABLE = '<!DOCTYPE html>
<html lang="' . $lang . '"' . $dir . '>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow">
    <title>{SITEDOWN_TABLE_PAGENAME}</title>
    <link rel="icon" href="{SITEDOWN_FAVICON}" type="image/x-icon">
    <link rel="shortcut icon" href="{SITEDOWN_FAVICON}" type="image/x-icon">
    <link rel="stylesheet" href="{SITEDOWN_E107_CSS}">
    <link rel="stylesheet" href="{SITEDOWN_THEME_CSS}">
    <link rel="stylesheet" href="{SITEDOWN_SOCIAL_CSS}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body.sitedown {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            color: #fff;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 20px;
            margin: 0;
        }
        .sitedown-wrap { max-width: 640px; }
        .sitedown-wrap h1 { font-size: 2.5rem; margin: 1rem 0; }
        .sitedown-wrap p  { color: #cfd5e1; font-size: 1.1rem; line-height: 1.7; }
        .sitedown-icon    { font-size: 4rem; margin-bottom: 1rem; }
        .sitedown-social  { margin-top: 2rem; }
    </style>
</head>
<body class="sitedown">
    <div class="sitedown-wrap">
        <div class="sitedown-icon">🔧</div>
        <div>{LOGO: h=180}</div>
        <h1>{SITENAME}</h1>
        <div>{SITEDOWN_TABLE_MAINTAINANCETEXT}</div>
        <div class="sitedown-social">{XURL_ICONS: type=facebook,twitter,instagram,linkedin&size=2x&tip-pos=bottom}</div>
    </div>
</body>
</html>';
}
