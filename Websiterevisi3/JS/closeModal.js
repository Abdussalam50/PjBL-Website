const closeButton=document.getElementById("close");
const modals=document.getElementById("modals");
closeButton.addEventListener("click",closeModal);
function closeModal(){
    modals.style.display='none';
}