const submit=document.getElementById("submit");
submit.addEventListener("click",()=>{
    const inputVal=document.getElementById("grpName").value;
    
const data={
    value:inputVal,
    user:User
}
console.log(data);
    fetch('Controller/setSessionStd.php',{
        method:'POST',
        headers: { 'Content-Type': 'application/json' },
        body:JSON.stringify(data)
    })
    .then(response=>{
        if(response.ok){
            return response.json();
        }
        throw new Error('Fail send data to server');
    })
    .then(data=>{
        console.log(data);
    })
    .catch(err => console.log(err));
})