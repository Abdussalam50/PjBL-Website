<?php
date_default_timezone_set("Asia/Jakarta");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $comment = isset($_POST["comment"]) ? urldecode($_POST["comment"]) : "";
    $username = isset($_POST["username"]) ? urldecode($_POST["username"]) : "";
    $class = isset($_POST["class"]) ? urldecode($_POST["class"]) : "";
    $link=isset($_POST["url"])?urldecode($_POST["url"]):"";
    $date = date("Y-m-d H:i:s");
    $response = "Comment:$comment , Username:$username, Class:$class,link:$link";
    // echo $response;
  
    
    $dsn = "mysql:host=localhost;dbname=nlpteamm_web_database";
    $userDb = "nlpteamm_t-tas";
    $pass = "3_7HUMHvy4)w";

    try {
        $conn = new PDO($dsn, $userDb, $pass);

        $sqlCollect = "SELECT * FROM table_kelompok WHERE KELAS=?";
        $stmtCollect = $conn->prepare($sqlCollect);
        $stmtCollect->execute([$class]);
        $kelompok=array();
        if ($stmtCollect->rowCount() !== 0) {
            while ($row = $stmtCollect->fetch(PDO::FETCH_ASSOC)) {
                $tokenUser = $row["STD_ID"];
                $kelompok[]= array($row["NAMA_KELOMPOK"]);
                
            }
        foreach($kelompok as $kelompokn){
            $datatable="table_".strtolower($kelompokn[0]);
            $sqlGroup="SELECT * FROM $datatable WHERE NAME_USER=?";
            $groupStmt=$conn->prepare($sqlGroup);
            $groupStmt->execute([$username]);
            if($groupStmt->rowCount()>0){
                $getName=$groupStmt->fetch(PDO::FETCH_ASSOC);
                $groupName=$getName["KELOMPOK"];
                $className=$getName["CLASS"];
                $sqlInsert="INSERT INTO table_comment (NAMA, COMMENT, TIME, KELOMPOK,CLASS,LINK) VALUES (?,?,?,?,?,?)";
                $insert=$conn->prepare($sqlInsert);
                $insert->execute([$username,$comment,$date,$groupName,$className,$link]);
            }
        }
        }
    } catch (PDOException $e) {
        echo "Error in SQL execution: " . $e->getMessage();
    }
}

