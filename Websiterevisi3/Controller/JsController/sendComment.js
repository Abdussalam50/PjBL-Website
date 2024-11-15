const inputComment=document.getElementById("commentValue");
const submit=document.querySelector("#submit");

submit.addEventListener("click",function(){
let commentValue=inputComment.value;
var link=window.location.href;
var Params= new URLSearchParams(new URL(link).search);
const url=Params.get("Link");
    const data=[];
    data.push(commentValue);
    data.push(username);
    data.push(classes);
    data.push(url);
    const postData = `comment=${encodeURIComponent(data[0])}&username=${encodeURIComponent(data[1])}&class=${encodeURIComponent(data[2])}&url=${encodeURIComponent(data[3])}`;
        const xht2p=new XMLHttpRequest();
        xht2p.onload=function(){
            console.log(this.responseText)
        }
        
        xht2p.open("POST",'Controller/sendComent.php',true);
        xht2p.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xht2p.send(postData);
   inputComment.value="";
});
