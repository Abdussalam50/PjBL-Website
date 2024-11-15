<?php
include "Db_connection.php";

if($_GET["prjName"]) {
    $name=$_GET["prjName"];
    $sqlSource = "SELECT * FROM table_referensi WHERE PROJECT_NAME='$name'";
    $resultSource = mysqli_query($conn, $sqlSource);
    // Define variables outside the loop
    if(mysqli_num_rows($resultSource)){
    $arr=array();
    while ($row = mysqli_fetch_assoc($resultSource)) {
        $ref = $row["REFERENSI"];
        $explode = explode("/", $ref);
        $reference = $explode[2];
        $arr[] = array(
            'reference' => $reference,
            'description' => $row["DESKRIPSI_REFERENSI"],
            'status'=>$row["STATUS"]
        );
        }
        echo json_encode($arr);
    }
    }



