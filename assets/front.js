window.Core = class Core
{
    ajax = (params) => {
        return new Promise((resolve, reject)=>{
            const xhr = new XMLHttpRequest();
            xhr.open(params.method, params.url, true);

            xhr.responseType = params.responseType;
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = () => {
                if(xhr.status >= 400){
                    reject(xhr.response);
                }
                else{
                    resolve(xhr.response);
                }
            }
            xhr.onerror = () => {
                reject(xhr.response);
            }
            xhr.send(JSON.stringify(params.body));
        })
    }
}

let core = new window.Core();

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

let popup = () =>{
    let settings_array;
    let params = {
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/woo_tools.php',
        body: {
            do_what: 'get_popup_settings'
        },
        responseType: 'json'
    }

    core.ajax(params).then(data=>{
        settings_array = data;
        let page_included = settings_array.pages_excluded === null ? [] : settings_array.pages_excluded.split(',');
        if(page_included.includes(window.location.href) || parseInt(settings_array.hide_on_all_articles) === 1){
            return;
        }
        else{
            let params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/templates/popup_main.php',
                body: {
                    is_start: true
                },
                responseType: 'json'
            }

            core.ajax(params).then(data=>{
                if(data === 'empty'){
                    return;
                }
                let count_retry = 0;
                function show(){
                    setTimeout(async ()=>{
                        let params_modal = {
                            method: 'POST',
                            url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/templates/popup_main.php',
                            body: {
                                is_start: false,
                                elem: data.display_reviews === 'random' ? getRandomInt(0, data.count-1) : count_retry
                            },
                            responseType: 'json'
                        }

                        core.ajax(params_modal).then(data=>{
                            let close_button = '';
                            // if(parseInt(data.hide_close_button) === 0){
                            //     close_button = '<span class="popup_close">&#88;</span>';
                            // }
                            // let notify = '<div class="woonectio_popup">\n' +
                            //     '    <div class="popup_image">'+data.item_image+
                            //     '<div class="star">&#9733;</div>\n' +
                            //     '    </div><p class="popup_text"><b>'+data.first_name+' '+data.last_name+'</b> buy a\n' +
                            //     '        <br>\n' +
                            //     '        <b>'+data.item_name+'</b>\n' +
                            //     '    </p>\n' + close_button
                            //     +
                            //     '</div>';

                            jQuery(document.body).append(data);
                            // document.getElementsByClassName('popup_close')[0].addEventListener('click', event =>{
                            //     document.getElementsByClassName('woonectio_popup')[0].remove();
                            //     return;
                            // });
                        }).catch(data=>{
                            console.log(data);
                        })
                        await sleep(parseInt(data.delay_notify)*1000);
                        if(document.getElementsByClassName('woonectio_popup').length > 0){
                            document.getElementsByClassName('woonectio_popup')[0].remove();
                        }
                        if(parseInt(data.no_repeat) === 1){
                            if(count_retry === data.count - 1){
                                return;
                            }
                            else{
                                count_retry++;
                                show();
                            }
                        }
                        else{
                            if(count_retry === data.count - 1){
                                count_retry = 0;
                                show();
                            }
                            else{
                                count_retry++;
                                show();
                            }
                        }
                    }, parseInt(data.delay_between_two)*1000);
                }
                show();
            }).catch(data=>{
                alert('error');
            })
        }
    })
}

