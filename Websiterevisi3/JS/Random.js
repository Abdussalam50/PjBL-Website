function dataSend(){
    const prjName=document.getElementById("prjName").value;
    const groupName=document.getElementById("grpName").value;
    const clas=document.getElementById("clas").value;
    const group=document.getElementById("group").value;
    const table=document.getElementById("table").getElementsByTagName("tbody")[0];

    var newRow=table.insertRow(table.rows.length);
    var cell1=newRow.insertCell(0);
    var cell2=newRow.insertCell(1);
    var cell3=newRow.insertCell(2);
    var cell4=newRow.insertCell(3);
    cell1.innerHTML=prjName;
    cell2.innerHTML=groupName;
    cell3.innerHTML=clas;
    cell4.innerHTML=group;

    document.getElementById("prjName").value='';
    document.getElementById("grpName").value='';
    document.getElementById("clas").value='';
    document.getElementById("group").value='';
}

function token(){
    var tokenChar="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    let tokenString='';
    for(i=0;i<8;i++){
        var randomCharToken=Math.floor(Math.random()*tokenChar.length);
        tokenString+=tokenChar.charAt(randomCharToken);
    }
    var insertValue=document.getElementById("group");
    insertValue.value=tokenString;
    }

