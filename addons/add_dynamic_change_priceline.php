<?php

// Zmiana miejsca wyswietllania aktualizowanej ceny

add_action( 'wp_footer', 'add_dynamic_price_button' );
function add_dynamic_price_button() {
    ?>
    <script type="text/javascript">
        (function($){
            if ( $( ".single_add_to_cart_button" ).length ) {
                var text = $( ".single_add_to_cart_button").html();
                text = text.split("•");

                $(".plus").click(function() {
                    let qty = parseInt($(".qty").val()) + 1;
                    var price = parseFloat(text[1]) * qty;
                    $( ".single_add_to_cart_button" ).html(text[0] + "• " +  price.toFixed(2).replace(".", ",")  + " <?php echo get_woocommerce_currency_symbol()?>" );
                });

                $(".minus").click(function() {
                    let qty = parseInt($(".qty").val()) - 1;
                    if(qty > 0) {
                        var price = parseFloat(text[1]) * qty;
                        $( ".single_add_to_cart_button" ).html(text[0] + "• " + price.toFixed(2).replace(".", ",")  + "    <?php echo get_woocommerce_currency_symbol()?>" );
                    }
                });

            }
        })(jQuery);

        (function($){
            $("form.woocommerce-checkout").on("click", ".woocommerce-error", function() {
                $(".woocommerce-error").addClass("inactive");
            });
        })(jQuery);


    </script>
    <?php
}