<?php

include "Db_connection.php";
date_default_timezone_set("Asia/Jakarta");

$data = json_decode(file_get_contents("php://input"), true);
echo json_encode($data);
$date = date("Y-m-d H:i:s");

if ($data !== null) {
    $role = strtolower($data["role"]);
    echo json_encode($role);
    if ($role == "siswa") {
        $stmtVal = mysqli_prepare($conn, "SELECT * FROM table_siswa WHERE NAME = ?");
        mysqli_stmt_bind_param($stmtVal, "s", $name);
        $name = $data["userId"];
        mysqli_stmt_execute($stmtVal);
        $result = mysqli_stmt_get_result($stmtVal);
        
        if (mysqli_num_rows($result) > 0) {
            $rowData = mysqli_fetch_assoc($result);
            $nisn = $rowData["NISN"];
            $stmtChecking = mysqli_prepare($conn, "SELECT * FROM table_tokenfcm WHERE user_id = ?");
            mysqli_stmt_bind_param($stmtChecking, "s", $nisn);
            mysqli_stmt_execute($stmtChecking);
            $resultChecking = mysqli_stmt_get_result($stmtChecking);
            $token = $data["token"];
            
            if (mysqli_num_rows($resultChecking) > 0) {
                $stmtUpdate = mysqli_prepare($conn, "UPDATE table_tokenfcm SET token = ? WHERE user_id = ?");
                if ($stmtUpdate) {
                    mysqli_stmt_bind_param($stmtUpdate, "ss", $token, $nisn);
                    mysqli_stmt_execute($stmtUpdate);
                    mysqli_stmt_close($stmtUpdate);
                } else {
                    error_log("Failed to update statement: " . mysqli_error($conn));
                }
            } else {
                $stmt = mysqli_prepare($conn, "INSERT INTO table_tokenfcm (user_id, token, date) VALUES (?, ?, ?)");
                if ($stmt) {
                    mysqli_stmt_bind_param($stmt, "sss", $nisn, $token, $date);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_close($stmt);
                    echo "Token berhasil disimpan ke dalam database.";
                } else {
                    error_log("Failed to insert statement: " . mysqli_error($conn));
                }
            }
            mysqli_stmt_close($stmtChecking);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'User not found'
            );
            header('Content-Type: application/json');
            http_response_code(404);
            echo json_encode($response);
        }
        mysqli_stmt_close($stmtVal);
    } else if ($role == "guru") {
        echo json_encode(2);
        $stmtValgr = mysqli_prepare($conn, "SELECT * FROM table_guru WHERE NAME = ?");
        mysqli_stmt_bind_param($stmtValgr, "s", $namegr);
        $namegr = $data["userId"];
        mysqli_stmt_execute($stmtValgr);
        $resultGr = mysqli_stmt_get_result($stmtValgr);
        
        if (mysqli_num_rows($resultGr) > 0) {
            $rowDataGr = mysqli_fetch_assoc($resultGr);
            $NIP = $rowDataGr["NIP"];
            $stmtCheckingGr = mysqli_prepare($conn, "SELECT * FROM table_tokenfcm WHERE user_id = ?");
            mysqli_stmt_bind_param($stmtCheckingGr, "s", $NIP);
            mysqli_stmt_execute($stmtCheckingGr);
            $resultCheckingGr = mysqli_stmt_get_result($stmtCheckingGr);
            $tokenGr = $data["token"];
            
            if (mysqli_num_rows($resultCheckingGr) > 0) {
                $stmtUpdateGr = mysqli_prepare($conn, "UPDATE table_tokenfcm SET token = ? WHERE user_id = ?");
                if ($stmtUpdateGr) {
                    mysqli_stmt_bind_param($stmtUpdateGr, "ss", $tokenGr, $NIP);
                    mysqli_stmt_execute($stmtUpdateGr);
                    mysqli_stmt_close($stmtUpdateGr);
                    echo json_encode("Token has been updated.");
                } else {
                    error_log("Failed to update statement: " . mysqli_error($conn));
                }
            }else {
                $stmtGr = mysqli_prepare($conn, "INSERT INTO table_tokenfcm (user_id, token, date) VALUES (?, ?, ?)");
                if ($stmtGr) {
                    mysqli_stmt_bind_param($stmtGr, "sss", $NIP, $tokenGr, $date);
                    mysqli_stmt_execute($stmtGr);
                    mysqli_stmt_close($stmtGr);
                    echo "Token berhasil disimpan ke dalam database.";
                } else {
                    error_log("Failed to insert statement: " . mysqli_error($conn));
                }
            }
            mysqli_stmt_close($stmtCheckingGr);
        } else {
            $response = array(
                'status' => 'error',
                'message' => 'User not found'
            );
            header('Content-Type: application/json');
            http_response_code(404);
            echo json_encode($response);
        }
        mysqli_stmt_close($stmtValgr);
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Invalid role'
        );
        header('Content-Type: application/json');
        http_response_code(400);
        echo json_encode($response);
    }
    
    // Tutup koneksi
    mysqli_close($conn);
} else {
    $response = array(
        'status' => 'error',
        'message' => 'No data received'
    );
    header('Content-Type: application/json');
    http_response_code(400);
    echo json_encode($response);
}

