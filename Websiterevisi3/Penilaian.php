<?php
include "Controller/VerifySessionGuru.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="no-cache" content=0>
  <title>Penilaian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!------------Navigation---------------->
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
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"])) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["IdUser"]) ?></a>
          </li>
          <li class="nav-item justify-content-center" id='li-img'>
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!---------------------------Section Body--------------------------->
  <section class="overflow-y-auto" style="height:100vh; ">
    <h2 class="fs-3 text-dark fw-bold"> <i class="bi bi-bar-chart-fill"></i>Penilaian</h2>
    <div class="container-fluid row ms-1 ps-0">
      <div class="container-fluid col-12 col-sm-4 list-group list-group-action rounded-0 py-3 py-sm-0 pe-0" id="listClass">

      </div>
      <div class="container-fluid col-12 col-sm-8 pe-0 ps-0">
        <div class="dropdown" id="dropdowns">
          <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>

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
        <div class="container-fluid ps-0 ps-sm-3 pe-0">
          <div class="row" id="blockGroup">

          </div>
        </div>

      </div>
    </div>
    <div class="container-fluid table-responsive" id="table-container">
      <h4 class="fs-3 text-dark fw-bold"> <i class="bi bi-bar-chart-fill"></i> Nilai Kelompok</h4>

    </div>
    <div class="dropdown d-flex justify-content-end p-3">
      <a class="btn btn-sm btn-dark dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Lihat peer assessment
      </a>

      <div class="dropdown-menu container-fluid p-3">
        <h3 class="fs-4 text-dark"> <i class="bi bi-bar-chart-fill"></i> Penilaian Antar Siswa</h3>
        <div class="btn-group p-3" role="group" aria-label="Basic radio toggle button group" id='listMeet'>
          <input type="radio" class="btn-check" name="btnradio" id="btnradio0" autocomplete="off" value='Nilaitotal' checked>
          <label class="btn btn-sm btn-outline-dark" for="btnradio0">Nilai total</label>
          <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" value='Pertemuan1'>
          <label class="btn btn-sm btn-outline-dark" for="btnradio1">Pertemuan 1</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" value='Pertemuan2'>
          <label class="btn btn-sm btn-outline-dark" for="btnradio2">Pertemuan 2</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio3" autocomplete="off" value='Pertemuan3'>
          <label class="btn btn-sm btn-outline-dark" for="btnradio3">Pertemuan 3</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio4" autocomplete="off" value='Pertemuan4'>
          <label class="btn btn-sm btn-outline-dark" for="btnradio4">Pertemuan 4</label>

          <input type="radio" class="btn-check" name="btnradio" id="btnradio5" autocomplete="off" value='Pertemuan5'>
          <label class="btn btn-sm btn-outline-dark" for="btnradio5">Pertemuan 5</label>
        </div>
        <div class="container-fluid" id="dropMenu"></div>
      </div>
    </div>
  </section>




  <!------------------Footer----------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script>
    const nameUser = <?php print_r(ucwords(json_encode($_SESSION["username"]), JSON_UNESCAPED_SLASHES)) ?>
  </script>
  <script src="Controller/JsController/receiveClassForPenilaian.js"></script>
  <script src="Controller/JsController/receiveBlockProject-penilaian.js"></script>
  <script>
    const ClassId = <?php echo json_encode($_SESSION["Class"]) ?>;
  </script>
  <script src="Controller/JsController/getNilaiKelompok.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/meetList.js"></script>
</body>

</html>