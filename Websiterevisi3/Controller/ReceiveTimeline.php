<?php
date_default_timezone_set("Asia/Jakarta");
require "Db_connection.php";
if(isset($_GET["getTimeline"])){
$decode=urldecode($_GET['getTimeline']);
$decodeData=json_decode($decode,true);

$class=$decodeData['class'];
$group=str_replace(" ","",$decodeData['group']);

$sql= "SELECT * FROM table_timeline WHERE `KELAS`='$class'AND `NAMA_KELOMPOK`='$group'";
$result = mysqli_query($conn, $sql); //run the query against the database
if(mysqli_num_rows($result)>0){
$arrayData=array();

while($row=mysqli_fetch_assoc($result)){
    $stepName=$row["NAMA_TAHAP"];
    $nameProject=$row["NAMA_PROJECT"];
    $deadlines=$row["DEADLINE"];
    $status=$row['STATUS'];
    $deadline=strtotime($deadlines);
    $currentTime= strtotime(date("Y-m-d H:i:s"));
    $resultTime=-$currentTime + $deadline;
    $day=floor($resultTime/(60*60*24));
    $hour=floor($resultTime%(60*60*24)/(60*60));
    $minute=floor($resultTime%(60*60)/(60));
    $second=$resultTime%60;
    $arrayTime=array();
    if($resultTime<=0){
        $notify= "Batas waktu pengumpulan tugas telah selesai";
        $arrayTime['notify']=$notify;
    }else{

        $arrayTime['day']=$day;
        $arrayTime['hour']=$hour;
        $arrayTime['minute']=$minute;
        $arrayTime['second']=$second;
    }
    $arrayData[]=array(
        "stepName"=>$stepName,
        "nameProject"=>$nameProject,
        "deadline"=>$deadlines,
        'time'=>$arrayTime,
        'statuses'=>$status
    );

}
echo json_encode($arrayData);//return data as json format
}else{
    echo "false";
}


}