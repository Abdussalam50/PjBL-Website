const classRow=document.getElementById("rowClass");
const buttonContent=document.getElementById("btn-content");
const iconContent=document.getElementById("iconContent");
buttonContent.addEventListener("click",function(){
 
    if(classRow.classList.toggle("d-none")){
        iconContent.setAttribute("class","bi bi-arrow-down-circle-fill")
    }else{
        iconContent.setAttribute("class","bi bi-arrow-up-circle-fill")
    }
})