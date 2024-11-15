const xht4p=new XMLHttpRequest();
const commentSection=document.getElementById("commentSection");
var urlWindow=window.location.href;
var Params=new URLSearchParams(new URL(urlWindow).search);
const valParam=Params.get("Link");
const encodeParam=encodeURIComponent(valParam);
xht4p.onload=function(){

    console.log(this.responseText);
    const data=this.responseText;
    const Parsing=JSON.parse(data);
    Parsing.forEach(function(datas){
        var name=datas.nama;
        var comment=datas.comment;
        var time=datas.time;
        let containerComment;
        containerComment=
    `<div class="container-lg col d-flex flex-column border border-secondary rounded-2 mb-2" style="--bs-border-opacity:.2">
        <p class="lead fw-bold fs-6">${name} (guru})</p>
    <div height="auto" class="container-fluid d-flex flex-column">
            <p class="lead fs-6 flex-grow-1" width="692px" id="commentItem">${comment}</p>
        <div class="container-sm d-flex p-2 justify-content-start">
          <p class="text-muted fs-6">${time}</p>
        </div>
    </div>
</div>`;
commentSection.innerHTML+=containerComment;
    });
}

xht4p.open("GET",`Controller/viewCommentGuru.php?LinkVideo=${encodeParam}`);
xht4p.send();