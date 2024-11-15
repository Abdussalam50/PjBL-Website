<?php

if(isset($_GET["getData"])){
    
    include "Db_connection.php";
    $names=$_GET["getData"];
    $querySqlUserSend="SELECT * FROM table_forum_diskusi WHERE KELOMPOK=''";
    $result=mysqli_query($conn,$querySqlUserSend);
    if($result==true){
 
    $rowData=array();
    
    while($row = mysqli_fetch_assoc($result)){
        
        $rowData[]=array(
            "user"=>$row["NAME"],
            "time"=>$row["DATE"],
            "chat"=>$row["CHAT"],
            "class"=>$row["KELAS"]
        );
        $rowChatSend[]= $row["CHAT"];
        $rowSendUser[]=$row["NAME"];
        $rowSendTime[]=$row["DATE"];
        $rowSendClass[]=$row["KELAS"];
    }
    // var_dump($rowData);
    echo json_encode($rowData);

    }else{
        die("Error : ".mysqli_error($conn));
    }
}  else{
    echo "gagal";
}

