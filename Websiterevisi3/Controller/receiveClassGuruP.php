<?php
include "Db_connection.php";
if(isset($_POST["datas"])){
    $Class=$_POST["datas"];
    $SqlQuery="SELECT * FROM table_guru WHERE KELAS_AJAR='$Class'";
    $result=mysqli_query($conn,$SqlQuery);
   
    if(mysqli_num_rows($result)){
        $dataClass=array();
        while ($row = mysqli_fetch_assoc($result)) {
            $classDb=$row["KELAS_AJAR"];
            $dataClass[]=array(
                $classDb
            );
        }
        echo json_encode($dataClass);
    }

}