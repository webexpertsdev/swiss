<?php

require_once dirname(__FILE__, 4) . '/wp-load.php';
global $wpdb;

$data_array = json_decode(array_search('', $_POST), true);
if (true) {
    $license = $wpdb->get_var("SELECT `key` FROM woonectio_license WHERE id=0;");
    if(!empty($license)){
        $activate_response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=activate_license&item_id=11&license='.$license)));
        if($activate_response->success){
            echo json_encode([
                'success' => true,
                'license_status' => $activate_response->license,
                'product_name' => $activate_response->item_name,
                'expire_date' => $activate_response->expires,
                'customer_name' => $activate_response->customer_name,
                'customer_email' => $activate_response->customer_email,
                'license_limit' => $activate_response->license_limit,
                'activations_left' => $activate_response->activations_left]);
        }
        else{
            echo json_encode(['success' => false]);
        }
    }
    else{
        echo json_encode(['success' => false]);
    }
}