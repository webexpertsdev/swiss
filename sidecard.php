<?php
require(dirname(__FILE__, 4) . '/wp-load.php');
global $wpdb;

$data_array = json_decode(array_search('', $_POST), true);
if(!empty($data_array)){
    WC()->cart->add_to_cart($data_array['id'], $data_array['count'], 0);
    echo json_encode($data_array);
}