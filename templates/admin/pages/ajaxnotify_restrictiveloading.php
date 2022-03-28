<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="ajaxnotify">General</menu_button>
            <menu_button id="ajaxnotify_autoclose">Auto close</menu_button>
            <menu_button id="ajaxnotify_restrictiveloading" style="background: greenyellow">Restrictive Loading</menu_button>
            <menu_button id="ajaxnotify_other">Others</menu_button>
        </div>

        <div id="content-box">
            <h1>Restrictive Loading</h1>

            <form id="woonectio_ajaxnotify_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Page(s)</h2>
                        <div>
                            <input type="text" class="woonectio_ajaxnotify_settings-excluded_pages">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Conditional(s)</h2>
                        <div>
                            <input type="text" class="woonectio_ajaxnotify_settings-excluded_conditionals">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>