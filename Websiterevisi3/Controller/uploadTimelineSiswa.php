<?php
include "Db_connection.php";
date_default_timezone_set("Asia/Jakarta");
$date=date("Y-m-d H:i:s");

if(isset($_POST["uploads"])){
    $group=strtolower($_COOKIE['grpName']);
    $class=$_SESSION['classStd'];
    $fileName=$_FILES["inputFile"]["name"];
    $tmpFile=$_FILES["inputFile"]["tmp_name"]; 
    if($fileName==null&&$tmpFile==null){
        echo "<script>alert('Masukkan file anda !')</script>";
    }
    else{
    $fileExplode=explode(".",$fileName);
    $name=$fileExplode[0];
    $sqlSource="SELECT * FROM table_timeline WHERE NAMA_TAHAP ='$name'AND NAMA_KELOMPOK='$group' AND KELAS='$class'";
    $result=mysqli_query($conn,$sqlSource);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        $namaProject=$row['NAMA_PROJECT'];
        $namaKelompok=$row["NAMA_KELOMPOK"];
        $nameTahap=$row["NAMA_TAHAP"];
    $fileExtension=$fileExplode[1];
    if($fileExtension=="pdf" && $name==$nameTahap){

        $pathFile="Controller/FileTimeline/".$fileName;
        if( move_uploaded_file($tmpFile,$pathFile)){
            $status='true';
            $sqlUpload= "INSERT INTO table_monitoring (NAMA_KELOMPOK, NAMA_PROJECT, FILE_MONITORING, DATE,KELAS) VALUES ('$namaKelompok','$namaProject','$pathFile','$date','$class')";
            if(mysqli_query($conn,$sqlUpload)){
                $stmtStatus=mysqli_prepare($conn,"UPDATE table_timeline SET STATUS=? WHERE NAMA_KELOMPOK=? AND NAMA_TAHAP=?");
                mysqli_stmt_bind_param($stmtStatus,"sss",$status,$namaKelompok,$nameTahap);
                mysqli_stmt_execute($stmtStatus);
            };
            
        }else{
            echo "cannot uploaded";
        }
  
    
    }else{
        echo "<script>alert('ekstensi file anda bukan pdf dan proyek anda tidak ditemukan')</script>";
    }
    }else{
        echo "<script>alert('proyek anda tidak ditemukan')</script>";
    }

}
}