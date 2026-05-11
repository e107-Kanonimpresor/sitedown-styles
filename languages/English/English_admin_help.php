<?php
/*
 * Sitedown Styles — In-Admin User Guide language file (English).
 *
 * Loaded LAZILY by admin_config.php::guidePage() via:
 *   e107::lan('sitedown_styles', 'admin_help', true);
 *
 * Resolves to:  languages/English/English_admin_help.php
 *
 * Convention: every constant is named LAN_PLUGIN_SS_HELP_<SECTION>_<KEY>.
 * Strings contain ONLY plain text + inline <code>/<strong>/<em>/HTML entities.
 * Structural HTML belongs in templates/sitedown_styles_guide_template.php.
 *
 * See docs/architecture/USER_GUIDE_PATTERN.md for the full rationale.
 *
 * @package     sitedown_styles
 * @version     2.1.0
 */

if (!defined('e107_INIT')) { exit; }

// ─────────────────────────────────────────────────────────────────────────────
// 9. In-Admin User Guide
// ─────────────────────────────────────────────────────────────────────────────

// 9.1 Tab labels
define('LAN_PLUGIN_SS_HELP_TAB_OVERVIEW',          'Overview');
define('LAN_PLUGIN_SS_HELP_TAB_INSTALL',           'Install');
define('LAN_PLUGIN_SS_HELP_TAB_CONFIG',            'Configuration');
define('LAN_PLUGIN_SS_HELP_TAB_ACTIVATION',        'Activation');
define('LAN_PLUGIN_SS_HELP_TAB_SHORTCODES',        'Placeholders');
define('LAN_PLUGIN_SS_HELP_TAB_TROUBLESHOOT',      'Troubleshooting');
define('LAN_PLUGIN_SS_HELP_TAB_CREDITS',           'Credits');

// 9.1.1 Intro card
define('LAN_PLUGIN_SS_HELP_INTRO_TITLE',           'Welcome to the User Guide');
define('LAN_PLUGIN_SS_HELP_INTRO_TEXT',            'Everything you need to install, configure and troubleshoot Sitedown Styles. Browse the tabs below — content updates automatically with your admin language.');

// 9.2 Overview tab
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TITLE',        'Overview');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_P1',           'Sitedown Styles replaces the default e107 maintenance page with one of 8 Bootstrap 5 templates targeted at different business niches.');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_TIP',          'Templates are pure HTML/CSS with embedded styles — no build step required.');
define('LAN_PLUGIN_SS_HELP_OVERVIEW_WARN',         'Installing the plugin alone is NOT enough: you must also copy the theme integration stub (see Install tab).');

// 9.3 Install tab
define('LAN_PLUGIN_SS_HELP_INSTALL_TITLE',         'Installation');
define('LAN_PLUGIN_SS_HELP_INSTALL_S1',            'Install the plugin from Admin → Plugin Manager.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S2',            'Copy <code>e107_plugins/sitedown_styles/theme_integration/sitedown_template.php</code> into your active theme at <code>e107_themes/&lt;your_theme&gt;/templates/sitedown_template.php</code>.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S3',            'Open the Templates tab and pick a style.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S4',            'Configure content, countdown, social links and contact info in the Settings tab.');
define('LAN_PLUGIN_SS_HELP_INSTALL_S5',            'Activate Maintenance Mode in Admin → Users → User &amp; Guest Maintenance (or /e107_admin/ugflag.php).');
define('LAN_PLUGIN_SS_HELP_INSTALL_NOTE',          'Main Admin (perm 0) sees the maintenance page directly at /sitedown.php even when the flag is OFF — useful for previewing in production.');

