const xhttp = new XMLHttpRequest();
const url = window.location.href;
const urlParam = new URLSearchParams(new URL(url).search);
const val = urlParam.get("classes");
const container = document.getElementById("containers");
xhttp.onload = function () {

  const dataReceive = this.responseText;
    console.log(dataReceive.length);
  const jsonObj = JSON.parse(dataReceive);
  if (jsonObj.length == 0) {
    let containerEmpty = `<div class="container-fluid border border-danger d-flex justify-content-center py-4"><p class='text-danger fs-5 m-0'>Silahkan pilih kelas anda</p></div>`;
    container.innerHTML = containerEmpty;
  } else {
    let groupedData = {};
    jsonObj.forEach(function (item) {
      let key = item.grouping;

      groupedData[key] = groupedData[key] || [];
      groupedData[key].push(item);
    });

    let groupHTML = `<div class="accordion" id="accordionExample">`; // Initialize groupHTML outside the loop

    Object.keys(groupedData).forEach(function (groupKey) {
      let group = groupedData[groupKey];
      let cleanGroupKey = groupKey.replace(/\s/g, '');
      groupHTML += `<div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#${cleanGroupKey}" aria-expanded="false" aria-controls="collapseOne">
                      <i class="bi bi-people"></i>  ${groupKey}
                      </button>
                    </h2>
                    <div id="${cleanGroupKey}" class="accordion-collapse collapse" data-bs-parent="#accordionExamples">`;

      let seen = new Set();
      group.forEach(function (member) {
        // Check if member.name is a string before using replace
        if (typeof member.name === 'string') {
          let cleanMember = member.name.replace(/\s/g,'');

          // Check for duplicates and append a unique identifier
          if (!seen.has(cleanMember)) {

            seen.add(cleanMember);
            console.log(cleanMember);
            // Ensure to replace all spaces globally
            groupHTML += `<div class=" accordion-item">
                        <h2 class="accordion-header">
                          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#${cleanMember}" aria-expanded="false" aria-controls="collapseOnes">
                          <i class="bi bi-person"></i>  ${member.name}
                          </button>
                        </h2>
                        <div id="${cleanMember}" class="accordion-collapse collapse" data-bs-parent="#accordionExamples">`;
            group.forEach(function (Reference) {
              groupHTML += `<div class="accordion-body overflow-x-auto"id="accordionBody">
                          <a href="Controller/DownloadReference.php?refFile=${Reference.reference}"id="refName">${Reference.reference}</a> 
                          <div id="container-reference" class='container-fluid d-flex align-items-center'>
                            <div class='flex-grow-1'><p class="text-start text-dark m-0" id='container-reference'>${Reference.description}</p></div>
                            <div class='d-flex justify-content-evenly align-items-center' id='container-button'>
                              <button type='submit'id='tolak'class='btn btn-danger me-2 text-center' style='height:40px'onclick='refuseResponse(this)'>Tolak</button>
                              <button type='submit' id='terima' class='btn btn-success text-center' style='height:40px'onclick='acceptResponse(this)'>Terima</button>
                            </div>
                          </div>
                          
                        </div>`;
            });
            groupHTML += `</div></div>`;

          }
        } else {
          // Handle the case where member.name is not a string
          console.error('Member.name is not a string:', member);
        }
      });

      groupHTML += `</div></div>`;
    });

    groupHTML += `</div>`; // Close the accordion container

    // Menempatkan semua HTML grup ke dalam elemen dengan ID "containers"

    container.innerHTML = groupHTML;
  }
};

xhttp.open("GET", `Controller/receiveDataRefForGuru.php?getDataRefStd=${val}`);
xhttp.send();

function acceptResponse(ref){
  
  const refContainer=ref.closest(".accordion-body");
  const refName=refContainer.querySelector("a").textContent
 
  const xhr=new XMLHttpRequest();
  xhr.onload=function(){
    if(this.responseText=="true"){
      alert('tanggapan telah dikirim..');
    }
  }
  xhr.open("POST","Controller/acceptResponse.php");
  xhr.setRequestHeader("Content-Type","application/json");
  xhr.send(JSON.stringify({ref:refName}));
}
