<?php 
include "Db_connection.php";
if($_GET["del"]){
    $msgDel=$_GET["del"];
    $sqlGet="SELECT * FROM table_forum_diskusi WHERE CHAT ='$msgDel'";
    $result=mysqli_query($conn,$sqlGet);
    if(mysqli_num_rows($result) >0){
        $sqlDel="DELETE FROM table_forum_diskusi WHERE CHAT='$msgDel'";
      mysqli_query($conn,$sqlDel);
      echo "true";
    }
}