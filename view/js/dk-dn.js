$(document).ready(function(){
    $('#eye').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye fa-eye-slash');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});

$(document).ready(function(){
    $('#eye2').click(function(){
        $(this).toggleClass('open');
        $(this).children('i').toggleClass('fa-eye fa-eye-slash');
        if($(this).hasClass('open')){
            $(this).prev().attr('type', 'text');
        }else{
            $(this).prev().attr('type', 'password');
        }
    });
});

// var username = document.querySelector('#username');
var email = document.querySelector('#email');
var phonenumber = document.querySelector('#phonenumber');
var password = document.querySelector('#password');
var password2 = document.querySelector('#password2');
// let errorusername = document.querySelector('.errorusername');
let erroremail = document.querySelector('.erroremail');
let errorphone = document.querySelector('.errorphone');
let errorpassword = document.querySelector('.errorpassword');
let errorpassword2 = document.querySelector('.errorpassword2');
var reg =  /^(0[23456789][0-9]{8}|1[89]00[0-9]{4})$/;
var red = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 

function checkemail(){
    if(email.value.trim() != ""){
        if (red.test(email.value)){ 
            erroremail.innerText = "";
            email.classList.remove("errorcolor");
            email.classList.add("successcolor");
            return true;
        }else{
            erroremail.innerText = "Vui lòng nhập đúng email";
            email.classList.add("errorcolor");
            email.focus();
            return false;
        }
    }else{
        erroremail.innerText = "Vui lòng nhập email";
        email.classList.add("errorcolor");
        email.focus();
        return false;
    }
}

// function checkusername(){
//     if ((username.value.trim() !="") ){
//         if(username.value.trim().length < 5){
//             errorusername.innerText = "Vui lòng nhập tên đăng nhập trên 5 ký tự ( không tính khoảng trống)";
//             username.classList.add("errorcolor");
//             username.focus();
//             return false;
//         }else{
//             errorusername.innerText ="";
//             username.classList.remove("errorcolor");
//             username.classList.add("successcolor");
//             return true;
//         }
//     } else {
//         errorusername.innerText ="Vui lòng nhập tên đăng nhập";
//         username.classList.add("errorcolor");
//         username.focus();
//         return false;
//     }
// }


function checkphone(){
    if(phonenumber.value.trim() != ""){
        if (reg.test(phonenumber.value)){ 
            errorphone.innerText = "";
            phonenumber.classList.remove("errorcolor");
            phonenumber.classList.add("successcolor");
            return true;
        }else{
            errorphone.innerText = "Vui lòng nhập đúng số điện thoại";
            phonenumber.classList.add("errorcolor");
            phonenumber.focus();
            return false;
        }
    }else{ 
        errorphone.innerText = "Vui lòng nhập số điện thoại";
        phonenumber.classList.add("errorcolor");
        phonenumber.focus();
        return false;
    }
}

function checkpassword(){
    if (password.value.trim() != ""){
        if((password.value.trim().length < 6) || (password.value.trim().length > 18)){
            errorpassword.innerText = "Vui lòng nhập mật khẩu từ 6 đến 18 ký tự ( không tính khoảng trống)";
            password.classList.add("errorcolor");
            password.focus();
            return false;
        }else{
            errorpassword.innerText ="";
            password.classList.remove("errorcolor");
            password.classList.add("successcolor");
            return true;
        }
    } else {
        errorpassword.innerText ="Vui lòng nhập mật khẩu";
        password.classList.add("errorcolor");
        password.focus();
        return false;
    }
}

function checkpassword2(){
    if (password2.value!=""){
        if((password.value != password2.value)){
            errorpassword2.innerText = "Mật khẩu xác nhận không trùng khớp";
            password2.classList.add("errorcolor");
            password2.focus();
            return false;
        }else{
            password2.classList.remove("errorcolor");
            password2.classList.add("successcolor");
            errorpassword2.innerText = "";
            return true;
        }
    } else {
        errorpassword2.innerText = "Vui lòng nhập xác nhận mật khẩu";
        password2.classList.add("errorcolor");
        password2.focus();
        return false;
    }
}

function checksubmit(){
    if(checkphone(true) &&  checkpassword(true) && checkpassword2(true)){
        return true;
    }
    else{
        return false;
    }
}

function checkclicksubmit(){
    checkphone();
    checkpassword();
    checkpassword2();
}

function checksubmittdtt(){
    if(checkphone(true) &&  checkpassword(true) && checkemail(true)){
        return true;
    }
    else{
        return false;
    }
}

function checkclicksubmittdtt(){
    checkphone();
    checkpassword();
    checkemail();
}

function checksubmitquenmk(){
    if(checkphone(true) && checkemail(true) && checkpassword(true) && checkpassword2(true)){
        return true;
    }
    else{
        return false;
    }
}

function checkclicksubmitquenmk(){
    checkphone();
    checkemail();
    checkpassword();
    checkpassword2();
}

function checksubmitdn(){
    if(checkphone(true) &&  checkpassword(true)){
        return true;
    }
    else{
        return false;
    }
}

function checkclicksubmitdn(){
    checkphone();
    checkpassword();
}







