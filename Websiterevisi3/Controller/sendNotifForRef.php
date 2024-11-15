<?php


include "Db_connection.php";
require __DIR__.'/../vendor/autoload.php';
date_default_timezone_set("Asia/Jakarta");
use Pusher\PushNotifications\PushNotifications;
try{
    $beamsCredential=new PushNotifications(array(
        'instanceId'=>'4dba92eb-b065-4840-9c7b-e2c8a285dcd6',
        'secretKey'=>'78165E45120B90B933E02219A6B312C048E1F0E3C3EAB31771D5CB6E6937BC3B'
        ));
        
        header('Content-Type:application/json');
}catch(Exception $e){
    die("Error initializing Pusher Beams: " . $e->getMessage());
}

$input=json_decode(file_get_contents('php://input'),true);

if($input==null||!isset($input['user'])||!isset($input['interest'])||!isset($input['decResponses'])||!isset($input['refId']))
{
   echo json_encode(array(
        'error'=>'Invalid input',
        'httpResponse'=>http_response_code(400),
   ));
}else{
    $user=$input['user'];
    $interest=str_replace(" ","",$input['interest']);
    // echo json_encode($interest);
    $response=$input['decResponses'];
    try{

        $publishResponse=$beamsCredential->publishToInterests(
            array($interest),array(
                'fcm'=>array(
                    'notification'=>array(
                        'title'=>'Referensi siswa from :'.$user,
                        'body'=>$response
                    ),
                    ),
                    'apns'=>array(
                        'aps'=>array(
                            'alert'=>array(
                                'title'=>'Referensi siswa from :'.$user,
                                'body'=>$response
                            ),
                        ),
                    ),
                        'web'=>array(
                            'notification'=>array(
                                'title'=>'Referensi siswa from :'.$user,
                                'body'=>$response
                            )
                        )
                )

                );
            if($publishResponse){
                $date=date('Y-m-d H:i:s');
                $refId=$input['refId'];
                $linkPathRef="Controller/Model/$refId";
                $stmtInsert=mysqli_prepare($conn,"INSERT INTO table_notification_reference (user, response, date) VALUES (?,?,?)");
                mysqli_stmt_bind_param($stmtInsert,"sss",$user,$response,$date);
                $execute=mysqli_stmt_execute($stmtInsert);
                if($execute){
                    $stmtInsertFalse=mysqli_prepare($conn,"UPDATE table_referensi SET STATUS=? WHERE REFERENSI=?");
                    $status="false";
                    mysqli_stmt_bind_param($stmtInsertFalse,"ss",$status,$linkPathRef);
                    $executeFalse=mysqli_stmt_execute($stmtInsertFalse);
                    if($executeFalse){
                    // echo json_encode(['publish_id'=>$publishResponse->publishId]);
                    echo json_encode($refId);
                    }
                }else{
                    echo json_encode(array('error'=>'Internal server error'));
                    http_response_code(500);
                }
            }
               
    }catch(Exception $err)
    {
        error_log("Error: " . $err->getMessage());
        echo json_encode(['error'=>$err->getMessage()]);
        http_response_code(500);
        
    }
}


// use Kreait\Firebase\Factory;
// use Kreait\Firebase\Messaging\CloudMessage;
// use  Kreait\Firebase\Messaging\Notification;

// $data = json_decode(file_get_contents('php://input'), true);
// $username = $data["user"];
// $id_user = $data["idUser"];
// $response=$data["decResponses"];
// $groupName=strtolower($data["grpName"]);
// $stmtReq = mysqli_prepare($conn, "SELECT * FROM table_fcmfbck WHERE user_id!=? AND kelompok=?");
// mysqli_stmt_bind_param($stmtReq, "ss", $id_user,$groupName);
// $stmtExcuted = mysqli_stmt_execute($stmtReq);
// if ($stmtExcuted) {
//     $resultExecuted=mysqli_stmt_get_result($stmtReq);
//     if($resultExecuted){
//         if(mysqli_num_rows($resultExecuted)>0){
//             $tokenFcm=array();
//             while($rowGroup=mysqli_fetch_assoc($resultExecuted)){
//                 $tokenFcm[]=$rowGroup["token"];
//             }
//         }

//     foreach($tokenFcm as $token){
//         // echo json_encode($token);
//         try{
//              // initialize firebase
//             $serviceAccount = __DIR__ . '/../config/serviceAccountForNotif.json';
//             $firebaseMessaging = (new Factory)->withServiceAccount($serviceAccount)->createMessaging();
//             $message = CloudMessage::withTarget('token', $token)->withNotification(Notification::create('Referensi Siswa (from:'.$username.")",$response));
//             $firebaseMessaging->send($message);
//             echo "Notification sent to token: $token\n";
//             }catch(\Kreait\Firebase\Exception\Messaging\InvalidArgument $e){
//                 echo "An error has occurred: {$e->getMessage()}\n";
//             }
//     }
   
//     }
// }

// mysqli_close($conn);

