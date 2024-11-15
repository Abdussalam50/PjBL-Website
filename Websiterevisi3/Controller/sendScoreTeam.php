<?php
include "Db_connection.php";
header("Content-Type:application/json");
$inputJson=file_get_contents("php://input");

$score=json_decode($inputJson,TRUE);
date_default_timezone_set("Asia/Jakarta");
$scorer=$score['name'];
$scoreValue=$score['score'];
$scorerClass=$score['class'];
$dateNow=date('Y-m-d H:i:s');
$meeting=$score['meeting'];
try{
$stmtScore=mysqli_prepare($conn,"INSERT INTO table_peerassessment (Teman, Score, Class, Date,Pertemuan)VALUES(?,?,?,?,?)");
mysqli_stmt_bind_param($stmtScore,"sssss",$scorer,$scoreValue,$scorerClass,$dateNow,$meeting);
$result=mysqli_stmt_execute($stmtScore);
if($result){
    echo json_encode([
        'status'=>'success',
        'message'=>'score was saved successfully',
    
    ]);
}else{
    http_response_code(500);
        echo json_encode([
            'status' => 'error',
            'message' => 'Failed to execute statement: ' . mysqli_stmt_error($stmtScore)
        ]);
}
}catch(Exception $e){
    echo json_encode(array("status"=>false,"message"=>$e->getMessage()));
}
