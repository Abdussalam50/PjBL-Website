<?php
include "Controller/VerifySessionSiswa.php";
include "Controller/insertPresenstasi.php";
include "View/headerToPresentasiSiswa.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Submit Video Presentasi</title>
  <link rel="stylesheet" href="css/sliderUi.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body>
  <!------------------------------Navigation----------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["username"]) ?></a>
            <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php echo ucwords($_SESSION["student"]) ?></a>
          </li>
          <li class="nav-item justify-content-center" id='li-img'>
            <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!---------------------------body video input for student---------------------------------------->
  <div class="container-md" style="--bs-background-color:#D7DBDD">
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
    <h1 class="lead fw-bold text-secondary display-6">Kumpulkan Video Presentasi Anda</h1>
    <p>Pengumpulan video presentasi dapat dilakukan dengan mengikuti dua langkah  yang tertera dibawah</p>
    <p class="lead"> 1. Isi judul video, kelompok, dan kelas </p>
    <p class="lead">2. Link video yang akan dikumpulkan adalah link embed dari youtube. Maka dari itu pastikan video anda juga diupload pada platform youtube</p>
    <p class="lead">3. Block link secara keseluruhan kemudian copy link</p>
    <p class="lead">4. Jika link telah dicopy, masukkan link embed tersebut ke form untuk mengumpulkan link video presentasi</p>
    <p class="lead">5. Jika masih bingung anda dapat mengikuti video dibawah ini</p>
    <div class="container-md col d-flex justify-content-center">
      <iframe width="560" height="315" src="https://www.youtube.com/embed/8JUyOwn40SI?si=juJWENp7ILqRlVbP" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    </div>
    <form action="" method="post">
      <label for="" class="form-label">Judul Video</label>
      <input type="text" name="title-video" class="form-control">
      <label for="" class="form-label">Kelompok</label>
      <input type="text" name="Group" class="form-control">
      <label for="" class="form-label">Kelas</label>
      <input type="text" class="form-control" name="class">
      <label for="" class="form-label">Link Presentasi</label>
      <input type="text" name="vid-link" class="form-control">
      <div class="container-sm row "><button class="btn btn-secondary text-white fw-bold my-3 col me-5" type="submit" name="upload">Upload</button> <button class="btn btn-secondary text-white fw-bold my-3 col ms-5" type="submit" name="watch">Lihat Presentasi</button></div>
    </form>
    <div class="container-lg d-flex justify-content-center">
      <p class="text-lead">Jika ada instruksi dari guru melakukan presentasi via zoom <a href="presentasi_zoom.php">Klik disini</a></p>
    </div>
  </div>
  <section>
    <div class="container-fluid">
      <div id="list-group" class="list-group">

      </div>
    </div>
  </section>
  <!------------------------Modal-pop up------------------------------------------------------------>
  <!-- <div class="modal fade" id="modal-confirm" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  name="upload" type="submit">Save changes</button>
      </div>
    </div>
  </div> -->

  </div>
  <!-----------------------------Footer-------------------------------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
</body>

</html>