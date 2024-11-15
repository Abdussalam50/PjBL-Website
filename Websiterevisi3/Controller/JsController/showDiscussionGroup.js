var url=window.location.href;
var urlParams=new URLSearchParams(new URL(url).search);
const paramValue=urlParams.get('group');
if(paramValue){
    fetch('Controller/ShowDiscussionGroup.php',{
        method:'POST',
        headers:{
            'Content-Type':'application/json',
        },
        data:JSON.stringify(paramValue)
    }).then(response=>{
        return response.json();
    }).then(data=>{
        console.log(data);
    }).catch(error=>{
        console.error('Error:',error);
    })
}