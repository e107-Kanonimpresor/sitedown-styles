<?php
/*
 * Sitedown Styles — Admin "About" page shortcode batch.
 *
 * Architectural contract (see docs/architecture/USER_GUIDE_PATTERN.md):
 *   - This batch ONLY exposes shortcodes that REQUIRE LOGIC: dynamic plugin
 *     metadata (name, version, release date, …), button bar assembly, year.
 *   - Translatable text is NEVER wrapped here. The template uses
 *     {LAN_PLUGIN_SS_ABOUT_*} directly; the controller resolves those
 *     tokens BEFORE handing the chunk to parseTemplate().
 *   - Naming convention: methods prefixed sc_ss_about_<name> → tokens
 *     {SS_ABOUT_<NAME>}.
 *
 * Loaded by:
 *   $sc = e107::getScBatch('sitedown_styles_about', 'sitedown_styles');
 *   $sc->setVars($info);   // ← controller injects getPluginInfo() here
 *
 * The class name MUST match the e107 convention:
 *   plugin_<plugin>_<batch>_shortcodes
 *   = plugin_sitedown_styles_sitedown_styles_about_shortcodes
 */

if (!defined('e107_INIT')) { exit; }

class plugin_sitedown_styles_sitedown_styles_about_shortcodes extends e_shortcode
{
    public $override = false;


    // ─────────────────────────────────────────────────────────────────────
    // Internal helpers
    // ─────────────────────────────────────────────────────────────────────

    /**
     * Read a value from the injected $info array (setVars()), HTML-escaped.
     * Returns '' when the key is missing so missing data fails loudly during
     * development but never breaks the page.
     */
    private function v($key)
    {
        $val = isset($this->var[$key]) ? (string) $this->var[$key] : '';
        return htmlspecialchars($val, ENT_QUOTES, 'UTF-8');
    }


    // ─────────────────────────────────────────────────────────────────────
    // Header card — identity tokens
    // ─────────────────────────────────────────────────────────────────────

    /** Token: {SS_ABOUT_NAME}     */
    public function sc_ss_about_name()     { return $this->v('name'); }

    /** Token: {SS_ABOUT_VERSION}  */
    public function sc_ss_about_version()  { return $this->v('version'); }

    /** Token: {SS_ABOUT_RELEASED} */
    public function sc_ss_about_released() { return $this->v('released'); }

    /** Token: {SS_ABOUT_COMPAT}   */
    public function sc_ss_about_compat()   { return $this->v('compat'); }


    // ─────────────────────────────────────────────────────────────────────
    // Metadata grid — assembled rows (4 fixed entries: author / agency /
    // contact / license). Repetition is logic, not structure.
    // Token: {SS_ABOUT_METADATA_ROWS}
    // ─────────────────────────────────────────────────────────────────────
    public function sc_ss_about_metadata_rows()
    {
        $author      = $this->v('author');
        $agency      = $this->v('agency');
        $website     = $this->v('website');
        $email       = $this->v('email');
        $license     = $this->v('license');
        $licenseUrl  = $this->v('license_url');

        $rows = array(
            array(
                'icon'  => 'fa-user',
                'label' => defset('LAN_PLUGIN_SS_ABOUT_AUTHOR', 'Author'),
                'value' => $author,
            ),
            array(
                'icon'  => 'fa-building',
                'label' => defset('LAN_PLUGIN_SS_ABOUT_AGENCY', 'Agency / Website'),
                'value' => '<a href="' . $website . '" target="_blank" rel="noopener">' . $agency . '</a>',
            ),
            array(
                'icon'  => 'fa-envelope',
                'label' => defset('LAN_PLUGIN_SS_ABOUT_CONTACT', 'Contact email'),
                'value' => '<a href="mailto:' . $email . '">' . $email . '</a>',
            ),
            array(
                'icon'  => 'fa-balance-scale',
                'label' => defset('LAN_PLUGIN_SS_ABOUT_LICENSE', 'License'),
                'value' => '<a href="' . $licenseUrl . '" target="_blank" rel="noopener">' . $license . '</a>',
            ),
        );

        $html = '';
        foreach ($rows as $r) {
            $html .= '
<div class="col-md-6" style="margin-bottom:15px">
    <div class="media">
        <div class="media-left media-middle">
            <span class="text-primary" style="font-size:1.6em;display:inline-block;width:38px;text-align:center">
                <i class="fa ' . $r['icon'] . '"></i>
            </span>
        </div>
        <div class="media-body">
            <small class="text-muted text-uppercase">' . $r['label'] . '</small><br>
            <strong>' . $r['value'] . '</strong>
        </div>
    </div>
</div>';
        }
        return $html;
    }


    // ─────────────────────────────────────────────────────────────────────
    // Description card
    // ─────────────────────────────────────────────────────────────────────

    /** Token: {SS_ABOUT_CHANGELOG_URL} */
    public function sc_ss_about_changelog_url() { return $this->v('changelog'); }


    // ─────────────────────────────────────────────────────────────────────
    // Support card — button bar
    // 6 fixed buttons (docs / bug / repo / changelog / donate / review).
    // Token: {SS_ABOUT_BUTTONS}
    // ─────────────────────────────────────────────────────────────────────
    public function sc_ss_about_buttons()
    {
        $buttons = array(
            array($this->v('docs'),      'fa-book',     'btn-info',    defset('LAN_PLUGIN_SS_ABOUT_BTN_DOCS',      'Documentation')),
            array($this->v('support'),   'fa-bug',      'btn-warning', defset('LAN_PLUGIN_SS_ABOUT_BTN_BUG',       'Report a bug')),
            array($this->v('repo'),      'fa-github',   'btn-default', defset('LAN_PLUGIN_SS_ABOUT_BTN_REPO',      'GitHub repository')),
            array($this->v('changelog'), 'fa-list-alt', 'btn-default', defset('LAN_PLUGIN_SS_ABOUT_BTN_CHANGELOG', 'Changelog')),
            array($this->v('donate'),    'fa-heart',    'btn-success', defset('LAN_PLUGIN_SS_ABOUT_BTN_DONATE',    'Donate')),
            array($this->v('review'),    'fa-star',     'btn-primary', defset('LAN_PLUGIN_SS_ABOUT_BTN_REVIEW',    'Leave a review')),
        );

        $html = '';
        foreach ($buttons as $b) {
            $html .= '<a href="' . $b[0] . '" target="_blank" rel="noopener" class="btn ' . $b[2] . '" style="margin-right:6px;margin-bottom:6px">'
                  .  '<i class="fa ' . $b[1] . '"></i> ' . $b[3]
                  .  '</a>' . "\n";
        }
        return $html;
    }


    // ─────────────────────────────────────────────────────────────────────
    // Footer
    // ─────────────────────────────────────────────────────────────────────

    /** Token: {SS_ABOUT_YEAR} */
    public function sc_ss_about_year() { return date('Y'); }

    /** Token: {SS_ABOUT_AGENCY} */
    public function sc_ss_about_agency() { return $this->v('agency'); }

    /** Token: {SS_ABOUT_LICENSE_URL} */
    public function sc_ss_about_license_url() { return $this->v('license_url'); }

    /** Token: {SS_ABOUT_LICENSE} */
    public function sc_ss_about_license() { return $this->v('license'); }
}