function sidecard(){
    let form = document.getElementById('sideform');
    if(form !== null){
        if(jQuery('#global_woonectio_product_path').val() === window.location.href){
            let settings_array;
            let params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/woo_tools.php',
                body: {
                    do_what: 'get_sticky_add_to_cart_settings'
                },
                responseType: 'json'
            }

            core.ajax(params).then(data=>{
                settings_array = data;
                if(parseInt(settings_array.show_after_scroll) === 1){
                    jQuery(function(){
                        jQuery(window).scroll(function(){
                            if(jQuery(this).scrollTop() > 200){
                                jQuery('#sidecard_apnel').show();
                            }
                            if(jQuery(this).scrollTop() < 200){
                                jQuery('#sidecard_apnel').hide();
                            }
                        });
                    });
                }


                jQuery(window).resize(function() {
                    if(parseInt(settings_array.enable_on_mobile) !== 1){
                        if(window.innerWidth > 500){
                            jQuery('#sidecard_apnel').hide();
                        }
                    }
                    else {
                        jQuery('#sidecard_apnel').show();
                    }

                    if(parseInt(settings_array.enable_on_tablet) !== 1){
                        if(window.innerWidth > 800){
                            jQuery('#sidecard_apnel').hide();
                        }
                    }
                    else {
                        jQuery('#sidecard_apnel').show();
                    }

                    if(parseInt(settings_array.enable_on_desktop) !== 1){
                        if(window.innerWidth > 1150){
                            jQuery('#sidecard_apnel').hide();
                        }
                    }
                    else {
                        jQuery('#sidecard_apnel').show();
                    }
                });

                setTimeout(()=>{
                    form.addEventListener('submit', event=>{
                        event.preventDefault();
                        let varin = document.getElementsByClassName('woonectio_stcky_wariations');
                        let vars = '';
                        for(let i=0; i<varin.length; i++){
                            if(varin[i].value !== undefined){
                                vars += varin[i].value + '|';
                            }
                        }


                        let params = {
                            method: 'POST',
                            url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/sidecard.php',
                            body: {
                                id: document.getElementById('cardid').value,
                                count: document.getElementById('points').value,
                                variants: vars,
                                var_id: document.getElementById('woonectio_stcky_wariations_id').value
                            },
                            responseType: 'json'
                        }

                        core.ajax(params).then(data=>{
                            location.reload();
                        }).catch(data=>{
                            console.log('error front.js 131');
                        });
                    })
                }, 0);
            });
        }
        else{
            document.getElementById('sidecard_apnel').remove();
        }
    }
}

function inputNumberController(){
    jQuery('<div class="woonectio-quantity-nav"><div class="woonectio-quantity-button woonectio-quantity-up">+</div><div class="woonectio-quantity-button woonectio-quantity-down">-</div></div>').insertAfter('.woonectio-quantity input');
    jQuery('.woonectio-quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input[type="number"]'),
            btnUp = spinner.find('.woonectio-quantity-up'),
            btnDown = spinner.find('.woonectio-quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        btnUp.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

        btnDown.click(function() {
            var oldValue = parseFloat(input.val());
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
        });

    });
}

function stikcy_addcart_new(){
    if(jQuery('#woonectio_sticky_productid').length === 0){
        return;
    }

    if(window.location.href !== jQuery('#woonectio_someproductpageurl').val()){
        return;
    }

    let settings;

    let add_events = () =>{
        this.inputNumberController();

        jQuery('#woonectio_stickyadd_form').on('submit', async(e)=>{
            e.preventDefault();
            let varin = document.getElementsByClassName('woonectio_stcky_wariations');
            let vars = '';
            for(let i=0; i<varin.length; i++){
                if(varin[i].value !== undefined){
                    vars += varin[i].value + '|';
                }
            }

            let params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/sidecard.php',
                body: {
                    dowhat: 'submit',
                    id: document.getElementById('cardid').value,
                    count: document.getElementById('points').value,
                    variants: vars,
                    var_id: document.getElementById('woonectio_stcky_wariations_id').value
                },
                responseType: 'json'
            }

            core.ajax(params).then(data=>{
                jQuery(document.body).trigger('updated_cart_totals');
                if(parseInt(settings.redirect_after_atc_enable) === 1){
                    jQuery(location).prop('href', data.cart_url);
                }else{
                    if(parseInt(settings.ajax_add_to_cart_enable) === 0){
                        location.reload();
                    }
                }
            });
        });


        if(parseInt(settings.show_after_scroll) === 1){
            jQuery(function(){
                jQuery(window).scroll(function(){
                    if(jQuery(this).scrollTop() > parseInt(settings.show_after_scroll_pixels)){
                        jQuery('#sidecard_apnel').show();
                    }
                    if(jQuery(this).scrollTop() < parseInt(settings.show_after_scroll_pixels)){
                        jQuery('#sidecard_apnel').hide();
                    }
                });
            });
        }

        jQuery('#sidecard_apnel select').on('change', ()=>{
            let params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/sidecard.php',
                body: {
                    dowhat: 'update_price',
                    id: jQuery('#woonectio_stcky_wariations_id').val()
                },
                responseType: 'json'
            }

            core.ajax(params).then(data=>{
                jQuery('.product_price_woonectio').html(data);
            });
        });
    }

    let load = () =>{
        ajax_update();
    }

    let ajax_update = () =>{
        let params = {
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/sidecard.php',
            body: {
                dowhat: 'load',
                id: jQuery('#woonectio_sticky_productid').val()
            },
            responseType: 'json'
        }

        core.ajax(params).then(data=>{
            settings = data.settings;
            jQuery('#sidecard_apnel').html(data.html);
            add_events();
        }).catch(data=>{
            jQuery('#sidecard_apnel').remove();
            return;
        });
    }
    load();
}

