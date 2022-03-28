<?php

add_action( 'woocommerce_order_item_meta_start', 'add_download_links_to_thank_you_page', 10, 3 );
function add_download_links_to_thank_you_page( $item_id, $item, $order ) {
    // Set below your product attribute taxonomy (always starts with "pa_")
    $taxonomy = 'pa_pojemnosc';

    // On email notifications
    if ( ! is_wc_endpoint_url() && $item->is_type('line_item') ) {
        $product    = $item->get_product();
        $label_name = get_taxonomy( $taxonomy )->labels->singular_name;

        if ( $term_names = $product->get_attribute( $taxonomy ) ) {
            echo '<br/><small>' . $label_name . ': ' . nl2br( $term_names ) . '</small>';
        }
    }
}