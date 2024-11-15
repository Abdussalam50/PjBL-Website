<?php 
include "Db_connection.php";
if(isset($_GET["user"])){
    $user=strtolower($_GET["user"]);
    $sqlSource="SELECT * FROM table_guru WHERE NAME='$user'";
    $result=mysqli_query($conn,$sqlSource);
    if(mysqli_num_rows($result)>0){
        $class=array();
        while($row=mysqli_fetch_assoc($result)){
            $class[]=array(
                'class'=>$row["KELAS_AJAR"]);
            
            
        }
        echo json_encode($class);
    }
}