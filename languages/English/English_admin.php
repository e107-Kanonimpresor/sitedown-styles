<?php
/*
 * Sitedown Styles Plugin - English Language File
 *
 * Sections (in order):
 *   1. Plugin metadata
 *   2. Admin menu
 *   3. Admin settings (labels, helps, tabs)
 *   4. Template descriptions
 *   5. Admin actions / messages
 *   6. Front-end shared strings (LAN_SITEDOWN_*, generic LAN_*)
 *   7. Front-end shared labels (LAN_PLUGIN_SITEDOWN_STYLES_LBL_*)
 *   8. Per-template copy (LAN_PLUGIN_SITEDOWN_STYLES_TPL_<STYLE>_*)
 *   9. In-Admin User Guide
 *
 * @package     sitedown_styles
 * @version     1.1
 */

// ─────────────────────────────────────────────────────────────────────────────
// 1. Plugin metadata
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_NAME',                        'Sitedown Styles');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUMMARY',                     'Professional maintenance page templates');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESCRIPTION',                 'A collection of 8 professionally designed maintenance page templates with Bootstrap 5.');
define('LAN_PLUGIN_SITEDOWN_STYLES_ADMIN',                       'Configure maintenance page templates');
define('LAN_PLUGIN_SITEDOWN_STYLES_INSTALLED',                   'Sitedown Styles plugin installed successfully!');

// ─────────────────────────────────────────────────────────────────────────────
// 2. Admin menu
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_TEMPLATES',                   'Templates');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW',                     'Preview');
define('LAN_PLUGIN_SITEDOWN_STYLES_MAINTENANCE',                 'Maintenance Mode');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE',                       'User Guide');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY',                        'Copy editor');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_INTRO',                  'Override the visible text strings (badges, headlines, service labels, etc.) for each skin. Leave a field empty to revert to the language-file default.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_FIELD',                  'Field');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_DEFAULT',                'Default');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_OVERRIDE',               'Override');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVE',                   'Save copy');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVED',                  'Copy saved.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NOCHANGE',               'No changes detected.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NONE',                   'This skin has no editable copy fields.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG',                   'Editing language:');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_HINT',              'Empty values fall back to: current language → site default language → first available translation → built-in default.');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_COL',               'Translations');
define('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NO_TRANSLATION',         '(no translation yet)');

// ─────────────────────────────────────────────────────────────────────────────
// 3. Admin settings (labels, helps, tabs)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_ACTIVE',                      'Active Template');
define('LAN_PLUGIN_SITEDOWN_STYLES_TITLE',                       'Custom Title');
define('LAN_PLUGIN_SITEDOWN_STYLES_TITLE_HELP',                  'Leave empty to use default maintenance title');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE',                    'Custom Message');
define('LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE_HELP',               'Leave empty to use default maintenance message from Site Preferences');
define('LAN_PLUGIN_SITEDOWN_STYLES_LOGO',                        'Logo Image');
define('LAN_PLUGIN_SITEDOWN_STYLES_LOGO_HELP',                   'Select a logo to display on the maintenance page');
define('LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN',                   'Enable Countdown');
define('LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN_DATE',              'Launch Date');
define('LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS',                    'Show Progress Bar');
define('LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS_VALUE',              'Progress Percentage');
define('LAN_PLUGIN_SITEDOWN_STYLES_NEWSLETTER',                  'Enable Newsletter Form');
define('LAN_PLUGIN_SITEDOWN_STYLES_SOCIAL',                      'Show Social Links');
define('LAN_PLUGIN_SITEDOWN_STYLES_PHONE',                       'Contact Phone');
define('LAN_PLUGIN_SITEDOWN_STYLES_EMAIL',                       'Contact Email');

// Settings tabs
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_TEMPLATE',                'Template');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTENT',                 'Content');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_COUNTDOWN',               'Countdown');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_SOCIAL',                  'Social & Newsletter');
define('LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTACT',                 'Contact Info');

