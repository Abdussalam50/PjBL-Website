

const urls=window.location.href;
const ParamUrl=new URLSearchParams(new URL(urls).search);
const ids=ParamUrl.get('grp');
const nProyek = document.getElementById("submitNilaiProyek");
nProyek.addEventListener("click", function () {
    const inputs = document.querySelectorAll("input");
    const arrayCount = []
    inputs.forEach(function (acc) {
        arrayCount.push(acc.value);
    });

    inputs.forEach(function(input){
        input.value='';
    })
    const total=arrayCount.reduce(function(acc,curr){
        return acc+parseFloat(curr)|| 0;
    },0);
console.log(total);
    fetch('Controller/sendProjectScore.php',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
        },
        body: JSON.stringify({
            'totalScore':total,
            'id':ids,
            'class':Classes
        })
    })
    .then(response=>{
        if (!response.ok) {
            throw new Error(`Network response was not ok: ${response.statusText}`);
        }
        return response.json();
    })
    .then(data=>{
        console.log(data);
    })
    .catch(error=>{
        console.error('Error',error);
    })
})
