<?php
require_once dirname(__FILE__, 4).'/wp-load.php';
global $wpdb;
global $woocommerce;
global $product;

if(!empty($_POST)){
    $data_array = json_decode(array_search('', $_POST), true);
    switch($data_array['do_what']){
        case 'get_sticky_add_to_cart_settings':
            $settings = $wpdb->get_row("SELECT * FROM woonectio_sidecard_settings WHERE id=0");
            $settings_arr = [];
            foreach ($settings as $key => $value){
                $settings_arr[$key] = $value;
            }
            echo json_encode($settings_arr);
            break;

        case 'get_ajax_notify_settings':
            $settings = $wpdb->get_row("SELECT * FROM woonectio_ajaxnotify_settings WHERE id=0");
            $settings_arr = [];
            foreach ($settings as $key => $value){
                $settings_arr[$key] = $value;
            }
            echo json_encode($settings_arr);
            break;

        case 'get_popup_settings':
            $settings = $wpdb->get_row("SELECT * FROM woonectio_popup_settings WHERE id=0");
            $settings_arr = [];
            foreach ($settings as $key => $value){
                $settings_arr[$key] = $value;
            }
            echo json_encode($settings_arr);
            break;

        case 'get_minicard_settings':
            $settings = $wpdb->get_row("SELECT * FROM woonectio_minicard_settings WHERE id=0");
            $settings_arr = [];
            foreach ($settings as $key => $value){
                $settings_arr[$key] = $value;
            }
            echo json_encode($settings_arr);
            break;
    }
}
