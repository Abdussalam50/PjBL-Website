const xhttp=new XMLHttpRequest();
const video=document.getElementById("video");
const container=document.getElementById("container-video");
xhttp.onload=function(){
    var data=this.responseText;
    if(data==0){
        let innerContent;
        innerContent=``;
    }else{
        const Parsing=JSON.parse(data);
        console.log(Parsing);
        Parsing.forEach(function(datas){
        const projectName=datas.projectName;
        const namaKelompok=datas.namaKelompok;
        const kelas=datas.kelas;
        const link=datas.link;
        const times=datas.time;
        //create element
        let containerContent;
        containerContent=
        `   <div class="container-lg d-flex py-2">
                <div class="container-fluid">
                    <a href='Presentasi.php?Link=${link}' class="fs-5 fw-bold my-0">Video Project ${projectName}(${kelas}_${namaKelompok})</a>
                    <p class="fs-6 py-0 my-0">${times}</p>
                </div>
            </div>`;
        container.innerHTML+=containerContent;

        });
        

    }

}

xhttp.open("GET","Controller/ReceivePresentasi.php?dataVideo=''",true);
xhttp.send();