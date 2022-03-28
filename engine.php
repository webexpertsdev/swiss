<?php

require_once dirname(__FILE__, 4).'/wp-load.php';

class engine
{
    public function get_status(){
        global $wpdb;
        $public_key = $wpdb->get_var('SELECT `key` FROM woonectio_license WHERE `id` = 0;');
        if(empty($public_key)){ //not good
            return 'templates/admin/register.php';
        }
        else{
            $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=check_license&item_id=11&license='.$public_key)));
            if($response->license === 'valid'){ //good
                return 'templates/admin/settings.php';
            }
            else{ //not good
                return 'templates/admin/register.php';
            }
        }
    }

    public function check_code_status($public_key){
        $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=check_license&item_id=11&license='.$public_key)));
        if($response->success && $response->license === 'valid'){ //good
            return true;
        }
        else{ //not good
            return false;
        }
    }

    public function activate_license($public_key){
        $response = json_decode(wp_remote_retrieve_body(wp_remote_get('https://license.dvlpr.pl/?edd_action=activate_license&item_id=11&license='.$public_key)));
        if($response->success){ //good
            return true;
        }
        else{
            return false;
        }
    }
}
