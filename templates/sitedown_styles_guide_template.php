<?php
/*
 * Sitedown Styles — Admin User Guide template (e107 array template).
 *
 * Architecture mirrors the canonical e107 `booking` plugin:
 *   - One key per tab (overview, install, configuration, ...).
 *   - HTML uses the SAME class names as booking (.bg-*) scoped under
 *     .sitedown-styles-guide, so we inherit the proven layout/CSS pattern.
 *   - Placeholders {SSG_*} resolved by the shortcode batch
 *     plugin_sitedown_styles_sitedown_styles_guide_shortcodes.
 *   - {TOK_*} placeholders return literal {…} tokens for documentation purposes.
 *
 * Loaded by:  e107::getTemplate('sitedown_styles', 'sitedown_styles_guide')
 * Theme override path:
 *   e107_themes/<theme>/templates/sitedown_styles/sitedown_styles_guide_template.php
 */

if (!defined('e107_INIT')) { exit; }


// ════════════════════════════════════════════════════════════════════════════
// TAB OVERVIEW
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['overview'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-info-circle"></i> {SSG_OVERVIEW_TITLE}</h4>
    <p class="bg-overview-intro">{SSG_OVERVIEW_P1}</p>
</div>

<h5 class="bg-section-title"><i class="fa fa-rocket"></i> {SSG_LABEL_QUICK_START}</h5>
<div class="bg-flow-bar">
    <div class="bg-flow-step">
        <span class="bg-flow-num">1</span>
        <span class="bg-flow-label">{SSG_LABEL_INSTALL}</span>
    </div>
    <span class="bg-flow-arrow">→</span>
    <div class="bg-flow-step">
        <span class="bg-flow-num">2</span>
        <span class="bg-flow-label">{SSG_LABEL_PICK_TEMPLATE}</span>
    </div>
    <span class="bg-flow-arrow">→</span>
    <div class="bg-flow-step">
        <span class="bg-flow-num">3</span>
        <span class="bg-flow-label">{SSG_LABEL_CUSTOMIZE}</span>
    </div>
    <span class="bg-flow-arrow">→</span>
    <div class="bg-flow-step">
        <span class="bg-flow-num">4</span>
        <span class="bg-flow-label">{SSG_LABEL_ACTIVATE}</span>
    </div>
</div>

<h5 class="bg-section-title"><i class="fa fa-star"></i> {SSG_LABEL_HIGHLIGHTS}</h5>
<div class="bg-features-grid">
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-th-large"></i></div>
        <strong>8 {SSG_LABEL_TEMPLATES}</strong>
        <span>{SSG_LABEL_TEMPLATES_DESC}</span>
    </div>
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-lightbulb-o"></i></div>
        <strong>{SSG_LABEL_NO_BUILD}</strong>
        <span>{SSG_OVERVIEW_TIP}</span>
    </div>
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-exclamation-triangle"></i></div>
        <strong>{SSG_LABEL_THEME_REQUIRED}</strong>
        <span>{SSG_OVERVIEW_WARN}</span>
    </div>
</div>';


// ════════════════════════════════════════════════════════════════════════════
// TAB INSTALL
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['install'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-download"></i> {SSG_INSTALL_TITLE}</h4>
</div>

<ol>
    <li>{SSG_INSTALL_S1}</li>
    <li>{SSG_INSTALL_S2}</li>
    <li>{SSG_INSTALL_S3}</li>
    <li>{SSG_INSTALL_S4}</li>
    <li>{SSG_INSTALL_S5}</li>
</ol>

<div class="alert alert-info">
    <i class="fa fa-info-circle"></i> {SSG_INSTALL_NOTE}
</div>


<!-- ─────────────────────────────────────────────────────────────────────
     Theme integration — step by step (for non-technical users)
     Visual style aligned with the admin About page (panel-default + media).
     ───────────────────────────────────────────────────────────────────── -->
<h4 style="margin-top:30px;"><i class="fa fa-puzzle-piece"></i> {SSG_THEME_TITLE}</h4>
<p>{SSG_THEME_INTRO}</p>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-folder-open"></i> {SSG_THEME_FILE_HEADING}</div>
    <div class="panel-body">
        <p class="text-muted">{SSG_THEME_FILE_DESC}</p>
        <div class="media">
            <div class="media-left media-middle">
                <span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
                    <i class="fa fa-file-code-o"></i>
                </span>
            </div>
            <div class="media-body">
                <small class="text-muted text-uppercase">{SSG_THEME_FILE_LOCATION_LABEL}</small><br>
                <code>e107_plugins/sitedown_styles/theme_integration/sitedown_template.php</code>
            </div>
        </div>
    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading"><i class="fa fa-arrow-right"></i> {SSG_THEME_TARGET_HEADING}</div>
    <div class="panel-body">
        <p class="text-muted">{SSG_THEME_TARGET_DESC}</p>
        <div class="media">
            <div class="media-left media-middle">
                <span class="text-success" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
                    <i class="fa fa-folder"></i>
                </span>
            </div>
            <div class="media-body">
                <small class="text-muted text-uppercase">{SSG_THEME_TARGET_HEADING}</small><br>
                <code>e107_themes/&lt;your_active_theme&gt;/templates/sitedown_template.php</code>
            </div>
        </div>
        <p class="text-muted small" style="margin-top:12px;margin-bottom:0">
            <i class="fa fa-info-circle"></i> {SSG_THEME_TARGET_HINT}
        </p>
        <p class="text-muted small" style="margin-bottom:0">
            <i class="fa fa-question-circle"></i> {SSG_THEME_FIND_THEME}
        </p>
    </div>
</div>

<h5 style="margin-top:25px;"><i class="fa fa-list-ol"></i> {SSG_THEME_METHODS_TITLE}</h5>
<p class="text-muted">{SSG_THEME_METHODS_INTRO}</p>

<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-cloud-upload"></i> {SSG_THEME_M1_TITLE}</div>
        <div class="panel-body">
            <ol class="text-muted">
                <li>{SSG_THEME_M1_S1}</li>
                <li>{SSG_THEME_M1_S2}</li>
                <li>{SSG_THEME_M1_S3}</li>
                <li>{SSG_THEME_M1_S4}</li>
            </ol>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-server"></i> {SSG_THEME_M2_TITLE}</div>
        <div class="panel-body">
            <ol class="text-muted">
                <li>{SSG_THEME_M2_S1}</li>
                <li>{SSG_THEME_M2_S2}</li>
                <li>{SSG_THEME_M2_S3}</li>
                <li>{SSG_THEME_M2_S4}</li>
            </ol>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-heading"><i class="fa fa-terminal"></i> {SSG_THEME_M3_TITLE}</div>
        <div class="panel-body">
            <p class="text-muted">{SSG_THEME_M3_DESC}</p>
            <div class="media">
                <div class="media-left media-middle">
                    <span class="text-muted" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
                        <i class="fa fa-terminal"></i>
                    </span>
                </div>
                <div class="media-body">
                    <code>cp e107_plugins/sitedown_styles/theme_integration/sitedown_template.php  e107_themes/&lt;your_theme&gt;/templates/sitedown_template.php</code>
                </div>
            </div>
        </div>
    </div>
</div>

<h5 style="margin-top:25px;"><i class="fa fa-check-circle"></i> {SSG_THEME_VERIFY_TITLE}</h5>
<ol>
    <li>{SSG_THEME_VERIFY_S1}</li>
    <li>{SSG_THEME_VERIFY_S2}</li>
    <li>{SSG_THEME_VERIFY_S3}</li>
</ol>

<div class="alert alert-warning">
    <i class="fa fa-exclamation-triangle"></i> <strong>{SSG_THEME_WARN_LABEL}</strong> {SSG_THEME_WARN}
</div>

<div class="alert alert-success">
    <i class="fa fa-lightbulb-o"></i> <strong>{SSG_THEME_TIP_LABEL}</strong> {SSG_THEME_TIP}
</div>';


// ════════════════════════════════════════════════════════════════════════════
// TAB CONFIGURATION
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['configuration'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-cog"></i> {SSG_CONFIG_TITLE}</h4>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>{SSG_TBL_TAB}</th>
            <th>{SSG_TBL_PREF}</th>
            <th>{SSG_TBL_PURPOSE}</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><strong>{SSG_TBL_ROW_TPL}</strong></td>
            <td><code>sitedown_active_style</code></td>
            <td>{SSG_CONFIG_STYLE}</td>
        </tr>
        <tr>
            <td><strong>{SSG_TBL_ROW_CONTENT}</strong></td>
            <td><code>sitedown_custom_title</code><br><code>sitedown_custom_subtitle</code><br><code>sitedown_custom_logo_url</code></td>
            <td>{SSG_CONFIG_CONTENT}</td>
        </tr>
        <tr>
            <td><strong>{SSG_TBL_ROW_COUNTDOWN}</strong></td>
            <td><code>sitedown_countdown_enabled</code><br><code>sitedown_countdown_date</code><br><code>sitedown_progress_*</code></td>
            <td>{SSG_CONFIG_COUNTDOWN}</td>
        </tr>
        <tr>
            <td><strong>{SSG_TBL_ROW_SOCIAL}</strong></td>
            <td><code>sitedown_social_*</code><br><code>sitedown_newsletter_enabled</code></td>
            <td>{SSG_CONFIG_SOCIAL}</td>
        </tr>
        <tr>
            <td><strong>{SSG_TBL_ROW_CONTACT}</strong></td>
            <td><code>sitedown_contact_phone</code><br><code>sitedown_contact_email</code></td>
            <td>{SSG_CONFIG_CONTACT}</td>
        </tr>
    </tbody>
</table>

<p>{SSG_CONFIG_NOTE}</p>


<!-- ─────────────────────────────────────────────────────────────────────
     Texts / Copy editor section
     ───────────────────────────────────────────────────────────────────── -->
<h4 style="margin-top:30px;"><i class="fa fa-pencil"></i> {SSG_TEXTS_TITLE}</h4>
<p>{SSG_TEXTS_INTRO}</p>

<ol>
    <li>{SSG_TEXTS_S1}</li>
    <li>{SSG_TEXTS_S2}</li>
    <li>{SSG_TEXTS_S3}</li>
    <li>{SSG_TEXTS_S4}</li>
</ol>

<div class="alert alert-info">
    <i class="fa fa-info-circle"></i> {SSG_TEXTS_NOTE}
</div>


<!-- ─────────────────────────────────────────────────────────────────────
     Multilingual content
     ───────────────────────────────────────────────────────────────────── -->
<h4 style="margin-top:30px;"><i class="fa fa-globe"></i> {SSG_LANG_TITLE}</h4>
<p>{SSG_LANG_INTRO}</p>

<div class="alert alert-success">
    <i class="fa fa-lightbulb-o"></i> <strong>{SSG_LANG_TIP_LABEL}</strong> {SSG_LANG_TIP}
</div>

<p>{SSG_LANG_OVERRIDE}</p>

<p><strong>{SSG_LANG_ADD_TITLE}</strong> {SSG_LANG_ADD}</p>


<!-- ─────────────────────────────────────────────────────────────────────
     Best practices
     ───────────────────────────────────────────────────────────────────── -->
<div class="alert alert-warning" style="margin-top:25px;">
    <i class="fa fa-exclamation-triangle"></i> <strong>{SSG_CFG_BEST_TITLE}</strong>
    <ul style="margin-top:8px; margin-bottom:0;">
        <li>{SSG_CFG_BEST_1}</li>
        <li>{SSG_CFG_BEST_2}</li>
        <li>{SSG_CFG_BEST_3}</li>
        <li>{SSG_CFG_BEST_4}</li>
    </ul>
</div>';


// ════════════════════════════════════════════════════════════════════════════
// TAB ACTIVATION
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['activation'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-power-off"></i> {SSG_ACTIV_TITLE}</h4>
    <p class="bg-overview-intro">{SSG_ACTIV_INTRO}</p>
</div>

<ol>
    <li>{SSG_ACTIV_S1}</li>
    <li>{SSG_ACTIV_S2}</li>
    <li>{SSG_ACTIV_S3}</li>
</ol>

<div class="alert alert-info">
    <i class="fa fa-info-circle"></i> {SSG_ACTIV_BYPASS}
</div>';


// ════════════════════════════════════════════════════════════════════════════
// TAB PLACEHOLDERS / SHORTCODES
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['shortcodes'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-code"></i> {SSG_SC_TITLE}</h4>
    <p class="bg-overview-intro">{SSG_SC_INTRO}</p>
</div>

<h5 class="bg-section-title"><i class="fa fa-cube"></i> {SSG_SC_PLUGIN}</h5>
<table class="table table-striped">
    <tbody>
        <tr><td><code>{TOK_TITLE}</code></td><td>{SSG_SC_PLUGIN_TITLE_DESC}</td></tr>
        <tr><td><code>{TOK_SUBTITLE}</code></td><td>{SSG_SC_PLUGIN_SUBTITLE_DESC}</td></tr>
        <tr><td><code>{TOK_LOGO}</code></td><td>{SSG_SC_PLUGIN_LOGO_DESC}</td></tr>
        <tr><td><code>{TOK_COUNTDOWN}</code> / <code>{TOK_COUNTDOWN_JS}</code></td><td>{SSG_SC_PLUGIN_COUNTDOWN_DESC}</td></tr>
        <tr><td><code>{TOK_PROGRESS}</code></td><td>{SSG_SC_PLUGIN_PROGRESS_DESC}</td></tr>
        <tr><td><code>{TOK_NEWSLETTER}</code></td><td>{SSG_SC_PLUGIN_NEWSLETTER_DESC}</td></tr>
        <tr><td><code>{TOK_SOCIAL}</code></td><td>{SSG_SC_PLUGIN_SOCIAL_DESC}</td></tr>
        <tr><td><code>{TOK_PHONE}</code> / <code>{TOK_EMAIL}</code></td><td>{SSG_SC_PLUGIN_CONTACT_DESC}</td></tr>
    </tbody>
</table>

<h5 class="bg-section-title"><i class="fa fa-cogs"></i> {SSG_SC_CORE}</h5>
<table class="table table-striped">
    <tbody>
        <tr><td><code>{TOK_SITENAME}</code> / <code>{TOK_SITEURL}</code></td><td>{SSG_SC_CORE_SITE_DESC}</td></tr>
        <tr><td><code>{TOK_SITEDOWN_TEXT}</code></td><td>{SSG_SC_CORE_TEXT_DESC}</td></tr>
        <tr><td><code>{TOK_SITEDOWN_PAGENAME}</code> / <code>{TOK_SITEDOWN_FAVICON}</code></td><td>{SSG_SC_CORE_PAGE_DESC}</td></tr>
        <tr><td><code>{TOK_LOGO_HELPER}</code> / <code>{TOK_XURL_ICONS}</code></td><td>{SSG_SC_CORE_THEME_DESC}</td></tr>
    </tbody>
</table>

<div class="alert alert-warning">
    <i class="fa fa-exclamation-triangle"></i> {SSG_SC_DUAL}
</div>';


// ════════════════════════════════════════════════════════════════════════════
// TAB TROUBLESHOOTING
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['troubleshoot'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-wrench"></i> {SSG_TS_TITLE}</h4>
</div>

<dl>
    <dt>{SSG_TS_Q1}</dt>
    <dd>{SSG_TS_A1}</dd>

    <dt>{SSG_TS_Q2}</dt>
    <dd>{SSG_TS_A2}</dd>

    <dt>{SSG_TS_Q3}</dt>
    <dd>{SSG_TS_A3}</dd>

    <dt>{SSG_TS_Q4}</dt>
    <dd>{SSG_TS_A4}</dd>

    <dt>{SSG_TS_Q5}</dt>
    <dd>{SSG_TS_A5}</dd>

    <dt>{SSG_TS_Q6}</dt>
    <dd>{SSG_TS_A6}</dd>
</dl>';


// ════════════════════════════════════════════════════════════════════════════
// TAB CREDITS
// ════════════════════════════════════════════════════════════════════════════

$SITEDOWN_STYLES_GUIDE_TEMPLATE['credits'] = '
<div class="bg-overview-header">
    <h4><i class="fa fa-heart"></i> {SSG_CREDITS_TITLE}</h4>
    <p class="bg-overview-intro">{SSG_CREDITS_INTRO}</p>
</div>

<h5 class="bg-section-title"><i class="fa fa-user"></i> {SSG_CREDITS_AUTHOR_TITLE}</h5>
<p>{SSG_CREDITS_AUTHOR_TEXT}</p>

<h5 class="bg-section-title"><i class="fa fa-cubes"></i> {SSG_CREDITS_TECH_TITLE}</h5>
<div class="bg-features-grid">
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-server"></i></div>
        <strong>e107 CMS</strong>
        <span>{SSG_CREDITS_TECH_E107}</span>
    </div>
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-bold"></i></div>
        <strong>Bootstrap 5</strong>
        <span>{SSG_CREDITS_TECH_BS}</span>
    </div>
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-flag"></i></div>
        <strong>Font Awesome</strong>
        <span>{SSG_CREDITS_TECH_FA}</span>
    </div>
    <div class="bg-feature-card">
        <div class="bg-feature-icon"><i class="fa fa-th"></i></div>
        <strong>Bootstrap Icons</strong>
        <span>{SSG_CREDITS_TECH_BI}</span>
    </div>
</div>

<h5 class="bg-section-title"><i class="fa fa-handshake-o"></i> {SSG_CREDITS_THANKS_TITLE}</h5>
<ul>
    <li>{SSG_CREDITS_THANKS_E107TEAM}</li>
    <li>{SSG_CREDITS_THANKS_TESTERS}</li>
    <li>{SSG_CREDITS_THANKS_TRANSLATORS}</li>
</ul>

<div class="alert alert-info">
    <i class="fa fa-balance-scale"></i> {SSG_CREDITS_LICENSE}
</div>

<p class="text-muted">{SSG_CREDITS_GETINVOLVED}</p>';