// 9.3.1 Install tab — Theme integration step-by-step (non-technical users)
define('LAN_PLUGIN_SS_HELP_THEME_TITLE',           'Theme integration step by step');
define('LAN_PLUGIN_SS_HELP_THEME_INTRO',           'Sitedown Styles needs <strong>ONE</strong> small file copied into your active theme. This bridge tells e107 to render the maintenance page using one of the 8 templates of this plugin instead of the default page. <em>Without this step the templates will not appear, no matter how many you preview.</em>');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_HEADING',    'The file you need to copy');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_DESC',       'It already ships with this plugin — you do <strong>NOT</strong> need to write or download anything. Just copy this exact file:');
define('LAN_PLUGIN_SS_HELP_THEME_FILE_LOCATION_LABEL', 'Source location (relative to your e107 root):');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_HEADING',  'Where to copy it');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_DESC',     'Paste the file inside the <code>templates</code> folder of your active theme:');
define('LAN_PLUGIN_SS_HELP_THEME_TARGET_HINT',     'If the <code>templates</code> folder does not exist, create it. Keep the file name exactly as <code>sitedown_template.php</code>.');
define('LAN_PLUGIN_SS_HELP_THEME_FIND_THEME',      'Not sure which theme is active? Check Admin → Themes — the active one has a green badge.');
define('LAN_PLUGIN_SS_HELP_THEME_METHODS_TITLE',   'Three ways to copy the file');
define('LAN_PLUGIN_SS_HELP_THEME_METHODS_INTRO',   'Pick whichever method matches the access you have to your hosting:');
// Method 1 — FTP / SFTP
define('LAN_PLUGIN_SS_HELP_THEME_M1_TITLE',        'Method 1 — FTP / SFTP client (FileZilla, WinSCP, Cyberduck…)');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S1',           'Connect to your hosting with your FTP credentials.');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S2',           'Browse to <code>e107_plugins/sitedown_styles/theme_integration/</code>, right-click <code>sitedown_template.php</code> and choose <strong>Download</strong>.');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S3',           'Browse to <code>e107_themes/&lt;your_theme&gt;/templates/</code> (create the <code>templates</code> folder if missing).');
define('LAN_PLUGIN_SS_HELP_THEME_M1_S4',           'Drag the file from your computer into that folder. Done.');
// Method 2 — File Manager
define('LAN_PLUGIN_SS_HELP_THEME_M2_TITLE',        'Method 2 — Hosting File Manager (cPanel, Plesk, Hostinger, etc.)');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S1',           'Log in to your hosting control panel and open the File Manager.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S2',           'Go to <code>e107_plugins/sitedown_styles/theme_integration/</code>, select <code>sitedown_template.php</code> and click <strong>Copy</strong>.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S3',           'Set the destination to <code>e107_themes/&lt;your_theme&gt;/templates/</code> (create the folder if missing) and confirm.');
define('LAN_PLUGIN_SS_HELP_THEME_M2_S4',           'Make sure the file in the destination is named exactly <code>sitedown_template.php</code> (no <code>(1)</code>, no <code>.txt</code>).');
// Method 3 — Command line
define('LAN_PLUGIN_SS_HELP_THEME_M3_TITLE',        'Method 3 — Command line (SSH, advanced users)');
define('LAN_PLUGIN_SS_HELP_THEME_M3_DESC',         'From your e107 root directory:');
// Verification
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_TITLE',    'How to verify the integration works');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S1',       'Open the <strong>Preview</strong> tab of this plugin and pick any skin — that always works because Preview bypasses the theme stub.');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S2',       'While logged in as Main Admin, open <code>/sitedown.php</code> directly. If you see the chosen skin instead of the default e107 maintenance page, the stub is correctly installed.');
define('LAN_PLUGIN_SS_HELP_THEME_VERIFY_S3',       'If you still see the default page, check that the file lives at <code>e107_themes/&lt;your_theme&gt;/templates/sitedown_template.php</code> with that exact name.');
// Warning + tip
define('LAN_PLUGIN_SS_HELP_THEME_WARN_LABEL',      'Heads up:');
define('LAN_PLUGIN_SS_HELP_THEME_WARN',            'if you switch to a different theme later, repeat this step in the new theme. The stub lives inside the theme — it is not global.');
define('LAN_PLUGIN_SS_HELP_THEME_TIP_LABEL',       'Good news:');
define('LAN_PLUGIN_SS_HELP_THEME_TIP',             'you only install this stub once per theme. After that, switching templates is just a click in the Templates tab — no file copying needed.');

// 9.4 Configuration tab
define('LAN_PLUGIN_SS_HELP_CONFIG_TITLE',          'Configuration reference');
define('LAN_PLUGIN_SS_HELP_TBL_TAB',               'Tab');
define('LAN_PLUGIN_SS_HELP_TBL_PREF',              'Preference');
define('LAN_PLUGIN_SS_HELP_TBL_PURPOSE',           'Purpose');
define('LAN_PLUGIN_SS_HELP_CONFIG_STYLE',          'Active template slug.');
define('LAN_PLUGIN_SS_HELP_CONFIG_CONTENT',        'Override the default title, message and logo.');
define('LAN_PLUGIN_SS_HELP_CONFIG_COUNTDOWN',      'Enable launch countdown and progress bar.');
define('LAN_PLUGIN_SS_HELP_CONFIG_SOCIAL',         'Show social icons and newsletter capture form.');
define('LAN_PLUGIN_SS_HELP_CONFIG_CONTACT',        'Emergency contact information.');
define('LAN_PLUGIN_SS_HELP_CONFIG_NOTE',           "All preferences are persisted via <code>e107::getPlugConfig('sitedown_styles')</code>.");

