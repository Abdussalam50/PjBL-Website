<?php
include "Db_connection.php";
if(isset($_GET["item"])){
$getComment=$_GET["item"];
$sqlDelete="DELETE FROM table_comment WHERE COMMENT='$getComment'";
$result=mysqli_query($conn,$sqlDelete);
if($result){
    echo "true";
}
}
