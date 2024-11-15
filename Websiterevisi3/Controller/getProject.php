<?php
include "Db_connection.php";
if(isset($_GET["Projects"])){
    $class=$_GET["Projects"];
    $sqlQuery="SELECT * FROM table_kelompok WHERE KELAS ='$class'";
    $result=mysqli_query($conn,$sqlQuery);

    if(mysqli_num_rows( $result ) > 0){
        $dataKelompok=array();
        while($row=mysqli_fetch_assoc($result)){
            $dataKelompok[]=$row["NAMA_KELOMPOK"];
        }

        echo json_encode($dataKelompok);
    }else{
        echo"false";
    }
    
}
    
