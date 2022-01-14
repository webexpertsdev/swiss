<?php
require(dirname(__FILE__, 4).'/wp-load.php');
global $wpdb;
header('Content-Type: application/json');

$data_array = json_decode(array_search('', $_POST), true);

switch ($data_array['action']){
    case 'get_active_plugins':
        $val_d = $wpdb->get_row("SELECT * FROM woonectio_plugins_enable WHERE id=0");
        $response = [];
        foreach ($val_d as $key => $value){
            if((int)$value === 1){
                array_push($response, $key);
            }
        }
        echo json_encode($response);
        break;
}