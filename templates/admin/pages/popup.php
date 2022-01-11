<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="popup" style="background: greenyellow">General</menu_button>
            <menu_button id="popup_content_template">Content Template</menu_button>
            <menu_button id="popup_advanced">Advanced</menu_button>
            <menu_button id="popup_filters">Filters</menu_button>
            <menu_button id="popup_styles">Style</menu_button>
        </div>

        <div id="content-box">
            <h1>General</h1>

            <form id="woonectio_popup_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Display</h2>
                        <div>
                            <input type="radio" name="display_recent" class="woonectio_popup_settings-display_recent" value="recent">
                            <label>Recent Sales ( Reviews )</label>
                        </div>
                        <br>
                        <div>
                            <input type="radio" name="display_recent" class="woonectio_popup_settings-display_recent" value="random">
                            <label>Random Sales ( Reviews )</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>No-Repeat</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-display_no_repeat">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>Do not repeat the same Sales/Reviews popups.</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Display Orders With Status "Processing"</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-display_order_with_processing">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Display Review Popups</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-display_review_popups">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>Enable this option if you want push review popups.<br>
                                Woomotiv will only show reviews that have 4 stars and above.</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Number Of Popups To Show</h2>
                        <div>
                            <input type="text" class="woonectio_popup_settings-number_of_popups_to_show">
                        </div>
                        <br>
                        <div>
                            <i>Minimum: 1</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Delay Time Between 2 Notifications</h2>
                        <div>
                            <input type="text" class="woonectio_popup_settings-delay_between_2_notifications">
                        </div>
                        <br>
                        <div>
                            <i>Second(s)</i>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Notification Display Time</h2>
                        <div>
                            <input type="text" class="woonectio_popup_settings-notify_display_time">
                        </div>
                        <br>
                        <div>
                            <i>Second(s)</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Display Admin Own Notifications</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-display_admin_own_notify">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>Enable this option if you want the admin to see his own orders in the popups</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Display Customers Own Notifications</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-display_customer_own_notify">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>Enable this option if you want the logged in customers to see their own orders in the popups</i>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Display Buyer Avatar</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-display_buyer_avatar">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>If enabled the user avatar will be displayed instead of the product image</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide On Mobile</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-hide_on_mobile">
                            <label>Hide</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide Close Button</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-hide_close_button">
                            <label>Hide</label>
                        </div>
                    </div>
                </div>

                <button type="submit">Save changes</button>

            </form>
        </div>
    </div>
</div>