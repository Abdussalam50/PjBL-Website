const xhr3=new XMLHttpRequest();
const commentSection=document.getElementById("commentSection");
var urlWindows=window.location.href;
var SearchParams= new URLSearchParams(new URL(urlWindows).search);
const values=SearchParams.get('Link');
const encodeValues=encodeURIComponent(values);
xhr3.onload=function(){
    var data=this.responseText;
    console.log(data);
    if(data==0){
        console.log("kosong");
    }else{
        const ParseData=JSON.parse(data);
        ParseData.forEach(function(val){
            var nama=val.nama;
            var comment=val.comment;
            var time=val.time;
            //create element
            let containerComment;
                containerComment=   
    `<div class="container-lg col d-flex flex-column border border-secondary rounded-2 mb-2" style="--bs-border-opacity:.2">
            <p class="lead fw-bold fs-6">${nama} (guru)</p>
        <div height="auto" class="container-fluid d-flex flex-column ps-0">
                <p class="lead fs-6 flex-grow-1 text-danger" width="692px" id="commentItem">${comment}</p>
            <div class="container-sm d-flex ps-0 p-2 justify-content-start">
              <button id="btn-comments2" type="submit" name="delete-comment" ><p class="fs-6">Hapus</p></button>
              <p class="text-muted fs-6">${time}</p>
            </div>
        </div>
    </div>`;
    commentSection.innerHTML+=containerComment;
       
        });
    console.log(this.responseText);
    }
   

}

xhr3.open("GET",`Controller/viewCommentGuru.php?LinkVideo=${encodeValues}`);
xhr3.send();