<?php
include "Db_connection.php";
$response=file_get_contents("php://input");
$role=strtolower($response);

$stmt=mysqli_prepare($conn,"SELECT * FROM table_bantuan WHERE ROLE=?");
mysqli_stmt_bind_param($stmt,"s",$role);
$execute=mysqli_stmt_execute($stmt);
if($execute){
    $result=mysqli_stmt_get_result($stmt);
    if(mysqli_num_rows($result)>0){
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=array(
                'link'=>str_replace("560","630",$row["LINK"]),
                'id'=>$row["ID"],
                'title'=>$row["JUDUL"]
            );

        }
        echo json_encode($data);
    }else{
        echo json_encode(array("message"=>"No data found"));
    }
}else{
    echo json_encode(array("message"=>"Error executing query"));
}