<?php
include "Controller/VerifySessionSiswa.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/Refleksi.css">
  <link rel="stylesheet" href="css/sliderUi.css">
  <title>Refleksi Siswa</title>
</head>

<body>
  <!--------------------------Navigation--------------------------------------------->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid align-items-center">
      <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
      <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
  <!---------------------------------------Body--------------------------------------------------------------------------------------->
  <div class="container-fluid row py-3 p-0 ms-1" style="height:700px">
    <div class="col-12 col-sm-3 border-end border-end-secondary m-0 p-0" id="container-class">
      <h2 class="fw-3 text-dark">Daftar Kelompok</h2>
      <ul class="container-fluid m-0 p-0" id="container-list-grp">
      </ul>
    </div>
    <div class="col-12 col-sm-9 container-lg d-flex flex-column">
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
      <div class="container-fluid row gx-3">
        <h2 class="fs-3 col-8 col-sm-10">Penilaian</h2>
        <p class="fs-6 text-dark">
          Berikan penilaian pada produk dari kelompok lain dengan mengikuti aturan pada rubrik dibawah ini:
        </p>
        <div class="dropdown d-flex justify-content-end mb-3">
          <a class="btn btn-dark btn-sm dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Rubrik Penilaian
          </a>

          <div class="dropdown-menu ">
            <div class="container-fluid">
              <h3 class="fs-4 text-dark">A. Rubrik Penilaian</h3>
              <p class="text-lead fs-6">Anda akan mengamati hasil karya teman-teman mu, kemukakan berbagai pertanyaan pada
                kelompok pembuat karya dan buatlah rating berdasarkan respon yang diberikan serta penampilan yang disuguhkan.
                Gunakan panduan penilaian berikut ini :</p>
              <div class="container-lg">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>Level Respon</th>
                      <th>Ekspektasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Teman menjawab tidak tepat. Komunikasi teman tidak jelas.
                        Teman tidak menunjukan pemahaman konten sains (Fisika)
                        pada jawaban</td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Teman menjawab hampir tepat. Komunikasi teman cukup jelas.
                        Teman menunjukkan level pemahaman yang cukup baik
                        mengenai konten sains (Fisika) pada jawaban</td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Teman menjawab pertanyaan secara baik, benar dan tepat.
                        Komunikasi yang digunakan sangat baik. Teman menunjukan
                        pemahaman yang kuat mengenai konten sains (Fisika) pada
                        jawaban</td>
                    </tr>
                  </tbody>
                </table>

              </div>
              <p class="text-lead fs-6">Sugesti pertanyaan</p>
              <p class="text-lead fs-6">
                Berikut ini adalah daftar pertanyaan yang dapat membantu kamu untuk
                melakukan komunikasi dengan kelompok yang menyajikan hasil karyanya.
                Interview dapat dilakukan dengan menanyakan hal lain diluar rambu-rambu
              </p>
              <ol>
                <li>Jelaskan pada saya manfaat produk anda !</li>
                <li>Jelaskan pada secara lengkap tentang produk kelompok anda!</li>
                <li>Apakah produk dari kelompok anda dapat menjelaskan gerak lurus berubah beraturan?</li>
                <li>Apa alasan kuat anda jika produk kelompok anda dapat menjelaskan jenis gerak lurus berubah beraturan?</li>
                <li>Apakah ada aspek fisika lain dari produk kelompok anda? Jika ada jelaskan tolong jelaskan!</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <table>
        <thead>
          <tr>
            <th>Respon teman</th>
            <th>Level Respon</th>
            <th>Komentar</th>
          </tr>
        </thead>
        <tbody id="tbody">
          <tr>
            <td><input placeholder="Respon teman anda" type="text" class="form-control" id="0"></td>
            <td><input placeholder="Level Respon" type="text" class="form-control" id="1"></td>
            <td><input placeholder="Masukkan komentar" type="text" class="form-control" id="2"></td>
          </tr>
        </tbody>
      </table>

      <button onclick='addRow()' id="addRow" class="fw-bold"> <i class="bi bi-plus-square-dotted fw-bold" id="btn"></i> Tambah Respon</button>

      <div class="container-fluid">
        <!-- <label for="" class="form-label" id="group">Kelompok anda</label>
        <input type="text" class="form-control" placeholder="Kelompok anda" id="selfGroup">
        <label for="" class="form-label mt-2">Kelompok yang anda nilai</label>
        <input type="text" class="form-control" placeholder="Kelompok..." id="AxisGroup"> -->
        <button class="btn btn-outline-dark mt-3" id="thisData">Submit Penilaian</button>

        <p>Setelah melakukan penilaian terhadap produk teman anda, lanjutkan dengan <a href="PeerAssessment.php">penilaian teman anda satu kelompok</a></p>
      </div>
    </div>

  </div>
</body>
<button class="btn btn-primary rounded-circle position-absolute top-50 start-0 z-2 d-block d-sm-none" id="hide-menu"><i class="bi bi-arrow-up-circle-fill fs-3" id="icon"></i></button>
<script src="JS/addRow.js"></script>

<script>

  const groupAxis = <?php echo isset($_COOKIE["grpName"])? json_encode($_COOKIE["grpName"]):"" ?>;
</script>
<script>
  const className = <?php echo json_encode($_SESSION["classStd"], JSON_UNESCAPED_UNICODE); ?>;
</script>
<script>  const userName = <?php echo json_encode($_SESSION["username"], JSON_UNESCAPED_UNICODE) ?>;</script>
<script src="Controller/JsController/sendReview.js"></script>
<script src="Controller/JsController/listGroup.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="Controller/JsController/logoutTransfer.js"></script>
<script src="JS/hide-content-refleksi.js"></script>
<script>
  const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
</script>
<script src="Controller/JsController/getProfilePic.js"></script>

</html>