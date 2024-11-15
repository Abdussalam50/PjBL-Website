<?php
session_start();
header("Cache-Control: no-cache, must-revalidate"); // HTTP 1.1
header("Pragma: no-cache"); // HTTP 1.0
header("Expires: 0"); // Proxies
if($_SESSION["Role"]!=="Siswa"){
    session_unset();
    session_destroy();
    header("Location: Login-siswa-guru.php");
    exit;
}
