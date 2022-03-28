<?php

class test{
    public static function sec(){
     $page_title = 'woonectio admin';
     $menu_title = 'Woonectio';
     $capability = 'manage_options';
     $menu_slug = 'woonectio';
     $icon_url = 'dashicons-rest-api';
     $position = 61;

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

     function add_menu_items(){
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

     function add_admin_settings_page(){
        require_once plugin_dir_path(__FILE__).'templates/admin/settings.php';
    }

     function add_link_to_settings($links){
        $new_link = '<a href="admin.php?page=swissknife">Settings</a>';
        array_push($links, $new_link);
        return $links;
    }

     function enqueue_admin(){
        wp_enqueue_style('woonectio_style', plugins_url('/assets/admin/css/admin.css', __FILE__));
        wp_enqueue_script('woonectio_core_js', plugins_url('/assets/core.js', __FILE__), '', '1.0', true);
        wp_enqueue_script('woonectio_admin_js', plugins_url('/assets/admin/js/admin.js', __FILE__), '', '1.0', true);
    }

     function front_js(){
        wp_enqueue_script('woonectio_front_js', plugins_url('/assets/front.js', __FILE__), '', '1.0', true);
    }

     function add_popup(){
        require_once plugin_dir_path(__FILE__).'templates/popup.php';
    }

     function create_db(){
        require_once 'db_conf.php';
        $engine = new config();
        $engine->create();
    }
}
}