// ─────────────────────────────────────────────────────────────────────────────
// 4. Template descriptions
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_AGENCY',                 'Elegant glassmorphism design perfect for digital agencies and tech startups.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_BUSINESS',               'Professional corporate design ideal for B2B services and consulting firms.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_CONSTRUCTION',           'Industrial bold design with warning stripes for construction and building companies.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_CREATIVE',               'Vibrant artistic design with animations for designers, artists and creative studios.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_GARDENING',              'Natural organic design with botanical elements for landscapers and garden centers.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_HANDYMAN',               'Practical functional design with emergency contact for repair and maintenance services.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_MARKETING',              'Dynamic tech-focused design with dashboard preview for marketing and growth agencies.');
define('LAN_PLUGIN_SITEDOWN_STYLES_DESC_RESTAURANT',             'Elegant warm design with refined typography for restaurants, cafes and bars.');

// ─────────────────────────────────────────────────────────────────────────────
// 5. Admin actions / messages
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_SAVE_SELECTION',              'Save Template Selection');
define('LAN_PLUGIN_SITEDOWN_STYLES_SAVED',                       'Template selection saved successfully!');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_DESC',                'Preview how your maintenance page will look to visitors.');
define('LAN_PLUGIN_SITEDOWN_STYLES_OPEN_FULLSCREEN',             'Open in Full Screen');
define('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_BADGE',               'PREVIEW');

// ─────────────────────────────────────────────────────────────────────────────
// 6. Front-end shared strings (countdown units, generic copy)
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_SITEDOWN_TITLE',                                     'Site Under Maintenance');
define('LAN_SITEDOWN_MSG',                                       'We are currently performing scheduled maintenance. We\'ll be back online shortly.');
define('LAN_SITEDOWN_NOTIFY',                                    'Get notified when we\'re back online');
define('LAN_DAYS',                                               'Days');
define('LAN_HOURS',                                              'Hours');
define('LAN_MINUTES',                                            'Min');
define('LAN_SECONDS',                                            'Sec');
define('LAN_PROGRESS',                                           'Progress');
define('LAN_NOTIFY_ME',                                          'Notify Me');
define('LAN_SUBSCRIBED',                                         'Subscribed!');
define('LAN_EMAIL',                                              'Your email');
define('LAN_ACTIVE',                                             'Active');

// ─────────────────────────────────────────────────────────────────────────────
// 7. Front-end shared labels (used across multiple templates)
//    Resolved as {SITEDOWN_STYLES_LBL_*} placeholders.
// ─────────────────────────────────────────────────────────────────────────────
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_PHONE',                   'Phone');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL',                   'Email');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL_PH',                'Enter your email');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_RESERVE',                 'Reserve');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_REGISTERED',              'Registered!');
define('LAN_PLUGIN_SITEDOWN_STYLES_LBL_THANKS',                  'Thank you!');

// ─────────────────────────────────────────────────────────────────────────────
// 8. Per-template copy (visible marketing strings, by style key)
//    Resolved as {SITEDOWN_STYLES_TPL_*} placeholders by getTplCopy($style).
// ─────────────────────────────────────────────────────────────────────────────

// 8.1 Agency
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_BADGE',            'Maintenance Mode');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD1',            'We\'re making');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD2',            'something amazing');

// 8.2 Business
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BADGE',          'Scheduled Maintenance');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD1',          'We\'ll be back');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD2',          'very soon');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_CDLABEL',        'Estimated time remaining');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BRAND',          'We\'re upgrading our systems to serve you better. Thank you for your patience.');

// 8.3 Construction
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_BADGE',      'Under Construction');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD1',      'BUILDING');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD2',      'SOMETHING');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD3',      'BETTER');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_CDLABEL',    'LAUNCHING IN');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC1',       'Construction');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC2',       'Renovation');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC3',       'Design');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC4',       'Maintenance');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_EMERG',      '24/7 Emergency Contact');

// 8.4 Creative
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD1',          'CREATING');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD2',          'SOMETHING');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD3',          'AMAZING');

// 8.5 Gardening
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_BADGE',         'Growing Something New');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD1',         'Our garden is');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD2',         'blooming soon');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_CDLABEL',       '— Opening in —');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC1',          'Gardening');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC2',          'Landscaping');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC3',          'Irrigation');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC4',          'Maintenance');

// 8.6 Handyman
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_BADGE',          '24/7 Emergency');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TITLE',    'Need Urgent Help?');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TEXT',     'Our website is under maintenance, but our emergency services are still available. Don\'t hesitate to call us for any urgent repairs.');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CALL',           'Call Us Now');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_AVAIL',          'Available 24 hours');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_STATUS',         'Maintenance in Progress');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD1',          'We\'re fixing');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD2',          'things up');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CDLABEL',        'Estimated Time Remaining');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC1',           'Electrical');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC2',           'Plumbing');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC3',           'Locksmith');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC4',           'HVAC');

