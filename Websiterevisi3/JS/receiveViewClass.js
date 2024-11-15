const xhttp = new XMLHttpRequest();
const listClass = document.querySelector("#class-list");

xhttp.onload = function () {
    console.log(this.responseText);
    const listKelas = this.responseText;
    const listKelasParse = JSON.parse(listKelas);

    listKelasParse.forEach(function (txtContents) {
        let listHTML;
        listHTML = `
            <div class="container-fluid m-0 row col-12 " id="class-group">

                    <a href="Atur_timeline(guru).php?kelas=${txtContents}" class=" text-dark fs-5" id="link" style='text-decoration:none'> <i class="bi bi-people-fill  fs-3"></i> Kelas ${txtContents}</a>
            </div>`;
        listClass.innerHTML += listHTML;
        console.log(txtContents);
    });
}

xhttp.open("GET", `Controller/viewListKelas.php?getClass=${userClass}`);
xhttp.send();
