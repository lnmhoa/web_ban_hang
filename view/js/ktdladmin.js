var username = document.querySelector('#username');
var role = document.querySelector('#role');
var phonenumber = document.querySelector('#phonenumber');
var password = document.querySelector('#password');
var password2 = document.querySelector('#password2');
let errorusername = document.querySelector('.errorusername');
let errorrole = document.querySelector('.errorrole');
let errorphone = document.querySelector('.errorphone');
let errorpassword = document.querySelector('.errorpassword');
let errorpassword2 = document.querySelector('.errorpassword2');
var reg =  /^(0[23456789][0-9]{8}|1[89]00[0-9]{4})$/;
var form = document.querySelector('form');
var Empty = document.querySelector('#empty');
let errorIsEmpty = document.querySelector('.empty');
 
function IsEmpty(){
    if ((Empty.value.trim() !="") ){
            errorIsEmpty.innerText ="";
            return true;
    } else {
        errorIsEmpty.innerText ="Vui lòng nhập dữ liệu";
        Empty.focus();
        return false;
    }
}

// function checkrole(){
//     if ((role.value.trim() !="") ){
//         if(role.value == 0 || role.value == 1){
//             errorrole.innerText ="";
//             return true;
//         }
//         else{
//             errorrole.innerText ="Vui lòng nhập giá trị 0 hoặc 1";
//             role.focus();
//             return false;
//         }
//     } else {
//         errorrole.innerText ="Vui lòng nhập dữ liệu";
//         role.focus();
//         return false;
//     }
// }



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

function checksubmittk(){
    if(checkpassword(true) && checkphone(true) && checkpassword2(true)){
        return true;
    }
    else{
        return false;
    }
}

function checktk(){
    checkphone();
    checkpassword();
    checkpassword2();
}

function checksubmitupdatetk(){
    if(checkpassword(true)){
        return true;
    }
    else{
        return false;
    }
}


function checkclickupdatetk(){
    checkpassword();
}

function checkdm(){
    IsEmpty();
}

function checksubmitdm(){
    if(IsEmpty(true)){
        return true; 
    }else{
        return false;
    }
}

var price = document.querySelector('#price');
let errorprice = document.querySelector('.price');
var pricesale = document.querySelector('#pricesale');
let errorpricesale = document.querySelector('.pricesale');


function checkprice(){
    if (price.value.trim() != ""){
        if((price.value.trim().length < 4) || (price.value.trim().length > 18)){
            errorprice.innerText = "Vui lòng nhập giá trong khoảng từ 1000 VNĐ đến 999.999.999 VNĐ";
            price.focus();
            return false;
        }else{
            errorprice.innerText ="";
            return true;
        }
    } else {
        errorprice.innerText ="Vui lòng nhập giá";
        price.focus();
        return false;
    }
}

// function checkpricesale(){
//     if ((pricesale.value.trim() != "")){
//         if(pricesale.value.trim().length > 2 ){
//             errorpricesale.innerText = "Vui lòng nhập giá giảm trong khoảng từ 0 đến 99";
//             pricesale.focus();
//             return false;
//         }else{
//             errorpricesale.innerText ="";
//             return true;
//         }
//     }else {
//         errorpricesale.innerText ="Vui lòng nhập giá giảm (nếu không giảm vui lòng ghi số 0)";
//         pricesale.focus();
//         return false;
//     }
// }

function checksubmitsp(){
    if(IsEmpty(true) && (checkprice(true))){
        return true;
    }
    else{
        return false;
    }
}

function checksp(){
    IsEmpty();
    checkprice();
}









