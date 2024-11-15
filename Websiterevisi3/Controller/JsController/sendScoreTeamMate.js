const windowLocation=window.location.href;
const urlParams = new URLSearchParams(new URL(windowLocation).search);
const valParams=urlParams.get('name');
const meeting=document.getElementById('meeting');
const submit=document.getElementById("submit");
const inputVal=document.querySelectorAll("td input");

let sum=0;
inputVal.forEach(function(e){
    e.addEventListener("change",function(){
        if(e.checked){
            sum++
        }else{
            sum--
        }
    })

   
})

submit.addEventListener("click",function(){
   
    fetch('Controller/sendScoreTeam.php',{
        method: 'POST',
        headers:{
            'Content-Type': 'application/json'
        },
        body:JSON.stringify({
            'score':sum,
            'name':valParams,
            'class':clases,
            'meeting':meeting.value
        })
    })
    .then(response=>{
        if(response.ok){
            return response.json();
        }
    })
    .then(
        data=>{console.log(data)}
        )
    .catch(error=>{
        console.error(error);
    });

    window.location.reload();
})


