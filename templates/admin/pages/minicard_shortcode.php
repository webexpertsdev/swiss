<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode" style="background: greenyellow">Shortcode</menu_button>
        </div>

        <div id="content-box">
            <h1>Icons</h1>

            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Icon text</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-woonectio_shortcode_text">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Icon</h2>
                        <div>
                            <select class="woonectio_minicard_settings-woonectio_shortcode_icon">
                                <option value="#x1f6d2;">&#x1f6d2;</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Image</h2>
                        <p>coming soon...</p>
                        <div>
                            <input type="image" class="woonectio_minicard_settings-woonectio_shortcode_icon_img" disabled>
                        </div>
                    </div>
                </div>

                <h1>Products quantity</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show quantity</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-woonectio_shortcode_quantity_pp_show">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show quantity type</h2>
                        <select class="woonectio_minicard_settings-woonectio_shortcode_quantity_pp_show_select">
                            <option value="number">Number of products</option>
                            <option value="quantity">Sum of Quantity of all the products</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Position</h2>
                        <select class="woonectio_minicard_settings-woonectio_shortcode_psotioion_pp_show_select">
                            <option value="line">In line</option>
                            <option value="right">On top right edge</option>
                        </select>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Font-size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-woonectio_shortcode_font_size">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Background style</h2>
                        <select class="woonectio_minicard_settings-woonectio_shortcode_background_style">
                            <option value="none">Without background</option>
                            <option value="square">Square background</option>
                            <option value="circle">Circle background</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Font color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-woonectio_shortcode_color_of_count">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Background color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-woonectio_shortcode_color_of_background">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Background size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-woonectio_shortcode_size_background">
                        </div>
                    </div>
                </div>

                <h1>Price</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Price</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-woonectio_shortcode_icludes_products_show">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Price position</h2>
                        <select class="woonectio_minicard_settings-woonectio_shortcode_icludes_products_position">
                            <option value="start">Start</option>
                            <option value="end">End</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show price with tax</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-woonectio_shortcode_icludes_products_sum_of_pp_brutto">
                        </div>
                    </div>
                </div>

                <h1>Behavior</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Click event</h2>
                        <select class="woonectio_minicard_settings-woonectio_shortcode_onclik_icon">
                            <option value="open">Open side cart on click</option>
                            <option value="redirect">Redirect to cart</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Show simple cart on hover</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-woonectio_shortcode_show_onhover_mini">
                        </div>
                    </div>
                </div>

                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>