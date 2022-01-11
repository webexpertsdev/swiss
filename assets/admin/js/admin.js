'use strict'

let instance_core = new window.Core();

window.onload = () => {
    let params = {
        method: 'GET',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/templates/admin/test.php',
        body: null,
        responseType: 'document'
    }

    instance_core.ajax(params).then(data=>{
        document.getElementById('to').innerHTML = data.getElementById('from').innerHTML;
    }).catch(data=>{
        document.getElementById('to').innerHTML = data.innerHTML;
    });
}

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
                            values[one.className] = one.options[one.selectedIndex].text;
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
                            default:
                                document.getElementsByClassName(f_id+"-"+key)[0].value = data[key];
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

window.onload = () => {
    ajax_load();
    auto_form_loader();
}
