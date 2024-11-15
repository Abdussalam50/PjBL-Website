const info = document.getElementById('container-info');

const buttons= document.querySelectorAll('.buton');
console.log(buttons);
function setActive(attr){

  const buttons= document.querySelectorAll('.buton');
  buttons.forEach(button=>{
    button.classList.remove('active');
    button.removeAttribute('aria-current');
  });

  attr.classList.add('active');
  attr.setAttribute('aria-current','true');
}
function GeneralInfo() {

 
  let innerHtml = `      <h3 class="fw-bold text-center">Informasi Umum</h3>
    <div class="container">
      <table class="table table-striped">
          <tr>
            <td>Nama</td>
            <td></td>
          </tr>
          <tr>
            <td>Jenjang pendidikan</td>
            <td>Sekolah Menengah Atas (SMA)</td>
          </tr>
          <tr>
            <td>Mata pelajaran</td>
            <td>Fisika</td>
          </tr>
          <tr>
            <td>Kelas</td>
            <td>XI/Fase F</td>
          </tr>
          <tr>
            <td>Deskripsi umum</td>
            <td>Peserta didik menguraikan konsep gerak lurus berubah beraturan (GLBB) dalam sebuah proyek yang mensimulasikan penggunaan air bag dalam skenario kecelakaan.</td>
          </tr>
          <tr>
            <td>Tujuan pembelajaran</td>
            <td>Peserta didik dapat meganalisis besaran fisis pada gerak lurus dengan kecepatan tetap dan percepatan tetap serta dapat menguraikan konsep gerak lurus melalui grafik</td>
          </tr>
          <tr>
            <td>Alokasi waktu</td>
            <td>10 JP (2 jam x 5 pertemuan)</td>
          </tr>
          <tr>
            <td>Moda pembelajaran</td>
            <td>Online</td>
          </tr>
          <tr>
            <td>Target murid</td>
            <td>Reguler</td>
          </tr>
          <tr>
            <td>Prasyarat kompetensi</td>
            <td>Peserta didik dapat menganalisis dan menafsirkan grafik pada gerak lurus</td>
          </tr>
      </table>
    </div>`;
  info.innerHTML = innerHtml;
}

function pert1(attr) {
  setActive(attr);

  let innerhtml1 = `<h3>Kegiatan Pembelajaran Pertemuan 1</h3>
                    <div class="container">
                        <table class='table table-bordered'>
                            <tr>
                                <th>Kegiatan pembelajaran</th>
                                <th>Deskripsi kegiatan</th>
                                <th>Alokasi waktu</th>
                            </tr>
                            <tr>
                                <td rowspan='4'>Pendahuluan</td>
                                <td>Guru membuka pembelajaran dengan memberikan salam kepada siswa</td>
                                <td rowspan='4'>10 menit</td>
                            </tr>
                            <tr>
                                <td>Guru meminta siswa mempersiapkan diri untuk memulai permbelajaran dan  guru memberikan motivasi sebelum pembelajaran dimulai</td>
                            </tr>
                            <tr>
                            
                                <td>Guru memeriksa kehadiran siswa</td>
                            
                            </tr>
                            <tr>
                            
                                <td>Guru memberikan pertanyaan pemantik mengenai kejadian sehari-hari yang berkaitan dengan gerak lurus berubah beraturan (GLBB)</td>
                        
                            </tr>
                            <tr>
                                <td colspan='3'>Menentukan proyek</td>
                          
                            </tr>
                            <tr>
                              <td rowspan='8'>Kegiatan Inti</td>
                            </tr>
                            <tr>
                                <td>Guru meminta siswa membuka perangkat handphone atau laptop untuk mengakses platform pembelajaran T-TAS melalui link yang diberikan oleh guru.</td>
                                <td>5 menit</td>
                            </tr>
                            <tr>
                              <td>Siswa diminta untuk membuat akun dan login untuk melakukan pembelajaran melalui platform T-TAS</td>
                              <td>15 menit</td>
                            </tr>
                            <tr>
                              <td>Setelah login siswa diminta untuk mengakses dan membaca materi pada menu overview</td>
                            </tr>
                            <tr>
                               <td>Guru memberikan penjelasan mengenai gerak lurus berubah beraturan dan siswa memperhatikan penjelasan singkat guru</td>
                               <td>20 menit</td>
                            </tr>
                            <tr>
                              <td>Guru membentuk kelompok sebanyak 5 dengan beranggotakan 5-6 peserta didik.Selanjutnya, Guru memberikan pengarahan kepada para peserta didik  membangun sebuah proyek yang sesuai pada materi yang telah dibahas di menu forum diskusi. </td>
                              <td>5 menit</td>
                            </tr>

                            <tr>
                              <td>Peserta didik mulai berdiskusi di menu forum diskusi dengan kelompoknya masng-masing yang dibimbing oleh guru.</td>
                              <td>20 menit</td>
                            </tr>

                            <tr>
                              <td>Setelah berdiskusi, guru meminta masing-masing kelompok memberitahukan proyek akan dikerjakan. Setelahnya guru meminta peserta didik untuk melakukan verifikasi telah bergabung dengan kelompok di platform T-TAS</td>
                              <td>10 menit</td>
                            </tr>
                            <tr>
                              <td>Penutup</td>
                              <td>Guru memberikan apresiasi atas pembelajaran yang telah dilakukan dan guru mengakhiri pembelajaran</td>
                              <td>5 menit</td>
                            </tr>
                        </table>
                    </div>`
  info.innerHTML = innerhtml1;
}

