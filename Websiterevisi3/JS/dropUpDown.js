const button=document.getElementById("buttonList");
const listKelas=document.getElementById("containerClass");
const icons=document.getElementById("icons");
button.addEventListener("click",upAndDown);
function upAndDown(){
    if(listKelas.classList.toggle("d-none")){
        icons.setAttribute("class","bi bi-arrow-down-circle-fill fs-3")
    }else{
        icons.setAttribute("class","bi bi-arrow-up-circle-fill fs-3")
    };
    
}