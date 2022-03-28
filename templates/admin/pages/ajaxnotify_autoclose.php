<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="ajaxnotify">General</menu_button>
            <menu_button id="ajaxnotify_autoclose" style="background: greenyellow">Auto close</menu_button>
            <menu_button id="ajaxnotify_restrictiveloading">Restrictive Loading</menu_button>
            <menu_button id="ajaxnotify_other">Others</menu_button>
        </div>

        <div id="content-box">
            <h1>Auto-close</h1>

            <form id="woonectio_ajaxnotify_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Auto-close time</h2>
                        <div>
                            <input type="number" class="woonectio_ajaxnotify_settings-auto_close_time">
                            <label>Auto-closes the popup after x seconds.</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Notice types</h2>
                        <div>
                            <input type="text" class="woonectio_ajaxnotify_settings-notice_types">
                            <label>Only pop-ups containing at least one of the selected notice types will auto-close.
                                If empty, the auto-close will work regardless of the notice type.</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>