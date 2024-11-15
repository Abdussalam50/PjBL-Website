const xhttp=new XMLHttpRequest();
const listClass=document.getElementById("list2kelas");
xhttp.onload=function(){
    console.log(this.responseText);
    var data=this.responseText;
    const Parsing= JSON.parse(data);
    for(let i=0; i<Parsing.length; i++){
        let linkHTML;
        linkHTML=`<a href="Laporan-project(guru).php?kelas=${Parsing[i]}" class="list-group-item list-group-item-action text-secondary fw-bold ">Kelas ${Parsing[i]}</a>`
        listClass.innerHTML+=linkHTML;
    }
    console.log(Parsing);

}

xhttp.open("GET",`Controller/viewKelasLaporan.php?getClass=${name}`);
xhttp.send()