<?php
/*
 * Sitedown Styles — Admin User Guide shortcode batch.
 *
 * Each sc_xxx() method becomes {XXX} in templates/sitedown_styles_guide_template.php.
 *
 * e107 conventions:
 *   - Loaded with:  e107::getScBatch('sitedown_styles_guide', 'sitedown_styles')
 *   - Class name:   plugin_<plugin>_<batch>_shortcodes
 *   - Used with:    $tp->parseTemplate($template, true, $sc)
 *
 * Tokens map to LAN constants in
 *   languages/<Lang>/<Lang>_admin.php (section "9. In-Admin User Guide")
 * with English fallbacks via defset() so the page never breaks.
 */

if (!defined('e107_INIT')) { exit; }

class plugin_sitedown_styles_sitedown_styles_guide_shortcodes extends e_shortcode
{
    public $override = false;

    // ─────────────────────────────────────────────────────────────────────
    // Reusable inline labels (no LAN dependency required)
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_label_no_build()        { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_NO_BUILD', 'No build step'); }
    public function sc_ssg_label_theme_required()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_THEME_REQ', 'Theme stub required'); }
    public function sc_ssg_label_templates()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_TEMPLATES', 'templates'); }
    public function sc_ssg_label_templates_desc()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_TEMPLATES_DESC', 'Bootstrap 5 skins ready for different business niches.'); }
    public function sc_ssg_label_quick_start()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_QUICK_START', 'Quick start'); }
    public function sc_ssg_label_highlights()      { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_HIGHLIGHTS', 'Highlights'); }
    public function sc_ssg_label_install()         { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_INSTALL', 'Install plugin'); }
    public function sc_ssg_label_pick_template()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_PICK_TPL', 'Pick template'); }
    public function sc_ssg_label_customize()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_CUSTOMIZE', 'Customize'); }
    public function sc_ssg_label_activate()        { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_ACTIVATE', 'Activate'); }

    // ─────────────────────────────────────────────────────────────────────
    // OVERVIEW
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_overview_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_TITLE', 'Overview'); }
    public function sc_ssg_overview_p1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_P1', 'Sitedown Styles replaces the default e107 maintenance page with one of 8 Bootstrap 5 templates targeted at different business niches.'); }
    public function sc_ssg_overview_tip()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_TIP', 'Templates are pure HTML/CSS with embedded styles — no build step required.'); }
    public function sc_ssg_overview_warn()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_WARN', 'Installing the plugin alone is NOT enough: you must also copy the theme integration stub (see Install tab).'); }

    // ─────────────────────────────────────────────────────────────────────
    // INSTALL
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_install_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_TITLE', 'Installation'); }
    public function sc_ssg_install_s1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S1', 'Install the plugin from Admin → Plugin Manager.'); }
    public function sc_ssg_install_s2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S2', 'Copy the theme integration stub into your active theme.'); }
    public function sc_ssg_install_s3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S3', 'Open the Templates tab and pick a style.'); }
    public function sc_ssg_install_s4()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S4', 'Configure content, countdown, social and contact info.'); }
    public function sc_ssg_install_s5()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S5', 'Activate Maintenance Mode in Admin → Users.'); }
    public function sc_ssg_install_note()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_NOTE', 'Main Admin (perm 0) sees the maintenance page directly even when the flag is OFF.'); }

    // ─────────────────────────────────────────────────────────────────────
    // INSTALL — Theme integration step-by-step (non-technical users)
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_theme_title()             { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TITLE', 'Theme integration step by step'); }
    public function sc_ssg_theme_intro()             { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_INTRO', 'Sitedown Styles needs ONE small file copied into your active theme. This bridge tells e107 to render the maintenance page using one of the 8 templates of this plugin instead of the default page. Without this step the templates will not appear, no matter how many you preview.'); }

    // Source file panel
    public function sc_ssg_theme_file_heading()        { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FILE_HEADING', 'The file you need to copy'); }
    public function sc_ssg_theme_file_desc()           { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FILE_DESC', 'It ships with this plugin — you do NOT need to write or download anything. Just copy this exact file:'); }
    public function sc_ssg_theme_file_location_label() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FILE_LOCATION_LABEL', 'Source location (relative to your e107 root):'); }

    // Target file panel
    public function sc_ssg_theme_target_heading() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TARGET_HEADING', 'Where to copy it'); }
    public function sc_ssg_theme_target_desc()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TARGET_DESC', 'Paste the file inside the <code>templates</code> folder of your active theme:'); }
    public function sc_ssg_theme_target_hint()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TARGET_HINT', 'If the <code>templates</code> folder does not exist, create it. Keep the file name exactly as <code>sitedown_template.php</code>.'); }
    public function sc_ssg_theme_find_theme()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FIND_THEME', 'Not sure which theme is active? Check Admin → Themes — the active one has a green badge.'); }

    // Methods
    public function sc_ssg_theme_methods_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_METHODS_TITLE', 'Three ways to copy the file'); }
    public function sc_ssg_theme_methods_intro() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_METHODS_INTRO', 'Pick whichever method matches the access you have to your hosting:'); }

    // Method 1: FTP / SFTP
    public function sc_ssg_theme_m1_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_TITLE', 'Method 1 — FTP / SFTP client (FileZilla, WinSCP, Cyberduck…)'); }
    public function sc_ssg_theme_m1_s1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S1', 'Connect to your hosting with your FTP credentials.'); }
    public function sc_ssg_theme_m1_s2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S2', 'Browse to <code>e107_plugins/sitedown_styles/theme_integration/</code>, right-click <code>sitedown_template.php</code> and choose <strong>Download</strong>.'); }
    public function sc_ssg_theme_m1_s3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S3', 'Browse to <code>e107_themes/&lt;your_theme&gt;/templates/</code> (create the <code>templates</code> folder if missing).'); }
    public function sc_ssg_theme_m1_s4()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S4', 'Drag the file from your computer into that folder. Done.'); }

    // Method 2: hosting File Manager (cPanel / Plesk / Hostinger…)
    public function sc_ssg_theme_m2_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_TITLE', 'Method 2 — Hosting File Manager (cPanel, Plesk, Hostinger, etc.)'); }
    public function sc_ssg_theme_m2_s1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S1', 'Log in to your hosting control panel and open the File Manager.'); }
    public function sc_ssg_theme_m2_s2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S2', 'Go to <code>e107_plugins/sitedown_styles/theme_integration/</code>, select <code>sitedown_template.php</code> and click <strong>Copy</strong>.'); }
    public function sc_ssg_theme_m2_s3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S3', 'Set the destination to <code>e107_themes/&lt;your_theme&gt;/templates/</code> (create the folder if missing) and confirm.'); }
    public function sc_ssg_theme_m2_s4()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S4', 'Make sure the file in the destination is named exactly <code>sitedown_template.php</code> (no <code>(1)</code>, no <code>.txt</code>).'); }

    // Method 3: command line
    public function sc_ssg_theme_m3_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M3_TITLE', 'Method 3 — Command line (SSH, advanced users)'); }
    public function sc_ssg_theme_m3_desc()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M3_DESC', 'From your e107 root directory:'); }

    // Verification
    public function sc_ssg_theme_verify_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_TITLE', 'How to verify the integration works'); }
    public function sc_ssg_theme_verify_s1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_S1', 'Open the <strong>Preview</strong> tab of this plugin and pick any skin — that always works because Preview bypasses the theme stub.'); }
    public function sc_ssg_theme_verify_s2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_S2', 'While logged in as Main Admin, open <code>/sitedown.php</code> directly. If you see the chosen skin instead of the default e107 maintenance page, the stub is correctly installed.'); }
    public function sc_ssg_theme_verify_s3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_S3', 'If you still see the default page, check that the file lives at <code>e107_themes/&lt;your_theme&gt;/templates/sitedown_template.php</code> with that exact name.'); }

    // Warning + tip
    public function sc_ssg_theme_warn_label() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_WARN_LABEL', 'Heads up:'); }
    public function sc_ssg_theme_warn()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_WARN', 'if you switch to a different theme later, repeat this step in the new theme. The stub lives inside the theme — it is not global.'); }
    public function sc_ssg_theme_tip_label()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TIP_LABEL', 'Good news:'); }
    public function sc_ssg_theme_tip()        { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TIP', 'you only install this stub once per theme. After that, switching templates is just a click in the Templates tab — no file copying needed.'); }

    // ─────────────────────────────────────────────────────────────────────
    // CONFIGURATION (table)
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_config_title()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_TITLE', 'Configuration reference'); }
    public function sc_ssg_tbl_tab()          { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_TAB', 'Tab'); }
    public function sc_ssg_tbl_pref()         { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_PREF', 'Preference'); }
    public function sc_ssg_tbl_purpose()      { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_PURPOSE', 'Purpose'); }
    public function sc_ssg_tbl_row_tpl()      { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_TPL', 'Template'); }
    public function sc_ssg_tbl_row_content()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_CONTENT', 'Content'); }
    public function sc_ssg_tbl_row_countdown(){ return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_COUNTDOWN', 'Countdown'); }
    public function sc_ssg_tbl_row_social()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_SOCIAL', 'Social'); }
    public function sc_ssg_tbl_row_contact()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_CONTACT', 'Contact'); }
    public function sc_ssg_config_style()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_STYLE', 'Active template slug.'); }
    public function sc_ssg_config_content()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_CONTENT', 'Override the default title, message and logo.'); }
    public function sc_ssg_config_countdown() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_COUNTDOWN', 'Enable launch countdown and progress bar.'); }
    public function sc_ssg_config_social()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_SOCIAL', 'Show social icons and newsletter capture form.'); }
    public function sc_ssg_config_contact()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_CONTACT', 'Emergency contact information.'); }
    public function sc_ssg_config_note()      { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_NOTE', "All preferences are persisted via e107::getPlugConfig('sitedown_styles')."); }

    // ─────────────────────────────────────────────────────────────────────
    // CONFIGURATION — Texts (Copy editor) section
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_texts_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_TITLE', 'Customising visible texts (Texts tab)'); }
    public function sc_ssg_texts_intro() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_INTRO', 'The Texts tab (a.k.a. Copy Editor) lets you override the wording of the maintenance page — title, subtitle, CTA, footer, etc. — without editing PHP files or language files. Each of the 8 skins has its own set of fields, so you can tailor copy per business niche.'); }
    public function sc_ssg_texts_s1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S1', 'Open Admin → Sitedown Styles → Texts.'); }
    public function sc_ssg_texts_s2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S2', 'Pick a skin from the selector at the top of the page.'); }
    public function sc_ssg_texts_s3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S3', 'Edit any field. An empty field falls back to the default shipped in the language file.'); }
    public function sc_ssg_texts_s4()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S4', 'Save. Values are stored as <code>sitedown_copy_&lt;style&gt;_&lt;field&gt;</code> preferences — the plugin code is never touched.'); }
    public function sc_ssg_texts_note()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_NOTE', 'Use the Preview tab to see your changes immediately. Defaults live in the language files (LAN_PLUGIN_SITEDOWN_STYLES_COPY_*) so you can always reset by clearing the field.'); }

    // ─────────────────────────────────────────────────────────────────────
    // CONFIGURATION — Multilingual content section
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_lang_title()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_TITLE', 'Multilingual content'); }
    public function sc_ssg_lang_intro()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_INTRO', 'The plugin ships with three locales: English, Spanish and Portuguese (PT-PT). All admin labels, default skin texts and the maintenance page itself are translated.'); }
    public function sc_ssg_lang_tip_label() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_TIP_LABEL', 'Tip:'); }
    public function sc_ssg_lang_tip()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_TIP', 'To switch the visible texts to another shipped locale, simply change the Admin language using the language picker at the top-right of the e107 admin area. The plugin loads the matching language file automatically — both the Texts tab and the rendered maintenance page pick it up. No code change, no migration.'); }
    public function sc_ssg_lang_override()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_OVERRIDE', 'Important: any value you set in the Texts tab is a hard override and applies regardless of the active locale. Clear the field to fall back to the locale-specific default.'); }
    public function sc_ssg_lang_add_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_ADD_TITLE', 'Adding a new locale:'); }
    public function sc_ssg_lang_add()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_ADD', 'duplicate the <code>languages/English/</code> folder, rename it to your locale (e.g. <code>French</code>), translate the three files (<code>French_admin.php</code>, <code>French_front.php</code>, <code>French_global.php</code>) and the new locale will be available immediately.'); }

    // ─────────────────────────────────────────────────────────────────────
    // CONFIGURATION — Best practices alert
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_cfg_best_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_TITLE', 'Best practices'); }
    public function sc_ssg_cfg_best_1()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_1', 'Always use the <strong>Preview</strong> tab before activating maintenance mode in production.'); }
    public function sc_ssg_cfg_best_2()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_2', 'Set a realistic <strong>Countdown date</strong> in UTC. The frontend script converts it to the visitor\'s local time automatically.'); }
    public function sc_ssg_cfg_best_3()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_3', 'For company-wide branding upload your logo via the <strong>Custom logo URL</strong> field — it overrides the default site name across every skin.'); }
    public function sc_ssg_cfg_best_4()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_4', 'Bump the <code>sitedown_css_version</code> preference whenever you edit a CSS skin in production — visitors will get the fresh stylesheet instead of a cached one.'); }

    // ─────────────────────────────────────────────────────────────────────
    // ACTIVATION
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_activ_title()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_TITLE', 'Activating maintenance mode'); }
    public function sc_ssg_activ_intro()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_INTRO', 'The plugin only renders the page; the maintenance flag is a core preference.'); }
    public function sc_ssg_activ_s1()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_S1', 'Go to /e107_admin/ugflag.php (or Admin → Users → Maintenance).'); }
    public function sc_ssg_activ_s2()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_S2', 'Set Maintenance Mode to ON and save.'); }
    public function sc_ssg_activ_s3()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_S3', 'Open the site in incognito — every URL returns HTTP 503 with your template.'); }
    public function sc_ssg_activ_bypass() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_BYPASS', 'Tip: Main Admin always bypasses the flag.'); }

    // ─────────────────────────────────────────────────────────────────────
    // PLACEHOLDERS / SHORTCODES
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_sc_title()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_TITLE', 'Available placeholders'); }
    public function sc_ssg_sc_intro()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_INTRO', 'Two placeholder layers coexist on purpose — keep them distinct.'); }
    public function sc_ssg_sc_plugin() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN', 'Plugin layer (resolved by str_replace in e_sitedown.php)'); }
    public function sc_ssg_sc_core()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE', 'Core layer (resolved by parseTemplate + sitedown_shortcodes batch)'); }
    public function sc_ssg_sc_dual()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_DUAL', 'When adding a new {SS_*} placeholder you MUST update both the master template AND e_sitedown.php::buildVars().'); }

    // Per-row descriptions
    public function sc_ssg_sc_plugin_title_desc()      { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_TITLE_DESC', 'Custom title or default'); }
    public function sc_ssg_sc_plugin_subtitle_desc()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_SUBTITLE_DESC', 'Custom message or default'); }
    public function sc_ssg_sc_plugin_logo_desc()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_LOGO_DESC', 'Logo image or site name'); }
    public function sc_ssg_sc_plugin_countdown_desc()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_COUNTDOWN_DESC', 'Countdown markup + script'); }
    public function sc_ssg_sc_plugin_progress_desc()   { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_PROGRESS_DESC', 'Progress bar block'); }
    public function sc_ssg_sc_plugin_newsletter_desc() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_NEWSLETTER_DESC', 'Newsletter form'); }
    public function sc_ssg_sc_plugin_social_desc()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_SOCIAL_DESC', 'Social icons row'); }
    public function sc_ssg_sc_plugin_contact_desc()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_CONTACT_DESC', 'Contact info'); }

    public function sc_ssg_sc_core_site_desc()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_SITE_DESC', 'Global site identity'); }
    public function sc_ssg_sc_core_text_desc()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_TEXT_DESC', 'Core maintainance_text pref (note historic typo)'); }
    public function sc_ssg_sc_core_page_desc()  { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_PAGE_DESC', 'Page title and favicon'); }
    public function sc_ssg_sc_core_theme_desc() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_THEME_DESC', 'Theme helpers'); }

    // ─────────────────────────────────────────────────────────────────────
    // TROUBLESHOOTING (FAQ)
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_ts_title() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_TITLE', 'Troubleshooting'); }
    public function sc_ssg_ts_q1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q1', 'Logout shows the home page instead of the maintenance template'); }
    public function sc_ssg_ts_a1()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A1', 'maintainance_flag is OFF. Activate it at /e107_admin/ugflag.php.'); }
    public function sc_ssg_ts_q2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q2', 'Maintenance shows the bare e107 template, not my style'); }
    public function sc_ssg_ts_a2()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A2', 'Copy the integration stub into your theme so it wins the cascade.'); }
    public function sc_ssg_ts_q3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q3', 'Settings tab does not save anything'); }
    public function sc_ssg_ts_a3()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A3', 'Confirm the menu key is main/prefs (not main/settings).'); }
    public function sc_ssg_ts_q4()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q4', '404 on /…/fa-paint-brush.glyph after login'); }
    public function sc_ssg_ts_a4()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A4', 'adminLinks in plugin.xml does NOT support .glyph syntax — use real PNGs.'); }
    public function sc_ssg_ts_q5()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q5', 'TypeError on plugin uninstall (PHP 8+)'); }
    public function sc_ssg_ts_a5()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A5', 'Empty XML nodes are parsed as strings. Either remove them or populate them.'); }
    public function sc_ssg_ts_q6()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q6', 'Countdown stuck at 00:00:00 in the live page'); }
    public function sc_ssg_ts_a6()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A6', 'Set the launch date in Settings → Countdown.'); }

    // ─────────────────────────────────────────────────────────────────────
    // CREDITS
    // ─────────────────────────────────────────────────────────────────────

    public function sc_ssg_credits_title()              { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TITLE', 'Credits & acknowledgements'); }
    public function sc_ssg_credits_intro()              { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_INTRO', 'This plugin would not exist without the work of the e107 community and the open source ecosystem listed below.'); }
    public function sc_ssg_credits_author_title()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_AUTHOR_TITLE', 'Author'); }
    public function sc_ssg_credits_author_text()        { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_AUTHOR_TEXT', 'Designed and maintained by Martin Costa (Kanonimpresor). See the <strong>About</strong> page for full contact details and support links.'); }
    public function sc_ssg_credits_tech_title()         { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_TITLE', 'Technologies used'); }
    public function sc_ssg_credits_tech_e107()          { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_E107', 'Admin UI framework, plugin discovery, parser and shortcodes engine.'); }
    public function sc_ssg_credits_tech_bs()            { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_BS', 'Frontend templates use Bootstrap 5 via CDN — no build step required.'); }
    public function sc_ssg_credits_tech_fa()            { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_FA', 'Icon set used across the admin UI.'); }
    public function sc_ssg_credits_tech_bi()            { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_BI', 'Complementary icon set for the public templates.'); }
    public function sc_ssg_credits_thanks_title()       { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_TITLE', 'Special thanks'); }
    public function sc_ssg_credits_thanks_e107team()    { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_E107TEAM', 'The e107 core team and contributors for keeping the CMS alive and well documented.'); }
    public function sc_ssg_credits_thanks_testers()     { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_TESTERS', 'Beta testers who reported issues and improved the templates.'); }
    public function sc_ssg_credits_thanks_translators() { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_TRANSLATORS', 'Translators who provided the Spanish and Portuguese language packs.'); }
    public function sc_ssg_credits_license()            { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_LICENSE', 'Released under the GNU GPLv3+ license — free to use, modify and redistribute.'); }
    public function sc_ssg_credits_getinvolved()        { return defset('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_GETINVOLVED', 'Want to contribute a new template or translation? Open an issue or pull request on the project repository (see the About page).'); }

    // ─────────────────────────────────────────────────────────────────────
    // Literal placeholder tokens (so the docs render the curly-brace tokens
    // verbatim without confusing $tp->parseTemplate).  These are not LANs.
    // ─────────────────────────────────────────────────────────────────────

    public function sc_tok_title()              { return '{SITEDOWN_STYLES_TITLE}'; }
    public function sc_tok_subtitle()           { return '{SITEDOWN_STYLES_SUBTITLE}'; }
    public function sc_tok_logo()               { return '{SITEDOWN_STYLES_LOGO}'; }
    public function sc_tok_countdown()          { return '{SITEDOWN_STYLES_COUNTDOWN}'; }
    public function sc_tok_countdown_js()       { return '{SITEDOWN_STYLES_COUNTDOWN_JS}'; }
    public function sc_tok_progress()           { return '{SITEDOWN_STYLES_PROGRESS}'; }
    public function sc_tok_newsletter()         { return '{SITEDOWN_STYLES_NEWSLETTER}'; }
    public function sc_tok_social()             { return '{SITEDOWN_STYLES_SOCIAL}'; }
    public function sc_tok_phone()              { return '{SITEDOWN_STYLES_PHONE}'; }
    public function sc_tok_email()              { return '{SITEDOWN_STYLES_EMAIL}'; }

    public function sc_tok_sitename()           { return '{SITENAME}'; }
    public function sc_tok_siteurl()            { return '{SITEURL}'; }
    public function sc_tok_sitedown_text()      { return '{SITEDOWN_TABLE_MAINTAINANCETEXT}'; }
    public function sc_tok_sitedown_pagename()  { return '{SITEDOWN_TABLE_PAGENAME}'; }
    public function sc_tok_sitedown_favicon()   { return '{SITEDOWN_FAVICON}'; }
    public function sc_tok_logo_helper()        { return '{LOGO: h=180}'; }
    public function sc_tok_xurl_icons()         { return '{XURL_ICONS: ...}'; }
}
