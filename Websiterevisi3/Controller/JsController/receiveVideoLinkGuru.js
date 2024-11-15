const xhr=new XMLHttpRequest();
var valHref=window.location.href;

var searchParam=new URLSearchParams(new URL (valHref).search);
const val=searchParam.get("data");
const listLink=document.getElementById("listLink");
xhr.onload=function(){
    var dataResponse=this.responseText;
    console.log(dataResponse);
if(val){
    if(this.responseText==null || this.responseText=="false"){
        let containerEmpty='<div class="container-lg border border-danger d-flex justify-content-center"><p class="text-center text-danger">Data not found</p></div>';
        listLink.innerHTML+=containerEmpty;
    }else{
    const ParsingData=JSON.parse(dataResponse);
    ParsingData.forEach(function(data){
        var nameProject= data.nameProject;
        var namaKelompok=data.namaKelompok;
        var time=data.waktu;
        var link=data.link;
        let containerLink;
        containerLink= `
    <a id="list-item-pj" href='Presentasi-guru.php?Link=${link}' class="list-group-item list-group-item-action">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">${nameProject}</h5>
          <small>${time}</small>
        </div>
        <p class="mb-1">${namaKelompok}</p>
        <small>Tonton Presentasi</small>
    </a>`;
    listLink.innerHTML+=containerLink
    });
    }
}else{
    let emptyContainer='<div class="container-fluid border border-danger d-flex justify-content-center"><p class="text-danger m-0">Silahkan Pilih kelas di daftar kelas</p></div>';
    listLink.innerHTML+=emptyContainer;
}
}

xhr.open("GET",`Controller/receiveVideoLink.php?getClass=${val}`);
xhr.send();