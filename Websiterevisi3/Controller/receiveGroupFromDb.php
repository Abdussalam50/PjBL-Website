
<?php
// untuk gabung kelompok.php
include "Db_connection.php";
if($_GET["getGroups"]){
    $class=$_GET['getGroups'];
    $sqlGroup="SELECT *FROM table_kelompok WHERE KELAS='$class'";
    $result=mysqli_query($conn,$sqlGroup);

    $dataGroup=array();
    while ($row = mysqli_fetch_assoc($result)) {
      $dataGroup[]= array(
        'token'=>$row["STD_ID"],
        'nameGroup'=>$row["NAMA_KELOMPOK"],
        'class'=>$row["KELAS"],
        'prjName'=>$row["PROJECT_NAME"],
      );
    }
     print_r(json_encode($dataGroup));
}else{
    echo "failed";
}