<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="sidecard">Visibility</menu_button>
            <menu_button id="sidecard_design">Design</menu_button>
            <menu_button id="sidecard_fonts">Fonts</menu_button>
            <menu_button id="sidecard_configurations" style="background: greenyellow">Configuration</menu_button>
        </div>

        <div id="content-box">
            <h1>Configuration Settings</h1>

            <form id="woonectio_sidecard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Simple Product Button Text</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-simple_product_button_text">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Variable Product Button Text</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-variable_product_button_text">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Variable Product Behavior</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-variable_product_behavior">
                                <option value="default">default</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Sticky Bar Position</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-sticky_bar_position">
                                <option value="bottom">bottom</option>
                                <option value="top">top</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show After Scroll Pixels</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-show_after_scroll_pixels">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Cart Button Style</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-cart_button_style">
                                <option value="square">square</option>
                                <option value="round">round</option>
                                <option value="halfround">half-round</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Product Image Style</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-product_image_style">
                                <option value="square">square</option>
                                <option value="round">round</option>
                                <option value="halfround">half-round</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide On Products</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-hide_on_products">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide On Product Category</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-hide_on_product_category">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Sale Badge</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-sale_badge">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Sale Badge Text</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-sale_badge_text">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Sale Badge Style</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-sale_badge_style">
                                <option value="square">square</option>
                                <option value="round">round</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Review Stars</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-review_stars_enable">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Review Count</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-review_count_enable">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Box Shadow</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-box_shadow_enable">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Quantity</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-show_quantity_enable">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Stock Count</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-stock_count_enable">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show Product image</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-show_product_image_enable">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Ajax Add to Cart</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-ajax_add_to_cart_enable">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Cart Button Animation</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-cart_button_animation">
                                <option value="none">none</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Price Range On Variable Product</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-price_range_on_variable_product_enable">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Price</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-show_price_enable">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Price Badge Style</h2>
                        <div>
                            <select class="woonectio_sidecard_settings-price_badge_style">
                                <option value="round">round</option>
                                <option value="square">square</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Redirect after "ATC"</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-redirect_after_atc_enable">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>