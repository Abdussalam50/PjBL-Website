<?php
include "Db_connection.php";
if(isset($_POST["Edit"])){
    $nameFileEdit=$_FILES["inputFile"]['name'];
    $tmpFileEdit=$_FILES["inputFile"]["tmp_name"];
    $sizeFileEdit=$_FILES["inputFile"]["size"];
    //get extension name
    if($nameFileEdit==null&&$tmpFileEdit==null){
        echo "<script>alert('Masukkan file anda !')</script>";
    }else{
    $fileSeparation=explode(".",$nameFileEdit);
    $nameFile=$fileSeparation[0];
    $extensionGet=$fileSeparation[1];
    if($extensionGet=="pdf"){
      
        if($sizeFileEdit>3145728){
            echo "<script> alert('File size is too large')</script>";
            exit;
        }else{
            
            $path="Controller/FileTimeline/".$nameFileEdit;
            $pathGet=str_replace("Controller/","",$path);

                $unlink=unlink($path);
                if($unlink){
                    $groupName=$_COOKIE["grpName"];
                    $stmtUpdate=mysqli_prepare($conn,"UPDATE table_monitoring SET FILE_MONITORING=? WHERE NAMA_KELOMPOK=?");
                    mysqli_stmt_bind_param($stmtUpdate,"ss",$path,$groupName);
                    $execute=mysqli_stmt_execute($stmtUpdate);
                    if($execute){
                    move_uploaded_file($tmpFileEdit,$path);
                    echo "<script>alert('File anda telah di update')</script>";
                    }else{
                        echo "<script> alert('Update Failed')</script>";
                    }
                }else{
                    echo "<script>alert('File lama anda telah dihapus atau tidak ditemukan..')</script>";
                   
                }
        }
    }else{
        echo "<script>alert('Hanya file dengan format pdf yang dapat di upload')</script>";
        exit;
    }
}
}else{
    return "";
}