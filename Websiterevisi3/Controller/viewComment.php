<?php
include "Db_connection.php";
if(isset($_GET["Link"])){
$decodeLink= urldecode( $_GET['Link'] );  //Decoding the URL to get the actual link
$sql="SELECT * FROM table_comment";
$result=mysqli_query($conn,$sql);
$Data=array();
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)) {
        $name=$row["NAMA"];
        $comment=$row["COMMENT"];
        $kelomppk=$row["KELOMPOK"];
        $date=$row["TIME"];
        $link=$row["LINK"];
        
        if($_GET["Link"]==$link){
        $Data[]=array(
            'name'=>$name,
            'comment'=>$comment,
            'kelompok'=>$kelomppk,
            'time'=>$date
        );
        
    }
   
}
echo json_encode($Data);
}
}
?>