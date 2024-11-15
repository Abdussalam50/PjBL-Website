const xhhr=new XMLHttpRequest();
var url=window.location.href;
var params=new URLSearchParams(new URL (url).search);
const valParams=params.get("Link");
const ContainerVideo=document.getElementById("videoContainer");
const videos=document.getElementById("video");
xhhr.onload=function(){
    var data=this.responseText;
    console.log(data);
    if(data=="null"){
        videos.innerHTML="";
        ContainerVideo.style.display="none";
    }else{
    var arrays=data.split(" ");

    arrays.splice(1,0,"class='container-fluid px-0'");
    
    var itemIframe=arrays.toString();
    var iframes=itemIframe.replaceAll(","," "); 
    videos.innerHTML=iframes;
    }
}
xhhr.open("GET",`View/watchVideo.php?Link=${valParams}`);
xhhr.send();