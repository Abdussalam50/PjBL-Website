<?php 
require "Db_connection.php";
if(isset($_POST["up-plan"])){
    $prjName=$_POST["prj-name"];
    $groupName=str_replace(" ","",$_POST["group-name"]);
    $fileName=$_FILES["fPlan"]["name"];
    $tmp_name=$_FILES["fPlan"]["tmp_name"];
    $fileSize=$_FILES["fPlan"]["size"];
   
    $maxFileSize=2;
    $fileMb=$maxFileSize/(1024*1024);
    $time= date("Y-m-d H:i:s");
    $class=$_SESSION["classStd"];
    //make path file
    $getExtFile=explode(".",$fileName);
    $extentsionFile=end($getExtFile);
    if($extentsionFile=="pdf" || $extentsionFile=="docx" && $fileSize<=$fileMb){
    $path="Controller/filePlanning/".$fileName;
    }else{
        echo "<script>alert('Ekstensi file tidak valid atau file lebih besar dari 2 Mb!')</script>";
    }
    //checking group 
    $sqlSource="SELECT * FROM table_kelompok WHERE NAMA_KELOMPOK='$groupName'";
    $result=mysqli_query($conn,$sqlSource);
    if(mysqli_num_rows($result)){
        $row=mysqli_fetch_assoc($result);
        $rowSTD_ID=$row["STD_ID"];
        $sqlPlan= "INSERT INTO table_project_planning(ID_KELOMPOK, NAMA_KELOMPOK, NAMA_PROJECT, PLANNING_FILE, TIME, CLASS) VALUES('$rowSTD_ID','$groupName','$prjName','$path','$time','$class' )";
        mysqli_query($conn,$sqlPlan);
        move_uploaded_file($tmp_name,$path);
        echo "<Script>alert('File telah ditambahkan!')</script>";
    }else{
        echo "<script>alert('Kelompok tidak ditemukan!')</script>";
    }
    
}
