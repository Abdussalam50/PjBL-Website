const xht1r=new XMLHttpRequest();
const listClass=document.getElementById("list");

xht1r.onload=function(){
    var data=this.responseText;

    console.log(data);
    const Parse=JSON.parse(data);
    Parse.forEach(function(lis){
        const classes=lis.class;
        let containerClass;
    containerClass=`
<li class=list-group-item list-group-item-action py-2 d-flex justify-content-evenly" aria-current="true" id='link'>
    <a href="DiskusiGuru.php?kelas=${classes}" class='text-dark' style='text-decoration:none'>
        <i class="bi bi-people-fill fs-4"></i> Kelas ${classes}
    </a>
   
</li>`;
    listClass.innerHTML+=containerClass;
    
    })};



xht1r.open("GET",`Controller/viewKelasDiskusi.php?user=${userId}`,true);
xht1r.send();

