<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text" style="background: greenyellow">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode">Shortcode</menu_button>
        </div>

        <div id="content-box">
                <h1>TEXTS</h1>
            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Cart Heading</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_cart_header">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Continue Button</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_continue_button">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Cart Button</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_cart_button">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Checkout Button</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_checkout_button">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Empty Cart</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_empty_card">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Shop Button</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_shop_button">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Remaining amount</h2>
                        <b>write {left} for add price</b>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_remaining_amount">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Free shipping</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-texts_free_shipping">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Price text</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-price_show_text">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Buyed times</h2>
                        <b>write {times} for add times was buyed</b>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-time_was_buyed">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>