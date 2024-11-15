<?php 
include "Db_connection.php";
if(isset($_GET["LinkVideo"])){
$decodeLink=urldecode($_GET['LinkVideo']);
$sql="SELECT * FROM table_comment_guru";
$result=mysqli_query($conn,$sql);


if(mysqli_num_rows($result)>0){
    $datas=array();
    while($row=mysqli_fetch_assoc($result)){
        $name=$row["NAMA_GURU"];
        $comment=$row["COMMENT"];
        $time=$row["TIME"];
        $link=$row["LINK"];
    if($decodeLink==$link){
        $datas[]=array(
            'nama'=>$name,
            'comment'=>$comment,
            'time'=>$time
        );
    }
    }
    echo json_encode($datas);
}
}