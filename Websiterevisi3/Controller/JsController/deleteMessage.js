const chatBlocks=document.getElementById("chat-block");
const xhr=new XMLHttpRequest();
chatBlocks.addEventListener("click",function(e){
    var name=e.target.textContent;
    if(name==userId){
        const targets=e.target.parentNode.parentNode;
        var parentMessage=e.target.closest("#personal-chat");
        const message=parentMessage.querySelector("#usersMsg").innerText;
        // console.log(targets);
        xhr.onload=function(){
            if(this.responseText==="true"){
                alert('Pesan berhasil dihapus');
                targets.remove();
            }
        }
        xhr.open("GET",`Controller/deleteMessage.php?del=${message}`);
        xhr.send();
    }else{
        console.log("false");
    }
});