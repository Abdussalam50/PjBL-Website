<?php
include "Controller/VerifySessionSiswa.php";
include "Controller/sendDataGroup.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/KelompokSiswa.css">
  <title>Diskusi Anda</title>
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!-----------------Navigation-------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
  <!---------------Body------------------------------>
  <div class="container-fluid ">
    <div id="body" class="row">
      <div id="group-list" class=" border-end border-secondary col-0 col-sm-5 p-0 order-2 order-sm-1" style="--bs-border-opacity:.3;">
        <h2 class="text-lead fs-3 ms-2">Masuk Kelompok</h2>
        <table class="table table-stripped">
          <thead>
            <tr>
              <th scope="col">Token</th>
              <th scope="col">Nama Kelompok</th>
              <th scope="col">Kelas</th>
              <th scope="col">Proyek</th>
            </tr>
          </thead>
          <tbody id="tables">

          </tbody>
        </table>

        <div id="list" class="list-group m-2 rounded-0 " width="100%">
          <form action="" method="post">
            <label for="" class="form-label">Nama</label>
            <input type="text" class="form-control border-success" name="name">
            <label for="" class="form-label">Kelas</label>
            <input type="text" class="form-control border-success" name="class">
            <label for="" class="form-label border-success">Nama Kelompok</label>
            <input type="text" name="group" class="form-control border-success" id="">
            <label for="" class="form-label">Token</label>
            <input type="text" class="form-control border-success" name="token">
            <label for="" class="form-label">Nama Proyek</label>
            <input type="text" name="prjName" class="form-control border-success" id="">
            <button class="btn btn-dark text-white m-2" type="submit" name="joins">Gabung Kelompok</button>
          </form>
        </div>


      </div>
      <div id="chat-block" class="col-12 col-sm-7 d-flex flex-column order-1 order-sm-2">
        <a href="Diskusi-kelompok-siswa.php?group=<?= isset($_COOKIE["grpName"])?str_replace(" ","",$_COOKIE['grpName']):""?>" id='group' class="btn btn-dark btn-sm text-white">Diskusi Kelompok</a>
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
        <div class="container-fluid mt-auto mb-3 mt-5">
          <form action="" method="post" class="d-flex">
            <input class="form-control border-success" style="--bs-border-opacity:.7;" type="text" name="" id="promptMsg">
            <button type="button" class="btn btn-dark" onclick="sendMessage()"><i class="bi bi-send"></i></button>
          </form>
        </div>
        <button id="side-button" class=" d-block d-sm-none btn btn-primary btn-lg position-absolute top-50 rounded-circle border-0"><i class="bi bi-arrow-up-circle-fill"></i></button>
      </div>
    </div>
  </div>
  <!------------------------------------Footer-------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>

</body>
<script src="JS/cursorMove.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
 
  const nisn = <?php print_r(json_encode($_SESSION["student"], JSON_UNESCAPED_UNICODE)) ?>;
  const role = <?php print_r(json_encode($_SESSION["Role"], JSON_UNESCAPED_UNICODE)) ?>;
  const group=<?php isset($_COOKIE["grpName"])?print_r(json_encode(str_replace(" ",'',$_COOKIE['grpName']))):""?>;
</script>

<script>
  var currentEvent = window.location.href;
  var searchParams = new URLSearchParams(new URL(currentEvent).search);
  const paramsVal = searchParams.get('group');
  Pusher.logToConsole = true;
  var Pusher = new Pusher('5d0b769280fcc39eddbb', {
    cluster: 'ap1'
  });

  const channel = Pusher.subscribe('my-channel');
  const eventData = {
    data: null
  }

  function handleEvent() {
    if (eventData.data === null) {
      console.log('true');
    } else {
      let raw = JSON.stringify(eventData.data);
      console.log(raw);
    }
  }
  const waitEvent = function(callBack) {
    if (paramsVal) {
      channel.bind(`${paramsVal}`, function(data) {
        eventData.data = data;
        handleEvent();
        callBack(eventData.data);

      })
    }else{
    channel.bind('my-event', function(data) {
      eventData.data = data;
      handleEvent();
      callBack(eventData.data);
    });
  }


  }
  // channel.bind('my-event',function(data){
  //   console.log('Event Received',data);
  //   window.rawData=JSON.stringify(data);
  // });channel.bind('Pusher:subscrption-succeed',function(){
  //   console.log('Subscribed to my-channel succeed');
  // })
</script>
<script>  
 const userId = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
const classuser = <?php print_r(json_encode($_SESSION["classStd"], JSON_UNESCAPED_UNICODE)) ?>;</script>
<script src="Controller/JsController/message.js"></script>
<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
<script>
  const BeamClient = new PusherPushNotifications.Client({
    instanceId: '4dba92eb-b065-4840-9c7b-e2c8a285dcd6',
  });
  BeamClient.start()
    .then(() => BeamClient.addDeviceInterest('discussions') )
    .then(() => console.log('Succesfully Registered and Subscribe!'))
    .catch(console.error);
  BeamClient.start()
    .then(()=>BeamClient.addDeviceInterest(group))
    .then(()=>console.log('Succesfully Registered and Subscribe'))
    .catch(console.error)
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="JS/SteadyState.js"></script>
<script src="Controller/JsController/receiveGroupDb.js"></script>
<script>
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
  }
</script>
<script src="Controller/JsController/logoutTransfer.js"></script>
<script src="Controller/JsController/deleteMessage.js"></script>
<script>
  const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
</script>
<script src="Controller/JsController/getProfilePic.js"></script>

</html>