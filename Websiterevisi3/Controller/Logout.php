<?php 
if(isset($_POST["Logout"])){
    session_unset();
    session_destroy();
    header("Location:Login-siswa-guru.php");
}