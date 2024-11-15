<?php
include "Db_connection.php";
$grpName=strtolower(str_replace(" ","",$_COOKIE['grpName']));

$stmtTeamMate=mysqli_prepare($conn,"SELECT * FROM table_$grpName");
$execute=mysqli_stmt_execute($stmtTeamMate);
$resultTeamMate=mysqli_stmt_get_result($stmtTeamMate);
if($execute){
   
    if(mysqli_num_rows($resultTeamMate)>0){
        $nameTeamMate=[];
        while($rowTeammate=mysqli_fetch_assoc($resultTeamMate)){
            $nameTeamMate[]=$rowTeammate["NAME_USER"];
        }

        echo json_encode($nameTeamMate);
    }
}