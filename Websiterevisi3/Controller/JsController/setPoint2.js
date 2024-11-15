const xhtt2p=new XMLHttpRequest();
const timelineButton=document.getElementById("Timeline");
const node2=document.getElementById("node");
const liColor=node.querySelectorAll("li");
const timeline=document.getElementById("timeline");
xhtt2p.onload=function(){
    console.log(this.responseText);
    if(this.responseText==="denied"){
        if(window.innerWidth<600){
            timeline.style.borderBottom='5px solid #dc3545';
            node2.style.display='none';
            timelineButton.setAttribute("type","button");
            timelineButton.addEventListener("click",function(){
                alert("fitur ini tidak dapat diakses hingga semua kelompok telah mengumpulkan rencana proyek");
            })
        }else{
        liColor[3].style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red";
        timelineButton.addEventListener("click",function(){
            alert("fitur ini tidak dapat diakses hingga semua kelompok telah mengumpulkan rencana proyek");
        })
        timelineButton.setAttribute("type","button");
    }
    }else{
        if(window.innerWidth<600){
            timeline.style.borderBottom='5px solid #198754';
            node2.style.display='none';
           
        }else{
        liColor[3].style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
        }
    }
}

xhtt2p.open("GET",`Controller/getPoint2.php?kelas=${userClass}`);
xhtt2p.send()