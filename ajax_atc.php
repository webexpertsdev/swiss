<?php
require(dirname(__FILE__, 4).'/wp-load.php');
global $wpdb;
global $woocommerce;

add_action('wp_ajax_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');
add_action('wp_ajax_nopriv_woocommerce_ajax_add_to_cart', 'woocommerce_ajax_add_to_cart');

$product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
$quantity = empty($_POST['quantity']) ? 1 : wc_stock_amount($_POST['quantity']);
$variation_id = absint($_POST['variation_id']);
$passed_validation = apply_filters('woocommerce_add_to_cart_validation', true, $product_id, $quantity);
$product_status = get_post_status($product_id);
$varone = $_POST['var_one'];
$vartwo = $_POST['var_two'];

$arr_var = [];
$arr_var['attribute_'.$varone] = $vartwo;

if($varone !== ''){
    $woocommerce->cart->add_to_cart($product_id, $quantity, $variation_id, $arr_var, null);
}
else{
    WC()->cart->add_to_cart($product_id, $quantity, $variation_id);
}