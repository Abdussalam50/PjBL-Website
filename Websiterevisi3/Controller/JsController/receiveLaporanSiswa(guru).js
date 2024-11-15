const url =window.location.href;
let urlParams=new URLSearchParams(window.location.search);
const value=urlParams.get('kelas');
const listLaporan=document.getElementById("listLaporan");
console.log(value);
const xhtp=new XMLHttpRequest();
xhtp.onload=function(){
    console.log(this.responseText);

    if(this.responseText==0){
        listLaporan.innerHTML=`<div class="container-lg"><h2 class="fs-2 fs-5">Laporan Siswa</h2></div><div class='container-lg d-flex justify-content-center text-danger border border-danger p-4 '> Silahkan pilih kelas di menu Daftar kelas</div>`;
    }else{
        var data=this.responseText;
        var Parsing=JSON.parse(data);
        Parsing.forEach(function(dt){
            var namaProyek=dt.namaProyek;
            var namaKelompok=dt.namaKelompok;
            var laporan=dt.laporan;
            var part=laporan.split('/');
            var fileName=part[part.length - 1];
            var time=dt.time;

            let contents;
            contents=
            `
            <a id="list-item-pj" href="Controller/DownloadLaporan.php?downLaporan=${namaProyek}" class="list-group-item list-group-item-action">
              <div class="d-flex w-100 justify-content-between">
                <h5 class="mb-1">${namaProyek}</h5>
                <small>${time}</small>
              </div>
              <p class="mb-1">${namaKelompok}</p>
              <small>Unduh Laporan ${fileName}</small>
            </a>
            `;
            listLaporan.innerHTML+=contents;
        });
    }
}
xhtp.open("GET",`Controller/receiveLaporan.php?CLass=${value}`)
xhtp.send();