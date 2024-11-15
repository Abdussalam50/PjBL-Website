<?php 
if (isset($_POST["del"])) {
    $jsonDecode = json_decode($_POST["del"], true);
    $username = "nlpteamm_t-tas";
    $password = "3_7HUMHvy4)w";
    $dsn = "mysql:host=Localhost;dbname=nlpteamm_web_database";
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    foreach ($jsonDecode as $data) {
        $groupName = str_replace(" ","",$data[1]);
      
    
        try{
            $conn->beginTransaction();
            $tables = [
                'table_kelompok',
                'table_laporan_siswa',
                'table_monitoring',
                'table_project_planning',
                'table_timeline'
            ];
            foreach ($tables as $table) {
           
            $sqlDelete="DELETE FROM $table WHERE NAMA_KELOMPOK=:groupName";
            $stmtDelete= $conn->prepare($sqlDelete);
            $stmtDelete->bindParam(':groupName', $groupName);
            $stmtDelete->execute();
 
            }
            $conn->commit();
            $deleteTable=strtolower($groupName);
            $sqlQuery = "DROP TABLE IF EXISTS table_$deleteTable";
            $stmtQuery=$conn->prepare($sqlQuery);
            if($stmtQuery->execute()){
                 echo json_encode("Data berhasil dihapus");
                 
            }else{
                echo json_encode("Hubungi admin untuk menangani permasalahan ini");
            }
           
        }catch(PDOException $e){
            $conn->rollBack();
            echo json_encode([
                "status" => "false",
                "error" => $e->getMessage()
            ]);
        }
        
    }

    // echo json_encode(["status" => "success", "message" => "Berhasil Dihapus!"]);
} else {
    echo json_encode(["status" => "failed", "message" => "Gagal"]);
}
