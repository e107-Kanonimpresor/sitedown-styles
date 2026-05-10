<?php
/*
 * Sitedown Styles Plugin for e107
 * Professional maintenance page templates
 * 
 * @package     sitedown_styles
 * @version     2.0.0
 * @author      Martin Costa (Kanonimpresor / Marketing de Performance)
 * @link        https://marketingdeperformance.online
 * @copyright   Copyright (c) 2025-2026
 * @license     GNU General Public License v3
 */

if (!defined('e107_INIT')) { exit; }

/**
 * Plugin Installation Class
 */
class sitedown_styles_setup
{
    /**
     * Called during plugin installation
     */
    function install_pre($var)
    {
        // Pre-installation tasks
        return true;
    }

    /**
     * Called after plugin installation
     */
    function install_post($var)
    {
        $mes = e107::getMessage();
        
        // Set default countdown date to 7 days from now
        $defaultDate = date('Y-m-d H:i:s', strtotime('+7 days'));
        e107::getPlugConfig('sitedown_styles')->set('sitedown_countdown_date', $defaultDate)->save();
        
        $mes->addSuccess(LAN_PLUGIN_SITEDOWN_STYLES_INSTALLED);
        
        return true;
    }

    /**
     * Called before plugin uninstallation
     */
    function uninstall_pre($var)
    {
        return true;
    }

    /**
     * Called after plugin uninstallation
     */
    function uninstall_post($var)
    {
        // Clean up preferences
        e107::getPlugConfig('sitedown_styles')->clearPref()->save();
        
        return true;
    }

    /**
     * Called during plugin upgrade
     */
    function upgrade_pre($var)
    {
        return true;
    }

    /**
     * Called after plugin upgrade
     */
    function upgrade_post($var)
    {
        return true;
    }
}

/**
 * Main Plugin Class
 */
class sitedown_styles
{
    protected $plugPrefs = null;
    
    /**
     * Available template styles
     */
    protected $styles = array(
        'agency'       => array(
            'name'        => 'Agency Pro',
            'description' => 'Elegant glassmorphism design for digital agencies',
            'icon'        => 'fa-briefcase',
            'color'       => '#7c3aed'
        ),
        'business'     => array(
            'name'        => 'Business Corp',
            'description' => 'Professional corporate design for B2B services',
            'icon'        => 'fa-building',
            'color'       => '#1e40af'
        ),
        'construction' => array(
            'name'        => 'BuilderPro',
            'description' => 'Industrial bold design for construction companies',
            'icon'        => 'fa-hard-hat',
            'color'       => '#f59e0b'
        ),
        'creative'     => array(
            'name'        => 'Creative Studio',
            'description' => 'Vibrant artistic design for designers and artists',
            'icon'        => 'fa-palette',
            'color'       => '#ec4899'
        ),
        'gardening'    => array(
            'name'        => 'GreenThumb',
            'description' => 'Natural organic design for gardeners and landscapers',
            'icon'        => 'fa-leaf',
            'color'       => '#16a34a'
        ),
        'handyman'     => array(
            'name'        => 'FixIt Pro',
            'description' => 'Practical functional design for repair services',
            'icon'        => 'fa-tools',
            'color'       => '#dc2626'
        ),
        'marketing'    => array(
            'name'        => 'Growth Labs',
            'description' => 'Dynamic tech design for marketing agencies',
            'icon'        => 'fa-chart-line',
            'color'       => '#0ea5e9'
        ),
        'restaurant'   => array(
            'name'        => 'Gourmet Table',
            'description' => 'Elegant warm design for restaurants and cafes',
            'icon'        => 'fa-utensils',
            'color'       => '#b91c1c'
        )
    );

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->plugPrefs = e107::getPlugConfig('sitedown_styles')->getPref();
    }

    /**
     * Get all available styles
     * @return array
     */
    public function getStyles()
    {
        return $this->styles;
    }

    /**
     * Get current active style
     * @return string
     */
    public function getActiveStyle()
    {
        return isset($this->plugPrefs['sitedown_active_style']) ? 
               $this->plugPrefs['sitedown_active_style'] : 'agency';
    }

    /**
     * Get style information
     * @param string $style Style key
     * @return array|null
     */
    public function getStyleInfo($style)
    {
        return isset($this->styles[$style]) ? $this->styles[$style] : null;
    }

    /**
     * Get plugin preference
     * @param string $key Preference key
     * @param mixed $default Default value
     * @return mixed
     */
    public function getPref($key, $default = '')
    {
        $fullKey = 'sitedown_' . $key;
        return isset($this->plugPrefs[$fullKey]) ? $this->plugPrefs[$fullKey] : $default;
    }

    /**
     * Check if template file exists
     * @param string $style Style key
     * @return bool
     */
    public function templateExists($style)
    {
        $path = e_PLUGIN . 'sitedown_styles/templates/' . $style . '_template.php';
        return file_exists($path);
    }

    /**
     * Get template path
     * @param string $style Style key
     * @return string
     */
    public function getTemplatePath($style = null)
    {
        if ($style === null) {
            $style = $this->getActiveStyle();
        }
        return e_PLUGIN . 'sitedown_styles/templates/' . $style . '_template.php';
    }

    /**
     * Load and return template content
     * @param string $style Style key
     * @return string
     */
    public function loadTemplate($style = null)
    {
        if ($style === null) {
            $style = $this->getActiveStyle();
        }
        
        $path = $this->getTemplatePath($style);
        
        if (file_exists($path)) {
            include($path);
            return isset($SITEDOWN_TEMPLATE) ? $SITEDOWN_TEMPLATE : '';
        }
        
        return '';
    }

    /**
     * Get countdown date as timestamp
     * @return int
     */
    public function getCountdownTimestamp()
    {
        $date = $this->getPref('countdown_date', '');
        if (empty($date)) {
            return strtotime('+7 days');
        }
        return strtotime($date);
    }

    /**
     * Get social media links array
     * @return array
     */
    public function getSocialLinks()
    {
        $links = array();
        
        $platforms = array('facebook', 'twitter', 'instagram', 'linkedin');
        
        foreach ($platforms as $platform) {
            $url = $this->getPref('social_' . $platform, '');
            if (!empty($url)) {
                $links[$platform] = $url;
            }
        }
        
        return $links;
    }
}
