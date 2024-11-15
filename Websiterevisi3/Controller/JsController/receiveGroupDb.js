const xht3p=new XMLHttpRequest();
const groupLi=document.getElementById("group-list");

xht3p.onload=function(){
    const table=document.querySelector("tbody");
    const getData=this.responseText;
    console.log(getData);
    if(getData.length>0){
    const JsonParse=JSON.parse(getData);
    JsonParse.forEach((entry)=>{
        const row=table.insertRow(table.rows.length);
        Object.values(entry).forEach(value=>{
            const newCell=row.insertCell();
            newCell.innerText=value;
        });
    })
    }else{
        let emptyContainer='<div class="container-fluid border border-danger rounded d-flex jsutify-content-center"><p class="text-danger fw-bold m-0">Tidak ada data yang tersedia</p></div>';
        groupLi.innerHTML+=emptyContainer;
    }
   
}

xht3p.open("GET",`Controller/receiveGroupFromDb.php?getGroups=${classuser}`,true);
xht3p.send();