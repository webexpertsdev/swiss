'use strict'

if(document.getElementById('register_id') === null){
    let instance_core = new window.Core();

    function ajax_load(){
        let btns = document.querySelectorAll('menu_button');
        btns.forEach(btn => {
            btn.addEventListener('click', event => {
                let id = event.target.id;
                const setting_url = '/wp-content/plugins/woonectio/templates/admin/' + id + '.php';
                const target_url = '/wp-content/plugins/woonectio/templates/admin/pages/' + id + '.php';
                const url_to_ajax = id != 'settings' ? target_url : setting_url;
                let params = {
                    method: 'GET',
                    url: window.location.protocol + "//" + window.location.host + url_to_ajax,
                    body: null,
                    responseType: 'document'
                }

                instance_core.ajax(params).then(data=>{
                    document.getElementById('wrapper_woo').innerHTML = data.getElementById('wrapper_woo').innerHTML;
                    setTimeout(()=>{ajax_load();},0);
                    setTimeout(()=>{form_submit();},0);
                    setTimeout(()=>{auto_form_loader();},0);
                    setTimeout(()=>{getLicenseData();},0);
                }).catch(data=>{
                    document.getElementById('container').innerHTML = data.innerHTML;
                });
            });
        });
    }

    function form_submit(){
        if(window.location.search === '?page=woonectio'){
            let form = document.querySelectorAll('form');
            form.forEach(form_one => {
                form_one.addEventListener('submit', event => {
                    event.preventDefault();

                    let params = {
                        method: 'POST',
                        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/form_submitter.php',
                        body: {
                            form_id: event.target.id
                        },
                        responseType: 'json'
                    }

                    let inputValues = document.querySelectorAll('input, textarea, select');
                    let values = {};
                    inputValues.forEach(one => {
                        switch(one.type){
                            case 'radio':
                                if(one.checked){
                                    values[one.className] = one.value;
                                }
                                break;
                            case 'checkbox':
                                values[one.className] = one.checked;
                                break;
                            case 'select-one':
                                if(one.value.indexOf('____') > 0){
                                    values[one.className] = one.value.replace('____', '');
                                }
                                else{
                                    values[one.className] = one.value;
                                }
                                break;
                            case 'url':
                                values[one.className] = one.value.replaceAll('?', '@@@').replaceAll('=', '<<<').replaceAll('&', '>>>');
                                break;
                            default:
                                values[one.className] = one.value;
                                break;
                        }
                    });
                    params.body = values;

                    instance_core.ajax(params).then(data=>{
                        if(data){
                            document.getElementById('success').setAttribute('style', 'display: flex');
                            setTimeout(()=>{document.getElementById('success').setAttribute('style', 'display: none');}, 1500);
                        }
                    }).catch(data=>{
                        document.getElementById('error').setAttribute('style', 'display: flex');
                        setTimeout(()=>{document.getElementById('error').setAttribute('style', 'display: none');}, 1500);
                    });
                });
            });
        }
    }

    function auto_form_loader(){
        if(window.location.search === '?page=woonectio' && document.querySelectorAll('form').length !== 0) {
            let form = document.querySelectorAll('form');
            form.forEach(form_one => {
                let f_id = form_one.id;
                let params = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/form_loader.php',
                    body: {
                        form_id: form_one.id
                    },
                    responseType: 'json'
                }

                let inputValues = document.querySelectorAll('input, textarea, select');
                let values = {};
                inputValues.forEach(one => {
                    values[one.className] = one.value;
                });
                params.body = values;

                instance_core.ajax(params).then(data=>{
                    if(Object(data).length !== 0){
                        let key_array = Object.keys(data);
                        key_array.forEach(key => {
                            switch(document.getElementsByClassName(f_id+"-"+key)[0].type){
                                case 'checkbox':
                                    if(parseInt(data[key]) === 1){
                                        document.getElementsByClassName(f_id+"-"+key)[0].checked = true;
                                    }
                                    else{
                                        document.getElementsByClassName(f_id+"-"+key)[0].checked = false;
                                    }
                                    break;
                                case 'radio':
                                    let radio = document.getElementsByClassName(f_id+"-"+key);
                                    for(let i = 0; i<radio.length; i++){
                                        if(radio[i].value === data[key]){
                                            radio[i].checked = true;
                                        }
                                    }
                                    break;
                                case 'textarea':
                                    let inp = data[key]
                                    if(inp === null){
                                        inp = '';
                                    }
                                    inp = inp.replaceAll('_', ' ')
                                    document.getElementsByClassName(f_id+"-"+key)[0].value = inp;
                                    break;
                                default:
                                    let inp2 = data[key]
                                    if(inp2 === null){
                                        inp2 = '';
                                    }
                                    inp2 = inp2.replaceAll('_', ' ');
                                    document.getElementsByClassName(f_id+"-"+key)[0].value = inp2;
                                    break;
                            }
                        });
                    }
                }).catch(data=>{
                    alert('error');
                });
            });
        }
    }

    function getLicenseData(){
        if(window.location.search === '?page=woonectio' && document.getElementById('license') !== null){
            let params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/license_data.php',
                body: {
                    alilicense: true
                },
                responseType: 'json'
            }

            instance_core.ajax(params).then(data=>{
                if(data['success']){
                    document.getElementById('loader-wrapper').style.display = 'none';
                    let data_div = '<br>\n' +
                        '            <div class="license_manager">\n' +
                        '                <p>Plan name: <b>'+data["product_name"]+'</b></p>\n' +
                        '                <p>License status: <b>'+data["license_status"]+'</b></p>\n' +
                        '                <p>Expire date: <b>'+data["expire_date"].split(' ')[0]+'</b></p>\n' +
                        '                <p>Owner name: <b>'+data["customer_name"]+'</b></p>\n' +
                        '                <p>Owner email: <b>'+data["customer_email"]+'</b></p>\n' +
                        '                <p>License limit: <b>'+data["license_limit"]+'</b></p>\n' +
                        '                <p>Activations left: <b>'+data["activations_left"]+'</b></p>\n' +
                        '                <br>\n' +
                        '                <p>also you can <a id="activate_change" href="">change activation code</a></p>\n' +
                        '            </div>';
                    if(document.querySelector('#content-box').getElementsByClassName('license_manager').length > 0){
                        document.querySelector('#content-box').getElementsByClassName('license_manager')[0].remove();
                        document.querySelector('#content-box').innerHTML = document.querySelector('#content-box').innerHTML + data_div;
                    }else{
                        document.querySelector('#content-box').innerHTML = document.querySelector('#content-box').innerHTML + data_div;
                    }

                    document.getElementById('activate_change').addEventListener('click', event=>{
                        let action = {
                            method: 'POST',
                            url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/license_managment.php',
                            body: {
                                action: 'clear_license'
                            },
                            responseType: 'json'
                        };

                        instance_core.ajax(action).then(data=>{
                            if(data['success']){
                                location.reload();
                            }
                        }).catch(data=>{
                            console.log('error into front.js line 188');
                        })
                    })
                }
                else{
                    document.getElementById('loader-wrapper').style.display = 'none';
                    document.querySelector('#content-box').innerHTML = document.querySelector('#content-box').innerHTML + '<div class="license_manager">Unable to loading data</div>';
                }
            }).catch(data=>{
                document.getElementById('loader-wrapper').style.display = 'none';
                document.querySelector('#content-box').innerHTML = document.querySelector('#content-box').innerHTML + '<div class="license_manager">Unable to loading data</div>';
            });
        }
    }

    function salesNotify_styleForm(){
        let handler_change = () =>{
            jQuery('.woonectio_popup').css('font-size', jQuery('.woonectio_popup_settings-font_size_desktop').val()+'px');
            jQuery('.woonectio_popup').css('background-color', jQuery('.woonectio_popup_settings-background_color').val());
            jQuery('.woonectio_popup').css('color', jQuery('.woonectio_popup_settings-text_color').val());

            switch(jQuery('.woonectio_popup_settings-position').val()){
                case 'right':
                    jQuery('.woonectio_popup').css('top', '70%');
                    jQuery('.woonectio_popup').css('left', '95%');
                    jQuery('.woonectio_popup').css('transform', 'translate(-95%, 70%)');
                    break;
                case 'left':
                    jQuery('.woonectio_popup').css('top', '70%');
                    jQuery('.woonectio_popup').css('left', '5%');
                    jQuery('.woonectio_popup').css('transform', 'translate(-5%, 70%)');
                    break;
            }
        }
        jQuery('body').on('click', '#popup_styles', ()=>{
            setTimeout(()=>{
                handler_change();
                jQuery('input').on('change', ()=>{
                    handler_change();
                });
                jQuery('select').on('change', ()=>{
                    handler_change();
                });
            },100)
        })
    }

    window.onload = () => {
        ajax_load();
        auto_form_loader();
        form_submit();
        salesNotify_styleForm();
    }
}
