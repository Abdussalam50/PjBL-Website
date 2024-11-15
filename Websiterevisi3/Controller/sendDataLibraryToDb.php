<?php
function collectingData(){
$Users=$_SESSION["username"];
$group=$_POST["input-group"];
$prjName=$_POST["project"];
$NameFile=$_FILES["input-file"]["name"];
$tmpFiles=$_FILES["input-file"]["tmp_name"];
$fileSize=$_FILES["input-file"]["size"];
$error=$_FILES["input-file"]["error"];
$class=$_SESSION["classStd"];
$descReference=$_POST["description"];

$strFile=explode(".",$NameFile);
$extension = end($strFile);  
//checking extendtion
if(in_array(strtolower($extension), array("pdf"))){
    //move to path file
    $Path="Controller/Model/".$NameFile;
    move_uploaded_file($tmpFiles,$Path) or die ("Error uploading the file");
    //move to Database
    $dsn="mysql:host=Localhost;dbname=nlpteamm_web_database";
    $uname="nlpteamm_t-tas";
    $pass="3_7HUMHvy4)w";
    $conn=new PDO($dsn,$uname,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $sqlDb="INSERT INTO table_referensi (REFERENSI, NAME_STD, PROJECT_NAME, KELOMPOK, KELAS, DESKRIPSI_REFERENSI)  VALUES (:path,:name,:namePrj,:group, :class, :desc)";
    $stmt=$conn->prepare($sqlDb);
    $stmt->bindParam(':path',$Path);
    $stmt->bindParam(':name',$Users);
    $stmt->bindParam(':namePrj',$prjName);
    $stmt->bindParam(':group',$group);
    $stmt->bindParam(':class',$class);
    $stmt->bindParam(':desc',$descReference);
    $stmt->execute();
    echo "<script> alert('Berhasil disimpan')</script>";
}else{
    echo "<script> alert('File tidak berekstensi pdf atau $error')</script>";
}
print_r($strFile);
//make file path

}

if(isset($_POST["submit"])){
    collectingData();
}