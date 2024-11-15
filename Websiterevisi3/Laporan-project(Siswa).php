<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
include "Controller/VerifySessionSiswa.php";
include "Controller/sendLaporanSiswa.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="no-cache" content= 0>
  <title>Laporan Anda</title>
  <link rel="stylesheet" href="css/sliderUi.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>

  <!----------Navigation-------------------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-siswa.php">Home</a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["Role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
          <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["Role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
          <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
          <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo $_SESSION["username"] ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo $_SESSION["student"] ?></a>
          </li>
          <li class="nav-item justify-content-center" id="li-img">
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>

        </ul>
      </div>
    </div>
  </nav>
  <!---------------------Body section report-------------------------------------------------->

  <div class="container-fluid d-flex mt-5 ps-0 ps-sm-block" style="height:100vh">

    <div class="container-lg justify-content-center">
      <form action="" method="post" enctype="multipart/form-data">
        <h2 class="fw-bold mb-3"><i class="bi bi-journal-richtext"></i> Laporan Project</h2>
        <label for="" class="form-label">Nama Proyek</label>
        <div class="container-lg d-flex flex-grow-0 p-0"><input type="text" class="form-control " name="nameProject"></div>
        <label for="" class="form-label">Pilih file</label>
        <div class="container-lg p-0"><input type="file" class="form-control " name="fileLaporan">
          <button class="btn btn-sm btn-dark rounded-3 ps-2 pe-2 ms-0 my-4" name="submit">Submit</button>
      </form>
    </div>


    <table id="std-table" class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Proyek</th>
          <th scope="col">Kelompok</th>
          <th scope="col">Laporan</th>
          <th scope="col">Edit Laporan</th>
        </tr>
      </thead>
      <tbody>


      </tbody>
    </table>

  </div>
  </div>
  <div class="modal" tabindex="-1" id="modals">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Ubah File Laporan</h5>
        </div>
        <form action="" method="post" enctype="multipart/form-data"></form>
        <div class="modal-body">
          <p>Silahkan upload file laporan kelompok anda yang telah diperbarui.</p>
          <input type="file" name="FileEdit" id="datafile">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="close">Tutup</button>
          <button type="button" class="btn btn-primary" name="save" id="saves">Simpan Perubahan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!-------------Footer-------------------------------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="JS/SteadyState.js"></script>
  <script>
    const classes = <?php echo json_encode($_SESSION["classStd"], JSON_UNESCAPED_UNICODE) ?>;
  </script>
  <script src="Controller/JsController/receiveLaporanSiswa.js"></script>
  <script src="Controller/JsController/EditLaporanSiswa.js"></script>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="JS/closeModal.js"></script>
</body>

</html>