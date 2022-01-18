<?php
require(dirname(__FILE__, 5) . '/wp-load.php');
global $wpdb;

//header('Content-Type: application/json');

$setting_array = $wpdb->get_row("SELECT * FROM woonectio_popup_settings WHERE id = 0");
$orders_id_array = $wpdb->get_results("SELECT order_id FROM " . $wpdb->prefix . "woocommerce_order_items");

$order_status_filter = ['completed'];
if((int)$setting_array->display_order_with_processing === 1){
    array_push($order_status_filter,'processing');
}
$order_array_clear = [];
foreach ($orders_id_array as $order){
    $order_inst = wc_get_order($order->order_id);
    $status = $order_inst->get_status();
    if(in_array($status, $order_status_filter)){
        array_push($order_array_clear, $order);
    }
}

$data_array = json_decode(array_search('', $_POST), true);
if ($data_array['is_start']) {
    echo json_encode([
        'count' => count($order_array_clear),
        'delay_notify' => $setting_array->notify_display_time,
        'delay_between_two' => $setting_array->delay_between_2_notifications,
        'display_reviews' => $setting_array->display_recent,
        'no_repeat' => $setting_array->display_no_repeat]);
} else {
    $order_id = $order_array_clear[$data_array['elem']]->order_id;
    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id(); // Get the costumer ID
    $user = $order->get_user(); // Get the WP_User object

    //Get an instance of the WC_Customer Object from the user ID
    $customer = new WC_Customer(get_post_meta($order_id, '_customer_user', true));


    $item_name = '';
    $product_id = '';
    foreach ($order->get_items() as $item_key => $item) {
        $item_name = $item->get_name();
        $product_id = $item->get_product_id();
        break;
    }
    $response = [
        'username' => $customer->get_username(),
        'first_name' => $customer->get_first_name() === '' ? $order->get_billing_first_name() : $customer->get_first_name(),
        'last_name' => $customer->get_last_name() === '' ? $order->get_billing_last_name() : $customer->get_last_name(),
        'buyer' => $customer->get_display_name(),
        'item_name' => $item_name,
        'item_image' => wc_get_product($product_id)->get_image(),
        'date' => $order->get_date_created(),
        'hide_close_button' => $setting_array->hide_close_button
    ];

    echo json_encode($response);
}