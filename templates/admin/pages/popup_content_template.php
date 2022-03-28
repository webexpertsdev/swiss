<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="popup">General</menu_button>
            <menu_button id="popup_content_template" style="background: greenyellow">Content Template</menu_button>
            <menu_button id="popup_advanced">Advanced</menu_button>
            <menu_button id="popup_filters">Filters</menu_button>
            <menu_button id="popup_styles">Style</menu_button>
        </div>

        <div id="content-box">
            <h1>Content Template</h1>

            <form id="woonectio_popup_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Sale Content Template</h2>
                        <div>
                            <textarea class="woonectio_popup_settings-sale_content_template"></textarea>
                        </div>
                        <br>
                        <div>
                            <i>
                                Available Template Tags:<br>
                                {new_line}<br>
                                {product}<br>
                                {buyer} {buyer_username} {buyer_first_name} {buyer_last_name}<br>
                                {date}<br>
                                {city} {country} {state}<br>
                                {by_woonectio}
                            </i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Review Content Template</h2>
                        <div>
                            <textarea class="woonectio_popup_settings-review_content_template"></textarea>
                        </div>
                        <br>
                        <div>
                            <i>
                                Available Template Tags:<br>
                                {stars}<br>
                                {new_line}<br>
                                {product}<br>
                                {buyer} {buyer_username} {buyer_first_name} {buyer_last_name}<br>
                                {date}<br>
                                {by_woonectio}<br>
                            </i>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
    <div id="woonectio_popup_product_wrapper" style="margin-top: 20%; flex-direction: row; background-color: rgba(0, 0,0 ,0.1); width: auto; height: 150px; padding: 5px; border-radius: 5px">
        <div style="text-align: center">
            <div class="popup_image">
                <img width="324" height="324" src="http://wordpress/wp-content/uploads/2022/01/320ace7efb8a4e59825f61ae88b9919b-324x324.jpg" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" srcset="http://wordpress/wp-content/uploads/2022/01/320ace7efb8a4e59825f61ae88b9919b-324x324.jpg 324w, http://wordpress/wp-content/uploads/2022/01/320ace7efb8a4e59825f61ae88b9919b-150x150.jpg 150w, http://wordpress/wp-content/uploads/2022/01/320ace7efb8a4e59825f61ae88b9919b-100x100.jpg 100w, http://wordpress/wp-content/uploads/2022/01/320ace7efb8a4e59825f61ae88b9919b-128x128.jpg 128w, http://wordpress/wp-content/uploads/2022/01/320ace7efb8a4e59825f61ae88b9919b-256x256.jpg 256w" sizes="(max-width: 324px) 100vw, 324px">
            </div>
            nice t-shirt
        </div>
        <div id="woonectio_wrapper_for_popup">
            <br>
            <span id="woonectio_buyer">Alex997</span>
            <br>
            <span id="woonectio_buyer_username">Alex997 </span>
            <span id="woonectio_buyer_firstname">Alex </span>
            <span id="woonectio_buyer_lastname">Tolkien </span>
            <br>
            <span id="woonectio_date">2022-01-08</span>
            <br>
            <span id="woonectio_bywoonectio">by woonectio</span>
        </div>
    </div>
</div>