<?php
include "Db_connection.php";
$response=json_decode(file_get_contents("php://input"),true);
try{
$stmtProfile=mysqli_prepare($conn,"SELECT * FROM table_profile_img WHERE NAME=?");
mysqli_stmt_bind_param($stmtProfile,"s",$response);
$execute=mysqli_stmt_execute($stmtProfile);

if($execute){
    $result=mysqli_stmt_get_result($stmtProfile);
    if(mysqli_num_rows($result)>0){
        $row=mysqli_fetch_assoc($result);
        echo json_encode($row["PATH"]);
    }else{
        echo json_encode("false");
    }
}
}catch(Exception $e){
    echo json_encode(array("response"=>$e));
}

