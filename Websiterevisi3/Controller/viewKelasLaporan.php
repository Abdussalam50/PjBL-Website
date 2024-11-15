<?php

require "Db_connection.php";
if(isset($_GET["getClass"])){
    $name=strtolower($_GET["getClass"]);
$getClass="SELECT KELAS_AJAR FROM table_guru WHERE NAME='$name'";
$result=mysqli_query($conn,$getClass);

$kelas=array();
while($row=mysqli_fetch_assoc($result)){
    $kelas[]=array($row['KELAS_AJAR']);
    

}
echo json_encode($kelas);
}
