<?php
require_once dirname(__FILE__, 4) . '/wp-load.php';
global $wpdb;

$data_array = json_decode(array_search('', $_POST), true);

switch ($data_array['action']){
    case 'check_code':
        require_once dirname(__FILE__, 1) . '/engine.php';

        $engine_code = new engine();
        $code_response_status = $engine_code->check_code_status($data_array['key']);
        if($code_response_status){
            $wpdb->update('woonectio_license', array('key' => $data_array['key']), array('id'=>0));
            echo json_encode(['success' => true]);
        }
        else{
            require_once dirname(__FILE__, 1) . '/engine.php';
            $engine_code = new engine();
            $code_response_status = $engine_code->check_code_status($data_array['key']);
            if($code_response_status === 'inactive'){
                $code_active_status = $engine_code->activate_license($data_array['key']);
                if($code_active_status){
                    $wpdb->update('woonectio_license', array('key' => $data_array['key']), array('id'=>0));
                    echo json_encode(['success' => true]);
                }
            }
            else{
                echo json_encode(['success' => false, 'error' => 'Your code is invalid or your site is inactive']);
            }
        }
        break;

    case 'clear_license':
        $wpdb->update('woonectio_license', array('key' => ''), array('id'=>0));
        echo json_encode(['success' => true]);
        break;
}