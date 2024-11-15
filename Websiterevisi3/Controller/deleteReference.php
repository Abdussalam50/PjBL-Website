<?php

include "Db_connection.php";
$response = json_decode(file_get_contents("php://input"), true);
if (!$response || !isset($response["reference"])) {
    die(json_encode(['success' => false, 'message' => 'Invalid input']));
}

$reference = $response["reference"];
$linkPath = "Controller/Model/$reference";

// Prepare the SELECT statement
$stmtSelect = mysqli_prepare($conn, "SELECT * FROM table_referensi WHERE REFERENSI=?");
if ($stmtSelect === false) {
    die(json_encode(['success' => false, 'message' => 'Prepare failed: ' . mysqli_error($conn)]));
}
mysqli_stmt_bind_param($stmtSelect, "s", $linkPath);

// Execute the SELECT statement
$executeSelect = mysqli_stmt_execute($stmtSelect);
if ($executeSelect === false) {
    die(json_encode(['success' => false, 'message' => 'Execute failed: ' . mysqli_stmt_error($stmtSelect)]));
}

$resultSelect = mysqli_stmt_get_result($stmtSelect);
if ($resultSelect === false) {
    die(json_encode(['success' => false, 'message' => 'Get result failed: ' . mysqli_stmt_error($stmtSelect)]));
}

if (mysqli_num_rows($resultSelect) > 0) {
    $row = mysqli_fetch_assoc($resultSelect);
    $path = str_replace("Controller/","",$row["REFERENSI"]);
    if (unlink($path)) {
        try {
            $stmtDelete = mysqli_prepare($conn, "DELETE FROM table_referensi WHERE REFERENSI=?");
            if ($stmtDelete === false) {
                die(json_encode(['success' => false, 'message' => 'Prepare delete failed: ' . mysqli_error($conn)]));
            }
            mysqli_stmt_bind_param($stmtDelete, "s", $linkPath);

            $execute = mysqli_stmt_execute($stmtDelete);
            if ($execute) {
                echo json_encode(['success' => true, 'message' => 'Reference deleted successfully']);
            } else {
                echo json_encode(['success' => false, 'message' => 'Delete failed: ' . mysqli_stmt_error($stmtDelete)]);
            }

            mysqli_stmt_close($stmtDelete);
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Error occurred: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete file']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No matching reference found']);
}

mysqli_stmt_close($stmtSelect);
mysqli_close($conn);


