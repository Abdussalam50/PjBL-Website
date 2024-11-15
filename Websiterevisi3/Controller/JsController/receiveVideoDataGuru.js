const Xhhr= new XMLHttpRequest();
const containerVid=document.getElementById("container-video");
Xhhr.onload=function(){
    var data=this.responseText;
    const parser=JSON.parse(data);
    parser.forEach(function(response){
        const nameProject=response.projectName;
        const nameGroup=response.namaKelompok;
        const classname=response.kelas;
        const times=response.time;
        const link=response.link;
        let containerVideo;
        containerVideo=`<div class="container-lg d-flex py-2">
        <div class="container-fluid">
            <a href='Presentasi-guru.php?Link=${link}' class="fs-5 fw-bold my-0">Video Project ${nameProject}(${classname}_${nameGroup})</a>
            <p class="fs-6 py-0 my-0">${times}</p>
        </div>
    </div>`;
    containerVid.innerHTML+=containerVideo;
    })
}
Xhhr.open("GET","Controller/ReceivePresentasi.php?dataVideo=''");
Xhhr.send();