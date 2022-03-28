<?php
/*****************************  Zgody na stronie zamówienia dla produktów z daj kategorii  ****************************************/

function is_product_cat_in_cart( $categories ) {
    foreach ( WC()->cart->get_cart() as $cart_item ) {
        if (has_term ( $categories, 'product_cat', $cart_item['product_id'] ) )
            return true;
    }
    return false;
}


add_action('woocommerce_review_order_before_submit', 'add_checkout_privacy_policy', 20, 1 );
function add_checkout_privacy_policy( $checkout ){
    $domain = 'woocommerce';
    // There is a class in the cart so show additional fields
    if ( is_product_cat_in_cart( 'turniej-nim' ) ):


        woocommerce_form_field( 'privacy_policy', array(
            'type'          => 'checkbox',
            'class'         => array('form-row privacy'),
            'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
            'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
            'required'      => true,
            'label'         => 'Wyrażam zgodę na przetwarzanie moich danych osobowych przez Organizatora Turnieju Negocjacyjno-Mediacyjnego.<i><a target="_blank" href="https://negocjacjeimediacje.biz/warunki-uczestnictwa/#pelne-tresci-zgod"> Pełna treść zgody</a></i>',
        ));

        woocommerce_form_field( 'visual_policy', array(
            'type'          => 'checkbox',
            'class'         => array('form-row privacy'),
            'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
            'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
            'required'      => true,
            'label'         => 'Wyrażam zgodę na nieodpłatne wykorzystanie, utrwalanie, obróbkę, powielanie, rozpowszechnianie wizerunku. <i><a target="_blank" href="https://negocjacjeimediacje.biz/warunki-uczestnictwa/#pelne-tresci-zgod">Pełna treść zgody</a></i>',
        ));

    endif;
}

add_action( 'woocommerce_checkout_process', 'not_approved_privacy' );
function not_approved_privacy() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( 'Wyrażenie zgody na przetwarzanie danych przez Organizatora Turnieju jest wymagane' ), 'error' );
    }
}

add_action( 'woocommerce_checkout_process', 'not_approved_visual_privacy' );
function not_approved_visual_privacy() {
    if ( ! (int) isset( $_POST['visual_policy'] ) ) {
        wc_add_notice( __( 'Wyrażenie zgody na utrwalanie i rozpowszechanie wizerunku jest wymagane' ), 'error' );
    }
}