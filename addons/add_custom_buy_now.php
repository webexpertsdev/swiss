<?php
function add_content_after_addtocart() {

    // get the current post/product ID
    $current_product_id = get_the_ID();

    // get the product based on the ID
    $product = wc_get_product( $current_product_id );

    // get the "Checkout Page" URL
    $checkout_url = wc_get_checkout_url();

    echo '<a href="'.$checkout_url.'?add-to-cart='.$current_product_id.'" class="buy-now button">Kup teraz</a>';
}
add_action( 'woocommerce_after_add_to_cart_button', 'add_content_after_addtocart' );