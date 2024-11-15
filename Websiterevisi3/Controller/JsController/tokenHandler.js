const dataCurr=User;
const uClass=userClass;
console.log(uClass);
fetch('Controller/setSessionToken.php',{
    method:'POST',
    headers:{'Content-Type':'application/json'},
    body:JSON.stringify({
        'user':dataCurr,
        'class':uClass
    })
})
.then(response=>{
    if(response.ok){
    return  response.json()
    }
    throw new Error('Fail send data to server');
})
.then(data=>{
    const myModal=document.getElementById("myModal");

    if(data.tokenval==false||data.tokenval=='none'){
        myModal.style.display="block";
    }else if(data.tokenval==true){
        myModal.style.display="none";
       
    }else if(data.tokenval=='default'){
        myModal.style.display=="none";
    }else if(data.tokenval=='invalid'){

        myModal.style.display="block";
        document.cookie='grpName=null;expires=0;path=/';
    }
    console.log(data);
    console.log(document.cookie);
})
.catch(erorr=>{console.error('Kesalahan :',erorr)});

