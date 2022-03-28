<?php
require(dirname(__FILE__, 4) . '/wp-load.php');
global $wpdb;
global $woocommerce;
global $product;

$data_array = json_decode(array_search('', $_POST), true);

switch($data_array['dowhat']){
    case 'submit':
        if(!empty($data_array)){
            $response = [];
            $arr = [];
            if($data_array['variants'] !== null){
                $keyvaluevar = explode('|', $data_array['variants']);
                $keyvaluevar2 = array_filter($keyvaluevar);
                if(count($keyvaluevar2) > 0){
                    foreach($keyvaluevar2 as $key => $vas){
                        $k_ex = explode('^', $vas);
                        $arr['attribute_'.$k_ex[0]] = $k_ex[1];
                    }
                }
            }
            if(!empty($arr)){
                $pp_var = wc_get_product($data_array['id']);
                $variations = $pp_var->get_available_variations();
                $variations_id_array = wp_list_pluck( $variations, 'variation_id' );
                $woocommerce->cart->add_to_cart($data_array['id'], $data_array['count'], $variations_id_array[0], $arr, null);
            }
            else{
                $woocommerce->cart->add_to_cart($data_array['id'], $data_array['count'], $variation_id);
            }
            $response['cart_url'] = wc_get_cart_url();
            echo json_encode($arr);
        }
        break;

    case 'load':
        $settings = $wpdb->get_row("SELECT * FROM woonectio_sidecard_settings WHERE id=0");
        $settings_arr = [];
        foreach ($settings as $key => $value){
            $settings_arr[$key] = $value;
        }

        $product = new WC_Product($data_array['id']);
        $response = [];

        $html = '<div class="wrapper">';

        $product_image = wc_get_product($data_array['id'])->get_image();

        $rating_count = $product->get_rating_count(); //stars
        $review_count = $product->get_review_count();
        $average      = $product->get_average_rating();

        $html .= '<div class="wrapper-image">';
        if((int)$settings_arr['show_product_image_enable'] === 0){
            $product_image = '';
        }
        $html .= '<div class="img">'.$product_image.'</div>';
        $html .= '<div class="product_data_woonectio">';

        $pp_name = $product->get_name();

        $attr_inp = '';
        $var_id = '';

        $reg_price = '';
        $sale_price = '';
        $pp_var = wc_get_product($data_array['id']);

        $f_exist = true;
        try {
            $pp_var->get_available_variations();
        } catch (\Error $ex) { // Error is the base class for all internal PHP error exceptions.
            $f_exist = false;
        }

        if(!$pp_var->is_type( 'simple' )){
            if(!empty($pp_var->get_available_variations())){
                $handle= new WC_Product_Variable($data_array['id']);
                $variations1=$handle->get_children();
                foreach ($variations1 as $value) {
                    $single_variation=new WC_Product_Variation($value);
                    foreach ($single_variation->get_variation_attributes() as $key => $value){
                        $attr_inp .= '<label style="text-transform: uppercase; margin-right: 5px">'.str_replace('attribute_', '', $key).':</label><select class="woonectio_stcky_wariations"><option value="none">Choose an option</option>';
                        $atira = str_replace('attribute_', '', $key);
                        $satira = $handle->get_attribute(str_replace('attribute_', '', $key));
                        $ex_values = explode('|', str_replace(' ', '', $satira));
                        if(count($ex_values) === 1){
                            $attr_inp .= '<option value="'.$atira.'^'.$ex_values[0].'">'.$ex_values[0].'</option>';
                        }
                        else{
                            foreach ($ex_values as $val){
                                $attr_inp .= '<option value="'.$atira.'^'.$val.'">'.$val.'</option>';
                            }
                        }
                        $attr_inp .= '</select>';
                    }
                }

                $var_id = implode(",", wp_list_pluck($pp_var->get_available_variations(), 'variation_id'));
                $variation_product = new WC_Product_Variation($var_id);

                $reg_price = $pp_var->get_variation_regular_price( 'max', true );
                $sale_price = $pp_var->get_variation_sale_price( 'min', true );
            }
        }
        else{
            $reg_price = $product->get_regular_price();
            $sale_price = $product->get_sale_price();
        }

        $sale_text = '';
        $product_pprice = $product->get_regular_price(). ' ' .get_woocommerce_currency_symbol();

        if($sale_price !== ''){
            $product_pprice = '<span style="text-decoration: line-through">'.$product->get_regular_price().' </span>'.$sale_price. ' ' .get_woocommerce_currency_symbol();
            if((int)$settings_arr['sale_badge'] === 1){
                $style = $settings_arr['sale_badge_style'] === 'round' ? 'border-radius: 5px;' : '';
                $sale_text = '<span style="text-transform: uppercase; border: 1px solid red; color: red; padding: 1px; margin: 2px; '.$style.'">'.str_replace('_', ' ', $settings_arr['sale_badge_text']).'</span>';
            }
        }

        $whole = floor($average);
        $fraction = $average - $whole;
        $rat_stars = '<div style="padding: 2px;>';

        if((int)$settings_arr['review_stars_enable'] === 1){
            if((int)$settings_arr['review_count_enable'] === 1){
                $rating_count = ' ('.$rating_count.') ';
            }else{
                $rating_count = '';
            }

            while($whole > 0){
                $rat_stars .= '<span class="fa fa-star" style="color: gold"></span>';
                $whole--;
            }

            if((5 - $whole) !== 0){
                $mark_percantage = (1 - $fraction) * 100;
                $rat_stars .= '<span class="fa fa-star" style="
                            background: linear-gradient(to right, gold '.$mark_percantage.'%, grey '.(100 - $mark_percantage).'%);
        background-clip: text;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;"></span>';
            }
        }
        else{
            $rating_count = 'Review Count: '.$average;
        }

        $rat_stars .= $rating_count.'</div>';

        $in_stock = '';

        if((int)$settings_arr['stock_count_enable'] === 1){
            $pp_stck = $product->get_stock_quantity() === null ? 'unlimited' : $product->get_stock_quantity();
            $in_stock = '<br><div class="woonectio_in_stock_sticky">In stock: '.$pp_stck.'</div>';
        }

        $price_block = '<br><span class="product_price_woonectio">'.$product_pprice.'</span>';

        if((int)$settings_arr['show_price_enable'] === 0){
            $price_block = '';
        }

        $html .= '<span class="product_name_woonectio">'.$pp_name.'</span>'.$price_block.$sale_text.'
            <br>'.$rat_stars.$in_stock.'</div>';

        $html .= '</div>';

        $btn_text = $settings_arr['variable_product_button_text'];

        $hidden_qty_inp = '';
        if((int)$settings_arr['show_quantity_enable'] === 0){
            $hidden_qty_inp = 'style="display: none"';
        }

        $html .= '<form class="wrapper-count" id="woonectio_stickyadd_form">
        '.$attr_inp.'
            <div class="woonectio-quantity" '.$hidden_qty_inp.'>
                <input id="points" name="points" type="number" min="1" step="1" value="1">
            </div>
            <input type="hidden" id="cardid" value="'.$product->get_id().'">
            <input type="hidden" id="woonectio_stcky_wariations_id" value="'.$var_id.'">
            <button type="submit" class="button">'.$btn_text.'</button>
        </form>
    </div>';

        $response['html'] = $html;
        $response['settings'] = $settings_arr;

        echo json_encode($response);
        break;

    case 'update_price':
        echo json_encode(get_post_meta($data_array['id'], '_regular_price', true) . ' '. get_woocommerce_currency_symbol());
        break;
}