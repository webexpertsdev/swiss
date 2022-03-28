<?php

add_filter( 'woocommerce_product_single_add_to_cart_text', 'custom_add_to_cart_price', 20, 2 ); // Single product pages
function custom_add_to_cart_price( $button_text, $product ) {
    // Variable products
    if( $product->is_type('variable') ) {
        // shop and archives
        if( ! is_product() ){
            $product_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_variation_price() ) ) );
            return $button_text . ' • ' . strip_tags( $product_price );
        }
        // Single product pages
        else {
            $product_price = wc_price( wc_get_price_to_display( $product, array( 'price' => $product->get_variation_price() ) ) );
            return $button_text . ' • ' . strip_tags( $product_price );
        }
    }
    // All other product types
    else {
        $product_price = wc_price( wc_get_price_to_display( $product ) );
        return $button_text . ' • ' . strip_tags( $product_price );
    }
}