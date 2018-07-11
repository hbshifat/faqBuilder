<?php namespace WPPricing\Classes;

class Menu {
    public static function addAdminMenuPages() {
        add_menu_page(
            __( 'PricingTable Builder', 'wp_pricing' ),
            __( 'PricingTable Builder', 'wp_pricing' ),
            static::managePermission(),
            'wp-pricing-table-builder.php',
            array( static::class, 'renderTable'),
            '',
            6
        );
    }
    
    public static function renderTable() {
        wp_enqueue_script('wp_pricing_admin_app', WP_PRICING_PLUGIN_DIR_URL.'public/js/wp_pricing_admin_app.js', array('jquery'), WP_PRICING_PLUGIN_VERSION, true);
        
        wp_enqueue_style('wp_pricing_admin_style', WP_PRICING_PLUGIN_DIR_URL.'public/css/wp_pricing_admin.css' );
        
        wp_localize_script('wp_pricing_admin_app', 'wp_pricing_admin_vars', array(
           'img_path' => WP_PRICING_PLUGIN_DIR_URL.'public/img/' 
        ));
        
        include WP_PRICING_PLUGIN_DIR_PATH.'views/admin_view.php';
    }
    
    public static function managePermission()
    {
        return apply_filters('wp_pricing_menu_manager_permission', 'manage_options');
    }
    
}