<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="ajaxnotify">General</menu_button>
            <menu_button id="ajaxnotify_autoclose">Auto close</menu_button>
            <menu_button id="ajaxnotify_restrictiveloading">Restrictive Loading</menu_button>
            <menu_button id="ajaxnotify_other" style="background: greenyellow">Others</menu_button>
        </div>

        <div id="content-box">
            <h1>Notice types</h1>
            <p>Notice types that can be displayed on Pop-ups</p>

            <form id="woonectio_ajaxnotify_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable error notices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_errors_notice">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Enable success notices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_success_notice">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Enable info notices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_info_notice">
                        </div>
                    </div>
                </div>

                <h1>Notice hiding</h1>
                <p>Hide default WooCommerce Notices.</p>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Hide error notices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-hide_errors_notice">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide success notices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-hide_success_notice">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide info notices</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-hide_info_notice">
                        </div>
                    </div>
                </div>

                <!--<h1>Custom style</h1>
                <p>Style the pop-up using the Customizer.</p>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable custom style</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_custom_style">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Use Font Awesome</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_fontawesome">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Font Awesome URL</h2>
                        <div>
                            <input type="text" class="woonectio_ajaxnotify_settings-fontawesomeurl">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Modal template</h2>
                        <div>
                            <textarea class="woonectio_ajaxnotify_settings-modal_template"></textarea>
                        </div>
                    </div>
                </div>-->


                <h1>Cookies</h1>
                <p>Notices will be kept in Browser’s cookies trying to prevent duplicated messages from being displayed repeatedly inside popups.</p>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_cookie">
                            <label>Save messages in Browser's Cookies</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Expiration time</h2>
                        <div>
                            <input type="number" step="0.5" class="woonectio_ajaxnotify_settings-expiration_time">
                            <label>Time in Hours messages will be kept in Cookies</label>
                        </div>
                    </div>
                </div>

                <h1>Audio</h1>
                <p>Play sounds.</p>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_audio">
                            <label>Enable audio</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Opening</h2>
                        <div>
                            <input type="text" class="woonectio_ajaxnotify_settings-openingurl">
                            <label>Sound URL when Pop-up opens</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Closing</h2>
                        <div>
                            <input type="text" class="woonectio_ajaxnotify_settings-closingurl">
                            <label>Sound URL when Pop-up closes</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>