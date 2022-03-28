<?php

class config
{
    public static function create()
    {
        require(dirname(__FILE__, 4) . '/wp-load.php');
        global $wpdb;
        $charset_collate = $wpdb->get_charset_collate();
        $sql = "
CREATE TABLE IF NOT EXISTS woonectio_minicard_settings(
    `id` INT,
    `auto_open_cart` INT(1),
    `ajax_add_to_card` INT(1),
    `fly_to_cart_anim` INT(1),
    `cart_order` TEXT,
    `basket_count` TEXT,
    `coupons_list` TEXT,
    `maximum_coupouns_count` TEXT,
    `custom_coupons_post_id` TEXT,
    `empty_cart_button_url` TEXT,
    `do_not_show_cart_on_pages` TEXT,
    `show_notify` INT(1),
    `show_free_shipping_bar` INT(1),
    `show_basket_icon` INT(1),
    `show_close_icon` INT(1),
    `show_notify_dp_time` TEXT,
    `show_product_sales_count` INT(1),
    `show_product_img` INT(1),
    `show_product_name` INT(1),
    `show_product_prices` INT(1),
    `show_product_total` INT(1),
    `show_product_metadata` INT(1),
    `show_link_to_page_product` INT(1),
    `show_delete_products` INT(1),
    `allow_ilosc_update` INT(1),
    `qty_update_delay` TEXT,
    `product_name_variable_product` TEXT,
    `show_footer_subtotal` INT(1),
    `show_footer_discount` INT(1),
    `show_footer_tax` INT(1),
    `show_footer_shipping_amount` INT(1),
    `show_footer_shipping_calc` INT(1),
    `show_footer_other_fee` INT(1),
    `show_footer_total` INT(1),
    `show_footer_coupon` INT(1),
    `show_footer_empty_card_link` INT(1),
    `enable_suggested_products` INT(1),
    `enable_suggested_on_mobile` INT(1),
    `show_suggested_product_img` INT(1),
    `show_suggested_product_title` INT(1),
    `show_suggested_product_price` INT(1),
    `show_suggested_add_to_card_btn` INT(1),
    `show_suggested_product_type` TEXT,
    `show_suggested_custom_products_id` TEXT,
    `show_suggested_number_of_products` TEXT,
    `show_suggested_random_products_enable` INT(1),
    `texts_cart_header` TEXT,
    `texts_continue_button` TEXT,
    `texts_cart_button` TEXT,
    `texts_checkout_button` TEXT,
    `texts_empty_card` TEXT,
    `texts_shop_button` TEXT,
    `texts_remaining_amount` TEXT,
    `texts_free_shipping` TEXT,
    `urls_continue_shopping` TEXT,
    `urls_cart` TEXT,
    `urls_checkout` TEXT,
    `main_style_sidecart_width` TEXT,
    `main_style_sidecart_height` TEXT,
    `main_style_sidecart_openform` TEXT,
    `main_style_sidecart_fonturl` TEXT,
    `basket_enable` TEXT,
    `basket_shape` TEXT,
    `basket_iconsize` TEXT,
    `basket_showcount` INT(1),
    `basket_basketicon` TEXT,
    `basket_basketicon_img_custom` TEXT,
    `basket_basketposition` TEXT,
    `basket_basketoffsetvertical` TEXT,
    `basket_basketoffsethorizontal` TEXT,
    `basket_basketcountposition` TEXT,
    `basket_basketcolor` TEXT,
    `basket_basketbackcolor` TEXT,
    `basket_basketshadow` TEXT,
    `basket_basketcountcolor` TEXT,
    `basket_basketbackcountcolor` TEXT,
    `heading_headingalign` TEXT,
    `heading_closeiconalign` TEXT,
    `heading_closeicontype` TEXT,
    `heading_closeiconsize` TEXT,
    `heading_headingfontsize` TEXT,
    `heading_shippingbarcolor` TEXT,
    `heading_backgroundcolor` TEXT,
    `heading_textcolor` TEXT,
    `sidecartbody_wasteicon` TEXT,
    `sidecartbody_fontsize` TEXT,
    `sidecartbody_backgroundcolor` TEXT,
    `sidecartbody_textcolor` TEXT,
    `sidecartbody_emptycartimagecolor` TEXT,
    `sidecartbodyproduct_imagewidth` TEXT,
    `sidecartbodyproduct_productpadding` TEXT,
    `sidecartbodyproduct_productdetailsdisplay` TEXT,
    `sidecartbodyproduct_qtypricedisplay` TEXT,
    `sidecartbodyqty_inputqtystyle` TEXT,
    `sidecartbodyqty_boxwidth` TEXT,
    `sidecartbodyqty_boxheight` TEXT,
    `sidecartbodyqty_bordersize` TEXT,
    `sidecartbodyqty_inputbordercolor` TEXT,
    `sidecartbodyqty_boxbordercolor` TEXT,
    `sidecartbodyqty_inputbgcolor` TEXT,
    `sidecartbodyqty_inputtxtcolor` TEXT,
    `sidecartbodyqty_buttonsbgcolor` TEXT,
    `sidecartbodyqty_buttontextcolor` TEXT,
    `sidecartfooterstyle_padding` TEXT,
    `sidecartfooterstyle_fontsize` TEXT,
    `sidecartfooterstyle_bgcolor` TEXT,
    `sidecartfooterstyle_txtcolor` TEXT,
    `sidecartfooterstyle_couponicon` TEXT,
    `sidecartfooterstyle_continueshoppingorder` TEXT,
    `sidecartfooterstyle_viewcardorder` TEXT,
    `sidecartfooterstyle_checkoutorder` TEXT,
    `sidecartfooterstyle_buttonrow` TEXT,
    `sidecartfooterstyle_buttondesign` TEXT,
    `sidecartfooterstyle_btnbgcolor` TEXT,
    `sidecartfooterstyle_btntextcolor` TEXT,
    `sidecartfooterstyle_btnborder` TEXT,
    `suggestedproductstyle_style` TEXT,
    `suggestedproductstyle_location` TEXT,
    `suggestedproductstyle_imgwidth` TEXT,
    `suggestedproductstyle_fontsize` TEXT,
    `suggestedproductstyle_bgcolor` TEXT,
    `price_show_text` VARCHAR(50),
    `time_was_buyed` VARCHAR(50),
    `woonectio_shortcode_text` VARCHAR(50),
    `woonectio_shortcode_icon` VARCHAR(50),
    `woonectio_shortcode_icon_img` VARCHAR(200),
    `woonectio_shortcode_quantity_pp_show` INT(1),
    `woonectio_shortcode_quantity_pp_show_select` VARCHAR(50),
    `woonectio_shortcode_psotioion_pp_show_select` VARCHAR(50),
    `woonectio_shortcode_font_size` VARCHAR(50),
    `woonectio_shortcode_background_style` VARCHAR(50),
    `woonectio_shortcode_color_of_count` VARCHAR(50),
    `woonectio_shortcode_color_of_background` VARCHAR(50),
    `woonectio_shortcode_size_background` VARCHAR(50),
    `woonectio_shortcode_icludes_products_show` INT(1),
    `woonectio_shortcode_icludes_products_position` VARCHAR(50),
    `woonectio_shortcode_icludes_products_sum_of_pp_brutto` VARCHAR(50),
    `woonectio_shortcode_onclik_icon` VARCHAR(50),
    `woonectio_shortcode_show_onhover_mini` INT(1),
    `ajax_add_to_cart_enabled` INT(1)
);";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        $sql = "INSERT INTO woonectio_minicard_settings (id, auto_open_cart, ajax_add_to_card, fly_to_cart_anim, cart_order, basket_count, coupons_list, maximum_coupouns_count, custom_coupons_post_id, empty_cart_button_url, do_not_show_cart_on_pages, show_notify, show_free_shipping_bar, show_basket_icon, show_close_icon, show_notify_dp_time, show_product_sales_count, show_product_img, show_product_name, show_product_prices, show_product_total, show_product_metadata, show_link_to_page_product, show_delete_products, allow_ilosc_update, qty_update_delay, product_name_variable_product, show_footer_subtotal, show_footer_discount, show_footer_tax, show_footer_shipping_amount, show_footer_shipping_calc, show_footer_other_fee, show_footer_total, show_footer_coupon, show_footer_empty_card_link, enable_suggested_products, enable_suggested_on_mobile, show_suggested_product_img, show_suggested_product_title, show_suggested_product_price, show_suggested_add_to_card_btn, show_suggested_product_type, show_suggested_custom_products_id, show_suggested_number_of_products, show_suggested_random_products_enable, texts_cart_header, texts_continue_button, texts_cart_button, texts_checkout_button, texts_empty_card, texts_shop_button, texts_remaining_amount, texts_free_shipping, urls_continue_shopping, urls_cart, urls_checkout, main_style_sidecart_width, main_style_sidecart_height, main_style_sidecart_openform, main_style_sidecart_fonturl, basket_enable, basket_shape, basket_iconsize, basket_showcount, basket_basketicon, basket_basketicon_img_custom, basket_basketposition, basket_basketoffsetvertical, basket_basketoffsethorizontal, basket_basketcountposition, basket_basketcolor, basket_basketbackcolor, basket_basketshadow, basket_basketcountcolor, basket_basketbackcountcolor, heading_headingalign, heading_closeiconalign, heading_closeicontype, heading_closeiconsize, heading_headingfontsize, heading_shippingbarcolor, heading_backgroundcolor, heading_textcolor, sidecartbody_wasteicon, sidecartbody_fontsize, sidecartbody_backgroundcolor, sidecartbody_textcolor, sidecartbody_emptycartimagecolor, sidecartbodyproduct_imagewidth, sidecartbodyproduct_productpadding, sidecartbodyproduct_productdetailsdisplay, sidecartbodyproduct_qtypricedisplay, sidecartbodyqty_inputqtystyle, sidecartbodyqty_boxwidth, sidecartbodyqty_boxheight, sidecartbodyqty_bordersize, sidecartbodyqty_inputbordercolor, sidecartbodyqty_boxbordercolor, sidecartbodyqty_inputbgcolor, sidecartbodyqty_inputtxtcolor, sidecartbodyqty_buttonsbgcolor, sidecartbodyqty_buttontextcolor, sidecartfooterstyle_padding, sidecartfooterstyle_fontsize, sidecartfooterstyle_bgcolor, sidecartfooterstyle_txtcolor, sidecartfooterstyle_couponicon, sidecartfooterstyle_continueshoppingorder, sidecartfooterstyle_viewcardorder, sidecartfooterstyle_checkoutorder, sidecartfooterstyle_buttonrow, sidecartfooterstyle_buttondesign, sidecartfooterstyle_btnbgcolor, sidecartfooterstyle_btntextcolor, sidecartfooterstyle_btnborder, suggestedproductstyle_style, suggestedproductstyle_location, suggestedproductstyle_imgwidth, suggestedproductstyle_fontsize, suggestedproductstyle_bgcolor, price_show_text, time_was_buyed, woonectio_shortcode_text, woonectio_shortcode_icon, woonectio_shortcode_icon_img, woonectio_shortcode_quantity_pp_show, woonectio_shortcode_quantity_pp_show_select, woonectio_shortcode_psotioion_pp_show_select, woonectio_shortcode_font_size, woonectio_shortcode_background_style, woonectio_shortcode_color_of_count, woonectio_shortcode_color_of_background, woonectio_shortcode_size_background, woonectio_shortcode_icludes_products_show, woonectio_shortcode_icludes_products_position, woonectio_shortcode_icludes_products_sum_of_pp_brutto, woonectio_shortcode_onclik_icon, woonectio_shortcode_show_onhover_mini, ajax_add_to_cart_enabled) VALUES (0, 1, 1, 0, 'ASC', 'number', 'all', '10', '', 'http://wordpress/shop/', '', 1, 1, 0, 1, '2500', 1, 1, 1, 1, 1, 1, 1, 0, 1, '50', 'include', 1, 1, 1, 0, 0, 0, 1, 0, 1, 1, 0, 1, 1, 1, 1, 'random', '81,80', '3', 0, 'mini_koszyk', 'to_shop', 'to_cart', 'to_checkout', 'card_is_empty', 'go_to_shop', 'Left_for_free:_{left}', '', '', '', '', '400', 'full', 'right', '', 'always_hide', 'round', '30', 1, '#x1f6d2;', '', 'bottom', '100', '100', '', '#ffffff', '#ffffff', '0_0_10px_-2px_rgb(0_0_0_/_30%)', '#ffffff', '#8187df', 'center', 'right', '#x2715;', '20', '30', '#000000', '#000000', '#050505', '#x1f5d1;', '15', '#ffffff', '#000000', '#000000', '', '10', 'stretched', '', 'round', '70', '30', '1', '#000000', '#000000', '#ffffff', '#000000', '#ffffff', '#000000', '10px_20px', '15', '#ffffff', '#000000', '', '1', '3', '2', 'one_two', 'custom', '#000000', '#ffffff', '1px_black_solid', 'narrow', 'after', '', '15', '#ffffff', 'price', '{times}_TIMES_THIS_PRODUCT_WAS_BUYED', '', '#x1f6d2;', '', 1, 'quantity', 'right', '10', 'circle', '#ffffff', '#06fe30', '20', 1, 'start', '1', 'redirect', 1, 1);";
        dbDelta($sql);

        $sql = "CREATE TABLE IF NOT EXISTS woonectio_popup_settings(
                `id` INT,
                `display_recent` VARCHAR(50),
                `display_no_repeat` INT,
                `display_order_with_processing` INT,
                `display_review_popups` INT,
                `number_of_popups_to_show` INT,
                `delay_between_2_notifications` INT,
                `notify_display_time` INT,
                `display_admin_own_notify` INT,
                `display_customer_own_notify` INT,
                `display_buyer_avatar` INT,
                `hide_on_mobile` INT,
                `hide_close_button` INT,
                `sale_content_template` TEXT,
                `review_content_template` TEXT,
                `campagin_tracking` INT,
                `disable_popup_link` INT,
                `product_title_max_words` INT,
                `visible_on_all_pages` VARCHAR(50),
                `pages_excluded` TEXT,
                `hide_on_all_articles` INT,
                `Show_only_on_these_woocommerce_categories` INT,
                `products_excluded` TEXT,
                `font_size_desktop` INT,
                `font_size_mobile` INT,
                `shape` VARCHAR(40),
                `size` VARCHAR(40),
                `position` VARCHAR(60),
                `animation` VARCHAR(60),
                `background_color` VARCHAR(30),
                `text_color` VARCHAR(30),
                `strong_tags_color` VARCHAR(30),
                `stars_color_rated` VARCHAR(30),
                `stars_color_unrated` VARCHAR(30),
                `close_button_color` VARCHAR(30),
                `close_button_background_color` VARCHAR(30)
                );";

