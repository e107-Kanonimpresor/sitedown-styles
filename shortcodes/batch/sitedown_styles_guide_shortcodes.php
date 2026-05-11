<?php
/*
 * Sitedown Styles — In-Admin User Guide shortcode batch.
 *
 * Architectural contract (see docs/architecture/USER_GUIDE_PATTERN.md):
 *   - This batch ONLY exposes shortcodes that REQUIRE LOGIC: dynamic data,
 *     state badges, paths computed at runtime, lists built from disk scans.
 *   - Translatable text is NEVER wrapped here. Templates use {LAN_PLUGIN_SS_HELP_*}
 *     directly — e_parse::parseTemplate() resolves LAN tokens natively.
 *   - Naming convention: methods prefixed sc_ss_help_<name> → tokens {SS_HELP_<NAME>}.
 *
 * Loaded by:
 *   $sc = e107::getScBatch('sitedown_styles_guide', 'sitedown_styles');
 *
 * The class name MUST match the e107 convention:
 *   plugin_<plugin>_<batch>_shortcodes
 *   = plugin_sitedown_styles_sitedown_styles_guide_shortcodes
 */

if (!defined('e107_INIT')) { exit; }

class plugin_sitedown_styles_sitedown_styles_guide_shortcodes extends e_shortcode
{
    public $override = false;


    // ─────────────────────────────────────────────────────────────────────
    // Dynamic data (paths, version, theme, file-system state)
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Plugin version pulled from plugin.xml at runtime.
     * Token: {SS_HELP_VERSION}
     */
    public function sc_ss_help_version()
    {
        $info = e107::getPlug()->load('sitedown_styles')->getMeta();

        $version = is_array($info) && !empty($info['@attributes']['version'])
                 ? $info['@attributes']['version']
                 : '?';

        return e107::getParser()->toHtml($version, false, 'defs');
    }

    /**
     * Active theme name (used in install instructions).
     * Token: {SS_HELP_ACTIVE_THEME}
     */
    public function sc_ss_help_active_theme()
    {
        $theme = e107::getPref('sitetheme');

        return $theme
             ? e107::getParser()->toHtml($theme, false, 'defs')
             : '<em>' . defset('LAN_PLUGIN_SS_HELP_NONE', 'unknown') . '</em>';
    }

    /**
     * State badge: is the theme integration stub installed in the active theme?
     * Token: {SS_HELP_STUB_STATUS}
     */
    public function sc_ss_help_stub_status()
    {
        $stub = THEME . 'templates/sitedown_template.php';

        if (is_file($stub)) {
            return '<span class="label label-success"><i class="fa fa-check"></i> '
                 . defset('LAN_PLUGIN_SS_HELP_STUB_OK', 'Theme stub detected')
                 . '</span>';
        }

        return '<span class="label label-danger"><i class="fa fa-times"></i> '
             . defset('LAN_PLUGIN_SS_HELP_STUB_MISSING', 'Theme stub NOT installed')
             . '</span>';
    }

    /**
     * Comma-separated list of skin templates discovered on disk.
     * Token: {SS_HELP_DETECTED_TEMPLATES}
     */
    public function sc_ss_help_detected_templates()
    {
        $found = glob(e_PLUGIN . 'sitedown_styles/templates/*_template.php') ?: array();

        $skins = array();
        foreach ($found as $path) {
            $slug = basename($path, '_template.php');
            // Skip the master / admin / preview templates — only public skins.
            if (in_array($slug, array('sitedown_styles', 'admin_templates', 'admin_copy', 'admin_about', 'sitedown_styles_guide'), true)) {
                continue;
            }
            $skins[] = '<code>' . $slug . '</code>';
        }

        return $skins
             ? implode(', ', $skins)
             : '<em>' . defset('LAN_PLUGIN_SS_HELP_NONE', 'none detected') . '</em>';
    }


    // ─────────────────────────────────────────────────────────────────────
    // Literal placeholder tokens (rendered verbatim inside the docs).
    //
    // Without these, $tp->parseTemplate would try to resolve the {SITEDOWN_*}
    // tokens shown as code samples in the Placeholders tab. Returning the
    // literal string is the canonical e107 way to "escape" a placeholder
    // for documentation purposes.
    // ─────────────────────────────────────────────────────────────────────

    public function sc_tok_title()             { return '{SITEDOWN_STYLES_TITLE}'; }
    public function sc_tok_subtitle()          { return '{SITEDOWN_STYLES_SUBTITLE}'; }
    public function sc_tok_logo()              { return '{SITEDOWN_STYLES_LOGO}'; }
    public function sc_tok_countdown()         { return '{SITEDOWN_STYLES_COUNTDOWN}'; }
    public function sc_tok_countdown_js()      { return '{SITEDOWN_STYLES_COUNTDOWN_JS}'; }
    public function sc_tok_progress()          { return '{SITEDOWN_STYLES_PROGRESS}'; }
    public function sc_tok_newsletter()        { return '{SITEDOWN_STYLES_NEWSLETTER}'; }
    public function sc_tok_social()            { return '{SITEDOWN_STYLES_SOCIAL}'; }
    public function sc_tok_phone()             { return '{SITEDOWN_STYLES_PHONE}'; }
    public function sc_tok_email()             { return '{SITEDOWN_STYLES_EMAIL}'; }

    public function sc_tok_sitename()          { return '{SITENAME}'; }
    public function sc_tok_siteurl()           { return '{SITEURL}'; }
    public function sc_tok_sitedown_text()     { return '{SITEDOWN_TABLE_MAINTAINANCETEXT}'; }
    public function sc_tok_sitedown_pagename() { return '{SITEDOWN_TABLE_PAGENAME}'; }
    public function sc_tok_sitedown_favicon()  { return '{SITEDOWN_FAVICON}'; }
    public function sc_tok_logo_helper()       { return '{LOGO: h=180}'; }
    public function sc_tok_xurl_icons()        { return '{XURL_ICONS: ...}'; }
}
