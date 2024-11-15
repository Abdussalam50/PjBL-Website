<?php
include "Db_connection.php";
date_default_timezone_set("Asia/Jakarta");
if(isset($_POST["upload"])){

$judulVideo=$_POST["title-video"];
$group=$_POST["Group"];
$class=$_POST["class"];
$linkPresentasi=$_POST["vid-link"];
$dateTime=date("Y-m-d H:i:s");
$sqlSource="SELECT * FROM table_kelompok WHERE KELAS = '$class'";
$rsult=mysqli_query($conn,$sqlSource);
if(mysqli_num_rows($rsult)>0){
    $row=mysqli_fetch_assoc($rsult);
    $projectName=$row["PROJECT_NAME"];
    $sqlPresentasi="INSERT INTO table_presentasi (ID_VIDEO, NAMA_KELOMPOK, NAMA_PROJECT, WAKTU_PENGUMPULAN, KELAS,LINK)VALUES ('','$group','$projectName','$dateTime','$class','$linkPresentasi')";
    if(mysqli_query($conn,$sqlPresentasi)){
    
    echo "<script>alert('Link berhasil diinput!') </script>";
    }else{
        echo "<script>alert('error:') </script>";
    }
}else{
    echo "<script>alert('data tidak ditemukan!')</script>";
}
   
}