        dbDelta($sql);

        $sql = "INSERT INTO woonectio_popup_settings (id, display_recent, display_no_repeat, display_order_with_processing, display_review_popups, number_of_popups_to_show, delay_between_2_notifications, notify_display_time, display_admin_own_notify, display_customer_own_notify, display_buyer_avatar, hide_on_mobile, hide_close_button, sale_content_template, review_content_template, campagin_tracking, disable_popup_link, product_title_max_words, visible_on_all_pages, pages_excluded, hide_on_all_articles, Show_only_on_these_woocommerce_categories, products_excluded, font_size_desktop, font_size_mobile, shape, size, position, animation, background_color, text_color, strong_tags_color, stars_color_rated, stars_color_unrated, close_button_color, close_button_background_color) VALUES (0, 'random', 0, 0, 0, 1, 2, 3, 1, 0, 1, 0, 1, '{new_line}
{buyer_username}_{buyer_first_name}_{buyer_last_name}
{new_line}
{date}
{new_line}
{by_woonectio}', '{product}{new_line}{buyer}_
{new_line}
{buyer_username}_{buyer_first_name}_{buyer_last_name}
{new_line}
{date}
{new_line}
{by_woonectio}', null, 1, 1, '', 'asdasdasd', 0, 0, '', 16, 16, 'default', 'standart', 'right', 'default', '#ffffff', '#000000', '#000000', '#000000', '#000000', '#ffffff', '#a47474');
";

