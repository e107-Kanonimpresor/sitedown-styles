<?php
/*
 * Sitedown Styles Plugin - Template Preview (admin only)
 *
 * Renders the master template (templates/sitedown_styles_template.php)
 * for the requested skin without touching the live sitedown_active_style
 * pref (the override is applied in-memory only, not persisted).
 *
 * Usage: /e107_plugins/sitedown_styles/preview.php?style=<key>
 *        Valid keys: agency, business, construction, creative, gardening,
 *                    handyman, marketing, restaurant.
 *
 * @package sitedown_styles
 * @since   2.0.0
 */

$_E107['minimal']        = true;
$_E107['no_maintenance'] = true;

require_once('../../class2.php');

if (!ADMIN) {
    header('HTTP/1.1 403 Forbidden');
    exit('Access denied');
}

$tp    = e107::getParser();
$style = isset($_GET['style']) ? $tp->filter($_GET['style'], 'str') : '';

$validStyles = array('agency', 'business', 'construction', 'creative', 'gardening', 'handyman', 'marketing', 'restaurant');
if (!in_array($style, $validStyles, true)) {
    $style = 'agency';
}

define('SITEDOWN_PREVIEW_MODE', true);

require_once(e_PLUGIN . 'sitedown_styles/e_sitedown.php');

// Hot-patch runtime config (in-memory only, not saved).
$cfg = e107::getPlugConfig('sitedown_styles');
$cfg->set('sitedown_active_style', $style);

$handler = new sitedown_styles_sitedown();
$html    = $handler->getTemplate();

if ($html === '') {
    header('HTTP/1.1 500 Internal Server Error');
    exit('Master template missing or empty.');
}

$themeFavicon = (defined('THEME') && file_exists(e_THEME . basename(THEME) . '/favicon.ico'))
    ? THEME . 'favicon.ico'
    : SITEURL . 'favicon.ico';

$pageName = SITENAME . ' - ' . defset('LAN_SITEDOWN_TITLE', 'Site Maintenance')
    . ' [' . defset('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_BADGE', 'PREVIEW') . ': ' . ucfirst($style) . ']';

echo strtr($html, array(
    '{SITENAME}'                        => SITENAME,
    '{SITEURL}'                         => SITEURL,
    '{SITEDOWN_TABLE_PAGENAME}'         => $tp->toHTML($pageName, true),
    '{SITEDOWN_TABLE_MAINTAINANCETEXT}' => '',
    '{SITEDOWN_FAVICON}'                => $themeFavicon,
    '{SITEDOWN_E107_CSS}'               => '',
    '{SITEDOWN_THEME_CSS}'              => '',
    '{SITEDOWN_SOCIAL_CSS}'             => '',
));
