<?php
include "Db_connection.php";
$stmtGetResponse=mysqli_prepare($conn,"SELECT * FROM table_notification_reference");
$stmtExecute=mysqli_stmt_execute($stmtGetResponse);
$resultGetResponse=mysqli_stmt_get_result($stmtGetResponse);
if($stmtExecute){
    $username=[];
    $response=[];
    $date=[];
    while($row=mysqli_fetch_assoc($resultGetResponse)){
        $username[]=$row["user"];
        $response[]=$row["response"];
        $date[]=$row["date"];
    }

    $dataSend=json_encode(array(
        'username'=>$username,
        'response'=>$response,
        'date'=>$date
    ));
    echo $dataSend;
}