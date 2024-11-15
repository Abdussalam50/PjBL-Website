const xhttp=new XMLHttpRequest();
const embed=document.getElementById("embed");
xhttp.onload=function(){
    var data=this.responseText;
    console.log(data);
    let embedContainer=`<iframe src="${data}" type="" style="width:100%; height:700px;box-shadow:0px 0px 5px  rgba(0, 0, 0, 0.69)">`
    embed.innerHTML=embedContainer;
}
xhttp.open("GET","Controller/display_materi.php?swaps");
xhttp.send();