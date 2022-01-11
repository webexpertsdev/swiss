<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="popup">General</menu_button>
            <menu_button id="popup_content_template">Content Template</menu_button>
            <menu_button id="popup_advanced">Advanced</menu_button>
            <menu_button id="popup_filters">Filters</menu_button>
            <menu_button id="popup_styles" style="background: greenyellow">Style</menu_button>
        </div>

        <div id="content-box">
            <h1>Style</h1>

            <form id="woonectio_popup_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Font Size (Desktop/Tablet)</h2>
                        <div>
                            <input type="number" class="woonectio_popup_settings-font_size_desktop">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Font Size (Mobile)</h2>
                        <div>
                            <input type="number" class="woonectio_popup_settings-font_size_mobile">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Shape</h2>
                        <div>
                            <select class="woonectio_popup_settings-shape">
                                <option>default</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Size</h2>
                        <div>
                            <select class="woonectio_popup_settings-size">
                                <option value="standart">standart</option>
                                <option value="medium">medium</option>
                                <option value="big">big</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Position</h2>
                        <div>
                            <select class="woonectio_popup_settings-position">
                                <option value="left">left</option>
                                <option value="right">right</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Opening Animation</h2>
                        <div>
                            <select class="woonectio_popup_settings-animation">
                                <option>default</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-background_color">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-text_color">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Strong Tags Color</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-strong_tags_color">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Stars Color (Unrated)</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-stars_color_unrated">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Stars Color (Rated)</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-stars_color_rated">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Close Button Color</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-close_button_color">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Close Button Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_popup_settings-close_button_background_color">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>