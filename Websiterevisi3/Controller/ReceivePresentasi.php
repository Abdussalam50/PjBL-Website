<?php
include "Db_connection.php";
if(isset($_GET["dataVideo"])){
$sqlVideo="SELECT * FROM table_presentasi";
$result=mysqli_query($conn,$sqlVideo);
$data=array();
if(mysqli_num_rows($result)>0){
    while($rows=mysqli_fetch_assoc($result)){
        $projectName=$rows["NAMA_PROJECT"];
        $namaKelompok=$rows["NAMA_KELOMPOK"];
        $kelas=$rows["KELAS"];
        $link=$rows["LINK"];
        $time=$rows["WAKTU_PENGUMPULAN"];
        $data[]=array(
            'projectName'=>$projectName,
            'namaKelompok'=>$namaKelompok,
            'kelas'=>$kelas,
            'link'=>$link,
            'time'=>$time
        );
    }
    echo json_encode($data);
}
}