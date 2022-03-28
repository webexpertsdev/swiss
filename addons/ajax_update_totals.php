<?php
require_once dirname(__FILE__, 5).'/wp-load.php';
global $wpdb;
global $woocommerce;
global $product;

$data_array = json_decode(array_search('', $_POST), true);

switch ($data_array['do_what']){
    case 'get_status':
        $status = $wpdb->get_var("SELECT `ajax_total_update` FROM woonectio_extras_settings WHERE id=0");
        $response = false;
        if((int)$status === 1){
            $response = true;
        }
        echo json_encode($response);
        break;
}