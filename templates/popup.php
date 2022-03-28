<?php
require(dirname(__FILE__, 5) . '/wp-load.php');
global $wpdb;
$setting_array = $wpdb->get_row("SELECT * FROM woonectio_popup_settings WHERE id = 0");
?>

<style>
    .woonectio_popup {
        width: auto;
        height: 150px;
        position: fixed;
        top: 70%;
        left: 5%;
        transform: translate(-5%, 70%);
        z-index: 99999;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
        padding: 0.5% 1%;
        border-radius: 5px;
        text-decoration: none !important;
        cursor: pointer;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        background-color: <?php echo $setting_array->background_color?>;
    }

    .woonectio-popup-maintextwrapper{
        margin-left: 20px;
    }

    .woonectio_popup > .popup_text > b {
        color: <?php echo $setting_array->strong_tags_color?>;
    }

    #woonectio_popup_product_wrapper{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;
    }

    #woonectio_popup_product_wrapper > *{
        margin: 15px;
    }

    .woonectio-popup-image {
        width: 84px;
        height: 84px;
        background: darkgrey;
        border-radius: 10px;
        position: relative;
    }

    .woonectio-popup-image img{
        width: 84px;
        height: 84px;
    }

    .popup_image > .star {
        font-size: 30px;
        position: absolute;
        top: 38px;
        left: 54px;
    }

    .popup_text {
        min-width: 178px;
        min-height: 84px;
        margin-left: 10px;
        font-size: <?php echo $setting_array->font_size_desktop."px"?>;
        color: <?php echo $setting_array->text_color?>;
    }

    .popup_close {
        position: absolute;
        overflow: hidden;
        height: 20px;
        width: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        top: 5px;
        left: 92.5%;
        background: <?php echo $setting_array->close_button_background_color?>;
        border-radius: 50%;
        color: <?php echo $setting_array->close_button_color?>;
        font-size: 16px;
    }

    @media (max-width: 850px) {
        .popup_text {
            font-size: <?php echo $setting_array->font_size_desktop."px"?>;
        }
    }

    #woonectio-buyer, #woonectio-buyer_username, #woonectio-buyer-firstname, #woonectio_buyer-lastname, #woonectio-date, #woonectio-bywoonectio{
        margin-right: 5px;
    }
</style>

<?php
$settings_ajax_add = $wpdb->get_row("SELECT * FROM woonectio_sidecard_settings WHERE id=0");
$settings_arr_ajax_add = [];
foreach ($settings_ajax_add as $key => $value){
    $settings_arr_ajax_add[$key] = $value;
}
?>

