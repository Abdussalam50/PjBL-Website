const xhr1=new XMLHttpRequest();
var valueContent=window.location.href;
var val= new URLSearchParams(new URL(valueContent).search);
var ParamsVal=val.get('Link');
const encodeVal=encodeURIComponent(ParamsVal);
console.log(encodeVal);
const commentSections=document.getElementById("commentSection");
xhr1.onload=function(){
    var data=this.responseText;
    console.log(data);
    const ParseData=JSON.parse(data);
    ParseData.forEach(function(val){
        var nama=val.name;
        var comment=val.comment;
        var kelompok=val.kelompok;
        var time=val.time;
        //create element
        let containerComment;
        if(nama!==username){
            console.log(nama);
            containerComment=   
`<div class="container-lg col d-flex flex-column border border-secondary rounded-2 mb-2" style="--bs-border-opacity:.2">
        <p class="lead fw-bold fs-6">${nama} (${kelompok})</p>
    <div height="auto" class="container-fluid d-flex flex-column ps-0">
            <p class="lead fs-6 flex-grow-1" width="692px" id="commentItem">${comment}</p>
        <div class="container-sm d-flex p-0 justify-content-start">
          <p class="text-muted fs-6">${time}</p>
        </div>
    </div>
</div>`;
commentSections.innerHTML+=containerComment;
        }else{
        containerComment=   
`<div class="container-lg col d-flex flex-column border border-secondary rounded-2 mb-2" style="--bs-border-opacity:.2">
        <p class="lead fw-bold fs-6">${nama} (${kelompok})</p>
    <div height="auto" class="container-fluid d-flex flex-column">
            <p class="lead fs-6 flex-grow-1" width="692px" id="commentItem">${comment}</p>
        <div class="container-sm d-flex ps-0 justify-content-start">
          <button id="btn-comments2" type="submit" name="delete-comment" ><p class="fs-6">Hapus</p></button>
          <p class="text-muted fs-6">${time}</p>
        </div>
    </div>
</div>`;
        commentSections.innerHTML+=containerComment;
        }
    });
// console.log(this.responseText);
}

xhr1.open("GET",`Controller/viewComment.php?Link=${encodeVal}`);
xhr1.send();