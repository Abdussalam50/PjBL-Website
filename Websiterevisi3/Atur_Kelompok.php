<?php
  include "Controller/VerifySessionGuru.php";
  include "View/headerProjectPageGuru.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atur Kelompok Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- <link rel="stylesheet" href="css/Atur-kelompok.css"> -->
</head>
<body>
    <!-----Navigation------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
              <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"]))?></a>
              <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["IdUser"])?></a>
            </li>
            <li class="nav-item justify-content-center" id="li-img">
              <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
<!----------section grouping student------->
<div class="container-fluid row gx-3" style="height:740px">
  <div id="rowClass" class="container-md col-12 col-sm-4">
    <h3 class="text-lead"> <i class="bi bi-box-arrow-down"></i>Input Kelompok</h3>
    <label for="" class="form-label">Nama Kelompok</label>
    <input id="grpName" type="text" class="form-control" name="groupName" >
    <label for="" class="form-label">Nama Proyek</label>
    <input id="prjName" type="text" class="form-control ">
    <label for="" class="form-label">Kelas</label>
    <input id="clas" type="text" class="form-control" name="class">
    <label for="" class="form-label">Token</label>
    <div class="input-group"><input id="group" type="text" class="form-control" name="groups" ><button onclick="token()" type="button"class="btn btn-dark ">Buat Token</button></div>
    <div class="row container-fluid">
      <button onclick="dataSend()" class="col btn btn-sm btn-dark text-white mt-3">Buat Kelompok</button>
      <form class="col"action="" method="post"><button class=" btn btn-md btn-dark text-white mt-3" type="submit" name="project">Menu proyek</button></form>
    </div>
  </div>
  <div class="container-md col-12 col-sm-8">
    <h3 class="text-lead">Daftar Kelompok</h3>
  <form action="" method="post">
    <table id="table"class="table table-striped">
      <thead>
        <tr>
      
          <th scope="col">Nama Proyek</th>
          <th scope="col">Nama Kelompok</th>
          <th scope="col">Kelas</th>
          <th scope="col">Token</th>
        </tr>
      </thead>
      <tbody>

      </tbody>
    </table>
    <div class="container-lg d-flex justify-content-end">
        <button class="btn btn-dark text-white"type="submit" onclick="toLocale()">Simpan</button>
        
    </div>
  </form>
  </div>
</div>

<!------------------------- Modal ---------------------------->
<div class="modal fade" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Memproses Permintaan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Apakah anda yakin untuk menghapus data yang anda pilih <span id="data"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Batal</button>
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" id="delete" onclick="del()">Hapus</button>
      </div>
    </div>
  </div>
</div>
<button id="btn-content" type="button" class="btn btn-primary rounded-circle position-absolute top-50 start-0 z-2 d-block d-sm-none" ><i class="bi bi-arrow-up-circle-fill text-white fs-3" id="iconContent"></i></button>
    <!------Footer-------------------->
    <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
        <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
        <p class="text-lead text-center text-white">&copy Copyright 2023</p>
    </footer>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
      <script src="JS/Random.js"></script>
      <script>const classUname=<?php print_r(json_encode($_SESSION['Class']))?></script>
      <script src="Controller/JsController/PushStdToServer.js"></script>
      <script src="JS/SteadyState.js"></script>
      <script src="JS/addContentinput.js"></script>
      <script>
          const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
      </script>
      <script src="Controller/JsController/getProfilePic.js"></script>
      <script src="Controller/JsController/logoutTransfer.js"></script>
</body>
</html>