function ajaxnotify(){
    let create_notice = () =>{
        let settings_array;
        let params = {
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/woo_tools.php',
            body: {
                do_what: 'get_ajax_notify_settings'
            },
            responseType: 'json'
        }

        core.ajax(params).then(data=>{
            settings_array = data;
            let notify = jQuery('.woocommerce');
            if(notify.find('.woocommerce-info, .woocommerce-error, .woocommerce-message').length !== 0){
                let message_array = notify.find('.woocommerce-info, .woocommerce-error, .woocommerce-message');
                let html_popup_array = {};
                for(let i = 0; i<message_array.length; i++){
                    let className = message_array[i].className.slice(message_array[i].className.search('woocommerce'), message_array[i].className.length).split('-')[1];
                    html_popup_array[className] = jQuery(message_array[i]).html();
                }

                let notify_body = '';
                for (const [key, value] of Object.entries(html_popup_array)){
                    switch(key){
                        case 'info':
                            if(parseInt(settings_array.enable_success_notice) === 1){
                                let value1 = '<div>'+value+'</div>';
                                for(let i = 0; i < jQuery(value1).find('li').length; i++){
                                    notify_body += '<div class="notify info">'+jQuery(jQuery(value1).find('li')[i]).text()+'<span class="woonectio_woo_ajax_close_simple">X</span></div>';
                                }
                            }
                            break;
                        case 'error':
                            if(parseInt(settings_array.enable_errors_notice) === 1){
                                let value2 = '<div>'+value+'</div>';
                                for(let i = 0; i < jQuery(value2).find('li').length; i++){
                                    notify_body += '<div class="notify alert">'+jQuery(jQuery(value2).find('li')[i]).text()+'<span class="woonectio_woo_ajax_close_simple">X</span></div>';
                                }
                            }
                            break;
                        case 'message':
                            if(parseInt(settings_array.enable_info_notice) === 1){
                                let value3 = '<div>'+value+'</div>';
                                for(let i = 0; i < jQuery(value3).find('li').length; i++){
                                    notify_body += '<div class="notify notation">'+jQuery(jQuery(value3).find('li')[i]).text()+'<span class="woonectio_woo_ajax_close_simple">X</span></div>';
                                }
                            }
                            break;
                    }
                }

                if(notify_body !== ''){
                    let notify_all = '<div id="woonectio_ajax_notify"><span id="close">close</span>'+notify_body+'</div>';
                    jQuery(document.body).append(notify_all);

                    jQuery(document.body).on('click', '#close', ()=>{
                        jQuery('#woonectio_ajax_notify').remove();
                        if(Object.values(document.body.classList).includes('stop-scrolling')){
                            document.body.classList.remove("stop-scrolling");
                        }
                    })

                    if(parseInt(settings_array.enable_close_on_click) === 1){
                        jQuery(document.body).on('click', '#woonectio_ajax_notify', ()=>{
                            jQuery('#woonectio_ajax_notify').remove();
                            if(Object.values(document.body.classList).includes('stop-scrolling')){
                                document.body.classList.remove("stop-scrolling");
                            }
                        })
                    }

                    jQuery('.woonectio_woo_ajax_close_simple').on('click', (e)=>{
                        e.currentTarget.parentElement.remove();
                    })

                    if(parseInt(settings_array.enable_prevent_closing) === 1){
                        jQuery(document.body).on('click', ()=>{
                            jQuery('#woonectio_ajax_notify').remove();
                            if(Object.values(document.body.classList).includes('stop-scrolling')){
                                document.body.classList.remove("stop-scrolling");
                            }
                        })
                    }

                    if(parseInt(settings_array.enable_prevent_scrolling) !== 1 && notify_body !== ''){
                        document.body.classList.add("stop-scrolling");
                    }

                    setTimeout(()=>{
                        document.body.classList.remove("stop-scrolling");
                        jQuery('#woonectio_ajax_notify').remove();
                    }, parseInt(settings_array.auto_close_time)*1000);
                }


                if(parseInt(settings_array.hide_errors_notice) === 1){
                    jQuery('.woocommerce-error').hide();
                }

                if(parseInt(settings_array.hide_success_notice) === 1){
                    jQuery('.woocommerce-info').hide();
                }

                if(parseInt(settings_array.hide_info_notice) === 1){
                    jQuery('.woocommerce-message').hide();
                }
                if(jQuery('.woocommerce-info').find(jQuery('.showcoupon')).length > 0){
                    jQuery('.woocommerce-info').show()
                }
            }
        });
    }
    jQuery(document.body).on('updated_wc_div', ()=>{
        create_notice();
    });
    create_notice();

    jQuery(document.body).on('checkout_error', ()=>{
        create_notice();
    })
    jQuery(document.body).on('updated_cart_totals', ()=>{
        create_notice();
    })
    jQuery(document.body).on('added_to_cart', ()=>{
        create_notice();
    })
}

