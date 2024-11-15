const log=document.getElementById("log");
log.addEventListener("click",function(){
    fetch("Controller/logoutViaNav.php",{
        method:"POST"
    }).then(response=>{
        if(response.ok){
           return response.json();
        }
    })
    .then(data=>{
        console.log(data)
        if(data.status=="ok"){
            window.location.href="Login-siswa-guru.php";
        }else{
            alert('Cannot logout')
        }
    }).catch(error=>{
        console.error("terjadi kesalahan:",error);
    })
})