        dbDelta($sql);

        $sql = "CREATE TABLE IF NOT EXISTS woonectio_sidecard_settings(
`id` INT,
`show_after_scroll` INT(1),
`enable_on_desktop` INT(1),
`enable_on_tablet` INT(1),
`enable_on_mobile` INT(1),
`background_color` VARCHAR(30),
`box_shadow_color` VARCHAR(30),
`text_color` VARCHAR(30),
`product_title_color` VARCHAR(30),
`price_text_color` VARCHAR(30),
`price_badge_color` VARCHAR(30),
`sale_text_color` VARCHAR(30),
`sale_badge_color` VARCHAR(30),
`review_stars_color` VARCHAR(30),
`review_stars_outline_color` VARCHAR(30),
`reviews_count_color` VARCHAR(30),
`button_color` VARCHAR(30),
`button_hover_color` VARCHAR(30),
`button_text_color` VARCHAR(30),
`button_hover_text_color` VARCHAR(30),
`stock_text_color` VARCHAR(30),
`out_stock_text_color` VARCHAR(30),
`title_font_size` VARCHAR(30),
`add_to_cart_button_font_size` VARCHAR(30),
`price_font_size` VARCHAR(30),
`sale_font_size` VARCHAR(30),
`stock_management_font_size` VARCHAR(30),
`review_font_size` VARCHAR(30),
`simple_product_button_text` VARCHAR(30),
`variable_product_button_text` VARCHAR(30),
`variable_product_behavior` VARCHAR(30),
`sticky_bar_position` VARCHAR(30),
`show_after_scroll_pixels` VARCHAR(30),
`cart_button_style` VARCHAR(30),
`product_image_style` VARCHAR(30),
`hide_on_products` VARCHAR(30),
`hide_on_product_category` VARCHAR(30),
`sale_badge` INT(1),
`sale_badge_text` VARCHAR(30),
`sale_badge_style` VARCHAR(30),
`review_stars_enable` INT(1),
`review_count_enable` INT(1),
`box_shadow_enable` INT(1),
`show_quantity_enable` INT(1),
`stock_count_enable` INT(1),
`show_product_image_enable` INT(1),
`ajax_add_to_cart_enable` INT(1),
`cart_button_animation` VARCHAR(30),
`price_range_on_variable_product_enable` INT(1),
`show_price_enable` INT(1),
`price_badge_style` VARCHAR(30),
`redirect_after_atc_enable` INT(1)
);";
        dbDelta($sql);

        $sql = "INSERT INTO woonectio_sidecard_settings (id, show_after_scroll, enable_on_desktop, enable_on_tablet, enable_on_mobile, background_color, box_shadow_color, text_color, product_title_color, price_text_color, price_badge_color, sale_text_color, sale_badge_color, review_stars_color, review_stars_outline_color, reviews_count_color, button_color, button_hover_color, button_text_color, button_hover_text_color, stock_text_color, out_stock_text_color, title_font_size, add_to_cart_button_font_size, price_font_size, sale_font_size, stock_management_font_size, review_font_size, simple_product_button_text, variable_product_button_text, variable_product_behavior, sticky_bar_position, show_after_scroll_pixels, cart_button_style, product_image_style, hide_on_products, hide_on_product_category, sale_badge, sale_badge_text, sale_badge_style, review_stars_enable, review_count_enable, box_shadow_enable, show_quantity_enable, stock_count_enable, show_product_image_enable, ajax_add_to_cart_enable, cart_button_animation, price_range_on_variable_product_enable, show_price_enable, price_badge_style, redirect_after_atc_enable) VALUES (0, 1, 1, 1, 1, '#ffffff', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#000000', '#ffffff', '#ffffff', '#ffffff', '#000000', '#bbc71a', '#ffffff', '#d97878', '#ffffff', '#ffffff', '16', '16', '16', '16', '16', '16', 'text', 'text', 'default', 'top', '200', 'halfround', 'round', 'text', 'text', 1, 'sale', 'round', 1, 1, 1, 1, 0, 1, 1, 'none', 0, 1, 'square', 0);