// 8.7 Marketing
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_BADGE',         'Optimization in Progress');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD1',         'Scaling our');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD2',         'digital infrastructure');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M1',            'Uptime');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M2',            'Faster');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M3',            'New Features');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_TITLE',    'Control Panel');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_BADGE',    'In Development');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CDLABEL',       'Launching In');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CHART',         'Expected Performance');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S1',            'Optimized');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S2',            'Enhanced');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S3',            'Updated');

// 8.8 Restaurant
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_TAGLINE',      'Fine Dining Experience');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_BADGE',        'Renovating the Restaurant');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD1',        'We\'re preparing a');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD2',        'new gastronomic experience');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_CDLABEL',      '— Reopening in —');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_NL_TITLE',     'Be the first to know about our new menu');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO1',        'Reservations');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO2',        'Location');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO3',        'Hours');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HOURS_VAL',    '13:00 - 23:00');
define('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_QUOTE',        '"Good food is the foundation of happiness."');

// ─────────────────────────────────────────────────────────────────────────────
// 9. In-Admin User Guide
// ─────────────────────────────────────────────────────────────────────────────

// 9.1 Tab labels
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_OVERVIEW',          'Overview');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_INSTALL',           'Install');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_CONFIG',            'Configuration');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_ACTIVATION',        'Activation');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_SHORTCODES',        'Placeholders');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_TROUBLESHOOT',      'Troubleshooting');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TAB_CREDITS',           'Credits');

// 9.1.1 Intro card
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INTRO_TITLE',           'Welcome to the User Guide');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INTRO_TEXT',            'Everything you need to install, configure and troubleshoot Sitedown Styles. Browse the tabs below — content updates automatically with your admin language.');

// 9.2 Overview tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_TITLE',        'Overview');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_P1',           'Sitedown Styles replaces the default e107 maintenance page with one of 8 Bootstrap 5 templates targeted at different business niches.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_TIP',          'Templates are pure HTML/CSS with embedded styles — no build step required.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_OVERVIEW_WARN',         'Installing the plugin alone is NOT enough: you must also copy the theme integration stub (see Install tab).');

// 9.3 Install tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_TITLE',         'Installation');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S1',            'Install the plugin from Admin → Plugin Manager.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S2',            'Copy <code>e107_plugins/sitedown_styles/theme_integration/sitedown_template.php</code> into your active theme at <code>e107_themes/&lt;your_theme&gt;/templates/sitedown_template.php</code>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S3',            'Open the Templates tab and pick a style.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S4',            'Configure content, countdown, social links and contact info in the Settings tab.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_S5',            'Activate Maintenance Mode in Admin → Users → User &amp; Guest Maintenance (or /e107_admin/ugflag.php).');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_INSTALL_NOTE',          'Main Admin (perm 0) sees the maintenance page directly at /sitedown.php even when the flag is OFF — useful for previewing in production.');

