<?php

define( 'SHORTINIT', true );
require(dirname(__FILE__, 4).'/wp-load.php');
global $wpdb;
header('Content-Type: application/json');

$data_array = json_decode(array_search('', $_POST), true);

foreach($data_array as $key => $value){
    $data_to = explode('-' ,$key);
    $wpdb->update($data_to[0], array($data_to[1] => $value), array('id'=>0));
}

echo json_encode(true);
