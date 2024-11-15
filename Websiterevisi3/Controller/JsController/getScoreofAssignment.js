const baik=document.querySelectorAll(".form-check-input");
var urlPage=window.location.href;
var urlParams=new URLSearchParams(new URL(urlPage).search);
const paramsId=urlParams.get("grp");
let goodSum=0;
let poorSum=0;
let badSum=0;
console.log(thisClass);
baik.forEach(function(check){

   check.addEventListener("change",function(){
    if(check.checked){
       if(check.getAttribute('id')==='baik'){
        goodSum++
       }else if(check.getAttribute('id')==='cukup'){
         poorSum++
       }else if(check.getAttribute('id')==='kurang'){
         badSum++
       }
    }else{
        if(check.getAttribute("id")==="baik"){
         goodSum--
        }else if(check.getAttribute("id")==="cukup"){
         poorSum--
        }else if(check.getAttribute('id')==='kurang'){
         badSum--
        };
       }
    console.log('baik',goodSum);
    console.log('poor',poorSum);
    console.log('bad',badSum);

   })
});


const submitNilai=document.getElementById("submitNilai");
submitNilai.addEventListener('click',function(){
   const dataSend=JSON.stringify({
   'good':goodSum,
   'poor':poorSum,
   'bad':badSum,
   'group':paramsId,
   'class':thisClass
   });
   fetch('Controller/sendScoreAssignment.php',{
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
      console.log(data)
    })
    .catch(error=>{
      console.error(error)
    })

    window.location.reload();
})