function pert2(attr) {

  setActive(attr);
  let innerhtml2 = `<h3>Kegiatan Pembelajaran Pertemuan 2</h3>
  <div class="container">
      <table class='table table-bordered'>
          <tr>
              <th>Kegiatan pembelajaran</th>
              <th>Deskripsi kegiatan</th>
              <th>Alokasi waktu</th>
          </tr>
          <tr>
              <td rowspan='4'>Pendahuluan</td>
              <td>Guru membuka pembelajaran dengan memberikan salam kepada siswa</td>
              <td rowspan='4'>10 menit</td>
          </tr>
          <tr>
          
              <td>Guru memeriksa kehadiran siswa</td>
          
          </tr>
          <tr>
          
              <td>Guru meminta siswa mempersiapkan diri dan guru memberikan motivasi kepada siswa sebelum memulai pembelajaran</td>
      
          </tr>
          <tr>
              <td>Guru memberikan apersepsi mengenai pembelajaran sebelumnya</td>
          </tr>
          <tr>
              <td colspan='3'>Menentukan proyek</td>
        
          </tr>
          <tr>
            <td rowspan='4'>Kegiatan Inti</td>
            <td>Guru meminta masing-masing kelompok menyampaikan idenya mengenai proyek yang telah ditetapkan.</td>
            <td>10 menit</td>
          </tr>

        <tr>
          <td>Guru bersama peserta didik mencari referensi yang berkaitan dengan materi gerak lurus berubah beraturan sebanyak 2 dan mengumpulkannya di platform T-TAS</td>
          <td>30 menit</td>
        </tr>
        <tr>
          <td>Setelah referensi terkumpul, peserta didik kembali berdiskusi mengenai materi yang telah dikumpulkan untuk menghasilkan sebuah rancangan proyek</td>
          <td>20 menit</td>
        </tr>
        <tr>
           <td>Guru bersama para peserta didik di masing-masing kelompok membuat rancangan proyek</td>
           <td>15 menit</td>
        </tr>
    
        <tr>
          <td rowspan='2'>Penutup</td>
          <td>Guru melakukan pengarahan untuk membuat timeline pengerjaan proyek di platform T-TAS</td>
          <td >5 menit</td>
        </tr>
        <tr>
          <td>Guru memberikan salam kepada para peserta didik untuk mengakhiri pembelajaran<td>
          
        </tr>
      </table>
  </div>`;

  info.innerHTML = innerhtml2;
}

function pert3(attr){
  setActive(attr);

  let innerhtml3 = `<h3>Kegiatan Pembelajaran Pertemuan 3</h3>
  <div class="container">
      <table class='table table-bordered'>
          <tr>
              <th>Kegiatan pembelajaran</th>
              <th>Deskripsi kegiatan</th>
              <th>Alokasi waktu</th>
          </tr>
          <tr>
              <td rowspan='4'>Pendahuluan</td>
              <td>Guru membuka pembelajaran dengan memberikan salam kepada siswa</td>
              <td rowspan='4'>10 menit</td>
          </tr>
          <tr>
          
              <td>Guru memeriksa kehadiran siswa</td>
          
          </tr>
          <tr>
          
              <td>Guru meminta siswa mempersiapkan diri dan guru memberikan motivasi kepada siswa sebelum memulai pembelajaran</td>
      
          </tr>
          <tr>
              <td>Guru memberikan apersepsi mengenai pembelajaran sebelumnya</td>
          </tr>
          <tr>
              <td colspan='3'>Monitoring perkembangan proyek</td>
        
          </tr>
          <tr>
            <td rowspan='3'>Kegiatan Inti</td>
            <td>Guru meminta masing-masing kelompok menyampaikan progress perkembangan proyek yang telah berjalan</td>
            <td>20 menit</td>
          </tr>

        <tr>
          <td>Guru bersama peserta didik melakukan diskusi untuk memberikan solusi penyelesaian masalah pada masing-masing kelompok</td>
          <td>50 menit</td>
        </tr>
        <tr>
          <td>Jika siswa tidak mengalami kendala, maka guru memberikan pengarahan dan melakukan diskusi mengenai pembuatan laporan proyek yang telah dikerjakan (opsional)</td>
          <td>50 menit</td>
        </tr>
    
        <tr>
          <td rowspan='2'>Penutup</td>
          <td>Guru bersaama siswa mengevaluasi perkembangan proyek</td>
          <td >10 menit</td>
        </tr>
        <tr>
          <td>Guru memberikan salam kepada para peserta didik untuk mengakhiri pembelajaran<td>
          
        </tr>
      </table>
  </div>`;
  info.innerHTML=innerhtml3;
}