// 9.4.1 Configuration tab — Texts (Copy editor) section
define('LAN_PLUGIN_SS_HELP_TEXTS_TITLE',           'Customising visible texts (Texts tab)');
define('LAN_PLUGIN_SS_HELP_TEXTS_INTRO',           'The <strong>Texts</strong> tab (a.k.a. Copy Editor) lets you override the wording of the maintenance page — title, subtitle, CTA, footer, etc. — without editing PHP files or language files. Each of the 8 skins has its own set of fields, so you can tailor the copy per business niche.');
define('LAN_PLUGIN_SS_HELP_TEXTS_S1',              'Open <strong>Admin → Sitedown Styles → Texts</strong>.');
define('LAN_PLUGIN_SS_HELP_TEXTS_S2',              'Pick a skin from the selector at the top of the page (each skin keeps its own set of overrides).');
define('LAN_PLUGIN_SS_HELP_TEXTS_S3',              'Edit any field. <em>An empty field falls back to the default shipped in the active language file.</em>');
define('LAN_PLUGIN_SS_HELP_TEXTS_S4',              'Save. Values are stored as <code>sitedown_copy_&lt;style&gt;_&lt;field&gt;</code> preferences — the plugin code is never touched.');
define('LAN_PLUGIN_SS_HELP_TEXTS_NOTE',            'Use the <strong>Preview</strong> tab to see your changes immediately. Defaults live in the language files (<code>LAN_PLUGIN_SITEDOWN_STYLES_COPY_*</code>) so you can always reset by clearing the field.');

// 9.4.2 Configuration tab — Multilingual content section
define('LAN_PLUGIN_SS_HELP_LANG_TITLE',            'Multilingual content');
define('LAN_PLUGIN_SS_HELP_LANG_INTRO',            'The plugin ships with three locales: <strong>English</strong>, <strong>Spanish</strong> and <strong>Portuguese (PT-PT)</strong>. All admin labels, default skin texts and the maintenance page itself are translated.');
define('LAN_PLUGIN_SS_HELP_LANG_TIP_LABEL',        'Tip:');
define('LAN_PLUGIN_SS_HELP_LANG_TIP',              'to switch the visible texts to another shipped locale, simply change the <strong>Admin language</strong> using the language picker at the top-right of the e107 admin area. The plugin loads the matching language file automatically — both the Texts tab and the rendered maintenance page pick it up. No code change, no migration.');
define('LAN_PLUGIN_SS_HELP_LANG_OVERRIDE',         'Important: any value you set in the Texts tab is a <strong>hard override</strong> and applies regardless of the active locale. Clear the field to fall back to the locale-specific default.');
define('LAN_PLUGIN_SS_HELP_LANG_ADD_TITLE',        'Adding a new locale:');
define('LAN_PLUGIN_SS_HELP_LANG_ADD',              'duplicate the <code>languages/English/</code> folder, rename it to your locale (e.g. <code>French</code>), translate the three files (<code>French_admin.php</code>, <code>French_front.php</code>, <code>French_global.php</code>) and the new locale will be available immediately.');

// 9.4.3 Configuration tab — Best practices alert
define('LAN_PLUGIN_SS_HELP_CFG_BEST_TITLE',        'Best practices');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_1',            'Always use the <strong>Preview</strong> tab before activating maintenance mode in production.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_2',            'Set a realistic <strong>Countdown date</strong> in UTC. The frontend script converts it to the visitor\'s local time automatically.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_3',            'For company-wide branding upload your logo via the <strong>Custom logo URL</strong> field — it overrides the default site name across every skin.');
define('LAN_PLUGIN_SS_HELP_CFG_BEST_4',            'Bump the <code>sitedown_css_version</code> preference whenever you edit a CSS skin in production — visitors will get the fresh stylesheet instead of a cached one.');