<!--STYLE FOR SIDECARD-->
<style>
    .woonectio-quantity {
        position: relative;
        display: inline-flex;
    }

    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button
    {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number]
    {
        -moz-appearance: textfield;
    }

    .woonectio-quantity input {
        max-width: 60px;
        width: 100%;
        height: 42px;
        line-height: 1.65;
        float: left;
        display: block;
        padding: 0;
        margin: 0;
        padding-left: 20px;
        border: 1px solid #eee;
    }

    .woonectio_stcky_wariations{
        max-width: 100px;
        width: 100%;
        height: 42px;
        line-height: 1.65;
        float: left;
        display: block;
        padding: 0;
        margin: 0;
        padding-left: 20px;
        border: 1px solid #eee;
        margin-right: 5px;
    }

    .woonectio-quantity input:focus {
        outline: 0;
    }

    .woonectio-quantity-nav {
        float: left;
        position: relative;
        height: 42px;
    }

    .woonectio-quantity-button {
        position: relative;
        cursor: pointer;
        border-left: 1px solid #eee;
        width: 20px;
        text-align: center;
        color: #333;
        font-size: 13px;
        font-family: "Trebuchet MS", Helvetica, sans-serif !important;
        line-height: 1.7;
        -webkit-transform: translateX(-100%);
        transform: translateX(-100%);
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    .woonectio-quantity-button.woonectio-quantity-up {
        position: absolute;
        height: 50%;
        top: 0;
        border-bottom: 1px solid #eee;
    }

    .woonectio-quantity-button.woonectio-quantity-down {
        position: absolute;
        bottom: -1px;
        height: 50%;
    }

    #sidecard_apnel{
        position: fixed;
        width: 100%;
        background-color: <?php echo $settings_arr_ajax_add['background_color']?>;
        top: <?php echo $settings_arr_ajax_add['sticky_bar_position'] ===  'top' ? '0' : '100%'?>;
        transform: <?php echo $settings_arr_ajax_add['sticky_bar_position'] ===  'top' ? 'translate(0, 0)' : 'translate(0, -100%)'?>;
        z-index: 999999999999;
        min-height: 80px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        <?php echo (int)$settings_arr_ajax_add['box_shadow_enable'] === 1 ? 'box-shadow: 0 0 10px -2px '.$settings_arr_ajax_add['box_shadow_color'] : '';?>;
        color: <?php echo $settings_arr_ajax_add['text_color']?>;
    }

    #sidecard_apnel > .wrapper{
        height: inherit;
        max-width: 900px;
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    #sidecard_apnel > .wrapper > .wrapper-image{
        height: inherit;
        margin: 5px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
    }

    #sidecard_apnel > .wrapper > .wrapper-image > .img{
        height: 60px;
        width: 60px;
        background-color: darkgrey;
        border-radius: <?php
        switch ($settings_arr_ajax_add['product_image_style']){
            case 'square':
                echo '0px';
                break;
            case 'round':
                echo '50%';
                break;
            case 'halfround':
                echo '15px';
                break;
        }
        ?>;
        margin-right: 15px;
    }

    #sidecard_apnel > .wrapper > .wrapper-image > .img img{
        border-radius: <?php
        switch ($settings_arr_ajax_add['product_image_style']){
            case 'square':
                echo '0px';
                break;
            case 'round':
                echo '50%';
                break;
            case 'halfround':
                echo '15px';
                break;
        }
        ?>;
    }

    #sidecard_apnel > .wrapper > .wrapper-image > .product_data_woonectio > .product_name_woonectio{
        color: <?php echo $settings_arr_ajax_add['product_title_color']?>;
        font-size: <?php echo $settings_arr_ajax_add['title_font_size'].'px' ?>;
    }

    #sidecard_apnel > .wrapper > .wrapper-image > .product_data_woonectio > .product_price_woonectio{
        color: <?php echo $settings_arr_ajax_add['price_text_color']?>;
        font-size: <?php echo $settings_arr_ajax_add['price_font_size'].'px' ?>;
        padding: 2px;
        margin: 2px;
        <?php echo $settings_arr_ajax_add['price_badge_style'] === 'round' ? 'border-radius: 5px' : ''?>;
        border: 1px solid black;
    }

    #sidecard_apnel > .wrapper > .wrapper-count{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: end;
        align-items: center;
        margin: 5px;
        max-width: 600px;
        width: 100%;
    }

    #sidecard_apnel > .wrapper > .wrapper-count > .button{
        margin-left: 15px;
        background-color: <?php echo $settings_arr_ajax_add['button_color']?>;
        box-shadow: 0 0 10px -2px <?php echo $settings_arr_ajax_add['box_shadow_color']?>;
        padding: 3px 5px;
        color: <?php echo $settings_arr_ajax_add['button_text_color']?>;
        border-radius: <?php
        switch ($settings_arr_ajax_add['cart_button_style']){
            case 'square':
                echo '0px';
                break;
            case 'round':
                echo '50%';
                break;
            case 'halfround':
                echo '15px';
                break;
        }
        ?>;
        font-size: <?php echo $settings_arr_ajax_add['add_to_cart_button_font_size'].'px' ?>;
    }

    #sidecard_apnel > .wrapper > .wrapper-count > .button:hover{
        background-color: <?php echo $settings_arr_ajax_add['button_hover_color']?>;
        color: <?php echo $settings_arr_ajax_add['button_hover_text_color']?>;
    }
</style>

