<?php
include "Db_connection.php";
if(isset($_GET["CLass"])){
   
    $classGet=$_GET['CLass'];
    
$sqlSource="SELECT * FROM table_laporan_siswa WHERE KELAS='$classGet'";
$result=mysqli_query($conn,$sqlSource);

if(mysqli_num_rows($result)>0){
    $data=array();
    while($row=mysqli_fetch_assoc($result)){
        $userClass=$row["KELAS"];
        if($classGet==$userClass){
            
            $data[]=array(
            'namaProyek'=>$row["NAMA_PROJECT"],
            'namaKelompok'=>ucwords($row["NAMA_KELOMPOK"]),
            'laporan'=>$row["FILE_LAPORAN"],
            'time'=>$row["TIME"]
        );
        }else{
            return "tidak adaa";
        }
    }
    echo json_encode($data);
}
}else{
    return "";
}