<?php
include "Db_connection.php";
if(isset($_POST["login"]))
{
    //define variable
    $username= strtolower($_POST["Users"]);
    $class= $_POST["userClass"];
    $password= $_POST["Passwords"];
    $role=$_POST["role"];
    // Select row

    if($role=="Siswa"){

    //matching data

    $queryStdUser="SELECT * FROM table_siswa WHERE NAME='$username'";
    $StdResult= mysqli_query($conn,$queryStdUser);
    if(mysqli_num_rows($StdResult))
    {
        $row=mysqli_fetch_assoc($StdResult);
        $userSTDDb=$row["NAME"];
        $class=$row["CLASS"];
        $Iduser=$row["NISN"];
        $passwordDb=$row["PASSWORD"];
        if(password_verify($password,$passwordDb)){
            session_start();
            $_SESSION["username"]=$username;
            $_SESSION["classStd"]=$class;
            $_SESSION["student"]=$Iduser;
            $_SESSION["Role"]=$role;
    //Heading user to dashboard menu
            header("Location:dashboard-siswa.php");
            }else{
                echo "<script>alert('Password atau NISN/NIP salah ')</script>";
            }
        
    }else{
            echo "<script>alert('User tidak ditemukan ')</script>";
        }
    }else{
    $queryGuruUser="SELECT * FROM table_guru WHERE NAME='$username'";
    $GuruResult= mysqli_query($conn,$queryGuruUser);
    if(mysqli_num_rows($GuruResult)>0)
    {
        $row=mysqli_fetch_assoc($GuruResult);
        $userDbGuru=$row["NAME"];
        $classGuru=$row["KELAS_AJAR"];
        $Iduser=$row["NIP"];
        $passwordDb=$row["PASSWORD"];
        if(password_verify($password,$passwordDb)){
            session_start();
            $_SESSION["username"]=$userDbGuru;
            $_SESSION["Class"]=$classGuru;
            $_SESSION["IdUser"]=$Iduser;
            $_SESSION["role"]=$role;
    //Heading user to dashboard menu
            header("Location:dashboard-guru.php");
            }else{
                echo "<script>alert('Password atau NISN/NIP salah ')</script>";
            }
        }else{
            echo "<script>alert('User tidak ditemukan ')</script>";
        }
    }

}