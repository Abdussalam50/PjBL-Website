const tableContainer=document.getElementById("table-container");
const dataSends=JSON.stringify({
    'class':ClassId
});

const tablePeerContainer=document.querySelector("#dropMenu");
const tablePeer=document.createElement("table");
async function getNilai(){
    const response=await fetch("Controller/getNilaiKelompok.php",{
        method:"POST",
        headers:{
            'Content-Type':'application/json'
        },
        body:dataSends
    });
    const data=await response.json();
    const table=document.createElement("table");
    tableContainer.appendChild(table);
    table.setAttribute("class","table table-bordered ");
    
    tablePeerContainer.appendChild(tablePeer);
    tablePeer.setAttribute("class","table table-bordered");

    let tableBody=`
    <thead>
    <tr>
      <th rowspan="2">No</th>
      <th rowspan="2">Nama Kelompok</th>
      <th colspan="4">Nilai Kelompok</th>
    </tr>
    <tr>
      <td>Penilaian Proyek</td>
      <td>Penilaian Laporan</td>
      <td>Penilaian Presentasi</td>
      <td>Penilaian Produk</td>
    </tr>
    </thead> 
    <tbody>`
    ;

    const projectData=data.projectScore;
    const laporanData=data.scoreLaporan;
    const presentationData=data.presentationScore;
    const productData=data.productScore;
    const peerData=data.peerAssessmentScore;
    for(i=0;i<projectData.length;i++){

        tableBody+=
        `<tr>
            <td>${i+1}</td>
            <td>${projectData[i].NameGroup}</td>
            <td>${projectData[i]?Math.floor((projectData[i].Score/27)*100):0}</td>
            <td>${laporanData[i]? laporanData[i].SCORE:0}</td>
            <td>${presentationData[i]? presentationData[i].Score:0}</td>
            <td>${productData[i]? ((
                productData[i].Score/(12*data.lengthGroup))*3>=1.00&&(productData[i].Score/(12*data.lengthGroup))*3<1.60?'D':
                (productData[i].Score/(12*data.lengthGroup))*3>=1.61&&(productData[i].Score/(12*data.lengthGroup))*3<2.20?'C':
                (productData[i].Score/(12*data.lengthGroup))*3>=2.21&& (productData[i].Score/(12*data.lengthGroup))*3<2.80?'B':
                'A'):0}</td>  
        </tr>`
        tableBody+=`</tbody>`;
        table.innerHTML=tableBody;
    }
    
    let containerPeer=`<thead>
<tr>
    <th>Nama</th>
    <th>Kelas</th>
    <th>Nilai</th>
</tr>
</thead>
<tbody>`
for(i=0;i<peerData.length;i++){
containerPeer+=`
    <tr>    
        <td>${peerData[i].Teman}</td>
        <td>${peerData[i].Kelas}</td>
        <td>${peerData[i].Score}</td>
    </tr>`;
}

containerPeer+=`</tbody>`;
tablePeer.innerHTML=containerPeer;
console.log(data);
}

getNilai();


