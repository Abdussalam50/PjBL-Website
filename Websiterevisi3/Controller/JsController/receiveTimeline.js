const xhttp = new XMLHttpRequest();
const bodyTimelineList = document.getElementById("container-timeline");
const arrayData={'class':modulus,'group':users};

xhttp.onload = function () {
    const dataReceive = this.responseText;
    console.log(dataReceive);
    if(dataReceive=="false"){
        let emptyContainer;
        emptyContainer=`<div class='container-lg py-4 border border-danger d-flex justify-content-center rounded'><p class='text-danger m-0 fw-bold '>Belum ada timeline yang tersedia</p></div>`;
        bodyTimelineList.innerHTML+=emptyContainer;
    }else{
    const ParsingData = JSON.parse(dataReceive);
    
    for(let i=0;i<ParsingData.length;i++){
        console.log(ParsingData[i]);
       var nameDatas=ParsingData[i].stepName;
       var deadline=ParsingData[i].deadline;
       var time=ParsingData[i].time;
       var status=ParsingData[i].statuses;
    
      if(ParsingData[i].time.notify){
        let listTimelineDeadline =
                `<div class="row container-lg bg-success rounded-3 mt-2 mb-2" id="timeline">
                        <div class="col col-7 mt-2 ">
                            <h3 class="lead text-white fs-3">${nameDatas}<p class="lead text-white fs-6">${deadline}</p></h3>
                            <p class="text-warning">${time.notify}</p>
                        </div>
                    
                    <form class="col col-5" method="post" enctype="multipart/form-data">
                        <div class="d-flex flex-column">
                        <p class='m-0 text-warning pt-1'>${status=="true"?"Telah dikumpulkan":"Belum dikumpulkan"}</p>
                            <input type="file" class="form-control-sm mt-2 mb-2" name="inputFile" >
                                <div class='row container-fluid'>
                                    <button class="btn btn-warning btn-sm lead col col me-3"  type="submit" name="uploads">Submit</button>
                                    <button class='btn btn-light btn-sm lead col col' type="submit" name="Edit">Edit</button>
                                </div>
                        </div>
                    </form>
                    </div>`;
                    bodyTimelineList.innerHTML += listTimelineDeadline;
      }else{
           let  listTimeline =
                `<div class="row container-lg bg-success rounded-3 mt-2 mb-2" id="timeline">
                        <div class="col col-7 mt-2 ">
                            <h3 class="lead text-white fs-3">${nameDatas}<p class="lead text-white fs-6">${deadline}</p></h3>
                            <p class="text-white">${time.day} hari ${time.hour} jam ${time.minute} menit ${time.second} detik</p>
                        </div>
                        <form class='col col-5' method='post' enctype='multipart/form-data'>
                        <div class=" d-flex flex-column">
                        <p class='m-0 text-warning pt-1'>${status=="true"?"Telah dikumpulkan":"Belum dikumpulkan"}</p>
                            <input type="file" class="form-control-sm mt-2 mb-2" name="inputFile" >
                            <div class='row container-fluid'>
                                <button class="btn btn-warning btn-sm lead col me-3"  type="submit" name="uploads">Submit</button>
                                <button class="btn btn-light btn-sm lead col "  type="submit" name="Edit">Edit</button>
                            </div>
                        </div>
                        </form>
                    </div>`; 
                    bodyTimelineList.innerHTML += listTimeline;
      }
     
    }
    }

}

xhttp.open("GET", `Controller/ReceiveTimeline.php?getTimeline=${encodeURIComponent(JSON.stringify(arrayData))}`, true);
xhttp.send();
