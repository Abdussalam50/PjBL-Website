<?php 
include "Db_connection.php";

$data=json_decode(file_get_contents("php://input"),true);
$groupName=$data["value"];
$tblSearch=strtolower(str_replace(" ","",$groupName));
$user=$data["user"];
$sqlQuery="SELECT * FROM table_$tblSearch WHERE NAME_USER='$user'";

$result=mysqli_query($conn,$sqlQuery);
if($result){
if(mysqli_num_rows($result)>0){

    setcookie('grpName',"$groupName",0,"/");
    echo json_encode(array("condition"=>true));
    
}else{
    echo json_encode(array('condition'=>"notFound"));
    exit();
}
}else{
    echo json_encode(array('error' => 'Query execution error: ' . mysqli_error($conn)));
}



