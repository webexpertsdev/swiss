<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons" style="background: greenyellow">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode">Shortcode</menu_button>
        </div>

        <div id="content-box">
            <h1>Coupons</h1>

            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Maximum coupouns count</h2>
                        <div>
                            <input type="number" min="1" step="1" class="woonectio_minicard_settings-maximum_coupouns_count">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Custom coupons post ID</h2>
                        <div>
                            <textarea class="woonectio_minicard_settings-custom_coupons_post_id"></textarea>
                        </div>
                        <br>
                        <div>
                            <i>Display only these coupons. Add coupons post ID separated by comma. Leave empty to list all</i>
                        </div>
                    </div>

                </div>


                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>