const xhttp=new XMLHttpRequest();
const tbody=document.querySelector("tbody");
console.log(tbody);
 xhttp.onload=function(){
    let k=1;
    var response=this.responseText;
    console.log(response);
    if(response==0){
        alert('tidak ada data');
    }else{

const Parsing=JSON.parse(response);
let arrays=[];
    Parsing.forEach(function(dt){
       var namaProyek= dt.namaProyek;
       var namaKelompok=dt.namaKelompok;
       var Laporan=dt.laporan;
       var Lpran=Laporan.replace("Controller/FileLaporan/","");
       var element=document.createElement("a");
     
       element.setAttribute("class","btn btn-sm  btn-primary");
       element.setAttribute("onclick","deleteLaporan(event)");
       element.setAttribute("value",`${Laporan}`);
       element.setAttribute("type","submit");
       element.setAttribute("name",`${namaKelompok}`);
       element.setAttribute("id","editButton");
       element.innerText="Edit Laporan";
       const datas=[k++,namaProyek,namaKelompok,Lpran,element];
       const row=tbody.insertRow(tbody.rows.length);
       for(let i=0; i<datas.length;i++){
        
            let cells=row.insertCell();
                if(i==datas.length-1){
                    arrays.push(namaKelompok);
                  
                    cells.appendChild(datas[i]);
                    
                }else{
                    cells.innerText=datas[i];
                }

     }
     
     
    });
    const cookies=document.cookie;
    var cookie=cookies.split(";");
    var rowCookie=cookie[1];
    var newRowCookie=rowCookie.replace("grpName=","");
    var cookieraw=newRowCookie.replace("%20","");
    const newRow=cookieraw.replace(" ","");
    const displayButton=document.querySelectorAll("#editButton");
    displayButton.forEach(function(button){
    var bool=newRow===button.getAttribute("name")?true:false;
        if(bool){
            button.style.display="block";
        }else{
            button.style.display="none";
        }
    })
}
 }

xhttp.open("GET",`Controller/receiveLaporan.php?CLass=${classes}`);
xhttp.send();
