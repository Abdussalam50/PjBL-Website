<?php
include "Controller/VerifySessionGuru.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/RowClassLinkPrs.css">
  <title>Persiapan Presentasi</title>
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!----------------------Navigation-------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-guru.php">Home</a>
          </li>
          <li class="nav-item ps-5 "><a href="" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
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
  <!----------------Section------------------------------------------------------->
  <div class="container-fluid mt-3">
    <h2 class="text-secondary fs-1 "> <i class="bi bi-file-earmark-slides"></i> Presentasi Via Zoom</h2>

    <div class="container-fluid row p-0 mt-2" style="height:700px">
      <div class="col-12 col-sm-2 border-end border-secondary p-0" id="rowClass">
        <div class=" d-flex justify-content-center text-center" id="ListLink"><a href="#" class=" fw-bold fs-5 " style="width:100%"> <i class="bi bi-people-fill"></i> Kelas XIIMIPA1</a></div>
      </div>
      <div class="container-fluid col-12 col-sm-10">
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
        <form action="" method="post">
          <label for="" class="form-label">Nama Presentasi</label>
          <input type="text" class="form-control" id="title">
          <label for="" class="form-label">Link Zoom</label>
          <input type="text" class="form-control" id="Link">
          <button id="btn" type="submit" class="btn btn-dark text-white mt-3" name="SubmitLink">Submit</button>
        </form>
        <div class="list-group mt-5" id="containerList">

        </div>
      </div>
    </div>
  </div>
  <!-----------------BODY---------------------------------->
  <button class="btn btn-primary rounded-circle position-absolute top-50 start-0 d-block d-sm-none z-2" id="btn-content"><i class="bi bi-arrow-up-circle-fill text-white" id="iconContent"></i></button>
</body>
<footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
  <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
  <p class="text-lead text-center text-white">&copy Copyright 2023</p>
</footer>
<script>
  const userClass = <?php echo json_encode($_SESSION["Class"], JSON_UNESCAPED_UNICODE) ?>
</script>
<script src="JS/inputLinkHover.js"></script>
<script>
  const userId = <?php echo json_encode($_SESSION["username"], JSON_UNESCAPED_UNICODE) ?>
</script>
<script src="Controller/JsController/logoutTransfer.js"></script>
<script src="Controller/JsController/receiveListLinkPresentation.js"></script>
<script src="Controller/JsController/receiveCLassPresentation.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="Controller/JsController/sendLinkZoom.js"></script>
<script src="JS/addContentinput.js"></script>
<script src="JS/SteadyState.js"></script>

</html>