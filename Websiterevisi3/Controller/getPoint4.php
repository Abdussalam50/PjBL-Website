<?php
include "Db_connection.php";
if(isset($_GET['userclass'])){
$class=$_GET['userclass'];

$sqlQuery="SELECT * FROM table_monitoring WHERE KELAS='$class'";
$queryResult=mysqli_query($conn,$sqlQuery);
if(mysqli_num_rows($queryResult)>0){    
    $grp=array();
    while( $row = mysqli_fetch_assoc($queryResult) ) {  
        $grp[]=$row["NAMA_KELOMPOK"];
    }
    $grpLength=count($grp);

    $queryGrp="SELECT * FROM table_timeline WHERE KELAS='$class'";
    $grpResult=mysqli_query($conn, $queryGrp); 
    if(mysqli_num_rows($grpResult)>0){
        $grpMon=array();
        while($rows=mysqli_fetch_assoc($grpResult)){
            $grpMon[]=$rows["NAMA_KELOMPOK"];
        }
        $grpMonLength=count($grpMon);
        if($grpLength===$grpMonLength){
            echo "acc";
        }else{
            echo "denied";
      }
    }else{
        echo "false";
    }
}else{
    echo "denied";
}
}
