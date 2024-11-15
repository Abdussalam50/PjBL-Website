<?php
include "Db_connection.php";
$response=json_decode(file_get_contents("php://input"),true);
$name=$response;
$stmtGetPic=mysqli_prepare($conn,"SELECT* FROM table_profile_img WHERE NAME=?");
mysqli_stmt_bind_param($stmtGetPic,"s",$name);
$executePic=mysqli_stmt_execute($stmtGetPic);
if($executePic){
    $resultPic=mysqli_stmt_get_result($stmtGetPic);
    if(mysqli_num_rows($resultPic)>0){
        $rowPic=mysqli_fetch_assoc($resultPic);
        $img=$rowPic['PATH'];
        echo json_encode($img);
    }else{
        echo json_encode("false");
    }
}