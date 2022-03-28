<?php

add_action( 'woocommerce_after_shipping_rate', 'action_after_shipping_rate', 20, 2 );
function action_after_shipping_rate ( $method, $index ) {
    if( is_cart() ) return;
    if( 'flat_rate:13' === $method->id ) {
        echo __("<p>Szybnak wysyłka kurierem, nawet tego samego dnia.</p>");
    }
    if( 'flat_rate:14' === $method->id ) {
        echo __("<p>Wybierz paczkomat, do ktrórego chcesz otrzymać swoją przesyłkę</p>");
    }
}