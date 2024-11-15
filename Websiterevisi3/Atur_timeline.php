<?php
include "Controller/VerifySessionSiswa.php";
include "Controller/ReceiveTimeline.php";
include "Controller/sendTimeline.php";
include "Controller/uploadTimelineSiswa.php";
include "Controller/EditUploaditemTimeline.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Timeline Anda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!-------------Navigation------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-siswa.php"> Home </a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["Role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["Role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["username"]) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["student"]) ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!----------Section------------------------>
  <div class="container-fluid d-flex justify-content-center flex-column mt-4">
    <form action="" method="post">
      <div class="container-lg">
        <h2 class="fw-bold"> <i class="bi bi-calendar-week"></i> Buat Timeline</h2>
        <label for="" class="form-label">Nama Tahap Project</label>
        <input type="text" class="form-control" placeholder="eg.Perencanaan medan Gauss" name="step" id="nameStep">
        <label for="" class="form-label">Kelompok</label>
        <input type="text" class="form-control" placeholder="eg.Kelompok 1" name="groupName" id="groups">
        <label for="" class="form-label">Kelas</label>
        <input type="text" class="form-control" name="class" id="classes">
        <label for="" class="form-label">Waktu</label>
        <input type="datetime-local" class="form-control" name="time" id="time">
      </div>
      <div class="container-sm d-flex justify-content-end mt-3">
        <button class="btn btn-dark" type="submit" name="setTimeline">Simpan Timeline</button>
      </div>
    </form>
  </div>
  <!----------Section timeline list---------------->
  <div class="container-lg">
    <div class="dropdown" id="dropdowns">
      <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>

          <ul class="dropdown-menu">
            <li><a href="Diskusi-kelompok-siswa.php" class="dropdown-item"><i class="bi bi-chat-left-text-fill text-success"></i> Forum Diskusi</a></li>
            <li><a href="Perpustakaan(siswa).php" class="dropdown-item"><i class="bi bi-journal "></i> Perpustakaan</a></li>
            <li><a href="Menu_proyek.php#rencanaProyek" class="dropdown-item"><i class="bi bi-diagram-2"></i> Rencana Proyek</a></li>
            <li><a href="Menu_proyek.php#timeline" class="dropdown-item"><i class="bi bi-alarm-fill text-warning"></i> Timeline & Monitoring</a></li>
            <li><a href="Menu_proyek.php#laporan" class="dropdown-item"><i class="bi bi-flag-fill"></i> Laporan Proyek</a></li>
            <li><a href="Menu_proyek.php#presentation" class="dropdown-item"><i class="bi bi-file-earmark-play"></i> Presentasi Proyek</a>
            <li><a href="Refleksi.php" class="dropdown-item"><i class="bi bi-clipboard-data"></i> Penilaian</a></li>
          </ul>

    </div>
    <h5 class="text-lead fw-bold textdark"><i class="bi bi-bar-chart-fill"></i> Progress timeline kelompok anda saat ini :</h5>
    <div id="progress" class="container-lg progress mt-3" role="progressbar" aria-label="Warning example" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
      <div id="progress-stick" class="progress-bar bg-warning text-dark" style="width: 75%"></div>
    </div>
  </div>
  <div class="container-fluid d-flex flex-column align-items-center justify-content-around pt-5 pb-1" id="container-timeline">

  </div>


  </div>

  </div>
  <!-----------Footer----------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    const users = <?php print_r(json_encode($_COOKIE["grpName"])) ?>;
  </script>
  <script src="Controller/JsController/ProgressBar.js"></script>
  <script>
    const modulus = <?php print_r(json_encode($_SESSION["classStd"], JSON_UNESCAPED_UNICODE)) ?>;
    const role = <?php print_r(json_encode($_SESSION['Role'])) ?>;
  </script>
  <script src="Controller/JsController/receiveTimeline.js"></script>
  <script src="JS/SteadyState.js"></script>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
</body>

</html>