const blockResponse=document.getElementById('blockResponse');
fetch('Controller/getResponseNotification.php',{
    method:'POST',
})
.then(response=>{
   if(response.ok){
    return response.json();
   }
   
})
.then(data=>{
    console.log(data.username)
    
    if(data.username.length==0 && data.response.length==0 && data.date.length==0){
        let elseResponse=
        `<div class="container-fluid border border-warning rounded p-4">
            <p class="text-center text-warning fs-5"> Tidak ada notifikasi yang tersedia</p>
        </div>`;
        blockResponse.innerHTML+=elseResponse;
    }else{
    data.username.forEach(function(username,index){
        var response=data.response[index];
        var date=data.date[index];
        
        let containerResponse=
        `<a href="#" class="list-group-item list-group-item-action" aria-current="true" id="block-notif" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1"> <i class="bi bi-exclamation-square-fill"></i> Respon guru anda</h5>
          <small>${date}</small>
        </div>
        <div class="d-flex align-items-center">
        <div class="flex-grow-1">
          <p class="mb-1">${username}</p>
          <small>${response}</small>
        </div>
        <div>
          <button class="btn btn-danger" type="button" id="hapus" onclick='deleteResponse(this)' value='${response}'>Hapus</button>
        </div>
      </div>
      </a>`;
    if(username==user){
        console.log(true);
        return "";
    }else{
        blockResponse.innerHTML+=containerResponse;
        console.log(false);
    }


    });

}})
.catch(error=>{
    console.error(error);
})

function deleteResponse(e){
    var value=JSON.stringify(e.getAttribute("value"));
    const xhrDeleteRequest=new XMLHttpRequest();
    xhrDeleteRequest.onload=function(){
       
        if(this.responseText=="true"){
       
            e.parentNode.parentNode.parentNode.remove();
        
        }else{
            alert("false");
        }
    }
    xhrDeleteRequest.open("POST","Controller/deleteNotificationReference.php");
    xhrDeleteRequest.setRequestHeader("Content-Type","application/json");
    xhrDeleteRequest.send(value);
}