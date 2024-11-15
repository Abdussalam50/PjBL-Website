<?php
include "Db_connection.php";
$dataGet=file_get_contents("php://input");
$stmtGetNotif=mysqli_prepare($conn,'SELECT * FROM table_notification_message WHERE Kelas=?');
mysqli_stmt_bind_param($stmtGetNotif,"s",$dataGet);
$stmtExecute=mysqli_stmt_execute($stmtGetNotif);
$resultGetNotif=mysqli_stmt_get_result($stmtGetNotif);
if($stmtExecute){

    $name=array();
    $message=array();
    $date=array();
    while($row=mysqli_fetch_assoc($resultGetNotif)){
        $name[]=$row["username"];
        $message[]=$row["message"];
        $date[]=$row["date"];
    }
    $dataSend=json_encode(array(
        'name'=>$name,
        'message'=>$message,
        'date'=>$date
    ));
    echo $dataSend;
}
