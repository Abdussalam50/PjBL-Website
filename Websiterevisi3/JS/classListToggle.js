const ListClass=document.getElementById("class-list");
const btnContent1=document.getElementById("btn-content");
const iconContent1=document.getElementById("iconContent");
btnContent1.addEventListener("click",function(){
   if(ListClass.classList.toggle("d-none")){
        iconContent1.setAttribute("class","bi bi-arrow-down-circle-fill")
   }else{
    iconContent1.setAttribute("class","bi bi-arrow-up-circle-fill")
   };
})