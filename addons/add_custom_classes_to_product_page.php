<?php

add_filter( 'body_class', 'cats_css_body_class' );

function cats_css_body_class( $classes ){
    if( is_singular( 'product' ) )
    {
        $custom_terms = get_the_terms(0, 'product_cat');
        if ($custom_terms) {
            foreach ($custom_terms as $custom_term) {
                $classes[] = 'product_cat_' . $custom_term->slug;
            }
        }
    }
    return $classes;
}