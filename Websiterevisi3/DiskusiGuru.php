<?php
include "Controller/VerifySessionGuru.php";
include "View/headerAturKelompok.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Diskusi Proyek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/diskusi.css">
  <link rel="stylesheet" href="css/sliderUi.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <!------------Navigation-bar---------------------->
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
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo $_SESSION["IdUser"] ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!------------Section body bar----------------------->
  <div class="container-fluid ">
    <div class="row">
      <div id="group-list" class=" border-end border-secondary col-0 col-sm-3 p-0" style="--bs-border-opacity:.3;">
        <form class="mt-3 mb-3" method="post">
          <button class="btn btn-dark btn-lg" type="submit" name="manage-group"> <i class="bi bi-sliders2"></i> Atur Kelompok</button>
        </form>
        <div id="list" class="list-group m-0 rounded-0" width="100%">

        </div>
      </div>
      <div id="chat-block" class="col-12 col-sm-9 d-flex flex-column" >
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

        <div class="dropdown" id='listGroup'>
          <button type="button" class='btn btn-dark text-white rounded pill badge' data-bs-toggle='dropdown' aria-expanded='false'>Detail Kelompok</button>
          <ul class="dropdown-menu" id="groupList">

          </ul>
        </div>
        <div class="container-fluid mt-5 mb-3 d-flex" id="lastElement">
          <form class="flex-grow-1" action="" method="post">
            <input class="form-control border-success " style="--bs-border-opacity:.7;" type="text" name="" id="promptMsg" maxlength="10000">
          </form>
          <button type="#" class="btn btn-dark" onclick="sendMessage()"><i class="bi bi-send"></i></button>
        </div>
      </div>
    </div>
  </div>

  <button id="side-button" class=" d-block d-sm-none btn btn-primary btn-lg position-absolute top-50 rounded-circle border-0"><i class="bi bi-arrow-up-circle-fill text-white text-white fs-3 z-2" id="iconResponsive"></i></button>
  <!-----------Footer---------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    const groupMenu = document.querySelector("#group-list");
    const sideButton = document.querySelector("#side-button");
    const iconResponsive = document.getElementById("iconResponsive");
    sideButton.addEventListener("click", slide);

    function slide() {
      if (groupMenu.classList.toggle("d-none")) {
        iconResponsive.setAttribute("class", "bi bi-arrow-down-circle-fill text-white fs-3")
      } else {
        iconResponsive.setAttribute("class", "bi bi-arrow-up-circle-fill text-white fs-3")
      };
    };
  </script>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script>
    const userId = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
    const role = <?php print_r(json_encode($_SESSION["role"])) ?>;
    const userClass=<?php print_r(json_encode($_SESSION['Class']))?>;
  </script>
  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>
    var currentEvent=window.location.href;
    var searchParams=new URLSearchParams(new URL(currentEvent).search);
    const paramVal=searchParams.get('group');
    Pusher.logToConsole = true;
    var Pusher = new Pusher('5d0b769280fcc39eddbb', {
      cluster: 'ap1'
    });

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
    const channel = Pusher.subscribe('my-channel');
    const waitEvent = function(callBack) {
      if(paramVal){      
        channel.bind(`${paramVal}`,function (data){
        eventData.data=data;
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
    channel.bind('pusher:subscription-succeed', function() {
      console.log('Subscription to my-channel succeed');
    });
  </script>
  <script src="Controller/JsController/message.js"></script>
  <script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>
  <script>
    Notification.requestPermission().then(permission => {
      if (permission == "granted") {
        const BeamClient = new PusherPushNotifications.Client({
          instanceId: '4dba92eb-b065-4840-9c7b-e2c8a285dcd6',
        });
        BeamClient.start()
          .then(() => BeamClient.addDeviceInterest('discussions'))
          .then(() => console.log('Succesfully Registered and Subscribe!'))
          .catch(console.error);
        BeamClient.start()
        .then(()=>BeamClient.addDeviceInterest('headvisor'))
        .then(()=>console.log('Sucessfully registered and subscribe'))
        .catch(console.error);
      } else {
        console.log("Permission denied");
      }
    });
  </script>

  <script src="JS/Discussion.js"></script>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script src="Controller/JsController/receiveViewClass.js"></script>
  <script src="Controller/JsController/receiveViewClassResponsive.js"></script>
  <script src="Controller/JsController/deleteMessage.js"></script>
  <script src="Controller/JsController/showGroup.js"></script>
</body>

</html>