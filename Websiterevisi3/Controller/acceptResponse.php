<?php

include "Db_connection.php";
$response=json_decode(file_get_contents("php://input"),true);
$refName=$response['ref'];
$linkPath="Controller/Model/$refName";
$stmtRequest=mysqli_prepare($conn,"SELECT * FROM table_referensi WHERE REFERENSI=?");
mysqli_stmt_bind_param($stmtRequest,"s",$linkPath);
$execute=mysqli_stmt_execute($stmtRequest);
$result=mysqli_stmt_get_result($stmtRequest);
if($execute){
    echo "true";
    if(mysqli_num_rows($result)>0){
        $stmtInsertStatusTrue=mysqli_prepare($conn,"UPDATE table_referensi SET STATUS=? WHERE REFERENSI=?");
        $status="true";
        mysqli_stmt_bind_param($stmtInsertStatusTrue,"ss",$status,$linkPath);
        $executeInsertStatusTrue=mysqli_stmt_execute($stmtInsertStatusTrue);
        if($executeInsertStatusTrue){
            echo json_encode("Tanggapan dikirim");
        }else {
            echo json_encode(['success' => false, 'message' => 'Insert failed: ' . mysqli_stmt_error($stmtInsertStatusTrue)]);
        }
    }else{
        echo json_encode("false");
    }
}