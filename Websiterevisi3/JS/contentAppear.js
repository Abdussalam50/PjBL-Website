const idClass=document.getElementById("content-class");
const buttonSide=document.getElementById("buttonSide");
const icon=document.getElementById("arrow");
buttonSide.addEventListener("click",function(){
    if(idClass.classList.toggle("d-none")){
    icon.setAttribute("class","bi bi-arrow-down-circle-fill");
}else{
    icon.setAttribute("class","bi bi-arrow-up-circle-fill");
}
});