<?php

include "Controller/Register.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a6f42c71af.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Register-menu.css">
    <title>Selamat Datang Silahkan Register </title>
</head>
<body>
    <div class="container-fluid d-flex justify-content-end">
        <a href="Login-siswa-guru.php" id="login" class="btn btn-lg me-2 rounded-0 text-white border border-0">Login</a>
        <a href="register-siswa-guru.php" id="register" class="btn btn-lg rounded text-white border border-0">Register</a>
    </div>
    <div class="container-sm p-3 rounded-3 my-3" id="login-container">
    <div class="container-lg d-flex justify-content-center align-items-center pt-2"><img src="css/img/logos.png" alt="" id="logo"></div>
        <h2 style="text-align: center;" class="text-white"> Silahkan Register</h2>

        <form action="" method="post">
            <div class="container-fluid">
                <label for="" class="form-label py-2 text-white">Username</label>
                    <div class="input-group">
                        <span class="input-group-text" id="namaUser"><i class="fa-solid fa-user fs-5"></i></span>
                        <input id="namaUser"type="text" name="Users" class="form-control border-success">
                    </div>
    
                <label for="" class="form-label py-2 text-white">NISN/NIP</label>
                <div class="input-group">
                    <span class="input-group-text" id="NoUser"><i class="bi bi-database-fill fs-5"></i></span>
                    <input type="text" name="Nums"class="form-control border-success" placeholder="Masukkan NISN/NIP anda">
                </div>
    
                <label for="" class="form-label py-2 text-white">Kelas</label>
                <div class="input-group">
                    <span class="input-group-text" id="KelasUser"><i class="fa-solid fa-user-group"></i></span>
                    <input type="text" name="userClass" class="form-control border-success" placeholder="contoh XII MIPA 2">
                </div>
    
                <label for="" class="form-label py-2 text-white">Password</label>
                <div class="input-group">
                    <span class="input-group-text" id="passUser"><i class="fa-solid fa-lock fs-5"></i></span>
                    <input name="password" type="password" class="form-control border-success" placeholder="masukkan password">
                </div>
                <label for="" class="form-label text-white">Pilih role anda</label>
                <div class="container-fluid d-flex justify-content-evenly">
                         <div class="form-check">
                                <input type="radio" name="role" id=""class="form-check-input" value="Siswa"> <label for="" class="form-check-label text-white">Siswa</label>
                         </div>
                         <div class="form-check">
                                <input type="radio" name="role" id="" class="form-check-input" value="Guru"> <label for="" class="form-check-label text-white">Guru</label>
                         </div>
                </div>
                <button type="submit" name="register" class="btn btn-success btn-md my-3 fw-bold container-fluid" style="--bs-btn-padding-x:03rem ">Register</button>
            </div>
        </form>
    </div>
    
</body>
</html>