<?php
global $product;
if(!empty($product)){
    echo '<input type="hidden" id="woonectio_sticky_productid" value="'.$product->get_id().'">';
    echo '<input type="hidden" id="global_woonectio_product_path" value="'.get_permalink($product === null ? 0 : $product->get_id()).'">';
    echo '<input type="hidden" id="woonectio_someproductpageurl" value="'.get_permalink($product->get_id()).'">';
} ?>

<div id="sidecard_apnel" style="display: none"></div>

<!--STYLE FOR AJAX NOTIFY-->
<style>
    #woonectio_ajax_notify{
        position: fixed;
        top: 65%;
        left: 50%;
        transform: translate(-50%, 65%);
        width: 100%;
        min-height: 200px;
        padding: 5px 30px;
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        justify-content: end;
        align-items: center;
    }

    #woonectio_ajax_notify > #close{
        position: absolute;
        top: 5%;
        left: 88%;
        cursor: pointer;
    }

    #woonectio_ajax_notify > .notify{
        position: relative;
        padding: 2px;
        width: 100%;
        min-height: 50px;
        margin-top: 10px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        border-radius: 3px;
    }

    #woonectio_ajax_notify > .notify > a{
        text-decoration: underline;
        color: white;
        margin-left: 3px;
        margin-right: 3px;
    }

    #woonectio_ajax_notify > .alert{
        background-color: red;
        color: white;
    }

    #woonectio_ajax_notify > .info{
        background-color: deepskyblue;
        color: white;
    }

    #woonectio_ajax_notify > .notation{
        background-color: green;
        color: white;
    }
</style>

<?php
$minicartsettings = $wpdb->get_row("SELECT * FROM woonectio_minicard_settings WHERE id=0");
$minicartsettings_arr = [];
foreach ($minicartsettings as $key => $value){
    $minicartsettings_arr[$key] = $value;
}
?>

<?php
global $wp;
$current_slug = $wp->request;
if($current_slug === ''){
    $current_slug = 'mainpage';
}
$arr_woonectio_minicard_exc = explode(',', str_replace(' ', '', $minicartsettings_arr['do_not_show_cart_on_pages']));
if(!in_array($current_slug, $arr_woonectio_minicard_exc)){
    echo '<div id="woonectio_minicart" style="display: none"></div>';
}
?>
<div id="woonectio_minicart_invisible"></div>

<div id="open_minicart" style="display: none; z-index: 99999999;">
    <span class="woonectio_minicard_icon_count"></span>
    <?php echo '&'.$minicartsettings_arr['basket_basketicon'];?>
</div>

<div id="woonectio_minicard_boofier"></div>