const delay = (ms) => new Promise((resolve) => setTimeout(resolve, ms));

function woonectio_setvisible(id, position, dowhat){
    let elem = jQuery('#'+id);
    switch(dowhat){
        case 'show':
            let show_to = async() =>{
                elem.css('display', 'flex');
                if(position === 'right'){
                    let op = 0;
                    elem.css('left', '200%');
                    for(let i = 200;i>99; i--){
                        elem.css('opacity', op);
                        if(i <= 170){
                            if(op !== 1){
                                op = op + 0.1;
                            }
                            elem.css('left', i+'%');
                        }
                        await delay(1);
                    }
                }

                if(position === 'left'){
                    let op = 0;
                    elem.css('left', '-200%');
                    for(let i = 200;i>99; i--){
                        elem.css('opacity', op);
                        if(i <= 170){
                            if(op !== 1){
                                op = op + 0.1;
                            }
                            elem.css('right', i+'%');
                        }
                        await delay(1);
                    } await delay(1);
                    }
                }
            show_to();
            break;
        case 'hide':
            let hide_to = async() =>{
                if(position === 'right'){
                    for(let i = 0;i<50; i++){
                        elem.css('left', (Math.round(((parseFloat(elem.css('left')) / window.innerWidth) * 100))+i)+'%');
                        await delay(15);
                    }
                }

                if(position === 'left'){
                    for(let i = 0;i<50; i++){
                        elem.css('right', (Math.round(((parseFloat(elem.css('right')) / window.innerWidth) * 100))+i)+'%');
                        await delay(15);
                    }
                }
                elem.css('display', 'none');
            }
            hide_to();
            break;
    }
}

