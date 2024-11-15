<?php
include "Db_connection.php";
$getScore=json_decode(file_get_contents("php://input"),true);
$class=$getScore["classes"];
$goodScore=$getScore["baik"];
$normalScore=$getScore["cukup"];
$badScore=$getScore["buruk"];
$group=$getScore["group"];
$totalScore=ceil((($goodScore*3+$normalScore*2+$badScore*1)/9)*100);

try{
$stmtInsertScore=mysqli_prepare($conn,"INSERT INTO table_score_laporan(SCORE, KELOMPOK, KELAS) VALUES(?,?,?)");
mysqli_stmt_bind_param($stmtInsertScore,"sss",$totalScore,$group,$class);
mysqli_stmt_execute($stmtInsertScore);
echo json_encode("successfully inserted score");

}catch(Exception $e){
    echo json_encode("Error occured $e" );
}


