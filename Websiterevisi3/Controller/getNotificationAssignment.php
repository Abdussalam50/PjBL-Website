<?php 
include "Db_connection.php";
$response=file_get_contents("php://input");
date_default_timezone_set("Asia/Jakarta");
$date=date("Y-m-d H:i:s");
$timeDisplay=strtotime($date)-604800;

$stmtReferensi=mysqli_prepare($conn,"SELECT * FROM table_monitoring WHERE DATE=? AND KELAS=?");
mysqli_stmt_bind_param($stmtReferensi,"is",$timeDisplay,$response);
$stmtExecute=mysqli_stmt_execute($stmtReferensi);
$resultStmt=mysqli_stmt_get_result($stmtReferensi);
if($stmtExecute){
        $group=array();
        $projectName=array();
        $link=array();

        while($rowAssignment1=mysqli_fetch_assoc($resultStmt)){
            $group[]=$rowAssignment1["NAMA_KELOMPOK"];
            $projectName[]=$rowAssignment1["NAMA_PROJECT"];
            $link[]='websiterevisi3/Atur_timeline(guru).php';
           
        }

        $dataSend=json_encode(array(
            'group'=>$group,
            'projectName'=>$projectName,
            'link'=>$link
        ));
        echo $dataSend;
   
}   