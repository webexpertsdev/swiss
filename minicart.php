<?php
require(dirname(__FILE__, 4).'/wp-load.php');
require_once 'woo_tools_main.php';
global $wpdb;
global $woocommerce;
header('Content-Type: application/json');

$data_array = json_decode(array_search('', $_POST), true);

$tools = new woo_tools_main();

switch($data_array['dowhat']){
    case 'delete_all':
        WC()->cart->empty_cart();
        break;

    case 'add_from_suggested':
        WC()->cart->add_to_cart($data_array['id']);
        break;

    case 'add_one_item':
        $arr_final = [];
        $arr = array_filter(explode('^', $data_array['arr_do']));
        foreach($arr as $item) {
            $item_one = explode('___', $item);
            $arr_f = [];
            foreach($item_one as $val){
                $val = explode('__', $val);
                $arr_f[$val[0]] = $val[1];
            }
            array_push($arr_final, $arr_f);
        }
        foreach($arr_final as $data){
            $clear_data = [];
            $nomis = [];

            foreach($arr_final as $cl){
                if((int)$cl['id'] === (int)$data['id']){
                    array_push($nomis, (int)$cl['nominal']);
                }
            }

            $nomis = max($nomis);
            $product_id = '';
            // Set the product ID to remove
            $prod_to_remove = $data['id'];

            $kart_id = '';
            $var_id = $data['varid'];

            // Cycle through each product in the cart
            foreach(WC()->cart->cart_contents as $key => $prod_in_cart) {
                // Get the Variation or Product ID
                $prod_id = ( isset( $prod_in_cart['variation_id'] ) && $prod_in_cart['variation_id'] != 0 ) ? $prod_in_cart['variation_id'] : $prod_in_cart['product_id'];
                $prod_unique_id = WC()->cart->generate_cart_id( $prod_id );
                $cartItemKey = WC()->cart->find_product_in_cart( $prod_unique_id );
                $product_id = $prod_unique_id;

                $prod_cart = $prod_in_cart;

                if($var_id !== 'zero'){
                    // loop through cart items
                    foreach ( WC()->cart->get_cart() as $item_key => $item ) {
                        // If the targeted variation id is in cart
                        if ($item['variation_id'] === (int)$var_id) {
                            //$prod_var_id= WC()->cart->generate_cart_id($item['variation_id']);
                            //$cart_key = WC()->cart->find_product_in_cart( $prod_var_id );
                            $kart_id = $item_key;
                            $woocommerce->cart->set_quantity($kart_id, (int)$nomis, '', $arr, null);
                        }
                    }
                }else{
                    if ($prod_in_cart['product_id'] === (int)$prod_to_remove ) {
                        if($kart_id !== $cartItemKey){
                            $kart_id = $cartItemKey;
                        }
                    }
                }
            }

            if((int)$nomis === 0){
                WC()->cart->remove_cart_item($kart_id);
            }
            else{
                $woocommerce->cart->set_quantity($kart_id, (int)$nomis);
            }
        }
        break;

    case 'delete_one_item':
        $arr_final = [];
        $arr = array_filter(explode('^', $data_array['arr_do']));
        foreach($arr as $item) {
            $item_one = explode('___', $item);
            $arr_f = [];
            foreach($item_one as $val){
                $val = explode('__', $val);
                $arr_f[$val[0]] = $val[1];
            }
            array_push($arr_final, $arr_f);
        }
        foreach($arr_final as $data){
            $clear_data = [];
            $nomis = [];

            foreach($arr_final as $cl){
                if((int)$cl['id'] === (int)$data['id']){
                    array_push($nomis, (int)$cl['nominal']);
                }
            }

            $nomis = min($nomis);
            $product_id = '';
            // Set the product ID to remove
            $prod_to_remove = $data['id'];

            $kart_id = '';
            $var_id = $data['varid'];

            // Cycle through each product in the cart
            foreach(WC()->cart->cart_contents as $key => $prod_in_cart) {
                // Get the Variation or Product ID
                $prod_id = ( isset( $prod_in_cart['variation_id'] ) && $prod_in_cart['variation_id'] != 0 ) ? $prod_in_cart['variation_id'] : $prod_in_cart['product_id'];
                $prod_unique_id = WC()->cart->generate_cart_id( $prod_id );
                $cartItemKey = WC()->cart->find_product_in_cart( $prod_unique_id );
                $product_id = $prod_unique_id;

                $prod_cart = $prod_in_cart;

                if($var_id !== 'zero'){
                    // loop through cart items
                    foreach ( WC()->cart->get_cart() as $item_key => $item ) {
                        // If the targeted variation id is in cart
                        if ($item['variation_id'] === (int)$var_id) {
                            //$prod_var_id= WC()->cart->generate_cart_id($item['variation_id']);
                            //$cart_key = WC()->cart->find_product_in_cart( $prod_var_id );
                            $kart_id = $item_key;
                        }
                    }
                }else{
                    if ($prod_in_cart['product_id'] === (int)$prod_to_remove ) {
                        if($kart_id !== $cartItemKey){
                            $kart_id = $cartItemKey;
                        }
                    }
                }
            }

            if((int)$nomis === 0){
                WC()->cart->remove_cart_item($kart_id);
            }
            else{
                $woocommerce->cart->set_quantity($kart_id, (int)$nomis);
            }
        }
        break;

    case 'total_product_delete':
        $product_id = '';
        // Set the product ID to remove
        $prod_to_remove = $data_array['id'];
        $kart_id = '';
        $var_id = $data_array['var_id'];
        foreach(WC()->cart->cart_contents as $key => $prod_in_cart) {
            // Get the Variation or Product ID
            $prod_id = ( isset( $prod_in_cart['variation_id'] ) && $prod_in_cart['variation_id'] != 0 ) ? $prod_in_cart['variation_id'] : $prod_in_cart['product_id'];
            $prod_unique_id = WC()->cart->generate_cart_id( $prod_id );
            $cartItemKey = WC()->cart->find_product_in_cart( $prod_unique_id );
            $product_id = $prod_unique_id;

            $prod_cart = $prod_in_cart;

            if($var_id !== 'zero'){
                // loop through cart items
                foreach ( WC()->cart->get_cart() as $item_key => $item ) {
                    // If the targeted variation id is in cart
                    if ($item['variation_id'] === (int)$var_id) {
                        $prod_var_id= WC()->cart->generate_cart_id($item['variation_id']);
                        $cart_key = WC()->cart->find_product_in_cart( $prod_var_id );
                        WC()->cart->remove_cart_item($item_key); // we remove it
                        return; // stop the loop
                    }
                }
            }else{
                if ($prod_in_cart['product_id'] === (int)$prod_to_remove ) {
                    if($kart_id !== $cartItemKey){
                        $kart_id = $cartItemKey;
                    }
                }
            }
        }
        WC()->cart->remove_cart_item($kart_id);
        break;


    case 'get_load':
        $response = [];

        $slider_top = '';
        $slider_bottom = '';

        /*
         * Get minicard settings array
         *
         * */

        $settings = $wpdb->get_row("SELECT * FROM woonectio_minicard_settings WHERE id=0");
        $settings_arr = [];
        foreach ($settings as $key => $value){
            $settings_arr[$key] = $value;
        }
        $settings_arr['quant'] = WC()->cart->get_subtotal();
        $response['settings'] = $settings_arr;

        /*
         * Start html content creating
         *
         * */

        $html = '';


        /*
         * Check if top basket icon is enable
         *
         * */

        if((int)$settings_arr['show_basket_icon'] === 1){
            $html .= '<div class="basketicon">'.'&'.$settings_arr['basket_basketicon'].'</div>';
        }

        /*
         * Add notification container
         *
         * */

        $html .= '<div class="woonectio_minicard_notifiactione"></div>';

        /*
         * Start minicard body header
         *
         * */

        $html .= '<div id="woonectio_minicard_body">';

        /*
         * Check if close icon is enable
         *
         * */

        if((int)$settings_arr['show_close_icon'] === 1){
            $html .= '<div class="woonectio_minicard_closeiconwrappper">
                        <div id="woonectio_minicart_iconclose">'.'&'.$settings_arr['heading_closeicontype'].'</div>
                      </div>';
        }

        /*
         * Add minicard header title
         *
         * */

        $html .= '<div class="show_topbar">
                    <h2 id="woonectio_minicard_header">'.str_replace('_', ' ', $settings_arr['texts_cart_header']).'</h2>
                  </div>';


        /*
         * Add minicard shipping bar(if enabled)
         *
         * */

        if((int)$settings_arr['show_free_shipping_bar'] === 1){
            $html .= '<div id="woonectio_minicard_shipping">';

            $shipping_info = WC_Shipping_Zones::get_zones();
            $user_country = $tools->get_user_geo_country();
            $html_shippinginfo = '';
            foreach($shipping_info as $shipping){
                foreach ($shipping['zone_locations'] as $zone){
                    if(in_array($user_country, (array)$zone)){
                        switch ($shipping['shipping_methods'][1]->requires){
                            case null:
                                $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4 style="margin-top: 25px">Free shipping is available</h4></div>';
                                break;
                            case 'coupon':
                                $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4 style="margin-top: 25px">You can use a coupon for free shipping</h4></div>';
                                break;
                            case 'min_amount':
                                $min_amount = (float)$shipping['shipping_methods'][1]->min_amount;
                                $total_sum = (float)$woocommerce->cart->get_cart_contents_total();
                                if($min_amount <= $total_sum){
                                    $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4 style="margin-top: 25px">Free shipping is active</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                                }
                                else{
                                    $sum = $min_amount - $total_sum;
                                    $percent_for_free = ($total_sum / $min_amount)*100;
                                    $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4>'.str_replace('_', ' ', str_replace('{left}', get_woocommerce_currency_symbol().$sum, $settings_arr['texts_remaining_amount'])).'</h4><div class="meter black nostripes"><span style="width: '.$percent_for_free.'%"></span></div></div>';
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
                                    $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4 style="margin-top: 25px">Free shipping was activated by coupon</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                                }
                                else{
                                    if($min_amount <= $total_sum){
                                        $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4 style="margin-top: 25px">Free shipping is active</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
                                    }
                                    else{
                                        $sum = $min_amount - $total_sum;
                                        $percent_for_free = ($total_sum / $min_amount)*100;
                                        $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4><!--You can use a coupon for free shipping or get full amount<br>-->'.str_replace('_', ' ', str_replace('{left}', get_woocommerce_currency_symbol().$sum, $settings_arr['texts_remaining_amount'])).'</h4><div class="meter black nostripes"><span style="width: '.$percent_for_free.'%"></span></div></div>';
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
                                    $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4 style="margin-top: 25px">Free shipping is active</h4><div class="meter black nostripes"><span style="width: 100%"></span></div></div>';
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
                                    $html_shippinginfo = '<div id="free_shiping_infooo"><h3>'.str_replace('_', ' ', $settings_arr['texts_free_shipping']).'</h3><h4><!--You must use a coupon for free shipping and get full amount<br>-->'.str_replace('_', ' ', str_replace('{left}', get_woocommerce_currency_symbol().$sum, $settings_arr['texts_remaining_amount'])).'</h4><div class="meter black nostripes"><span style="width: '.$percent_for_free.'%"></span></div></div>';
                                }
                                break;
                        }
                    }
                }
            }

            $html .= $html_shippinginfo.'</div>';
        }

        /*
         * End of minicard header block
         *
         * */

        $html .= '</div>';

        /*
         * Add minicard promo codes page
         *
         * */

        $html .= '<div id="woonectio_minicard_promocodes" style="display: none">
            <p id="woonectio_cardsettings_back_usingpromo" style="text-transform: uppercase; cursor: pointer; font-weight: bold;">return</p>
            <form id="woonectio_coupon_code">
                <input type="text" id="woonectio_couponecode">
                <button type="submit">submit</button>
            </form>
            <div class="promocodes">';

        global $wpdb;
        global $product;

        $coupon_codes = $wpdb->get_col("SELECT id FROM $wpdb->posts WHERE post_type = 'shop_coupon' AND post_status = 'publish' ORDER BY post_name ASC");
        $coupone_arr = array_chunk(explode(',', str_replace(' ', '', implode(', ', $coupon_codes))), 1);

        $html_codes = '';

        if(!empty($settings_arr['custom_coupons_post_id'])){
            $coupone_arr = array_chunk(explode(',', str_replace(' ', '', $settings_arr['custom_coupons_post_id'])), 1);
        }

        $coupone_arr = array_splice($coupone_arr, 0, (int)$settings_arr['maximum_coupouns_count']);

        foreach($coupone_arr as $key => $id){
            $cop = new WC_Coupon(get_post($id[0])->post_title);

            $expire_date = $cop->get_date_expires() === null ? '' : $cop->get_date_expires()->date('Y-m-d');
            switch($settings_arr['coupons_list']){
                case 'all':
                    if(!in_array($cop->get_code(), $woocommerce->cart->applied_coupons)){
                        $html_codes .= '<div class="promo-wrapper">
                                <h5>Code: '.$cop->get_code().'</h5>
                                <p>Amount: '.$cop->get_amount().'
                                <p>Description: '.$cop->get_description().'
                                <p>Expire date: '.$expire_date.'
                            </div>';
                    }
                    else{
                        $html_codes .= '<div class="promo-wrapper">
                                <h5 style="padding: 1px 2px; color: green; border: 1px green solid; border-radius: 1px">ACTIVE</h5>
                                <p>Amount: '.$cop->get_amount().'
                                <p>Description: '.$cop->get_description().'
                                <p>Expire date: '.$expire_date.'
                            </div>';
                    }
                    break;

                case 'available_only':
                    if(!in_array($cop->get_code(), $woocommerce->cart->applied_coupons)){
                        $html_codes .= '<div class="promo-wrapper">
                                <h5>Code: '.$cop->get_code().'</h5>
                                <p>Amount: '.$cop->get_amount().'
                                <p>Description: '.$cop->get_description().'
                                <p>Expire date: '.$expire_date.'
                            </div>';
                    }
                    break;

                case 'hide':
                    if(!strpos($html_codes, 'promo-wrapper')){
                        $html_codes .= '<div class="promo-wrapper" style="text-align: center; text-transform: uppercase">coupons are hide</div>';
                    }
                    break;
            }
        }

        $html .= $html_codes.'</div></div>';

        /*
         * Add minicard products
         *
         * */

        $count = 0;
        $product_array = [];

        $checkout_url = '';

        foreach( WC()->cart->get_cart() as $cart_item){
            $order=new WC_order;

            $product_variation = new WC_Product_Variation($cart_item['variation_id']);

            $product_array[$count] = [
                'product_id' => $cart_item['product_id'],
                'quantity' => $cart_item['quantity'],
                'name' => json_decode($cart_item['data'], true)['name'],
                'image' => wc_get_product($cart_item['product_id'])->get_image(),
                'regular_price' =>  wc_get_product($cart_item['product_id'])->get_regular_price() === '' ? $product_variation->get_regular_price() : wc_get_product($cart_item['product_id'])->get_regular_price(),
                'subtotal' => $cart_item['line_subtotal'],
                'currency' => get_woocommerce_currency_symbol(),
                'sale_price' => wc_get_product($cart_item['product_id'])->get_sale_price() === '' ? $product_variation->get_sale_price() : wc_get_product($cart_item['product_id'])->get_sale_price(),
                'variation' => $cart_item['variation'],
                'variation_id' => $cart_item['variation_id']
            ];
            $checkout_url = $order->get_checkout_payment_url();
            $count++;
        }

        if(empty($product_array)){
            $link = 'href="'.$settings_arr['empty_cart_button_url'].'"';
            if((int)$settings_arr['show_footer_empty_card_link'] !== 1){
                $link = '';
            }
            $html .= '<div class="woonectio_emptycard_message"><a id="empty_card_notii" style="text-transform: uppercase" '.$link.'>'.str_replace('_', ' ', $settings_arr['texts_empty_card']).'</a></div>';
        }
        else{
            $html .= '<div class="woonectio-product-product-wrapper-global">';

            if($settings_arr['cart_order'] === 'DESC'){
                $product_array = array_reverse($product_array);
            }

            foreach($product_array as $key => $value){
                $count_of_buy = get_post_meta($value['product_id'], 'total_sales', true);
                $price_line = '';
                if((int)$settings_arr['show_product_prices'] !== 1){
                    $value['regular_price'] = '';
                    $value['sale_price'] = '';
                }

                if((int)$settings_arr['show_product_total'] !== 1){
                    $value['subtotal'] = '';
                }

                if((int)$settings_arr['show_product_prices'] === 1 && (int)$settings_arr['show_product_total'] === 1){
                    if(!empty($value['sale_price'])){
                        $price = $value['sale_price'].' '.$value['currency'];
                        if((int)$settings_arr['show_product_sales_count'] === 1){
                            $price = '<span style="text-decoration: line-through">'.$value['regular_price'].'</span>'.' '.$value['sale_price'].' '.$value['currency'];
                        }
                        $price_line .= '<div>
                                        <p><b>'.$settings_arr['price_show_text'].': '.$price.'</b></p>
                                       
                                    </div>';
                    }
                    else{
                        $price_line .= '<div>
                                        <p><b>'.$settings_arr['price_show_text'].': '.$value['regular_price'].' '.$value['currency'].'</b></p>
                    
                                    </div>';
                    }
                }
                else{
                    if((int)$settings_arr['show_product_prices'] === 1){
                        if(!empty($value['sale_price'])){
                            $price = $value['sale_price'].' '.$value['currency'];
                            if((int)$settings_arr['show_product_sales_count'] === 1){
                                $price = '<span style="text-decoration: line-through">'.$value['regular_price'].'</span>'.' '.$value['sale_price'].' '.$value['currency'];
                            }
                            $price_line .= '<div>
                                        <p><b>'.$settings_arr['price_show_text'].': <span style="font-weight: bold"> '.$price.'</b></p>
                                    </div>';
                        }
                        else{
                            $price_line .= '<div>
                                            <p><b>'.$settings_arr['price_show_text'].': '.$value['regular_price'].' '.$value['currency'].'</b></p>
                                        </div>';
                        }
                    }

                    if((int)$settings_arr['show_product_total'] === 1){
                        if(!empty($value['sale_price'])){
                            $price = $value['sale_price'].' '.$value['currency'];
                            if((int)$settings_arr['show_product_sales_count'] === 1){
                                $price = '<span style="text-decoration: line-through">'.$value['regular_price'].'</span>'.' '.$value['sale_price'].' '.$value['currency'];
                            }
                            $price_line .= '<div>
                                            <p><b>'.$price.' sale price</b></p>
                                        </div>';
                        }
                        else{
                            $price_line .= '<div>
                                            <p><b>'.$value['subtotal'].' '.$value['currency'].'</b></p>
                                        </div>';
                        }
                    }
                }

                $sale_text = '';

                if(!empty($value['sale_price'])){
                    $sale_text = '<span style="font-weight: bold; text-transform: uppercase; color: red; border: 1px solid red; padding: 1px">sale</span>';
                }

                $pp_image = '';
                if((int)$settings_arr['show_product_img'] === 1){
                    $pp_image = $value['image'];
                }

                $pp_name = '';
                if((int)$settings_arr['show_product_name'] === 1){
                    $pp_name = $value['name'];
                }


                $link_to_product = '';
                if((int)$settings_arr['show_link_to_page_product'] === 1){
                    $link_to_product = 'href="'.get_permalink($value['product_id']).'"';
                }

                $variation_id = '';
                $variation_title = '';
                $variation_price = '';
                $variation_attr = '';
                $current_product_var = [];

                if(isset($value['variation']) && count($value['variation']) > 0 ){
                    //get the WooCommerce Product object by product ID
                    $current_product_var = new  WC_Product_Variable($value['product_id']);
                    //get the variations of this product
                    $variations = $current_product_var->get_available_variations();
                    //Loop through each variation to get its title
                    foreach($variations as $index => $data){
                        $variation_title = esc_html(get_the_title($data['variation_id']));
                        $variation_price = $data['display_price'];
                        $variation_attr  = $data['attributes'];
                    }
                }

                $variation_id = $value['variation_id'];

                $handle= new WC_Product_Variable($value['product_id']);

                $var_id = implode(",", wp_list_pluck($handle->get_available_variations(), 'variation_id'));
                $variation_product = new WC_Product_Variation($var_id);

                $reg_price = $variation_product->get_regular_price();
                $sale_price = $variation_product->get_sale_price();

                $qty_change = '<div style="cursor: none; padding: 2px 5px; border: 1px solid black; background-color: white; color: black">'.$value['quantity'].'</div>';
                if((int)$settings_arr['allow_ilosc_update'] === 1){
                    $qty_change = '<div class="woonectio_deleteoneitem" id="woonectio_pp_update_'.$value['product_id'].'" var_id="'.$variation_id.'">-</div>
                                    <input class="woonectio_sidecard_productinput" id="woonectio_input_and_product_qty_'.$value['product_id'].'" type="number" min="0" step="1" value="'.$value['quantity'].'">
                                    <div class="woonectio_addoneitem" id="woonectio_pp_update_'.$value['product_id'].'" var_id="'.$variation_id.'">+</div>';
                }

                $dd_option = '<div class="woonectio-minicart-product-data-namep-delete-option">
                                <b style="text-transform: uppercase">'.$pp_name.' '.$sale_text.'</b>
                                <span class="woonectio_total_deleted_product" id="product_'.$value['product_id'].'" var_id="'.$variation_id.'">'.'&'.$settings_arr['sidecartbody_wasteicon'].'</span>
                            </div>';

                if((int)$settings_arr['show_product_metadata'] === 1 && !empty($value['variation'])){
                    $pp_name = $variation_title;
                    $attr_idd = '<div><b style="text-transform: uppercase">'.$pp_name.' '.$sale_text.'</b>';
                    $sale_attr = '';
                    foreach ($value['variation'] as $key => $value2) {
                        $attr_name = str_replace('attribute_', '', $key);
                        $attr_idd .= '<br><span class="woonectio_vargaine" style="font-style: italic" id="'.$attr_name.'_'.$value2.'">'.ucfirst($attr_name).' : '.ucfirst($value2).'</span>';
                        $sale_attr .=$attr_name.'_'.$value2.'_';
                    }
                    $attr_idd .= '</div>';

                    $dd_option = '<div class="woonectio-minicart-product-data-namep-delete-option">
                                '.$attr_idd.'
                                <span class="woonectio_total_deleted_product" id="product_'.$variation_id.'" var_id="'.$sale_attr.'">'.'&'.$settings_arr['sidecartbody_wasteicon'].'</span>
                            </div>';
                }


                $html .= '<div class="product_woonectio_sidecard">
                            <a class="img" '.$link_to_product.'>'.$pp_image.'</a>
                            <div class="woonectio-minicart-product-data-wrapper">
                                <div class="woonectio-minicart-product-data-buyercount">'.str_replace('_', ' ', str_replace('{times}', $count_of_buy, $settings_arr['time_was_buyed'])).'</div>
                            '.$dd_option.'
                            <div class="woonectio-minicart-product-data-total">
                            <div class="woonectio-minicard-priceitem">'.$price_line.'</div>
             
                            </div>
                            <div class="pre-wrapper-woonectio-minicard-details">
                            <div class="woonectio_form_input_wrapper_product">
                                    '.$qty_change.'
                            </div>
                            <b><span>'.$value['subtotal'].'</span> '.$value['currency'].'</b>
                            </div>
                            </div>
                           '.$slider_top.'
                            </div>';
            }

            $slider = '';
            if((int)$settings_arr['enable_suggested_products'] === 1 && !empty($product_array)){
                $html_suggested = '<div>
<div style="text-align: center;padding-top: 15px;
    font-weight: 600; font-size: 16px">Products you might like</div>
                                <div class="slideshow-container">
                                    <a class="woonectio_prev">❮</a>
                                    <div class="mySlides fade" style="display: block;">';

                switch($settings_arr['show_suggested_product_type']){
                    case 'get_upsells':
                        foreach(WC()->cart->get_cart() as $item){
                            $product = new WC_Product($item['product_id']);
                            if(!empty($product->get_upsell_ids())){
                                $upss_ids = $product->get_upsell_ids();
                                if(!empty($settings_arr['show_suggested_number_of_products'])){
                                    $upss_ids = array_slice($upss_ids, 0, (int)$settings_arr['show_suggested_number_of_products']);
                                }
                                foreach($upss_ids as $key => $value){
                                    $product_var_in = '';
                                    $item_instance = wc_get_product($value);
                                    $reg_price = '';

                                    $variation_form = '';
                                    if($item_instance->is_type( 'simple' )){
                                        $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                    }
                                    else{
                                        $product_var_in = get_permalink( $value );
                                       // $variation_form .= '<form id="woonectio_pp_var_carousel_'.$item_instance->get_id().'">';
                                        $reg_price = $item_instance->get_variation_regular_price( 'max', true ).' '.get_woocommerce_currency_symbol();
//                                        $variations = $item_instance->get_available_variations();
//                                        $variations_id_array = wp_list_pluck( $variations, 'variation_id' );
//                                        $variation_form .= '<select>';
//                                        foreach($variations as $key => $variant){
//                                            $handle=new WC_Product_Variation($variations_id_array[0]);
//                                            echo print_r($variant);
//                                            $variation_form .= '<option  value="'.$variations_id_array[0].'">'.implode(" / ", $handle->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$handle->get_price().'</option>';
//                                        }
//                                        $variation_form .= '</select>';
//                                        $variation_form .= '</form>';
                                    }

                                    $it_img = wc_get_product($value)->get_image();
                                    if((int)$settings_arr['show_suggested_product_img'] !== 1){
                                        $it_img = '';
                                    }

                                    $product_title = $item_instance->get_name();
                                    if((int)$settings_arr['show_suggested_product_title'] !== 1){
                                        $product_title = '';
                                    }

                                    $add_to_cart_btn = '<div class="woonectio_add_suggested_product" id="woonectio_id_for_suggested_'.$value.'" link_to_varpp="'.$product_var_in.'">add</div>';
                                    if((int)$settings_arr['show_suggested_add_to_card_btn'] !== 1){
                                        $add_to_cart_btn = '';
                                    }

                                    $html_suggested .= '<div class="item">'.$it_img.'
                                                        <div class="woonectio-minicart-slider-productwrapper">
                                                        <div class="woonectio-minicart-slider-productwrapper-productname">'.$product_title.'</div>
                                                            <div class="woonectio-minicart-slider-productwrapper-productinfo-wrapper">
                                                                <div class="woonectio-minicart-slider-productwrapper-productname-price">'.$reg_price.'</div>
                                                                '.$add_to_cart_btn.'
                                                            </div>
                                                        </div>
                                                    </div>';
                                }
                            }
                        }
                        break;

                    case 'get_cross_sells':
                        foreach(WC()->cart->get_cart() as $item){
                            $product = wc_get_product($item['product_id']);
                            if(!empty($product->get_cross_sell_ids())){
                                $cross_ids = $product->get_cross_sell_ids();
                                if(!empty($settings_arr['show_suggested_number_of_products'])){
                                    $cross_ids = array_slice($cross_ids, 0, (int)$settings_arr['show_suggested_number_of_products']);
                                }
                                foreach($cross_ids as $key => $value){
                                    $item_instance = new WC_Product($value);
                                    $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                    $product_var_in = '';
                                    if($item_instance->is_type( 'simple' )){
                                        $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                    }
                                    else{
                                        $product_var_in = get_permalink( $value );
                                        // $variation_form .= '<form id="woonectio_pp_var_carousel_'.$item_instance->get_id().'">';
                                        $reg_price = $item_instance->get_variation_regular_price( 'max', true ).' '.get_woocommerce_currency_symbol();
//                                        $variations = $item_instance->get_available_variations();
//                                        $variations_id_array = wp_list_pluck( $variations, 'variation_id' );
//                                        $variation_form .= '<select>';
//                                        foreach($variations as $key => $variant){
//                                            $handle=new WC_Product_Variation($variations_id_array[0]);
//                                            echo print_r($variant);
//                                            $variation_form .= '<option  value="'.$variations_id_array[0].'">'.implode(" / ", $handle->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$handle->get_price().'</option>';
//                                        }
//                                        $variation_form .= '</select>';
//                                        $variation_form .= '</form>';
                                    }

                                    $it_img = wc_get_product($value)->get_image();
                                    if((int)$settings_arr['show_suggested_product_img'] !== 1){
                                        $it_img = '';
                                    }

                                    $product_title = $item_instance->get_name();
                                    if((int)$settings_arr['show_suggested_product_title'] !== 1){
                                        $product_title = '';
                                    }

                                    $add_to_cart_btn = '<div class="woonectio_add_suggested_product" id="woonectio_id_for_suggested_'.$value.'" link_to_varpp="'.$product_var_in.'">add</div>';
                                    if((int)$settings_arr['show_suggested_add_to_card_btn'] !== 1){
                                        $add_to_cart_btn = '';
                                    }

                                    $html_suggested .= '<div class="item">'.$it_img.'
                                                        <div class="woonectio-minicart-slider-productwrapper">
                                                        <div class="woonectio-minicart-slider-productwrapper-productname">'.$product_title.'</div>
                                                            <div class="woonectio-minicart-slider-productwrapper-productinfo-wrapper">
                                                                <div class="woonectio-minicart-slider-productwrapper-productname-price">'.$reg_price.'</div>
                                                                '.$add_to_cart_btn.'
                                                            </div>
                                                        </div>
                                                    </div>';
                                }
                            }
                        }
                        break;

                    case 'related':
                        $rel_arr = WC()->cart->get_cart();
                        if(!empty($settings_arr['show_suggested_number_of_products'])){
                            $rel_arr = array_slice($rel_arr, 0, (int)$settings_arr['show_suggested_number_of_products']);
                        }
                        foreach($rel_arr as $item){
                            $product = new WC_Product($item['product_id']);
                            foreach(wc_get_related_products($product->get_id()) as $key => $value){
                                $item_instance = wc_get_product($value);
                                $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                $product_var_in = '';
                                if($item_instance->is_type( 'simple' )){
                                    $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                }
                                else{
                                    $product_var_in = get_permalink( $value );
                                    // $variation_form .= '<form id="woonectio_pp_var_carousel_'.$item_instance->get_id().'">';
                                    $reg_price = $item_instance->get_variation_regular_price( 'max', true ).' '.get_woocommerce_currency_symbol();
//                                        $variations = $item_instance->get_available_variations();
//                                        $variations_id_array = wp_list_pluck( $variations, 'variation_id' );
//                                        $variation_form .= '<select>';
//                                        foreach($variations as $key => $variant){
//                                            $handle=new WC_Product_Variation($variations_id_array[0]);
//                                            echo print_r($variant);
//                                            $variation_form .= '<option  value="'.$variations_id_array[0].'">'.implode(" / ", $handle->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$handle->get_price().'</option>';
//                                        }
//                                        $variation_form .= '</select>';
//                                        $variation_form .= '</form>';
                                }

                                $it_img = wc_get_product($value)->get_image();
                                if((int)$settings_arr['show_suggested_product_img'] !== 1){
                                    $it_img = '';
                                }

                                $product_title = $item_instance->get_name();
                                if((int)$settings_arr['show_suggested_product_title'] !== 1){
                                    $product_title = '';
                                }

                                $add_to_cart_btn = '<div class="woonectio_add_suggested_product" id="woonectio_id_for_suggested_'.$value.'" link_to_varpp="'.$product_var_in.'">add</div>';
                                if((int)$settings_arr['show_suggested_add_to_card_btn'] !== 1){
                                    $add_to_cart_btn = '';
                                }

                                $html_suggested .= '<div class="item">'.$it_img.'
                                                        <div class="woonectio-minicart-slider-productwrapper">
                                                        <div class="woonectio-minicart-slider-productwrapper-productname">'.$product_title.'</div>
                                                            <div class="woonectio-minicart-slider-productwrapper-productinfo-wrapper">
                                                                <div class="woonectio-minicart-slider-productwrapper-productname-price">'.$reg_price.'</div>
                                                                '.$add_to_cart_btn.'
                                                            </div>
                                                        </div>
                                                    </div>';
                            }
                        }
                        break;

                    case 'custom':
                        $custom_pp = explode(',', str_replace(' ', '', $settings_arr['show_suggested_custom_products_id']));
                        if(!empty($custom_pp)){
                            if(!empty($settings_arr['show_suggested_number_of_products'])){
                                $custom_pp = array_slice($custom_pp, 0, (int)$settings_arr['show_suggested_number_of_products']);
                            }
                            foreach($custom_pp as $id){
                                $item_instance = wc_get_product($id);
                                $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                $product_var_in = '';
                                if($item_instance->is_type( 'simple' )){
                                    $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                }
                                else{
                                    $product_var_in = get_permalink( $value );
                                    // $variation_form .= '<form id="woonectio_pp_var_carousel_'.$item_instance->get_id().'">';
                                    $reg_price = $item_instance->get_variation_regular_price( 'max', true ).' '.get_woocommerce_currency_symbol();
//                                        $variations = $item_instance->get_available_variations();
//                                        $variations_id_array = wp_list_pluck( $variations, 'variation_id' );
//                                        $variation_form .= '<select>';
//                                        foreach($variations as $key => $variant){
//                                            $handle=new WC_Product_Variation($variations_id_array[0]);
//                                            echo print_r($variant);
//                                            $variation_form .= '<option  value="'.$variations_id_array[0].'">'.implode(" / ", $handle->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$handle->get_price().'</option>';
//                                        }
//                                        $variation_form .= '</select>';
//                                        $variation_form .= '</form>';
                                }

                                $it_img = wc_get_product($id)->get_image();
                                if((int)$settings_arr['show_suggested_product_img'] !== 1){
                                    $it_img = '';
                                }

                                $product_title = $item_instance->get_name();
                                if((int)$settings_arr['show_suggested_product_title'] !== 1){
                                    $product_title = '';
                                }

                                $add_to_cart_btn = '<div class="woonectio_add_suggested_product" id="woonectio_id_for_suggested_'.$id.'" link_to_varpp="'.$product_var_in.'">add</div>';
                                if((int)$settings_arr['show_suggested_add_to_card_btn'] !== 1){
                                    $add_to_cart_btn = '';
                                }

                                $html_suggested .= '<div class="item">'.$it_img.'
                                                        <div class="woonectio-minicart-slider-productwrapper">
                                                        <div class="woonectio-minicart-slider-productwrapper-productname">'.$product_title.'</div>
                                                            <div class="woonectio-minicart-slider-productwrapper-productinfo-wrapper">
                                                                <div class="woonectio-minicart-slider-productwrapper-productname-price">'.$reg_price.'</div>
                                                                '.$add_to_cart_btn.'
                                                            </div>
                                                        </div>
                                                    </div>';
                            }
                        }
                        break;

                    case 'random':
                        $product_ids = [];
                        $args_data = array('post_type' => 'product', 'posts_per_page' => -1);
                        query_posts($args_data);
                        while (have_posts()) : the_post();
                            array_push($product_ids, $product->get_id());
                        endwhile;

                        if(!empty($settings_arr['show_suggested_number_of_products'])){
                            $product_ids = array_slice($product_ids, 0, (int)$settings_arr['show_suggested_number_of_products']);
                        }

                        if(!empty($product_ids)){
                            foreach($product_ids as $id){
                                $item_instance = wc_get_product($id);
                                $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();

                                $product_var_in = '';
                                if($item_instance->is_type( 'simple' )){
                                    $reg_price = $item_instance->get_regular_price().' '.get_woocommerce_currency_symbol();
                                }
                                else{
                                    $product_var_in = get_permalink( $value );
                                    // $variation_form .= '<form id="woonectio_pp_var_carousel_'.$item_instance->get_id().'">';
                                    $reg_price = $item_instance->get_variation_regular_price( 'max', true ).' '.get_woocommerce_currency_symbol();
//                                        $variations = $item_instance->get_available_variations();
//                                        $variations_id_array = wp_list_pluck( $variations, 'variation_id' );
//                                        $variation_form .= '<select>';
//                                        foreach($variations as $key => $variant){
//                                            $handle=new WC_Product_Variation($variations_id_array[0]);
//                                            echo print_r($variant);
//                                            $variation_form .= '<option  value="'.$variations_id_array[0].'">'.implode(" / ", $handle->get_variation_attributes()).'-'.get_woocommerce_currency_symbol().$handle->get_price().'</option>';
//                                        }
//                                        $variation_form .= '</select>';
//                                        $variation_form .= '</form>';
                                }

                                $it_img = wc_get_product($id)->get_image();
                                if((int)$settings_arr['show_suggested_product_img'] !== 1){
                                    $it_img = '';
                                }

                                $product_title = $item_instance->get_name();
                                if((int)$settings_arr['show_suggested_product_title'] !== 1){
                                    $product_title = '';
                                }

                                $add_to_cart_btn = '<div class="woonectio_add_suggested_product" id="woonectio_id_for_suggested_'.$id.'" link_to_varpp="'.$product_var_in.'">add</div>';
                                if((int)$settings_arr['show_suggested_add_to_card_btn'] !== 1){
                                    $add_to_cart_btn = '';
                                }

                                $html_suggested .= '<div class="item">'.$it_img.'
                                                        <div class="woonectio-minicart-slider-productwrapper">
                                                        <div class="woonectio-minicart-slider-productwrapper-productname">'.$product_title.'</div>
                                                            <div class="woonectio-minicart-slider-productwrapper-productinfo-wrapper">
                                                                <div class="woonectio-minicart-slider-productwrapper-productname-price">'.$reg_price.'</div>
                                                                '.$add_to_cart_btn.'
                                                            </div>
                                                        </div>
                                                    </div>';
                            }
                        }
                        break;
                }

                if(strpos($html_suggested, 'item')){
                    $slider = $html_suggested.'</div>
                                    <a class="woonectio_next">❯</a>
                                </div>
                            </div>';
                }
            }

            switch($settings_arr['suggestedproductstyle_location']){
                case 'after':
                    $slider_bottom = $slider;
                    break;
                case 'before':
                    $slider_top = $slider;
                    break;
            }

            $html .= $slider_top.'</div>';
        }

        /*
         * Add minicard footer
         *
         * */
        global $woocommerce;
        $cart_total_sum = (int)$woocommerce->cart->cart_contents_total + (int)$woocommerce->cart->tax_total + (int)$woocommerce->cart->shipping_total.' '.get_woocommerce_currency_symbol();

        $empty_card_link = '';

        if(!empty($product_array)){
            $empty_card_link = '<div class="woonectio_empty_card"><span id="woonectio_empty_card">Empty card</span></div>';
        }

        $sum_of_coupone_amount = 0;

        foreach($woocommerce->cart->applied_coupons as $id){
            $cop = new WC_Coupon($id);
            $sum_of_coupone_amount += $cop->get_amount();
        }

        $discount_html = '';

        if($sum_of_coupone_amount > 0){
            $discount_html = '<span style="color: red">sum of discount: '.$sum_of_coupone_amount.' '.get_woocommerce_currency_symbol().'</span>';
        }

        $cart_subototal_total = '';
        if((int)$settings_arr['show_footer_subtotal'] === 1){
            $sub = WC()->cart->get_cart_subtotal();
            $cart_subototal_total = '<div class="woonectio-minicard-bare-topwrapper-total">
                        <span>Subtotal</span>
                        <div style="display: flex; flex-direction: column; text-align: right">
                        <span>'.$sub.'</span></div>
                    </div>';
        }

        if((int)$settings_arr['show_footer_discount'] !== 1){
            $discount_html = '';
        }

        $tax = '';

        if((int)$settings_arr['show_footer_tax'] === 1){
            $all_tax_rates = [];
            $tax_classes = WC_Tax::get_tax_classes(); // Retrieve all tax classes.
            if ( !in_array( '', $tax_classes ) ) { // Make sure "Standard rate" (empty class name) is present.
                array_unshift( $tax_classes, '' );
            }
            foreach ( $tax_classes as $tax_class ) { // For each tax class, get all rates.
                $taxes = WC_Tax::get_rates_for_tax_class( $tax_class );
                $all_tax_rates = array_merge( $all_tax_rates, $taxes );
            }

            foreach ($all_tax_rates as $tax){
                $country_locale = $tools->get_user_geo_country();
                if($country_locale === $tax->tax_rate_country){
                    $tax = '<div class="woonectio-minicard-bare-topwrapper-total">
                        <span>'.$tax->tax_rate_name.'</span>
                        <div style="display: flex; flex-direction: column; text-align: right">
                        <span>'.explode('.', $tax->tax_rate)[0].'%</span></div>
                    </div>';
                }
            }
        }

        $cart_total = '';
        if((int)$settings_arr['show_footer_total'] === 1){
            $cart_total .= '<div class="woonectio-minicard-bare-topwrapper-total" style="border-top: 1px solid black; border-top-style: dashed">
                        <span>Total</span>
                        <div style="display: flex; flex-direction: column; text-align: right">
                        '.$discount_html.'
                        <span>'.$cart_total_sum.'</span></div>
                    </div>';
        }


        $html .= '<div class="buttons" id="mini_card_bare">
                    '.$empty_card_link.' 
                    <div class="woonectio-minicard-bare-topwrapper">
                        <a class="woonectio-minicard-bare-topwrapper-coupon"><img src="https://img.icons8.com/small/22/000000/discount.png"/>&nbsp; Have a coupon?</a>
                    </div>
                    '.$cart_subototal_total.'
                    '.$tax.'
                    '.$cart_total.'
                    <div class="woonectio-minicard-buttonwrapper">
                        <a class="btn" id="woonectio_continue_shopping_btn">'.str_replace('_', ' ', $settings_arr['texts_continue_button']).'</a>
                        <a class="btn" id="woonectio_view_cart_btn" href="'.wc_get_cart_url().'">'.str_replace('_', ' ', $settings_arr['texts_cart_button']).'</a>
                        <a class="btn" id="woonectio_checkout_btn" href="'.$checkout_url.'">'.str_replace('_', ' ', $settings_arr['texts_checkout_button']).'</a>
                    </div>'.$slider_bottom;

        $html .= '</div>';

        $response['html'] = $html;

        $response['items_count'] = WC()->cart->get_cart_contents_count();

        echo json_encode($response);
        break;

    case 'add_coupon':
        global $woocommerce;
        $woocommerce->cart->add_discount(sanitize_text_field($data_array['coupon_code']));
        $response = wc_get_notices();

        echo json_encode($response);
        break;

    case 'get_cart_url':
        echo json_encode(wc_get_cart_url());
        break;
}