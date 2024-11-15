<?php
include "Db_connection.php";
if(isset($_GET["thisUser"])){
    $theName=mysqli_real_escape_string($conn, $_GET['thisUser']);
    $sqlQuery="SELECT * FROM table_guru WHERE NAME='$theName'";
    $result=mysqli_query($conn,$sqlQuery);
    if(mysqli_num_rows($result)>0){
        $Data=array();
        while($rows=mysqli_fetch_assoc($result)){
            $Data[]=$rows["KELAS_AJAR"];
        }
        echo json_encode($Data);
    }
}