<!--STYLE FOR MINICART -->
<style>

    @import url(<?php
    function getBetween($string, $start = "", $end = ""){
    if (strpos($string, $start)) { // required if $start not exist in $string
        $startCharCount = strpos($string, $start) + strlen($start);
        $firstSubStr = substr($string, $startCharCount, strlen($string));
        $endCharCount = strpos($firstSubStr, $end);
        if ($endCharCount == 0) {
            $endCharCount = strlen($firstSubStr);
        }
        return substr($firstSubStr, 0, $endCharCount);
    } else {
        return '';
    }
}
         $font_url = str_replace('@@@', '?', str_replace('>>>', '&', str_replace('<<<', '=', str_replace('_', '.', $minicartsettings_arr['main_style_sidecart_fonturl']))));
    $font_name = getBetween($font_url, '=', '&');
         echo $font_url;
         ?>);

    #woonectio_minicart, #woonectio_minicart_invisible{
        position: fixed;
        min-width: 300px;
        background-color: <?php echo $minicartsettings_arr['sidecartbody_backgroundcolor'] ?>;
        box-shadow: 0 0 30px -2px rgb(0 0 0 / 100%);
        min-height: 100%;
        max-height: 100%;
        max-width: <?php echo $minicartsettings_arr['main_style_sidecart_width'].'px' ?>;
        width: 100%;
        <?php echo $minicartsettings_arr['main_style_sidecart_openform'] === 'left' ? 'right' : 'left' ?>: 100%;
        top: 50%;
        transform: translate(<?php echo $minicartsettings_arr['main_style_sidecart_openform'] === 'left' ? '100%' : '-100%' ?>, -50%);
        z-index: 99999999999;
        display: flex;
        justify-content: space-between;
        flex-direction: column;
        font-family: <?php echo $font_name;?>;
        font-size: <?php echo $minicartsettings_arr['sidecartbody_fontsize'].'px' ?>;
        color: <?php echo $minicartsettings_arr['sidecartbody_textcolor'] ?>;
        overflow-y: scroll;
    }

    #woonectio_minicart, #woonectio_minicart_invisible::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    #woonectio_minicart, #woonectio_minicart_invisible {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .woonectio_emptycard_message{
        padding: 25px;
        font-size: 20px;
        text-align: center;
    }

    #woonectio_minicart_invisible{
        display: none;
        z-index: 99999999999999;
        background-color: darkgrey;
        opacity: 0.3;
    }

    .woonectio_empty_card{
        width: 100%;
        padding: 5px 0px;
        display: flex;
        flex-direction: row;
        justify-content: right;
        align-items: center;
    }

    .woonectio_empty_card span{
        cursor: pointer;
    }

    .woonectio-minicart-slider-productwrapper-productname-price{
    }

    .woonectio_add_suggested_product{
        background-color: black;
        width: 65px;
        padding: 5px 2px;
        text-align: center;
        color: white;
        cursor: pointer;
        text-transform: uppercase;
        font-size: 12px;
    }

    .woonectio-minicart-slider-productwrapper-productname{
        text-transform: uppercase;
        font-size: 18px;
        padding: 5px;
    }

    .woonectio-minicart-slider-productwrapper-productinfo-wrapper{
        margin-top: 10px;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        width: 200px;
        padding-right: 10px;
    }

    .woonectio-minicart-slider-productwrapper{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: space-between;
        width: calc(100% - 100px);
        padding: 5px;
    }

    #woonectio_continue_shopping_btn{
        flex-grow: 1;
        order: <?php echo $minicartsettings_arr['sidecartfooterstyle_continueshoppingorder'] ?>;
    }

    #woonectio_view_cart_btn{
        flex-grow: 1;
        order: <?php echo $minicartsettings_arr['sidecartfooterstyle_viewcardorder'] ?>;
    }

    #woonectio_checkout_btn{
        flex-grow: 1;
        order: <?php echo $minicartsettings_arr['sidecartfooterstyle_checkoutorder'] ?>;
    }

    #woonectio_view_cart_btn, #woonectio_checkout_btn{
    }

    .woonectio-minicard-buttonwrapper{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        text-align: center;
        width: 100%;
    }

    #woonectio_minicard_boofier{
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0.1%;
        left: 0;
        z-index: 9999;
        transform: translate(0, 0.1%);
        background-color: black;
        opacity: 0.7;
    }

    .woonectio-minicard-buttonwrapper > a{

    }

    .woonectio_minicard_shortcode_count{
        position: absolute;
        top: 0;
        left: 90%;
    }

    .woonectio_minicard_shortcode_products_product{
        width: 100%;
        border-bottom: 1px black solid;
        padding-top: 5px;
    }

    .woonectio_minicard_shortcode_products{
        width: 190px;
        height: auto;
        max-height: 400px;
        overflow-y: hidden;
        overflow-x: hidden;
        background-color: whitesmoke;
        padding: 10px;
        display: none;
        flex-direction: column;
    }

    <?php
    $hide_cart_default_updater = '.woocommerce button[name="update_cart"],
    .woocommerce input[name="update_cart"] {
        display: none;
    }';

    if((int)$wpdb->get_var("SELECT `ajax_total_update` FROM woonectio_extras_settings WHERE id=0") === 1){
        echo $hide_cart_default_updater;
    }
    ?>

    .woonectio_woo_ajax_close_simple{
        position: absolute;
        top: 3px;
        left: calc(100% - 17px);
        background-color: whitesmoke;
        border-radius: 50%;
        color: black;
        width: 15px;
        height: 15px;
        font-size: 15px;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    .woonectio_minicard_shortcode_products_product_main{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        font-size: 15px;
        word-wrap: break-word;      /* IE 5.5-7 */
        white-space: -moz-pre-wrap; /* Firefox 1.0-2.0 */
        white-space: pre-wrap;      /* current browsers */
        max-width: 100%;
    }

    .woonectio_minicard_shortcode_products > .subtotal{
        justify-content: center;
        align-items: center;
        font-size: 20px;
    }

    .woonectio_minicard_shortcode_products_product_second{
        font-size: 15px;
    }

    .woonectio_minicard_shortcode_products_product_main_img{
        min-width: 50px;
        min-height: 50px;
        max-height: 50px;
        max-width: 50px;
    }

    .woonectio-minicard-buttonwrapper a{
        text-decoration: none;
        color: black;
        padding: 5px 10px;
        border: <?php echo str_replace('_', ' ', $minicartsettings_arr['sidecartfooterstyle_btnborder'])?>;
        margin: 5px;
        cursor: pointer;
        background-color: <?php echo $minicartsettings_arr['sidecartfooterstyle_btnbgcolor']?>;
        color: <?php echo $minicartsettings_arr['sidecartfooterstyle_btntextcolor']?>;
    }

    .woonectio-minicard-bare-topwrapper-total{
        font-size: 18px;
        font-weight: bold;
        width: 100%;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .woonectio-minicard-bare-topwrapper{
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        cursor: pointer;
    }

    .woonectio-minicard-bare-topwrapper-coupon{
        display: inline-flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        color: black;
    }

    .woonectio-minicard-bare-topwrapper-coupon a{
        margin-left: 10px;
    }

    .woonectio-product-product-wrapper-global{
        position: relative;
        max-width: <?php echo $minicartsettings_arr['main_style_sidecart_width'].'px' ?>;
        flex-grow: 1;
        overflow-y: scroll;
    }

    .woonectio-product-product-wrapper-global::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    .woonectio-product-product-wrapper-global {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    .woonectio-minicart-product-data-wrapper{
        width: 65%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        padding-left: 10px;
    }

    .woonectio-minicart-product-data-buyercount{
        text-transform: uppercase;
        border: 1px solid #333;
        padding: 2px 10px;
        display: block;
        margin-bottom: 5px;
        border-radius: 10px;
        font-size: 10px;
    }

    .woonectio-minicart-product-data-namep-delete-option{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding-left: 5px;
        align-items: center;
    }

    .woonectio-minicart-product-data-namep-delete-option span{
        cursor: pointer;
    }

    .woonectio-minicart-product-data-total{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        padding: 5px;
        margin-bottom: 5px;
        align-items: center;
    }

    #woonectio_minicard_shipping{
        text-align: center;
        margin-top: 5px;
        font-weight: bold;
        color: <?php echo $minicartsettings_arr['heading_textcolor']?>;
    }

    #woonectio_minicard_shipping h3{
        padding-bottom: 0;
        color: <?php echo $minicartsettings_arr['heading_textcolor']?>;
    }

    #woonectio_minicard_promocodes{
        display: flex;
        flex-wrap: wrap;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        width: 100%;
        padding: 15px;
    }

    #woonectio_cardsettings_back_usingpromo{
        margin-top: 15px;
        margin-bottom: 15px;
        padding: 10px 15px;
        background-color: darkgrey;
    }

    #woonectio_minicard_promocodes > .promocodes{
        padding: 15px;
        width: 100%;
        overflow-y: scroll;
        min-height: 100%;
        max-height: 100%;
    }

    .woocommerce-info, .woocommerce-error, .woocommerce-message{
        display: none;
    }

    #woonectio_minicard_promocodes > .promocodes::-webkit-scrollbar {
        display: none;
    }

    /* Hide scrollbar for IE, Edge and Firefox */
    #woonectio_minicard_promocodes > .promocodes {
        -ms-overflow-style: none;  /* IE and Edge */
        scrollbar-width: none;  /* Firefox */
    }

    #woonectio_minicard_promocodes > .promocodes > .promo-wrapper{
        width: 100%;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 10px;
    }

    .woonectio_minicard_closeiconwrappper{
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: <?php echo $minicartsettings_arr['heading_closeiconalign']?>;
        font-size: <?php echo $minicartsettings_arr['heading_closeiconsize'].'px'?>;
    }

    #woonectio_minicard_header{
        font-size: <?php echo $minicartsettings_arr['heading_headingfontsize'].'px'?>;
        color: <?php echo $minicartsettings_arr['heading_textcolor']?>;
    }

    #woonectio_minicart > .basketicon{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        font-size: 40px;
    }

    #woonectio_minicard_body{
        padding: 0 10px;
    }


    #woonectio_minicart > #woonectio_minicard_body > .show_topbar{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: <?php echo $minicartsettings_arr['heading_headingalign']?>;
        align-items: center;
    }

    #free_shiping_infooo{
        text-align: <?php echo $minicartsettings_arr['heading_headingalign']?>;
        color: <?php echo $minicartsettings_arr['heading_textcolor']?>;
    }

    #free_shiping_infooo h4{
        color: <?php echo $minicartsettings_arr['heading_textcolor']?>;
        margin: 0;
        padding: 0;
    }

    #free_shiping_infooo h3{
        margin: 0;
        padding: 0;
    }

    #woonectio_minicart_iconclose{
        cursor: pointer;
    }

    .woonectio_minicard_notifiactione{
        position: fixed;
        top: 0;
        left: 90%;
        transform: translate(-90%, 0.5%);
        display: none;
        height: 60px;
        width: 100%;
        color: white;
        font-size: 15px;
        text-transform: uppercase;
        flex-direction: row;
        text-align: center;
        padding: 10px;
        background-color: green;
        z-index: 9999999999999;
    }

    #woonectio_minicart > .woonectio-product-product-wrapper-global > .product_woonectio_sidecard{
        width: 100%;
        background-color: white;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        padding: <?php echo $minicartsettings_arr['sidecartbodyproduct_productpadding'].'px'?>;
        align-items: center;
        border-bottom: 1px rgba(0, 0, 0, 0.3) solid;
    }

    #woonectio_minicart > .woonectio-product-product-wrapper-global > .product_woonectio_sidecard > .img{
        width: 35%;
        background-color: darkgrey;
    }

    #woonectio_minicart > .woonectio-product-product-wrapper-global > .product_woonectio_sidecard > .img > img{
        width: 100%;
    }

    #woonectio_minicart > .woonectio-product-product-wrapper-global > .product_woonectio_sidecard > .total > p{
        padding: 0;
        margin: 0;
        font-size: 17px;
    }

    #woonectio_minicart > .woonectio-product-product-wrapper-global > .product_woonectio_sidecard > .total{
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    #woonectio_minicart > .buttons{
        /*position: fixed;*/
        background-color: <?php echo $minicartsettings_arr['sidecartfooterstyle_bgcolor']?>;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: <?php echo str_replace('_', ' ', $minicartsettings_arr['sidecartfooterstyle_padding'])?>;
        font-size: <?php echo $minicartsettings_arr['sidecartfooterstyle_fontsize'].'px' ?>;
        color: <?php echo $minicartsettings_arr['sidecartfooterstyle_txtcolor']?>;
    }

    .woonectio-minicard-bare-topwrapper-total{
        font-size: <?php echo $minicartsettings_arr['sidecartfooterstyle_fontsize'].'px' ?>;
        color: <?php echo $minicartsettings_arr['sidecartfooterstyle_txtcolor']?>;
    }

    #woonectio_minicart > .buttons > .btn{
        margin: 10px;
        width: 150px;
        padding: 10px 30px;
        background-color: whitesmoke;
        border-radius: 3px;
        box-shadow: 0 0 10px -2px rgb(0 0 0 / 30%);
        text-decoration: none;
        color: black;
        cursor: pointer;
        font-size: 15px;
        text-align: center;
    }

    #open_minicart{
        position: fixed;
        left: calc(100% - <?php echo $minicartsettings_arr['basket_basketoffsethorizontal'].'px';?>);
        top: <?php echo $minicartsettings_arr['basket_basketposition'] === 'bottom' ? 'calc(100% - '.$minicartsettings_arr['basket_basketoffsetvertical'].'px'.')' : 'calc(0% + '.$minicartsettings_arr['basket_basketoffsetvertical'].'px'.')';?>;
        cursor: pointer;
        width: 70px;
        height: 70px;
        border-radius: <?php echo $minicartsettings_arr['basket_shape'] === 'square' ? '5%' : '50%';?>;
        background-color: <?php echo $minicartsettings_arr['basket_basketbackcolor'];?>;
        box-shadow: <?php echo str_replace('_', ' ', $minicartsettings_arr['basket_basketshadow']);?>;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        font-size: <?php echo $minicartsettings_arr['basket_iconsize'].'px';?>;
        color: <?php echo $minicartsettings_arr['basket_basketcolor'];?>;
    }

    #open_minicart > .woonectio_minicard_icon_count{
        position: absolute;
        left: <?php
        switch ($minicartsettings_arr['basket_basketcountposition']){
            case 'top_right':
                echo '85%';
                break;
            case 'bottom_right':
                echo '85%';
                break;
            case 'top_left':
                echo '15%';
                break;
            case 'bottom_left':
                echo '15%';
                break;
        }
        ?>;
        top: <?php
        switch ($minicartsettings_arr['basket_basketcountposition']){
            case 'top_right':
                echo '-5%';
                break;
            case 'bottom_right':
                echo '105%';
                break;
            case 'top_left':
                echo '-5%';
                break;
            case 'bottom_left':
                echo '105%';
                break;
        }
        ;?>;
        transform: <?php
        switch ($minicartsettings_arr['basket_basketcountposition']){
            case 'top_right':
                echo 'translate(-85%, 5%)';
                break;
            case 'bottom_right':
                echo 'translate(-85%, -105%)';
                break;
            case 'top_left':
                echo 'translate(-15%, -5%)';
                break;
            case 'bottom_left':
                echo 'translate(-15%, -105%)';
                break;
        }
        ;?>;
        background-color: <?php echo $minicartsettings_arr['basket_basketbackcountcolor'];?>;
        padding: 5px;
        height: 25px;
        border-radius: 25px;
        font-size: 15px;
        color: <?php echo $minicartsettings_arr['basket_basketcountcolor'];?>;
        display: <?php echo (int)$minicartsettings_arr['basket_showcount'] === 1 ? 'flex' : 'none';?>;
        flex-direction: row;
        align-items: center;
        justify-content: center;
    }

    .woonectio_form_input_wrapper_product{
        width: <?php echo $minicartsettings_arr['sidecartbodyqty_boxwidth'].'px';?>;
        height: <?php echo $minicartsettings_arr['sidecartbodyqty_boxheight'].'px';?>;
        display: inline-flex;
        flex-wrap: wrap;
        align-items: center;
        border: <?php echo $minicartsettings_arr['sidecartbodyqty_bordersize'].'px'.' '.$minicartsettings_arr['sidecartbodyqty_boxbordercolor'].' solid';?>;
    }

    .pre-wrapper-woonectio-minicard-details{
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
    }

    .woonectio_form_input_wrapper_product > div{
        width: <?php echo ((int)$minicartsettings_arr['sidecartbodyqty_boxwidth'] / 4).'px';?>;
        height: inherit;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        cursor: pointer;
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Old versions of Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome, Edge, Opera and Firefox */
        background-color: <?php echo $minicartsettings_arr['sidecartbodyqty_buttonsbgcolor'];?>;
        color: <?php echo $minicartsettings_arr['sidecartbodyqty_buttontextcolor'];?>;
        border-bottom: 1px black solid;
    }

    .woonectio_form_input_wrapper_product > input{
        height: inherit;
        width: calc(100% - <?php echo ((int)$minicartsettings_arr['sidecartbodyqty_boxwidth'] / 2).'px';?>);
        padding: 7px;
        display: flex;
        text-align: center;
        background-color: <?php echo $minicartsettings_arr['sidecartbodyqty_inputbgcolor'];?>;
        color: <?php echo $minicartsettings_arr['sidecartbodyqty_inputtxtcolor'];?>;
        border-left: 1px black solid;
        border-right: 1px black solid;
        border-bottom: 1px black solid;
        outline: none;
    }
