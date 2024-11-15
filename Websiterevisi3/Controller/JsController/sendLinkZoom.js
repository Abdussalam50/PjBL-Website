
const inputTitle=document.getElementById("title");
const inputLink=document.getElementById("Link");

    console.log(title);
const submit=document.getElementById("btn");
console.log(submit);
submit.addEventListener("click",function(){
    const title=inputTitle.value;
    const Link=inputLink.value;
    const data=[title,Link,userClass];
    
    console.log(data);
    const dataPost=`thisData=${encodeURIComponent(data.join(","))}`;
   
    const xht1p= new XMLHttpRequest();
    xht1p.onload=function(){
        console.log(this.responseText);
        if(this.responseText){
           alert(this.responseText);
        }
    }
    xht1p.open("POST","Controller/sendLinkZoom.php",true);
    xht1p.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xht1p.send(dataPost)
});