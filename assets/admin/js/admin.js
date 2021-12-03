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
                document.getElementById('container').innerHTML = data.getElementById('container').innerHTML;
                setTimeout(()=>{ajax_load();},0)
            }).catch(data=>{
                document.getElementById('container').innerHTML = data.innerHTML;
            });
        });
    });
}
window.onload = () => {
    ajax_load();
}