<?php
include "Controller/VerifySessionGuru.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penilaian Presentasi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!-------------------Navigation------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-guru.php">Home </a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"]))
                                                                                                ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["IdUser"])
                                                                                                ?></a>
          </li>
          <li class="nav-item justify-content-center">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!----------------------Section---------------------------------------------------->
  <section class="overflow-y-scroll">
    <div class="container-fluid">
    <div class="dropdown" id="dropdowns">
          <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" aria-expanded="false" ></i>
         
            <ul class="dropdown-menu">
              <li><a href="DiskusiGuru.php" class="dropdown-item"><i class="bi bi-chat-left-text-fill text-success"></i> Forum Diskusi</a></li>
              <li><a href="Perpustakaan(guru).php" class="dropdown-item"><i class="bi bi-journal "></i> Perpustakaan</a></li>
              <li><a href="Menu_proyek_Guru.php#rencanaProyek" class="dropdown-item"><i class="bi bi-diagram-2"></i> Rencana Proyek</a></li>
              <li><a href="Menu_proyek_Guru.php#timeline" class="dropdown-item"><i class="bi bi-alarm-fill text-warning"></i> Timeline & Monitoring</a></li>
              <li><a href="Menu_proyek_Guru.php#laporan" class="dropdown-item"><i class="bi bi-flag-fill"></i> Laporan Proyek</a></li>
              <li><a href="Menu_proyek_Guru.php#presentation" class="dropdown-item"><i class="bi bi-file-earmark-play"></i> Presentasi Proyek</a>
              <li><a href="Menu_proyek_Guru.php#penilaian" class="dropdown-item"><i class="bi bi-clipboard-data"></i> Penilaian</a></li>
            </ul>
         
        </div>
      <h3 class="text-dark fs-3"> <i class="bi bi-bar-chart-fill"></i> Penilaian Presentasi</h3>
      <p class="lead text-dark text-justify">
        Silahkan berikan nilai atas hasil presentasi yang dilakukan oleh masing-masing kelompok dari siswa-siswa anda. Sebelum melakukan penilaian perlu untuk melihat rubrik penilaian dibawah ini.
      </p>
      <div class="container-fluid my-3">
        <div class="dropdown">
          <a class="btn btn-dark dropdown-toggle btn-sm " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rubrik penilaian
          </a>

          <div class="dropdown-menu container-sm">
            <h3 class="fs-3 text-dark ms-2 fw-semi-bold">Rubrik Penilaian Presentasi</h2>
              <div class="table-responsive container-md">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th rowspan="2">Kriteria Penilaian</th>
                      <th rowspan="2">Indikator</th>
                      <th colspan="3">Nilai</th>
                    </tr>
                    <tr>
                      <th>Baik</th>
                      <th>Cukup</th>
                      <th>Kurang</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Media</td>
                      <td>Menyampaikan Presentasi dengan media yang menarik</td>
                      <td>Media presentasi menarik, tulisan jelas, perpaduan warna pas</td>
                      <td>
                        Media presentasi monoton,tulisan kurang jelas,perpaduan warna pas
                      </td>
                      <td>
                        Media presentasi monoton,tulisan tidak jelas, perpaduan warna kurang pas

                      </td>
                    </tr>
                    <tr>
                      <td>Hasil Pengamatan</td>
                      <td>Menyampaikan hasil pengamatan dengan lugas dan berbasis data yang relevan</td>
                      <td>Data hasil pengamatan disampaikan dengan jelas didukung sumber terpercaya </td>
                      <td>Data hasil pengamatan tidak jelas disampaikan dengan didukung sumber terpercaya</td>
                      <td>Data hasil pengamatan tidak jelas dan tidak didukung sumber terpercaya</td>
                    </tr>
                    <tr>
                      <td>Sistematika</td>
                      <td>Menyampaikan presentasi sistematis</td>
                      <td>Sistematika tulisan sesuai dengan urutan</td>
                      <td>Sistematika sesuai namun ada yang tidak berurutan</td>
                      <td>Sistematika tulisan tidak sesuai dengan urutan</td>
                    </tr>
                    <tr>
                      <td>Penguasaan Konsep</td>
                      <td>Menguasai konsep saat presentasi</td>
                      <td>Presentasi dengan percaya diri dan menyampaikan materi dengan jelas</td>
                      <td>Presentasi kurang percaya diri namun menyampaikan materi dengan jelas</td>
                      <td>Presentasi tidak percaya diri dan penyampaian materi tidak jelas</td>
                    </tr>
                    <tr>
                      <td>Sumber Rujukan</td>
                      <td>Mengaitkan pembahasan dengan rujukan ilmiah</td>
                      <td>Mengkaitkan pembahasan dengan rujukan ilmiah</td>
                      <td>Pembahasan sesuai hasil dan mencantumkan sumber informasi</td>
                      <td>Pembahasan sesuai hasil dan tidak mencantumkan sumber informasi</td>
                    </tr>
                    <tr>
                      <td>Penguasaan kelas</td>
                      <td>Kemampuan menguasai kelas dengan baik</td>
                      <td>Kemampuan menguasai kelas dengan baik</td>
                      <td>Intonasi suara jelas dan besar, kelas tidak ribut dan memperhatikan dengan baik presenter</td>
                      <td>Intonasi suara tidak jelas dan kecil, kelas tidak ribut namun banyak yang tidak memperhatikan presenter Intonasi suara tidak jelas, kelas ribut dan banyak yang tidak memperhatikan kelompok</td>
                    </tr>
                    <tr>
                      <td>Diskusi</td>
                      <td>Memberi kesempatan pada audiens uuntuk bertanya, dan menyampaikan saran</td>
                      <td>Memberi kesempatan kepada audiens untuk bertanya dan menyampaikan saran</td>
                      <td>Memberi kesempatan kepada audiens untuk bertanya namun tidak mau menerima saran</td>
                      <td>Tidak memberi kesempatan kepada audiens untuk bertanya dan tidak mau menerima saran</td>
                    </tr>
                    <tr>
                      <td>Menanggapi</td>
                      <td>Menjawab pertanyaan audiens dengan tepat</td>
                      <td>Menjawab pertanyaan audiens dengan tepat </td>
                      <td>Menjawab pertanyaan audiens kurang tepat</td>
                      <td>Menjawab pertanyaan audiens kurang tepat</td>
                    </tr>
                    <tr>
                      <td>Bahasa</td>
                      <td>Menggunakan bahasa Indonesia /asing degan benar</td>
                      <td>Bahasa yang digunakan merupakan bahasa baku</td>
                      <td>Bahasa yang digunakan merupakan bahasa baku yang bercampur dengan bahasa tidak formal</td>
                      <td>Bahasa yang digunakan merupakan bahasa sehari-hari yang bercampur dengan bahasa gaul</td>

                    </tr>
                    <tr>
                      <td>Pengelolaan waktu</td>
                      <td>Mengelola waktu presentasi dengan baik</td>
                      <td>Presentasi selesai tepat waktu sesuai kesempatan</td>
                      <td>Presentasi selesai dengan kelebihan waktu kurag dari 10 menit</td>
                      <td>Presentasi selesai dengan kelebihan waktu lebih dari 10 menit</td>
                    </tr>
                    <tr>
                      <td>Pembagian tugas</td>
                      <td>Membagi tugas anggota saat presentasi</td>
                      <td>Pembagian tugas seimbang </td>
                      <td>Pembagian tugas seimbang namun ada dominasi</td>
                      <td>Pembagian tugas tidak seimbang dan ada dominasi</td>
                    </tr>
                    <tr>
                      <td>Kerjasama</td>
                      <td>Bekerjasama antar anggota saat presentasi</td>
                      <td>Kompak dan kerjasama dengan baik</td>
                      <td>Kelompok kurang kompak dan kurang bekerjasama</td>
                      <td>Kelompok tidak kompak dan tidak mampu bekerjasama</td>
                    </tr>
                  </tbody>
                </table>
              </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered">
        <tbody>
          <tr>
            <td rowspan="2">No</td>
            <td rowspan="2">Kriteria Penilaian</td>
            <td colspan="3">Nilai</td>
          </tr>
          <tr>
            <td>Baik</td>
            <td>Cukup</td>
            <td>Kurang</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Media</td>
            <td><input type="checkbox" class="form-check-input" value="1" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" id="kurang"></td>
          </tr>
          <tr>
            <td>2</td>
            <td>Hasil Pengamatan</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>3</td>
            <td>Sistematika</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>4</td>
            <td>Penguasaan Konsep</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>5</td>
            <td>Sumber Rujukan</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>6</td>
            <td>Penguasaan Kelas</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>7</td>
            <td>Diskusi</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>8</td>
            <td>Menanggapi</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>9</td>
            <td>Bahasa</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>10</td>
            <td>Pengelolaan Waktu</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>11</td>
            <td>Pembagian Tugas</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
          </tr>
          <tr>
            <td>12</td>
            <td>Kerjasama</td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="baik"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="kurang"></td>
            <td><input type="checkbox" class="form-check-input" value="1" width="30%" id="cukup"></td>
          </tr>
        </tbody>
      </table>
      <div class="container-fluid d-flex justify-content-end">
        <button type="submit" class="btn btn-dark text-white" id="submitNilai">Submit Nilai</button>
      </div>
    </div>
  </section>

  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script>
    const thisClass = <?php echo json_encode($_SESSION["Class"]) ?>;
  </script>
  <script src="Controller/JsController/getScoreofAssignment.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
</body>

</html>