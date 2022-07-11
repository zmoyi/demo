import QRCode from 'qrcode';
import axios from 'axios';

const LOGIN_SUCCESSFUL = 2001;
const LOGIN_INFO = 2002;
const LOGIN_ERROR = 2003;
const LOGIN_WARNING = 2004;

console.log(url)
QRCode.toDataURL(url).then(url => {
    console.log(url)
    document.getElementById('canvas').src = url;
}).catch(err => {
    console.log(err);
})

setInterval(function () {
    call_function();
}, 1000);
const urls = 'http://demo.x.com/Qr';
function call_function() {
    axios.post(urls, {
        token : get_token
    }).then(
        function (response) {
            if (response.data.code === LOGIN_SUCCESSFUL){
                document.getElementById('hint').innerText = response.data.message+'3秒后跳转';
                    window.location.href = response.data.url;
            }else if (response.data.code === LOGIN_INFO){
                document.getElementById('hint').innerText = response.data.message;
            }else if (response.data.code === LOGIN_WARNING){
                document.getElementById('hint').innerText = response.data.message;
            }else if (response.data.code === LOGIN_ERROR){
                document.getElementById('hint').innerText = response.data.message;
            }
        }).then(function (err) {
        console.log(err)
    })
}





