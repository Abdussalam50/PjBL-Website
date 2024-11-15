<?php
include "Controller/VerifySessionGuru.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penilaian Proyek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!---------------Navigation-------------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="ddashboard-guru.php">Home </a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"])) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["IdUser"]) ?></a>
          </li>
          <li class="nav-item justify-content-center">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!--------------------Section Body------------------------------------------------------------>
  <section class="overflow-y-auto">
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
      <h3 class="fs-3 text-dark"> <i class="bi bi-bar-chart-fill"></i> Penilaian Proyek</h3>
      <div class='container-fluid row'>

        <p class='text-lead col-12 col-sm-11'>Penilaian ini dilakukan untuk memberikan nilai keseluruhan proyek yang telah dikerjakan siswa sejak anda memberikan penugasan proyek</p>
        <div class="dropdown col-12 col-sm-1">
          <a class="btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rubrik Penilaian
          </a>

          <div class="dropdown-menu">
            <div class="container-fluid">
              <h4 class="fs-3 text-dark">Rubrik Penilaian Proyek</h4>
              <div class="container-fluid">
                <div class="container-fluid p-0">
                  <h5 class="text-lead fs-4">A. Tujuan Esensial</h5>
                  <p class="text-lead text-justify text-dark">
                    Membuat sebuah produk yang dapat menunjukkan dan menjelaskan
                    kasus air bag pada mobil saat terjadi tabrakkan.
                    Sebelum pengerjaan, pastikan sebisa mungkin merujuk pada sumber-sumber
                    literature yang ada diluar buku paket anda. Hasil alat yang telah dibuat akan diperagakan dan
                    dipresentasikan.
                  </p>
                </div>
                <div class="table-responsive">
                  <h5 class="text-lead fs-4">B. Rubrik Penilaian Proyek</h5>
                  <table class="table align-middle table-striped">
                    <thead>
                      <tr class="align-items-center">
                        <th>No</th>
                        <th>Aspek yang dinilai</th>
                        <th>3</th>
                        <th>2</th>
                        <th>1</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr class="align-items-center">
                        <td>1</td>
                        <td>Menentukan tujuan pengamatan</td>
                        <td>Tujuan ditulis dengan lengkap dan jelas</td>
                        <td>Tujuan ditulis dengan lengkap tapi tidak jelas</td>
                        <td>Tujuan ditulis tidak lengkap dan tidak jelas</td>
                      </tr>
                      <tr class="align-bottom">
                        <td>2</td>
                        <td>Mencari dan memerhatikan sumber/referensi pendukung</td>
                        <td>Menggunakan dua referensi atau lebih, baik dari buku dan internet (Diluar buku siswa)</td>
                        <td>Menggunakan minimal dua referensi diluar buku siswa</td>
                        <td>Hanya menggunakan buku siswa untuk dijadikan sebagai sumber referensi</td>
                      </tr>
                      <tr>
                        <td>3</td>
                        <td>Pembuatan rancangan produk</td>
                        <td class="align-top">Rancangan produk yang dibuat jelas beserta dengan keterangan nya dan dibuat berdasarkan lebih dari satu referensi pendukung</td>
                        <td>Rancangan produk yang dibuat jelas tapi tidak ada keterangannya. Rancangan dibuat berdasarkan hanya satu referensi pendukung</td>
                        <td>Rancangan produk yang dibuat tidak jelas dan tidak dibuat berdasarkan referensi pendukung</td>
                      </tr>
                      <tr>
                        <td>4</td>
                        <td>Produk dibuat berdasarkan desain yang telah ditetapkan</td>
                        <td class="align-top">Produk yang dibuat ada beberapa dibuat berdasarkan desain yang telah ditetapkan</td>
                        <td>Produk dibuat ada beberapa dibuat berdasarkan desain yang telah ditetapkan</td>
                        <td>Produk tidak dibuat berdasarkan desain yang telah ditetapkan</td>
                      </tr>
                      <tr>
                        <td>5</td>
                        <td>Kualitas Produk yang dibuat</td>
                        <td class="align-top">Produk yang telah dibuat dapat menjelaskan fenomena kinematika gerak lurus dengan baik. </td>
                        <td>Produk yang dibuat dapat menjelaskan fenomena gerak lurus berubah beraturan (GLBB) pada kasus penggunaan air bag saat mobil mengalami kecelakaan,namun kurang sempurna.</td>
                        <td>Produk yang dibuat tidak dapat menjelaskan fenomena gerak lurus berubah beraturan (GLBB) pada kasus penggunaan air bag saat mobil mengalami kecelakaan.</td>
                      </tr>
                      <tr>
                        <td>6</td>
                        <td>Menjelaskan gerak lurus yang telah dipilih melalui alat yang dibuat</td>
                        <td class="align-top">Dapat menjelaskan dengan jelas dan ringkas karakteristik gerak lurus yang dipilih baik dari keadaan awal dan akhir benda, atau benda mengalami percepatan</td>
                        <td>Dapat menjelaskan karakteristik gerak lurus yang dipilih dengan jelas seperti mengidentifikasi keadaan awal dan akhir benda atau benda mengalami percepatan tapi tidak ringkas.</td>
                        <td>Dapat menjelaskan karakteristik gerak benda namun tidak jelas dan ringkas.</td>
                      </tr>
                      <tr>
                        <td>7</td>
                        <td>Menyimpulkan kemampuan produk yang dibuat</td>
                        <td class="align-top">Menyimpulkan kemampuan produk yang telah dibuat dengan objektif.</td>
                        <td>Menyimpulkan kemampuan Produk yang telah dibuat tapi sebagian tidak objektif</td>
                        <td>Menyimpukan kemampuan Produk yang telah dibuat tapi tidak objektif.</td>
                      </tr>
                      <tr>
                        <td>8</td>
                        <td>Originalitas desain Produk yang dibuat</td>
                        <td class="align-top">Produk tidak dibuat menjiplak dari sumber manapun </td>
                        <td>Produk dibuat dengan menjiplak sebagian dari sumber tertentu</td>
                        <td>Produk dibuat dengan cara menjiplak secara keseluruhan dari sumber tertentu</td>
                      </tr>
                      <tr>
                        <td>9</td>
                        <td>Nilai estetika </td>
                        <td class="align-top">Produk yang dibuat memiliki nilai seni dan estetis </td>
                        <td>Produk yang dibuat sebagian memiliki nilai seni dan estetis</td>
                        <td>Produk yang dibuat secara keseluruhan tidak memiliki nilai seni dan tidak estetis</td>
                      </tr>

                      <tr>
                        <td>10</td>
                        <td>Ketepatan waktu mengumpulkan Produk </td>
                        <td class="align-top">Tepat waktu sesuai deadline</td>
                        <td>Terlambat satu hari atau menyusul</td>
                        <td>Terlambat beberapa hari</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered">
        <tr>
          <th>No</th>

          <th colspan="2">Aspek yang dinilai</th>
          <th>Skor</th>
        </tr>

        <tr>
          <td rowspan="2">1</td>
          <th rowspan="2">Tahap perencanaan</th>
          <td>
            Membuat rancangan alat peraga
          </td>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>

          <td> Menggunakan sumber/referensi pendukung</td>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>

        <tr>
          <td rowspan="2">2</td>
          <th rowspan="2">Tahap Pelaksanaan</th>
          <td>
            Pembuatan produk
          </td>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>

          <td> Kualitas alat yang dibuat</td>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>
          <td rowspan="2">3</td>
          <th rowspan="2">Tahap Penutup</th>
          <td>
            Menjelaskan gerak lurus yang dipilih
          </td>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>
          <td> Menyimpulkan kemampuan alat peraga yang dibuat</td>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>
          <td>4</td>
          <th colspan="2"> Originalitas alat peraga yang dibuat</th>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>
          <td>5</td>
          <th colspan="2">Nilai estetika produk</th>

          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
        <tr>
          <td>6</td>
          <th colspan="2">Ketepatan waktu</th>
          <td><input class="form-control border-0" placeholder="Rentang skor 1-3" type="number" name="" id="" style="width:100%"></td>
        </tr>
      </table>
      <div class="container-fluid d-flex justify-content-end py-3">
        <button type="submit" class="btn btn-dark text-white" id="submitNilaiProyek">Submit penilaian</button>
      </div>
    </div>
  </section>
  <!---------------------Footer------------------------------------------------------------------------>
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/receivePrmPenilaianProyek.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script>
    const Classes = <?php print_r(json_encode($_SESSION["Class"])) ?>
  </script>
  <script src="Controller/JsController/getProjectScore.js"></script>
</body>

</html>