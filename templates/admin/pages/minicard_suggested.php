<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested" style="background: greenyellow">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode">Shortcode</menu_button>
        </div>

        <div id="content-box">
            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <h1>SUGGESTED PRODUCTS</h1>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-enable_suggested_products">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Display on mobile devices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-enable_suggested_on_mobile">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product Image</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_suggested_product_img">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Product Title</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_suggested_product_title">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product Price</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_suggested_product_price">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Add to cart button</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-show_suggested_add_to_card_btn">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Products type</h2>
                        <select class="woonectio_minicard_settings-show_suggested_product_type">
                            <option value="related">Related</option>
                            <option value="get_upsells">Up-sells</option>
                            <option value="get_cross_sells">Cross-sells</option>
                            <option value="custom">Custom</option>
                            <option value="random">Random</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Custom Product IDS</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-show_suggested_custom_products_id">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Max products in suggested</h2>
                        <div>
                            <input type="number" min="0" step="1" class="woonectio_minicard_settings-show_suggested_number_of_products">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>