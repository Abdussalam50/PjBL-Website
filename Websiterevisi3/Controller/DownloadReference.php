<?php 
if(isset($_GET["refFile"])){
    $nameFile= $_GET['refFile'];
    $path="Model/".$nameFile;
    
    if(file_exists($path)){
        header("Content-Description:File Transfer");
        header("Content-Type: application/octet-stream");
        header("Content-Disposition:attachment;filename=".basename($path));
        header("Expires:0");
        header("Cache-Control:must-revalidate");
        header("Pragma:Public");
        header("Content-length:".filesize($path));
        readfile($path);
        exit();
    }else{
        echo "File Not Found";
    }
}