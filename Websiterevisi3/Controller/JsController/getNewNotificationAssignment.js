const responseAss=document.getElementById("blockResponseAss");
fetch('Controller/getNotificationAssignment.php',{
    method:'POST',
    headers:{
        'Content-Type':'application/json'
    },
    body:TeacherClass
    
})
.then(response=>{
    return response.json()
})
.then(data=>{

    if(data.group.length==0 && data.projectName.length==0 && data.link.length==0){
        let elseResponse=
            `<div class="container-fluid border border-warning rounded p-4">
                <p class="text-center text-warning fs-5"> Tidak ada notifikasi yang tersedia</p>
            </div>`;
        responseAss.innerHTML+=elseResponse;
    }else{
        data.group.forEach((value,index)=>{
            var projectName=data.projectName[index];
            var link=data.link[index];
            let containerAssignment;
            containerAssignment=
            `<a href="${link}" class="list-group-item list-group-item-action" aria-current="true" onmouseover="mouseOver(this)" onmouseout="mouseOut(this)">
            <div class="d-flex w-100 justify-content-between">
              <h5 class="mb-1"> <i class="bi bi-chat-left-dots-fill"></i> Tugas Timeline Siswa ${value}</h5>
            </div>
            <div class="d-flex align-items-center">
            <div class="flex-grow-1">
              <p class="mb-1">${projectName}</p>
            </div>
            <div>
              <button class="btn btn-danger" type="button" onclick="hapusAss(this)">Hapus</button>
            </div>
          </div>
          </a>`;
          responseAss.innerHTML+=containerAssignment;
        });

    }
})
.catch(error=>console.error(error));

function hapusAss(e){
    e.parentNode.parentNode.remove();
}