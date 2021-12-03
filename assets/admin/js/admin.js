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