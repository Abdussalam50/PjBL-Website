<?php
include "Db_connection.php";
if(isset($_GET["prmClass"])){
    $sqlQuery="SELECT * FROM table_materi";
    $result=mysqli_query($conn,$sqlQuery);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $name=$row["NAME"];
            
            echo $name;
        }
    }
}