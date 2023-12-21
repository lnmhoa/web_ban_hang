const Openmore = document.querySelector('.header-more');
const Openmorebg =document.querySelector('.box-left-opendmmb');
const Openmoreboxdm =document.querySelector('.box-left');
var Div = $('div').width();
if(Div < 1023){
Openmore.addEventListener("click", (event) =>
{
    if(Openmoreboxdm.style.display=="none"){
        Openmorebg.style.display="block";
        Openmoreboxdm.style.display="block";
        Openmore.style.backgroundColor="black";
        Openmore.style.color="white";
        Openmorebg.style.color="black";
        openuseritem.style.display="none";
        OpenSearch1.style.display="none";
        OpenSearch2.style.display="none";
        Openseach.style.backgroundColor="whitesmoke";
        Openseach.style.color="black";
        openUser.style.backgroundColor="whitesmoke";
        openUser.style.color="black";
    }
    else {
        Openmorebg.style.display="none";
        openUser.style.color="black";
        Openmoreboxdm.style.display="none";
        Openmore.style.backgroundColor="whitesmoke";
        Openmore.style.color="black";
    }   
})

Openmoreboxdm.addEventListener("click", (event) =>
{
    event.stopPropagation();
})

Openmore.addEventListener("click", (event) =>
{
    event.stopPropagation();
})

body.addEventListener("click" , (event) =>
{
    Openmorebg.style.display="none";
    Openmoreboxdm.style.display="none";
    Openmore.style.backgroundColor="whitesmoke";
    Openmore.style.color="black";
})
}
