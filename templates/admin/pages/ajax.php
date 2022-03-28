<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="license">License</menu_button>
            <menu_button id="ajax" style="background: greenyellow">Ajax</menu_button>
        </div>

        <div id="content-box">
            <h1>General</h1>

            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Ajax add to cart</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-ajax_add_to_cart_enabled">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>