";

        dbDelta($sql);

        $sql = "CREATE TABLE IF NOT EXISTS woonectio_ajaxnotify_settings(
`id` INT,
`enable_ajax` INT(1),
`enable_close_on_click` INT(1),
`enable_prevent_closing` INT(1),
`enable_prevent_scrolling` INT(1),
`auto_close_time` VARCHAR(30),
`notice_types` VARCHAR(30),
`excluded_pages` VARCHAR(200),
`excluded_conditionals` VARCHAR(100),
`enable_errors_notice` INT(1),
`enable_success_notice` INT(1),
`enable_info_notice` INT(1),
`hide_errors_notice` INT(1),
`hide_success_notice` INT(1),
`hide_info_notice` INT(1),
`enable_custom_style` INT(1),
`enable_fontawesome` INT(1),
`fontawesomeurl` VARCHAR(200),
`modal_template` VARCHAR(200),
`enable_cookie` INT(1),
`expiration_time` VARCHAR(30),
`enable_audio` INT(1),
`openingurl` VARCHAR(30),
`closingurl` VARCHAR(30)
); ";

        dbDelta($sql);

        $sql = "INSERT INTO woonectio_ajaxnotify_settings (id, enable_ajax, enable_close_on_click, enable_prevent_closing, enable_prevent_scrolling, auto_close_time, notice_types, excluded_pages, excluded_conditionals, enable_errors_notice, enable_success_notice, enable_info_notice, hide_errors_notice, hide_success_notice, hide_info_notice, enable_custom_style, enable_fontawesome, fontawesomeurl, modal_template, enable_cookie, expiration_time, enable_audio, openingurl, closingurl) VALUES (0, 0, 1, 0, 1, '1000000', 'text', '', '', 1, 1, 1, 1, 1, 1, 0, 0, '', '', 0, '', 0, '', '');
