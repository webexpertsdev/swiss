<?php

add_action( 'before_delete_post', function( $id ) {
    $product = wc_get_product( $id );
    if ( ! $product ) {
        return;
    }
    $product_thum_id_holder = [];
    $gallery_image_id_holder = [];
    $thum_id = get_post_thumbnail_id( $product->get_id() );

    foreach ( $products->posts as $post ) {
        $product_id = ! empty( $post->ID ) ? $post->ID : 0;
        if ( ! $product_id ) {
            continue;
        }
        if ( intval( $product_id ) !== intval( $id ) ) {
            array_push( $product_thum_id_holder, get_post_thumbnail_id( $product_id ) );
            $wc_product = wc_get_product( $product_id );
            $gallery_image_ids = $wc_product->get_gallery_image_ids();
            if ( empty( $gallery_image_ids ) ) {
                continue;
            }
            foreach ( $gallery_image_ids as $gallery_image_id ) {
                array_push( $gallery_image_id_holder, $gallery_image_id );
            }
        }
    }
    if ( ! in_array( $thum_id, $product_thum_id_holder ) && ! in_array( $thum_id, $gallery_image_id_holder ) ) {

//Added:
        wp_delete_attachment( $thum_id, true );
        if ( empty( $thum_id ) ) {
            return;

        }
        $gallery_image_ids = $product->get_gallery_image_ids();
        if ( empty( $gallery_image_ids ) ) {
            return;

        }
        foreach ( $gallery_image_ids as $gallery_image_id ) {
            wp_delete_attachment( $gallery_image_id, true );}
    }
} );