<?php
include "Db_connection.php";

$jsonDecode=json_decode(file_get_contents("php://input"),true);
    try{
    $stmtDelete=mysqli_prepare($conn,"DELETE FROM table_notification_reference WHERE response=?");
    mysqli_stmt_bind_param($stmtDelete,"s",$jsonDecode);
    $executeDelete=mysqli_stmt_execute($stmtDelete);
    if($executeDelete){
        echo "true";
    }else{
        echo json_encode("cannot delete notification");
    }
    mysqli_stmt_close($stmtDelete);
}catch(Exception $e){
    echo json_encode("error occured");
}

