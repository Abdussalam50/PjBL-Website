const list=document.querySelector("#list");
const link=list.querySelectorAll("a");
let selectedItems=null;
link.forEach(function(item){

    item.addEventListener('click', function () {
        if(selectedItems!==null){
            selectedItems.classList.remove("active");
        }
        this.classList.add("active");
        selectedItems =this;
    })
})
