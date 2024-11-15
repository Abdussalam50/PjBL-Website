<?php
include "Db_connection.php";
$response=json_decode(file_get_contents("php://input"),true);
$stmtChecking=mysqli_prepare($conn,"SELECT * FROM table_notification_message WHERE message=?");
mysqli_stmt_bind_param($stmtChecking,"s",$response);
$execute=mysqli_stmt_execute($stmtChecking);
$result=mysqli_stmt_get_result($stmtChecking);
if($execute){
    if(mysqli_num_rows($result)>0){
       try{
            $stmtDeleteNotifMessage=mysqli_prepare($conn,"DELETE FROM table_notification_message WHERE message=?");
            mysqli_stmt_bind_param($stmtDeleteNotifMessage,"s",$response);
            $deleteExecute=mysqli_stmt_execute($stmtDeleteNotifMessage);
    if($deleteExecute)
    {
        echo "s";
    }else{
        echo json_encode("cannot delete notification");
    }
}catch(Exception $e){
    echo json_encode("error occured $e");
}
    }else{
        echo "false";
    }
}
// try{

// $stmtDeleteNotifMessage=mysqli_prepare($conn,"DELETE FROM table_notification_message WHERE message=?");
// mysqli_stmt_bind_param($stmtDeleteNotifMessage,"s",$response);
// $deleteExecute=mysqli_stmt_execute($stmtDeleteNotifMessage);
// if($deleteExecute){
//     echo "s";
// }else{
//     echo json_encode("cannot delete notification");
// }
// }catch(Exception $e){
//     echo json_encode("error occured $e");
// }