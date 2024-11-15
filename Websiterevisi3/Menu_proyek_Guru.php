<?php
include "Controller/VerifySessionGuru.php";
include "View/headerToDiscussionGuru.php";
include "View/headerToLibraryGuru.php";
include "View/headerToRencanaProjectguru.php";
include "View/headerToTimeline(guru).php";
include "View/headerToGetLaporanGuru.php";
include "View/headerToPresentasi-guru.php";
include "View/headerToOverview.php";
include "View/headertoPenilaian.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Menu Proyek_Guru</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
      <div class="collapse navbar-collapse justify-content-end me-5" id="navbarNavDropdown" style="z-index:3">
        <ul class="navbar-nav ">
          <li class="nav-item text-start ps-5">
            <a class="nav-link pt-3" aria-current="page" href="dashboard-guru.php">Home</a>
          </li>
          <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["role"] ?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
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
  <!----------------Section Body--------------------------->
  <section>
    <div id="section-body" class="container-fluid p-0" style="overflow-y:hidden">
      <img src="css/img/welding-proyek.jpg" style="width:100%" alt="">

    </div>
    <div id="main-text"><span class="text-white fs-2" style="width:20%">Explore pengetahuan dan kemahiran anda dalam pembelajaran Fisika melalui project</span></div>
  </section>
  <button type="button" class="btn btn-dark text-white rounded-pill " id="modules" data-bs-toggle="collapse" data-bs-target='#module'> Lihat Modul Ajar</button>
  <!----------------------------Section module------------------------>
  <section>
    <div class="row my-3 collapse" id="module">
      <div class="col-12 col-sm-4">
        <aside>
          <ol class="list-group list-group-numbered">
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Informasi umum</div>
                informasi modul ajar yang akan digunakan
              </div>
              <button type="button" class="btn btn-primary badge text-bg-primary rounded-pill" onclick="GeneralInfo()">detail</button>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-start">
              <div class="ms-2 me-auto">
                <div class="fw-bold">Kegiatan Pembelajaran</div>
                Kegiatan pembelajaran yang akan dilakukan selama 4 pertemuan
              </div>
              <button type="button" class="btn btn-primary badge text-bg-primary rounded-pill" data-bs-toggle="collapse" data-bs-target="#activity" aria-expanded="false" aria-controls="activity">detail</button>
            </li>
          </ol>
        </aside>
        <div class="collapse list-group" id="activity">
          <a href="#" class="list-group-item list-group-item-action buton"  onclick="pert1(this)">
            Pertemuan 1
          </a>
          <a href="#" class="list-group-item list-group-item-action buton" onclick="pert2(this)">Pertemuan 2</a>
          <a href="#" class="list-group-item list-group-item-action buton" onclick="pert3(this)">Pertemuan 3</a>
          <a href="#" class="list-group-item list-group-item-action buton" onclick="pert4(this)">Pertemuan 4</a>
          <a href="#" class="list-group-item list-group-item-action buton" onclick="pert5(this)">Pertemuan 5</a>
        </div>
      </div>

      <div class="col-12 col-sm-8" id="container-info">
        <h3 class="fw-bold text-center">Informasi Umum</h3>
        <div class="container">

          <div class="container-fluid border border-danger rounded mt-3" id="containerItem">
            <p class="text-center text-danger my-5 ">
              Silahkan pilih item modul ajar yang ingin ditampilkan
            </p>

          </div>
        </div>
      </div>
  </section>


  <!-------------Section Menu----------------------------->
  <section id="section-menu">
    <div class="container-fluid d-flex justify-content-center py-4">
      <form action="" method="post">
        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2 ">
          <div class="container-sm cols order-2 order-sm-1 mb-3 mb-sm-0">
            <h2 class="text-start mt-3 mt-sm-5">Pendahuluan</h2>
            <p class="text-start lead text-align-justify">Pendahuluan hanya digunakan untuk memberikan dukungan referensi selama siswa mengerjakan proyek. Pastikan anda telah mempelajari tema proyek yang anda pilih! </p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold " name="Overview">Lihat Pendahuluan</button>
          </div>
          <div class="cols order-1 order-sm-2">
            <img class="img-thumbnail" src="css/img/Overview (2).jpg" alt="">
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="discussion">
          <div class="cols">
            <img class="img-thumbnail" src="css/img/diskusi.jpg" alt="">
          </div>
          <div class="cols mb-3 mb-sm-0">
            <div class="container-sm">
              <h2 class="text-start mt-3 mt-sm-5">Forum Diskusi</h2>
              <p class="text-start lead text-align-justify">Gunakan fitur forum diskusi untuk melakukan diskusi dengan siswa anda untuk memulai proyek bersama siswa</p>
              <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="discussionForum">Mulai Diskusi</button>
            </div>
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="library">
          <div class="cols order-2 order-sm-1 mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Perpustakaan</h2>
            <p class="text-start lead text-align-justify">Gunakan fitur perpustakaan untuk melihat dan memastikan jika siswa anda benar-benar membaca referensi untuk pengerjaan proyek </p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="library-guru">Akses Perpustakaan</button>
          </div>
          <div class="cols order-1 order-sm-2">
            <img class="img-thumbnail" src="css/img/library.jpg" alt="">
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="rencanaProyek">
          <div class="cols"><img class="img-thumbnail" src="css/img/planning.jpg" alt=""></div>
          <div class="cols mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Rencana Proyek</h2>
            <p class="text-start lead text-align-justify">Gunakan fitur ini untuk melihat rencana proyek yang telah dikerjakan oleh siswa anda. </p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="Planing" name="planning">Mulai Rencana</button>
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="timeline">
          <div class="cols order-2 order-sm-1 mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Timeline & Monitoring</h2>
            <p class="text-start lead text-align-justify"> Gunakan fitur ini untuk melihat dan memonitoring perkembangan pengerjaan proyek dari dokumentasi yang dikumpulkan oleh siswa anda.</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="Timeline" name="toTimeline">Atur Timeline</button>
          </div>
          <div class="cols order-1 order-sm-2"><img class="img-thumbnail" src="css/img/timeline.jpg" alt=""></div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="laporan">
          <div class="cols"><img class="img-thumbnail" src="css/img/assgnment.jpg" alt=""></div>
          <div class="cols mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Laporan Project</h2>
            <p class="text-start lead text-align-justify">Setelah siswa selesai mengumpulkan dokumentasi proyek, gunakan fitur ini untuk mengumpulkan laporan proyek siswa anda yang telah dibuat </p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="laporan" id="report">Akses Laporan Siswa</button>
          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id="presentation">
          <div class="cols order-2 order-sm-1  mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Presentasi</h2>
            <p class="text-start lead text-align-justify">Gunakan fitur ini utnuk melakukan kegiatan presentasi bersama siswa untuk melihat hasil akhir proyek siswa anda</p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" id="presentasion" name="Presentasi">Lihat Presentasi</button>
          </div>
          <div class="cols order-1 order-sm-2">
            <img class="img-thumbnail" src="css/img/presentation.jpg" alt="">

          </div>
        </div>

        <div class="row row-cols-1 container-lg justify-content-center g-0 g-sm-5 row-cols-sm-2" id='penilaian'>
          <div class="cols"><img class="img-thumbnail" src="css/img/grading.jpg" alt=""></div>
          <div class="cols mb-3 mb-sm-0">
            <h2 class="text-start mt-2 mt-sm-5">Penilaian</h2>
            <p class="text-start lead text-align-justify">Gunakan fitur ini untuk memberikan nilai pada tugas dan proyek yang telah dikerjakan oleh siswa </p>
            <button type="submit" class="btn btn-dark rounded-5 fw-bold btn-sm-rounded-5-fw-bold" name="Penilaian"> Berikan Nilai</button>
          </div>
        </div>

    </div>
    </form>
    </div>

  </section>
  <ul id="node" style="position:absolute; top:165%; right:5%; height:1590px;display:flex; flex-direction:column; justify-content:space-between">
    <li style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%;box-shadow:0px 0px 15px green"></li>
    <li style="list-style:none; width:15px; height:15px; background-color:green;border-radius:50%;box-shadow:0px 0px 15px green"></li>
    <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
    <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
    <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
    <li style="list-style:none; width:15px; height:15px; background-color:red;border-radius:50%; box-shadow:0px 0px 15px red"></li>
  </ul>
  <!----------------Footer----------------------------------------------------------->
  <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
    <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
    <p class="text-lead text-center text-white">&copy Copyright 2023</p>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    document.querySelector("#nav-toggle").addEventListener("click", function() {
      document.querySelector("#main-text ").classList.toggle("block");
      document.querySelector('#modules').classList.toggle('block');
    });
  </script>
  <script src="Controller/JsController/logoutTransfer.js"></script>
  <script src="JS/SteadyState.js"></script>
  <script>
    const userClass = <?php print_r(json_encode($_SESSION["Class"])) ?>
  </script>
  <!--<script src="Controller/JsController/setPoint.js"></script>-->
  <!--  <script src="Controller/JsController/setPoint2.js"></script>-->
  <!--  <script src="Controller/JsController/setPoint3.js"></script>-->
  <!--  <script src="Controller/JsController/setPoint4.js"></script>-->
  <script>
    const discussion = document.getElementById("discussion");
    const library = document.getElementById("library");
    if (window.innerWidth < 600) {
      discussion.style.borderBottom = "5px solid #198754";
      library.style.borderBottom = "5px solid #198754";
    } else {
      const nodes = document.getElementById("node");
      const listAll = nodes.querySelectorAll("li");
      listAll[0].style = "list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
      listAll[1].style = "list-style:none; width:15px; height:15px; background-color:green;border-radius:50%; box-shadow:0px 0px 15px green";
    }
  </script>
  <script>
    const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
  </script>
  <script src="Controller/JsController/getProfilePic.js"></script>
  <script src="Controller/JsController/ShowModul.js"></script>
</body>

</html>