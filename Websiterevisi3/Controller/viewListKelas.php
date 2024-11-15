<?php
require "Db_connection.php";
if(isset($_GET["getClass"])){
    $class=$_GET["getClass"];
$getClass="SELECT * FROM table_guru WHERE KELAS_AJAR='$class'";
$result=mysqli_query($conn,$getClass);
    $kelas=array();
while($row=mysqli_fetch_assoc($result)){
    $kelas[]=array($row['KELAS_AJAR']);
    

}
echo json_encode($kelas);
}
