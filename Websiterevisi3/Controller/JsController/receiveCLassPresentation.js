const xhr=new XMLHttpRequest();
const urlWindow=window.location.href;
const urlSearchParam=new URLSearchParams(new URL(urlWindow).search);
const valClass=urlSearchParam.get("class");
console.log(valClass);
const containerListParent=document.getElementById("containerList");
if (valClass===null){
  let containerAlternative;
        containerAlternative=`<div class='container-fluid border border-danger text-danger d-flex justify-content-center align-items-center'style='height:50px;background-color:#f3abb2'><p class='text-center m-0'>Silahkan Pilih Kelas didaftar Kelas</p></div>`;
        containerListParent.innerHTML=containerAlternative;
}else{
xhr.onload=function(){
    var data=this.responseText;
   console.log(data);
 if(data==="false"){

        let container;
        container=`<div class='container-fluid border border-danger text-danger d-flex justify-content-center align-items-center'style='height:50px;background-color:#f3abb2'><p class='text-center m-0'>Tidak ada link zoom yang tersedia !</p></div>`;
        containerListParent.innerHTML=container;
    }else{
    const Parsing=JSON.parse(data);
    console.log(Parsing);
    Parsing.forEach(function(dta){
        var namaPresentasi=dta.namaPresentasi;
        var Link=dta.Link;
        var Waktu=dta.Waktu;

        let containerList;
        containerList=`<a href="#" class="list-group-item list-group-item-action " aria-current="true">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">${namaPresentasi}</h5>
                      <small>${Waktu}</small>
                    </div>
                    <p class="mb-1">${Link}</p>
                    <small>And some small print.</small>
                  </a>`;
        containerListParent.innerHTML+=containerList;

    });
  }
    }
  }

xhr.open("GET",`Controller/receiveLinkClass.php?getClass=${valClass}`);
xhr.send();