function pert4(attr){
  setActive(attr);

  let innerhtml4 = `<h3>Kegiatan Pembelajaran Pertemuan 4</h3>
  <div class="container">
      <table class='table table-bordered'>
          <tr>
              <th>Kegiatan pembelajaran</th>
              <th>Deskripsi kegiatan</th>
              <th>Alokasi waktu</th>
          </tr>
          <tr>
              <td rowspan='4'>Pendahuluan</td>
              <td>Guru membuka pembelajaran dengan memberikan salam kepada siswa</td>
              <td rowspan='4'>10 menit</td>
          </tr>
          <tr>
          
              <td>Guru memeriksa kehadiran siswa</td>
          
          </tr>
          <tr>
          
              <td>Guru meminta siswa mempersiapkan diri dan guru memberikan motivasi kepada siswa sebelum memulai pembelajaran</td>
      
          </tr>
          <tr>
              <td>Guru memberikan apersepsi mengenai pembelajaran sebelumnya</td>
          </tr>
          <tr>
              <td colspan='3'>Monitoring perkembangan proyek</td>
        
          </tr>
          <tr>
            <td rowspan='3'>Kegiatan Inti</td>
            <td>Guru meminta masing-masing kelompok menyampaikan progress perkembangan proyek yang telah berjalan</td>
            <td rowspan='3'>70 menit</td>
          </tr>

        <tr>
          <td>Guru bersama siswa melakukan diskusi untuk memberikan solusi penyelesaian masalah pada masing-masing kelompok</td>
      
        </tr>
        <tr>
          <td>Jika kelompok telah selesai mengerjakan proyek, guru meminta kelompok tersebut melakukan percobaan dengan mengikuti petunjuk di LKPD dibimbing oleh guru (opsional)</td>
          
        </tr>
    
        <tr>
          <td rowspan='2'>Penutup</td>
          <td>Guru memberikan pengarahan kepada peserta didik untuk pertemuan terakhir</td>
          <td>10 menit</td>
        </tr>
        <tr>
          <td>Guru memberikan salam kepada para peserta didik untuk mengakhiri pembelajaran<td>
          
        </tr>
      </table>
  </div>`;
  info.innerHTML=innerhtml4;
}

function pert5(attr){

  setActive(attr);
  let innerhtml5 = `<h3>Kegiatan Pembelajaran Pertemuan 5</h3>
  <div class="container">
      <table class='table table-bordered'>
          <tr>
              <th>Kegiatan pembelajaran</th>
              <th>Deskripsi kegiatan</th>
              <th>Alokasi waktu</th>
          </tr>
          <tr>
              <td rowspan='4'>Pendahuluan</td>
              <td>Guru membuka pembelajaran dengan memberikan salam kepada siswa</td>
              <td rowspan='4'>10 menit</td>
          </tr>
          <tr>
          
              <td>Guru memeriksa kehadiran siswa</td>
          
          </tr>
          <tr>
          
              <td>Guru meminta siswa mempersiapkan diri dan guru memberikan motivasi kepada siswa sebelum memulai pembelajaran</td>
      
          </tr>
          <tr>
              <td>Guru memberikan apersepsi mengenai pembelajaran sebelumnya</td>
          </tr>
          <tr>
              <td colspan='3'>Presentasi Hasil</td>
        
          </tr>
          <tr>
            <td rowspan='3'>Kegiatan Inti</td>
            <td>Guru mempersiapkan para peserta didik mengakses platform T-TAS untuk melakukan presentasi proyek</td>
            <td rowspan='3'>70 menit</td>
          </tr>

        <tr>
          <td>Setiap Kelompok mempresentasikan hasil kerjanya</td>
      
        </tr>
        <tr>
          <td>Masing-masing perwakilan kelompok memberikan penilaian dan melontarkan pertanyaan kepada kelompok yang bertugas dalam presentasi</td>
          
        </tr>
    
        <tr>
          <td rowspan='3'>Penutup</td>
          <td>Guru bersama siswa melakukan refleksi pengerjaan proyek</td>
          <td>10 menit</td>
        </tr>
        <tr>
          <td>Guru memberi apresiasi dan pujian kepada para peserta didik </td>
        </tr>
        <tr>
          <td>Guru memberikan salam kepada para peserta didik untuk mengakhiri pembelajaran<td>
          
        </tr>
      </table>
  </div>`;
  info.innerHTML=innerhtml5;
}
