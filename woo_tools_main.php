<?php
require_once dirname(__FILE__, 4).'/wp-load.php';
global $wpdb;
global $woocommerce;
global $product;

class woo_tools_main{
    public static function get_user_geo_country(){
        $geo = new WC_Geolocation();
        $user_ip = $geo->get_ip_address() === '127.0.0.1' ? '178.43.223.231' : $geo->get_ip_address(); //only for test!
        $user_geo = $geo->geolocate_ip( $user_ip );
        return $user_geo['country'];
    }
}
