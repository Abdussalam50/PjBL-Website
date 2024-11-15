<?php
include "Db_connection.php";
if(isset($_POST["submit"])){
    // echo "<script>alert('berhasil')</script>";
    $nameProject=$_POST["nameProject"];
    $fileName=$_FILES["fileLaporan"]["name"];
    $tmpFile=$_FILES["fileLaporan"]["tmp_name"];
    $path="Controller/FileLaporan/".$fileName;
    $time=date("Y-m-d H:i:s");
    $fileExplode=explode(".",$fileName);
    $fileExtension=end($fileExplode);
    $sqlSource="SELECT * FROM table_kelompok WHERE PROJECT_NAME='$nameProject'";
    $resultSource=mysqli_query($conn,$sqlSource);
    if(mysqli_num_rows($resultSource)>0){
        $row=mysqli_fetch_assoc($resultSource);
        $projectName=strtolower($row["PROJECT_NAME"]);
        $userClass=$row["KELAS"];
        $groupName=$row["NAMA_KELOMPOK"];
            if($fileExtension=="pdf"){
                echo "<script>alert('Laporan anda telah dikirim')</script>";
                move_uploaded_file($tmpFile,$path);
                $sqlInsert="INSERT INTO table_laporan_siswa ( NAMA_KELOMPOK, FILE_LAPORAN, NAMA_PROJECT, TIME, KELAS) VALUES ('$groupName','$path','$nameProject','$time','$userClass')";
                mysqli_query($conn,$sqlInsert);
            }else{
                echo "<script>alert('file anda tidak dalam format pdf!')</script>";
            }

    }else{
        echo "Project tidak ditemukan";
    }
    
}