// 9.5 Activation tab
define('LAN_PLUGIN_SS_HELP_ACTIV_TITLE',           'Activating maintenance mode');
define('LAN_PLUGIN_SS_HELP_ACTIV_INTRO',           'The plugin only renders the page; the maintenance flag is a core preference.');
define('LAN_PLUGIN_SS_HELP_ACTIV_S1',              'Go to <code>/e107_admin/ugflag.php</code> (or Admin → Users → User &amp; Guest Maintenance).');
define('LAN_PLUGIN_SS_HELP_ACTIV_S2',              'Set <strong>Maintenance Mode</strong> to ON and save.');
define('LAN_PLUGIN_SS_HELP_ACTIV_S3',              'Open the site in an incognito window — every URL returns HTTP 503 with your template.');
define('LAN_PLUGIN_SS_HELP_ACTIV_BYPASS',          'Tip: Main Admin always bypasses the flag. Use a second browser/incognito to test as a visitor.');

// 9.6 Placeholders tab
define('LAN_PLUGIN_SS_HELP_SC_TITLE',              'Available placeholders');
define('LAN_PLUGIN_SS_HELP_SC_INTRO',              'Two placeholder layers coexist on purpose — keep them distinct when authoring custom templates.');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN',             'Plugin layer (resolved by str_replace in e_sitedown.php)');
define('LAN_PLUGIN_SS_HELP_SC_CORE',               'Core layer (resolved by parseTemplate + sitedown_shortcodes batch)');
define('LAN_PLUGIN_SS_HELP_SC_DUAL',               'When adding a new <code>{SS_*}</code> placeholder you MUST update both the master template (<code>templates/sitedown_styles_template.php</code>) AND the variable map in <code>e_sitedown.php::buildVars()</code>, otherwise it will render literally on the page.');

// 9.7 Troubleshooting tab
define('LAN_PLUGIN_SS_HELP_TS_TITLE',              'Troubleshooting');
define('LAN_PLUGIN_SS_HELP_TS_Q1',                 'Logout shows the home page instead of the maintenance template');
define('LAN_PLUGIN_SS_HELP_TS_A1',                 '<code>maintainance_flag</code> is OFF. Activate it at <code>/e107_admin/ugflag.php</code>. The plugin only provides the look, not the gating.');
define('LAN_PLUGIN_SS_HELP_TS_Q2',                 'Maintenance shows the bare e107 template, not my style');
define('LAN_PLUGIN_SS_HELP_TS_A2',                 'The cascade is THEME/templates/sitedown_template.php → THEME/sitedown_template.php → e_CORE/templates/sitedown_template.php. Copy the integration stub into your theme (see Install tab) so it wins the cascade.');
define('LAN_PLUGIN_SS_HELP_TS_Q3',                 'Settings tab does not save anything');
define('LAN_PLUGIN_SS_HELP_TS_A3',                 'Confirm the menu key is <code>main/prefs</code> (not <code>main/settings</code>). Only the <code>prefs</code> action triggers <code>PrefsObserver/PrefsSaveTrigger</code>.');
define('LAN_PLUGIN_SS_HELP_TS_Q4',                 '404 on /…/fa-paint-brush.glyph after login');
define('LAN_PLUGIN_SS_HELP_TS_A4',                 '<code>adminLinks</code> in plugin.xml does NOT support .glyph syntax — use real PNG paths under <code>images/</code>.');
define('LAN_PLUGIN_SS_HELP_TS_Q5',                 'TypeError on plugin uninstall (PHP 8+)');
define('LAN_PLUGIN_SS_HELP_TS_A5',                 'Empty XML nodes (<code>&lt;userClasses&gt;&lt;/userClasses&gt;</code>) are parsed as strings. Either remove them or populate them.');
define('LAN_PLUGIN_SS_HELP_TS_Q6',                 'Countdown stuck at 00:00:00 in the live page');
define('LAN_PLUGIN_SS_HELP_TS_A6',                 'Set the launch date in Settings → Countdown. An empty value defaults to "now+7 days" only at install time.');

