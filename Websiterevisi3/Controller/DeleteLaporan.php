<?php
include "Db_connection.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $response = [
        'files' => $_FILES,
        'data' => $_POST,
    ];

    $fileName = $response['files']['file']['name'];
    $tmpFile = $response['files']['file']['tmp_name'];
    $sizeFile = $response['files']['file']['size'];
    $path = "Controller/FileLaporan/" . $fileName;
    $oldFileName = $response['data']['value'];  // Pastikan path lengkap
   

    // Periksa ukuran file
    if ($sizeFile > 3145728) {
        echo json_encode(["status" => "error", "message" => "File yang anda masukkan terlalu besar"]);
        exit;
    }else{
            // Periksa apakah file lama ada di database
    $stmtCheck = mysqli_prepare($conn, "SELECT * FROM table_laporan_siswa WHERE FILE_LAPORAN=?");
    mysqli_stmt_bind_param($stmtCheck, "s", $oldFileName);
    $executeCheck = mysqli_stmt_execute($stmtCheck);
    $resultCheck=mysqli_stmt_get_result($stmtCheck);
    if($executeCheck){
        if($resultCheck&& mysqli_num_rows($resultCheck)>0){
           
          if(file_exists(str_replace("Controller/","",$oldFileName))){ 
     
              unlink(str_replace("Controller/","",$oldFileName));
            try{
                $stmtUpdate=mysqli_prepare($conn,"UPDATE table_laporan_siswa SET FILE_LAPORAN=? WHERE FILE_LAPORAN=?");
                mysqli_stmt_bind_param($stmtUpdate,"ss",$path,$oldFileName);
                $executeUpdate=mysqli_stmt_execute($stmtUpdate);
                if($executeUpdate){

                    if(move_uploaded_file($tmpFile,str_replace("Controller/","",$path))){
                        echo json_encode(["message"=>"Laporan kelompok anda telah di update"]);
                    }else{
                        echo json_encode(["error"=>"Tidak dapat menyimpan file laporan anda"]);
                    };
                }else{
                    echo json_encode(["error occured"=>mysqli_stmt_error($stmtUpdate)]);
                }
                
            }catch(Exception $e){
                echo json_encode(["error occured"=>$e->getMessage()]);
            }
         
          }else{
              echo json_encode(["message"=>"tidak ada file yang ditemukan"]);
          }
   
        }else{
            echo json_encode(["message"=>"No user found"]);
        }
    }else{
        echo json_encode(["error occured"=>mysqli_stmt_error($stmtCheck)]);
    }
    
}
}


//     if ($executeCheck) {
//         $result = mysqli_stmt_get_result($stmtCheck);

//         if ($result && mysqli_num_rows($result) > 0) {
//             // Unggah file baru
//             if (move_uploaded_file($tmpFile, $path)) {
//                 // Update path file di database
//                 $stmtUpdate = mysqli_prepare($conn, "UPDATE table_laporan_siswa SET FILE_LAPORAN=? WHERE FILE_LAPORAN=?");
//                 mysqli_stmt_bind_param($stmtUpdate, "ss", $path, $oldFileName);
//                 $executeUpdate = mysqli_stmt_execute($stmtUpdate);

//                 if ($executeUpdate) {
//                     // Hapus file lama dari server
//                     unlink($oldFileName);
//                     echo json_encode(["status" => "success", "message" => "Laporan telah diupdate."]);
//                 } else {
//                     echo json_encode(["status" => "error", "message" => "Gagal mengupdate database: " . mysqli_stmt_error($stmtUpdate)]);
//                 }
//             } else {
//                 echo json_encode(["status" => "error", "message" => "Gagal mengunggah file baru"]);
//             }
//         } else {
//             echo json_encode(["status" => "error", "message" => "Laporan anda tidak ditemukan."]);
//         }
//     } else {
//         echo json_encode(["status" => "error", "message" => "Gagal memeriksa file lama di database: " . mysqli_stmt_error($stmtCheck)]);
//     }
// }
