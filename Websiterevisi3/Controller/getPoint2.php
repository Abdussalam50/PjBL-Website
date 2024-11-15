<?php
include "Db_connection.php";
if(isset($_GET['kelas'])){
$class=$_GET['kelas'];
$queryGrp="SELECT * FROM table_kelompok WHERE KELAS='$class'";
$resultGrp=mysqli_query($conn,$queryGrp);
if(mysqli_num_rows($resultGrp)>0){
    $grpAll=array();
    while($row=mysqli_fetch_assoc($resultGrp)){
        $grpAll[]=$row["NAMA_KELOMPOK"];
        
    }
    $arrGrpLength=count($grpAll);
    $queryLprGroup="SELECT * FROM table_project_planning WHERE CLASS='$class'";
    $resultLprGroup=mysqli_query($conn,$queryLprGroup);
    if( mysqli_num_rows($resultLprGroup)>0){
        $arrGrp=array();
        while($rowLpr=mysqli_fetch_assoc($resultLprGroup)){
            $arrGrp[]=$rowLpr["NAMA_KELOMPOK"];

        }
       $arrGrpLngth=count($arrGrp);
        
       if($arrGrpLngth==$arrGrpLength){
            echo "acc";
        }else{
            echo "denied";
        }
    }else{
        echo "denied";
    }
}else{
    echo "denied";
}
}