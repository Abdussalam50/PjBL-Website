<?php
include "Db_connection.php";
$data = json_decode(file_get_contents("php://input"), true);
if ($data !== null) {
    $role = strtolower($data["role"]);


    if ($role == "siswa") {
        $queryUser = "SELECT * FROM table_siswa WHERE NAME=?";
        $stmt = mysqli_prepare($conn, $queryUser);
        mysqli_stmt_bind_param($stmt, 's', $usrId);
        $usrId = strtolower($data["users"]);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $rowId = mysqli_fetch_assoc($result);
            $userId = $rowId["NISN"];
            $queryReq = "SELECT * FROM table_tokenfcm WHERE user_id!=?";
            $stmt2 = mysqli_prepare($conn, $queryReq);
            mysqli_stmt_bind_param($stmt2, "s", $userId);
            mysqli_stmt_execute($stmt2);
            $result2 = mysqli_stmt_get_result($stmt2);
            $tokenClients = array();
            if (mysqli_num_rows($result2)) {
                while ($rowToken = mysqli_fetch_assoc($result2)) {
                    $tokenClients[] = $rowToken["token"];
                }
                echo json_encode($tokenClients);
            }
        }
    } else if ($role == "guru") {

        $sqlReqGuru = mysqli_prepare($conn, "SELECT * FROM table_guru WHERE NAME=?");
        mysqli_stmt_bind_param($sqlReqGuru, "s", $usrIdGr);
        $usrIdGr = strtolower($data["users"]);

        mysqli_stmt_execute($sqlReqGuru);
        $resultReq = mysqli_stmt_get_result($sqlReqGuru);
        if ($resultReq) {
            if (mysqli_num_rows($resultReq) > 0) {
                $rowIdGr = mysqli_fetch_assoc($resultReq);
                $userIDgr = $rowIdGr["NIP"];
                $stmtToken = mysqli_prepare($conn, "SELECT * FROM table_tokenfcm WHERE user_id!=? ");
                mysqli_stmt_bind_param($stmtToken, "s", $userIDgr);
                mysqli_stmt_execute($stmtToken);
                $resultTokens = mysqli_stmt_get_result($stmtToken);
                $sendTokenClients = array();
                if (mysqli_num_rows($resultTokens) > 0) {
                    while ($rowTokenClients = mysqli_fetch_assoc($resultTokens)) {
                        $sendTokenClients[] = $rowTokenClients["token"];
                    }
                }
                echo json_encode($sendTokenClients);
                mysqli_stmt_close($stmtToken);
            } else {
                echo json_encode("no user found");
            }
        }
    } else {
        echo json_encode("no user");
    }
}
