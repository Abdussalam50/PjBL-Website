<?php

include "Db_connection.php";

$scoreData=json_decode(file_get_contents("php://input"),true);
$scoreTotal=$scoreData["totalScore"];
$id=$scoreData['id'];
$class=$scoreData["class"];

date_default_timezone_set("Asia/Jakarta");
$date=date("Y-m-d H:i:s");
try{
$stmtInsertProjectScore=mysqli_prepare($conn,"INSERT INTO table_projectscore (NameGroup, Score, Date, Kelas) VALUES (?,?,?,?)");
mysqli_stmt_bind_param($stmtInsertProjectScore,"ssss",$id,$scoreTotal,$date,$class);
$execute=mysqli_stmt_execute($stmtInsertProjectScore);
if($execute){
    echo json_encode("Score Inserted successfully");
}
}catch(Exception $e){
    echo json_encode("Error:".$e->getMessage());
}
