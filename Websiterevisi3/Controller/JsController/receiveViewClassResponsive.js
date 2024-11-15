const xht2r=new XMLHttpRequest();
const listClasses=document.getElementById("rowLink");

xht2r.onload=function(){
    var data=this.responseText;

    console.log(data);
    const Parse=JSON.parse(data);
    Parse.forEach(function(lis){
        const classes=lis.class;
        let containerClass;
    containerClass=`
    <div id="class-chat"class="container-fluid row " >
    <div class="col col-2 me-4">
      <img class="rounded-circle m-2"src="css/img/discussion.jpg" alt="" style="width:60px;height:60px">
    </div>
    <div class="col col-8 d-flex justify-content-start align-items-center">
    <a href="DiskusiGuru.php?kelas=${classes}" class="text-white">Kelas ${classes}</a>
    </div>
</div>`;
    listClasses.innerHTML+=containerClass;
    
    })};



xht2r.open("GET",`Controller/viewKelasDiskusi.php?user=${userId}`,true);
xht2r.send();