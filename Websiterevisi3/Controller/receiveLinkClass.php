<?php
include "Db_connection.php";
if(isset($_GET["getClass"])){
    $class=$_GET["getClass"];

    $sqlGet="SELECT * FROM table_presentasi_zoom WHERE KELAS='$class'";
    $result=mysqli_query($conn,$sqlGet);
    if(mysqli_num_rows($result)>0){
        $data=array();
        while ($row=mysqli_fetch_assoc($result)) {
            $data[]=array(
                'namaPresentasi'=>$row["PRESENTASI"],
                'Link'=>$row["LINK"],
                'Waktu'=>$row["WAKTU"]
            );
        }
        echo json_encode($data);
    }else{
        echo "false";
    }
}
