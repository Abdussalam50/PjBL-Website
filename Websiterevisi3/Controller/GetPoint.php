<?php 
include "Db_connection.php";
if(isset($_GET['class'])){
$class=$_GET['class'];
$sql="SELECT * FROM table_referensi WHERE KELAS='$class'";
$sqlModulus="SELECT * FROM table_kelompok WHERE KELAS='$class'";
$resultModulus=mysqli_query($conn,$sqlModulus);
$result=mysqli_query($conn,$sql);
if($result){
    $grpName=array();
    while($row=mysqli_fetch_assoc($result)){
        $grpName[]=$row["KELOMPOK"];
        
    }
    $grpModulus=array();
    if(mysqli_num_rows($resultModulus)>0){
        
        while($rowModulus=mysqli_fetch_assoc($resultModulus)){
            $grpModulus[]=$rowModulus["NAMA_KELOMPOK"];
            
        }
    }
    
    $grpSpesific=array_unique($grpName);
    $count=array_count_values($grpName);
    $arrVal=array_values($count);
    $assign=false;
    foreach($arrVal as $value){
        if($value>=1){
            $assign=true;
            break;
        }
    }

    if(count($arrVal)==count($grpModulus) && $assign){
        echo "acc";
    }else if(count($arrVal)<=1 &&count($grpModulus)==0){
        echo "denied";
    }else{
        echo "denied";
    }
}
}