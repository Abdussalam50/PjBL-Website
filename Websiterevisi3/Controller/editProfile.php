<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ob_start();
include "Db_connection.php";
header("Content-Type: application/json");

$response = [
    'username' => $_POST['username'] ?? null,
    'id' => $_POST['id'] ?? null,
    'kelas' => $_POST['kelas'] ?? null,
    'password' => strtolower($_POST['password']) ?? null,
    'file' => $_FILES['file']['name'] ?? null,
    'file_Tmp' => $_FILES['file']['tmp_name'] ?? null,
    'size' => $_FILES['file']['size'] ?? null,
    'role' => $_POST['role'],
    'oldUser' => $_POST['oldUser'],
    'message' => 'Data received and processed successfully.',
    'error' => '',
    'path' => ''
];

$username = $response['username'];
$id = $response['id'];
$class = $response['kelas'];
$password = password_hash($response['password'], PASSWORD_DEFAULT);
$oldUser = $response['oldUser'];

function updateProfileImage($conn, $username, $path, $class, $oldUser, &$response) {
    try {
        $stmtChecking = mysqli_prepare($conn, "SELECT * FROM table_profile_img WHERE NAME=?");
        mysqli_stmt_bind_param($stmtChecking, "s", $oldUser);
        $executeChecking = mysqli_stmt_execute($stmtChecking);
        
        if ($executeChecking) {
            $resultChecking = mysqli_stmt_get_result($stmtChecking);
            if (mysqli_num_rows($resultChecking) > 0) {
                $stmtUpdatePic = mysqli_prepare($conn, "UPDATE table_profile_img SET NAME=?, PATH=?, KELAS=? WHERE NAME=?");
                mysqli_stmt_bind_param($stmtUpdatePic, "ssss", $username, $path, $class, $oldUser);
                $executeUpdatePic = mysqli_stmt_execute($stmtUpdatePic);
                if ($executeUpdatePic) {
                    $response['message'] = 'Data berhasil diubah';
                    $response['path'] = $path;
                } else {
                    $response['message'] = 'Data gagal diubah';
                }
            } else {
                $stmtInsertPic = mysqli_prepare($conn, "INSERT INTO table_profile_img (NAME, PATH, KELAS) VALUES (?,?,?)");
                mysqli_stmt_bind_param($stmtInsertPic, "sss", $username, $path, $class);
                $executeInsertPic = mysqli_stmt_execute($stmtInsertPic);
                if ($executeInsertPic) {
                    $response['message'] = 'Data berhasil diubah';
                    $response['path'] = $path;
                } else {
                    $response['message'] = 'Data gagal diubah';
                }
            }
        }
    } catch (Exception $e) {
        $response['message'] = "Error occurred: $e";
    }
}

if ($response['role'] == 'Siswa') {
    $stmtUpdate1 = mysqli_prepare($conn, "UPDATE table_siswa SET NAME=?, NISN=?, CLASS=?, PASSWORD=? WHERE NAME=?");
    mysqli_stmt_bind_param($stmtUpdate1, "sssss", $username, $id, $class, $password, $oldUser);
    $executeUpdate1 = mysqli_stmt_execute($stmtUpdate1);
    
    if ($executeUpdate1) {
        $explodeFile1 = explode('.', $response['file']);
        $extension1 = strtolower(end($explodeFile1));
        $path1 = 'img_profile/' . $response['file'];
        
        if (!in_array($extension1, ['jpg', 'jpeg', 'png']) || $response['size'] > 3145728) {
            $response['message'] = 'File tidak sesuai';
        } else {
            if (move_uploaded_file($response['file_Tmp'], $path1)) {
                updateProfileImage($conn, $username, $path1, $class, $oldUser, $response);
            } else {
                $response['message'] = 'File gagal diupload';
            }
        }
    } else {
        $response['message'] = 'Gagal melakukan update Siswa';
    }

} else if ($response['role'] == 'Guru') {
    $stmtUpdate2 = mysqli_prepare($conn, "UPDATE table_guru SET NAME=?, NIP=?, KELAS_AJAR=?, PASSWORD=? WHERE NAME=?");
    mysqli_stmt_bind_param($stmtUpdate2, "sssss", $username, $id, $class, $password, $oldUser);
    $executeUpdate2 = mysqli_stmt_execute($stmtUpdate2);
    
    if ($executeUpdate2) {
        $explodeFile2 = explode('.', $response['file']);
        $extension2 = strtolower(end($explodeFile2));
        $path2 = 'img_profile/' . $response['file'];
        
        if (!in_array($extension2, ['jpg', 'jpeg', 'png']) || $response['size'] > 3145728) {
            $response['message'] = 'File tidak sesuai';
        } else {
            if (move_uploaded_file($response['file_Tmp'], $path2)) {
                updateProfileImage($conn, $username, $path2, $class, $oldUser, $response);
            } else {
                $response['message'] = 'File gagal diupload';
            }
        }
    } else {
        $response['message'] = 'Gagal melakukan update Guru';
    }

} else {
    $response['message'] = 'Peran tidak valid';
}

$response['error'] = ob_get_clean();
echo json_encode($response);
