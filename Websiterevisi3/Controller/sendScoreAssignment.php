<?php 
include "Db_connection.php";
$response=json_decode(file_get_contents("php://input"),true);
$responseGood=$response["good"];
$responsePoor=$response["poor"];
$responseBad=$response["bad"];
$group=$response["group"];
$class=$response["class"];
$totalScore=(($responseGood*3+$responsePoor*2+$responseBad*1)/36)*100;
try{
$stmtSendAssignment=mysqli_prepare($conn,"INSERT INTO table_nilai_presentasi (`GROUP`,`CLASS`,`SCORE`) VALUES(?,?,?)");
mysqli_stmt_bind_param($stmtSendAssignment,"sss", $group,$class,$totalScore);
$execute=mysqli_stmt_execute($stmtSendAssignment);
if($execute){
    echo json_encode("true");
}
}catch(Exception $e){
    echo json_encode("Error :$e");
}