// 9.3.1 Install tab — Theme integration step-by-step (non-technical users)
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TITLE',           'Theme integration step by step');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_INTRO',           'Sitedown Styles needs <strong>ONE</strong> small file copied into your active theme. This bridge tells e107 to render the maintenance page using one of the 8 templates of this plugin instead of the default page. <em>Without this step the templates will not appear, no matter how many you preview.</em>');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FILE_HEADING',    'The file you need to copy');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FILE_DESC',       'It already ships with this plugin — you do <strong>NOT</strong> need to write or download anything. Just copy this exact file:');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FILE_LOCATION_LABEL', 'Source location (relative to your e107 root):');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TARGET_HEADING',  'Where to copy it');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TARGET_DESC',     'Paste the file inside the <code>templates</code> folder of your active theme:');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TARGET_HINT',     'If the <code>templates</code> folder does not exist, create it. Keep the file name exactly as <code>sitedown_template.php</code>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_FIND_THEME',      'Not sure which theme is active? Check Admin → Themes — the active one has a green badge.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_METHODS_TITLE',   'Three ways to copy the file');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_METHODS_INTRO',   'Pick whichever method matches the access you have to your hosting:');
// Method 1 — FTP / SFTP
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_TITLE',        'Method 1 — FTP / SFTP client (FileZilla, WinSCP, Cyberduck…)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S1',           'Connect to your hosting with your FTP credentials.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S2',           'Browse to <code>e107_plugins/sitedown_styles/theme_integration/</code>, right-click <code>sitedown_template.php</code> and choose <strong>Download</strong>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S3',           'Browse to <code>e107_themes/&lt;your_theme&gt;/templates/</code> (create the <code>templates</code> folder if missing).');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M1_S4',           'Drag the file from your computer into that folder. Done.');
// Method 2 — File Manager
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_TITLE',        'Method 2 — Hosting File Manager (cPanel, Plesk, Hostinger, etc.)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S1',           'Log in to your hosting control panel and open the File Manager.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S2',           'Go to <code>e107_plugins/sitedown_styles/theme_integration/</code>, select <code>sitedown_template.php</code> and click <strong>Copy</strong>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S3',           'Set the destination to <code>e107_themes/&lt;your_theme&gt;/templates/</code> (create the folder if missing) and confirm.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M2_S4',           'Make sure the file in the destination is named exactly <code>sitedown_template.php</code> (no <code>(1)</code>, no <code>.txt</code>).');
// Method 3 — Command line
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M3_TITLE',        'Method 3 — Command line (SSH, advanced users)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_M3_DESC',         'From your e107 root directory:');
// Verification
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_TITLE',    'How to verify the integration works');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_S1',       'Open the <strong>Preview</strong> tab of this plugin and pick any skin — that always works because Preview bypasses the theme stub.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_S2',       'While logged in as Main Admin, open <code>/sitedown.php</code> directly. If you see the chosen skin instead of the default e107 maintenance page, the stub is correctly installed.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_VERIFY_S3',       'If you still see the default page, check that the file lives at <code>e107_themes/&lt;your_theme&gt;/templates/sitedown_template.php</code> with that exact name.');
// Warning + tip
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_WARN_LABEL',      'Heads up:');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_WARN',            'if you switch to a different theme later, repeat this step in the new theme. The stub lives inside the theme — it is not global.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TIP_LABEL',       'Good news:');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_THEME_TIP',             'you only install this stub once per theme. After that, switching templates is just a click in the Templates tab — no file copying needed.');

// 9.4 Configuration tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_TITLE',          'Configuration reference');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_TAB',               'Tab');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_PREF',              'Preference');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_PURPOSE',           'Purpose');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_STYLE',          'Active template slug.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_CONTENT',        'Override the default title, message and logo.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_COUNTDOWN',      'Enable launch countdown and progress bar.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_SOCIAL',         'Show social icons and newsletter capture form.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_CONTACT',        'Emergency contact information.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CONFIG_NOTE',           "All preferences are persisted via <code>e107::getPlugConfig('sitedown_styles')</code>.");

// 9.4.1 Configuration tab — Texts (Copy editor) section
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_TITLE',           'Customising visible texts (Texts tab)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_INTRO',           'The <strong>Texts</strong> tab (a.k.a. Copy Editor) lets you override the wording of the maintenance page — title, subtitle, CTA, footer, etc. — without editing PHP files or language files. Each of the 8 skins has its own set of fields, so you can tailor the copy per business niche.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S1',              'Open <strong>Admin → Sitedown Styles → Texts</strong>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S2',              'Pick a skin from the selector at the top of the page (each skin keeps its own set of overrides).');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S3',              'Edit any field. <em>An empty field falls back to the default shipped in the active language file.</em>');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_S4',              'Save. Values are stored as <code>sitedown_copy_&lt;style&gt;_&lt;field&gt;</code> preferences — the plugin code is never touched.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TEXTS_NOTE',            'Use the <strong>Preview</strong> tab to see your changes immediately. Defaults live in the language files (<code>LAN_PLUGIN_SITEDOWN_STYLES_COPY_*</code>) so you can always reset by clearing the field.');

// 9.4.2 Configuration tab — Multilingual content section
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_TITLE',            'Multilingual content');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_INTRO',            'The plugin ships with three locales: <strong>English</strong>, <strong>Spanish</strong> and <strong>Portuguese (PT-PT)</strong>. All admin labels, default skin texts and the maintenance page itself are translated.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_TIP_LABEL',        'Tip:');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_TIP',              'to switch the visible texts to another shipped locale, simply change the <strong>Admin language</strong> using the language picker at the top-right of the e107 admin area. The plugin loads the matching language file automatically — both the Texts tab and the rendered maintenance page pick it up. No code change, no migration.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_OVERRIDE',         'Important: any value you set in the Texts tab is a <strong>hard override</strong> and applies regardless of the active locale. Clear the field to fall back to the locale-specific default.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_ADD_TITLE',        'Adding a new locale:');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LANG_ADD',              'duplicate the <code>languages/English/</code> folder, rename it to your locale (e.g. <code>French</code>), translate the three files (<code>French_admin.php</code>, <code>French_front.php</code>, <code>French_global.php</code>) and the new locale will be available immediately.');

