const xhr=new XMLHttpRequest();
const containerPrj=document.getElementById("contain-list");
xhr.onload=function(){
    var data=this.responseText;
    if(data==="null"){
        alert("No Data");
    }else{
       
        const Parsings=JSON.parse(data);
        console.log(Parsings);
        Parsings.forEach(function(Prj){
            let containerHTML;
            containerHTML= `<div class='col ps-3 py-0 py-sm-1' id='dProject'><p class='m-0 py-1'><a href="Perpustakaan(siswa).php?prjName=${Prj}" class='text-lead fw-bold fs-5' style='width:100%'>${Prj}</a></p></div>`;
            containerPrj.innerHTML=containerHTML;
        });
    }
}

xhr.open("GET",`Controller/receiveProjectList.php?data=${userId}`);
xhr.send();