const openuseritem =document.querySelector('.open-user-menu');
const closeUser = document.querySelector('.js-close-user');
const body = document.getElementById('web');
const openUser = document.querySelector('.header-order-icon-user');
var Div = $('div').width();
if(Div < 1023){
openUser.addEventListener("click", (event) =>
{
    if(openuseritem.style.display=="none"){
        openuseritem.style.display="block";
        openuseritem.style.color="black";
        openUser.style.backgroundColor="black";
        openUser.style.color="white";
        Openmoreboxdm.style.display="none";
        Openmore.style.backgroundColor="whitesmoke";
        Openmore.style.color="black";
        Openmorebg.style.display="none";
        OpenSearch1.style.display="none";
        OpenSearch2.style.display="none";
        Openseach.style.backgroundColor="whitesmoke";
        Openseach.style.color="black";
    }
    else {
        openuseritem.style.display="none";
        openUser.style.color="black"
        openUser.style.backgroundColor="whitesmoke";
        openUser.style.color="black";
    }   
})

body.addEventListener("click" , (event) =>
{
    openuseritem.style.display="none";
    openUser.style.color="black";
    openUser.style.backgroundColor="whitesmoke";
})

closeUser.addEventListener("click", (event) =>
{
    event.stopPropagation();
})

body.addEventListener("click" , (event) =>
{
    openuseritem.style.display="none";
    openUser.style.color="black";
    openUser.style.backgroundColor="whitesmoke";
})}

