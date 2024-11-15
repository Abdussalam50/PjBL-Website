<?php
$protocol=(!empty($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]!=="off"||$_SERVER["SERVER_PORT"]==443)? "https://":"http://";

$domainName=$_SERVER["HTTP_HOST"];

$path=$_SERVER["REQUEST_URI"];

$currentUrl=$protocol.$domainName.$path;

$queryString=parse_url($currentUrl,PHP_URL_QUERY);

parse_str($queryString,$queryParams);

if($queryParams["role"]=="Guru"){

    include "Controller/VerifySessionGuru.php";

}else if($queryParams["Role"]="Siswa"){

    include "Controller/VerifySessionSiswa.php";

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Cache-Control" content="no-cache,no-store,revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="no-cache" content= 0>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bantuan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
            <a class="nav-link pt-3" aria-current="page" href="#"><i class="bi bi-bell-fill text-warning"></i> Notifikasi </a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo isset($_SESSION["Role"])? $_SESSION["Role"]:$_SESSION["role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="" class="nav-link pt-3 ps-1 text-start">Setelan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["username"]) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo isset ($_SESSION["student"])?  $_SESSION["student"]: $_SESSION["IdUser"] ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!----------Content--------------->
  <section class="m-2">
    <h2 class="fs-3 text-dark">Bantuan</h2>
    <p class="text-dark">
        Ikuti video tutorial dibawah ini untuk dapat mengetahui cara menggunakan berbagai menu yang ada pada platform website ini.
    </p>
    <div>
        <div class="row" id="helpContainer">

        </div>
    </div>
  </section>
<!-----------End-Content----------------->
<!-----------Footer-------------------------->
<footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="Controller/JsController/getBantuan.js"></script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
</body>
</html>