function minicard_new(){
    if(jQuery('#woonectio_minicart').length === 0){
        return;
    }

    let settings_array;
    let set_param = {
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
        body: {
            dowhat: 'get_load'
        },
        responseType: 'json'
    }

    core.ajax(set_param).then(data=>{
        settings_array = data.settings;

        let show_notify = async (msg, type) =>{
            jQuery('.woonectio_minicard_notifiactione').text(msg);
            switch(type){
                case 'error':
                    jQuery('.woonectio_minicard_notifiactione').css('background', 'red');
                    break;
                case 'success':
                    jQuery('.woonectio_minicard_notifiactione').css('background', 'green');
                    break;
                case 'message':
                    jQuery('.woonectio_minicard_notifiactione').css('background', 'skyblue');
                    break;
            }
            jQuery('.woonectio_minicard_notifiactione').slideToggle( "slow" )
            jQuery('.woonectio_minicard_notifiactione').css('display', 'block');
            await delay(parseInt(settings_array.show_notify_dp_time));
            jQuery('.woonectio_minicard_notifiactione').css('display', 'none');
            jQuery('.woonectio_minicard_notifiactione').text('');
        };

        let add_events_inside = () =>{
            jQuery('#open_minicart').on('click', ()=>{
                woonectio_setvisible('woonectio_minicart', settings_array.main_style_sidecart_openform, 'show');
                jQuery('#woonectio_minicard_boofier').show();
                jQuery('#open_minicart').hide('slow');
            });
            switch (settings_array.sidecartfooterstyle_buttonrow){
                case 'two_one':
                    for(let i = 0; i < jQuery('.woonectio-minicard-buttonwrapper').children().length; i++){
                        if(parseInt(jQuery(jQuery('.woonectio-minicard-buttonwrapper').children()[i]).css('order')) === 3){
                            jQuery(jQuery('.woonectio-minicard-buttonwrapper').children()[i]).css('width', '100%');
                        }
                        else{
                            jQuery(jQuery('.woonectio-minicard-buttonwrapper').children()[i]).css('flex-grow', '1');
                        }
                    }
                    break;
                case 'one_two':
                    for(let i = 0; i < jQuery('.woonectio-minicard-buttonwrapper').children().length; i++){
                        if(parseInt(jQuery(jQuery('.woonectio-minicard-buttonwrapper').children()[i]).css('order')) === 1){
                            jQuery(jQuery('.woonectio-minicard-buttonwrapper').children()[i]).css('width', '100%');
                        }
                        else{
                            jQuery(jQuery('.woonectio-minicard-buttonwrapper').children()[i]).css('flex-grow', '1');
                        }
                    }
                    break;
            }
            jQuery('#woonectio_minicart').off();
            jQuery('#woonectio_minicard_boofier').on('click', (e)=>{
                woonectio_setvisible('woonectio_minicart', settings_array.main_style_sidecart_openform, 'hide');
                jQuery('#woonectio_minicard_boofier').hide();
                jQuery('#open_minicart').show('slow');

            });

            jQuery(document.body).on('click', '#woonectio_minicart_iconclose, #woonectio_continue_shopping_btn', ()=>{
                jQuery('#open_minicart').show('slow');
                jQuery('#woonectio_minicard_boofier').hide();
                woonectio_setvisible('woonectio_minicart', settings_array.main_style_sidecart_openform, 'hide');
            });

            jQuery('.woonectio-minicard-bare-topwrapper-coupon').on('click', ()=>{
                jQuery('.basketicon, #woonectio_minicard_body, .woonectio_emptycard_message, .buttons, .woonectio-product-product-wrapper-global').hide();
                jQuery('#woonectio_minicard_promocodes').css('margin-left', settings_array.main_style_sidecart_width+'px');
                jQuery('#woonectio_minicard_promocodes').show();
                jQuery('#woonectio_minicard_promocodes').animate({marginLeft: '0'}, 300);
            });

            jQuery('#woonectio_cardsettings_back_usingpromo').on('click', ()=>{
                jQuery('#woonectio_minicard_promocodes').animate({marginLeft: settings_array.main_style_sidecart_width+'px'}, 300, ()=>{
                    jQuery('#woonectio_minicard_promocodes').hide();
                    jQuery('.basketicon, #woonectio_minicard_body, .woonectio_emptycard_message, .buttons, .woonectio-product-product-wrapper-global').show();
                    jQuery('#woonectio_minicard_promocodes').css('margin-left', '0');
                });
            });

            jQuery('#woonectio_coupon_code').on('submit', (e)=>{
                e.preventDefault();

                let add_coupon_params = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                    body: {
                        dowhat: 'add_coupon',
                        coupon_code: jQuery('#woonectio_couponecode').val()
                    },
                    responseType: 'json'
                }

                core.ajax(add_coupon_params).then(async data=>{
                    if(Object.keys(data)[0] !== 'error'){
                        card_ajax_update(data[Object.keys(data)[0]][0].notice, Object.keys(data)[0]);
                    }else{
                        show_notify(data[Object.keys(data)[0]][0].notice, Object.keys(data)[0]);
                    }
                });
            });

            jQuery('#woonectio_cardsettings_back_usingpromo').on('click', ()=>{
                jQuery('#woonectio_minicard_promocodes').hide();
                jQuery('.woonectio-product-product-wrapper-global').show();
                jQuery('.woonectio-minicard-bare-topwrapper-coupon').show();
            });

            jQuery('#woonectio_empty_card').on('click', ()=>{
                let empty_params = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                    body: {
                        dowhat: 'delete_all'
                    },
                    responseType: 'json'
                }

                core.ajax(empty_params).then(async data=>{
                    card_ajax_update('all product was deleted', 'message');
                });
            });


            jQuery(document.body).on('updated_cart_totals', function(){
                if(jQuery._data(jQuery("body")[0], "events").updated_cart_totals.length < 1){
                    if(parseInt(settings_array.ajax_add_to_card) === 1){
                        card_ajax_update();
                    }

                    if(parseInt(settings_array.auto_open_cart) === 1){
                        if(jQuery('#woonectio_minicart').css('display') === 'none'){
                            jQuery('#woonectio_minicard_boofier').show();
                            jQuery('#open_minicart').show('slow');
                            woonectio_setvisible('woonectio_minicart', settings_array.main_style_sidecart_openform, 'show');
                            card_ajax_update();
                        }
                    }
                }
            });

            jQuery(document.body).off('added_to_cart').one('added_to_cart', async function(){
                if(parseInt(settings_array.ajax_add_to_card) === 1){
                    card_ajax_update('product was added', 'message');
                }

                if(jQuery('#woonectio_minicart').css('display') === 'none'){
                    jQuery('#woonectio_minicard_boofier').show();
                    jQuery('#open_minicart').show('slow');
                    woonectio_setvisible('woonectio_minicart', settings_array.main_style_sidecart_openform, 'show');
                }
            });

            jQuery('.woonectio_total_deleted_product').on('click', function(e){
                let pp_id = this.id.replace('product_', '');
                let varidd = jQuery('#'+this.id).attr('var_id') === undefined ? 'zero' : jQuery('#'+this.id).attr('var_id');
                let total_delete_product_params = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                    body: {
                        dowhat: 'total_product_delete',
                        id: pp_id,
                        var_id: varidd
                    },
                    responseType: 'json'
                }

                core.ajax(total_delete_product_params).then(async data=>{
                    card_ajax_update('product was deleted', 'message');
                });
            });

            let countclick_deleteitem = '';

            jQuery('.woonectio_deleteoneitem').on('click', async function(e){
                jQuery('#woonectio_input_and_product_qty_'+this.id.replace('woonectio_pp_update_', '')).val(parseInt(jQuery('#woonectio_input_and_product_qty_'+this.id.replace('woonectio_pp_update_', '')).val())-1);
                let id = 'id__' + this.id.replace('woonectio_pp_update_', '');
                let nom = 'nominal__' + parseInt(jQuery('#woonectio_input_and_product_qty_'+this.id.replace('woonectio_pp_update_', '')).val());
                let varid = 'varid__' + parseInt(jQuery('#'+this.id).attr('var_id') === undefined ? 'zero' : jQuery('#'+this.id).attr('var_id'));
                if(varid === 'varid__NaN'){
                    varid = 'varid__zero';
                }

                countclick_deleteitem += id + '___' + nom + '___' + varid + '^';
                if(this.running){
                    return;
                }
                this.running = true;
                await delay(parseInt(settings_array.qty_update_delay));
                let total_delete_product_params = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                    body: {
                        dowhat: 'delete_one_item',
                        arr_do: countclick_deleteitem
                    },
                    responseType: 'json'
                }

                core.ajax(total_delete_product_params).then(async data=>{
                    countclick_deleteitem = '';
                    card_ajax_update('product was updated', 'message');
                });
            });

            if(settings_array.basket_count === 'number'){
                jQuery('.woonectio_minicard_icon_count').text(data.items_count);
            }
            else{
                jQuery('.woonectio_minicard_icon_count').text(settings_array.quant);
            }

            jQuery('#woonectio_minicard_shortcode').html(settings_array.basket_basketicon);

            let countclick_additem = '';

            jQuery('.woonectio_addoneitem').on('click', async function(e){
                jQuery('#woonectio_input_and_product_qty_'+this.id.replace('woonectio_pp_update_', '')).val(parseInt(jQuery('#woonectio_input_and_product_qty_'+this.id.replace('woonectio_pp_update_', '')).val())+1);
                let id = 'id__' + this.id.replace('woonectio_pp_update_', '');
                let nom = 'nominal__' + parseInt(jQuery('#woonectio_input_and_product_qty_'+this.id.replace('woonectio_pp_update_', '')).val());
                let varid = 'varid__' + parseInt(jQuery('#'+this.id).attr('var_id') === undefined ? 'zero' : jQuery('#'+this.id).attr('var_id'));
                if(varid === 'varid__NaN'){
                    varid = 'varid__zero';
                }

                countclick_additem += id + '___' + nom + '___' + varid + '^';

                if(this.running){
                    return;
                }
                this.running = true;
                await delay(parseInt(settings_array.qty_update_delay));
                let total_delete_product_params = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                    body: {
                        dowhat: 'add_one_item',
                        arr_do: countclick_additem
                    },
                    responseType: 'json'
                }

                core.ajax(total_delete_product_params).then(async data=>{
                    countclick_additem = '';
                    card_ajax_update('product was updated', 'message');
                });
            });

            jQuery('.promocodes').css('padding-bottom', jQuery('.buttons').css('height'));
            //jQuery('.woonectio-product-product-wrapper-global').css('height', 'calc(100% - '+jQuery('.buttons').css('height')+')');

            if(jQuery('.slideshow-container').length !== 0){
                var slideIndex = 1;
                showSlides(slideIndex);

                function plusSlides(n) {
                    showSlides(slideIndex += n);
                }

                function currentSlide(n) {
                    showSlides(slideIndex = n);
                }

               function showSlides(n) {
                    var i;
                    var slides = document.getElementsByClassName("item");
                    if (n > slides.length) {
                        slideIndex = 1
                    }

                    if (n < 1) {
                        slideIndex = slides.length
                    }

                    for (i = 0; i < slides.length; i++) {
                        slides[i].style.display = "none";
                    }
                    slides[slideIndex-1].style.display = "flex";
                }

                jQuery('.woonectio_prev').on('click', ()=>{
                    let currentSlide = document.getElementsByClassName("item")[slideIndex-1];
                    jQuery('.mySlides').css('overflow', 'hidden');
                    jQuery(currentSlide).animate({paddingLeft: '+=300px'}, 600, ()=>{
                        jQuery('.mySlides').css('overflow', 'visible');
                        jQuery(currentSlide).css('padding-left', '0');
                        plusSlides(-1);
                    });
                });

                jQuery('.woonectio_next').on('click', ()=>{
                    let currentSlide = document.getElementsByClassName("item")[slideIndex-1];
                    jQuery('.mySlides').css('overflow', 'hidden');
                    jQuery(currentSlide).animate({paddingRight: '+=300px'}, 600, ()=>{
                        jQuery('.mySlides').css('overflow', 'visible');
                        jQuery(currentSlide).css('padding-right', '0');
                        plusSlides(1);
                    });
                });
            }

            jQuery('.woonectio_add_suggested_product').on('click', function(e){
                if(jQuery("#"+this.id).attr('link_to_varpp') !== ''){
                    location.href = jQuery("#"+this.id).attr('link_to_varpp');
                }
                else{
                    let total_delete_product_params = {
                        method: 'POST',
                        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                        body: {
                            dowhat: 'add_from_suggested',
                            id: this.id.replace('woonectio_id_for_suggested_', '')
                        },
                        responseType: 'json'
                    }

                    core.ajax(total_delete_product_params).then(async data=>{
                        card_ajax_update('suggested product was added', 'message');
                    });
                }
            });
        }

        let card_ajax_update = (text_msg, type) =>{
            if(jQuery('#woonectio_minicart').css('display') !== 'none'){
                jQuery('#woonectio_minicart_invisible').css('display', 'flex');
            }
            let update_params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                body: {
                    dowhat: 'get_load'
                },
                responseType: 'json'
            }

            core.ajax(update_params).then(data=>{
                jQuery('#woonectio_minicart').html(data.html);
                add_events_inside();
                jQuery('#woonectio_minicart_invisible').hide();
                show_notify(text_msg, type);
            });
        };

        let load_card = () =>{
            jQuery('#woonectio_minicart').html(data.html);
            add_events_inside();
            jQuery('#woonectio_minicard_icon_sh').on('click', ()=>{
                if(settings_array.woonectio_shortcode_onclik_icon === 'open'){
                    jQuery('#open_minicart').hide('slow');
                    jQuery('#woonectio_minicard_boofier').show();
                    woonectio_setvisible('woonectio_minicart', settings_array.main_style_sidecart_openform, 'show');
                }
                else{
                    let update_params = {
                        method: 'POST',
                        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
                        body: {
                            dowhat: 'get_cart_url'
                        },
                        responseType: 'json'
                    };

                    core.ajax(update_params).then(data=>{
                        window.location.href = data;
                    });
                }
            })

            jQuery('#open_minicart').show();
        };

        load_card();
    }).catch(data=>{
        console.log('error');
    })
}

