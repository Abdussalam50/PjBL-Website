const idBaik= document.querySelectorAll("#baik");
const idCukup=document.querySelectorAll("#cukup");
const idKurang=document.querySelectorAll("#kurang");
var currUrlPage=window.location.href;
const urlParam=new URLSearchParams(new URL(currUrlPage).search);
const idGet=urlParam.get("grp");
function getData(){
let baikSum=[];
idBaik.forEach(function(check){
    if(check.checked){
    baikSum.push(check.checked);
    }
});

let cukupSum=[];
idCukup.forEach(function(check){
    if(check.checked){
    cukupSum.push(check.checked);
    }
});

let kurangSum=[];
idKurang.forEach(function(check){
    if(check.checked){
    kurangSum.push(check.checked);
    }
})
const dataSend=JSON.stringify({
    baik: baikSum.length,
    cukup: cukupSum.length,
    kurang: kurangSum.length,
    group:idGet,
    classes:theClass
});

console.log(dataSend)
fetch('Controller/sendScoreReport.php',{
    method:'POST',
    headers:{
        'Content-Type':'application/json'
    },
    body:dataSend
})
.then(response=>{
    return response.json()
})
.then(data=>{
    console.log(data);
})
.catch(error=>{
    console.error(error);
})

window.location.reload()
}