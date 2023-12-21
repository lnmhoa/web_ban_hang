$(document).ready(function(){
    $('.js-opendm').click(function(){
        $(this).next('.box-left-dm-name-lv2').slideToggle();
        $(this).toggleClass("fa-plus");
        $(this).toggleClass("fa-minus");
    })
});

var Div = $('div').width();
if(Div < 1023){
const Opendmtlmb = document.querySelector('.js-opendm-tl__mb');
const Opendmtlmb1 = document.querySelector('.box-left-dm-name');
const Opendmtlmb2 = document.querySelector('.more-dm-tl__mb');
Opendmtlmb.addEventListener('click', function(){
    if(Opendmtlmb1.style.display=="none"){
        Opendmtlmb1.style.display="block";
        Opendmtlmb2.classList.add("fa-angle-down");
        Opendmtlmb2.classList.remove("fa-angle-right");
        Openkntlmb1.style.display="none";
        Openktlmb1.style.display="none";
        Openkntlmb2.classList.remove("fa-angle-down");
        Openkntlmb2.classList.add("fa-angle-right");
        Openktlmb2.classList.remove("fa-angle-down");
        Openktlmb2.classList.add("fa-angle-right");
    }else{
        Opendmtlmb1.style.display="none";
        Opendmtlmb2.classList.remove("fa-angle-down");
        Opendmtlmb2.classList.add("fa-angle-right");
    }
})

const Openkntlmb = document.querySelector('.js-openkn-tl__mb');
const Openkntlmb1 = document.querySelector('.box-left-kn-title-open-tl__mb');
const Openkntlmb2 = document.querySelector('.more-kn-tl__mb');

Openkntlmb.addEventListener('click', function(){
    if(Openkntlmb1.style.display=="none"){
        Openkntlmb1.style.display="block";
        Openkntlmb2.classList.add("fa-angle-down");
        Openkntlmb2.classList.remove("fa-angle-right");
        Opendmtlmb1.style.display="none";
        Openktlmb1.style.display="none";
        Opendmtlmb2.classList.remove("fa-angle-down");
        Opendmtlmb2.classList.add("fa-angle-right");
        Openktlmb2.classList.remove("fa-angle-down");
        Openktlmb2.classList.add("fa-angle-right");
    }else{
        Openkntlmb1.style.display="none";
        Openkntlmb2.classList.remove("fa-angle-down");
        Openkntlmb2.classList.add("fa-angle-right");
    }
})

const Openktlmb = document.querySelector('.js-openk-tl__mb');
const Openktlmb1 = document.querySelector('.box-left-k-title-open-tl__mb');
const Openktlmb2 = document.querySelector('.more-k-tl__mb');

Openktlmb.addEventListener('click', function(){
    if(Openktlmb1.style.display=="none"){
        Openktlmb1.style.display="block";
        Openktlmb2.classList.add("fa-angle-down");
        Openktlmb2.classList.remove("fa-angle-right");
        Opendmtlmb1.style.display="none";
        Openkntlmb1.style.display="none";
        Openkntlmb2.classList.remove("fa-angle-down");
        Openkntlmb2.classList.add("fa-angle-right");
        Opendmtlmb2.classList.remove("fa-angle-down");
        Opendmtlmb2.classList.add("fa-angle-right");
    }else{
        Openktlmb1.style.display="none";
        Openktlmb2.classList.remove("fa-angle-down");
        Openktlmb2.classList.add("fa-angle-right");
    }
})
}


