<?php
include "Controller/VerifySessionGuru.php";
include "View/headerToLibraryGuru.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan-Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/perpustakaan-guru.css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body class="overflow-auto">

  <!----------------------Navigation---------------------------------------------->
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
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["role"]?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["username"]) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["IdUser"]) ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!---------------------------Body Section------------------------------------------------------------>
  <div class="container-fluid m-0 p-0 row overflow-y-auto" style="height:740px">
    <div class="container-lg col-12 col-sm-4 border border-end-dark px-0 py-0" id="content-class">
      <form action="" method="post" id="contentClass">
        <h2 class="fw-bold text-dark ps-1 ps-sm-3 fs-4 fs-sm-2 pt-2 pt-sm-2 "><i class="bi bi-grid-1x2 fs-3"></i> Daftar Kelas</h2>

      </form>
    </div>
    <div class="container-fluid px-0 col-12 col-sm-8 ps-1 ps-sm-3">
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
      <h2 class="fw-bold text-dark fs-4 mt-2 pb-2"><i class="bi bi-book"></i> Referensi Siswa Anda</h2>
      <div class="container-fluid p-0 " id="containers"></div>

    </div>
  </div>

  <div class="modal" tabindex="-1" id="modals" style="display:none">

    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Feedback Referensi Siswa Anda</h5>
        </div>
        <div class="modal-body">
          <p>Berikan respon kepada siswa anda apakah referensi siswa anda layak dan sesuai dengan proyek yang dikerjakan</p>
          <label for="" class="form-label">Respon</label>
          <input class="form-control" type="text" name="" id="caption" placeholder="Respon anda">
          <label for="" class="form-label">Kelompok</label>
          <input type="text" class="form-control" id="grpName" placeholder="Ke kelompok...">
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary" id="send" onclick='decResponse()'>Kirim <i class="bi bi-send"></i></button>
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="d-block d-sm-none rounded-circle btn btn-lg btn-primary position-absolute top-50 bottom-50 ms-3" style="height:60px;width:60px" id="buttonSide"><i class="bi bi-arrow-up-circle-fill" id="arrow"></i></button>
  <!-------------------------------Foooter------------------------------------------------------------------>
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/receiveReferenceGuru.js"></script>
  <script>
    const user = <?php echo json_encode($_SESSION["username"]) ?>;
    const idUser = <?php echo json_encode($_SESSION["IdUser"]) ?>;
    const role = <?php echo json_encode($_SESSION["role"]) ?>;
  </script>
<!-- 
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
    });
  </script>
  <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script> -->
 <!-- <script>
    const beamsClient = new PusherPushNotifications.Client({
      instanceId: '4dba92eb-b065-4840-9c7b-e2c8a285dcd6',
    });

    beamsClient.start()
      .then(() => beamsClient.addDeviceInterest('hello'))
      .then(() => console.log('Successfully registered and subscribed!'))
      .catch(console.error);
  </script> -->
  <script>
    let refId='';
    function refuseResponse(ref) {
      const containerAccordion=ref.closest('.accordion-body');
      refId=containerAccordion.querySelector("a").textContent;
      document.getElementById("modals").style.display = "block";
    }
  </script>
  <script>
    function decResponse() {
      const decResponses = document.getElementById("caption").value;
      const grpName = document.getElementById("grpName").value;
      const xhrDec = new XMLHttpRequest();
      xhrDec.onload = function() {
        console.log(this.responseText);
      }
      xhrDec.open("POST", "Controller/sendNotifForRef.php");
      xhrDec.setRequestHeader("Content-Type", "application/json");
      xhrDec.send(JSON.stringify({
        user: user,
        decResponses: decResponses,
        interest: grpName,
        refId:refId

      }));

      document.getElementById("grpName").value = '';
      document.getElementById("caption").value = '';
      document.getElementById("modals").style.display = "none";
    }
  </script>
  <script>
      const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="Controller/JsController/receiveClassRefGuru.js"></script>
  <script src="JS/contentAppear.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>

</body>

</html>