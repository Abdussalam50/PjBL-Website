const xhttp=new XMLHttpRequest();
const embed=document.getElementById( "embed" );
xhttp.onload=function(){
    var data=this.responseText;
    if(data==null){
        embed.innerHTML="<div class='container-lg border border-danger'><p>Silahkan pilih proyek anda</p></div>";
    }else{
        embed.innerHTML=`<iframe src="${data}" type="" style="width:100%; height:700px;box-shadow:0px 0px 5px  rgba(0, 0, 0, 0.69)">`
    }

    console.log(data);
}


xhttp.open("GET",`Controller/getOutline.php?prmClass=${urClass}}`,true);
xhttp.send()