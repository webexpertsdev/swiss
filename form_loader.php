<?php

define( 'SHORTINIT', true );
require(dirname(__FILE__, 4).'/wp-load.php');
global $wpdb;
header('Content-Type: application/json');

$data_array = json_decode(array_search('', $_POST), true);

$data_arr = [];
foreach($data_array as $key => $value){
    $data_to = explode('-' ,$key);
    $val_d = $wpdb->get_var("SELECT ".$data_to[1]." FROM ".$data_to[0]." WHERE id=0");
    $data_arr[$data_to[1]] = $val_d;
}

echo json_encode($data_arr);