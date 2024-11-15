<?php
include "Db_connection.php";

$response=json_decode(file_get_contents('php://input'),true);

try{
$stmtPrepare=mysqli_prepare($conn,"SELECT * FROM table_forum_diskusi WHERE KELOMPOK=? ");
mysqli_stmt_bind_param($stmtPrepare,"s",$response);
$execute=mysqli_stmt_execute($stmtPrepare);
if($execute){
    $result=mysqli_stmt_get_result($stmtPrepare);
    if(mysqli_num_rows($result)>0){
        $rowsData=array();
        while($rowData=mysqli_fetch_assoc($result)){
            $rowsData[]=array(
                'user'=>$rowData['NAME'],
                'date'=>$rowData['DATE'],
                'chat'=>$rowData['CHAT'],
            );
        }
        echo json_encode($rowsData);
    }else{
        echo'none';
    }
}else{
    die("Error : ".mysqli_error($conn));
}
}catch(PDOException $e){
    echo json_encode(array('Error'=> $e->getMessage()));
}