<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard" style="background: greenyellow">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style">Style</menu_button>
            <menu_button id="minicard_shortcode">Shortcode</menu_button>
        </div>

        <div id="content-box">
            <h1>Mini</h1>

            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Auto Open Cart</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-auto_open_cart">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Ajax add to cart</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-ajax_add_to_card">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Fly to Cart Animation</h2>
                        <p>coming soon...</p>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-fly_to_cart_anim" disabled>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Cart Order</h2>
                        <select class="woonectio_minicard_settings-cart_order">
                            <option value="ASC">Recently added item at last (Asc)</option>
                            <option value="DESC">Recently added item on top (Desc)</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Basket Count</h2>
                        <select class="woonectio_minicard_settings-basket_count">
                            <option value="number">Number of products</option>
                            <option value="quantity">Sum of Quantity of all the products</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Coupons List</h2>
                        <select class="woonectio_minicard_settings-coupons_list">
                            <option value="all">Show All</option>
                            <option value="available_only">Show only available</option>
                            <option value="hide">Do not show</option>
                        </select>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Empty cart button URL</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-empty_cart_button_url">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Do not show cart on pages</h2>
                        <div>
                            <textarea class="woonectio_minicard_settings-do_not_show_cart_on_pages"></textarea>
                        </div>
                        <br>
                        <div>
                            <i>Use post type/page id/slug separated by comma. For eg: post,contact-us,about-us .For all non woocommerce pages, use no-woocommerce</i>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>