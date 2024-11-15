<?php include "Controller/VerifySessionGuru.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>Penilaian Laporan</title>
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-guru.php">
              Home</a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#">
              <?php print_r(ucwords($_SESSION["username"])) ?>
            </a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#">
              <?php echo $_SESSION["IdUser"] ?>
            </a>
          </li>
          <li class="nav-item justify-content-center">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">

    <div class="container-md ms-3 ps-0">
      <h4 class="text-dark fs-3 pt-4"> <i class="bi bi-bookmarks-fill"></i> Penilaian Laporan</h4>
      <p class="text-dark text-justify fs-5 lead">Isilah nilai dari laporan yang telah dikumpulkan oleh siswa anda !</p>
      <div class="container-fluid my-3">
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
        <div class="dropdown d-flex justify-content-end">
          <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rubrik penilaian
          </button>
          <div class="dropdown-menu container-fluid" style="background-color:#e9ecef">
            <div class="container-fluid p-3">
              <h4 class="fs4 text-dark">Rubrik Penilaian Laporan</h4>
              <p class="text-dark lead fs-5">Penilaian laporan siswa dilakukan dengan mengikuti kriteria penilaian pada rubrik laporan pada tabel dibawah ini. </p>
              <div class="table-responsive">
                <table class="table align-middle table-stripped">
                  <thead>
                    <tr class="align-items-center">
                      <th>Parameter penilaian</th>
                      <th>Kurang</th>
                      <th>Cukup</th>
                      <th>Baik</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="align-items-center">
                      <td>Penulisan laporan</td>
                      <td>
                        <ul>
                          <li>Banyak ditemukan kesalahan dalam pengetikan</li>
                          <li>Banyak kalimat yang sulit untuk dipahami</li>
                          <li>Dokumen tidak selesai</li>
                          <li>Penomoran untuk tabel, gambar, dan grafik tidak sesuai</li>
                        </ul>
                      </td>
                      <td>
                        <ul>
                          <li>Tidak ditemukan kesalahan dalam pengetikan</li>
                          <li>Kalimat-kalimat mudah untuk dipahami</li>
                          <li>Sebagian masih ditemukan kesalahan dalam penomoran tabel,grafik, dan gambar</li>
                        </ul>
                      </td>
                      <td>
                        <ul>
                          <li>Tidak ditemukan kesalahan dalam pengetikkan.</li>
                          <li>Kalimat-kalimat mudah dipahami</li>
                          <li>Penomoran tabel, grafik, dan gambar sudah benar </li>
                        </ul>
                      </td>
                    </tr>
                    <tr class="align-items-center">
                      <td>Pilihan kata yang digunakan</td>
                      <td>
                        <ul>
                          <li>50% dari penulisan laporan menggunkaan kata-kata yang tidak formal</li>
                          <li>Banyak penulisan kata dalam bentuk singkatan</li>
                        </ul>
                      </td>
                      <td>
                        <ul>
                          <li>20% dari penulisan laporan menggunakan kata-kata yang tidak formal</li>
                          <li>Tidak ditemukan penulisan kata dalam bentuk singkatan</li>
                        </ul>
                      </td>
                      <td>
                        <ul>
                          <li>Penulisan laporan semuanya menggunakan kata-kata formal</li>
                          <li>Tidak ditemukan penulisan kata-kata dalam bentuk singkatan</li>
                        </ul>
                      </td>
                    </tr>

                    <tr>
                      <td>Konten</td>
                      <td>
                        <ul>
                          <li>Informasi yang disampaikan tidak jelas, tidak akurat, tidak relevan</li>
                          <li>Banyak ditemukan copy paste tidak ada elaborasi</li>
                          <li>Isi laporan tidak sesuai dengan apa yang dibuat</li>
                        </ul>
                      </td>
                      <td>
                        <ul>
                          <li>Informasi yang disampaikan akurat, jelas, dan relevan</li>
                          <li>Sebagian masih ditemukan copy paste tidak ada elaborasi</li>
                          <li>30% isi laporan tidak sesuai dengan proyek yang dibuat</li>
                        </ul>
                      </td>
                      <td>
                        <ul>
                          <li>Informasi yang disampaikan akurat, jelas, dan relevan.</li>
                          <li>Masih ditemukan sedikit copy paste tidak ada elaborasi</li>
                          <li>Isi laporan semuanya sesuai dengan proyek yang dibuat</li>
                        </ul>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered align-middle">
        <tbody>
          <tr>
            <th>Indikator Penilaian</th>
            <th>Kurang</th>
            <th>Cukup</th>
            <th>Baik</th>
          </tr>
          <tr>
            <td>Penulisan laporan</td>
            <td><input type="radio" name="option1" id="kurang" class="form-check-input"></td>
            <td><input type="radio" name="option1" id="cukup" class="form-check-input"></td>
            <td><input type="radio" name="option1" id="baik" class="form-check-input"></td>
          </tr>

          <tr>
            <td>Pilihan kata yang digunakan</td>
            <td><input type="radio" name="option2" id="kurang" class="form-check-input"></td>
            <td><input type="radio" name="option2" id="cukup" class="form-check-input"></td>
            <td><input type="radio" name="option2" id="baik" class="form-check-input"></td>
          </tr>

          <tr>
            <td>Konten</td>
            <td><input type="radio" name="option3" id="kurang" class="form-check-input"></td>
            <td><input type="radio" name="option3" id="cukup" class="form-check-input"></td>
            <td><input type="radio" name="option3" id="baik" class="form-check-input"></td>
          </tr>
          <tr>
            <td class="fw-bold">Akumulasi nilai</td>
            <td colspan="3"></td>
          </tr>
        </tbody>
      </table>
      <div class="container-fluid d-flex justify-content-end py-4">
        <button type="submit" class="btn btn-dark text-white btn-md" onclick="getData()">Submit Nilai</button>
      </div>
    </div>
  </div>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script>
    const theClass = <?php echo json_encode($_SESSION["Class"]) ?>
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/getScoreOfReport.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
</body>

</html>