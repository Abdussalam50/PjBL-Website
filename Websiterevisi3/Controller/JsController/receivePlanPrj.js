const xhttp = new XMLHttpRequest();
const table = document.querySelector("tbody");
const containerTable=document.getElementById("container-table");
xhttp.onload = function () {
    if(this.responseText=="false"){
        alert("empty");
        let containerEmpty=`<div class="container-fluid d-flex justify-content-center border border-danger"><p class="text-danger text-center m-0 p-4 fs-5">Tidak ada data yang tersedia</p></div>`;
        containerTable.innerHTML+=containerEmpty;
    }else{
    const dataParse = JSON.parse(this.responseText);
    
    let m =1;
    dataParse.forEach(function (datas) {
        const groupName = datas.group;
        const prjName = datas.prjName;
        const clas = datas.class;
        const planFile = datas.files;
        const empty="";
        const linkFiles=document.createElement("a");
        linkFiles.innerText=planFile;
        console.log(linkFiles);
        linkFiles.setAttribute("href","Controller/DownloadFilePlaning.php?file=Controller/filePlanning/"+planFile);
        const arrData = [m++, prjName, groupName, clas,empty];

        const newRow = table.insertRow(table.rows.length);

        for (let i = 0; i < arrData.length; i++) {
            let cell = newRow.insertCell();
            cell.innerText = arrData[i];
            console.log(cell);
            if (i === 4) {
                cell.appendChild(linkFiles);
            } else {
                cell.textContent = arrData[i];
            }

            if(i==0 || i==3){
                cell.classList.add("class","d-none");
                cell.classList.add("class","d-sm-block")
            }


        
        }
        console.log(newRow);
    
    });
console.log(this.responseText);
    }
    
};

xhttp.open("GET", `Controller/receivePlanningDta.php?receiveData=${userClass}`);
xhttp.send();
