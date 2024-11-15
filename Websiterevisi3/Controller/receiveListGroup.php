<?php
include "Db_connection.php";
if(isset($_GET["thisClass"])){
    $className=$_GET["thisClass"];
    $sqlQuery="SELECT * FROM table_kelompok WHERE KELAS='$className'";
    $result=mysqli_query($conn,$sqlQuery); 

    if($result){
        $rowGroup=array();
        while($row=mysqli_fetch_assoc($result)){
            $rowGroup[]=$row["NAMA_KELOMPOK"];
        }

        echo json_encode($rowGroup);
    }else{
        echo false;
    }
}