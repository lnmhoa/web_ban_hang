var hotendh = document.querySelector('#hotendh');
var phonedh = document.querySelector('#phonedh');
var diachidh = document.querySelector('#diachidh');
let errorhotendh = document.querySelector('.errorhotendh');
let errorphonedh = document.querySelector('.errorphonedh');
let errordiachidh = document.querySelector('.errordiachidh');
var reg =  /^(0[23456789][0-9]{8}|1[89]00[0-9]{4})$/;

function checkhotendh(){
    if(hotendh.value.trim() != ""){
        errorhotendh.innerText = "";
        return true;
    }else{
        errorhotendh.innerText = "Vui lòng nhập họ tên";
        hotendh.focus();
        return false;
    }
}

function checkdiachidh(){
    if(diachidh.value.trim() != ""){
        errordiachidh.innerText = "";
        return true;
    }else{
        errordiachidh.innerText = "Vui lòng nhập địa chỉ nhận hàng";
        diachidh.focus();
        return false;
    }
}

function checkphonedh(){
    if(phonedh.value.trim() != ""){
        if (reg.test(phonedh.value)){ 
            errorphonedh.innerText = "";
            return true;
        }else{
            errorphonedh.innerText = "Vui lòng nhập đúng số điện thoại";
            phonedh.focus();
            return false;
        }
    }else{ 
        errorphonedh.innerText = "Vui lòng nhập số điện thoại";
        phonedh.focus();
        return false;
    }
}

function checksubmitttdh(){
    if(checkhotendh(true) && checkdiachidh(true) && checkphonedh(true)){
        return true;
    }else{
        return false;
    }
}

function checkttdh(){
    checkhotendh();
    checkdiachidh();
    checkphonedh();
}