<?php

add_filter('body_class', 'stock_class');

function stock_class($classes) {
    global $post;
    if($post->post_type !="product")
        return $classes;
    $product = wc_get_product( $post->ID );
    if($product->get_stock_status() == 'outofstock') {
        $classes[] = 'outofstock';
    } elseif($product->get_stock_status() == 'onbackorder') {
        $classes[] = 'onbackorder';
    } else {
        $classes[] = 'instock';
    }

    return $classes;
}