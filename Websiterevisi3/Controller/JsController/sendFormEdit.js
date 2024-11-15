const username=document.getElementById("username");
const NISN=document.getElementById("NISN");
const kelas=document.getElementById("kelas");
const password=document.getElementById("password");
const fileInput=document.getElementById("upload");
const sendUpdateBtn=document.getElementById("sendUpdate");
var urlCurrent=window.location.href;
var urlParams=new URLSearchParams(new URL(urlCurrent).search);
const valueUrl=urlParams.get('role');
let fileSend='';
fileInput.addEventListener("change",function(){
    fileSend=fileInput.files[0];
    console.log(fileSend);
}) 

function sendUpdate(){
    const userValue=username.value;
    const NISNValue=NISN.value;
    const kelasValue=kelas.value;
    const passValue=password.value;

    const formData= new FormData();
    formData.append('username',userValue);
    formData.append('id',NISNValue); 
    formData.append('kelas',kelasValue);
    formData.append('password',passValue);
    formData.append('role',valueUrl);
    formData.append('oldUser',oldUser);
    if(fileSend){
        formData.append('file',fileSend)
    }

    for (let pair of formData.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
    }

   fetch("Controller/editProfile.php",{
    method:"POST",
    body:formData
   })
   .then(response=>{
    if(response.ok){
        return response.json()
    }
   })
   .then(data=>{
    console.log(data);
    if(data.path){
        const profilePic=document.getElementById("profilePic");
        profilePic.setAttribute("src",`Controller/${data.path}`);
        alert('Profil anda telah diubah');
    }
    window.location.reload();
   })
   .catch(error=>
    {console.error(error)}
   );
    

}

sendUpdateBtn.addEventListener("click",function(){
  
    sendUpdate();
    
})