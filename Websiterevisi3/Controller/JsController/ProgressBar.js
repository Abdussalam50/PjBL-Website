const xhttpReq=new XMLHttpRequest();

xhttpReq.onload=function(){
    const progress=document.getElementById("progress");
    const progressStick=document.getElementById("progress-stick");
    var data=this.responseText;
    progress.setAttribute("aria-valuenow",data);
    progressStick.setAttribute("style","width:"+data+"%");
    progressStick.textContent+=data+"%";
    console.log(data);
    
};
xhttpReq.open("GET",`Controller/progressBar.php`);
xhttpReq.send();
