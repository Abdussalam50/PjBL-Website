const xhttp3p=new XMLHttpRequest();
const node3 = document.getElementById("node");
const liPoints = node3.querySelectorAll("li");
const laporan=document.getElementById("laporan");
const report=document.getElementById("report");
xhttp3p.onload=function(){
    console.log(this.responseText);
    if(this.readyState===4&&this.status===200){
        if(this.responseText=="acc"){
            console.log("acc");
            if(window.innerWidth<600){
                node3.style.display="none";
                laporan.style.borderBottom="5px solid #198754";
            }else{
                node3.style="position:absolute; top:170%; right:5%; height:1590px;display:flex; flex-direction:column; justify-content:space-between";
                liPoints[3].style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
            }
        }else if(this.responseText=="denied"){
            
            if(window.innerWidth<600){
                node3.style.display="none";
                laporan.style.borderBottom="5px solid #dc3545";
                report.setAttribute("type","button");
                report.addEventListener("click",()=>{
                    alert('Fitur laporan proyek belum dapat diakses hingga semua kelompok telah menyelesaikan tugas di menu timeline');
                })
            }else{
                node3.style="position:absolute; top:170%; right:5%; height:1590px;display:flex; flex-direction:column; justify-content:space-between";
                liPoints[3].style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red";
                report.setAttribute("type","button");
                report.addEventListener("click",()=>{
                    alert('Fitur laporan proyek belum dapat diakses hingga semua kelompok telah menyelesaikan tugas di menu timeline');
                })
            }
        }
    }
}

xhttp3p.open("POST","Controller/getPoint3.php");
xhttp3p.setRequestHeader("Content-Type","application/json");
xhttp3p.send(JSON.stringify({kelas:userClass}));
