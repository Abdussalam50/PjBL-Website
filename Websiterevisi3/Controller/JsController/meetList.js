const meet = document.getElementById('listMeet');
const dropMenu = document.getElementById('dropMenu');
const item = meet.querySelectorAll('input');
for (let i = 0; i < item.length; i++) {
    item[i].addEventListener('click', sendParameter);
}

function sendParameter() {
    var valueParam = this.getAttribute('value')=='Nilaitotal'?'Nilaitotal':this.getAttribute('value');
    console.log(valueParam);
    fetch('Controller/getMeeting.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ 'meeting': valueParam,'class': ClassId })
    })
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data);
            if (data == 'false') {
                let empty = `<div class='container-fluid border border-danger rounded'><p class='text-danger lead'>Tidak ada data yang tersedia</p></div>`;
                dropMenu.innerHTML = empty;
            } else {
                let table = `
        <table class='table table-bordered'>
            <thead>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Nilai</th>
            </thead>
        
            <tbody>`
                for (let i = 0; i < data.length; i++) {
                    table += `
                                <tr>
                                    <td>${data[i].student}</td>
                                    <td>${data[i].class}</td>
                                    <td>${data[i].score}</td>
                                </tr>
                            `;

                }
                table += `</tbody>
                        </table>`;
                dropMenu.innerHTML = table;
            }
        })
        .catch(error => {
            console.error('Error:', error);
        }
        )
}
