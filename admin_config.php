<?php
/*
 * Sitedown Styles Plugin - Admin Configuration
 * 
 * @package     sitedown_styles
 * @version     1.0
 */

require_once('../../class2.php');

if (!getperms('P')) {
    e107::redirect('admin');
    exit;
}

// Load plugin language file
e107::lan('sitedown_styles', true, true);

class sitedown_styles_adminArea extends e_admin_dispatcher
{
    protected $modes = array(
        'main' => array(
            'controller' => 'sitedown_styles_ui',
            'path'       => null,
            'ui'         => 'sitedown_styles_form_ui',
            'uipath'     => null
        )
    );

    protected $adminMenu = array(
        'main/prefs'     => array('caption' => LAN_PREFS, 'perm' => 'P', 'icon' => 'fa-cog'),
        'main/templates' => array('caption' => LAN_PLUGIN_SITEDOWN_STYLES_TEMPLATES, 'perm' => 'P', 'icon' => 'fa-th'),
        'main/copy'      => array('caption' => LAN_PLUGIN_SITEDOWN_STYLES_COPY, 'perm' => 'P', 'icon' => 'fa-edit'),
        'main/preview'   => array('caption' => LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW, 'perm' => 'P', 'icon' => 'fa-eye'),
        'main/guide'     => array('caption' => LAN_PLUGIN_SITEDOWN_STYLES_GUIDE, 'perm' => 'P', 'icon' => 'fa-book'),
        'main/about'     => array('caption' => LAN_PLUGIN_SITEDOWN_STYLES_ABOUT, 'perm' => 'P', 'icon' => 'fa-info-circle'),
    );

    protected $adminMenuAliases = array();

    protected $menuTitle = LAN_PLUGIN_SITEDOWN_STYLES_NAME;
}

class sitedown_styles_ui extends e_admin_ui
{
    protected $pluginTitle = LAN_PLUGIN_SITEDOWN_STYLES_NAME;
    protected $pluginName  = 'sitedown_styles';

