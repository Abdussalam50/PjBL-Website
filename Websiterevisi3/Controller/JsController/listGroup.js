const xhttp1=new XMLHttpRequest();
const contList=document.getElementById("container-list-grp");
xhttp1.onload=function(){
    var data=this.responseText;
    if(data.length>0){
    const parsing=JSON.parse(data);
    parsing.forEach(function(el){
        let list=`<li style="background-color:--bs-tertiary-color" class="border-top border-top-secondary border-bottom border-bottom-secondary text-start"><a href="Refleksi.php?groupScoring=${el}" class="text-lead fs-5 ">${el}</a></li>`;
        contList.innerHTML+=list;
    })
    }else{
        let emptyText='<p class="text-secondary fw-bold">Belum ada kelompok</p>';
        contList.innerHTML+=emptyText;
    }
    console.log(data);
}
xhttp1.open("GET",`Controller/receiveListGroup.php?thisClass=${className}`);
xhttp1.send()