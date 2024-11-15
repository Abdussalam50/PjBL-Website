const xhtt4p = new XMLHttpRequest();
const presentasions = document.getElementById("presentasion");
const node4 = document.getElementById("node");
const liPoint = node4.querySelectorAll("li");
const presentation = document.getElementById("presentation");
xhtt4p.onload = function () {
    console.log(this.responseText);
    if (this.responseText == "denied") {
        if (window.innerWidth < 600) {
            presentation.style.borderBottom = "5px solid #dc3545";
            node4.style.display = "none";
            presentasions.setAttribute("type", "button");
            presentasions.addEventListener("click", function () {
                alert("Fitur presentasi tidak dapat diakses hingga semua kelompok telah mengupload laporan proyek")
            })
        } else {
            presentasions.setAttribute("type", "button");
            liPoint[4].style = "list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red";
            presentasions.addEventListener("click", function () {
                alert("Fitur presentasi tidak dapat diakses hingga semua kelompok telah mengupload laporan proyek")
            })
        }
    } else {
        if (window.innerWidth < 600) {
            presentation.style.borderBottom = "5px solid #198754";
            node4.style.display = "none";

        } else {

            liPoint[4].style = "list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
        }

    }
}

xhtt4p.open("GET",`Controller/getPoint4.php?userclass=${userClass}`);
xhtt4p.send()