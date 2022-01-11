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
                            <input type="text" class="woonectio_popup_settings-sale_content_template">
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
                                {by_woomotiv}
                            </i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Review Content Template</h2>
                        <div>
                            <input type="text" class="woonectio_popup_settings-review_content_template">
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
                                {by_woomotiv}<br>
                            </i>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>