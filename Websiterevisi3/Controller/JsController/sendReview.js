const subButton=document.getElementById("thisData");
var urlCurrent=window.location.href;
const paramsUrl=new URLSearchParams(new URL(urlCurrent).search);

subButton.addEventListener("click",function(){
const Row=document.querySelectorAll("#tbody tr ");
const group=paramsUrl.get("groupScoring");

const rowVal=[];

Row.forEach(function(row){
    const valInput=row.querySelectorAll("td input");
    const dataVal={
        Nama:userName,
        Kelompok:group,
        valuator:groupAxis,
        ResponTeman:valInput[0].value,
        LevelRespon:valInput[1].value,
        Komentar:valInput[2].value,
        Kelas:className
    }
    rowVal.push(dataVal);
})
console.log(rowVal);
const xhttp=new XMLHttpRequest();
xhttp.onload=function(){
    if(xhttp.status==200){
        console.log(this.responseText);
        alert('Data has been submitted');
        location.reload();
    }else{
        alert('Failed to submit data');
    }
}
const encode=JSON.stringify(rowVal);
console.log(encode);
xhttp.open("POST","Controller/SendReview.php");
xhttp.setRequestHeader("Content-Type","application/json");
xhttp.send(encode);

});

