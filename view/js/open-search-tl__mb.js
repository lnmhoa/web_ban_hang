const Openseach = document.querySelector('.header-search-icon');
const OpenSearch1 =document.querySelector('.header-search-1');
const OpenSearch2 =document.querySelector('.header-search-2');
var Div = $('div').width();
if(Div < 1023){
Openseach.addEventListener("click", (event) =>
{
    if(OpenSearch1.style.display=="none"){
        Openmorebg.style.display="block";
        OpenSearch1.style.display="block";
        OpenSearch2.style.display="block";
        Openseach.style.backgroundColor="black";
        Openseach.style.color="white";
        Openmorebg.style.color="black";
        openuseritem.style.display="none";
        Openmoreboxdm.style.display="none";
        Openmore.style.backgroundColor="whitesmoke";
        Openmore.style.color="black";
        openUser.style.backgroundColor="whitesmoke";
        openUser.style.color="black";
    }
    else {
        Openmorebg.style.display="none";
        openUser.style.color="black";
        Openseach.style.backgroundColor="whitesmoke";
        Openseach.style.color="black";
        OpenSearch1.style.display="none";
        OpenSearch2.style.display="none";
    }   
})

OpenSearch1.addEventListener("click", (event) =>
{
    event.stopPropagation();
})

OpenSearch2.addEventListener("click", (event) =>
{
    event.stopPropagation();
})

Openseach.addEventListener("click", (event) =>
{
    event.stopPropagation();
})

body.addEventListener("click" , (event) =>
{
    Openmorebg.style.display="none";
    Openseach.style.backgroundColor="whitesmoke";
    Openseach.style.color="black";
    OpenSearch1.style.display="none";
    OpenSearch2.style.display="none";
})
}
