<?php
    include "Db_connection.php";
    if(isset($_POST["joins"])){
    $name=strtolower($_POST["name"]);
    $class=$_POST["class"];
    $group=strtolower(str_replace(" ","",$_POST["group"]));
    $prjName=$_POST["prjName"];
    $token=mysqli_real_escape_string($conn,$_POST["token"]);

    $sqlToken= "SELECT * FROM table_kelompok WHERE STD_ID ='$token'";
    //cek apakah token ada didalam database atau tidak
    $resultToken= mysqli_query($conn, $sqlToken) or die("Error in querying database");
    
    if($name!==strtolower($_SESSION["username"]) || mysqli_num_rows($resultToken)==false){
        echo "<script>alert('tidak dapat memasukkan nama lain selain nama dari akun anda atau token yang anda masukkan salah!')</script>";
    }else{
        $nameTable="table_$group";

    $sqlInsert="INSERT INTO $nameTable ( NAME_USER, CLASS, NAME_PROJECT, TOKEN, KELOMPOK) VALUES('$name','$class','$prjName','$token','$group')";
    $result=mysqli_query($conn,$sqlInsert);
    if($result){
        setcookie('grpName',ucwords($group),0,"/");
        echo "<script>alert('Berhasil disimpan')</script>";
    }else{
        echo "<script>alert('Error occured')</script>";
    }
    
}

//   echo"<script>alert('no data send')</script>";
}




