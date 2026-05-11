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
 *  10. Sidebar Help widget + About page
 *
 * NOTE: section 9 ("In-Admin User Guide") was extracted in v2.1.0 to
 * languages/English/English_admin_help.php — lazy-loaded by guidePage()
 * via e107::lan('sitedown_styles', 'admin_help', true).
 * See docs/architecture/USER_GUIDE_PATTERN.md.
 *
 * @package     sitedown_styles
 * @version     2.1.0
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

// About page sections — MIGRATED to languages/<Lang>/<Lang>_admin_about.php
// (4-layer pattern, lazy-loaded by aboutPage()). The constants previously
// defined here (LAN_PLUGIN_SITEDOWN_STYLES_ABOUT_*) are no longer referenced
// by any code in this plugin and have been removed. See
// docs/architecture/USER_GUIDE_PATTERN.md for the rationale.
