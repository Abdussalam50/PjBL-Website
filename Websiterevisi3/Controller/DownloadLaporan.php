<?php
require_once "Db_connection.php";
if(isset($_GET["downLaporan"])){
    $Project=$_GET["downLaporan"];
    $sqlSource="SELECT * FROM table_laporan_siswa WHERE NAMA_PROJECT= '$Project'";
    $result = mysqli_query($conn, $sqlSource);
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            $filePath=$row["FILE_LAPORAN"];
            $file=str_replace("Controller/","",$filePath);
            if(file_exists($file)){
                header('Content-Description: File Transfer');
                header("Content-type:application/octet-stream");
                header("Content-Disposition:attachment;filename=".basename($file)."");
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header("Content-length:".filesize($file));
                readfile($file);//push it out to the browser!
                exit();
            }else{
                echo "File Not Found";
                echo $file;
            }
        }
    }
}