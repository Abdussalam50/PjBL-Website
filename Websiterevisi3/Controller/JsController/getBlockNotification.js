const listgroup=document.getElementById("list-group");

fetch('Controller/getNotificationMessage.php',{
    method:'POST',
    headers:{
        'Content-Type':'application/json'
    },
    body:typeof(TeacherClass)=='undefined'?studentClass:TeacherClass,

})
.then(response=>{
    return response.json();
})
.then(data=>{
  console.log(data);
if(data.name.length==0 && data.date.length==0 && data.message.length==0){
    let elseResponse=
        `<div class="container-fluid border border-warning rounded p-4">
            <p class="text-center text-warning fs-5"> Tidak ada notifikasi yang tersedia</p>
        </div>`;
    listgroup.innerHTML+=elseResponse;
}else{
    data.name.forEach((name,index)=>{
        var message=data.message[index];
        var date=data.date[index];
        let containerNotif;
            containerNotif=
            `<a href="#" class="list-group-item list-group-item-action" aria-current="true" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"> <i class="bi bi-chat-left-dots-fill"></i> Pesan Baru</h5>
              <small>${date}</small>
            </div>
            <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <p class="mb-1">${name}</p>
              <small>${message}</small>
            </div>
            <div>
              <button class="btn btn-danger" type="button" onclick="hapus(this)" value="${message}">Hapus</button>
            </div>
          </div>
          </a>`;
          if(name==user){
            console.log(true);
            return "";
          }else{
          listgroup.innerHTML+=containerNotif;
          console.log(false);
        }
    });

}
   
})
.catch(error=>console.error(error));

function hapus(e){
    var message=JSON.stringify(e.getAttribute("value"));
   console.log(message);
    const xhrDeleteNotifMessage=new XMLHttpRequest();
    xhrDeleteNotifMessage.onload=function(){
        if(xhrDeleteNotifMessage.status==200){
          
            if(this.responseText=="s"){
                e.parentNode.parentNode.parentNode.remove();
            }else{
                console.log("False");
            }

        }else{
            console.error("Error:", xhrDeleteNotifMessage.status, xhrDeleteNotifMessage.statusText);
        }
    }
    
    xhrDeleteNotifMessage.open("POST","Controller/deleteNotification.php");
    xhrDeleteNotifMessage.setRequestHeader("Content-Type","application/json");
    xhrDeleteNotifMessage.send(message);
}