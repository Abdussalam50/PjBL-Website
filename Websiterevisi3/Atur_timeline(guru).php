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
  <meta http-equiv="Expires" content=0>
  <title>Timeline siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/Atur_timeline(guru).css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!-----------------------Navigation--------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["username"]) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo $_SESSION["IdUser"] ?></a>
          </li>
          <li class="nav-item justify-content-center">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-----------------------Body section for timeline list------------------------------------->

  <div id="body-container" class="container-fluid  row p-0 m-0" height="740px">
    <div id="class-list" class="container-fluid m-0 p-0 col-12 col-sm-4 border border-end-secondary" height="740px">
      <h2 class="fw-bold text-secondary fs-4 py-2 ps-3"> <i class="bi bi-people-fill"></i> Daftar Kelas</h2>

    </div>

    <!---------------------Timeline list------------------------------------------------>
    <div id="timeline-list" class="container-fluid col-12 col-sm-8 p-0" style="height:740px;">
      <div class="dropdown" id="dropdowns">
        <i class="bi bi-three-dots-vertical" data-bs-toggle="dropdown" aria-expanded="false"></i>

        <ul class="dropdown-menu">
          <li><a href="DiskusiGuru.php" class="dropdown-item"><i class="bi bi-chat-left-text-fill text-success"></i> Forum Diskusi</a></li>
          <li><a href="Perpustakaan(guru).php" class="dropdown-item"><i class="bi bi-journal "></i> Perpustakaan</a></li>
          <li><a href="Rencana-proyek(guru).php" class="dropdown-item"><i class="bi bi-diagram-2"></i> Rencana Proyek</a></li>
          <li><a href="Atur_timeline(guru).php" class="dropdown-item"><i class="bi bi-alarm-fill text-warning"></i> Timeline & Monitoring</a></li>
          <li><a href="Laporan-project(guru).php" class="dropdown-item"><i class="bi bi-flag-fill"></i> Laporan Proyek</a></li>
          <li><a href="Presentasi2.php" class="dropdown-item"><i class="bi bi-file-earmark-play"></i> Presentasi Proyek</a>
          <li><a href="Penilaian.php" class="dropdown-item"><i class="bi bi-clipboard-data"></i> Penilaian</a></li>
        </ul>

      </div>
      <div class="container-fluid  py-3 ps-2 pe-0">
        <h2 class="fw-bold fs-3 text-secondary"><i class="bi bi-calendar2-range"></i> Timeline Siswa</h2>
        <?php include "Controller/receiveTimelineGuru.php" ?>

      </div>
    </div>
  </div>
  </div>

  <button class="btn btn-primary rounded-circle position-absolute top-50 start-0 d-block d-sm-none z-2" id="btn-content"><i class="bi bi-arrow-up-circle-fill text-white" id="iconContent"></i></button>
  <!----------------------Footer---------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>const userClass=<?php print_r(json_encode(ucwords($_SESSION["Class"])))?></script>
  <script src="JS/receiveViewClass.js"></script>
  <script src="JS/classListToggle.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
</body>

</html>