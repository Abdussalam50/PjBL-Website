<?php 
if(isset($_POST["discussionForum"])){
    $class=$_SESSION["classStd"];
    header("Location:Diskusi-kelompok-siswa.php?kelas=$class");
}