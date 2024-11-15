<?php 
include "Controller/VerifySessionGuru.php";
include "Controller/swapMateri.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
    <title>Overview</title>
</head>
<body>
    <!------------Navigation------------------->
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
                <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"])) ?></a>
                <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["IdUser"]) ?></a>
              </li>
              <li class="nav-item justify-content-center" id="li-img">
                <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!----------------------------------------Body------------------------------------------------>
      <div class="container-fluid pb-3" style="background-color:#d9d9d9">
               
        <h2 class="text-start ms-3 fs-2 text-dark">Overview</h2>
          
        <div class="container-lg py-3" id="embed">
          <embed src="Controller/Materi/MateriGlbb.pdf" type="application/pdf" width="100%" height="600">
        </div>
        <h2 class="fs-2 ms-3 text-start text-dark">Ubah Materi</h2>
            <form action="" method="post" enctype="multipart/form-data" class="ms-3">
              <input type="text" name="contents" id="" class="form-control">
              <button name="send" type="submit" class="btn btn-secondary text-white my-1">Submit</button>
            </form>
      </div>
      <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
        <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
        <p class="text-lead text-center text-white">&copy Copyright 2023</p>
    </footer>
</body>

<script src="JS/SteadyState.js"></script>

<script src="Controller/JsController/display_materi.js"></script>
<script>
      const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="Controller/JsController/logoutTransfer.js"></script>
</html>