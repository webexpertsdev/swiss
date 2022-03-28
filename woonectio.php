<?php
/**
 * Plugin Name: Woonectio Multi-Commerce
 * Plugin URI: https://license.dvlpr.pl/
 * Description: Multi-Plugin for E-Commerce.
 * Version: 0.0.4
 * Author: Kuba Juncewicz
 * Author URI: https://license.dvlpr.pl/
 */
if(!function_exists('add_action')){
    die;
}

$mainClass = null;


add_shortcode('woonectio_minicard_icon', ['woonectio', 'woonectio_minicard_shortcode']);

class woonectio
{
    private $page_title = 'woonectio admin';
    private $menu_title = 'Woonectio';
    private $capability = 'manage_options';
    private $menu_slug = 'woonectio';
    private $icon_url = 'dashicons-rest-api';
    private $position = 61;

    function register(){
        //add tab to admin menu
        add_action('admin_menu', [$this, 'add_menu_items']);

        //add link to setting into plugin's page
        add_filter('plugin_action_links_'.plugin_basename(__FILE__), [$this, 'add_link_to_settings']);

        //load styles and scripts section
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin']);
        add_action('wp_enqueue_scripts', [$this, 'front_js']);

        //load content for popup
        add_action('wp_footer', [$this, 'add_popup']);

        register_activation_hook(__FILE__, array( $this, 'create_db'));
        //register_deactivation_hook( __FILE__, array( $this, 'my_plugin_remove_database' ) );
    }

    public function add_menu_items(){
        add_menu_page(
            $this->page_title, //Page Title
            $this->menu_title, //Menu Title
            $this->capability, //Capability
            $this->menu_slug, //Page slug
            [$this, 'add_admin_settings_page'], //Callback to print html
            $this->icon_url,
            $this->position
        );
    }

    public function add_admin_settings_page(){
        require_once 'engine.php';
        $key_response = new engine();
        $page = $key_response->get_status();
        require_once plugin_dir_path(__FILE__).$page;
    }

    public function add_link_to_settings($links){
        $new_link = '<a href="admin.php?page=woonectio">Settings</a>';
        array_push($links, $new_link);
        return $links;
    }

    public function enqueue_admin(){
        wp_enqueue_style('woonectio_style', plugins_url('/assets/admin/css/admin.css', __FILE__));
        wp_enqueue_script('woonectio_core_js', plugins_url('/assets/core.js', __FILE__), '', '1.0', true);
        wp_enqueue_script('woonectio_admin_js', plugins_url('/assets/admin/js/admin.js', __FILE__), '', '1.0', true);
        //wp_enqueue_script('woonectio_ad_js_jq', plugins_url('/assets/jquery.min.js', __FILE__), '', '1.0', true);
    }

    public function front_js(){
        wp_enqueue_script('woonectio_front_js', plugins_url('/assets/front.js', __FILE__), '', '1.0', true);
       // wp_enqueue_script('woonectio_front_js_jq', plugins_url('/assets/jquery.min.js', __FILE__), '', '1.0', true);
    }

    public function add_popup(){
        require_once plugin_dir_path(__FILE__).'templates/popup.php';
    }

    public function create_db(){
        require_once 'db_conf.php';
        $engine = new config();
        $engine->create();
    }

    public function woonectio_minicard_shortcode() {
        return "<div class='woonectio_minicard_shortcode' id='woonectio_minicard_shortcode'></div>";
    }
}

