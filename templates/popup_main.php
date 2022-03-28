<?php
require(dirname(__FILE__, 5) . '/wp-load.php');
global $wpdb;

$setting_array = $wpdb->get_row("SELECT * FROM woonectio_popup_settings WHERE id = 0");
$orders_id_array = $wpdb->get_results("SELECT order_id FROM " . $wpdb->prefix . "woocommerce_order_items");
$order_status_filter = ['completed'];
if ((int)$setting_array->display_order_with_processing === 1) {
    array_push($order_status_filter, 'processing');
}
$order_array_clear = [];
foreach ($orders_id_array as $order) {
    $order_inst = wc_get_order($order->order_id);
    $status = $order_inst->get_status();
    if (in_array($status, $order_status_filter)) {
        array_push($order_array_clear, $order);
    }
}
$data_array = json_decode(array_search('', $_POST), true);
if ($data_array['is_start']) {
    if (empty($order_array_clear)) {
        echo json_encode('empty');
    } else {
        echo json_encode([
            'count' => count($order_array_clear),
            'delay_notify' => $setting_array->notify_display_time,
            'delay_between_two' => $setting_array->delay_between_2_notifications,
            'display_reviews' => $setting_array->display_recent,
            'no_repeat' => $setting_array->display_no_repeat]);
    }
} else {
    $order_id = $order_array_clear[$data_array['elem']]->order_id;
    $order = wc_get_order($order_id);
    $user_id = $order->get_user_id();
    $user = $order->get_user();
    $customer = new WC_Customer(get_post_meta($order_id, '_customer_user', true));
    $item_name = '';
    $product_id = '';
    $pp_product = new WC_Product($product_id);
    if ((int)$setting_array->display_review_popups === 1) {
        if ($pp_product->get_average_rating() < 4) {
            return;
        }
    }
    foreach ($order->get_items() as $item_key => $item) {
        $item_name = $item->get_name();
        $product_id = $item->get_product_id();
        break;
    }
    $content = '<div class="woonectio_popup"><div class="woonectio-popup-image">'. wc_get_product($product_id)->get_image() . '</div>';
    $settings = $wpdb->get_var("SELECT sale_content_template FROM woonectio_popup_settings WHERE id=0");
    $customer_firstname = $customer->get_first_name() === '' ? $order->get_billing_first_name() : $customer->get_first_name();
    $customer_lastname = $customer->get_last_name() === '' ? $order->get_billing_last_name() : $customer->get_last_name();
    $template_main = $settings;
    $start = strtotime(substr($order->get_date_created(), 0, 10));
    $end = strtotime(date('Y-m-d'));

    $days_between = ceil(abs($end - $start) / 86400);

    $template_main = '<div class=woonectio-popup-maintextwrapper>' . $template_main;
    $template_main = str_replace('{new_line}', '<br style="flex-basis: 100%">', $template_main);
    $template_main = str_replace('{buyer}', '<span id="woonectio-buyer">' . $customer->get_display_name() . '</span>', $template_main);
    $template_main = str_replace('{buyer_username}', '<span id="woonectio-buyer-username">' . $customer->get_username() . '</span>', $template_main);
    $template_main = str_replace('{buyer_first_name}', '<span id="woonectio-buyer-firstname">' . $customer_firstname . '</span>', $template_main);
    $template_main = str_replace('{buyer_last_name}', '<span id="woonectio-buyer-lastname">' . $customer_lastname . '</span>', $template_main);
    $template_main = str_replace('{date}', '<span id="woonectio-date">' . $days_between . ' days ago</span>', $template_main);
    $template_main = str_replace('{by_woonectio}', '<span id="woonectio-bywoonectio">by woonectio</span>', $template_main);
    $template_main = str_replace('{product}', $item_name, $template_main);
    $template_main = str_replace('_', ' ', $template_main);
    $template_main = $template_main . '</div>';
    $content .= $template_main . '</div>';
    echo json_encode($content);
}