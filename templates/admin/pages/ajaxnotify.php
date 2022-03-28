<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="ajaxnotify" style="background: greenyellow">General</menu_button>
            <menu_button id="ajaxnotify_autoclose">Auto close</menu_button>
            <menu_button id="ajaxnotify_restrictiveloading">Restrictive Loading</menu_button>
            <menu_button id="ajaxnotify_other">Others</menu_button>
        </div>

        <div id="content-box">
            <h1>Notices General Options</h1>

            <form id="woonectio_ajaxnotify_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Close on click inside</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_close_on_click">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Prevent closing if clicking outside</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_prevent_closing">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Prevent scrolling</h2>
                        <div>
                            <input type="checkbox" class="woonectio_ajaxnotify_settings-enable_prevent_scrolling">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>