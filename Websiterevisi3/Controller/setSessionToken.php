<?php
include "Db_connection.php";
$data = json_decode(file_get_contents("php://input"),true);
$userExist = $data['user'];
$userClass=$data['class'];

$queryGrpTable = "SELECT* FROM table_kelompok WHERE KELAS='$userClass'";
$result = mysqli_query($conn, $queryGrpTable);
if (mysqli_num_rows($result) > 0) {
    $token = isset($_COOKIE["grpName"]);

    if ($token === true) {
        $valToken = $_COOKIE["grpName"];
        if ($valToken == 'undefinedexpires=0') {
            echo  json_encode(array('tokenval' => 'invalid'));
        } else {
            
            $tokenExist = strtolower(str_replace(" ", "", $_COOKIE["grpName"]));
            
            $sqlReq = "SELECT * FROM table_$tokenExist WHERE NAME_USER='$userExist'";
            $resultExist = mysqli_query($conn, $sqlReq);
            if (mysqli_num_rows($resultExist)> 0) {
                
                echo json_encode(array('tokenval' => true,'token'=>$_COOKIE["grpName"]));
            } else {
                echo json_encode(array('tokenval' => false));
                
            }
        }
    } else {
        echo json_encode(array('tokenval' => 'none'));
    }
} else {
  echo json_encode(array('tokenval'=>'default'));
}
