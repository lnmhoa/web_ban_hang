const openadd = document.querySelector('.open-add-admin');
const clickadds = document.querySelectorAll('.js-open-add');
const boxadd = document.querySelector('.box-add');
const closeAddIcons = document.querySelectorAll('.close-add-icon');

for(const clickadd of clickadds){
    clickadd.addEventListener('click',openadd1);
}
for(const closeAddIcon of closeAddIcons){
    closeAddIcon.addEventListener('click',closeadd1);
}
openadd.addEventListener('click',closeadd1);
boxadd.addEventListener('click',function(event){
    event.stopPropagation();
})

function openadd1(){
    openadd.classList.add('open');
}

function closeadd1(){
    openadd.classList.remove('open');
}

