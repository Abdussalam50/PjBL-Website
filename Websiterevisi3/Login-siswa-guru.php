<?php
    error_reporting(E_ALL);
    ini_set('display_errors',1);
    
    include "Controller/Login.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang Silahkan Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/a6f42c71af.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/Login-siswa-guru.css">
</head>
<body >
    <div class="container-fluid d-flex justify-content-end" id="button-bar">
        <a href="Login-siswa-guru.php" id="login" class="btn btn-lg me-2 rounded-0 fw-0 fs-5 border border-0 text-white">Login</a>
        <a href="register-siswa-guru.php" id="register" class="btn btn-lg fw-0 fs-5 border border-0 text-white">Register</a>
    </div>
    <!------------------Login Bar------------------------------------>
    <div class="container-sm p-3 rounded-3 my-3 d-flex justify-content-center flex-column " id="login-container">
        <div class="container-lg d-flex justify-content-center align-items-center pt-2"><img src="css/img/logos.png" alt="" id="logo"></div>
        <h2 style="text-align: center;" class="text-white">Silahkan Login</h2>
        <form action="" method="post">
        <div class="container-fluid">
            <label for="" class="form-label py-2 text-white">Username</label>
                <div class="input-group">
                    <span class="input-group-text bg-light" id="namaUser" ><i class="fa-solid fa-user fs-5"></i></span>
                    <input id="namaUser"type="text" name="Users" class="form-control border-success" placeholder="Masukkan username">
                </div>

            <label for="" class="form-label py-2 text-white">Kelas</label>
            <div class="input-group">
                <span class="input-group-text" id="KelasUser"><i class="fa-solid fa-user-group"></i></span>
                <input type="text" name="userClass" class="form-control border-success" placeholder="contoh XII MIPA 2">
            </div>

            <label for="" class="form-label py-2 text-white">Password</label>
            
            <div class="input-group">
                <span class="input-group-text" id="passUser"><i class="fa-solid fa-lock fs-5"></i></span>
               <input type="password" name="Passwords" class="form-control border-success" placeholder="masukkan password">
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
            <button type="submit" name="login" class="btn btn-success btn-md my-3 fw-bold container-fluid" style="--bs-btn-padding-x:03rem ">Login</button>
        </div>
    </form>
    </div>
    <script src="JS/SteadyState.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>