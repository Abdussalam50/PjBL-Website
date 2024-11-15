const helpContainer=document.getElementById("helpContainer");
var windowUrl=window.location.href;
var Url=new URLSearchParams(new URL(windowUrl).search);
const params=Url.get("role");
console.log(params);
fetch("Controller/getBantuan.php",{
    method:"POST",
    headers:{
        "Content-Type":"application/json",
    },
    body:params
})
.then(response=>{
   return response.json();
})
.then(data=>{
    console.log(data);
    data.forEach(element => {
        let vidContent=`<div class='col-lg-6 d-flex flex-column justify-content-center my-2' id="${element.id}">
                            <h3 class='text-dark fs-4'>${element.title}</h3>
                            ${element.link}
                        </div>`;
        helpContainer.innerHTML+=vidContent;
    });
})
.catch(error=>{
    console.error(error);
})