<div style="margin: 50px; display: flex; flex-wrap: wrap; justify-content: center; align-items: center; flex-direction: column">
    <div style="display: flex; flex-wrap: wrap; flex-direction: column" id="form_block">
        <h1>Activate your license code</h1>
        <br><br>
        <div id="info" style="padding: 15px; margin: 10px; color: white; display: none"></div>
        <form id="register_id" style="display: flex; flex-wrap: wrap; flex-direction: column">
            <input type="text" placeholder="your license code here" name="license" id="key" style="margin-bottom: 10px">
            <button type="submit">Activate!</button>
        </form>
    </div>

    <div id="loader-wrapper" style="display: none;>
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<script>
    window.onload = () => {
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

        document.getElementById('register_id').addEventListener('submit', event=>{
            event.preventDefault();

            let params = {
                method: 'POST',
                url: window.location.protocol + "//" + window.location.host + '/wp-content/plugins/woonectio/license_managment.php',
                body: {
                    action: 'check',
                    key: document.getElementById('key').value
                },
                responseType: 'json'
            };
            document.getElementById('form_block').style.display = 'none';
            document.getElementById('loader-wrapper').style.display = 'flex';
            ajax(params).then(data=>{
                if(data['success']){
                    location.reload();
                }else{
                    document.getElementById('info').innerHTML = '';
                    document.getElementById('info').innerHTML += data['error'];
                    document.getElementById('info').style.background = 'darkred';
                    document.getElementById('form_block').style.display = 'flex';
                    document.getElementById('info').style.display = 'flex';
                }
            }).catch(data=>{
                console.log('error register.php');
            })
        })
    }
</script>