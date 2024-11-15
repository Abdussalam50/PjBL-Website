<?php
include "Db_connection.php";
if (isset($_POST["send"])) {
    $urlGet = $_POST["contents"];
    $urlSeparated = str_replace("view?usp=sharing","preview",$urlGet);
    $fixUrl = $urlSeparated;
    $class=$_SESSION["Class"];
    $stmtSelect = mysqli_prepare($conn, "SELECT * FROM table_materi ");
    $executeSelect = mysqli_stmt_execute($stmtSelect);
    if ($executeSelect) {

        $result = mysqli_stmt_get_result($stmtSelect);

        if ($result) {
            if (mysqli_num_rows($result)> 0) {
                $queryUpdate = "UPDATE table_materi SET NAME = ?, KELAS = ? WHERE KELAS = ?";
                $stmtUpdate = mysqli_prepare($conn, $queryUpdate);
                mysqli_stmt_bind_param($stmtUpdate, 'sss', $fixUrl, $class, $class);
                $executeUpdate = mysqli_stmt_execute($stmtUpdate);

                if ($executeUpdate) {
                    echo "<script>alert('Materi anda telah di update')</script>";
                } else {
                    echo "<script>alert('Failed to update Materi')</script>";
                }

                mysqli_stmt_close($stmtUpdate);
            }else {
                
                $queryInsert="INSERT INTO table_materi(`NAME`, `KELAS`) VALUES (?,?)";
                $stmtInsert=mysqli_prepare($conn,$queryInsert);
                mysqli_stmt_bind_param($stmtInsert,"ss",$fixUrl,$class);
                $executeInsert=mysqli_stmt_execute($stmtInsert);
                if($executeInsert){
                    echo "<script>alert('Materi anda telah di upload')</script>";
                }
            }
        } else {
            echo "false";
        }


    }
}
