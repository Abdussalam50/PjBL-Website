const url=window.location.href;
const id=document.getElementById("id");
const param= new URLSearchParams(new URL(url).search);
const valParam=param.get("grp");
console.log(id);
// id.innerHTML="Penilaian Proyek "+valParam;
