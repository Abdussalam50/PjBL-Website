const xht2p=new XMLHttpRequest();
const contentClasses=document.getElementById("contentClass");
xht2p.onload=function(){
    console.log(this.responseText);
    const data=this.responseText;
    const parsing=JSON.parse(data);
    parsing.forEach(function(clas){
        let contentClass;
        contentClass=` <div class="col ps-2 ps-sm-3 py-1 py-sm-2 d-flex align-items-center" id="dProject"><p class="mb-0"><a href="Perpustakaan(guru).php?classes=${clas}" class="lead fw-bold fs-6" style="width:100%">Kelas ${clas}</a></p></div>`;
        contentClasses.innerHTML+=contentClass;
    });
}

xht2p.open("GET",`Controller/receiveClassRef.php?getClass=${user}`);
xht2p.send();