function buy_now_variable_product(){
    let var_id = jQuery('input.variation_id').val();
    if(jQuery('a.buy-now').length !== 0){
        if(var_id !== undefined){
            let url_clear = jQuery('a.buy-now').attr('href');
            if(jQuery('td.value').find('select').val() === ''){
                jQuery('a.buy-now').on('click', (e)=>{
                    e.preventDefault();
                });
            }

            jQuery('form.variations_form').on('show_variation', function(event, data){
                if(jQuery('td.value').find('select').val() !== ''){
                    jQuery('a.buy-now').attr('href', url_clear+'&variation_id='+data.variation_id+'&'+jQuery('td.value').find('select').attr('name')+'='+jQuery('td.value').find('select').val());

                    jQuery('a.buy-now').on('click', (e)=>{
                        e.preventDefault();
                        window.location = jQuery('a.buy-now').attr('href');
                    });
                }
                else{
                    jQuery('a.buy-now').on('click', (e)=>{
                        e.preventDefault();
                    });
                }
            })
        }
    }
}

function ajax_atc(){
    let settings;
    let set_param = {
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/minicart.php',
        body: {
            dowhat: 'get_load'
        },
        responseType: 'json'
    }
    core.ajax(set_param).then(data=>{
        settings = data.settings;
        console.log(settings.ajax_add_to_cart_enabled);
        if(parseInt(settings.ajax_add_to_cart_enabled) === 1){
            (function (jQuery) {
                console.log('were in');
                jQuery(document).on('click', '.single_add_to_cart_button', function (e) {
                    e.preventDefault();

                    var jQuerythisbutton = jQuery(this),
                        jQueryform = jQuerythisbutton.closest('form.cart'),
                        id = jQuerythisbutton.val(),
                        product_qty = jQueryform.find('input[name=quantity]').val() || 1,
                        product_id = jQueryform.find('input[name=product_id]').val() || id,
                        variation_id = jQueryform.find('input[name=variation_id]').val() || 0;

                    varone = '';
                    vartwo = '';

                    if(jQuery('form.cart select').length !== 0){
                        varone = jQuery('form.cart select').attr('id');
                        vartwo = jQuery('form.cart select').val();
                    }

                    var data = {
                        product_id: product_id,
                        product_sku: '',
                        quantity: product_qty,
                        variation_id: variation_id,
                        var_one: varone,
                        var_two: vartwo
                    };

                    jQuery(document.body).trigger('adding_to_cart', [jQuerythisbutton, data]);

                    jQuery.ajax({
                        type: 'post',
                        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/ajax_atc.php',
                        data: data,
                        beforeSend: function (response) {
                            jQuerythisbutton.removeClass('added').addClass('loading');
                        },
                        complete: function (response) {
                            jQuerythisbutton.addClass('added').removeClass('loading');
                        },
                        success: function (response) {
                            if (response.error && response.product_url) {
                                window.location = response.product_url;
                                return;
                            } else {
                                jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, jQuerythisbutton]);
                            }
                        },
                    });

                    return false;
                });
            })(jQuery);
        }
    })
}

