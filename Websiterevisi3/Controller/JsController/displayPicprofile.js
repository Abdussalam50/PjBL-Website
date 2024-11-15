const imgProfile=document.getElementById("profilePic");
fetch("Controller/getProfileImg.php",{
    method:'POST',
    headers:{'Content-Type':'application/json'},
    body:JSON.stringify(usernames)
})
.then(response=>{
    if(response.ok){
        return response.json();
    }
})
.then(data=>{
    if(data=="false"){
        imgProfile.setAttribute('src','css/img/person.png');
    }else{
    imgProfile.setAttribute('src','Controller/'+data);
    }
})
.catch(error=>{
    console.error(error);
})