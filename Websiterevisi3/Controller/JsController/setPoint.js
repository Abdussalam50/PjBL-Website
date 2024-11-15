const xhttp=new XMLHttpRequest();
const node =document.getElementById("node");
const list=node.querySelectorAll("li");
const Planing=document.getElementById("Planing");
const rc=document.getElementById("rencanaProyek");
xhttp.onload=function(){
    var response=this.responseText;
    console.log(response);
    if(response==="denied"){
    
        if(window.innerWidth<600){
            rc.style.borderBottom="5px solid #dc3545";
            node.style.display="none";
            Planing.setAttribute("type","button");
            Planing.addEventListener( "click", function(){
                alert("Anda tidak dapat masuk ke menu proyek setelah teman anda mengumpulkan semua referensi yang dibutuhkan dalam pengerjaan proyek")
            });
         
        }else{
        list[2].setAttribute("style","list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red");
        Planing.setAttribute("type","button");
        Planing.addEventListener( "click", function(){
            alert("Anda tidak dapat masuk ke menu proyek setelah teman anda mengumpulkan semua referensi yang dibutuhkan dalam pengerjaan proyek")
        });
    }
    }else {
        if(window.innerWidth<600){
            rc.style.borderBottom="5px solid #198754";
            node.style.display='none';
        }else{
        list[2].setAttribute("style","list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green");
        }
    }
}

xhttp.open("GET",`Controller/GetPoint.php?class=${userClass}`);
xhttp.send();
