<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <!--<div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode" style="background: greenyellow">Shortcode</menu_button>
        </div>-->

        <div id="content-box">
            <h1>Enable addons</h1>

            <form id="woonectio_shippingextra_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable shortcode</h2>
                        <p>[woonectio_extrashipping_freeshippingbar]</p>
                        <div>
                            <input type="checkbox" class="woonectio_shippingextra_settings-enable_shipping_shortcode">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Remaining shipping amount</h2>
                        <p>write {left} for add price</p>
                        <div>
                            <input type="text" class="woonectio_shippingextra_settings-texts_free_shipping">
                        </div>
                    </div>
                </div>

                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>