const xhtp= new XMLHttpRequest();
const rowClass=document.getElementById("ListLink");
xhtp.onload=function(){
    var data=this.responseText;
    var Parsing=JSON.parse(data);
    Parsing.forEach(function(dtClass){
        let containerList;
        containerList=`<div class=" d-flex " id="ListLink"><a href="inputLinkPrs(guru).php?class=${dtClass}" class=" fw-bold fs-5 text-start ps-3" style="width:100%"> <i class="bi bi-people-fill fs-4"></i> Kelas ${dtClass}</a></div>`;
        rowClass.innerHTML=containerList;
    });
}

xhtp.open("GET",`Controller/receiveClassForZoom.php?userGuru=${userId}`);
xhtp.send();