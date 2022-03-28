<?php

require(dirname(__FILE__, 5).'/wp-load.php');
require_once(dirname(__FILE__, 2).'/woo_tools_main.php');

function woonectio_extrashipping_freeshippingbar_function(){
    global $wpdb;
    global $woocommerce;

    $tools = new woo_tools_main();

    $html = '<div id="woonectio_minicard_shipping">';

    $shipping_info = WC_Shipping_Zones::get_zones();
    $user_country = $tools->get_user_geo_country();
    $html_shippinginfo = '';
    $settings_arr = $wpdb->get_row("SELECT * FROM woonectio_shippingextra_settings WHERE id=0;");
    foreach($shipping_info as $shipping){
        foreach ($shipping['zone_locations'] as $zone){
            if(in_array($user_country, (array)$zone)){
                switch ($shipping['shipping_methods'][1]->requires){
                    case null:
                        $html_shippinginfo = '<div id="free_shiping_infooo"><h4 style="margin-top: 25px">Free shipping is available</h4></div>';
                        break;
                    case 'coupon':
                        $html_shippinginfo = '<div id="free_shiping_infooo"><h4 style="margin-top: 25px">You can use a coupon for free shipping</h4></div>';
                        break;
                    case 'min_amount':
                        $min_amount = (float)$shipping['shipping_methods'][1]->min_amount;
                        $total_sum = (float)$woocommerce->cart->get_cart_contents_total();
                        if($min_amount <= $total_sum){
                            $html_shippinginfo = '<div id="free_shiping_infooo"><h4 style="margin-top: 25px">Free shipping is active</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                        }
                        else{
                            $sum = $min_amount - $total_sum;
                            $percent_for_free = ($total_sum / $min_amount)*100;
                            $html_shippinginfo = '<div id="free_shiping_infooo"><h4>'.str_replace('_', ' ', str_replace('{left}', get_woocommerce_currency_symbol().$sum, $settings_arr->texts_free_shipping)).'</h4><div class="meter black nostripes"><span style="width: '.$percent_for_free.'%"></span></div></div>';
                        }
                        break;
                    case 'either':
                        $min_amount = (float)$shipping['shipping_methods'][1]->min_amount;

                        $free_shipping = false;
                        $total_sum = (float)$woocommerce->cart->get_cart_contents_total();
                        $coupones_arr = $woocommerce->cart->get_applied_coupons();
                        foreach ($coupones_arr as $coup){
                            $wc_coup = new WC_Coupon($coup);
                            if($wc_coup->get_free_shipping()){
                                $free_shipping = true;
                            }
                        }
                        if($free_shipping){
                            $html_shippinginfo = '<div id="free_shiping_infooo"><h4 style="margin-top: 25px">Free shipping was activated by coupon</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                        }
                        else{
                            if($min_amount <= $total_sum){
                                $html_shippinginfo = '<div id="free_shiping_infooo"><h4 style="margin-top: 25px">Free shipping is active</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                            }
                            else{
                                $sum = $min_amount - $total_sum;
                                $percent_for_free = ($total_sum / $min_amount)*100;
                                $html_shippinginfo = '<div id="free_shiping_infooo"><h4><!--You can use a coupon for free shipping or get full amount<br>-->'.str_replace('_', ' ', str_replace('{left}', get_woocommerce_currency_symbol().$sum, $settings_arr->texts_free_shipping)).'</h4><div class="meter black nostripes"><span style="width: '.$percent_for_free.'%"></span></div></div>';
                            }
                        }
                        break;
                    case 'both':
                        $min_amount = (float)$shipping['shipping_methods'][1]->min_amount;
                        $total_sum = (float)$woocommerce->cart->get_cart_contents_total();
                        $free_shipping = false;
                        $coupones_arr = $woocommerce->cart->get_applied_coupons();
                        foreach ($coupones_arr as $coup){
                            $wc_coup = new WC_Coupon($coup);
                            if($wc_coup->get_free_shipping()){
                                $free_shipping = true;
                            }
                        }

                        if($free_shipping && $min_amount <= $total_sum){
                            $html_shippinginfo = '<div id="free_shiping_infooo"><h4 style="margin-top: 25px">Free shipping is active</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                        }
                        else{
                            $sum = $min_amount - $total_sum;
                            if($sum < 0){
                                $sum = 0;
                            }
                            $percent_for_free = ($total_sum / $min_amount)*100;
                            if($percent_for_free > 100){
                                $percent_for_free = 100;
                            }
                            $html_shippinginfo = '<div id="free_shiping_infooo"><h4><!--You must use a coupon for free shipping and get full amount<br>-->'.str_replace('_', ' ', str_replace('{left}', get_woocommerce_currency_symbol().$sum, $settings_arr->texts_free_shipping)).'</h4><div class="meter black nostripes"><span style="width: '.$percent_for_free.'%"></span></div></div>';
                        }
                        break;
                }
            }
        }
    }
    $html .= $html_shippinginfo.'</div>';

    return $html;
}

add_shortcode('woonectio_extrashipping_freeshippingbar', 'woonectio_extrashipping_freeshippingbar_function');