";

        dbDelta($sql);

        $sql = "      
CREATE TABLE IF NOT EXISTS woonectio_plugins_enable(
`id` INT,
`popup` INT(1),
`sidecard` INT(1),
`wooajax` INT(1),
`minicard` INT(1)
);";
        dbDelta($sql);

        $sql = "INSERT INTO woonectio_plugins_enable (id, popup, sidecard, wooajax, minicard) VALUES (0, 0, 0, 0, 0);
";
        dbDelta($sql);

        $sql = 'CREATE TABLE IF NOT EXISTS woonectio_license(
    `id` INT,
    `key` VARCHAR(70)
);';

        dbDelta($sql);

        $sql = "INSERT INTO woonectio_license (id, `key`) VALUES (0, '');";

        dbDelta($sql);

        $sql = "CREATE TABLE woonectio_extras_settings(
    `id` INT,
    `delete_photos_after_delete_product` INT(1),
    `show_price_into_product_atc_button` INT(1),
    `add_custom_class_to_the_product_page` INT(1),
    `add_custom_fields_into_order` INT(1),
    `add_custom_agree_fields` INT(1),
    `add_custom_shipping_info` INT(1),
    `add_custom_buy_now` INT(1),
    `add_taxonomy_to_mail` INT(1),
    `add_class_depends_stock_of_product` INT(1),
    `ajax_total_update` INT(1),
    `add_inputs_for_qty_change` INT(1),
    `add_dynamic_change_priceline` INT(1)
);";

        dbDelta($sql);

        $sql = "INSERT INTO woonectio_extras_settings (id, delete_photos_after_delete_product, show_price_into_product_atc_button, add_custom_class_to_the_product_page, add_custom_fields_into_order, add_custom_agree_fields, add_custom_shipping_info, add_custom_buy_now, add_taxonomy_to_mail, add_class_depends_stock_of_product, ajax_total_update, add_dynamic_change_priceline, add_inputs_for_qty_change) VALUES (0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);";
        dbDelta($sql);

        $sql = "CREATE TABLE woonectio_shippingextra_settings(
    `id` INT,
    `enable_shipping_shortcode` INT(1),
    `texts_free_shipping` VARCHAR(50)
);";

        dbDelta($sql);

        $sql = "INSERT INTO woonectio_shippingextra_settings (id, enable_shipping_shortcode, texts_free_shipping) VALUES (0, 0, 'free shipping');";
        dbDelta($sql);
    }
}

