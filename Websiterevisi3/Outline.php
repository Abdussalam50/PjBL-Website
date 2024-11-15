<?php 
  include "Controller/VerifySessionSiswa.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <title>Pendahuluan</title>
</head>
<body>
    <!--------------------------------------------------Navigation--------------------------------------------------------------->
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
              <li class="nav-item ps-5 "><a href="ProfilAnda.php?role=<?php echo $_SESSION["Role"]?>" class="nav-link pt-3 ps-1 text-start ">Profil</a></li>
              <li class="nav-item ps-5 "><a href="Bantuan.php?role=<?=$_SESSION["Role"]?>" class="nav-link pt-3 ps-1 text-start">Bantuan</a></li>
              <li class="nav-item ps-5 "><a id="log" class=" btn nav-link pt-3 ps-1 text-start">Logout</a></li>
              <li class="nav-item ps-5 d-flex flex-column justify-content-center ps-5 pe-3 ">
                <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r(ucwords($_SESSION["username"])) ?></a>
                <a class="nav-link pt-3 pt-sm-1 ps-1 ps-sm-0 text-start d-sm-text-center" href="#"><?php print_r($_SESSION["student"]) ?></a>
              </li>
              <li class="nav-item justify-content-center"id="li-img">
                <img src="css/img/person.png" alt="person" class="rounded-5 mt-1 ms-5 d-none d-sm-block" width="50px" height="50px">
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
      <!-----------------------------------Body Section--------------------------------------------------------->
      <div class="container-fluid row m-0 p-0" style="height:700px; background-color:#e9ecef">
        <div class="container-fluid">
            <h3 class="fs-3 text-dark fw-3">Overview</h3>
            <div class="container-fluid m-0" id="embed">
            
            </div>
        </div>
      </div>
</body>
<script>
    const usernames=<?php print_r(json_encode(ucwords($_SESSION["username"])))?>;
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    const urClass=<?php echo json_encode($_SESSION["classStd"],JSON_UNESCAPED_UNICODE) ?>;
</script>
<script src="Controller/JsController/outlineReceive.js"></script>
<script src="Controller/JsController/logoutTransfer.js"></script>
<script src="Controller/JsController/getProfilePic.js"></script>

</html>