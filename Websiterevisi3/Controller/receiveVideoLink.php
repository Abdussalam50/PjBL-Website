<?php
include "Db_connection.php";
if(isset($_GET["getClass"])){
 
    $class=$_GET["getClass"];
   
    $sqlSource="SELECT * FROM table_presentasi WHERE KELAS='$class'";
    $result=mysqli_query($conn,$sqlSource);
    if(mysqli_num_rows($result)>0){
     
        $dataGet=array();
        while($row=mysqli_fetch_assoc($result)){
            $nameClass=$row["KELAS"];
            $nameProject=$row["NAMA_PROJECT"];
            $namaKelompok=$row["NAMA_KELOMPOK"];
            $time=$row["WAKTU_PENGUMPULAN"];
            $link=$row["LINK"];
            if($class===$nameClass){
                $dataGet[]=array(
                    'nameProject'=>$nameProject,
                    'namaKelompok'=>$namaKelompok,
                    'waktu'=>$time,
                    'link'=>$link
                );
            }
        }
        echo json_encode($dataGet);
    }else{
        echo "false";
    }
}