<?php
$data=json_decode(file_get_contents("php://input"),true);
date_default_timezone_set("Asia/Jakarta");
include "Db_connection.php";
require __DIR__.'/../vendor/autoload.php';
 use Pusher\PushNotifications\PushNotifications;
try{
 $beamCredential= new PushNotifications(array(
    'instanceId'=>'4dba92eb-b065-4840-9c7b-e2c8a285dcd6',
    'secretKey'=>'78165E45120B90B933E02219A6B312C048E1F0E3C3EAB31771D5CB6E6937BC3B'
 ));

 header("Content-Type:application/json");

}catch(Exception $e){
    die("Error initializing Pusher Beams: ".$e->getMessage());

}

if($data==null || !isset($data['username'])||!isset($data['msg'])){
    echo json_encode(array("status"=>"error","code"=>http_response_code(400)));
}else{
    $username=$data['username'];
    $message=$data["msg"];
    $date=date("Y-m-d H:i:s");
    $class=$data["kelas"];
    $notifFramework=array(
        'fcm'=>array(
            'notification'=>array(
                'title'=>'Forum Diskusi from:'.$username,
                'body'=>$message,
                'sound'=>'default'
            ),
        ),
        'apns'=>array(
            'aps'=>array(
                'alert'=>array(
                    'title'=>'Forum Diskusi from: '.$username,
                    'body'=>$message,
                    
                ),

                'sound'=>'notifMessage.mp3'
            ),
        ),
            'web'=>array(
                'notification'=>array(
                    'title'=>'Forum Diskusi from :'.$username,
                    'body'=>$message,
                    'sound'=>'ringtone\notifMessage.mp3'
                )
            )
    );
    $group=$data['grp'];
if(in_array($group,$data)){
   try{
    $publishResponse=$beamCredential->publishToInterests(
        array('headvisor',$group),$notifFramework
    );
    if($publishResponse){
        try{
            $stmtInsert=mysqli_prepare($conn,"INSERT INTO table_notification_message(username,message,date) VALUES(?,?,?)");
            mysqli_stmt_bind_param($stmtInsert,"sss",$username,$message,$date);
            $execute=mysqli_stmt_execute($stmtInsert);

            if($execute){
                echo json_encode(['publish_id'=>$publishResponse->publishId]);
            }else{
                echo json_encode(array('error'=>'Internal server error'));
                http_response_code(500);
            }
        }catch(PDOException $error){
            echo json_encode(array(
                'status'=>'error',
                'code'=>http_response_code(500),
                'message'=>$error->getMessage()
            ));
        }
    }
}catch(Exception $e){
    echo json_encode(
    array(
            'status'=>'error',
            'code'=>http_response_code(400),
            'message'=>$e->getMessage()
        )
    );
}
}else{
    try{
        $publishResponse=$beamCredential->publishToInterests(
            array('discussions'),$notifFramework
        );
        if($publishResponse){
            $stmtInsert=mysqli_prepare($conn,"INSERT INTO table_notification_message(username,message,date,Kelas) VALUES(?,?,?,?)");
            mysqli_stmt_bind_param($stmtInsert,"ssss",$username,$message,$date,$class);
            $execute=mysqli_stmt_execute($stmtInsert);

            if($execute){
                echo json_encode(['publish_id'=>$publishResponse->publishId]);
            }else{
                echo json_encode(array('error'=>'Internal server error'));
                http_response_code(500);
            }
        }
    }catch(Exception $err){
        echo json_encode(array("status"=>"error",
        "code"=>http_response_code(400),
        "message"=>$err->getMessage()));
    }
}
}

