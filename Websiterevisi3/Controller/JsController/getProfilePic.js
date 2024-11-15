const liImg=document.getElementById("li-img");
fetch('Controller/getProfilePic.php',{
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body:JSON.stringify(usernames)
})
.then(response => {
    if(response.ok){
        return response.json();
    }
})
.then(data => {
    if(data=="false"){
        liImg.innerHTML = `<img src="css/img/person.png" alt="profile picture" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px" id="li-img">`;
    }
    else{
    liImg.innerHTML = `<img src="${'Controller/'+data}" alt="profile picture" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px" id="li-img">`;
    console.log(data);
    }

})
.catch(error => {
    console.log(error);
})