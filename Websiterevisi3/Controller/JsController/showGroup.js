const dropGroup=document.getElementById('groupList');
var url=window.location.href;
var urlParams=new URLSearchParams(new URL(url).search);
const param=urlParams.get('kelas');
const xhr1=new XMLHttpRequest();
xhr1.onload=function(){
    if(xhr1.status==200){
        console.log(this.responseText);
        if(this.responseText==''){
            let warning='<div class="container border border-danger rounded px-3"><p class="text-danger lead m-3">Silahkan pilih kelas</p></div>';
            dropGroup.innerHTML=warning;
        }else{
        const datas=JSON.parse(xhr1.responseText);
        datas.forEach(data=>{
            let listContainer=`<li><a class="dropdown-item" href='DiskusiGuru.php?group=${data}'>${data}</li>`;
            dropGroup.innerHTML+=listContainer;
        })
    }
    }
}
var dataSend=JSON.stringify({'kelas':param});
xhr1.open('POST','Controller/showGroup.php');
xhr1.setRequestHeader('Content-Type','application/json');
xhr1.send(dataSend);