    protected $prefs = array(
        'sitedown_active_style' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_ACTIVE,
            'type'  => 'method',
            'data'  => 'string',
            'tab'   => 0
        ),
        'sitedown_custom_title' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_TITLE,
            'type'  => 'text',
            'data'  => 'string',
            'tab'   => 1,
            'help'  => LAN_PLUGIN_SITEDOWN_STYLES_TITLE_HELP
        ),
        'sitedown_custom_subtitle' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE,
            'type'  => 'textarea',
            'data'  => 'string',
            'tab'   => 1,
            'help'  => LAN_PLUGIN_SITEDOWN_STYLES_SUBTITLE_HELP
        ),
        'sitedown_logo_url' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_LOGO,
            'type'  => 'image',
            'data'  => 'string',
            'tab'   => 1,
            'help'  => LAN_PLUGIN_SITEDOWN_STYLES_LOGO_HELP
        ),
        'sitedown_countdown_enabled' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN,
            'type'  => 'boolean',
            'data'  => 'integer',
            'tab'   => 2
        ),
        'sitedown_countdown_date' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_COUNTDOWN_DATE,
            'type'  => 'datestamp',
            'data'  => 'string',
            'tab'   => 2,
            'writeParms' => array('type' => 'datetime')
        ),
        'sitedown_progress_enabled' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS,
            'type'  => 'boolean',
            'data'  => 'integer',
            'tab'   => 2
        ),
        'sitedown_progress_value' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_PROGRESS_VALUE,
            'type'  => 'number',
            'data'  => 'integer',
            'tab'   => 2,
            'help'  => '0-100%'
        ),
        'sitedown_newsletter_enabled' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_NEWSLETTER,
            'type'  => 'boolean',
            'data'  => 'integer',
            'tab'   => 3
        ),
        'sitedown_social_enabled' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_SOCIAL,
            'type'  => 'boolean',
            'data'  => 'integer',
            'tab'   => 3
        ),
        'sitedown_social_facebook' => array(
            'title' => 'Facebook URL',
            'type'  => 'url',
            'data'  => 'string',
            'tab'   => 3
        ),
        'sitedown_social_twitter' => array(
            'title' => 'Twitter/X URL',
            'type'  => 'url',
            'data'  => 'string',
            'tab'   => 3
        ),
        'sitedown_social_instagram' => array(
            'title' => 'Instagram URL',
            'type'  => 'url',
            'data'  => 'string',
            'tab'   => 3
        ),
        'sitedown_social_linkedin' => array(
            'title' => 'LinkedIn URL',
            'type'  => 'url',
            'data'  => 'string',
            'tab'   => 3
        ),
        'sitedown_contact_phone' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_PHONE,
            'type'  => 'text',
            'data'  => 'string',
            'tab'   => 4
        ),
        'sitedown_contact_email' => array(
            'title' => LAN_PLUGIN_SITEDOWN_STYLES_EMAIL,
            'type'  => 'email',
            'data'  => 'string',
            'tab'   => 4
        ),
    );

    protected $preftabs = array(
        LAN_PLUGIN_SITEDOWN_STYLES_TAB_TEMPLATE,
        LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTENT,
        LAN_PLUGIN_SITEDOWN_STYLES_TAB_COUNTDOWN,
        LAN_PLUGIN_SITEDOWN_STYLES_TAB_SOCIAL,
        LAN_PLUGIN_SITEDOWN_STYLES_TAB_CONTACT
    );

    public function init()
    {
        // Reserved for runtime initialization (no external CSS file shipped).
    }

    /**
     * Single source of truth for plugin identity / contact / support metadata.
     *
     * Consumed by:
     *   - renderHelp() → side panel widget on every admin page
     *   - aboutPage()  → full "About" page (dedicated tab)
     *
     * `version` and `released` are read DYNAMICALLY from plugin.xml so a
     * release bump only touches plugin.xml + CHANGELOG.md (single source of
     * truth for version metadata across the entire plugin). All other
     * fields are static identity / contact / URL data.
     *
     * @return array
     */
    private function getPluginInfo()
    {
        // Pull version + release date from plugin.xml (single source of truth).
        // getMeta() returns the parsed <e107Plugin ...> attributes.
        $meta    = e107::getPlug()->load('sitedown_styles')->getMeta();
        $attrs   = is_array($meta) && !empty($meta['@attributes']) ? $meta['@attributes'] : array();
        $version = !empty($attrs['version']) ? (string) $attrs['version'] : '?';
        $date    = !empty($attrs['date'])    ? (string) $attrs['date']    : '';

        return array(
            'name'       => 'Sitedown Styles',
            'version'    => $version,
            'released'   => $date,
            'author'     => 'Kanonimpresor',
            'agency'     => 'Marketing de Performance',
            'website'    => 'https://marketingdeperformance.online',
            'email'      => 'info@marketingdeperformance.online',
            'license'    => 'GNU General Public License v3.0',
            'license_url'=> 'https://www.gnu.org/licenses/gpl-3.0.html',
            'compat'     => 'e107 v2.3+ / PHP 8.0+',
            'docs'       => 'https://github.com/e107-Kanonimpresor/sitedown#readme',
            'support'    => 'https://github.com/e107-Kanonimpresor/sitedown/issues',
            'repo'       => 'https://github.com/e107-Kanonimpresor/sitedown',
            'changelog'  => 'https://github.com/e107-Kanonimpresor/sitedown/blob/main/CHANGELOG.md',
            'donate'     => 'https://www.paypal.com/donate/?hosted_button_id=C2DA8NC5XP56A',
            'review'     => 'https://github.com/e107-Kanonimpresor/sitedown/releases',
        );
    }

    /**
     * Sidebar help widget (replaces the legacy `e_help.php` hook file).
     *
     * The e107 admin dispatcher calls renderHelp() on every page of this
     * plugin and renders the returned HTML in the right-hand "Help" panel.
     *
     * Pattern: short description + key highlight + 3 essential CTAs
     * (docs, support, donate). Full author/license details live on the
     * dedicated About tab to keep this widget compact.
     *
     * @return array{caption:string, text:string}
     */
    public function renderHelp()
    {
        $info = $this->getPluginInfo();

        // Native e107 wraps the panel with caption "Help" (LAN_HELP).
        // Body uses BS3-native classes (`label`, `alert`, `btn-block`, `well`)
        // so the widget visually matches the rest of the e107 admin theme.
        $text = '
        <div class="ss-help-widget">
            <h4 style="margin-top:0">' . LAN_PLUGIN_SITEDOWN_STYLES_HELP_CAPTION . '</h4>
            <p>
                <strong>' . htmlspecialchars($info['name'], ENT_QUOTES, 'UTF-8') . '</strong>
                <span class="label label-default">v' . htmlspecialchars($info['version'], ENT_QUOTES, 'UTF-8') . '</span>
            </p>
            <p class="text-muted">' . LAN_PLUGIN_SITEDOWN_STYLES_HELP_TAGLINE . '</p>
            <div class="alert alert-info" style="padding:8px 10px;margin-bottom:10px">
                <i class="fa fa-lightbulb-o"></i> ' . LAN_PLUGIN_SITEDOWN_STYLES_HELP_TIP . '
            </div>
            <a href="' . htmlspecialchars($info['docs'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener" class="btn btn-default btn-block">
                <i class="fa fa-book"></i> ' . LAN_PLUGIN_SITEDOWN_STYLES_BTN_DOCS . '
            </a>
            <a href="' . htmlspecialchars($info['support'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener" class="btn btn-default btn-block">
                <i class="fa fa-life-ring"></i> ' . LAN_PLUGIN_SITEDOWN_STYLES_BTN_SUPPORT . '
            </a>
            <a href="' . htmlspecialchars($info['donate'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener" class="btn btn-success btn-block">
                <i class="fa fa-heart"></i> ' . LAN_PLUGIN_SITEDOWN_STYLES_BTN_DONATE . '
            </a>
            <p class="text-center" style="margin-top:8px;margin-bottom:0">
                <a href="' . e_SELF . '?mode=main&amp;action=about">
                    ' . LAN_PLUGIN_SITEDOWN_STYLES_HELP_MORE . ' &raquo;
                </a>
            </p>
        </div>';

        return array(
            'caption' => LAN_HELP,
            'text'    => $text,
        );
    }

    /**
     * About Page — full plugin identity card.
     *
     * Architecture: 4-layer pattern documented in
     *   docs/architecture/USER_GUIDE_PATTERN.md
     *
     *   Layer 1 — Controller : this method (lazy-loads About LANs, orchestrates).
     *   Layer 2 — Template   : templates/sitedown_styles_about_template.php
     *                          (HTML structure, references {LAN_PLUGIN_SS_ABOUT_*}
     *                          and {SS_ABOUT_*} tokens).
     *   Layer 3 — Languages  : languages/<Lang>/<Lang>_admin_about.php
     *                          (LAZY-loaded; never paid for on other admin pages).
     *   Layer 4 — Shortcodes : shortcodes/batch/sitedown_styles_about_shortcodes.php
     *                          (dynamic plugin metadata + button bar + year).
     *
     * Plugin identity data flows from the canonical source `getPluginInfo()`
     * into the shortcode batch via `setVars()` — so the sidebar widget
     * (renderHelp) and the About page stay in sync automatically.
     *
     * @return string HTML returned to the admin dispatcher (auto-wrapped in panel)
     */
    public function aboutPage()
    {
        $tp = e107::getParser();

        // LAZY-load the About language file (only when the About tab is opened).
        // Resolves to: languages/<CurrentAdminLanguage>/<Lang>_admin_about.php
        // See docs/architecture/USER_GUIDE_PATTERN.md for rationale.
        e107::lan('sitedown_styles', 'admin_about', true);

        // Load template chunk + shortcode batch.
        $template = e107::getTemplate('sitedown_styles', 'sitedown_styles_about');
        $sc       = e107::getScBatch('sitedown_styles_about', 'sitedown_styles');

        // Inject the canonical plugin metadata into the shortcode batch.
        // Shortcodes read it via $this->var[<key>] (standard e_shortcode API).
        $sc->setVars($this->getPluginInfo());

        if (empty($template['body'])) {
            return '<div class="alert alert-danger">Missing About template chunk: '
                 . htmlspecialchars(e_PLUGIN . 'sitedown_styles/templates/sitedown_styles_about_template.php', ENT_QUOTES, 'UTF-8')
                 . '</div>';
        }

        // Pre-pass: resolve {LAN_PLUGIN_SS_ABOUT_*} tokens (parseTemplate does
        // not auto-resolve LAN tokens — it only dispatches shortcodes).
        $html = $this->_resolveLans($template['body'], 'LAN_PLUGIN_SS_ABOUT_');

        // Hand off to parseTemplate so {SS_ABOUT_*} shortcodes get resolved.
        // We RETURN the HTML directly; the e107 admin dispatcher wraps custom-
        // page output in its own panel automatically.
        return '<div class="sitedown-styles-about">'
             . $tp->parseTemplate($html, true, $sc)
             . '</div>';
    }

    /**
     * Append a contextual suffix to the active admin-menu item caption.
     *
     * The e107 admin dispatcher derives both the side-menu label and the top
     * breadcrumb from the same `$adminMenu` array, so mutating the caption of
     * the current `mode/action` entry adds context (e.g. the active skin name)
     * to the breadcrumb without a duplicate "title" line inside `tablerender`.
     *
     * Safe no-op when the dispatcher / menu / current key cannot be resolved.
     *
     * @param string $suffix Already-escaped UTF-8 string to append.
     * @return void
     */
    private function appendBreadcrumbContext($suffix)
    {
        if (empty($suffix)) { return; }

        $dispatcher = $this->getDispatcher();
        // Cross-version safety: e107 2.3.x "Lite" exposes getMenuData() but
        // not setMenuData(). Skip silently when either accessor is missing —
        // the breadcrumb suffix is a nice-to-have, not a blocker.
        if (!$dispatcher
            || !method_exists($dispatcher, 'getMenuData')
            || !method_exists($dispatcher, 'setMenuData')) {
            return;
        }

        $menu = $dispatcher->getMenuData();
        $key  = $this->getMode() . '/' . $this->getAction();

        if (!isset($menu[$key]) || !is_array($menu[$key])) { return; }

        $current = isset($menu[$key]['caption']) ? (string) $menu[$key]['caption'] : '';
        $menu[$key]['caption'] = $current . ' &raquo; ' . $suffix;

        $dispatcher->setMenuData($menu);
    }

    /**
     * Templates Page — Visual gallery to pick the active sitedown skin.
     *
     * Concerns are split:
     *   • Logic (this method): pulls prefs, handles POST, builds a $templates data array.
     *   • Markup: `templates/admin_templates_template.php` provides the placeholder strings.
     *   • Styles: `css/admin_templates.css` (linked once at the top of the output).
     *   • Thumbnails: drop `images/thumbs/<key>.{jpg,jpeg,png,webp}` to override the
     *     fallback icon+gradient preview. See thumbs/README.md.
     */
    public function templatesPage()
    {
        $ns   = e107::getRender();
        $tp   = e107::getParser();
        $frm  = e107::getForm();
        $mes  = e107::getMessage();
        $cfg  = e107::getPlugConfig('sitedown_styles');
        $pref = $cfg->getPref();

        $templates = $this->getTemplatesCatalog();
        $validStyles = array_keys($templates);
        $activeStyle = isset($pref['sitedown_active_style']) && in_array($pref['sitedown_active_style'], $validStyles, true)
                       ? $pref['sitedown_active_style']
                       : 'agency';

        // --- POST handler ---------------------------------------------------
        if (isset($_POST['select_template'])) {
            $newStyle = $tp->filter(varset($_POST['template_style'], ''), 'str');
            if (in_array($newStyle, $validStyles, true)) {
                $cfg->set('sitedown_active_style', $newStyle)->save(true, true, false);
                $mes->addSuccess(LAN_PLUGIN_SITEDOWN_STYLES_SAVED);
                $activeStyle = $newStyle;
            } else {
                $mes->addError('Invalid template selection.');
            }
        }

        // --- Load markup template -------------------------------------------
        $tplFile = e_PLUGIN . 'sitedown_styles/templates/admin_templates_template.php';
        if (!is_readable($tplFile)) {
            $ns->tablerender(
                LAN_PLUGIN_SITEDOWN_STYLES_TEMPLATES,
                $mes->addError('Missing template: ' . $tplFile)->render()
            );
            return;
        }
        include $tplFile;
        // Template file defines: $ADMIN_TEMPLATES_GRID, $ADMIN_TEMPLATE_CARD,
        // $ADMIN_TEMPLATE_THUMB, $ADMIN_TEMPLATE_FALLBACK, $ADMIN_TEMPLATE_BADGE.

        // --- Render cards ---------------------------------------------------
        $cardsHtml = '';
        foreach ($templates as $key => $tpl) {
            $isActive = ($key === $activeStyle);

            // Preview media: image when present, gradient+icon otherwise
            $thumbUrl = $this->resolveThumbnailUrl($key);
            if ($thumbUrl !== null) {
                $previewMedia = strtr($ADMIN_TEMPLATE_THUMB, array(
                    '{THUMB_URL}' => $thumbUrl,
                    '{NAME}'      => htmlspecialchars($tpl['name'], ENT_QUOTES, 'UTF-8'),
                ));
            } else {
                $previewMedia = strtr($ADMIN_TEMPLATE_FALLBACK, array(
                    '{COLOR}' => $tpl['color'],
                    '{ICON}'  => $tpl['icon'],
                ));
            }

            // Tags
            $tagsHtml = '';
            foreach ($tpl['tags'] as $tag) {
                $tagsHtml .= '<span class="badge bg-secondary">' . htmlspecialchars($tag, ENT_QUOTES, 'UTF-8') . '</span>';
            }

            // Active pill
            $activeBadge = $isActive
                ? strtr($ADMIN_TEMPLATE_BADGE, array('{ACTIVE_LABEL}' => LAN_ACTIVE))
                : '';

            $cardsHtml .= strtr($ADMIN_TEMPLATE_CARD, array(
                '{KEY}'            => $key,
                '{ACTIVE_CLASS}'   => $isActive ? 'active' : '',
                '{CHECKED}'        => $isActive ? 'checked' : '',
                '{NAME}'           => $tpl['name'],
                '{DESC}'           => $tpl['desc'],
                '{TAGS}'           => $tagsHtml,
                '{PREVIEW_MEDIA}'  => $previewMedia,
                '{PREVIEW_URL}'    => e_PLUGIN_ABS . 'sitedown_styles/preview.php?style=' . $key,
                '{PREVIEW_LABEL}'  => LAN_PREVIEW,
                '{ACTIVE_BADGE}'   => $activeBadge,
            ));
        }

        // --- Render outer grid ----------------------------------------------
        $gridHtml = strtr($ADMIN_TEMPLATES_GRID, array(
            '{FORM_ACTION}' => e_SELF . '?mode=main&action=templates',
            '{FORM_TOKEN}'  => $frm->token(),
            '{CARDS}'       => $cardsHtml,
            '{SUBMIT_BTN}'  => $frm->admin_button(
                'select_template',
                LAN_PLUGIN_SITEDOWN_STYLES_SAVE_SELECTION,
                'update',
                LAN_PLUGIN_SITEDOWN_STYLES_SAVE_SELECTION
            ),
        ));

        // --- Stylesheet (cache-busted) --------------------------------------
        $cssVer = (int) varset($pref['sitedown_css_version'], 1);
        $cssTag = '<link rel="stylesheet" href="'
                . e_PLUGIN_ABS . 'sitedown_styles/css/admin_templates.css?v=' . $cssVer
                . '" media="all">';

        // --- Append active skin to the top breadcrumb -----------------------
        // Removes the redundant "Templates: Agency Pro" line that tablerender()
        // would otherwise render below the admin breadcrumb.
        if (isset($templates[$activeStyle]['name'])) {
            $this->appendBreadcrumbContext(
                htmlspecialchars($templates[$activeStyle]['name'], ENT_QUOTES, 'UTF-8')
            );
        }

        $ns->tablerender(
            '',
            $mes->render() . $cssTag . $gridHtml
        );
    }

    /**
     * Catalog of available skins. Single source of truth for the admin gallery.
     * Adding a new skin = (1) append entry here, (2) add CSS at css/<key>.css,
     * (3) whitelist `<key>` in preview.php and runtime guard checks.
     */
    private function getTemplatesCatalog()
    {
        return array(
            'agency'       => array('name' => 'Agency Pro',      'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_AGENCY,       'icon' => 'fa-briefcase',  'color' => '#7c3aed', 'tags' => array('Glassmorphism', 'Dark Mode', 'Modern')),
            'business'     => array('name' => 'Business Corp',   'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_BUSINESS,     'icon' => 'fa-building',   'color' => '#1e40af', 'tags' => array('Professional', 'Clean', 'Corporate')),
            'construction' => array('name' => 'BuilderPro',      'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_CONSTRUCTION, 'icon' => 'fa-hard-hat',   'color' => '#f59e0b', 'tags' => array('Industrial', 'Bold', 'Warning Stripes')),
            'creative'     => array('name' => 'Creative Studio', 'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_CREATIVE,     'icon' => 'fa-palette',    'color' => '#ec4899', 'tags' => array('Artistic', 'Animated', 'Vibrant')),
            'gardening'    => array('name' => 'GreenThumb',      'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_GARDENING,    'icon' => 'fa-leaf',       'color' => '#16a34a', 'tags' => array('Natural', 'Eco', 'Organic')),
            'handyman'     => array('name' => 'FixIt Pro',       'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_HANDYMAN,     'icon' => 'fa-tools',      'color' => '#dc2626', 'tags' => array('Technical', 'Emergency', '24/7')),
            'marketing'    => array('name' => 'Growth Labs',     'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_MARKETING,    'icon' => 'fa-chart-line', 'color' => '#0ea5e9', 'tags' => array('Dynamic', 'Tech', 'Dashboard')),
            'restaurant'   => array('name' => 'Gourmet Table',   'desc' => LAN_PLUGIN_SITEDOWN_STYLES_DESC_RESTAURANT,   'icon' => 'fa-utensils',   'color' => '#b91c1c', 'tags' => array('Elegant', 'Warm', 'Refined')),
        );
    }

    /**
     * Returns the absolute URL of `images/thumbs/<key>.<ext>` if any common
     * image extension is found, or null otherwise.
     */
    private function resolveThumbnailUrl($key)
    {
        static $exts = array('jpg', 'jpeg', 'png', 'webp');
        $base = e_PLUGIN . 'sitedown_styles/images/thumbs/' . $key;
        foreach ($exts as $ext) {
            if (is_file($base . '.' . $ext)) {
                return e_PLUGIN_ABS . 'sitedown_styles/images/thumbs/' . $key . '.' . $ext;
            }
        }
        return null;
    }

    /**
     * Per-skin, per-language copy editor.
     *
     * Architecture:
     *   • Storage: pref `sitedown_copy_<style>_<field>` is an associative array
     *     keyed by e107 language name (Spanish, English…). Legacy plain-string
     *     values are migrated transparently the next time the field is saved.
     *   • UI: skin tabs + language pill bar + per-field override table.
     *     Selected language comes from ?lang=… (defaults to current e_LANGUAGE).
     *   • Runtime resolver: see `sitedown_styles_sitedown::getTplCopy()`.
     *
     * Markup lives in `templates/admin_copy_template.php`, styles in
     * `css/admin_copy.css`.
     */
    public function copyPage()
    {
        $ns   = e107::getRender();
        $tp   = e107::getParser();
        $frm  = e107::getForm();
        $mes  = e107::getMessage();
        $cfg  = e107::getPlugConfig('sitedown_styles');
        $pref = $cfg->getPref();
        $lng  = e107::getLanguage();

        // --- Resolve targets (skin + language) ------------------------------
        $validStyles = array('agency', 'business', 'construction', 'creative', 'gardening', 'handyman', 'marketing', 'restaurant');
        $activeStyle = isset($pref['sitedown_active_style']) ? $pref['sitedown_active_style'] : 'agency';
        $editStyle   = $tp->filter(varset($_GET['style'], $activeStyle), 'str');
        if (!in_array($editStyle, $validStyles, true)) {
            $editStyle = $activeStyle;
        }

        $installedLangs = $lng->installed('native'); // ['English'=>'English', 'Spanish'=>'Español', ...]
        if (empty($installedLangs)) {
            $installedLangs = array(e_LANGUAGE => e_LANGUAGE);
        }
        $defaultLang = e107::getPref('sitelanguage', e_LANGUAGE);
        // Editing language is driven by e107's top admin language switcher.
        $editLang = e_LANGUAGE;
        if (!isset($installedLangs[$editLang])) {
            $editLang = isset($installedLangs[$defaultLang]) ? $defaultLang : key($installedLangs);
        }

        // --- Defaults catalog -----------------------------------------------
        if (!class_exists('sitedown_styles_sitedown')) {
            require_once(e_PLUGIN . 'sitedown_styles/e_sitedown.php');
        }
        $runtime  = new sitedown_styles_sitedown();
        $defaults = $runtime->getTplCopyDefaults($editStyle);

        // --- POST handler ---------------------------------------------------
        if (isset($_POST['save_copy'])
            && $tp->filter(varset($_POST['copy_style'], ''), 'str') === $editStyle
        ) {
            $changed = 0;
            foreach ($defaults as $placeholder => $defaultValue) {
                if (!preg_match('/\{SITEDOWN_STYLES_TPL_([A-Z0-9_]+)\}/', $placeholder, $m)) {
                    continue;
                }
                $field   = strtolower($m[1]);
                $prefKey = 'sitedown_copy_' . $editStyle . '_' . $field;

                // Field name follows e107 multilan convention: copy[field][Lang]
                $postedRaw = '';
                if (isset($_POST['copy'][$field]) && is_array($_POST['copy'][$field])) {
                    $postedRaw = isset($_POST['copy'][$field][$editLang]) ? $_POST['copy'][$field][$editLang] : '';
                }
                $posted = trim($tp->filter($postedRaw, 'str'));

                // Existing value: normalize to array form (auto-migrate string → array)
                $existing = isset($pref[$prefKey]) ? $pref[$prefKey] : array();
                if (is_string($existing)) {
                    $existing = ($existing !== '') ? array($defaultLang => $existing) : array();
                }
                if (!is_array($existing)) {
                    $existing = array();
                }

                $previous = isset($existing[$editLang]) ? $existing[$editLang] : '';

                // Empty value → drop this language entry (revert to fallback chain)
                if ($posted === '' || $posted === $defaultValue) {
                    if ($previous !== '') {
                        unset($existing[$editLang]);
                        $changed++;
                    }
                } elseif ($posted !== $previous) {
                    $existing[$editLang] = $posted;
                    $changed++;
                }

                // Persist: empty array clears the pref entirely
                if (!empty($existing)) {
                    $cfg->set($prefKey, $existing);
                } elseif (isset($pref[$prefKey])) {
                    $cfg->set($prefKey, '');
                }
            }
            if ($changed > 0) {
                $cfg->save(true, true, false);
                $mes->addSuccess(defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVED', 'Copy saved.'));
                $pref = e107::getPlugConfig('sitedown_styles')->getPref();
            } else {
                $mes->addInfo(defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NOCHANGE', 'No changes detected.'));
            }
        }

        // --- Helpers --------------------------------------------------------
        $skinNames = array(
            'agency'       => 'Agency Pro',
            'business'     => 'Business Corp',
            'construction' => 'BuilderPro',
            'creative'     => 'Creative Studio',
            'gardening'    => 'GreenThumb',
            'handyman'     => 'FixIt Pro',
            'marketing'    => 'Growth Labs',
            'restaurant'   => 'Gourmet Table',
        );

        // Map e107 language name → ISO code (for compact badges)
        $isoMap = array();
        foreach (array_keys($installedLangs) as $langName) {
            $isoMap[$langName] = strtoupper($lng->convert($langName));
        }

        // --- Load template + CSS -------------------------------------------
        $tplFile = e_PLUGIN . 'sitedown_styles/templates/admin_copy_template.php';
        if (!is_readable($tplFile)) {
            $ns->tablerender(
                LAN_PLUGIN_SITEDOWN_STYLES_COPY,
                $mes->addError('Missing template: ' . $tplFile)->render()
            );
            return;
        }
        include $tplFile;
        // Provides: $ADMIN_COPY_PAGE, $ADMIN_COPY_TAB, $ADMIN_COPY_FORM,
        // $ADMIN_COPY_ROW, $ADMIN_COPY_LANGBADGE, $ADMIN_COPY_EMPTY.

        $cssVer = (int) varset($pref['sitedown_css_version'], 1);
        $cssTag = '<link rel="stylesheet" href="'
                . e_PLUGIN_ABS . 'sitedown_styles/css/admin_copy.css?v=' . $cssVer
                . '" media="all">';

        // --- Render skin tabs ----------------------------------------------
        $skinTabs = '';
        foreach ($skinNames as $key => $label) {
            $skinTabs .= strtr($ADMIN_COPY_TAB, array(
                '{URL}'           => e_SELF . '?mode=main&action=copy&style=' . $key,
                '{ACTIVE_CLASS}'  => ($key === $editStyle) ? 'active' : '',
                '{LABEL}'         => $label,
            ));
        }

        // --- Render edit form (or empty notice) -----------------------------
        if (empty($defaults)) {
            $editForm = strtr($ADMIN_COPY_EMPTY, array(
                '{MESSAGE}' => defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NONE', 'This skin has no editable copy fields.'),
            ));
        } else {
            $rows = '';
            $noTranslationLabel = defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_NO_TRANSLATION', '(no translation yet)');
            foreach ($defaults as $placeholder => $defaultValue) {
                if (!preg_match('/\{SITEDOWN_STYLES_TPL_([A-Z0-9_]+)\}/', $placeholder, $m)) {
                    continue;
                }
                $field   = strtolower($m[1]);
                $prefKey = 'sitedown_copy_' . $editStyle . '_' . $field;

                // Resolve current value for the language being edited
                $stored = isset($pref[$prefKey]) ? $pref[$prefKey] : null;
                if (is_string($stored)) {
                    $current = ($editLang === $defaultLang) ? $stored : '';
                } elseif (is_array($stored)) {
                    $current = isset($stored[$editLang]) ? $stored[$editLang] : '';
                } else {
                    $current = '';
                }

                $isLong = (strlen($defaultValue) > 60);
                $inputName = 'copy[' . $field . '][' . $editLang . ']';
                $inputId   = 'copy-' . $field . '-' . strtolower($editLang);
                $langTitle = defset('LAN_EFORM_012', 'Multi-language field') . ' (' . $editLang . ')';
                $langIcon  = '<small class="e-tip admin-multilanguage-field input-group-addon"'
                           . ' style="cursor:help; padding-left:10px"'
                           . ' title="' . htmlspecialchars($langTitle, ENT_QUOTES, 'UTF-8') . '">'
                           . '<i class="fas fa-language"></i></small>';

                if ($isLong) {
                    $inputCtl = '<textarea name="' . $inputName . '" id="' . $inputId . '"'
                              . ' rows="3" cols="60" class="tbox form-control"'
                              . ' placeholder="' . htmlspecialchars($defaultValue, ENT_QUOTES, 'UTF-8') . '">'
                              . htmlspecialchars($current, ENT_QUOTES, 'UTF-8')
                              . '</textarea>';
                    $inputCls = 'input-group';
                } else {
                    $inputCtl = '<input type="text" name="' . $inputName . '" id="' . $inputId . '"'
                              . ' value="' . htmlspecialchars($current, ENT_QUOTES, 'UTF-8') . '"'
                              . ' maxlength="255" class="tbox form-control input-xxlarge"'
                              . ' placeholder="' . htmlspecialchars($defaultValue, ENT_QUOTES, 'UTF-8') . '">';
                    $inputCls = 'input-group input-xxlarge';
                }
                $input = '<span class="' . $inputCls . '">' . $inputCtl . $langIcon . '</span>';

                // Per-row language badges (which languages already have a value)
                $langBadges = '';
                foreach ($installedLangs as $langName => $native) {
                    $hasTranslation = false;
                    if (is_array($stored) && !empty($stored[$langName])) {
                        $hasTranslation = true;
                    } elseif (is_string($stored) && $stored !== '' && $langName === $defaultLang) {
                        $hasTranslation = true;
                    }
                    $langBadges .= strtr($ADMIN_COPY_LANGBADGE, array(
                        '{ISO}'    => isset($isoMap[$langName]) ? $isoMap[$langName] : substr($langName, 0, 2),
                        '{NATIVE}' => htmlspecialchars($native, ENT_QUOTES, 'UTF-8'),
                        '{STATE}'  => $hasTranslation ? 'has' : 'missing',
                    ));
                }

                $rows .= strtr($ADMIN_COPY_ROW, array(
                    '{FIELD}'        => $field,
                    '{DEFAULT}'      => $tp->toHTML($defaultValue, false, 'defs'),
                    '{INPUT}'        => $input,
                    '{LANG_BADGES}'  => $langBadges,
                ));
            }

            $editForm = strtr($ADMIN_COPY_FORM, array(
                '{ACTION}'        => e_SELF . '?mode=main&action=copy&style=' . $editStyle,
                '{TOKEN}'         => $frm->token(),
                '{EDIT_STYLE}'    => $editStyle,
                '{EDIT_LANG}'     => htmlspecialchars($editLang, ENT_QUOTES, 'UTF-8'),
                '{COL_FIELD}'     => defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_FIELD', 'Field'),
                '{COL_DEFAULT}'   => defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_DEFAULT', 'Default'),
                '{COL_OVERRIDE}'  => defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_OVERRIDE', 'Override'),
                '{COL_LANGS}'     => defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_LANG_COL', 'Translations'),
                '{ROWS}'          => $rows,
                '{SUBMIT_BTN}'    => $frm->admin_button(
                    'save_copy',
                    '1',
                    'update',
                    defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_SAVE', 'Save copy')
                ),
                '{PREVIEW_URL}'   => e_PLUGIN_ABS . 'sitedown_styles/preview.php?style=' . $editStyle,
                '{PREVIEW_LABEL}' => defset('LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW', 'Preview'),
            ));
        }

        // --- Assemble + render ---------------------------------------------
        $intro = '<div class="alert alert-info">'
               . defset('LAN_PLUGIN_SITEDOWN_STYLES_COPY_INTRO', 'Override the visible text strings for each skin.')
               . '</div>';

        $body = strtr($ADMIN_COPY_PAGE, array(
            '{INTRO}'              => $intro,
            '{SKIN_TABS}'          => $skinTabs,
            '{EDIT_FORM_OR_EMPTY}' => $editForm,
        ));

        // Append active skin to the top breadcrumb (replaces the redundant
        // "Editor de textos: Agency Pro" title that tablerender would emit).
        if (isset($skinNames[$editStyle])) {
            $this->appendBreadcrumbContext(
                htmlspecialchars($skinNames[$editStyle], ENT_QUOTES, 'UTF-8')
            );
        }

        $ns->tablerender(
            '',
            $mes->render() . $cssTag . $body
        );
    }

    /**
     * Preview Page
     */
    public function previewPage()
    {
        $ns = e107::getRender();
        $pref = e107::getPlugConfig('sitedown_styles')->getPref();
        $activeStyle = isset($pref['sitedown_active_style']) ? $pref['sitedown_active_style'] : 'agency';

        // Resolve the human-readable skin name from the catalog (falls back to
        // ucfirst(slug) if the catalog entry is missing — should never happen
        // for whitelisted styles).
        $catalog        = $this->getTemplatesCatalog();
        $activeSkinName = isset($catalog[$activeStyle]['name'])
                        ? $catalog[$activeStyle]['name']
                        : ucfirst($activeStyle);

        $text = '
        <div class="text-center mb-4">
            <p class="lead">' . LAN_PLUGIN_SITEDOWN_STYLES_PREVIEW_DESC . '</p>
        </div>
        <div class="preview-container" style="background: #1a1a1a; border-radius: 12px; overflow: hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.3);">
            <div class="preview-header" style="background: #333; padding: 10px 15px; display: flex; align-items: center; gap: 8px;">
                <span style="width: 12px; height: 12px; background: #ff5f57; border-radius: 50%;"></span>
                <span style="width: 12px; height: 12px; background: #febc2e; border-radius: 50%;"></span>
                <span style="width: 12px; height: 12px; background: #28c840; border-radius: 50%;"></span>
                <span style="flex: 1; text-align: center; color: #888; font-size: 0.85rem;">' . SITENAME . ' - ' . LAN_PLUGIN_SITEDOWN_STYLES_MAINTENANCE . '</span>
            </div>
            <iframe src="' . e_PLUGIN_ABS . 'sitedown_styles/preview.php?style=' . $activeStyle . '" 
                    style="width: 100%; height: 600px; border: none;"></iframe>
        </div>
        <br />
        <div class="text-center mt-4">
            <a href="' . e_PLUGIN_ABS . 'sitedown_styles/preview.php?style=' . $activeStyle . '"
               class="btn btn-primary" target="_blank" rel="noopener">
                <i class="fa fa-external-link"></i> ' . LAN_PLUGIN_SITEDOWN_STYLES_OPEN_FULLSCREEN . '
            </a>
        </div>';

        // Append active skin to the top breadcrumb (replaces the redundant
        // "Preview: Agency" title that tablerender would emit).
        $this->appendBreadcrumbContext(
            htmlspecialchars($activeSkinName, ENT_QUOTES, 'UTF-8')
        );

        $ns->tablerender('', $text);
    }

    /**
     * User Guide Page (in-admin documentation, native e107 tabs).
     *
     * Architecture: 4-layer pattern documented in
     *   docs/architecture/USER_GUIDE_PATTERN.md
     *
     *   Layer 1 — Controller : this method (lazy-loads help LANs, orchestrates).
     *   Layer 2 — Template   : templates/sitedown_styles_guide_template.php
     *                          (HTML structure, references {LAN_PLUGIN_SS_HELP_*}
     *                          and {SS_HELP_*} tokens).
     *   Layer 3 — Languages  : languages/<Lang>/<Lang>_admin_help.php
     *                          (LAZY-loaded; never paid for on other admin pages).
     *   Layer 4 — Shortcodes : shortcodes/batch/sitedown_styles_guide_shortcodes.php
     *                          (ONLY methods with real logic: dynamic data, state
     *                          badges, paths, lists. NEVER LAN proxies.)
     *
     *   Tabs UI : e107::getForm()->tabs() — outputs BS3/4/5-compatible markup.
     *   Styling : css/admin_guide.css.
     */
    public function guidePage()
    {
        $tp   = e107::getParser();
        $frm  = e107::getForm();

        // LAZY-load the Help language file (only when the Guide tab is opened).
        // Resolves to: languages/<CurrentAdminLanguage>/<Lang>_admin_help.php
        // See docs/architecture/USER_GUIDE_PATTERN.md for rationale.
        e107::lan('sitedown_styles', 'admin_help', true);

        // Register admin CSS in <head> via e107 native API.
        // Pattern mirrors `booking` plugin: e107::css('<plugin_folder>', 'css/<file>').
        // The first arg names the plugin so the path resolves to e_PLUGIN/<plugin>/.
        e107::css('sitedown_styles', 'css/admin_guide.css');

        // Load template chunks + shortcode batch.
        $template = e107::getTemplate('sitedown_styles', 'sitedown_styles_guide');
        $sc       = e107::getScBatch('sitedown_styles_guide', 'sitedown_styles');

        // Tab definitions: id => array(LAN_KEY, fallback, fa-icon)
        $tabs = array(
            'overview'      => array('LAN_PLUGIN_SS_HELP_TAB_OVERVIEW',     'Overview',        'fa-info-circle'),
            'install'       => array('LAN_PLUGIN_SS_HELP_TAB_INSTALL',      'Install',         'fa-download'),
            'configuration' => array('LAN_PLUGIN_SS_HELP_TAB_CONFIG',       'Configuration',   'fa-cog'),
            'activation'    => array('LAN_PLUGIN_SS_HELP_TAB_ACTIVATION',   'Activation',      'fa-power-off'),
            'shortcodes'    => array('LAN_PLUGIN_SS_HELP_TAB_SHORTCODES',   'Placeholders',    'fa-code'),
            'troubleshoot'  => array('LAN_PLUGIN_SS_HELP_TAB_TROUBLESHOOT', 'Troubleshooting', 'fa-wrench'),
            'credits'       => array('LAN_PLUGIN_SS_HELP_TAB_CREDITS',      'Credits',         'fa-heart'),
        );

        // Build $frm->tabs() data: each entry needs 'caption' and 'text'.
        //
        // NOTE on {LAN_PLUGIN_SS_HELP_*} resolution:
        //   e107's parseTemplate() does NOT auto-resolve {LAN_*} tokens (it only
        //   runs them through the shortcode dispatcher, which would silently drop
        //   them). The canonical e107 pattern is to concatenate LAN constants
        //   in PHP (`'... '.LAN_FOO.' ...'`), but that would force us to inline
        //   raw HTML into language files — exactly what Layer 3 of our
        //   architecture forbids (see USER_GUIDE_PATTERN.md).
        //
        //   The clean fix is a tiny pre-pass: scan each chunk for
        //   {LAN_PLUGIN_SS_HELP_*} tokens and replace each one with its
        //   defset() value BEFORE handing off to parseTemplate. Shortcodes
        //   ({TOK_*}, {SS_HELP_*}) keep flowing through the parser as usual.
        $tabData = array();
        foreach ($tabs as $id => $tab) {
            $label = defset($tab[0], $tab[1]);
            $icon  = '<i class="fa ' . $tab[2] . '"></i> ';

            if (!empty($template[$id])) {
                $chunk   = $this->_resolveLans($template[$id], 'LAN_PLUGIN_SS_HELP_');
                $content = $tp->parseTemplate($chunk, true, $sc);
            } else {
                $content = '<div class="alert alert-warning">Template chunk missing: ' . $id . '</div>';
            }

            $tabData[$id] = array(
                'caption' => $icon . $label,
                'text'    => $content,
            );
        }

        // Render tabs: identical pattern to the booking plugin's guidePage().
        // We RETURN the HTML directly; the e107 admin dispatcher wraps custom-page
        // output in its own panel automatically. Calling tablerender() here would
        // produce a double-wrapped card and can break $frm->tabs() layout.
        return '<div class="sitedown-styles-guide">'
             . $frm->tabs($tabData)
             . '</div>';
    }

    /**
     * Resolve {LAN_<PREFIX>*} tokens to their constant values.
     *
     * Bridges the gap between e107's parseTemplate() (which only resolves
     * shortcodes) and our Layer-3 design where translations live as PHP
     * constants in dedicated, lazy-loaded language files
     * (e.g. <Lang>_admin_help.php, <Lang>_admin_about.php).
     *
     * Why a regex pre-pass instead of concatenated strings in the template?
     *   - Keeps the template a single readable HTML blob (Layer 2 contract).
     *   - Avoids polluting the LAN file with raw HTML (Layer 3 contract).
     *   - Cost is negligible: one preg_replace_callback per chunk, only when
     *     the corresponding admin page is opened.
     *
     * Tokens for missing constants are left intact so they show up loudly
     * during development instead of silently disappearing.
     *
     * @param  string $html    Template chunk straight from getTemplate().
     * @param  string $prefix  Constant prefix to match (e.g. 'LAN_PLUGIN_SS_HELP_').
     * @return string          Same chunk with matching LAN tokens substituted.
     */
    private function _resolveLans($html, $prefix)
    {
        // Build a safe regex from the prefix; restrict to upper-case ident chars.
        $pattern = '/\{(' . preg_quote($prefix, '/') . '[A-Z0-9_]+)\}/';

        return preg_replace_callback(
            $pattern,
            static function ($m) {
                return defined($m[1]) ? constant($m[1]) : $m[0];
            },
            $html
        );
    }

    /**
     * Per-tab markdown-ish HTML for the User Guide.
     * Each block uses defset() so the page never breaks on missing translations.
     */
    private function _guideContent($tab)
    {
        // DEPRECATED: kept only for backward compatibility. The User Guide
        // content now lives in templates/sitedown_styles_guide_template.php
        // and is resolved by shortcodes/batch/sitedown_styles_guide_shortcodes.php.
        // This stub remains in case a third-party theme overrode guidePage().
        return '';
    }
}

class sitedown_styles_form_ui extends e_admin_form_ui
{
    /**
    /**
     * Custom method for template selection dropdown in settings
     */
    function sitedown_active_style($curVal, $mode)
    {
        $frm = e107::getForm();

        $options = array(
            'agency'       => 'Agency Pro',
            'business'     => 'Business Corp',
            'construction' => 'BuilderPro',
            'creative'     => 'Creative Studio',
            'gardening'    => 'GreenThumb',
            'handyman'     => 'FixIt Pro',
            'marketing'    => 'Growth Labs',
            'restaurant'   => 'Gourmet Table'
        );

        if ($mode === 'read') {
            return isset($options[$curVal]) ? $options[$curVal] : $curVal;
        }

        return $frm->select('sitedown_active_style', $options, $curVal, array('class' => 'form-control'));
    }
}

new sitedown_styles_adminArea();

require_once(e_ADMIN . 'auth.php');
e107::getAdminUI()->runPage();

require_once(e_ADMIN . 'footer.php');
