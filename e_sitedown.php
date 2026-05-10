<?php
/*
 * Sitedown Styles Plugin - Sitedown Hook
 * This file intercepts the sitedown template rendering
 * 
 * @package     sitedown_styles
 * @version     1.0
 */

if (!defined('e107_INIT')) { exit; }

/**
 * Sitedown Template Hook Class
 * 
 * This class provides the mechanism to override e107's default
 * sitedown template with custom styled templates from this plugin.
 */
class sitedown_styles_sitedown
{
    /**
     * Plugin preferences
     */
    protected $plugPrefs;
    
    /**
     * Template parser
     */
    protected $tp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plugPrefs = e107::getPlugConfig('sitedown_styles')->getPref();
        $this->tp = e107::getParser();
    }

    /**
     * Get the active template content. Called by sitedown.php (or by the
     * theme integration stub) to obtain the final HTML body.
     *
     * Loads the master skeleton (`templates/sitedown_styles_template.php`)
     * and substitutes the {SS_*} placeholders via buildVars(). Core e107
     * placeholders ({SITENAME}, {SITEDOWN_*}, {LOGO}, …) are left intact
     * for the final parseTemplate() pass in sitedown.php.
     *
     * @return string Template HTML (empty string if the master file is missing).
     */
    public function getTemplate()
    {
        $masterPath = e_PLUGIN . 'sitedown_styles/templates/sitedown_styles_template.php';
        if (!file_exists($masterPath)) {
            return '';
        }

        // The master file SETS $SITEDOWN_TEMPLATE.
        $SITEDOWN_TEMPLATE = '';
        include($masterPath);

        if (empty($SITEDOWN_TEMPLATE)) {
            return '';
        }

        $vars = $this->buildVars($this->getActiveStyle());
        return strtr($SITEDOWN_TEMPLATE, $vars);
    }

    /**
     * Build the {SS_*} variable map consumed by the master template.
     *
     * Each block-level placeholder ({SS_BADGE_BLOCK}, {SS_NEWSLETTER_BLOCK}, ...)
     * is rendered as full HTML or returned as an empty string when disabled.
     * Empty blocks collapse via the `.ss-block:empty { display:none }` rule
     * defined in css/_base.css.
     *
     * @param string $style Active skin slug (agency, business, ...)
     * @return array<string,string> placeholder => value
     */
    protected function buildVars($style)
    {
        $cssBase = e_PLUGIN_ABS . 'sitedown_styles/css/_base.css';
        $cssSkin = e_PLUGIN_ABS . 'sitedown_styles/css/' . $style . '.css';

        // Cache-buster controlled by the `sitedown_css_version` pref.
        // Bump it from admin (or via plugin.xml on a fresh install) whenever
        // shared CSS changes ship.
        $ver = !empty($this->plugPrefs['sitedown_css_version'])
             ? (int)$this->plugPrefs['sitedown_css_version']
             : 1;
        $cssBase .= '?v=' . $ver;
        $cssSkin .= '?v=' . $ver;

        $copy = $this->getTplCopy($style);

        // ---- Block renderers ----
        $logoBlock        = $this->renderLogoBlock($style, $copy);
        $badgeBlock       = $this->renderBadgeBlock($copy);
        $titleBlock       = $this->renderTitleBlock($copy);
        $descriptionBlock = '<p class="ss-description">' . $this->getCustomSubtitle() . '</p>';
        $featuresBlock    = $this->renderFeaturesBlock($style, $copy);
        $countdownBlock   = $this->renderCountdownBlock($copy);
        $newsletterBlock  = $this->renderNewsletterBlockV2();
        $contactBlock     = $this->renderContactBlock();
        $extraBlock       = $this->renderExtraBlock($style, $copy);
        $socialBlock      = $this->getSocialHtml();   // already wraps in .social-links — see note below
        $quoteBlock       = isset($copy['{SITEDOWN_STYLES_TPL_QUOTE}'])
                          ? '<p class="ss-quote">' . $copy['{SITEDOWN_STYLES_TPL_QUOTE}'] . '</p>'
                          : '';

        // ---- Optional skin-specific decorative layer ----
        $decor = $this->renderDecor($style, $copy);

        // ---- Inline CSS variable overrides (admin colors, future) ----
        $inlineVars = $this->renderInlineVars();

        // ---- Optional Google Font per skin ----
        $fontCss = $this->renderFontCss($style);

        return array(
            '{SS_LANG}'              => defined('CORE_LC') ? CORE_LC : 'en',
            '{SS_DIR}'               => (defined('TEXTDIRECTION') && TEXTDIRECTION === 'rtl') ? ' dir="rtl"' : '',
            '{SS_STYLE}'             => $style,
            '{SS_BASE_CSS}'          => $cssBase,
            '{SS_STYLE_CSS}'         => $cssSkin,
            '{SS_FONT_CSS}'          => $fontCss,
            '{SS_INLINE_VARS}'       => $inlineVars,
            '{SS_DECOR}'             => $decor,
            '{SS_MAIN_MOD}'          => $this->getMainModifier($style),
            '{SS_LOGO_BLOCK}'        => $logoBlock,
            '{SS_BADGE_BLOCK}'       => $badgeBlock,
            '{SS_TITLE_BLOCK}'       => $titleBlock,
            '{SS_DESCRIPTION_BLOCK}' => $descriptionBlock,
            '{SS_FEATURES_BLOCK}'    => $featuresBlock,
            '{SS_COUNTDOWN_BLOCK}'   => $countdownBlock,
            '{SS_NEWSLETTER_BLOCK}'  => $newsletterBlock,
            '{SS_CONTACT_BLOCK}'     => $contactBlock,
            '{SS_EXTRA_BLOCK}'       => $extraBlock,
            '{SS_SOCIAL_BLOCK}'      => $socialBlock,
            '{SS_QUOTE_BLOCK}'       => $quoteBlock,
            '{SS_COUNTDOWN_JS}'      => $this->getCountdownJs(),
        );
    }

    /**
     * Per-skin layout modifier class for .ss-main.
     * Defaults to 2-col grid (no class). Sparse skins use --single.
     */
    protected function getMainModifier($style)
    {
        $singleColSkins = array('agency', 'creative');
        return in_array($style, $singleColSkins, true) ? 'ss-main--single' : '';
    }

    /**
     * Render the logo block (header / brand area).
     *
     * Most skins just render <div class="ss-logo">{logo}</div>. The
     * restaurant skin needs a richer ornate brand block (decor icons +
     * tagline + ornament line) so it overrides here.
     *
     * @param string $style Active skin slug.
     * @param array  $copy  Per-style copy map.
     */
    protected function renderLogoBlock($style, array $copy)
    {
        $logo = $this->getLogoHtml();

        if ($style === 'restaurant') {
            $tagline = isset($copy['{SITEDOWN_STYLES_TPL_TAGLINE}'])
                     ? $copy['{SITEDOWN_STYLES_TPL_TAGLINE}']
                     : '';
            return '<div class="ss-restaurant-brand">'
                 . '<div class="ss-restaurant-icons">'
                 .   '<i class="bi bi-slash-lg ss-restaurant-fork"></i>'
                 .   '<div class="ss-restaurant-circle"><i class="bi bi-cup-hot"></i></div>'
                 .   '<i class="bi bi-slash-lg ss-restaurant-knife"></i>'
                 . '</div>'
                 . '<div class="ss-logo ss-logo--restaurant">' . $logo . '</div>'
                 . ($tagline !== '' ? '<p class="ss-restaurant-tagline">' . $tagline . '</p>' : '')
                 . '<div class="ss-restaurant-ornament">'
                 .   '<span class="ss-orn-line"></span>'
                 .   '<span class="ss-orn-diamond"></span>'
                 .   '<span class="ss-orn-line"></span>'
                 . '</div>'
                 . '</div>';
        }

        return '<div class="ss-logo">' . $logo . '</div>';
    }

    /**
     * Render the badge block (status pill above the title).
     */
    protected function renderBadgeBlock(array $copy)    {
        if (empty($copy['{SITEDOWN_STYLES_TPL_BADGE}'])) {
            return '';
        }
        return '<div class="ss-badge"><i class="bi bi-circle-fill"></i> '
             . $copy['{SITEDOWN_STYLES_TPL_BADGE}'] . '</div>';
    }

    /**
     * Render the title block. Supports the common HEAD1 / HEAD2 split where
     * HEAD2 receives the .ss-accent gradient treatment.
     *
     * Optional HEAD3 line is supported for skins that use a 3-line title
     * (e.g. creative, construction). All lines are wrapped in .ss-line so
     * skins can animate them individually.
     */
    protected function renderTitleBlock(array $copy)
    {
        // Admin override (`sitedown_custom_title`) always wins. When set,
        // it replaces the entire HEAD1/HEAD2/HEAD3 split with a single
        // headline, which is exactly what users expect after typing in the
        // "Custom title" field of the settings page.
        $customTitle = isset($this->plugPrefs['sitedown_custom_title'])
                     ? trim((string)$this->plugPrefs['sitedown_custom_title'])
                     : '';
        if ($customTitle !== '') {
            return '<h1 class="ss-title"><span class="ss-line ss-accent">'
                 . $this->tp->toHTML($customTitle, true)
                 . '</span></h1>';
        }

        $head1 = isset($copy['{SITEDOWN_STYLES_TPL_HEAD1}']) ? $copy['{SITEDOWN_STYLES_TPL_HEAD1}'] : '';
        $head2 = isset($copy['{SITEDOWN_STYLES_TPL_HEAD2}']) ? $copy['{SITEDOWN_STYLES_TPL_HEAD2}'] : '';
        $head3 = isset($copy['{SITEDOWN_STYLES_TPL_HEAD3}']) ? $copy['{SITEDOWN_STYLES_TPL_HEAD3}'] : '';

        if ($head1 === '' && $head2 === '' && $head3 === '') {
            return '<h1 class="ss-title">' . $this->getCustomTitle() . '</h1>';
        }

        $lines = '';
        if ($head1 !== '') { $lines .= '<span class="ss-line">' . $head1 . '</span>'; }
        if ($head2 !== '') { $lines .= '<span class="ss-line ss-accent">' . $head2 . '</span>'; }
        if ($head3 !== '') { $lines .= '<span class="ss-line">' . $head3 . '</span>'; }

        return '<h1 class="ss-title">' . $lines . '</h1>';
    }

    /**
     * Render the countdown block with optional label.
     *
     * v2 emits its own markup using the .ss-countdown* class hierarchy so
     * skins (css/<style>.css) can style it via CSS variables. The legacy
     * getCountdownHtml() / getCountdownJs() pair (used by the v1 monolithic
     * templates) keeps emitting the old `.countdown / .countdown-item / ...`
     * markup — both layers coexist without interfering.
     *
     * The element IDs (#days/#hours/#minutes/#seconds) are kept identical
     * so the existing countdown JS in getCountdownJs() drives both layers.
     */
    protected function renderCountdownBlock(array $copy)
    {
        if (empty($this->plugPrefs['sitedown_countdown_enabled'])) {
            return '';
        }

        $label = !empty($copy['{SITEDOWN_STYLES_TPL_CDLABEL}'])
               ? '<div class="ss-countdown-label">' . $copy['{SITEDOWN_STYLES_TPL_CDLABEL}'] . '</div>'
               : '';

        $days    = defset('LAN_DAYS',    'Days');
        $hours   = defset('LAN_HOURS',   'Hours');
        $minutes = defset('LAN_MINUTES', 'Min');
        $seconds = defset('LAN_SECONDS', 'Sec');

        return '<div class="ss-countdown-wrap">'
             . $label
             . '<div class="ss-countdown" id="countdown">'
             .   '<div class="ss-countdown-item">'
             .     '<div class="ss-countdown-value" id="days">00</div>'
             .     '<div class="ss-countdown-unit">' . $days . '</div>'
             .   '</div>'
             .   '<div class="ss-countdown-item">'
             .     '<div class="ss-countdown-value" id="hours">00</div>'
             .     '<div class="ss-countdown-unit">' . $hours . '</div>'
             .   '</div>'
             .   '<div class="ss-countdown-item">'
             .     '<div class="ss-countdown-value" id="minutes">00</div>'
             .     '<div class="ss-countdown-unit">' . $minutes . '</div>'
             .   '</div>'
             .   '<div class="ss-countdown-item">'
             .     '<div class="ss-countdown-value" id="seconds">00</div>'
             .     '<div class="ss-countdown-unit">' . $seconds . '</div>'
             .   '</div>'
             . '</div>'
             . '</div>';
    }

    /**
     * Render newsletter block in v2 markup. Behaviour is wired by the
     * shared `js/sitedown.js` (SitedownStyles.initNewsletter).
     */
    protected function renderNewsletterBlockV2()
    {
        if (empty($this->plugPrefs['sitedown_newsletter_enabled'])) {
            return '';
        }
        $title  = defset('LAN_SITEDOWN_NOTIFY', "Get notified when we're back");
        $email  = defset('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL_PH', 'Enter your email');
        $notify = defset('LAN_NOTIFY_ME', 'Notify Me');

        return '<div class="ss-newsletter">'
             . '<p class="ss-newsletter-title">' . $title . '</p>'
             . '<form class="ss-newsletter-form">'
             .   '<input type="email" class="ss-input" placeholder="' . $email . '" required>'
             .   '<button type="submit" class="ss-btn">' . $notify . '</button>'
             . '</form>'
             . '</div>';
    }

    /**
     * Render contact (phone / email) block.
     */
    protected function renderContactBlock()
    {
        $phone = $this->getPhone();
        $email = $this->getEmail();

        if ($phone === '' && $email === '') {
            return '';
        }

        $html = '<div class="ss-contact">';
        if ($phone !== '') {
            $html .= '<a href="tel:' . $this->tp->toAttribute($phone) . '">'
                  .  '<i class="bi bi-telephone-fill"></i> ' . $phone . '</a>';
        }
        if ($email !== '') {
            $html .= '<a href="mailto:' . $this->tp->toAttribute($email) . '">'
                  .  '<i class="bi bi-envelope-fill"></i> ' . $email . '</a>';
        }
        $html .= '</div>';
        return $html;
    }

    /**
     * Skin-specific features block (metrics row for marketing, etc.).
     * Returns HTML inserted in the .ss-left column after the description.
     *
     * @param string $style Active skin slug.
     * @param array  $copy  Per-style copy map.
     */
    protected function renderFeaturesBlock($style, array $copy)
    {
        switch ($style) {
            case 'marketing':
                $m1 = isset($copy['{SITEDOWN_STYLES_TPL_M1}']) ? $copy['{SITEDOWN_STYLES_TPL_M1}'] : '';
                $m2 = isset($copy['{SITEDOWN_STYLES_TPL_M2}']) ? $copy['{SITEDOWN_STYLES_TPL_M2}'] : '';
                $m3 = isset($copy['{SITEDOWN_STYLES_TPL_M3}']) ? $copy['{SITEDOWN_STYLES_TPL_M3}'] : '';
                return '<div class="ss-metrics">'
                     . '<div class="ss-metric"><div class="ss-metric-value">99.9%</div><div class="ss-metric-label">' . $m1 . '</div></div>'
                     . '<div class="ss-metric"><div class="ss-metric-value">2x</div><div class="ss-metric-label">' . $m2 . '</div></div>'
                     . '<div class="ss-metric"><div class="ss-metric-value">+50</div><div class="ss-metric-label">' . $m3 . '</div></div>'
                     . '</div>';

            case 'gardening':
                $items = array(
                    array('bi-flower2',        'SVC1'),
                    array('bi-tree',           'SVC2'),
                    array('bi-droplet',        'SVC3'),
                    array('bi-calendar-check', 'SVC4'),
                );
                $html = '<div class="ss-services">';
                foreach ($items as $it) {
                    $key = '{SITEDOWN_STYLES_TPL_' . $it[1] . '}';
                    if (empty($copy[$key])) continue;
                    $html .= '<div class="ss-service-item">'
                          .   '<i class="bi ' . $it[0] . '"></i>'
                          .   '<span>' . $copy[$key] . '</span>'
                          . '</div>';
                }
                $html .= '</div>';
                return $html;

            case 'handyman':
                // Handyman service cards are rendered inside the fixed
                // `.ss-emerg-panel` aside (see renderDecor). Returning ''
                // here prevents the cards appearing twice (once in the
                // pitch column, once in the panel).
                return '';

            case 'construction':
                $items = array(
                    array('bi-building',     'SVC1'),
                    array('bi-brush',        'SVC2'),
                    array('bi-rulers',       'SVC3'),
                    array('bi-house-check',  'SVC4'),
                );
                $html = '<div class="ss-services-grid ss-services-grid--compact">';
                foreach ($items as $it) {
                    $key = '{SITEDOWN_STYLES_TPL_' . $it[1] . '}';
                    if (empty($copy[$key])) continue;
                    $html .= '<div class="ss-service-card">'
                          .   '<div class="ss-service-card-icon"><i class="bi ' . $it[0] . '"></i></div>'
                          .   '<span class="ss-service-card-name">' . $copy[$key] . '</span>'
                          . '</div>';
                }
                $html .= '</div>';
                return $html;

            case 'restaurant':
                $sitename = defined('SITENAME') ? SITENAME : '';
                $items = array(
                    array('bi-telephone', 'INFO1', $this->getPhone()),
                    array('bi-geo-alt',   'INFO2', $sitename),
                    array('bi-clock',     'INFO3', isset($copy['{SITEDOWN_STYLES_TPL_HOURS_VAL}']) ? $copy['{SITEDOWN_STYLES_TPL_HOURS_VAL}'] : ''),
                );
                $html = '<div class="ss-info-cards">';
                foreach ($items as $it) {
                    $labelKey = '{SITEDOWN_STYLES_TPL_' . $it[1] . '}';
                    $label = isset($copy[$labelKey]) ? $copy[$labelKey] : '';
                    $value = $it[2];
                    if ($label === '' && $value === '') continue;
                    $html .= '<div class="ss-info-card">'
                          .   '<div class="ss-info-icon"><i class="bi ' . $it[0] . '"></i></div>'
                          .   '<div class="ss-info-content">'
                          .     '<p class="ss-info-label">' . $label . '</p>'
                          .     '<p class="ss-info-value">' . $value . '</p>'
                          .   '</div>'
                          . '</div>';
                }
                $html .= '</div>';
                return $html;
        }
        return '';
    }

    /**
     * Skin-specific extra block (marketing dashboard chart+stats, future
     * service grids, etc.). Returns HTML inserted in the .ss-right column
     * after countdown / newsletter / contact.
     *
     * @param string $style Active skin slug.
     * @param array  $copy  Per-style copy map.
     */
    protected function renderExtraBlock($style, array $copy)
    {
        switch ($style) {
            case 'marketing':
                $title = isset($copy['{SITEDOWN_STYLES_TPL_DASH_TITLE}']) ? $copy['{SITEDOWN_STYLES_TPL_DASH_TITLE}'] : '';
                $badge = isset($copy['{SITEDOWN_STYLES_TPL_DASH_BADGE}']) ? $copy['{SITEDOWN_STYLES_TPL_DASH_BADGE}'] : '';
                $chart = isset($copy['{SITEDOWN_STYLES_TPL_CHART}'])      ? $copy['{SITEDOWN_STYLES_TPL_CHART}']      : '';
                $s1    = isset($copy['{SITEDOWN_STYLES_TPL_S1}'])         ? $copy['{SITEDOWN_STYLES_TPL_S1}']         : '';
                $s2    = isset($copy['{SITEDOWN_STYLES_TPL_S2}'])         ? $copy['{SITEDOWN_STYLES_TPL_S2}']         : '';
                $s3    = isset($copy['{SITEDOWN_STYLES_TPL_S3}'])         ? $copy['{SITEDOWN_STYLES_TPL_S3}']         : '';
                $email = defset('LAN_PLUGIN_SITEDOWN_STYLES_LBL_EMAIL', 'Email');

                $bars = '';
                for ($i = 1; $i <= 8; $i++) {
                    $bars .= '<div class="ss-chart-bar"></div>';
                }

                return '<div class="ss-dash-header">'
                     .   '<span class="ss-dash-title">' . $title . '</span>'
                     .   '<span class="ss-dash-badge">' . $badge . '</span>'
                     . '</div>'
                     . '<div class="ss-chart-section">'
                     .   '<div class="ss-chart-header">'
                     .     '<span class="ss-chart-title">' . $chart . '</span>'
                     .     '<span class="ss-chart-value">+127%</span>'
                     .   '</div>'
                     .   '<div class="ss-chart-bars">' . $bars . '</div>'
                     . '</div>'
                     . '<div class="ss-stats-row">'
                     .   '<div class="ss-stat-card"><div class="ss-stat-icon"><i class="bi bi-graph-up-arrow"></i></div><div class="ss-stat-value">SEO</div><div class="ss-stat-label">' . $s1 . '</div></div>'
                     .   '<div class="ss-stat-card"><div class="ss-stat-icon"><i class="bi bi-bullseye"></i></div><div class="ss-stat-value">Ads</div><div class="ss-stat-label">' . $s2 . '</div></div>'
                     .   '<div class="ss-stat-card"><div class="ss-stat-icon"><i class="bi bi-envelope"></i></div><div class="ss-stat-value">' . $email . '</div><div class="ss-stat-label">' . $s3 . '</div></div>'
                     . '</div>';

            case 'handyman':
                if (empty($this->plugPrefs['sitedown_progress_enabled'])) {
                    return '';
                }
                $value   = isset($this->plugPrefs['sitedown_progress_value'])
                         ? max(0, min(100, (int)$this->plugPrefs['sitedown_progress_value']))
                         : 75;
                $label   = defset('LAN_PROGRESS', 'Progress');
                return '<div class="ss-progress">'
                     .   '<div class="ss-progress-header">'
                     .     '<span class="ss-progress-label">' . $label . '</span>'
                     .     '<span class="ss-progress-value">' . $value . '%</span>'
                     .   '</div>'
                     .   '<div class="ss-progress-track">'
                     .     '<div class="ss-progress-fill" style="width:' . $value . '%"></div>'
                     .   '</div>'
                     . '</div>';

            case 'construction':
                $html = '';
                if (!empty($this->plugPrefs['sitedown_progress_enabled'])) {
                    $value = isset($this->plugPrefs['sitedown_progress_value'])
                           ? max(0, min(100, (int)$this->plugPrefs['sitedown_progress_value']))
                           : 75;
                    $label = defset('LAN_PROGRESS', 'Progress');
                    $html .= '<div class="ss-progress">'
                          .   '<div class="ss-progress-header">'
                          .     '<span class="ss-progress-label">' . $label . '</span>'
                          .     '<span class="ss-progress-value">' . $value . '%</span>'
                          .   '</div>'
                          .   '<div class="ss-progress-track">'
                          .     '<div class="ss-progress-fill" style="width:' . $value . '%"></div>'
                          .   '</div>'
                          . '</div>';
                }
                $emergLbl = isset($copy['{SITEDOWN_STYLES_TPL_EMERG}']) ? $copy['{SITEDOWN_STYLES_TPL_EMERG}'] : '';
                $phone    = $this->getPhone();
                if ($emergLbl !== '' && $phone !== '') {
                    $html .= '<div class="ss-emerg-box">'
                          .   '<p class="ss-emerg-box-title">' . $emergLbl . '</p>'
                          .   '<p class="ss-emerg-box-phone">'
                          .     '<a href="tel:' . $this->tp->toAttribute($phone) . '">' . $phone . '</a>'
                          .   '</p>'
                          . '</div>';
                }
                return $html;
        }
        return '';
    }

    /**
     * Skin-specific decorative layer (agency blobs, restaurant ornaments...).
     * Returns extra HTML inserted right inside <body> before .ss-stage.
     *
     * @param string $style Active skin slug.
     * @param array  $copy  Per-style copy map (for skins that need TPL_*
     *                      strings inside their decor markup, e.g. business
     *                      brand panel).
     */
    protected function renderDecor($style, array $copy = array())
    {
        switch ($style) {
            case 'agency':
                return '<div class="ss-decor"><span class="ss-blob ss-blob-1"></span><span class="ss-blob ss-blob-2"></span></div>';
            case 'creative':
                return '<div class="ss-decor">'
                     . '<span class="ss-blob ss-blob-1"></span>'
                     . '<span class="ss-blob ss-blob-2"></span>'
                     . '<span class="ss-blob ss-blob-3"></span>'
                     . '<span class="ss-shape ss-shape-1"></span>'
                     . '<span class="ss-shape ss-shape-2"></span>'
                     . '<span class="ss-shape ss-shape-3"></span>'
                     . '<span class="ss-shape ss-shape-4"></span>'
                     . '</div><div class="ss-noise"></div>';
            case 'marketing':
                return '<div class="ss-bg ss-bg--marketing">'
                     . '<div class="ss-bg-grid"></div>'
                     . '<span class="ss-bg-glow ss-bg-glow-1"></span>'
                     . '<span class="ss-bg-glow ss-bg-glow-2"></span>'
                     . '<span class="ss-data-stream"></span>'
                     . '<span class="ss-data-stream"></span>'
                     . '<span class="ss-data-stream"></span>'
                     . '<span class="ss-data-stream"></span>'
                     . '<span class="ss-data-stream"></span>'
                     . '<span class="ss-data-stream"></span>'
                     . '</div>';
            case 'gardening':
                return '<div class="ss-bg ss-bg--garden">'
                     . '<i class="bi bi-flower1 ss-leaf ss-leaf-1"></i>'
                     . '<i class="bi bi-flower2 ss-leaf ss-leaf-2"></i>'
                     . '<i class="bi bi-flower3 ss-leaf ss-leaf-3"></i>'
                     . '<i class="bi bi-tree ss-leaf ss-leaf-4"></i>'
                     . '<i class="bi bi-flower1 ss-leaf ss-leaf-5"></i>'
                     . '</div>';
            case 'handyman':
                $badge      = isset($copy['{SITEDOWN_STYLES_TPL_BADGE}'])       ? $copy['{SITEDOWN_STYLES_TPL_BADGE}']       : '';
                $emergTitle = isset($copy['{SITEDOWN_STYLES_TPL_EMERG_TITLE}']) ? $copy['{SITEDOWN_STYLES_TPL_EMERG_TITLE}'] : '';
                $emergText  = isset($copy['{SITEDOWN_STYLES_TPL_EMERG_TEXT}'])  ? $copy['{SITEDOWN_STYLES_TPL_EMERG_TEXT}']  : '';
                $callLabel  = isset($copy['{SITEDOWN_STYLES_TPL_CALL}'])        ? $copy['{SITEDOWN_STYLES_TPL_CALL}']        : '';
                $availLabel = isset($copy['{SITEDOWN_STYLES_TPL_AVAIL}'])       ? $copy['{SITEDOWN_STYLES_TPL_AVAIL}']       : '';
                $phone      = $this->getPhone();
                $phoneHtml  = ($phone !== '')
                            ? '<a href="tel:' . $this->tp->toAttribute($phone) . '">' . $phone . '</a>'
                            : '';

                // Service cards live INSIDE the emergency panel between the
                // pitch text and the contact block (user-requested layout).
                // Same data set used previously by renderFeaturesBlock —
                // duplicated here intentionally to keep the panel self-
                // contained; renderFeaturesBlock() now returns '' for
                // handyman so the cards don't appear twice.
                $svcItems = array(
                    array('bi-lightning-charge', 'SVC1'),
                    array('bi-droplet',          'SVC2'),
                    array('bi-key',              'SVC3'),
                    array('bi-wind',             'SVC4'),
                );
                $cardsHtml = '<div class="ss-services-grid ss-emerg-services">';
                foreach ($svcItems as $it) {
                    $key = '{SITEDOWN_STYLES_TPL_' . $it[1] . '}';
                    if (empty($copy[$key])) continue;
                    $cardsHtml .= '<div class="ss-service-card">'
                               .   '<div class="ss-service-card-icon"><i class="bi ' . $it[0] . '"></i></div>'
                               .   '<span class="ss-service-card-name">' . $copy[$key] . '</span>'
                               . '</div>';
                }
                $cardsHtml .= '</div>';

                return '<aside class="ss-emerg-panel">'
                     .   '<div class="ss-emerg-badge"><i class="bi bi-exclamation-triangle"></i> ' . $badge . '</div>'
                     .   '<h2 class="ss-emerg-title">' . $emergTitle . '</h2>'
                     .   '<p class="ss-emerg-text">' . $emergText . '</p>'
                     .   $cardsHtml
                     .   '<div class="ss-emerg-contact">'
                     .     '<p class="ss-emerg-call-label">' . $callLabel . '</p>'
                     .     '<p class="ss-emerg-phone">' . $phoneHtml . '</p>'
                     .     ($availLabel !== '' ? '<p class="ss-emerg-avail"><i class="bi bi-circle-fill"></i> ' . $availLabel . '</p>' : '')
                     .   '</div>'
                     .   '<div class="ss-emerg-stripe"></div>'
                     . '</aside>';
            case 'construction':
                return '<div class="ss-warning-stripe ss-warning-stripe--top"></div>'
                     . '<div class="ss-warning-stripe ss-warning-stripe--bottom"></div>';
            case 'restaurant':
                return '<div class="ss-bg ss-bg--restaurant"></div>'
                     . '<div class="ss-decor-line ss-decor-line--top"></div>'
                     . '<div class="ss-decor-line ss-decor-line--bottom"></div>';
            case 'business':
                $brandText = isset($copy['{SITEDOWN_STYLES_TPL_BRAND}'])
                    ? $copy['{SITEDOWN_STYLES_TPL_BRAND}']
                    : '';
                return '<aside class="ss-brand-panel">'
                     . '<div class="ss-brand-grid"></div>'
                     . '<div class="ss-brand-content">'
                     .   '<div class="ss-brand-icon"><i class="bi bi-building"></i></div>'
                     .   '<h2 class="ss-brand-title">{SITENAME}</h2>'
                     .   '<p class="ss-brand-text">' . $brandText . '</p>'
                     . '</div>'
                     . '</aside>';
            default:
                return '';
        }
    }

    /**
     * Inline CSS variable overrides driven by admin (future: color picker).
     * For now returns an empty <style> placeholder for forward-compat.
     */
    protected function renderInlineVars()
    {
        $accent = isset($this->plugPrefs['sitedown_accent_color'])
                ? trim($this->plugPrefs['sitedown_accent_color'])
                : '';
        if ($accent === '' || !preg_match('/^#[0-9a-fA-F]{3,8}$/', $accent)) {
            return '';
        }
        return '<style>:root{--ss-accent:' . $accent . ';}</style>';
    }

    /**
     * Optional Google Font <link> per skin.
     */
    protected function renderFontCss($style)
    {
        $map = array(
            'agency'       => 'Sora:wght@300;400;500;600;700',
            'business'     => 'DM+Sans:wght@400;500;600;700',
            'construction' => 'Oswald:wght@400;500;600;700',
            'creative'     => 'Space+Grotesk:wght@400;500;600;700',
            'gardening'    => 'Quicksand:wght@400;500;600;700',
            'handyman'     => 'Roboto+Condensed:wght@400;500;700',
            'marketing'    => 'Inter:wght@400;500;600;700',
            'restaurant'   => 'Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;700',
        );
        if (!isset($map[$style])) {
            return '';
        }
        return '<link rel="preconnect" href="https://fonts.googleapis.com">'
             . '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>'
             . '<link href="https://fonts.googleapis.com/css2?family=' . $map[$style] . '&display=swap" rel="stylesheet">';
    }

    /**
     * Get active style from preferences
     * 
     * @return string Style key
     */
    protected function getActiveStyle()
    {
        return isset($this->plugPrefs['sitedown_active_style']) 
               ? $this->plugPrefs['sitedown_active_style'] 
               : 'agency';
    }

    /**
     * Per-template visible copy with admin overrides.
     *
     * Returns the default copy (translated via LAN_* constants) per skin,
     * then applies any non-empty admin override stored under the pref key
     * `sitedown_copy_<style>_<field>` where <field> is the lowercase TPL_*
     * key without the prefix (e.g. {SITEDOWN_STYLES_TPL_BADGE} maps to
     * pref `sitedown_copy_agency_badge`).
     *
     * Multilanguage: stored values may be either a plain string (legacy) or
     * an associative array keyed by e107 language name (Spanish, English…).
     * Resolution order for arrays: e_LANGUAGE → site default language → first
     * non-empty entry → LAN_* default.
     *
     * @param string $style Active template slug.
     * @return array<string,string> placeholder => translated value
     */
    public function getTplCopy($style)
    {
        $defaults = $this->getTplCopyDefaults($style);
        if (empty($defaults)) {
            return $defaults;
        }
        $prefs = e107::getPlugConfig('sitedown_styles')->getPref();
        $siteLang = e107::getPref('sitelanguage');
        foreach ($defaults as $placeholder => $defaultValue) {
            // {SITEDOWN_STYLES_TPL_BADGE} -> badge
            if (!preg_match('/\{SITEDOWN_STYLES_TPL_([A-Z0-9_]+)\}/', $placeholder, $m)) {
                continue;
            }
            $field   = strtolower($m[1]);
            $prefKey = 'sitedown_copy_' . $style . '_' . $field;
            if (!isset($prefs[$prefKey])) {
                continue;
            }
            $val = $prefs[$prefKey];

            if (is_array($val)) {
                // Try current language → site language → first available
                if (!empty($val[e_LANGUAGE])) {
                    $val = $val[e_LANGUAGE];
                } elseif (!empty($val[$siteLang])) {
                    $val = $val[$siteLang];
                } else {
                    $first = '';
                    foreach ($val as $candidate) {
                        if (is_string($candidate) && $candidate !== '') {
                            $first = $candidate;
                            break;
                        }
                    }
                    $val = $first;
                }
            }

            if (is_string($val) && $val !== '') {
                $defaults[$placeholder] = $val;
            }
        }
        return $defaults;
    }

    /**
     * Per-template default copy (LAN_*-only). Used as fallback by getTplCopy()
     * and as source list by the admin Copy editor.
     *
     * @param string $style Active template slug.
     * @return array<string,string> placeholder => default translated value
     */
    public function getTplCopyDefaults($style)
    {
        switch ($style) {
            case 'agency':
                return array(
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_BADGE', 'Maintenance Mode'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD1', "We're making"),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_AGENCY_HEAD2', 'something amazing'),
                );
            case 'business':
                return array(
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BADGE', 'Scheduled Maintenance'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD1', "We'll be back"),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_HEAD2', 'very soon'),
                    '{SITEDOWN_STYLES_TPL_CDLABEL}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_CDLABEL', 'Estimated time remaining'),
                    '{SITEDOWN_STYLES_TPL_BRAND}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_BUSINESS_BRAND', "We're upgrading our systems to serve you better. Thank you for your patience."),
                );
            case 'construction':
                return array(
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_BADGE', 'Under Construction'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD1', 'BUILDING'),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD2', 'SOMETHING'),
                    '{SITEDOWN_STYLES_TPL_HEAD3}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_HEAD3', 'BETTER'),
                    '{SITEDOWN_STYLES_TPL_CDLABEL}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_CDLABEL', 'LAUNCHING IN'),
                    '{SITEDOWN_STYLES_TPL_SVC1}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC1', 'Construction'),
                    '{SITEDOWN_STYLES_TPL_SVC2}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC2', 'Renovation'),
                    '{SITEDOWN_STYLES_TPL_SVC3}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC3', 'Design'),
                    '{SITEDOWN_STYLES_TPL_SVC4}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_SVC4', 'Maintenance'),
                    '{SITEDOWN_STYLES_TPL_EMERG}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CONSTRUCTION_EMERG', '24/7 Emergency Contact'),
                );
            case 'creative':
                return array(
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD1', 'CREATING'),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD2', 'SOMETHING'),
                    '{SITEDOWN_STYLES_TPL_HEAD3}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_CREATIVE_HEAD3', 'AMAZING'),
                );
            case 'gardening':
                return array(
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_BADGE', 'Growing Something New'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD1', 'Our garden is'),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_HEAD2', 'blooming soon'),
                    '{SITEDOWN_STYLES_TPL_CDLABEL}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_CDLABEL', '— Opening in —'),
                    '{SITEDOWN_STYLES_TPL_SVC1}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC1', 'Gardening'),
                    '{SITEDOWN_STYLES_TPL_SVC2}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC2', 'Landscaping'),
                    '{SITEDOWN_STYLES_TPL_SVC3}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC3', 'Irrigation'),
                    '{SITEDOWN_STYLES_TPL_SVC4}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_GARDENING_SVC4', 'Maintenance'),
                );
            case 'handyman':
                return array(
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_BADGE', '24/7 Emergency'),
                    '{SITEDOWN_STYLES_TPL_EMERG_TITLE}'  => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TITLE', 'Need Urgent Help?'),
                    '{SITEDOWN_STYLES_TPL_EMERG_TEXT}'   => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_EMERG_TEXT', "Our website is under maintenance, but our emergency services are still available."),
                    '{SITEDOWN_STYLES_TPL_CALL}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CALL', 'Call Us Now'),
                    '{SITEDOWN_STYLES_TPL_AVAIL}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_AVAIL', 'Available 24 hours'),
                    '{SITEDOWN_STYLES_TPL_STATUS}'       => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_STATUS', 'Maintenance in Progress'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD1', "We're fixing"),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_HEAD2', 'things up'),
                    '{SITEDOWN_STYLES_TPL_CDLABEL}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_CDLABEL', 'Estimated Time Remaining'),
                    '{SITEDOWN_STYLES_TPL_SVC1}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC1', 'Electrical'),
                    '{SITEDOWN_STYLES_TPL_SVC2}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC2', 'Plumbing'),
                    '{SITEDOWN_STYLES_TPL_SVC3}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC3', 'Locksmith'),
                    '{SITEDOWN_STYLES_TPL_SVC4}'         => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_HANDYMAN_SVC4', 'HVAC'),
                );
            case 'marketing':
                return array(
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_BADGE', 'Optimization in Progress'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD1', 'Scaling our'),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_HEAD2', 'digital infrastructure'),
                    '{SITEDOWN_STYLES_TPL_M1}'           => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M1', 'Uptime'),
                    '{SITEDOWN_STYLES_TPL_M2}'           => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M2', 'Faster'),
                    '{SITEDOWN_STYLES_TPL_M3}'           => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_M3', 'New Features'),
                    '{SITEDOWN_STYLES_TPL_DASH_TITLE}'   => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_TITLE', 'Control Panel'),
                    '{SITEDOWN_STYLES_TPL_DASH_BADGE}'   => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_DASH_BADGE', 'In Development'),
                    '{SITEDOWN_STYLES_TPL_CDLABEL}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CDLABEL', 'Launching In'),
                    '{SITEDOWN_STYLES_TPL_CHART}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_CHART', 'Expected Performance'),
                    '{SITEDOWN_STYLES_TPL_S1}'           => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S1', 'Optimized'),
                    '{SITEDOWN_STYLES_TPL_S2}'           => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S2', 'Enhanced'),
                    '{SITEDOWN_STYLES_TPL_S3}'           => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_MARKETING_S3', 'Updated'),
                );
            case 'restaurant':
                return array(
                    '{SITEDOWN_STYLES_TPL_TAGLINE}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_TAGLINE', 'Fine Dining Experience'),
                    '{SITEDOWN_STYLES_TPL_BADGE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_BADGE', 'Renovating the Restaurant'),
                    '{SITEDOWN_STYLES_TPL_HEAD1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD1', "We're preparing a"),
                    '{SITEDOWN_STYLES_TPL_HEAD2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HEAD2', 'new gastronomic experience'),
                    '{SITEDOWN_STYLES_TPL_CDLABEL}'      => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_CDLABEL', '— Reopening in —'),
                    '{SITEDOWN_STYLES_TPL_NL_TITLE}'     => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_NL_TITLE', 'Be the first to know about our new menu'),
                    '{SITEDOWN_STYLES_TPL_INFO1}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO1', 'Reservations'),
                    '{SITEDOWN_STYLES_TPL_INFO2}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO2', 'Location'),
                    '{SITEDOWN_STYLES_TPL_INFO3}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_INFO3', 'Hours'),
                    '{SITEDOWN_STYLES_TPL_HOURS_VAL}'    => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_HOURS_VAL', '13:00 - 23:00'),
                    '{SITEDOWN_STYLES_TPL_QUOTE}'        => defset('LAN_PLUGIN_SITEDOWN_STYLES_TPL_RESTAURANT_QUOTE', '"Good food is the foundation of happiness."'),
                );
            default:
                return array();
        }
    }

    /**
     * Get custom title or default
     */
    protected function getCustomTitle()
    {
        $title = isset($this->plugPrefs['sitedown_custom_title']) 
                 ? $this->plugPrefs['sitedown_custom_title'] : '';
        
        if (empty($title)) {
            $title = defset('LAN_SITEDOWN_TITLE', 'Site Under Maintenance');
        }
        
        return $this->tp->toHTML($title, true);
    }

    /**
     * Get custom subtitle or default
     */
    protected function getCustomSubtitle()
    {
        $subtitle = isset($this->plugPrefs['sitedown_custom_subtitle']) 
                    ? $this->plugPrefs['sitedown_custom_subtitle'] : '';
        
        if (empty($subtitle)) {
            $corePref = e107::pref('core', 'maintainance_text', '');
            $subtitle = !empty($corePref) ? $corePref : defset('LAN_SITEDOWN_MSG', 'We are currently performing maintenance.');
        }
        
        return $this->tp->toHTML($subtitle, true);
    }

    /**
     * Get logo HTML
     */
    protected function getLogoHtml()
    {
        $logoUrl = isset($this->plugPrefs['sitedown_logo_url']) 
                   ? $this->plugPrefs['sitedown_logo_url'] : '';
        
        if (!empty($logoUrl)) {
            $logoUrl = $this->tp->replaceConstants($logoUrl, 'abs');
            return '<img src="' . $logoUrl . '" alt="' . SITENAME . '" class="sitedown-logo">';
        }
        
        return SITENAME;
    }

    /**
     * Get countdown HTML
     */
    protected function getCountdownHtml()
    {
        $enabled = isset($this->plugPrefs['sitedown_countdown_enabled']) 
                   ? (bool)$this->plugPrefs['sitedown_countdown_enabled'] : true;
        
        if (!$enabled) {
            return '';
        }
        
        return '
        <div class="countdown" id="countdown">
            <div class="countdown-item">
                <div class="countdown-value" id="days">00</div>
                <div class="countdown-unit">' . defset('LAN_DAYS', 'Days') . '</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-value" id="hours">00</div>
                <div class="countdown-unit">' . defset('LAN_HOURS', 'Hours') . '</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-value" id="minutes">00</div>
                <div class="countdown-unit">' . defset('LAN_MINUTES', 'Min') . '</div>
            </div>
            <div class="countdown-item">
                <div class="countdown-value" id="seconds">00</div>
                <div class="countdown-unit">' . defset('LAN_SECONDS', 'Sec') . '</div>
            </div>
        </div>';
    }

    /**
     * Emit the front-end script bundle: <script src="js/sitedown.js"> + a
     * tiny inline initializer carrying dynamic config (countdown timestamp,
     * translated newsletter "done" label).
     *
     * Always emitted (not gated on countdown_enabled) because the same
     * bundle also wires the newsletter form. Each `init*` call is a no-op
     * when the matching markup is absent.
     */
    protected function getCountdownJs()
    {
        $jsUrl = e_PLUGIN_ABS . 'sitedown_styles/js/sitedown.js';
        $ver   = !empty($this->plugPrefs['sitedown_css_version'])
               ? (int)$this->plugPrefs['sitedown_css_version']
               : 1;

        $cdEnabled = !empty($this->plugPrefs['sitedown_countdown_enabled']);
        $cdRaw     = isset($this->plugPrefs['sitedown_countdown_date']) ? trim((string)$this->plugPrefs['sitedown_countdown_date']) : '';

        // The admin field is `type=datestamp` → e107 stores a unix timestamp
        // (integer seconds). Older installs / manual edits may also leave a
        // human-readable string, so accept both.
        $unix = false;
        if ($cdRaw !== '') {
            if (ctype_digit($cdRaw)) {
                $unix = (int)$cdRaw;
            } else {
                $unix = strtotime($cdRaw);
            }
        }
        if ($unix === false || $unix <= 0) {
            $unix = strtotime('+7 days');
        }
        $timestamp = (int)$unix * 1000;

        $done   = defset('LAN_SUBSCRIBED', 'Subscribed!');
        $doneJs = json_encode((string)$done, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        if ($doneJs === false) { $doneJs = '"Subscribed!"'; }

        $init = '';
        if ($cdEnabled) {
            $init .= 'SitedownStyles.initCountdown(' . $timestamp . ');';
        }
        $init .= 'SitedownStyles.initNewsletter(' . $doneJs . ');';

        return '<script src="' . $jsUrl . '?v=' . $ver . '"></script>'
             . '<script>document.addEventListener("DOMContentLoaded", function () { ' . $init . ' });</script>';
    }

    /**
     * Get progress bar HTML
     */
    protected function getProgressHtml()
    {
        $enabled = isset($this->plugPrefs['sitedown_progress_enabled']) 
                   ? (bool)$this->plugPrefs['sitedown_progress_enabled'] : false;
        
        if (!$enabled) {
            return '';
        }
        
        $value = isset($this->plugPrefs['sitedown_progress_value']) 
                 ? (int)$this->plugPrefs['sitedown_progress_value'] : 75;
        
        return '
        <div class="progress-section">
            <div class="progress-header">
                <span class="progress-label">' . defset('LAN_PROGRESS', 'Progress') . '</span>
                <span class="progress-value">' . $value . '%</span>
            </div>
            <div class="progress-bar-wrapper">
                <div class="progress-bar-fill" style="width: ' . $value . '%"></div>
            </div>
        </div>';
    }

    /**
     * Get newsletter form HTML
     */
    protected function getNewsletterHtml()
    {
        $enabled = isset($this->plugPrefs['sitedown_newsletter_enabled']) 
                   ? (bool)$this->plugPrefs['sitedown_newsletter_enabled'] : false;
        
        if (!$enabled) {
            return '';
        }
        
        return '
        <div class="newsletter-section">
            <p class="newsletter-title">' . defset('LAN_SITEDOWN_NOTIFY', 'Get notified when we\'re back') . '</p>
            <form class="newsletter-form" onsubmit="return handleNewsletter(event)">
                <input type="email" class="form-input" placeholder="' . defset('LAN_EMAIL', 'Email') . '" required>
                <button type="submit" class="btn-submit">' . defset('LAN_NOTIFY_ME', 'Notify Me') . '</button>
            </form>
        </div>
        <script>
        function handleNewsletter(e) {
            e.preventDefault();
            var btn = e.target.querySelector(".btn-submit");
            var originalText = btn.textContent;
            btn.textContent = "' . defset('LAN_SUBSCRIBED', 'Subscribed!') . '";
            btn.style.background = "#059669";
            setTimeout(function() {
                btn.textContent = originalText;
                btn.style.background = "";
                e.target.reset();
            }, 3000);
            return false;
        }
        </script>';
    }

    /**
     * Get social links HTML
     */
    protected function getSocialHtml()
    {
        $enabled = isset($this->plugPrefs['sitedown_social_enabled']) 
                   ? (bool)$this->plugPrefs['sitedown_social_enabled'] : true;
        
        if (!$enabled) {
            return '';
        }
        
        $links = array();
        $platforms = array(
            'facebook'  => 'bi-facebook',
            'twitter'   => 'bi-twitter-x',
            'instagram' => 'bi-instagram',
            'linkedin'  => 'bi-linkedin'
        );
        
        $html = '<div class="ss-social social-links">';
        
        foreach ($platforms as $platform => $icon) {
            $url = isset($this->plugPrefs['sitedown_social_' . $platform]) 
                   ? $this->plugPrefs['sitedown_social_' . $platform] : '';
            
            if (!empty($url)) {
                $html .= '<a href="' . $this->tp->toAttribute($url) . '" class="social-link" target="_blank" rel="noopener">';
                $html .= '<i class="bi ' . $icon . '"></i>';
                $html .= '</a>';
            }
        }
        
        $html .= '</div>';
        
        return $html;
    }

    /**
     * Get contact phone
     */
    protected function getPhone()
    {
        return isset($this->plugPrefs['sitedown_contact_phone']) 
               ? $this->tp->toHTML($this->plugPrefs['sitedown_contact_phone'], true) 
               : '';
    }

    /**
     * Get contact email
     */
    protected function getEmail()
    {
        return isset($this->plugPrefs['sitedown_contact_email']) 
               ? $this->tp->toHTML($this->plugPrefs['sitedown_contact_email'], true) 
               : '';
    }
}

/**
 * Global function to get template (called from sitedown.php override)
 */
function sitedown_styles_get_template()
{
    $handler = new sitedown_styles_sitedown();
    return $handler->getTemplate();
}
