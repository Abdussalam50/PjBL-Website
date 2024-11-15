const xhttp= new XMLHttpRequest();
var url=window.location.href;
var urlParams=new URLSearchParams( new URL(url).search);
const valParam=urlParams.get("prjName");

xhttp.onload=function(){
    const dataReceive=this.responseText;
    console.log(dataReceive);
if(valParam){
    if(dataReceive!==""){    
    const dataParse=JSON.parse(dataReceive);
    const container=document.getElementById("container");
    const menuPrj=document.getElementById("contain-list");
    console.log(dataParse[0].reference)
    for(let i=0;i<dataParse.length;i++){
        const desc=dataParse[i].description;
        const ref=dataParse[i].reference;
        const Status=dataParse[i].status;
        if(Status=="true"){
       container.innerHTML+=` <div id='list-document' class='container-fluid p-3' style='--bs-height:75px'>
       <i class='bi bi-file-earmark-medical-fill text-muted'><a href='' class=' btn lead text-muted'>${ref}</a> <i class="bi bi-check-square-fill text-success"> Diterima</i></i> 
       <p class="border-bottom border-bottom-secondary">Informasi referensi ini untuk proyek yang dikerjakan adalah:</p> <p class="text-lead text-danger">${desc}</p>
       </div>`;
        }else if(Status=="false"){
            container.innerHTML+=` <div id='list-document' class='container-fluid p-3' style='--bs-height:75px'>
            <i class='bi bi-file-earmark-medical-fill text-muted'><a href='' class=' btn lead text-muted' id='ref'>${ref}</a></i> <i class="bi bi-ban-fill text-danger">Ditolak</i>
            <div class='container-fluid d-flex align-items-center'><p class="border-bottom border-bottom-secondary flex-grow-1">Informasi referensi ini untuk proyek yang dikerjakan adalah: </p> <button class='btn btn-dark btn-sm' onclick="deleteReference(this)">Hapus</button></div>
            <p class="text-lead text-danger">${desc}</p>
            </div>`;
        }else if(Status==""){
            container.innerHTML+=` <div id='list-document' class='container-fluid p-3' style='--bs-height:75px'>
            <i class='bi bi-file-earmark-medical-fill text-muted'><a href='' class=' btn lead text-muted'>${ref}</a></i>
            <i class="bi bi-clock-history">Menunggu respon guru anda</i>
            <p class="border-bottom border-bottom-secondary">Informasi referensi ini untuk proyek yang dikerjakan adalah:</p> <p class="text-lead text-danger">${desc}</p>
            </div>`;
        }

    }
    }else{
        let emptyProject='<p class="text-secondary fw-bold">Anda belum mengumpulkan referensi</p>';
        container.innerHTML+=emptyProject;
    }
    }else{
        let emptyContainer='<p class="text-secondary fw-bold">Silahkan pilih proyek yang anda kerjakan</p>';
        container.innerHTML+=emptyContainer;
    }
    
}

xhttp.open("GET",`Controller/ReceiveReference.php?prjName=${valParam}`);
xhttp.send();

function deleteReference(e){
    const containerReference=e.closest("#list-document");
    const reference=containerReference.querySelector("#ref").textContent;
    const xhttpDelete= new XMLHttpRequest();
    xhttpDelete.onload=function(){
        console.log(this.responseText);
    }

    xhttpDelete.open("POST","Controller/deleteReference.php");
    xhttpDelete.setRequestHeader("Content-Type","application/json");
    xhttpDelete.send(JSON.stringify({reference:reference}));
    window.location.reload();
}