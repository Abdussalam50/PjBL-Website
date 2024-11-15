<?php
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include 'Db_connection.php';
if(isset($_GET["template"])){
    $template=mysqli_real_escape_string($conn,$_GET["template"]);
    $path='TemplatePlanning/'.$template.'.docx';
  
    if(file_exists($path)){
        header("Content-Description:File Transfer");
        header("Content-type:application/octet-stream");
        header("Content-Disposition:attachmetn;filename=".basename($path));
        header("Expires:0");
        header("Cache-Control:must-revalidate");
        header("Pragma:public");
        header("Content-length:".filesize($path));
        readfile($path);
        exit();
    }else{
        echo "File Not Found";
    }
}