<?php
include "Db_connection.php";
if(isset($_GET["getClass"])){
$name=$_GET["getClass"];
$sqlDb="SELECT * FROM table_guru WHERE NAME='$name'";
$resDb=mysqli_query($conn,$sqlDb);
if(mysqli_num_rows($resDb)>0){
    $dataClass=array();
    while($row=mysqli_fetch_assoc($resDb)){
        $classDb=$row["KELAS_AJAR"];
       $dataClass[]=array($classDb);
    }
    echo json_encode($dataClass,JSON_PRETTY_PRINT);
}
}