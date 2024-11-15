<?php
include "Db_connection.php";
if(isset($_GET["iniFile"])){
    $param=strtolower($_GET["iniFile"]);
    echo $param;
    $sqlSource="SELECT * FROM table_monitoring";
    $result=mysqli_query($conn,$sqlSource);
    while($row=mysqli_fetch_assoc($result)){
        $rowFile=$row["FILE_MONITORING"];
         $basename=strtolower(basename($rowFile));
         $namesExplode=explode(".",$basename);
         $names=$namesExplode[0];
       
        if($param===$names){
            $pathExplode=explode("/",$rowFile);
            $dir=$pathExplode[1];
            $fileName=basename($rowFile);
            $path=$dir."/".$fileName;
            if(file_exists($path)){
                header('Content-Description: File Transfer');
                header("Content-type:application/octet-stream");
                header("Content-Disposition:attachment;filename=".basename($path)."");
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header("Content-length:".filesize($path));
                readfile($path);//push it out to the browser!
                exit();
            }else{
                echo "File Not Found";
            }
        }else{
            echo "<script>alert('tidak nama file yang sama')</script>";
        }
    }
}