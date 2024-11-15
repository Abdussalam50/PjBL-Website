<?php

function register($data){
    include "Db_connection.php";
    $Username=strtolower($data["Users"]);
    $IdUser=$data["Nums"];
    $class=$data["userClass"];
    $Password=strtolower(mysqli_real_escape_string($conn,$data["password"]));
    $role=$data["role"];

    if($role=="Siswa")
    {
        $hashingPwStd=password_hash($Password,PASSWORD_DEFAULT);
        $queryUserSTD="INSERT INTO table_siswa VALUES('','$Username','$IdUser','$class','$hashingPwStd')";
        $resultSTD=mysqli_query($conn,$queryUserSTD);
        var_dump($resultSTD);
        return $resultSTD;
    }
    else
    {
        $hashingPwGuru=password_hash($Password,PASSWORD_DEFAULT);
        $queryGuru="INSERT INTO table_guru VALUES('','$Username','$IdUser','$class','$hashingPwGuru')";
        $resultGuru=mysqli_query($conn,$queryGuru);

        return $resultGuru;
    }
}

if(isset($_POST["register"])){
    if(register($_POST)>0){
        echo"<script>alert('Silahkan Lakukan Login')</script>";
    }else{
        echo "<script>alert('Pastikan form register diisi dengan benar!')</script>";
    }
}