// 9.4.3 Configuration tab — Best practices alert
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_TITLE',        'Best practices');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_1',            'Always use the <strong>Preview</strong> tab before activating maintenance mode in production.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_2',            'Set a realistic <strong>Countdown date</strong> in UTC. The frontend script converts it to the visitor\'s local time automatically.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_3',            'For company-wide branding upload your logo via the <strong>Custom logo URL</strong> field — it overrides the default site name across every skin.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CFG_BEST_4',            'Bump the <code>sitedown_css_version</code> preference whenever you edit a CSS skin in production — visitors will get the fresh stylesheet instead of a cached one.');

// 9.5 Activation tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_TITLE',           'Activating maintenance mode');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_INTRO',           'The plugin only renders the page; the maintenance flag is a core preference.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_S1',              'Go to <code>/e107_admin/ugflag.php</code> (or Admin → Users → User &amp; Guest Maintenance).');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_S2',              'Set <strong>Maintenance Mode</strong> to ON and save.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_S3',              'Open the site in an incognito window — every URL returns HTTP 503 with your template.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_ACTIV_BYPASS',          'Tip: Main Admin always bypasses the flag. Use a second browser/incognito to test as a visitor.');

// 9.6 Placeholders tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_TITLE',              'Available placeholders');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_INTRO',              'Two placeholder layers coexist on purpose — keep them distinct when authoring custom templates.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN',             'Plugin layer (resolved by str_replace in e_sitedown.php)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE',               'Core layer (resolved by parseTemplate + sitedown_shortcodes batch)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_DUAL',               'When adding a new <code>{SS_*}</code> placeholder you MUST update both the master template (<code>templates/sitedown_styles_template.php</code>) AND the variable map in <code>e_sitedown.php::buildVars()</code>, otherwise it will render literally on the page.');

// 9.7 Troubleshooting tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_TITLE',              'Troubleshooting');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q1',                 'Logout shows the home page instead of the maintenance template');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A1',                 '<code>maintainance_flag</code> is OFF. Activate it at <code>/e107_admin/ugflag.php</code>. The plugin only provides the look, not the gating.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q2',                 'Maintenance shows the bare e107 template, not my style');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A2',                 'The cascade is THEME/templates/sitedown_template.php → THEME/sitedown_template.php → e_CORE/templates/sitedown_template.php. Copy the integration stub into your theme (see Install tab) so it wins the cascade.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q3',                 'Settings tab does not save anything');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A3',                 'Confirm the menu key is <code>main/prefs</code> (not <code>main/settings</code>). Only the <code>prefs</code> action triggers <code>PrefsObserver/PrefsSaveTrigger</code>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q4',                 '404 on /…/fa-paint-brush.glyph after login');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A4',                 '<code>adminLinks</code> in plugin.xml does NOT support .glyph syntax — use real PNG paths under <code>images/</code>.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q5',                 'TypeError on plugin uninstall (PHP 8+)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A5',                 'Empty XML nodes (<code>&lt;userClasses&gt;&lt;/userClasses&gt;</code>) are parsed as strings. Either remove them or populate them.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_Q6',                 'Countdown stuck at 00:00:00 in the live page');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TS_A6',                 'Set the launch date in Settings → Countdown. An empty value defaults to "now+7 days" only at install time.');