</style>

<style>
    .meter {
        max-height: 10px;
        height: 10px; /* Can be anything */
        position: relative;
        margin: 10px;
        background: #fff;
        border: 1px solid <?php echo $minicartsettings_arr['heading_shippingbarcolor'];?>;
    }
    .meter > span {
        display: block;
        height: 100%;
        position: relative;
        overflow: hidden;
    }
    .meter > span:after,
    .animate > span > span {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        background-image: linear-gradient(
                -45deg,
                rgba(255, 255, 255, 0.2) 25%,
                transparent 25%,
                transparent 50%,
                rgba(255, 255, 255, 0.2) 50%,
                rgba(255, 255, 255, 0.2) 75%,
                transparent 75%,
                transparent
        );
        z-index: 1;
        background-size: 50px 50px;
        animation: move 2s linear infinite;
        border-top-right-radius: 8px;
        border-bottom-right-radius: 8px;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        overflow: hidden;
    }

    .animate > span:after {
        display: none;
    }

    @keyframes move {
        0% {
            background-position: 0 0;
        }
        100% {
            background-position: 50px 50px;
        }
    }

    .black > span {
        background: <?php echo $minicartsettings_arr['heading_shippingbarcolor'];?>;;
    }


    .nostripes > span > span,
    .nostripes > span::after {
        background-image: none;
    }

    #page-wrap {
        width: 490px;