//public function create_db(){
//    require_once 'db_conf.php';
//    $engine = new config();
//    $engine->create();
//}
//
//register_activation_hook(__FILE__, array( $this, 'create_db'));
////register_deactivation_hook( __FILE__, array( $this, 'my_plugin_remove_database' ) );
///        $data = [
//            'id' => 0,
//            'display_recent' => 'recent',
//            'display_no_repeat' => 1,
//            'display_order_with_processing' => 0,
//            'display_review_popups' => 0,
//            'number_of_popups_to_show' => 0,
//            'delay_between_2_notifications' => 2,
//            'notify_display_time' => 6,
//            'display_admin_own_notify' => 1,
//            'display_buyer_avatar' => 1,
//            'hide_on_mobile' => 0,
//            'hide_close_button' => 1,
//            'sale_content_template' => 1,
//            'review_content_template' => null,
//            'campagin_tracking' => null,
//            'disable_popup_link' => 1,
//            'product_title_max_words' => 1,
//            'visible_on_all_pages' => 1,
//            'pages_excluded' => null,
//            'hide_on_all_articles' => '',
//            'Show_only_on_these_woocommerce_categories' => 0,
//            'products_excluded' => null,
//            'font_size_desktop' => 16,
//            'font_size_mobile' => 16,
//            'shape' => 'default',
//            'size' => 'standart',
//            'position' => 'right',
//            'animation' => 'default',
//            'background_color' => '#121212',
//            'text_color' => '#dd6464',
//            'strong_tags_color' => '#c0b4b4',
//            'stars_color_rated' => '#000000',
//            'stars_color_unrated' => '#000000',
//            'close_button_color' => '#ffffff',
//            'close_button_background_color' => '#a47474'];
//        $wpdb->insert('woonectio_popup_settings', $data);
//
//        $sql = '';
//        dbDelta($sql);
//
//        $data = [
//            'id' => 0,
//            'show_after_scroll' => 0,
//            'enable_on_desktop' => 0,
//            'enable_on_tablet' => 0,
//            'enable_on_mobile' => 0,
//            'background_color' => '#ffffff',
//            'box_shadow_color' => '#ffffff',
//            'text_color' => '#ffffff',
//            'product_title_color' => '#ffffff',
//            'price_text_color' => '#ffffff',
//            'price_badge_color' => '#ffffff',
//            'sale_text_color' => '#ffffff',
//            'sale_badge_color' => '#ffffff',
//            'review_stars_color' => '#ffffff',
//            'review_stars_outline_color' => '#ffffff',
//            'reviews_count_color' => '#ffffff',
//            'button_color' => '#ffffff',
//            'button_hover_color' => '#ffffff',
//            'button_text_color' => '#ffffff',
//            'button_hover_text_color' => '#ffffff',
//            'stock_text_color' => '#ffffff',
//            'out_stock_text_color' => '#ffffff',
//            'title_font_size' => '16',
//            'add_to_cart_button_font_size' => '16',
//            'price_font_size' => '16',
//            'sale_font_size' => '16',
//            'stock_management_font_size' => '16',
//            'review_font_size' => '16',
//            'simple_product_button_text' => 'text',
//            'variable_product_button_text' => 'text',
//            'variable_product_behavior' => 'text',
//            'sticky_bar_position' => 'top',
//            'show_after_scroll_pixels' => '0',
//            'cart_button_style' => 'text',
//            'product_image_style' => 'text',
//            'hide_on_products' => 'text',
//            'hide_on_product_category' => 'text',
//            'sale_badge' => 0,
//            'sale_badge_text' => 'text',
//            'sale_badge_style' => 'text',
//            'review_stars_enable' => 0,
//            'review_count_enable' => 0,
//            'box_shadow_enable' => 0,
//            'show_quantity_enable' => 0,
//            'stock_count_enable' => 0,
//            'show_product_image_enable' => 0,
//            'ajax_add_to_cart_enable' => 0,
//            'cart_button_animation' => 'anim',
//            'price_range_on_variable_product_enable' => 0,
//            'show_price_enable' => 0,
//            'price_badge_style' => 'style',
//            'redirect_after_atc_enable' => 0
//        ];
//        $wpdb->insert('woonectio_sidecard_settings', $data);
//
//
//
//        dbDelta($sql);
//
//        $data = [
//            'id' => 0,
//            'enable_ajax' => 0,
//            'enable_close_on_click' => 0,
//            'enable_prevent_closing' => 0,
//            'enable_prevent_scrolling' => 0,
//            'auto_close_time' => '0',
//            'notice_types' => 'text',
//            'excluded_pages' => '',
//            'excluded_conditionals' => '',
//            'enable_errors_notice' => 0,
//            'enable_success_notice' => 0,
//            'enable_info_notice' => 0,
//            'hide_errors_notice' => 0,
//            'hide_success_notice' => 0,
//            'hide_info_notice' => 0,
//            'enable_custom_style' => 0,
//            'enable_fontawesome' => 0,
//            'fontawesomeurl' => '',
//            'modal_template' => '',
//            'enable_cookie' => 0,
//            'expiration_time' => '',
//            'enable_audio' => 0,
//            'openingurl' => '',
//            'closingurl' => ''
//        ];
//        $wpdb->insert('woonectio_ajaxnotify_settings', $data);
//
//        $sql = 'CREATE TABLE IF NOT EXISTS woonectio_plugins_enable(
//`id` INT,
//`popup` INT(1),
//`sidecard` INT(1),
//`wooajax` INT(1),
//`minicard` INT(1)
//);';
//
//        dbDelta($sql);
//
//        $data = [
//            'id' => 0,
//            'popup' => 0,
//            'sidecard' => 0,
//            'wooajax' => 0,
//            'minicard' => 0
//        ];
//
//        $wpdb->insert('woonectio_plugins_enable', $data);
//
//        $sql = '
//CREATE TABLE IF NOT EXISTS woonectio_minicard_settings(
//    `id` INT,
//    `auto_open_cart` INT(1),
//    `ajax_add_to_card` INT(1),
//    `fly_to_cart_anim` INT(1),
//    `cart_order` TEXT,
//    `basket_count` TEXT,
//    `coupons_list` TEXT,
//    `maximum_coupouns_count` TEXT,
//    `custom_coupons_post_id` TEXT,
//    `empty_cart_button_url` TEXT,
//    `do_not_show_cart_on_pages` TEXT,
//    `show_notify` INT(1),
//    `show_free_shipping_bar` INT(1),
//    `show_basket_icon` INT(1),
//    `show_close_icon` INT(1),
//    `show_notify_dp_time` TEXT,
//    `show_product_sales_count` INT(1),
//    `show_product_img` INT(1),
//    `show_product_name` INT(1),
//    `show_product_prices` INT(1),
//    `show_product_total` INT(1),
//    `show_product_metadata` INT(1),
//    `show_link_to_page_product` INT(1),
//    `show_delete_products` INT(1),
//    `allow_ilosc_update` INT(1),
//    `qty_update_delay` TEXT,
//    `product_name_variable_product` TEXT,
//    `show_footer_subtotal` INT(1),
//    `show_footer_discount` INT(1),
//    `show_footer_tax` INT(1),
//    `show_footer_shipping_amount` INT(1),
//    `show_footer_shipping_calc` INT(1),
//    `show_footer_other_fee` INT(1),
//    `show_footer_total` INT(1),
//    `show_footer_coupon` INT(1),
//    `show_footer_empty_card_link` INT(1),
//    `enable_suggested_products` INT(1),
//    `enable_suggested_on_mobile` INT(1),
//    `show_suggested_product_img` INT(1),
//    `show_suggested_product_title` INT(1),
//    `show_suggested_product_price` INT(1),
//    `show_suggested_add_to_card_btn` INT(1),
//    `show_suggested_product_type` TEXT,
//    `show_suggested_custom_products_id` TEXT,
//    `show_suggested_number_of_products` TEXT,
//    `show_suggested_random_products_enable` INT(1),
//    `texts_cart_header` TEXT,
//    `texts_continue_button` TEXT,
//    `texts_cart_button` TEXT,
//    `texts_checkout_button` TEXT,
//    `texts_empty_card` TEXT,
//    `texts_shop_button` TEXT,
//    `texts_remaining_amount` TEXT,
//    `texts_free_shipping` TEXT,
//    `urls_continue_shopping` TEXT,
//    `urls_cart` TEXT,
//    `urls_checkout` TEXT,
//    `main_style_sidecart_width` TEXT,
//    `main_style_sidecart_height` TEXT,
//    `main_style_sidecart_openform` TEXT,
//    `main_style_sidecart_fonturl` TEXT,
//    `basket_enable` TEXT,
//    `basket_shape` TEXT,
//    `basket_iconsize` TEXT,
//    `basket_showcount` INT(1),
//    `basket_basketicon` TEXT,
//    `basket_basketicon_img_custom` TEXT,
//    `basket_basketposition` TEXT,
//    `basket_basketoffsetvertical` TEXT,
//    `basket_basketoffsethorizontal` TEXT,
//    `basket_basketcountposition` TEXT,
//    `basket_basketcolor` TEXT,
//    `basket_basketbackcolor` TEXT,
//    `basket_basketshadow` TEXT,
//    `basket_basketcountcolor` TEXT,
//    `basket_basketbackcountcolor` TEXT,
//    `heading_headingalign` TEXT,
//    `heading_closeiconalign` TEXT,
//    `heading_closeicontype` TEXT,
//    `heading_closeiconsize` TEXT,
//    `heading_headingfontsize` TEXT,
//    `heading_shippingbarcolor` TEXT,
//    `heading_backgroundcolor` TEXT,
//    `heading_textcolor` TEXT,
//    `sidecartbody_wasteicon` TEXT,
//    `sidecartbody_fontsize` TEXT,
//    `sidecartbody_backgroundcolor` TEXT,
//    `sidecartbody_textcolor` TEXT,
//    `sidecartbody_emptycartimagecolor` TEXT,
//    `sidecartbodyproduct_imagewidth` TEXT,
//    `sidecartbodyproduct_productpadding` TEXT,
//    `sidecartbodyproduct_productdetailsdisplay` TEXT,
//    `sidecartbodyproduct_qtypricedisplay` TEXT,
//    `sidecartbodyqty_inputqtystyle` TEXT,
//    `sidecartbodyqty_boxwidth` TEXT,
//    `sidecartbodyqty_boxheight` TEXT,
//    `sidecartbodyqty_bordersize` TEXT,
//    `sidecartbodyqty_inputbordercolor` TEXT,
//    `sidecartbodyqty_boxbordercolor` TEXT,
//    `sidecartbodyqty_inputbgcolor` TEXT,
//    `sidecartbodyqty_inputtxtcolor` TEXT,
//    `sidecartbodyqty_buttonsbgcolor` TEXT,
//    `sidecartbodyqty_buttontextcolor` TEXT,
//    `sidecartfooterstyle_padding` TEXT,
//    `sidecartfooterstyle_fontsize` TEXT,
//    `sidecartfooterstyle_bgcolor` TEXT,
//    `sidecartfooterstyle_txtcolor` TEXT,
//    `sidecartfooterstyle_couponicon` TEXT,
//    `sidecartfooterstyle_continueshoppingorder` TEXT,
//    `sidecartfooterstyle_viewcardorder` TEXT,
//    `sidecartfooterstyle_checkoutorder` TEXT,
//    `sidecartfooterstyle_buttonrow` TEXT,
//    `sidecartfooterstyle_buttondesign` TEXT,
//    `sidecartfooterstyle_btnbgcolor` TEXT,
//    `sidecartfooterstyle_btntextcolor` TEXT,
//    `sidecartfooterstyle_btnborder` TEXT,
//    `suggestedproductstyle_style` TEXT,
//    `suggestedproductstyle_location` TEXT,
//    `suggestedproductstyle_imgwidth` TEXT,
//    `suggestedproductstyle_fontsize` TEXT,
//    `suggestedproductstyle_bgcolor` TEXT
//);';
////
////        dbDelta($sql);