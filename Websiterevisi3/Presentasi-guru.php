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
  <title>Presentasi Proyek</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/presentasi.css">
  <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
  <!----------Navigation--------------------------->
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
  <!------------------Container --------------------------------->
  <div class="container-fluid px-0" style="height:840px;overflow-y: scroll;">

    <div class="container-md px-0 col row-cols-1 border border-secondary rounded-3 mb-4" style="--bs-border-opacity:.3">

      <div id="video" class="container-fluid px-0 col" height="400px">
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
        <?php include "View/watchVideo.php" ?>
        <!-- <iframe class="container-fluid rounded-3 mt-2" src="https://www.youtube.com/embed/zJwbZX4i-N4?si=4AXLyLXcPUuQUc0p" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" ></iframe> -->
      </div>
      <div id="comment" class="container-fluid col my-3" height="300px">

        <form action="" method="post">
          <div id="comment-section" class="container-fluid d-flex">
            <input class="form-control flex-grow-1 me-2 border border-success" style="--bs-border-opacity:.4;" type="text" name="inputComment" id="commentValue" placeholder="Masukkan komentar">
            <button class="btn btn-secondary " type="button" name="sendComment" id="submit"><i class="bi bi-send"></i></button>
          </div>
          <div class="container-fluid row-cols-1 my-2" id="commentSection">

          </div>
        </form>
      </div>
    </div>
    <div class="container-md row-cols-1 border border-secondary rounded-3 mb-3 mt-3 py-3" style="--bs-border-opacity:.3;" id="container-video">

    </div>
  </div>
  <!-------------Footer--------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Js/SteadyState.js"></script>
  <script src="Controller/JsController/receiveVideoDataGuru.js"></script>
  <script>
    const iframes = document.querySelector("iframe");
    iframes.setAttribute("class", "container-fluid rounded-0 px-0")
  </script>
  <script>
    const username = <?php echo json_encode($_SESSION["username"], JSON_UNESCAPED_UNICODE) ?>;
    const classes = <?php echo json_encode($_SESSION["Class"], JSON_UNESCAPED_UNICODE) ?>;
  </script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script src="Controller/JsController/sendCommentGuru.js"></script>
  <script src="Controller/JsController/viewCommentGuru.js"></script>
  <script src="Controller/JsController/viewComment.js"></script>
  <script src="Controller/JsController/deleteCommentGuru.js"></script>
</body>

</html>