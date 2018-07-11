<?php defined('ABSPATH') or die;
/*
Plugin Name: Pricing Table Builder - The Best Price Table Builder Plugin
Description: Drag and Drop Price Table Builder Plugin for WordPress
Version: 1.0.0
Author: WPManageNinja
Author URI: https://wpmanageninja.com
Plugin URI: https://wpmanageninja.com/products/wp-pricing-table-builder-plugin
License: GPLv2 or later
Text Domain: wp_pricing
Domain Path: /languages
*/

include 'load.php';

define('WP_PRICING_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
define('WP_PRICING_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
define('WP_PRICING_PLUGIN_VERSION', plugin_dir_path(__FILE__));

class WPPricingTablePlugin
{
    public function boot()
    {
        $this->commonHooks();
        $this->adminHooks();
        $this->publicHooks();
    }

    public function commonHooks()
    {

    	add_action('wp_enqueue_scripts', function() {
		    wp_register_style('wp_pricing_table_css', WP_PRICING_PLUGIN_DIR_URL.'public/css/wp_pricing_public.css');
	    });


        add_shortcode(
            'wp_price_table', 
            array('WPPricing\Classes\PricingTableHandler', 'handleShortCode'));
        
        add_action('init', function () {
            \WPPricing\Classes\ProcessDemoPage::handleExteriorPages();
        });
    }

    public function adminHooks()
    {
        add_action('admin_menu', array('WPPricing\Classes\Menu', 'addAdminMenuPages'));
        add_action('init', array('WPPricing\Classes\CPT', 'register'));

        add_action('wp_ajax_wp_pricing_table_ajax_actions',
            array('WPPricing\Classes\PricingTableHandler', 'handleAjaxCalls'));

        add_action('wp_pricing_added_new_table', array('WPPricing\Classes\PricingTableHandler', 'populateDemoData'));
        add_action('wp_pricing_table_config_updated', array('WPPricing\Classes\PricingTableHandler', 'deleteCache'));

    }

    public function publicHooks()
    {

    }

}

add_action('plugins_loaded', function () {
    
    $pricingTableClass = new WPPricingTablePlugin();
    $pricingTableClass->boot();
});