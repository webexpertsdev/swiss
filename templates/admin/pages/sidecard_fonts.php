<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="sidecard">Visibility</menu_button>
            <menu_button id="sidecard_design">Design</menu_button>
            <menu_button id="sidecard_fonts" style="background: greenyellow">Fonts</menu_button>
            <menu_button id="sidecard_configurations">Configuration</menu_button>
        </div>

        <div id="content-box">
            <h1>Fonts Settings</h1>

            <form id="woonectio_sidecard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Title Font size</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-title_font_size">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Add to Cart Button Font size</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-add_to_cart_button_font_size">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Price Font size</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-price_font_size">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Sale Font size</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-sale_font_size">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Stock management Font size</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-stock_management_font_size">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Review Font size</h2>
                        <div>
                            <input type="text" class="woonectio_sidecard_settings-review_font_size">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>