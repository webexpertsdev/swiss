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

function popup_main(){
    let params = {
        method: 'POST',
        url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/templates/popup_main.php',
        body: {
            is_start: true
        },
        responseType: 'json'
    }

    core.ajax(params).then(data=>{
        let count_retry = 0;
        function show(){
            setTimeout(async ()=>{
                console.log('ok');
                let params_modal = {
                    method: 'POST',
                    url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/templates/popup_main.php',
                    body: {
                        is_start: false,
                        elem: count_retry
                    },
                    responseType: 'json'
                }

                core.ajax(params_modal).then(data=>{
                    console.log(data);

                    let notify = '<div class="woonectio_popup">\n' +
                        '    <div class="popup_image">'+data.item_image+
                    '<div class="star">&#9733;</div>\n' +
                        '    </div><p class="popup_text"><b>'+data.first_name+' '+data.last_name+'</b> buy a\n' +
                        '        <br>\n' +
                        '        <b>'+data.item_name+'</b>\n' +
                        '    </p>\n' +
                        '    <span class="popup_close">&#88;</span>\n' +
                        '</div>';

                    document.body.innerHTML = document.body.innerHTML + notify;
                }).catch(data=>{
                    console.log(data);
                })
                await sleep(parseInt(data.delay_notify)*1000);
                document.getElementsByClassName('woonectio_popup')[0].remove();
                count_retry++;
                if(count_retry < data.count){
                    show();
                }
            }, parseInt(data.delay_between_two)*1000);
        }
        show();
    }).catch(data=>{
        alert('error');
    })
}

window.onload = () =>{
    popup_main();
}