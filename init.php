<?php

/**
 * Plugin Name:       Plugin BOilerplate
 * Description:       Analyze and optimize WordPress page content using FirstPick AI-powered SEO insights.
 * Version:           1.0.0
 * Author:            Rishi
 * Author URI:        https://github.com/chaudharyrishi
 * Text Domain:       textdomain
 * Domain Path:       /languages
 */

defined('ABSPATH') || exit;

/**
 * Define constants
 */
define('FPAI_SEO_VERSION', '1.0.0');
define('FPAI_SEO_TEXTDOMAIN', 'fpai-seo');
define('FPAI_SEO_PLUGIN_FILE', __FILE__);
define('FPAI_SEO_URL', plugin_dir_url(__FILE__));
define('FPAI_SEO_PATH', plugin_dir_path(__FILE__));
define('FPAI_SEO_ASSETS_URL', FPAI_SEO_URL . 'includes/assets/');
define('FPAI_SEO_INCLUDE_PATH', FPAI_SEO_PATH . 'includes/');

/**
 * Load core plugin class
 */
require_once FPAI_SEO_INCLUDE_PATH . 'core/class.fpai-seo.php';

/**
 * Initialize the plugin
 */
function fpai_seo_init()
{
    new FPAI_SEO();
}
add_action('plugins_loaded', 'fpai_seo_init');

/**
 * Add settings link to plugin list page
 */
function fpai_seo_plugin_action_links($links)
{
    $settings_url = admin_url('admin.php?page=fpai_settings');
    $settings_link = '<a href="' . esc_url($settings_url) . '">' . esc_html__('Settings', 'fpai-seo') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'fpai_seo_plugin_action_links');
