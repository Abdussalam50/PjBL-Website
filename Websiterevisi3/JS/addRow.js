
    function addRow(){
        const tbody=document.querySelector("#tbody");
        const placeholders=['Respon teman anda','Level respon','Masukkan komentar'];
    
        const newRow=tbody.insertRow(-1);
        for(let i=0;i<tbody.rows[0].cells.length; i++){
            var cells=newRow.insertCell(i);
            cells.innerHTML=`<input type='text' placeholder="${placeholders[i]} " class='form-control' id="${i}">`;
        }
        console.log(tbody)
    }
    window.addRow=addRow;