// 9.8 Credits tab
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TITLE',             'Credits & acknowledgements');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_INTRO',             'This plugin would not exist without the work of the e107 community and the open source ecosystem listed below.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_AUTHOR_TITLE',      'Author');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_AUTHOR_TEXT',       'Designed and maintained by Martin Costa (Kanonimpresor). See the <strong>About</strong> page for full contact details and support links.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_TITLE',        'Technologies used');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_E107',         'Admin UI framework, plugin discovery, parser and shortcodes engine.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_BS',           'Frontend templates use Bootstrap 5 via CDN — no build step required.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_FA',           'Icon set used across the admin UI.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_TECH_BI',           'Complementary icon set for the public templates.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_TITLE',      'Special thanks');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_E107TEAM',   'The e107 core team and contributors for keeping the CMS alive and well documented.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_TESTERS',    'Beta testers who reported issues and improved the templates.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_THANKS_TRANSLATORS','Translators who provided the Spanish and Portuguese language packs.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_LICENSE',           'Released under the GNU GPLv3+ license — free to use, modify and redistribute.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_CREDITS_GETINVOLVED',       'Want to contribute a new template or translation? Open an issue or pull request on the project repository (see the About page).');


// ─────────────────────────────────────────────────────────────────────────
// 9.b  In-Admin User Guide — booking-pattern additions (v2 refactor)
// ─────────────────────────────────────────────────────────────────────────

// Reusable inline labels (Quick-start flow + Highlights cards)
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_QUICK_START',     'Quick start');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_HIGHLIGHTS',      'Highlights');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_INSTALL',         'Install plugin');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_PICK_TPL',        'Pick template');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_CUSTOMIZE',       'Customize');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_ACTIVATE',        'Activate');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_TEMPLATES',       'templates');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_TEMPLATES_DESC',  'Bootstrap 5 skins ready for different business niches.');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_NO_BUILD',        'No build step');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_LBL_THEME_REQ',       'Theme stub required');

// Configuration table — row labels (first column)
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_TPL',         'Template');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_CONTENT',     'Content');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_COUNTDOWN',   'Countdown');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_SOCIAL',      'Social');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_TBL_ROW_CONTACT',     'Contact');

// Placeholders tab — plugin layer descriptions
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_TITLE_DESC',      'Custom title or default site name');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_SUBTITLE_DESC',   'Custom maintenance message or default');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_LOGO_DESC',       'Logo image (or site name fallback)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_COUNTDOWN_DESC',  'Countdown markup (HTML) and bootstrap script (JS)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_PROGRESS_DESC',   'Progress bar block driven by start/end prefs');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_NEWSLETTER_DESC', 'Newsletter capture form (when enabled)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_SOCIAL_DESC',     'Social icons row (Facebook, Twitter, Instagram, …)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_PLUGIN_CONTACT_DESC',    'Emergency contact phone and email');

// Placeholders tab — core layer descriptions
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_SITE_DESC',   'Global site identity (name and URL)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_TEXT_DESC',   'Core <em>maintainance_text</em> preference (note historic typo)');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_PAGE_DESC',   'Page title and favicon');
define('LAN_PLUGIN_SITEDOWN_STYLES_GUIDE_SC_CORE_THEME_DESC',  'Theme helpers (logo, icon URLs)');


// ─────────────────────────────────────────────────────────────────────────
// 10. Sidebar Help widget + About page (info / contact / support)
// ─────────────────────────────────────────────────────────────────────────

// Menu / page caption
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT',                  'About');

// Sidebar help widget
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_CAPTION',           'About this plugin');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_TAGLINE',           '8 professional Bootstrap 5 maintenance-page templates with multilingual copy editor and integrated user guide.');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_TIP',               'Tip: install the theme stub once and switch templates anytime — no code changes needed.');
define('LAN_PLUGIN_SITEDOWN_STYLES_HELP_MORE',              'More info & support');

// Shared button labels (sidebar + About page)
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_DOCS',               'Documentation');
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_SUPPORT',            'Support');
define('LAN_PLUGIN_SITEDOWN_STYLES_BTN_DONATE',             'Donate');

// About page sections
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_RELEASED',         'Released');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_RELEASED_UNDER',   'Released under');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_METADATA',         'Plugin information');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_AUTHOR',           'Author');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_AGENCY',           'Agency / Website');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_CONTACT',          'Contact email');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_LICENSE',          'License');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_DESCRIPTION',      'Description');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_CHANGELOG_HINT',   'See full version history in');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_SUPPORT',          'Help, support & contributions');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_SUPPORT_INTRO',    'This plugin is free and open-source. Use the buttons below to read the docs, report a bug, browse the source on GitHub, or support the project with a donation.');

// About page action buttons
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_BTN_BUG',          'Report a bug');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_BTN_REPO',         'GitHub repository');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_BTN_CHANGELOG',    'Changelog');
define('LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_BTN_REVIEW',       'Leave a review');
