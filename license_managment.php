<?php
require_once dirname(__FILE__, 4) . '/wp-load.php';
global $wpdb;

$data_array = json_decode(array_search('', $_POST), true);

switch ($data_array['action']){
    case 'change':
        $wpdb->update($wpdb->prefix.'woonectio_license', array('key' => ''), array('id'=>1));
        echo json_encode(['success' => true]);
        break;
    case 'check':
        if($data_array['key'] !== ''){
            $activate_response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=activate_license&item_id=11&license='.$data_array['key'])));
            if($activate_response->success){
                if($activate_response->license === 'valid'){
                    $table_name = $wpdb->prefix . 'woonectio_license';
                    $query = $wpdb->prepare('SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
                    $charset_collate = $wpdb->get_charset_collate();
                    if ($wpdb->get_var($query) !== $table_name){
                        $sql = 'CREATE TABLE woonectio_popup_settings(
                                id INT,
                                key VARCHAR(70));';
                        require_once(ABSPATH.'wp-admin/includes/upgrade.php' );
                        dbDelta($sql);

                        $wpdb->insert($table_name, [
                            'id' => 1,
                            'key' => $data_array['key']
                        ]);
                        echo json_encode([
                            'success' => true]);
                    }
                    else{
                        $wpdb->update($table_name, array('key' => $data_array['key']), array('id'=>1));
                        echo json_encode([
                            'success' => true]);
                    }
                }
            }
            else{
                echo json_encode([
                    'success' => false,
                    'error' => 'Problem with activation. Try later']);
            }
        }else{
            echo json_encode([
                'success' => false,
                'error' => 'Empty license number',
                'key' => $data_array['key']]);
        }
        break;
}