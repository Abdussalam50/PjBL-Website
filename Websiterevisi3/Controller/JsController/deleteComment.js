const xh1r=new XMLHttpRequest();
const commentBody=document.getElementById("commentSection");
commentBody.addEventListener("click",function(e){

    if(e.target.innerText=="Hapus"){
        
       
    const commentP=e.target.parentElement.parentElement.parentElement.querySelector("#commentItem");
    const commentItem=commentP.textContent;
    let dataComment=encodeURIComponent(commentItem);
    xh1r.onload=function(){
        var response=this.responseText;
        console.log(response);
    }
    xh1r.open("GET",`Controller/deleteComment.php?item=${dataComment}`);
    xh1r.send();
}

});
console.log(commentBody);


// xh1r.open("GET","deleteComment.php?thisComment=");
// xh1r.send();