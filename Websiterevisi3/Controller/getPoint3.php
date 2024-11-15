<?php
include "Db_connection.php";
 
    $response=json_decode(file_get_contents("php://input"),true);
    $stmtGetMonitoring=mysqli_prepare($conn,"SELECT * FROM table_monitoring WHERE KELAS=?");
    $class=$response['kelas'];
    mysqli_stmt_bind_param($stmtGetMonitoring,"s",$class);
    $executeGetMonitoring=mysqli_stmt_execute($stmtGetMonitoring);

    if($executeGetMonitoring){
        $result=mysqli_stmt_get_result($stmtGetMonitoring);
            $stepNameMonitoring=array();
            $nameGroupsMonitoring=array();
            $nameGroupsTimeline=array();
            $stepNameTimeline=array();
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
                $stepNameMonitoring[]=str_replace(".pdf","",basename($row["FILE_MONITORING"]));
                $nameGroupsMonitoring[]=$row["NAMA_KELOMPOK"];
            }
        }
        try{

            $stmtGetTimeline=mysqli_prepare($conn,"SELECT * FROM table_timeline WHERE KELAS=?");
            mysqli_stmt_bind_param($stmtGetTimeline,"s",$class);
            $executeGetTimeline=mysqli_stmt_execute($stmtGetTimeline);
            if($executeGetTimeline){
                $resultGetTimeline=mysqli_stmt_get_result($stmtGetTimeline);
                if(mysqli_num_rows($resultGetTimeline)>0){
                    while($row=mysqli_fetch_assoc($resultGetTimeline)){
                        $stepNameTimeline[]=$row["NAMA_TAHAP"];
                        $nameGroupsTimeline[]=$row["NAMA_KELOMPOK"];
                    }
                }
            }

        }catch(Exception $e){
            echo json_encode("Error $e");
        }
        
        
         if(count($stepNameMonitoring) == count($stepNameTimeline) &&
        count($nameGroupsMonitoring) == count($nameGroupsTimeline) &&
        count($stepNameMonitoring) > 0 && count($stepNameTimeline) > 0 &&
        count($nameGroupsMonitoring) > 0 && count($nameGroupsTimeline) > 0){
            echo "true";
        }else{
            echo "denied";
        }
    }
