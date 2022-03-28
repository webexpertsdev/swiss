<?php
if( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) exit();
global $wpdb;
$wpdb->query("DROP TABLE IF EXISTS woonectio_minicard_settings");
$wpdb->query("DROP TABLE IF EXISTS woonectio_popup_settings");
$wpdb->query("DROP TABLE IF EXISTS woonectio_sidecard_settings");
$wpdb->query("DROP TABLE IF EXISTS woonectio_ajaxnotify_settings");
$wpdb->query("DROP TABLE IF EXISTS woonectio_plugins_enable");
