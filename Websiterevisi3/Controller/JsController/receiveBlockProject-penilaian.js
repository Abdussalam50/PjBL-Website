const blockGroup=document.getElementById("blockGroup");
var urlCurr=window.location.href;
var UrlGet=new URLSearchParams(new URL(urlCurr).search);
const getBlock=UrlGet.get("stdClass");
const xhhr1=new XMLHttpRequest();
xhhr1.onload=function(){
    var data=this.responseText;
    if(data=="false"){
      let blockEmpty='<div class="container-fluid d-flex justify-content-center border border-danger p-4"><p class="text-danger text-center  m-0">Tidak ada data yang tersedia</p></div>';
      blockGroup.innerHTML+=blockEmpty;
    }
    else{
    const ParseData=JSON.parse(data);
    for(let i=0; i<ParseData.length;i++){
        let BlockProject;
        BlockProject=`<div class="col-sm-6 mb-3 mb-sm-0">
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">${ParseData[i]}</h5>
            <p class="card-text">Lakukan penilaian untuk ${ParseData[i]} </p>
              <div class="dropdown-center">
                  <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Pilih penilaian</button>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="Penilaian_proyek.php?grp=${encodeURIComponent(ParseData[i])}">Penilaian Proyek</a></li>
                      <li><a class="dropdown-item" href="Penilaian_presentasi.php?grp=${encodeURIComponent(ParseData[i])}">Penilaian Presentasi</a></li>
                      <li><a class='dropdown-item' href='Penilaian_Laporan.php?grp=${encodeURIComponent(ParseData[i])}'>Penilaian Laporan</a></li>

                    </ul>
              </div>
          </div>
        </div>
    </div>`;
    blockGroup.innerHTML+=BlockProject;
    }
    console.log(data);
  }
}
console.log(getBlock);
xhhr1.open("GET",`Controller/getProject.php?Projects=${getBlock}`);
xhhr1.send()