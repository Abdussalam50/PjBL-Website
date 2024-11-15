<?php
include "Db_connection.php";
if(isset($_GET["getDataRefStd"])){
$Class=$_GET["getDataRefStd"];
$sqlQuery="SELECT * FROM table_referensi WHERE KELAS='$Class'";
$result=mysqli_query($conn,$sqlQuery);

$data=[];

while($row=mysqli_fetch_assoc($result)){
    $rowUser= $row["NAME_STD"];
    $rowReference=$row["REFERENSI"];
    $rowExplode=explode("/",$rowReference);
    $reference=$rowExplode[2];
    $rowPrjName=$row["PROJECT_NAME"];
    $rowGroup=$row["KELOMPOK"];
    $rowDesc=$row["DESKRIPSI_REFERENSI"];
    
    $data[]=array(
        'name'=>$rowUser,
        'reference'=>$reference,
        'project'=>$rowPrjName,
        'grouping'=>$rowGroup,
        'description'=>$rowDesc
    );
}

print_r ( json_encode($data));
}else{
    echo "failed";
}