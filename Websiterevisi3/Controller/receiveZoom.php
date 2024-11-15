<?php
include "Db_connection.php";
if(isset($_GET["getClass"])){
    $class = $_GET['getClass'];
    $sqlSource="SELECT *FROM table_presentasi_zoom WHERE KELAS ='$class'";
    $resultSource=mysqli_query($conn,$sqlSource);
    $data=array();
    while ($rowSource = mysqli_fetch_assoc($resultSource)) {
        $data[]=array(
            'namaPresentasi'=>$rowSource["PRESENTASI"],
            'Link'=>$rowSource["LINK"],
            'Waktu'=>$rowSource["WAKTU"]
        );
    }

    echo json_encode($data);
}