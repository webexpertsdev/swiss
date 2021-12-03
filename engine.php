<?php

require_once dirname(__FILE__, 4).'/wp-load.php';

class engine
{
    public function index(){
        global $wpdb;
        $table_name = $wpdb->prefix . 'leselise';
        $queryExist = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like($table_name));
        if ($wpdb->get_var($queryExist) === $table_name) {
            $public_key = $wpdb->get_var('SELECT `key` FROM '.$table_name.' ORDER BY `id` DESC LIMIT 1;');
            if(empty($public_key)){
                return eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
            }
            else{
                $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=check_license&item_id=11&license='.$public_key)));
                if($response->success && $response->license === 'valid'){
                    return eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
                }
                else{
                    return eval(str_rot13(gzinflate(str_rot13(base64_decode('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')))));
                }
            }
        }
        else{
            global $wpdb;
            $table_name = $wpdb->prefix . 'leselise';
            $charset_collate = $wpdb->get_charset_collate();
            $sql = "CREATE TABLE IF NOT EXISTS ".$table_name." (id int(11) UNSIGNED NOT NULL AUTO_INCREMENT, `key` VARCHAR(100), KEY (id)) ".$charset_collate.";";
            $wpdb->query($sql);
        }
    }

    public function decode($code){
        return eval(str_rot13(gzinflate(str_rot13(base64_decode($code)))));
    }

    public function license_prepare($result){
        global $wpdb;
        if($result['success'] === true){
            $table_name = $wpdb->prefix . 'leselise';
            $wpdb->query('INSERT INTO '.$table_name.'(`key`) VALUES("'.(string)$result['key'].'");');
        }
        else if($result['success'] === 'activate'){
            $activate_response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=activate_license&item_id=11&license='.$result['key'])));
            if($activate_response->success){
                if($activate_response->license === 'valid'){
                    $table_name = $wpdb->prefix . 'leselise';
                    $wpdb->query('INSERT INTO '.$table_name.'(`key`) VALUES("'.(string)$result['key'].'");');
                }
            }
            else{
                echo $activate_response->success;
            }
        }
        else{
            //session_start();
            echo $result['error'];
        }
    }
}

if(isset($_POST['license']) && !empty($_POST['license'])) {
    $instance = new engine();

    $data = preg_replace('/\s+/', '', $_REQUEST['license']);
    $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=check_license&item_id=11&license='.$data)));
    if($response->success){
        if($response->license === 'valid'){
            $instance->license_prepare([
                'success' => true,
                'key' => $data
            ]);
        }
        else if($response->license === 'inactive'){
            $instance->license_prepare([
                'success' => 'activate',
                'key' => $data
            ]);
        }
        else{
            $instance->license_prepare([
                'success' => false,
                'error' => 'somerror'
            ]);
        }
    }
}