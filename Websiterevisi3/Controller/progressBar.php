<?php
include "Db_connection.php";

if(isset($_COOKIE["grpName"])){
    $grpid = str_replace(" ","", mysqli_real_escape_string($conn, $_COOKIE['grpName']));
    
    // Mengisi dataTimeline
    $querySql = "SELECT * FROM table_timeline WHERE NAMA_KELOMPOK='$grpid'";
    $result = mysqli_query($conn, $querySql); 
    $dataTimeline = array();
    
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $dataTimeline[] = $row["NAMA_TAHAP"];
        }
    }

    // Mengisi namePrj
    $sqlReport = "SELECT * FROM table_monitoring WHERE NAMA_KELOMPOK='$grpid'";
    $resReport = mysqli_query($conn, $sqlReport);
    $namePrj = array();
    
    if(mysqli_num_rows($resReport) > 0){
        while($rowRes = mysqli_fetch_assoc($resReport)){
            $namePrj[] = $rowRes["NAMA_PROJECT"];
        }
    }

    // Melakukan perhitungan setelah kedua array diisi
    if (count($dataTimeline) > 0) {
        echo (count($namePrj) / count($dataTimeline)) * 100;
    } else {
        echo 0;
    }
} else {
    echo "not defined";
}
