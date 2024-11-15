const sideButton=document.querySelector("#side-button");
const groupList=document.querySelector("#group-list");
const chatBlock=document.querySelector("#chat-block");
sideButton.addEventListener("click",move);
function move(){
    groupList.classList.toggle("up");
    groupList.classList.toggle("down");
   if(groupList.classList.contains("up")){
    groupList.style.transform="translateY(-300px)";
    groupList.style.display="none";
    sideButton.innerHTML="<i class='bi bi-arrow-down-circle-fill'></i>"; 
   }else{
    sideButton.innerHTML="<i class='bi bi-arrow-up-circle-fill'></i>";
    groupList.style.display="block";
    groupList.style.transform="translateY(0px)";
   }
}

