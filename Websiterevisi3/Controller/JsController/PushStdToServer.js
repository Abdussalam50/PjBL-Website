const bodyTable = document.querySelector("tbody");
function toLocale() {
    const elementBody = bodyTable.querySelectorAll("tr");
    const data = [];

    for (let i = 0; i < elementBody.length; i++) {
        const cells = elementBody[i].getElementsByTagName("td");
        const rowData = [];

        for (let j = 0; j < cells.length; j++) {
            const dataCells = cells[j].innerText;
            rowData.push(dataCells);
        }
        data.push(rowData);
       
    }

    localStorage.setItem("tableData", JSON.stringify(data));
}

window.onload = function () {
    const savedData = localStorage.getItem("tableData");
    console.log(savedData);
    if (savedData) {
        const parsedData = JSON.parse(savedData);
        const table = document.querySelector("tbody");

        for (let i = 0; i < parsedData.length; i++) {
            const row = table.insertRow(table.rows.length);

            for (let j = 0; j < parsedData[i].length; j++) {
                const newCell = row.insertCell();
                newCell.innerText = parsedData[i][j];
            }
        }
        
    }
    
    const newRow = bodyTable.getElementsByTagName("tr");
    const datas = [];
    for (let i = 0; i < newRow.length; i++) {
        const cells = newRow[i].getElementsByTagName("td");
        const cellData = [];

        for (let j = 0; j < cells.length; j++) {
            cellData.push(cells[j].innerText);
        }
        datas.push(cellData);

    }
    

    if(datas.length>=2){

    const dataToSend = encodeURIComponent(JSON.stringify({
        'studentData':datas,
        'class':classUname
    }));
    console.log(dataToSend);
    const xhttp=new XMLHttpRequest();
    xhttp.onload = function () {
        const responseData = this.responseText;
        console.log(responseData);
      };
    xhttp.open("GET", `Controller/sendDataTable.php?dataGroup=${
        dataToSend}`, true);
    xhttp.send();
    localStorage.setItem("ajaxExecuted","true");
    console.log(datas);
    }else{
        alert("Kelompok yang dibentuk kurang");
    }
    
    
    const insertAttribute=bodyTable.getElementsByTagName("tr");

    for(let i =0;i<insertAttribute.length;i++){
    insertAttribute[i].setAttribute("data-row-id","#modalDelete");
    insertAttribute[i].setAttribute("data-bs-toggle","modal");
    insertAttribute[i].setAttribute("data-bs-target","#modalDelete");
    insertAttribute[i].setAttribute("onclick",`modalDelete(this)`);
    insertAttribute[i].setAttribute("value",`${i}`);
    }


}

let attribute;
let element;
function modalDelete(m){
    element=m;
    attribute=m.getAttribute("value");

    document.getElementById("modalDelete").style.display="block";
    console.log(m);
   
}

function del(){
   
    const localStorages=localStorage.getItem("tableData");
    const parsingData=JSON.parse(localStorages);
    
    const dataToDelete= parsingData.splice(attribute,1);
    if(dataToDelete,true){
    const xhttp=new XMLHttpRequest();
    const delData=encodeURIComponent(JSON.stringify(dataToDelete));
    xhttp.open("POST", "Controller/DeleteData.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(`del=${delData}`);
    xhttp.onload=function(){
        if(this.status==200){
            console.log(this.responseText);
            localStorage.setItem("tableData", JSON.stringify(parsingData));
            localStorage.setItem("ajaxExecuted",JSON.stringify(parsingData));
            element.parentElement.removeChild(element);
        
        }
    }
   
    }
}

console.log(localStorage.getItem("ajaxExecuted"));

    

