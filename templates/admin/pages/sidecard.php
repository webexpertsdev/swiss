<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="sidecard" style="background: greenyellow">Visibility</menu_button>
            <menu_button id="sidecard_design">Design</menu_button>
            <menu_button id="sidecard_fonts">Fonts</menu_button>
            <menu_button id="sidecard_configurations">Configuration</menu_button>
        </div>

        <div id="content-box">
            <h1>Visibility Settings</h1>

            <form id="woonectio_sidecard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show after Scroll</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-show_after_scroll">
                            <label>Enable</label>
                        </div>
                        <br>
                        <div>
                            <i>Either you want show after scroll or always</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Enable On Desktop</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-enable_on_desktop">
                            <label>Enable</label>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Enable On Tablet</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-enable_on_tablet">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Enable on Mobile</h2>
                        <div>
                            <input type="checkbox" class="woonectio_sidecard_settings-enable_on_mobile">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>