</style>















<style>
    * {box-sizing:border-box}

    /* Slideshow container */
    .slideshow-container {
        padding: 0 10px;
        position: relative;
        width: 100%;
        height: <?php echo $minicartsettings_arr['suggestedproductstyle_style'] === 'wide' ? '200px' : '100px' ?>;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        background-color: <?php echo $minicartsettings_arr['suggestedproductstyle_bgcolor']?>;
        font-size: <?php echo $minicartsettings_arr['suggestedproductstyle_fontsize'].'px'?>;
    }

    /* Hide the images by default */
    .mySlides > .item {
        width: 300px;
        height: 100px;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
    }

    .mySlides > .item > img{
        width: 100px;
        height: 100px;
    }

    .mySlides > .item > .product_info > h4, p{
        margin: 0;
        padding: 0;
    }

    .mySlides > .item > .product_info{
        min-width: 100px;
        text-align: left;
    }

    .mySlides > .item > .woonectio_add_suggested_product{
        width: 80px;
        height: 30px;
        cursor: pointer;
        background-color: black;
        color: white;
        text-align: center;
        border-radius: 5px;
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Next & previous buttons */
    .woonectio_prev, .woonectio_next {
        cursor: pointer;
        width: auto;
        color: black;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .woonectio_next {
        right: 0;
        border-radius: 3px 0 0 3px;

    }

    .woonectio_prev{

    }


    /* Caption text */
    .text:not(input) {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
        color: #f2f2f2;
        font-size: 12px;
        padding: 8px 12px;
        position: absolute;
        top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
        cursor: pointer;
        height: 15px;
        width: 15px;
        margin: 0 2px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
        transition: background-color 0.6s ease;
    }

    .active, .dot:hover {
        background-color: #717171;
    }

    /* Fading animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.5s;
        animation-name: fade;
        animation-duration: 1.5s;
    }

    @-webkit-keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @keyframes fade {
        from {opacity: .4}
        to {opacity: 1}
    }

    @media(max-width: 800px){
        .slideshow-container{
            display: <?php echo (int)$minicartsettings_arr['enable_suggested_on_mobile'] === 0 ? 'none' : 'flex' ?>;
        }
    }

    .stop-scrolling {
        height: 100%;
        overflow: hidden;
    }
</style>