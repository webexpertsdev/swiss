<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body" style="background: greenyellow">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode">Shortcode</menu_button>
        </div>

        <div id="content-box">
            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <h1>SIDE CART HEADER</h1>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Notifications</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_notify">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Free Shipping Bar</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_free_shipping_bar">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Basket Icon</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_basket_icon">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Close Icon</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_close_icon">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show notification for seconds</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-show_notify_dp_time">
                            <label>(1 second = 1000)</label>
                        </div>
                    </div>
                </div>

                <h1>SIDE CART BODY</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Product Sales Count</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_product_sales_count">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product Image</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_product_img">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product Name</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_product_name">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Product Price</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_product_prices">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product Total</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_product_total">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product Meta ( Variations )</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_product_metadata">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Link to Product Page</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_link_to_page_product">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Allow quantity update</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-allow_ilosc_update">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Quantity Update Delay</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-qty_update_delay">
                        </div>
                        <br>
                        <div>
                            <i>Wait before quantiy update request is sent to server ( 1 second = 1000 )</i>
                        </div>
                    </div>
                    <div class="form-element-wrapper">
                        <h2>Product name (Variable Product)</h2>
                        <select class="woonectio_minicard_settings-product_name_variable_product">
                            <option value="include">Include Variation</option>
                            <option value="not_include">Do not include variation</option>
                        </select>
                    </div>
                </div>

                <h1>SIDE CART FOOTER</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Subtotal</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_subtotal">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Discount</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_discount">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Tax</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_tax">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Shipping Amount</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_shipping_amount">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Shipping Calculator</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_shipping_calc">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Other Fee</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_other_fee">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Total</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_total">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Empty Cart Link</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_footer_empty_card_link">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>