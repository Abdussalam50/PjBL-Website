<?php
include "Db_connection.php";
if(isset($_GET["swaps"])){
$sqlQuery="SELECT * FROM table_materi WHERE ID=1";
$result=mysqli_query($conn,$sqlQuery);
if(mysqli_num_rows($result)>=0){
    $row=mysqli_fetch_assoc($result);
    $fileName=$row["NAME"];
    $path=$fileName;
    echo $path;
}
}

