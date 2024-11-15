const xht2p=new XMLHttpRequest();
xht2p.onload=function(){
    var recClass=document.getElementById("receiveClass");
    var data=this.responseText;
    var Parse=JSON.parse(data);
    Parse.forEach(function(dt){
        let container;
        container=`<a href="Presentasi2.php?data=${dt}" class="list-group-item list-group-item-action text-secondary fw-bold">${dt}</a>`
        recClass.innerHTML+=container;
    });
console.log(this.responseText);
}

const dataSend="datas="+encodeURIComponent(classUser);
console.log(dataSend);
xht2p.open("POST","Controller/receiveClassGuruP.php");
xht2p.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xht2p.send(dataSend);