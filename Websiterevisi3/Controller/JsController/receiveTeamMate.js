const listName=document.getElementById("list-name");
const rowInput=document.querySelectorAll("#rowInput");

fetch('Controller/getTeammate.php',{
    method:'POST',
})
.then(response=>{
    return response.json()
})
.then(data=>{
    const friendList=document.getElementById('friendList');
    data.forEach((name)=>{
        let list=`<li><a class='dropdown-item' href='PeerAssessment.php?name=${name}'>${name}</a></li>`;
        friendList.innerHTML+=list;
    })
    
})
.catch(error=>{
    console.error(error);
})

