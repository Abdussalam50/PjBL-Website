<?php
include "Db_connection.php";
if($_GET["data"] && isset($_COOKIE['grpName'])){
    $name=$_GET["data"];
    $groupTable=strtolower($_COOKIE['grpName']);
    $group=$_COOKIE['grpName'];
    $sqlGet="SELECT * FROM table_$groupTable WHERE NAME_USER='$name' AND KELOMPOK='$group'";
    $result=mysqli_query($conn,$sqlGet);
    if(mysqli_num_rows($result)>0){
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $prjName=$row["NAME_PROJECT"];
            $data[]=array($prjName);
        }

        echo json_encode($data);
    }else{
        echo "null";
    }
}