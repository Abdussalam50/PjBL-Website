<?php
include "Db_connection.php";
$jsonContent = json_decode(file_get_contents("php://input"), true);
$class = $jsonContent["class"];
$laporanArray = array();
$projectArray = array();
$presentationArray = array();
$productArray=array();
$peerAssessmentArray=array();
function fetchData($conn, $query, $class)
{
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $class);
    $execute = mysqli_stmt_execute($stmt);
    if ($execute) {
        $result = mysqli_stmt_get_result($stmt);
        $dataArray = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $dataArray[] = $row;
            }
        }
        return $dataArray;
    }else{
        return false;
    }
}

$laporanData = fetchData($conn, "SELECT * FROM table_score_laporan WHERE KELAS=?", $class);

if ($laporanData !== false) {
    foreach ($laporanData as $row) {
        $laporanArray[] = array(
            'KELOMPOK' => $row["KELOMPOK"],
            'SCORE' => $row["SCORE"]
        );
    }
}

$projectData = fetchData($conn, "SELECT * FROM table_projectscore WHERE KELAS=?", $class);
if ($projectData !== false) {
    foreach ($projectData as $row) {
        $projectArray[] = array(
            'NameGroup' => $row["NameGroup"],
            'Score' => $row["Score"]
        );
    }
}

$presentationData = fetchData($conn, "SELECT * FROM table_nilai_presentasi WHERE CLASS=?", $class);
if ($presentationData !== false) {
    foreach ($presentationData as $row) {
        $presentationArray[] = array(
            'NameGroup' => $row["GROUP"],
            'Score' => $row["SCORE"]
        );
    }
}

$getProductData=mysqli_prepare($conn,"SELECT Kelompok,SUM(LevelRespon) AS Total_Level FROM table_refleksi WHERE Kelas=? AND Kelompok IN (SELECT Kelompok FROM table_refleksi GROUP BY Kelompok HAVING COUNT(*)>1) GROUP BY Kelompok ORDER BY Kelompok");
mysqli_stmt_bind_param($getProductData,"s",$class);
$executeProductData=mysqli_stmt_execute($getProductData);
if($executeProductData){
    $resultProductData=mysqli_stmt_get_result($getProductData);
    if(mysqli_num_rows($resultProductData)>0){
        while($row=mysqli_fetch_assoc($resultProductData)){
            $productArray[]=array(
                'Kelompok'=>$row["Kelompok"],
                'Score'=>$row["Total_Level"]
            );
        }
    }
}

$getPeerAssessmentData=mysqli_prepare($conn,"SELECT Teman,Class,Pertemuan,SUM(Score) AS Total_Score FROM table_peerassessment WHERE Class=? AND Teman IN (SELECT Teman FROM table_peerassessment GROUP BY Teman HAVING COUNT(*)>1) GROUP BY Teman ORDER BY Teman");
mysqli_stmt_bind_param($getPeerAssessmentData,"s",$class);
$executePeerAssessment=mysqli_stmt_execute($getPeerAssessmentData);
if($executePeerAssessment){
    $resultPeerAssessment=mysqli_stmt_get_result($getPeerAssessmentData);
    if(mysqli_num_rows($resultPeerAssessment)>0){
        while($rowPeerAssessment=mysqli_fetch_assoc($resultPeerAssessment)){
            $peerAssessmentArray[]=array(
                'Teman'=>$rowPeerAssessment["Teman"],
                'Kelas'=>$rowPeerAssessment["Class"],
                'Score'=>$rowPeerAssessment["Total_Score"]
            );
        }
    }
}

$getLengthGroup=mysqli_prepare($conn,"SELECT *FROM table_kelompok WHERE KELAS=?");
mysqli_stmt_bind_param($getLengthGroup,"s",$class);
$executeLengthGroup=mysqli_stmt_execute($getLengthGroup);

if($executeLengthGroup){
    $resultLengthGroup=mysqli_stmt_get_result($getLengthGroup);
    $lengthGroup=array();
    if(mysqli_num_rows($resultLengthGroup)>0){
        while($rowLengthGroup=mysqli_fetch_assoc($resultLengthGroup)){
            $lengthGroup[]=$rowLengthGroup["NAMA_KELOMPOK"];
        }

    }
}
$dataGet = json_encode(array(
    'scoreLaporan' => $laporanArray,
    'projectScore' => $projectArray,
    'presentationScore' => $presentationArray,
    'productScore' => $productArray,
    'peerAssessmentScore' => $peerAssessmentArray,
    'lengthGroup' => count($lengthGroup)
));
header("Content-type:application/json");
echo $dataGet;
