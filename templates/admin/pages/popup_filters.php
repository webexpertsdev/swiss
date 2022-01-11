<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="popup">General</menu_button>
            <menu_button id="popup_content_template">Content Template</menu_button>
            <menu_button id="popup_advanced">Advanced</menu_button>
            <menu_button id="popup_filters" style="background: greenyellow">Filters</menu_button>
            <menu_button id="popup_styles">Style</menu_button>
        </div>

        <div id="content-box">
            <h1>Filters</h1>

            <form id="woonectio_popup_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show / Hide On All Pages</h2>
                        <div>
                            <select class="woonectio_popup_settings-visible_on_all_pages">
                                <option>Default</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <i>Add the pages exluded below.</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Pages Excluded</h2>
                        <div>
                            <textarea class="woonectio_popup_settings-pages_excluded"></textarea>
                        </div>
                        <br>
                        <div>
                            <i>
                                Add the excluded pages URL's here. ex:<br>
                                http://mysite.com, http://mysite.com/product/hoodie-with-zipper/<br>

                                You can also use a wildcard at the end:<br>
                                http://mysite.com/my-page-slug*<br>
                            </i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Hide On All Articles</h2>
                        <div>
                            <input type="checkbox" class="woonectio_popup_settings-hide_on_all_articles">
                            <label>Enable</label>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Only On These Woocommerce Categories</h2>
                        <div>
                            <input type="text" class="woonectio_popup_settings-Show_only_on_these_woocommerce_categories">
                        </div>
                        <br>
                        <div>
                            <i>
                                Leave empty if you want to show popups on all categories.<br>
                                ex: 6,18,10
                            </i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Products Excluded</h2>
                        <div>
                            <select class="woonectio_popup_settings-products_excluded">
                                <option>default</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <i>
                                Click on "ctrl" and select from the list.
                            </i>
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>