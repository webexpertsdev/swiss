<?php
/**
 * Plugin Name: woonectio
 * Plugin URI: http://google.com/
 * Description: Multi-Plugin for E-Comerce.
 * Version: 1.0
 * Author: ourcomapnyname
 * Author URI: http://google.com/
 */

if(!function_exists('add_action')){
    die;
}

$mainClass = null;

class woonectio
{
    private $page_title = 'woonectio admin';
    private $menu_title = 'Woonectio';
    private $capability = 'manage_options';
    private $menu_slug = 'woonectio';
    private $icon_url = 'dashicons-rest-api';
    private $position = 61;

    function register(){
        //add tab to admin menu
        add_action('admin_menu', [$this, 'add_menu_items']);

        //add link to setting into plugin's page
        add_filter('plugin_action_links_'.plugin_basename(__FILE__), [$this, 'add_link_to_settings']);

        //load styles and scripts section
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'front_js']);

        //load content for popup
        add_action('wp_footer', [$this, 'add_popup']);

        register_activation_hook(__FILE__, array( $this, 'create_db'));
        //register_deactivation_hook( __FILE__, array( $this, 'my_plugin_remove_database' ) );
    }

    public function add_menu_items(){
        add_menu_page(
            $this->page_title, //Page Title
            $this->menu_title, //Menu Title
            $this->capability, //Capability
            $this->menu_slug, //Page slug
            [$this, 'add_admin_settings_page'], //Callback to print html
            $this->icon_url,
            $this->position
        );
    }

    public function add_admin_settings_page(){
        require_once plugin_dir_path(__FILE__).'templates/admin/settings.php';
    }

    public function add_link_to_settings($links){
        $new_link = '<a href="admin.php?page=swissknife">Settings</a>';
        array_push($links, $new_link);
        return $links;
    }

    public function enqueue_admin(){
        wp_enqueue_style('woonectio_style', plugins_url('/assets/admin/css/admin.css', __FILE__));
        wp_enqueue_script('woonectio_core_js', plugins_url('/assets/core.js', __FILE__), '', '1.0', true);
        wp_enqueue_script('woonectio_admin_js', plugins_url('/assets/admin/js/admin.js', __FILE__), '', '1.0', true);
    }

    public function front_js(){
        wp_enqueue_script('woonectio_front_js', plugins_url('/assets/front.js', __FILE__), '', '1.0', true);
    }

    public function add_popup(){
        require_once plugin_dir_path(__FILE__).'templates/popup.php';
    }

    public function create_db(){
        global $wpdb;
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like('woonectio_popup_settings') );
        $charset_collate = $wpdb->get_charset_collate();
        if ($wpdb->get_var($query) !== 'woonectio_popup_settings' ) {
            $sql = 'CREATE TABLE woonectio_popup_settings(
                id INT,
                display_recent VARCHAR(50),
                display_no_repeat INT,
                display_order_with_processing INT,
                display_review_popups INT,
                number_of_popups_to_show INT,
                delay_between_2_notifications INT,
                notify_display_time INT,
                display_admin_own_notify INT,
                display_customer_own_notify INT,
                display_buyer_avatar INT,
                hide_on_mobile INT,
                hide_close_button INT,
                sale_content_template TEXT,
                review_content_template TEXT,
                campagin_tracking INT,
                disable_popup_link INT,
                product_title_max_words INT,
                visible_on_all_pages VARCHAR(50),
                pages_excluded TEXT,
                hide_on_all_articles INT,
                Show_only_on_these_woocommerce_categories INT,
                products_excluded TEXT,
                font_size_desktop INT,
                font_size_mobile INT,
                shape VARCHAR(40),
                size VARCHAR(40),
                position VARCHAR(60),
                animation VARCHAR(60),
                background_color VARCHAR(30),
                text_color VARCHAR(30),
                strong_tags_color VARCHAR(30),
                stars_color_rated VARCHAR(30),
                stars_color_unrated VARCHAR(30),
                close_button_color VARCHAR(30),
                close_button_background_color VARCHAR(30)
                                                 );';
            require_once(ABSPATH.'wp-admin/includes/upgrade.php' );
            dbDelta($sql);

            $data = [
                'id' => 0,
                'display_recent' => 'recent',
                'display_no_repeat' => 1,
                'display_order_with_processing' => 0,
                'display_review_popups' => 0,
                'number_of_popups_to_show' => 0,
                'delay_between_2_notifications' => 2,
                'notify_display_time' => 6,
                'display_admin_own_notify' => 1,
                'display_buyer_avatar' => 1,
                'hide_on_mobile' => 0,
                'hide_close_button' => 1,
                'sale_content_template' => 1,
                'review_content_template' => null,
                'campagin_tracking' => null,
                'disable_popup_link' => 1,
                'product_title_max_words' => 1,
                'visible_on_all_pages' => 1,
                'pages_excluded' => null,
                'hide_on_all_articles' => '',
                'Show_only_on_these_woocommerce_categories' => 0,
                'products_excluded' => null,
                'font_size_desktop' => 16,
                'font_size_mobile' => 16,
                'shape' => 'default',
                'size' => 'standart',
                'position' => 'right',
                'animation' => 'default',
                'background_color' => '#121212',
                'text_color' => '#dd6464',
                'strong_tags_color' => '#c0b4b4',
                'stars_color_rated' => '#000000',
                'stars_color_unrated' => '#000000',
                'close_button_color' => '#ffffff',
                'close_button_background_color' => '#a47474'];
            $wpdb->insert('woonectio_popup_settings',$data);
        }
    }
}

if(class_exists('woonectio')){
    $mainClass = new woonectio();
    $mainClass->register();
}
