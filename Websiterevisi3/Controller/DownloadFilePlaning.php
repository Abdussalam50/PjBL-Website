<?php 
require_once "Db_connection.php";
if(isset($_GET["file"])){
$path=$_GET["file"];

$sqlGet="SELECT * FROM table_project_planning WHERE PLANNING_FILE='$path'";
$result=mysqli_query($conn,$sqlGet);
if(mysqli_num_rows($result)>0){
    $row=mysqli_fetch_assoc($result);
    $file=$row["PLANNING_FILE"];
    $fileExplode=explode("/",$file);
    $fileName=end($fileExplode);
    $realPath=str_replace("Controller/","",$path);
  
    if(basename($path)===$fileName){
        if(file_exists($realPath)){
         
            header('Content-Description: File Transfer');
            header("Content-type:application/octet-stream");
            header("Content-Disposition:attachment;filename=".basename($path)."");
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header("Content-length:".filesize($realPath));
            readfile($realPath);//push it out to the browser!
            exit();
        }else{
            echo "File Not Found";
        }
    }
}



}