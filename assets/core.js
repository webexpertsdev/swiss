'use strict'

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

document.onload = () => {
    let params = {
        method: 'GET',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/templates/admin/test.php',
        body: null,
        responseType: 'document'
    }

    core.ajax(params).then(data=>{
        document.getElementById('to').innerHTML = data.getElementById('from').innerHTML;
    }).catch(data=>{
        document.getElementById('to').innerHTML = data.innerHTML;
    });
}