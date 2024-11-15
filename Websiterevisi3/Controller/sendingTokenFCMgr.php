<?php
include "Db_connection.php";
date_default_timezone_set("Asia/Jakarta");
$data=json_decode(file_get_contents("php://input",true));
if($data!==null){
    echo json_encode(array('true'=>'i am back'));
// $stmtReq=mysqli_prepare($conn,"SELECT * FROM table_guru WHERE NAME=?");
// $username=$data["user"];
// mysqli_stmt_bind_param($stmtReq,"s",$username);
// mysqli_stmt_execute($stmtReq);
// $resultReq=mysqli_stmt_get_result($stmtReq);
// if($resultReq){

//     if(mysqli_num_rows($resultReq)>0){
//         $rowUser=mysqli_fetch_assoc($resultReq);
//         $userId=$rowUser["NIP"];
//         $sqlChecking= mysqli_prepare($conn,"SELECT * FROM table_tokenfcmgr WHERE user_id=? ");
//         mysqli_stmt_bind_param($stmtChecking,"s",$userId);
//         mysqli_stmt_execute($sqlChecking);
//         $resultChecking=mysqli_stmt_get_result($sqlChecking);
//         if($resultChecking){
//             $token=$data["token"];
//             $date=date("Y-m-d H:i:s");
//             if(mysqli_num_rows($resultChecking)>0){
//                 $sqlUpdate=mysqli_prepare($conn,"UPDATE table_token_fcmgr SET token=?,date=? WHERE user_id=?");
//                 mysqli_stmt_bind_param($sqlUpdate,"sss",$token,$date,$userId);
//                 mysqli_stmt_execute($sqlUpdate);
//                 mysqli_stmt_close($sqlUpdate);
//             }else{
//                 $sqlInsert=mysqli_prepare($conn,"INSERT INTO table_token_fcmgr (user_id,token,date) VALUES (?,?,?)");
//                 if($sqlInsert){
//                     mysqli_stmt_bind_param($sqlInsert,"sss",$userId,$token,$date);
//                     mysqli_stmt_execute($sqlInsert);
//                     mysqli_stmt_close($sqlInsert);
//                 }else{
//                     error_log("Failed to insert statement :".mysqli_error($conn));
//                 }
              
//             }
//         }
//     }else {
//         $response = array(
//             'status' => 'error',
//             'message' => 'User not found'
//         );
//         header('Content-Type: application/json');
//         http_response_code(404);
//         echo json_encode($response);
//     }
// }

}else{
    echo json_encode("data is null");
}