<?php
include "Db_connection.php";
date_default_timezone_set("Asia/Jakarta");
$dataNotif = json_decode(file_get_contents("php://input"), true);
// echo json_encode($dataNotif);
if ($dataNotif) {
    $token = $dataNotif['token'];
    $id_user = $dataNotif['idUser'];
    $role = strtolower($dataNotif["role"]);
    $group=strtolower($dataNotif["group"]);
    $date = date("Y-m-d H:i:s");
    if ($role == "siswa") {
        $stmtStd = mysqli_prepare($conn, "SELECT * FROM table_siswa WHERE NISN=?");
        mysqli_stmt_bind_param($stmtStd, "s", $id_user);
        mysqli_stmt_execute($stmtStd);
        $resultStd = mysqli_stmt_get_result($stmtStd);
        if ($resultStd) {
            if (mysqli_num_rows($resultStd) > 0) {
          
                $stmttokenStd = mysqli_prepare($conn, "SELECT * FROM table_fcmfbck WHERE user_id=?");
                mysqli_stmt_bind_param($stmttokenStd, 's', $id_user);
                mysqli_stmt_execute($stmttokenStd);
                $resultTokenStd = mysqli_stmt_get_result($stmttokenStd);
                if ($resultTokenStd) {
                    if (mysqli_num_rows($resultTokenStd) > 0) {
                        echo json_encode("true");
                        $tokenStdUpdate = mysqli_prepare($conn, "UPDATE table_fcmfbck SET token=?,date=? WHERE user_id=?");
                        mysqli_stmt_bind_param($tokenStdUpdate, "sss", $token, $date, $id_user);
                        $stdExecute = mysqli_stmt_execute($tokenStdUpdate);
                        if ($stdExecute) {
                            echo json_encode("token was updated");
                        } else {
                            echo json_encode("token cannot updated");
                        }
                        mysqli_stmt_close($tokenStdUpdate);
                    } else {
                        $tokenStdInsert = mysqli_prepare($conn, "INSERT INTO table_fcmfbck (user_id,token,date,kelompok) VALUES (?,?,?,?)");
                        mysqli_stmt_bind_param($tokenStdInsert, "ssss", $id_user, $token, $date,$group);
                        $stdInsert = mysqli_stmt_execute($tokenStdInsert);
                        if ($stdInsert) {
                            echo json_encode("token was inserted");
                        } else {
                            echo json_encode("token cannot inserted");
                        }
                        mysqli_stmt_close($tokenStdInsert);
                    }
                }

                mysqli_stmt_close($stmttokenStd);
            }
        }
    } else if ($role == "guru") {
        $stmtReq = mysqli_prepare($conn, "SELECT * FROM table_guru WHERE NIP=?");
        mysqli_stmt_bind_param($stmtReq, "s", $id_user);
        mysqli_stmt_execute($stmtReq);
        $resultReq = mysqli_stmt_get_result($stmtReq);
        if ($resultReq) {
            if (mysqli_num_rows($resultReq) > 0) {
                $stmtChecking = mysqli_prepare($conn, "SELECT * FROM table_fcmfbck WHERE user_id=?");
                mysqli_stmt_bind_param($stmtChecking, 's', $id_user);
                mysqli_stmt_execute($stmtChecking);
                $resultChecking = mysqli_stmt_get_result($stmtChecking);
                if ($resultChecking) {
                    if (mysqli_num_rows($resultChecking) > 0) {
                        $stmtUpdate = mysqli_prepare($conn, "UPDATE table_fcmfbck SET token=?,date=? WHERE user_id=?");
                        mysqli_stmt_bind_param($stmtUpdate, 'sss', $token, $date, $id_user);
                        $resultUpdate = mysqli_stmt_execute($stmtUpdate);
                        if ($resultUpdate) {
                            echo json_encode("token was successful updated");
                        } else {
                            echo json_encode("error occured: token cannot updated...");
                        }
                        mysqli_stmt_close($stmtUpdate);
                    } else {
                        $stmtInsert = mysqli_prepare($conn, "INSERT INTO table_fcmfbck (user_id, token, date)VALUES (?,?,?,?)");
                        mysqli_stmt_bind_param($stmtInsert, 'ssss', $id_user, $token, $date,"none");
                        $resultInsert = mysqli_stmt_execute($stmtInsert);
                        if ($resultInsert) {
                            echo json_encode("token was successful inserted into database");
                        } else {
                            echo json_encode(" error occured:token cannot insert");
                        }

                        mysqli_stmt_close($stmtInsert);
                    }

                    mysqli_stmt_close($stmtChecking);
                }
            } else {
                echo json_encode("User not found...");
            }
        }

        mysqli_stmt_close($stmtReq);
    }
}


mysqli_close($conn);
