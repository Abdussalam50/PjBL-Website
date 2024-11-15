<?php
include "Controller/VerifySessionSiswa.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peer Assessment</title>
    <link rel="stylesheet" href="css/sliderUi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/sliderUi.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid align-items-center">
            <a class="navbar-brand ms-1 ms-sm-5" href="#"><img src="css/img/logo.png" alt="" style="width:180px; height:60px"></a>
            <button id="nav-toggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
                        <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"]))
                                                                                                            ?></a>
                        <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["student"])
                                                                                                            ?></a>
                    </li>
                    <li class="nav-item justify-content-center" id="li-img">
                        <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="container-fluid d-flex justify-content-between align-items-center py-3">
            <h4 class="fs-3 text-dark">Penilaian Antar Teman</h4>
            <div class="dropdown me-2 me-sm-5">
                <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Daftar teman
                </button>
                <ul class="dropdown-menu" id="friendList">

                </ul>
            </div>
        </div>
        <div class="container-fluid py-3">
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
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>No</th>
                        <th>Indikator yang dinilai</th>
                        <th>Pilihan</th>
                    </tr>

                    <tr id="rowInput">
                        <td>1</td>
                        <td>Mengemukakan ide dan pendapat untuk pengerjaan proyek</td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>2</td>
                        <td>Pendapat dan idenyalah yang digunakan
                            dalam pengerjaan proyek
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>
                    <tr id="rowInput">
                        <td>3</td>
                        <td>Sering terlihat panik dan khawatir jika
                            terjadi masalah dalam proyek
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>
                    <tr id="rowInput">
                        <td>4</td>
                        <td>Membantu mencari informasi dari berbagai buku dan internet untuk menunjang pengerjaan proyek</td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>
                    <tr id="rowInput">
                        <td>5</td>
                        <td>Mengingatkan teman untuk tidak
                            melakukan Copy Paste sumber informasi
                            sembarangan
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>6</td>
                        <td>Mengajak kelompok untuk tepat waktu
                            dalam mengerjakan proyek</td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>7</td>
                        <td>Tetap mengerjakan proyek jika memang
                            sudah jadwalnya melaksanakan proyek
                            walau teman-teman yang lain tidak hadir.
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>8</td>
                        <td>Aktif dalam pengerjaan proyek dan tidak
                            pernah izin untuk meninggalkanpekerjaan
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>9</td>
                        <td>Mendahulukan kepentingan kelompok
                            dalam proyek.
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>10</td>
                        <td>Berhati-hati dalam membuat media
                            proyek, menggunakan jaslab dan sarung
                            tangan saat pengerjaan</td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>11</td>
                        <td>Mendorong teman kelompok agar
                            proyeknya rapi dan indah
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>12</td>
                        <td>Selalu berinisiatif dan tidak mengkamulkan teman</td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>13</td>
                        <td>Selalu optimis dan semangat meyakinkan
                            kelompok untuk melakukan yang terbaik
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>

                    <tr id="rowInput">
                        <td>14</td>
                        <td>Terlihat fokus dalam menyelesaikan
                            proyek dan tidak terganggu oleh hal lain
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>
                    <tr id="rowInput">
                        <td>15</td>
                        <td>
                            Mampu mengatasi permasalahan dalam kelompok
                        </td>
                        <td><input type="checkbox" class="form-check-input" name="" id=""></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="container-fluid py-3">
            <select class="form-select" aria-label="Default select example" id='meeting'>
                <option selected>Pilih Pertemuan</option>
                <option class='py-1'value="Pertemuan1">Pertemuan 1</option>
                <option class='py-1'value="Pertemuan2">Pertemuan 2</option>
                <option class='py-1'value="Pertemuan3">Pertemuan 3</option>
                <option class='py-1'value="Pertemuan4">Pertemuan 4</option>
                <option class='py-1'value="Pertemuan5">Pertemuan 5</option>
            </select>
            <button class="btn btn-sm btn-dark mt-3" id="submit"> <i class="bi bi-send-plus"></i> Kirim Nilai</button>
        </div>

    </div>
    <footer class="container-fluid bg-dark d-flex justify-content-center flex-column py-2">
        <p class="text-lead text-center text-white">Created by Wawan Kurniawan S.Si.,M.Si, Febri Berthalita Pujaningsih S.Si.,M.Si, Abdussalam Aswin Hadist</p>
        <p class="text-lead text-center text-white">&copy Copyright 2023</p>
    </footer>
    <script>
        const clases = <?php print_r(json_encode($_SESSION["classStd"])) ?>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="Controller/JsController/receiveTeamMate.js"></script>
    <script src="Controller/JsController/sendScoreTeamMate.js"></script>
    <script src="Controller/JsController/logoutTransfer.js"></script>
    <script>
        const usernames = <?php print_r(json_encode(ucwords($_SESSION["username"]))) ?>;
    </script>
    <script src="Controller/JsController/getProfilePic.js"></script>
</body>

</html>