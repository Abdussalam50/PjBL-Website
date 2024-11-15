<?php
include "Controller/VerifySessionSiswa.php";
include "Controller/Logout.php";
include "Controller/sendDataLibraryToDb.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Referensi Anda</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/perpustakaan.css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!---------------Navigation bar------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-siswa.php">Home </a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["Role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["Role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"])) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["student"]) ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-----------------------------Section Body-------------------------------------->
  <div id="section-body" class="container-fluid d-flex justify-content-center row ms-0 px-0" style="height:700px !important;overflow-y:scroll !important;">

    <div class="container-fluid-lg row-cols col-12 col-sm-3 border border-end-secondary px-0" id="list-proyek">
      <h2 class="fw-bold text-dark ps-1 ps-sm-3 fs-3 pt-2 pt-sm-2 "><i class="bi bi-person-workspace"></i> Daftar Proyek</h2>
      <form action="" method="post" id="contain-list">

      </form>
    </div>

    <div class="container-lg row-cols g-2 col-12 col-sm-9 ps-3">
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
      <h2 class="">Masukkan Referensi</h2>
      <form action="" method="post" class="mb-3" enctype="multipart/form-data">
        <label for="" class="form-label">Kelompok</label>
        <input type="text" name="input-group" class="form-control">
        <label for="" class="form-label">Nama Proyek</label>
        <input type="text" name="project" class="form-control">
        <label for="" class="form-label">Pilih File</label>
        <input type="file" name="input-file" class="form-control">
        <label for="" class="form-label">Masukkan Deskripsi Referensi Anda</label>
        <textarea class="form-control mt-1" name="description" id="" cols="30" rows="10" placeholder="Masukkan deskripsi materi yang merupakan hasil pemahaman Anda selama membaca materi yang anda pilih"></textarea>
        <button type="submit" name="submit" class="mt-3 btn btn-secondary text-white">Submit</button>
      </form>
      <h2 class="fw-bold text-secondary fs-6 fs-2-sm ps-0 ps-sm-3"> <i class="bi bi-card-text"></i> Referensi</h2>
      <div class="contoiner-lg row" id="container">

      </div>
    </div>
  </div>
  <!-------------Footer------------------------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
    const id = <?php echo json_encode($_SESSION["student"]) ?>;
    const role = <?php echo json_encode($_SESSION["Role"]) ?>;
    const group = <?php echo json_encode(str_replace(" ", "", $_COOKIE["grpName"])) ?>;
  </script>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('5d0b769280fcc39eddbb', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
      console.log('Event Received:', data);
      alert(JSON.stringify(data));
    });

    channel.bind('pusher:subscription-succeed', function() {
      console.log('Subscription to  my-channel succeed');
    })
  </script>
  <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
  <script>
    const BeamClient = new PusherPushNotifications.Client({
      instanceId: '4dba92eb-b065-4840-9c7b-e2c8a285dcd6',
    });
    BeamClient.start()
      .then(() => BeamClient.addDeviceInterest(group))
      .then(() => console.log('Succesfully Registered and Subscribe!'))
      .catch(console.error);
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>    const userId = <?php echo json_encode($_SESSION["username"]) ?>;</script>
  <script src="Controller/JsController/receiveReference.js"></script>
  <script src="JS/SteadyState.js"></script>
  <script src="Controller/JsController/receiveProjectList.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
</body>

</html>