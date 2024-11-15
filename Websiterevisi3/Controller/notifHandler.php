<?php
include "Db_connection.php";
require __DIR__.'/../vendor/autoload.php';
  $data=json_decode(file_get_contents('php://input'),true);
date_default_timezone_set("Asia/Jakarta");
$options = array(
    'cluster' => 'ap1',
    'useTLS' => true,
    'verify'=>false
  );
  $pusher = new Pusher\Pusher(
    '5d0b769280fcc39eddbb',
    '37dd906b299992963e0d',
    '1807128',
    $options
  );
  try{
  $user=ucwords($data["username"]);
  $msg=$data["msg"];
  $class=$data["kelas"];
  $date=date("Y-m-d H:i:s");
  if(!in_array($data['grp'],$data)){
  $dataSend=json_encode(array(
    'username'=>$user,
    'message'=>$msg,
    'date'=>$date));
  $stmtInsertMsg=mysqli_prepare($conn,"INSERT INTO table_forum_diskusi(NAME, DATE, CHAT,KELAS) VALUES (?,?,?,?)");
  mysqli_stmt_bind_param($stmtInsertMsg,"ssss",$user,$date,$msg,$class);
  $executeStmt=mysqli_stmt_execute($stmtInsertMsg);
  if($executeStmt){
      $pusher->trigger('my-channel', 'my-event', $dataSend);
      echo json_encode(array('status'=>"Ok",'code'=>http_response_code(200)));
  }else{
    echo json_encode("Error statement cannot execute");
  }
}else{
  $dataSend1=json_encode(array(
    'username'=>$user,
    'message'=>$msg,
    'date'=>$date));
  $stmtInsertMsg1=mysqli_prepare($conn,"INSERT INTO table_forum_diskusi(NAME, DATE, CHAT,KELAS,KELOMPOK) VALUES (?,?,?,?,?)");
  mysqli_stmt_bind_param($stmtInsertMsg1,"sssss",$user,$date,$msg,$class,$data['grp']);
  $executeStmt=mysqli_stmt_execute($stmtInsertMsg1);
  if($executeStmt){
      $pusher->trigger('my-channel', $data['grp'], $dataSend1);
      echo json_encode(array('status'=>"Ok",'code'=>http_response_code(200)));
  }else{
    echo json_encode("Error statement cannot execute");
  }

}
}catch(Exception $err){
  echo json_encode("cannot insert message data");
  http_response_code(500);
}

  