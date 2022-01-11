<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="popup">General</menu_button>
            <menu_button id="popup_content_template">Content Template</menu_button>
            <menu_button id="popup_advanced" style="background: greenyellow">Advanced</menu_button>
            <menu_button id="popup_filters">Filters</menu_button>
            <menu_button id="popup_styles">Style</menu_button>
        </div>

        <div id="content-box">
            <h1>Advanced</h1>

            <form id="woonectio_popup_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Campaign Tracking</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-campagin_tracking">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Disable Popup Link</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-disable_popup_link">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>
                                Enable this option if you want to disable the popup link.
                            </i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Product Title Max Words</h2>
                        <div>
                            <input type="text" class="woonectio_popup_settings-product_title_max_words">
                        </div>
                        <br>
                        <div>
                            <i>
                                min: 1
                            </i>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>