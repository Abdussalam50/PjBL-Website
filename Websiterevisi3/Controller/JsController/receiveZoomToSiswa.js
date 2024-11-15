const xhr=new XMLHttpRequest();
const containerList=document.querySelector("#containerList");
xhr.onload=function(){
    if(this.responseText==0){

    }else{
    const parsingData=JSON.parse(this.responseText);
    console.log(parsingData);
    parsingData.forEach(function(data){
        const Presentasi= data.namaPresentasi;
        const Link=data.Link;
        const Waktu=data.Waktu;
        let containerZoom;
        containerZoom=`<a href="${Link}" class="list-group-item list-group-item-action active" aria-current="true">
        <div class="d-flex w-100 justify-content-between">
          <h5 class="mb-1">${Presentasi}</h5>
          <small>${Waktu}</small>
        </div>
        <p class="mb-1" >${Link}</p>
        <small>Klik untuk melakukan zoom meeting.</small>
      </a> `;
      containerList.innerHTML+=containerZoom;
      
    });
}
}

xhr.open("GET",` Controller/receiveZoom.php?getClass=${ClassUser}`);
xhr.send();