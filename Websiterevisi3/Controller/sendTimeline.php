<?php
include "Db_connection.php";
if(isset($_POST["setTimeline"])){

$nameStep=$_POST["step"];
$groupName=str_replace(" ","",$_POST["groupName"]);
$time=$_POST["time"];
$class=$_POST["class"];
echo $groupName;
$sqlImportprjName="SELECT * FROM table_kelompok WHERE NAMA_KELOMPOK='$groupName'";
$resultImport=mysqli_query($conn,$sqlImportprjName);

if(mysqli_num_rows($resultImport)>0){
    while($row=mysqli_fetch_assoc($resultImport)){
        $prjName=$row["PROJECT_NAME"];
        $ID=$row["STD_ID"];
    }
    $sqlTimeLine="INSERT INTO table_timeline (ID_KELOMPOK, NAMA_TAHAP, NAMA_PROJECT, NAMA_KELOMPOK, DEADLINE, KELAS) VALUES ('$ID','$nameStep','$prjName','$groupName','$time','$class')";
    if(mysqli_query($conn,$sqlTimeLine)){
    echo "<script>alert('Timeline berhasil disimpan!')</script>";
    }else{
        echo "<script>alert('Timeline gagal disimpan!Error: " . mysqli_error($conn) . "')</script>";
    }
}else{
    echo "<script>alert('failed')</script>";
}

}