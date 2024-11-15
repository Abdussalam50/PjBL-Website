<?php
require "Db_connection.php";
if($_GET["receiveData"]){
$class=$_GET['receiveData'];
$sqlPlanning="SELECT * FROM table_project_planning WHERE CLASS='$class'";
$result=mysqli_query($conn,$sqlPlanning);
if(mysqli_num_rows($result)>0){
$Array=array();
while($row=mysqli_fetch_assoc($result)){
    $fileExplode=explode("/",$row["PLANNING_FILE"]);

    $Array[]= array(
    'prjName'=>$row["NAMA_PROJECT"],
    'group'=>$row["NAMA_KELOMPOK"],
    'class'=>$row["CLASS"],
    'files'=>$fileExplode[2],
    'time'=>$row["TIME"]
   );

}
print_r(json_encode($Array));
}else{
    echo "false";
}
}