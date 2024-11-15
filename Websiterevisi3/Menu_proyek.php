<?php
include "Controller/VerifySessionSiswa.php";
include "View/headerToDiscussionSiswa.php";
include "View/headerToLibrarySiswa.php";
include "View/headerToRencanaProjectSiswa.php";
include "View/headerToTimelineSiswa.php";
include "View/headerToLaporanSiswa.php";
include "View/headerToPresentasi.php";
include "View/headerToOutline.php";
include "View/headerRefleksiSiswa.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Cache-Control" content="no-cache,no-store,must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="Expires" content="0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/Menu_proyek.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@700&display=swap" rel="stylesheet">
</head>

<body>
  <!------------Navigation---------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-title="Notifikasi" data-bs-content="Belum ada notifikasi" data-bs-custom-class="custom-popover" aria-current="page" href="dashboard-siswa.php"> Home</a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["Role"]?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
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
  <!----------------Section Body--------------------------->
  <section>
    <div id="section-body" class="container-fluid p-0" style="overflow-y:hidden">
      <img src="css/img/welding-proyek.jpg" style="width:100%" alt="">

    </div>
    <div id="main-text"><span class="text-white fs-2" style="width:20%">Explore pengetahuan dan kemahiran anda dalam pembelajaran Fisika melalui proyek</span></div>
  </section>
  <!-------------Section Menu----------------------------->
  <section id="section-menu">
    <div class="container-fluid d-flex justify-content-center py-4">
      <form action="" method="post">
        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2">
          <div class="cols order-2 order-sm-1 mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Pendahuluan</h2>
            <p class="text-start lead">Mulai pembelajaran anda dengan menggunakan menu ini untuk dapat memahami materi yang anda pelajari.</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="outlineAgent">Mulai Pendahuluan</button>
          </div>
          <div class="cols order-1 order-sm-2"><img class="img-thumbnail" src="css/img/pendahuluan.jpg" alt=""></div>
        </div>
        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="discussion">

          <div class="cols order-1">
            <img class="img-thumbnail" src="css/img/diskusi.jpg" alt="">
          </div>
          <div class="cols mb-3 mb-sm-0 order-2">
            <div class="container-sm">
              <h2 class="text-start mt-3 mt-sm-5">Forum Diskusi</h2>
              <p class="text-start lead">Gunakan fitur forum diskusi untuk melakukan diskusi dengan guru anda untuk memulai proyek anda </p>
              <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="discussionForum">Mulai Diskusi</button>
            </div>
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2"  id="library">
          <div class="cols order-2 order-sm-1 mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Perpustakaan</h2>
            <p class="text-start lead">Gunakan fitur perpustakaan untuk memulai proyek anda . Anda dapat menggunakan fitur ini untuk menunjang proses pembuatan proyek</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="libraryHeader">Akses Perpustakaan</button>
          </div>
          <div class="cols order-1 order-sm-2"><img class="img-thumbnail" src="css/img/library.jpg" alt=""></div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="rencanaProyek">
          <div class="cols"><img class="img-thumbnail" src="css/img/planning.jpg" alt=""></div>
          <div class="cols mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Rencana Proyek</h2>
            <p class="text-start lead">Rencanakan proyek anda sebaik mungkin dengan kelompok dan guru anda. klik tombol dibawah ini untuk mulai rencana proyek!</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="Planing" name="planning">Mulai Rencana</button>
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="timeline">
          <div class="cols order-2 order-sm-1 mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Timeline</h2>
            <p class="text-start lead">Tetapkan waktu pengerjaan proyek anda sesuai dengan batas waktu yang telah ditentukan oleh guru</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="Timeline" name="setTimeline">Atur Timeline</button>
          </div>
          <div class="cols order-1 order-sm-2"><img class="img-thumbnail" src="css/img/timeline.jpg" alt=""></div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="laporan">
          <div class="cols"><img class="img-thumbnail" src="css/img/assgnment.jpg" alt=""></div>
          <div class="cols mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Laporan Proyek</h2>
            <p class="text-start lead">Kumpulkan laporan proyek anda yang telah dibuat </p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="Laporan" id="report">Kumpul Laporan</button>
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="presentation">
          <div class="cols order-2 order-sm-1  mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Presentasi</h2>
            <p class="text-start lead">Presentasikan hasil proyek yang telah anda lakukan dengan bangga !</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="presentasion" name="presentation">Lihat Presentasi</button>
          </div>
          <div class="cols order-1 order-sm-2">
            <img class="img-thumbnail" src="css/img/presentation.jpg" alt="">

          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2">
          <div class="cols order-2 order-sm-2  mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Refleksi</h2>
            <p class="text-start lead">Silahkan lakukan refleksi, untuk menilai kinerja proyek oleh kelompok teman anda.</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="presentasion" name="Refleksi">Mulai refleksi</button>
          </div>
          <div class="cols order-1 order-sm-1">
            <img class="img-thumbnail" src="css/img/sma.jpg" alt="">

          </div>
        </div>
    </div>
    </form>
    </div>
    <ul style="position:absolute; top:170%; right:5%; height:1590px;display:flex; flex-direction:column; justify-content:space-between" id="node">
      <li style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%;box-shadow:0px 0px 15px green"></li>
      <li style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%;box-shadow:0px 0px 15px green"></li>
      <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
      <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
      <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
      <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
    </ul>
  </section>
  <!-------------------------Modal------------------------->
  <div class="modal" id="myModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Perhatian !</h5>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <p class="text-lead">Sebelum mengerjakan proyek anda, wajib untuk mengisi nama kelompok anda terlebih dahulu.</p>
            <label for="" class="form-label">Kelompok</label>
            <input class="form-control" type="text" name="group" id="grpName" placeholder="Kelompok...">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" id="submit">Confirm</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!----------------Footer----------------------------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script>
      const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    document.querySelector("#nav-toggle").addEventListener("click", function() {
      document.querySelector("#main-text ").classList.toggle("block")
    });
  </script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script>
    const User = <?php print_r(json_encode($_SESSION["username"])) ?>;
    const userClass = <?php print_r(json_encode($_SESSION["classStd"])) ?>;
  </script>
  <script src="Controller/JsController/setPoint.js"></script>
  <script src="Controller/JsController/setPoint2.js"></script>
  <script src="Controller/JsController/setPoint3.js"></script>
  <script src="Controller/JsController/setPoint4.js"></script>

  <script src="Controller/JsController/sendToken.js"></script>
  <script src="Controller/JsController/tokenHandler.js"></script>
  <script src="JS/SteadyState.js"></script>
  <script>
    const discussion=document.getElementById("discussion");
    const library=document.getElementById("library");
    if(window.innerWidth<600){
      discussion.style.borderBottom="5px solid #198754";
      library.style.borderBottom="5px solid #198754";
    }else{
      const nodes=document.getElementById("node");
      const listAll=nodes.querySelectorAll("li");
      listAll[0].style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
      listAll[1].style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
    }
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
</body>

</html>