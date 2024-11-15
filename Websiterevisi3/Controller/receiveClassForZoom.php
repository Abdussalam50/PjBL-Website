<?php 
include "Db_connection.php";
if($_GET["userGuru"]){
    $name=$_GET["userGuru"];
$sqlGet="SELECT * FROM table_guru WHERE NAME='$name'";
$result=mysqli_query($conn,$sqlGet);
if(mysqli_num_rows($result)>0){
    $class=array();
    while($row=mysqli_fetch_assoc($result)){
        $class[]=array($row["KELAS_AJAR"]);
    }

    echo json_encode($class);
}   
}