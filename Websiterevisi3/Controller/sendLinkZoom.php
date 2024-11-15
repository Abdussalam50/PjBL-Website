<?php
include "Db_connection.php";
if(isset($_POST["thisData"])){
   $decodeData=explode(",",$_POST["thisData"]);
   $title=$decodeData[0];
   $link=$decodeData[1];
   $Class=$decodeData[2];
   $date=date("Y-m-d H:i:s");
   $sqlSend="INSERT INTO table_presentasi_zoom (ID, PRESENTASI, LINK, KELAS, WAKTU) VALUES ('','$title','$link','$Class','$date')";
   mysqli_query($conn,$sqlSend);
}