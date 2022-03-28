<div id="wrapper_woo">
    <?php include_once '../sidebar.php' ?>
    <div id="container">
        <div id="navmen">
            <menu_button id="minicard">General</menu_button>
            <menu_button id="minicard_coupons">Coupons</menu_button>
            <menu_button id="minicard_body">Body</menu_button>
            <menu_button id="minicard_suggested">Suggested</menu_button>
            <menu_button id="minicard_text">Texts</menu_button>
            <menu_button id="minicard_style" style="background: greenyellow">Style</menu_button>
            <menu_button id="minicard_shortcode">Shortcode</menu_button>
        </div>

        <div id="content-box">
            <h1>MAIN</h1>

            <form id="woonectio_minicard_settings">
                <div id="success">Settings save successful</div>
                <div id="fail">Settings save error</div>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Side Cart Width</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-main_style_sidecart_width">
                        </div>
                        <br>
                        <div>
                            <i>size in PX</i>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Open From</h2>
                        <select class="woonectio_minicard_settings-main_style_sidecart_openform">
                            <option value="left">Left</option>
                            <option value="right">Right</option>
                        </select>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Font</h2>
                        <div>
                            <input type="url" class="woonectio_minicard_settings-main_style_sidecart_fonturl">
                        </div>
                    </div>
                </div>

                <h1>SIDE CART BASKET</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Shape</h2>
                        <select class="woonectio_minicard_settings-basket_shape">
                            <option value="round">Round All</option>
                            <option value="square">Square</option>
                        </select>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Icon Size</h2>
                        <input type="text" class="woonectio_minicard_settings-basket_iconsize">
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Show Count</h2>
                        <div>
                            <input type="checkbox" class="woonectio_minicard_settings-basket_showcount">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Basket Icon</h2>
                        <div>
                            <select class="woonectio_minicard_settings-basket_basketicon">
                                <option value="#x1f6d2;">&#x1f6d2;</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Custom Basket Icon</h2>
                        <div>
                            <input type="image" class="woonectio_minicard_settings-basket_basketicon_img_custom" disabled>
                        </div>
                        <br>
                        <div>
                            <i>coming soon...</i>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Basket Position</h2>
                        <div>
                            <select class="woonectio_minicard_settings-basket_basketposition">
                                <option value="top">Top</option>
                                <option value="bottom">Bottom</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Basket Offset ↨</h2>
                        <div>
                            <input type="number" class="woonectio_minicard_settings-basket_basketoffsetvertical">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Basket Offset ⟷</h2>
                        <div>
                            <input type="number" class="woonectio_minicard_settings-basket_basketoffsethorizontal">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Count Position</h2>
                        <div>
                            <select class="woonectio_minicard_settings-basket_basketcountposition">
                                <option value="top_left">Top-Left</option>
                                <option value="top_right">Top-Right</option>
                                <option value="bottom_left">Bottom-Left</option>
                                <option value="bottom_right">Bottom-Right</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Basket Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-basket_basketcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Basket Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-basket_basketbackcolor">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Basket Shadow</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-basket_basketshadow">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Count Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-basket_basketcountcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Count Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-basket_basketbackcountcolor">
                        </div>
                    </div>
                </div>

                <h1>SIDE CART HEADER</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Heading Align</h2>
                        <div>
                            <select class="woonectio_minicard_settings-heading_headingalign">
                                <option value="center">Center</option>
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Close Icon Align</h2>
                        <div>
                            <select class="woonectio_minicard_settings-heading_closeiconalign">
                                <option value="left">Left</option>
                                <option value="right">Right</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Close Icon</h2>
                        <div>
                            <select class="woonectio_minicard_settings-heading_closeicontype">
                                <option value="#x2715;">&#x2715;</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Close Icon Size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-heading_closeiconsize">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Heading Font Size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-heading_headingfontsize">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Shipping Bar Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-heading_shippingbarcolor">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-heading_textcolor">
                        </div>
                    </div>
                </div>


                <h1>SIDE CART BODY</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Delete Icon</h2>
                        <div>
                            <select class="woonectio_minicard_settings-sidecartbody_wasteicon">
                                <option value="#x1f5d1;">&#x1f5d1;</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Font Size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartbody_fontsize">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbody_backgroundcolor">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbody_textcolor">
                        </div>
                    </div>
                </div>

                <h1>SIDE CART BODY ( PRODUCT )</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Product Padding</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartbodyproduct_productpadding">
                        </div>
                    </div>
                    <div class="form-element-wrapper">
                        <h2>Quantiy & Price Display</h2>
                        <div>
                            <select class="woonectio_minicard_settings-sidecartbodyproduct_qtypricedisplay">
                                <option value="one_line">Show in one line</option>
                                <option value="separate">Show separately</option>
                            </select>
                        </div>
                    </div>
                </div>

                <h1>SIDE CART BODY ( QUANTITY )</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Box Width</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartbodyqty_boxwidth">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Box Height</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartbodyqty_boxheight">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Border Size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartbodyqty_bordersize">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Box Border Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbodyqty_boxbordercolor">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Input BG Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbodyqty_inputbgcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Input Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbodyqty_inputtxtcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Buttons BG Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbodyqty_buttonsbgcolor">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Buttons Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartbodyqty_buttontextcolor">
                        </div>
                    </div>
                </div>

                <h1>SIDE CART FOOTER</h1>
                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Padding</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartfooterstyle_padding">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Font Size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartfooterstyle_fontsize">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartfooterstyle_bgcolor">
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartfooterstyle_txtcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Coupon Icon</h2>
                        <div>
                            <select class="woonectio_minicard_settings-sidecartfooterstyle_couponicon">
                                <option value="basic">basic</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Button Position</h2>
                        <div>
                            <label>Continue Shopping order</label>
                            <select class="woonectio_minicard_settings-sidecartfooterstyle_continueshoppingorder">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <br>

                        <div>
                            <label>View Cart order</label>
                            <select class="woonectio_minicard_settings-sidecartfooterstyle_viewcardorder">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>

                        <br>

                        <div>
                            <label>Checkout order</label>
                            <select class="woonectio_minicard_settings-sidecartfooterstyle_checkoutorder">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Button Row</h2>
                        <div>
                            <select class="woonectio_minicard_settings-sidecartfooterstyle_buttonrow">
                                <option value="one">One in a row ( 1+1+1 )</option>
                                <option value="two_one">Two in first row ( 2 + 1 )</option>
                                <option value="one_two">Two in last row ( 1 + 2 )</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Button Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartfooterstyle_btnbgcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Button Text Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-sidecartfooterstyle_btntextcolor">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Button Border</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-sidecartfooterstyle_btnborder">
                        </div>
                    </div>
                </div>

                <h1>SUGGESTED PRODUCTS</h1>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Style</h2>
                        <div>
                            <select class="woonectio_minicard_settings-suggestedproductstyle_style">
                                <option value="wide">Wide</option>
                                <option value="narrow">Narrow</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Location</h2>
                        <div>
                            <select class="woonectio_minicard_settings-suggestedproductstyle_location">
                                <option value="before">Before Totals</option>
                                <option value="after">After Totals</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="settings-row">
                    <div class="form-element-wrapper">
                        <h2>Font Size</h2>
                        <div>
                            <input type="text" class="woonectio_minicard_settings-suggestedproductstyle_fontsize">
                        </div>
                    </div>

                    <div class="form-element-wrapper">
                        <h2>Background Color</h2>
                        <div>
                            <input type="color" class="woonectio_minicard_settings-suggestedproductstyle_bgcolor">
                        </div>
                    </div>
                </div>
                <button type="submit">Save changes</button>
            </form>
        </div>
    </div>
</div>