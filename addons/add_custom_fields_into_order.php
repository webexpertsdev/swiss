<?php
add_action( 'woocommerce_review_order_before_submit', 'media_files', 9 );

function media_files() {
    woocommerce_form_field( 'privacy_policy', array(
        'type'          => 'checkbox',
        'class'         => array('form-row privacy'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'label'         => 'Dodatkowe pole zgody',
    ));
}

add_action( 'woocommerce_checkout_process', 'media_files_not_approved_privacy' );
function media_files_not_approved_privacy() {
    if ( ! (int) isset( $_POST['privacy_policy'] ) ) {
        wc_add_notice( __( 'Proszę zatwierdzić zgodę na dodatkowe pole zgody' ), 'error' );
    }
}