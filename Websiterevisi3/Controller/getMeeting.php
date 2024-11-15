<?php

include 'Db_connection.php';
$responseJson=json_decode(file_get_contents('php://input'),true);
$class=$responseJson['class'];
$meeting=$responseJson['meeting'];

try{
if($meeting=='Nilaitotal'){
    $stmtTotalValue=mysqli_prepare($conn,"SELECT Teman, Class, Pertemuan, SUM(Score) as Total_Score FROM table_peerassessment WHERE Class=? AND Teman IN(SELECT Teman FROM table_peerassessment GROUP BY Teman HAVING COUNT(*) >=1) GROUP BY Teman,Teman ORDER BY Teman");
    mysqli_stmt_bind_param($stmtTotalValue,"s",$class);
    $executeTotalValue=mysqli_stmt_execute($stmtTotalValue);
    if($executeTotalValue){
        $resultTotalValue=mysqli_stmt_get_result($stmtTotalValue);
        if(mysqli_num_rows($resultTotalValue)>0){
            $rowsDataTotal=array();
            while($rowValue=mysqli_fetch_assoc($resultTotalValue)){
                $rowsDataTotal[]=array(
                    'student'=>$rowValue['Teman'],
                    'score'=>$rowValue['Total_Score'],
                    'class'=>$rowValue['Class']
                    );
            }
            echo json_encode($rowsDataTotal);
        }else{
            echo json_encode('false');
        }
    }
}else{
$stmtGetMeet=mysqli_prepare($conn,"SELECT Teman,Class,Pertemuan,SUM(Score) as Total_Score FROM table_peerassessment WHERE Class=? AND Pertemuan=? AND Pertemuan IN(SELECT Pertemuan FROM table_peerassessment GROUP BY Pertemuan HAVING COUNT(*)>=1)GROUP BY Teman,Pertemuan ORDER BY Pertemuan");
mysqli_stmt_bind_param($stmtGetMeet,'ss',$class,$meeting);
$executeStmt=mysqli_stmt_execute($stmtGetMeet);
if($executeStmt){
    $result=mysqli_stmt_get_result($stmtGetMeet);
    if(mysqli_num_rows($result)>0){
        $rowsData=array();
        while($row=mysqli_fetch_assoc($result)){
            $rowsData[]=array(
                'student'=>$row['Teman'],
                'score'=>$row['Total_Score'],
                'class'=>$row['Class'],
                
            );
        }

        echo json_encode($rowsData);
    }else{
        echo json_encode('false');
    }
}

mysqli_stmt_close($stmtGetMeet);
}
}catch(Exception $e){
    echo json_encode(array('status'=>'error','code'=>http_response_code(500),'message'=>$e->getMessage()));
}
