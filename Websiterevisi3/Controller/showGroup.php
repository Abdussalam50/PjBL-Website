<?php
include 'Db_connection.php';
$response= json_decode(file_get_contents('php://input'),true);

try{
$stmtPrepare=mysqli_prepare($conn,"SELECT * FROM table_kelompok WHERE KELAS=?");
mysqli_stmt_bind_param($stmtPrepare,"s",$response['kelas']);
$stmtExecute=mysqli_stmt_execute($stmtPrepare);
if($stmtExecute){
    $result=mysqli_stmt_get_result($stmtPrepare);
    if(mysqli_num_rows($result)>0){
        $groupList=[];
        while($row=mysqli_fetch_assoc($result)){
            $groupList[]=ucwords($row['NAMA_KELOMPOK']);
        }

        echo json_encode($groupList);
    }
}
}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}