<?php
include "Controller/VerifySessionSiswa.php";
include "Controller/Logout.php";
include "View/headerProjectPage.php";
include "View/headerToProfile.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Siswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/dashboard-siswa.css">
</head>

<body style="background-color:#3B4560;">

  <!------Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item text-start ms-5 ms-sm-0">
            <a class="nav-link active " aria-current="page" href="#"><i class="bi bi-bell-fill text-warning"></i>Notifikasi</a>
          </li>
          <li class="nav-item d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link p-1 text-start d-sm-text-center" href="#"><?php echo ucwords(trim(json_encode($_SESSION["username"], JSON_UNESCAPED_UNICODE), '"')) ?></a>
            <a class="nav-link p-1 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["student"]) ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-------------Body------------>

  <div id="container-body" class="container-fluid p-0">
    <img src="css/img/bck-dashboard.jpg" alt="" class="" width="100%">
  </div>
  <!----------Section menu----------------------->
  <form action="" method="post">
    <div id="outer-menu" class="container-fluid pt-5 pb-2">
      <div id="inner-menu" class="container-lg ">
        <div class="row row-cols-1 g-4 row-cols-sm-2">
          <div class="col">
            <button id="btn-menu" class="btn btn-info fw-bold text-sm-6 rounded-3" type="submit" name="profile">Profil <i class="bi bi-arrow-bar-right"></i></button>
          </div>
          <div class="col">
            <button id="btn-menu" class="btn fw-bold text-sm-6" type="submit" name="project" style="background-color:#ff5f6e">Proyek <i class="bi bi-arrow-bar-right"></i></button>
          </div>
          <div class="col">
            <button id="btn-menu" class="btn fw-bold text-sm-6" type="submit" name="Logout" style="background-color:#3aa875">Logout <i class="bi bi-arrow-bar-right"></i></button>
          </div>
          <div class="col">
            <button id="btn-menu" class="btn fw-bold text-sm-6" type="submit" name="settings" style="background-color:#ffc519">Bantuan<i class="bi bi-arrow-bar-right"></i> </button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!--------Caroussell importnt project----------->
  <div class="row container-fluid ps-4 py-5 pe-4 ms-1" style="background-color:#3B4560; ">
    <div class="col col-12 col-sm container-md p-0 ps-sm-5 pe-2 ">
      <div class="list-group overflow-auto" id="list-group" style="height:362px">
        <div class="container-fluid d-flex justify-content-start py-3 p-0">
          <button type="button" class="btn btn-outline-light">Notifikasi Pesan</button>
        </div>
        <!-- <a href="#" class="list-group-item list-group-item-action" id="block-notif"aria-current="true" >
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small>3 days ago</small>
    </div>
    <div class="d-flex align-items-center">
    <div class="flex-grow-1">
      <p class="mb-1">Some placeholder content in a paragraph.</p>
      <small>And some small print.</small>
    </div>
    <div>
      <button class="btn btn-danger" type="button">Hapus</button>
    </div>
  </div>
  </a> -->

      </div>
    </div>
    <div class="col col-12 col-sm container-md  p-0 pe-sm-5 ">
      <div class="list-group container-md overflow-auto" id="blockResponse" style="height:362px">
        <div class="container-fluid d-flex justify-content-end py-3 p-0">
          <button type="button" class="btn btn-outline-light">Pengingat </button>
        </div>
        <!-- <a href="#" class="list-group-item list-group-item-action6" aria-current="true">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small>3 days ago</small>
    </div>
    <div class="d-flex align-items-center">
    <div class="flex-grow-1">
      <p class="mb-1">Some placeholder content in a paragraph.</p>
      <small>And some small print.</small>
    </div>
    <div>
      <button class="btn btn-danger" type="button" id="hapus">Hapus</button>
    </div>
  </div>
  </a> -->

      </div>
    </div>
  </div>
  <!--------Footer--------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
      const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
  </script>
  <script>
    const user = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="JS/hover-dashboard.js"></script>
  <script>const studentClass=<?php print_r(json_encode($_SESSION["classStd"]))?></script>
  <script src="Controller/JsController/getBlockNotification.js"></script>
  <script src="Controller/JsController/getBlockNotificationReference.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/getProfilePic.js"></script>
</body>

</html>