const listClass=document.getElementById("listClass");
const xhhr=new XMLHttpRequest();
xhhr.onload=function(){
    console.log(this.responseText);
    var data=JSON.parse(this.responseText);
    for(let i=0;i<data.length;i++){
        let blockClass;
        blockClass=`<a href="Penilaian.php?stdClass=${data[i]}" class="list-group-item list-group-item-action text-secondary fw-bold ">${data[i]}</a>`
        listClass.innerHTML+=blockClass;
    }
}
xhhr.open("GET",`Controller/receiveClassPenilaian.php?thisUser=${nameUser}`);
xhhr.send();