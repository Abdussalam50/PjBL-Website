const containerClass=document.getElementById("container-class");
const hideMenu=document.getElementById("hide-menu");
const idicon=document.getElementById("icon");
hideMenu.addEventListener('click',function(){
    if(containerClass.classList.toggle("d-none")){
        idicon.setAttribute("class","bi bi-arrow-down-circle-fill");
    }else{
        idicon.setAttribute("class","bi bi-arrow-up-circle-fill");
    };
})