if(class_exists('woonectio')){
    $mainClass = new woonectio();
    $mainClass->register();

    function add_minicard($atts){
        global $wpdb;
        $shortcode_settings =  $wpdb->get_row("SELECT * FROM woonectio_minicard_settings WHERE id=0;");
        $icon = '&'.$shortcode_settings->woonectio_shortcode_icon;

        if($shortcode_settings->woonectio_shortcode_text !== ''){
            $icon = $shortcode_settings->woonectio_shortcode_text;
        }

        $qty = WC()->cart->get_cart_contents_count();

        if((int)$shortcode_settings->woonectio_shortcode_quantity_pp_show === 0){
            $qty = '';
        }

        if($shortcode_settings->woonectio_shortcode_psotioion_pp_show_select === 'right'){
            $background = '';
            switch ($shortcode_settings->woonectio_shortcode_background_style){
                case 'square':
                    $background = 'border-radius: 5px;';
                    break;
                case 'circle':
                    $background = 'border-radius: 50%;';
                    break;
                default:
                    $background = 'background: none;';
                    break;
            }


            $qty = '<div class="woonectio_minicard_shortcode_count" style="font-size: '.$shortcode_settings->woonectio_shortcode_font_size.'px; '.$background.' color: '.$shortcode_settings->woonectio_shortcode_color_of_count.'; background-color: '.$shortcode_settings->woonectio_shortcode_color_of_background.'; width: '.$shortcode_settings->woonectio_shortcode_size_background.'px; height: '.$shortcode_settings->woonectio_shortcode_size_background.'px; display: flex; justify-content: center; align-items: center">'.$qty.'</div>';
        }

        $products = '';

        if((int)$shortcode_settings->woonectio_shortcode_show_onhover_mini === 1){
            $products = '<div class="woonectio_minicard_shortcode_products">';
            global $woocommerce;
            $items = WC()->cart->get_cart();

            $product = '';
            foreach($items as $values) {
                $_product =  wc_get_product( $values['data']->get_id());
                $product .= '<div class="woonectio_minicard_shortcode_products_product">';
                $title = $_product->get_title();
                $quantity_product = $values['quantity'];
                $price = get_post_meta($values['product_id'] , '_price', true).get_woocommerce_currency_symbol();
                $image = $_product->get_image();

                $product .= '<div class="woonectio_minicard_shortcode_products_product_main"><div style="max-width: 80px">'.$title.'</div><div class="woonectio_minicard_shortcode_products_product_main_img">'.$image.'</div></div>';
                $product .= '<div class="woonectio_minicard_shortcode_products_product_second">'.$quantity_product.' X '.$price.'</div>';
                $product .= '</div>';
            }

            $product .= '<div class="woonectio_minicard_shortcode_products_product subtotal">Subtotal: '.WC()->cart->get_cart_subtotal().'</div>';

            $products .= $product.'</div>';
        }

        $qty_left = '';
        $qty_right = '';

        if((int)$shortcode_settings->woonectio_shortcode_icludes_products_show === 1){
            $sub_clear = '<div style="font-size: 15px">'.WC()->cart->get_cart_subtotal().'</div>';
            if((int)$shortcode_settings->woonectio_shortcode_icludes_products_sum_of_pp_brutto === 1){
                $sub_clear = '<div style="font-size: 15px">'.((int)WC()->cart->get_cart_subtotal() + (int)WC()->cart->get_subtotal_tax()).'</div>';
            }
            switch ($shortcode_settings->woonectio_shortcode_icludes_products_position){
                case 'start':
                    $qty_left = $sub_clear;
                    break;
                case 'end':
                    $qty_right = $sub_clear;
                    break;
            }
        }

        return '<div id="woonectio_minicard_icon_sh" style="font-size: 30px; cursor: pointer; position: relative; width: 60px; height: 30px; display: inline-flex; align-items: center">'.$qty_left.' '.$qty.' '.$icon.$products.' '.$qty_right.'</div>';
    }

    add_shortcode('add_woonectio_minicart', 'add_minicard');

    /*
         CONNECT EXTRAS ADDONS
    */

    global $wpdb;
    $extra_addons_settings = $wpdb->get_row("SELECT * FROM woonectio_extras_settings WHERE id=0;");

    if((int)$extra_addons_settings->delete_photos_after_delete_product === 1){
        require_once 'addons/delete_media_after_product_delete.php';
    }

    if((int)$extra_addons_settings->show_price_into_product_atc_button === 1){
        require_once 'addons/add_price_into_button.php';
    }

    if((int)$extra_addons_settings->add_custom_class_to_the_product_page === 1){
        require_once 'addons/add_custom_classes_to_product_page.php';
    }

    if((int)$extra_addons_settings->add_custom_fields_into_order === 1){
        require_once 'addons/add_custom_fields_into_order.php';
    }

    if((int)$extra_addons_settings->add_custom_agree_fields === 1){
        require_once 'addons/add_custom_agree_fields.php';
    }

    if((int)$extra_addons_settings->add_custom_shipping_info === 1){
        require_once 'addons/add_custom_shipping_info.php';
    }

    if((int)$extra_addons_settings->add_custom_buy_now === 1){
        require_once 'addons/add_custom_buy_now.php';
    }

    if((int)$extra_addons_settings->add_taxonomy_to_mail === 1){
        require_once 'addons/add_taxonomy_to_mail.php';
    }

    if((int)$extra_addons_settings->add_class_depends_stock_of_product === 1){
        require_once 'addons/add_class_depends_stock_of_product.php';
    }

    if((int)$extra_addons_settings->add_inputs_for_qty_change === 1){
        require_once 'addons/add_inputs_for_qty_change.php';
    }

    if((int)$extra_addons_settings->add_dynamic_change_priceline === 1){
        require_once 'addons/add_dynamic_change_priceline.php';
    }

    $extra_addons_shipping_settings = $wpdb->get_row("SELECT * FROM woonectio_shippingextra_settings WHERE id=0;");

    if((int)$extra_addons_shipping_settings->enable_shipping_shortcode === 1){
        require_once 'addons/enable_shipping_shortcode.php';
    }
}