// 9.8 Credits tab
define('LAN_PLUGIN_SS_HELP_CREDITS_TITLE',             'Credits & acknowledgements');
define('LAN_PLUGIN_SS_HELP_CREDITS_INTRO',             'This plugin would not exist without the work of the e107 community and the open source ecosystem listed below.');
define('LAN_PLUGIN_SS_HELP_CREDITS_AUTHOR_TITLE',      'Author');
define('LAN_PLUGIN_SS_HELP_CREDITS_AUTHOR_TEXT',       'Designed and maintained by Martin Costa (Kanonimpresor). See the <strong>About</strong> page for full contact details and support links.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_TITLE',        'Technologies used');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_E107',         'Admin UI framework, plugin discovery, parser and shortcodes engine.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_BS',           'Frontend templates use Bootstrap 5 via CDN — no build step required.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_FA',           'Icon set used across the admin UI.');
define('LAN_PLUGIN_SS_HELP_CREDITS_TECH_BI',           'Complementary icon set for the public templates.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TITLE',      'Special thanks');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_E107TEAM',   'The e107 core team and contributors for keeping the CMS alive and well documented.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TESTERS',    'Beta testers who reported issues and improved the templates.');
define('LAN_PLUGIN_SS_HELP_CREDITS_THANKS_TRANSLATORS','Translators who provided the Spanish and Portuguese language packs.');
define('LAN_PLUGIN_SS_HELP_CREDITS_LICENSE',           'Released under the GNU GPLv3+ license — free to use, modify and redistribute.');
define('LAN_PLUGIN_SS_HELP_CREDITS_GETINVOLVED',       'Want to contribute a new template or translation? Open an issue or pull request on the project repository (see the About page).');


// ─────────────────────────────────────────────────────────────────────────
// 9.b  In-Admin User Guide — booking-pattern additions (v2 refactor)
// ─────────────────────────────────────────────────────────────────────────

// Reusable inline labels (Quick-start flow + Highlights cards)
define('LAN_PLUGIN_SS_HELP_LBL_QUICK_START',     'Quick start');
define('LAN_PLUGIN_SS_HELP_LBL_HIGHLIGHTS',      'Highlights');
define('LAN_PLUGIN_SS_HELP_LBL_INSTALL',         'Install plugin');
define('LAN_PLUGIN_SS_HELP_LBL_PICK_TPL',        'Pick template');
define('LAN_PLUGIN_SS_HELP_LBL_CUSTOMIZE',       'Customize');
define('LAN_PLUGIN_SS_HELP_LBL_ACTIVATE',        'Activate');
define('LAN_PLUGIN_SS_HELP_LBL_TEMPLATES',       'templates');
define('LAN_PLUGIN_SS_HELP_LBL_TEMPLATES_DESC',  'Bootstrap 5 skins ready for different business niches.');
define('LAN_PLUGIN_SS_HELP_LBL_NO_BUILD',        'No build step');
define('LAN_PLUGIN_SS_HELP_LBL_THEME_REQ',       'Theme stub required');

// Configuration table — row labels (first column)
define('LAN_PLUGIN_SS_HELP_TBL_ROW_TPL',         'Template');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_CONTENT',     'Content');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_COUNTDOWN',   'Countdown');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_SOCIAL',      'Social');
define('LAN_PLUGIN_SS_HELP_TBL_ROW_CONTACT',     'Contact');

// Placeholders tab — plugin layer descriptions
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_TITLE_DESC',      'Custom title or default site name');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_SUBTITLE_DESC',   'Custom maintenance message or default');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_LOGO_DESC',       'Logo image (or site name fallback)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_COUNTDOWN_DESC',  'Countdown markup (HTML) and bootstrap script (JS)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_PROGRESS_DESC',   'Progress bar block driven by start/end prefs');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_NEWSLETTER_DESC', 'Newsletter capture form (when enabled)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_SOCIAL_DESC',     'Social icons row (Facebook, Twitter, Instagram, …)');
define('LAN_PLUGIN_SS_HELP_SC_PLUGIN_CONTACT_DESC',    'Emergency contact phone and email');

// Placeholders tab — core layer descriptions
define('LAN_PLUGIN_SS_HELP_SC_CORE_SITE_DESC',   'Global site identity (name and URL)');
define('LAN_PLUGIN_SS_HELP_SC_CORE_TEXT_DESC',   'Core <em>maintainance_text</em> preference (note historic typo)');
define('LAN_PLUGIN_SS_HELP_SC_CORE_PAGE_DESC',   'Page title and favicon');
define('LAN_PLUGIN_SS_HELP_SC_CORE_THEME_DESC',  'Theme helpers (logo, icon URLs)');


// ─────────────────────────────────────────────────────────────────────────────
// Live state strings (consumed by sc_ss_help_* dynamic shortcodes)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SS_HELP_STUB_LIVE_TITLE',     'Live status in your active theme');
define('LAN_PLUGIN_SS_HELP_STUB_OK',             'Theme stub detected — integration is live');
define('LAN_PLUGIN_SS_HELP_STUB_MISSING',       'Theme stub NOT installed — see steps above');
define('LAN_PLUGIN_SS_HELP_NONE',                'none');
