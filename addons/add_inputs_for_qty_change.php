<?php

// Show + and - buttons

// 1. Show Buttons

add_action( 'woocommerce_before_add_to_cart_quantity', 'bbloomer_display_quantity_plus' );

function bbloomer_display_quantity_plus() {
    echo '<button type="button" class="plus" >+</button>';
}

add_action( 'woocommerce_after_add_to_cart_quantity', 'bbloomer_display_quantity_minus' );

function bbloomer_display_quantity_minus() {
    echo '<button type="button" class="minus" >-</button>';
}

// 2. Trigger jQuery script

add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );

function bbloomer_add_cart_quantity_plus_minus() {
    // Only run this on the single product page
    if ( ! is_product() ) return;
    ?>
    <script type="text/javascript">

        jQuery(document).ready(function($){

            $('form.cart').on( 'click', 'button.plus, button.minus', function() {

                // Get current quantity values
                var qty = $( this ).closest( 'form.cart' ).find( '.qty' );
                var val = parseFloat(qty.val());
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));

                // Change the value if plus or minus
                if ( $( this ).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }

            });

        });

    </script>
    <?php
}