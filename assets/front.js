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
                    if(parseInt(data.hide_close_button) === 0){
                        close_button = '<span class="popup_close">&#88;</span>';
                    }
                    let notify = '<div class="woonectio_popup">\n' +
                        '    <div class="popup_image">'+data.item_image+
                        '<div class="star">&#9733;</div>\n' +
                        '    </div><p class="popup_text"><b>'+data.first_name+' '+data.last_name+'</b> buy a\n' +
                        '        <br>\n' +
                        '        <b>'+data.item_name+'</b>\n' +
                        '    </p>\n' + close_button
                        +
                        '</div>';

                    document.body.innerHTML = document.body.innerHTML + notify;
                    document.getElementsByClassName('popup_close')[0].addEventListener('click', event =>{
                        document.getElementsByClassName('woonectio_popup')[0].remove();
                        return;
                    });
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

function sidecard(){
    let form = document.getElementById('sideform');
    form.addEventListener('submit', event=>{
        event.preventDefault();
        let params = {
            method: 'POST',
            url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/sidecard.php',
            body: {
                id: document.getElementById('cardid').value,
                count: document.getElementById('points').value
            },
            responseType: 'json'
        }

        core.ajax(params).then(data=>{
            location.reload();
        }).catch(data=>{
            console.log('error front.js 131');
        });
    })
}

window.onload = () =>{
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
                    sidecard();
                    break;
                default:
                    if(document.getElementById('sidecard_apnel') !== null){
                        document.getElementById('sidecard_apnel').remove();
                    }
            }
        })
    });
}