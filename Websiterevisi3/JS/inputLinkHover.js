const container=document.querySelector("#containerList");
container.addEventListener("mouseover",function(e){

    if(e.target.closest("a")){
        e.target.closest("a").classList.add("active");
    }
});

container.addEventListener("mouseout",function(e){

    if(e.target.closest("a")){
        e.target.closest("a").classList.remove("active");
    }
})