window.onload = () =>{

    buy_now_variable_product();
    ajax_atc();

    let update_params = {
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/addons/ajax_update_totals.php',
        body: {
            do_what: 'get_status'
        },
        responseType: 'json'
    };

    core.ajax(update_params).then(data=>{
        if(data){
            var timeout;

            jQuery( function( $ ) {
                $('.woocommerce').on('change', 'input.qty', function(){

                    if ( timeout !== undefined ) {
                        clearTimeout( timeout );
                    }

                    timeout = setTimeout(function() {
                        $("[name='update_cart']").trigger("click");
                    }, 1000 ); // 1 second delay, half a second (500) seems comfortable too

                });
            } );
        }
    });

    jQuery('#woonectio_minicard_icon_sh').hover( ()=>{
        jQuery('.woonectio_minicard_shortcode_products').css('display', 'flex');
    }, ()=>{
        jQuery('.woonectio_minicard_shortcode_products').css('display', 'none');
    } )
    let parametrs = {
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/plugins_managment.php',
        body: {
            action: 'get_active_plugins'
        },
        responseType: 'json'
    }
    core.ajax(parametrs).then(data=>{
        data.forEach(plugin=>{
            switch(plugin){
                case 'popup':
                    popup();
                    break;
                case 'sidecard':
                    stikcy_addcart_new()
                    break;
                case 'wooajax':
                    ajaxnotify();
                    break;
                case 'minicard':
                    minicard_new()
                    break;
            }
        })
    });
}