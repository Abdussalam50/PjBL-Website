const inputComment=document.getElementById("commentValue");
const submit=document.querySelector("#submit");

submit.addEventListener("click",function(){
    const commentValue=inputComment.value;
    var url=window.location.href;
    var Params=new URLSearchParams(new URL(url).search);
    const valParams=Params.get('Link'); 
   
    const data=[];
    data.push(commentValue);
    data.push(username);
    data.push(classes);
    data.push(valParams);
    const postData = `comment=${encodeURIComponent(data[0])}&username=${encodeURIComponent(data[1])}&class=${encodeURIComponent(data[2])}&LinkUrl=${encodeURIComponent(data[3])}`;
        const xht2p=new XMLHttpRequest();
        xht2p.onload=function(){
            console.log(this.responseText)
        }
        
        xht2p.open("POST",'Controller/sendCommentGuru.php',true);
        xht2p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xht2p.send(postData)
    commentValue="";
        
});
