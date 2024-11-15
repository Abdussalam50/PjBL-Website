<?php
date_default_timezone_set("Asia/Jakarta");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = isset($_POST["comment"]) ? urldecode($_POST["comment"]) : "";
    $username = isset($_POST["username"]) ? urldecode($_POST["username"]) : "";
    $class = isset($_POST["class"]) ? urldecode($_POST["class"]) : "";
    $Link=isset($_POST["LinkUrl"])?urldecode($_POST["LinkUrl"]):"";
    $date = date("Y-m-d H:i:s");
    $dsn = "mysql:host=localhost;dbname=nlpteamm_web_database"; // Huruf besar kecil penting
    $userDb = "nlpteamm_t-tas";
    $pass = "3_7HUMHvy4)w";

    try {
        $conn = new PDO($dsn, $userDb, $pass);
        $sqlSource = "SELECT * FROM table_guru WHERE KELAS_AJAR=?";
        $stmt = $conn->prepare($sqlSource);
        $stmt->execute([$class]);

        if ($stmt->rowCount() !== 0) {
            // Perbaiki query INSERT
            $sqlInsert = "INSERT INTO table_comment_guru(ID_COMMENT, NAMA_GURU, COMMENT, TIME, KELAS,LINK) VALUES(NULL,?,?,?,?,?)";
            // Tambahkan $class ke parameter
            $params = [$username, $comment, $date, $class,$Link];
            $query = $conn->prepare($sqlInsert);
            $query->execute($params);
            echo "Comment added successfully!";
        } else {
            echo "Failed: Class not found.";
        }
    } catch (PDOException $e) {
        echo "Error in SQL execution: " . $e->getMessage();
    }
}
