let value;
function deleteLaporan(e){
    var element=e.target;
    value=element.getAttribute("value");
    document.getElementById("modals").style.display="block";
}
    const save=document.getElementById("saves");
    save.addEventListener("click",uploadToServer);
    const input=document.getElementById("datafile");
    let file
    input.addEventListener("change",function(){
        file=input.files[0]
     
    })

    function uploadToServer(){
       
        if(file){
            const formData=new FormData();
            formData.append('file',file);
            formData.append('value',value);
            
        fetch('Controller/DeleteLaporan.php',{
            method:'POST',
            body:formData
            
        }).then(response=>{

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }

            return response.json();
            }).then(data=>{
                console.log(data);
                
                if(data.message){
                    alert(`${data.message}`);
                }else{
                    alert(`${data.errorOccured}`);
                }
                window.location.reload();     
            
        }).catch(error=>{
            console.error('error',error);
        });
       
    }else{
        alert('No file Selected');
    }
    
}
