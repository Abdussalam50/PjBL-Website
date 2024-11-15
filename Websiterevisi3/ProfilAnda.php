<?php
// Mendapatkan protokol (http atau https)
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";

// Mendapatkan nama domain
$domainName = $_SERVER['HTTP_HOST'];

// Mendapatkan path dan query string
$path = $_SERVER['REQUEST_URI'];

// Menggabungkan semuanya untuk mendapatkan URL lengkap
$currentUrl = $protocol . $domainName . $path;

// Mendapatkan bagian query string dari URL
$queryString = parse_url($currentUrl, PHP_URL_QUERY);

// Menguraikan query string menjadi array asosiatif
parse_str($queryString, $queryParams);

// Menampilkan array query params
// print_r($queryParams['role']);
if($queryParams['role']=="Guru"){
  include "Controller/VerifySessionGuru.php";

}else if($queryParams['role']=='Siswa'){
  include "Controller/VerifySessionSiswa.php";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <title>Profil Anda</title>

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt=""
          style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="<?php  echo isset($_SESSION["role"])? 'dashboard-guru.php':'dashboard-siswa.php'?>">
              Home </a>
          </li>
          <li class="nav-item ps-5 "><a href="" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#">
              <?php print_r(ucwords($_SESSION["username"])) ?>
            </a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#">
              <?php $queryParams['role']=='Siswa'?print_r($_SESSION["student"]):print_r($_SESSION["IdUser"]) ?>

            </a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px"
              height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!-------------------Body------->

  <body>
    <div class="container-fluid row">
      <h2 class="fs-4">Profil Saya</h2>
      <div class="container-fluid col-12 col-sm-6 ps-0">
       
        <div class="container-fluid" id="block-picture">
          <label for="" class="form-label"> <i class="bi bi-person-fill"></i> Username</label>
          <input type="text" class="form-control" name="" id="username">
          <div class="container-fluid pt-4">
            <div class="container-lg " id="bigPic">
              <img src="css/img/person.png" class="shadow border border-secondary rounded"alt="" width="300px" height="300px" id='profilePic'>
            </div>
            <div class="container-lg mt-3">
              <button type="button" class="btn btn-warning me-5">
                <label for="upload"><i class="bi bi-cloud-upload"></i> Upload</label></button>
              <input type="file" class="d-none" name="upload" id="upload">
              <button type="submit" class="btn btn-danger"><i class="bi bi-file-earmark-x-fill"></i> Hapus</button>
            </div>

          </div>
        </div>
        <div class="container-fluid py-4 ms-4">
          <button type="submit" class="btn btn-success" id="sendUpdate"><i class="bi bi-check-circle-fill"></i>  Simpan Profil</button>
        </div>
      </div>
      <div class="container-fluid col-12 col-sm-6 ">
        <label for="" class="form-label"><i class="bi bi-card-heading"></i> NISN/NIP</label>
        <input type="text" name="" id="NISN" class="form-control">
        <label for="" class="form-label"> <i class="bi bi-ui-checks-grid"></i> Kelas/Kelas ajar</label>
        <input type="text" class="form-control" id="kelas">
        <label for="" class="form-label"><i class="bi bi-person-fill-lock"></i> Password</label>
        <input type="password" class="form-control"  id="password">
      </div>

    </div>
    <script>
        const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
    </script>
     <script src="Controller/JsController/displayPicprofile.js"></script>
    <script src="Controller/JsController/getProfilePic.js"></script>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      const oldUser=<?php print_r(json_encode($_SESSION['username']))?>;
    </script>
    <script src="Controller/JsController/sendFormEdit.js"></script>
    <script src="Controller/JsController/logoutTransfer.js"></script>
    
  </body>
 

</html>