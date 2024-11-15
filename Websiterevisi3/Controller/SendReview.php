<?php

    $input=json_decode(file_get_contents('php://input'),true );
    $host="localhost";
    $username="nlpteamm_t-tas";
    $db_name="nlpteamm_web_database";
    $password="3_7HUMHvy4)w";
    // echo json_encode($input);
    try{
        $conn=new PDO("mysql:host=$host;dbname=$db_name",$username,$password);
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $stmt=$conn->prepare("INSERT INTO table_refleksi (Nama,Kelompok_Penilai, Kelompok, ResponTeman, LevelRespon, Komentar,Kelas) VALUES(:Nama, :Kelompok_Penilai, :Kelompok, :ResponTeman, :LevelRespon, :Komentar,:Kelas)" );

        foreach($input as $data){
            $stmt->bindParam(":Nama",$data['Nama']);
            $stmt->bindParam(":Kelompok_Penilai",$data['valuator']);
            $stmt->bindParam(":Kelompok",$data['Kelompok']);
            $stmt->bindParam(":ResponTeman",$data["ResponTeman"]);
            $stmt->bindParam(":LevelRespon",$data["LevelRespon"]);
            $stmt->bindParam(":Komentar",$data["Komentar"]);
            $stmt->bindParam(":Kelas",$data["Kelas"]);
            $stmt->execute();
        }
        http_response_code(200);
        echo json_encode(["message" => "Data inserted successfully"]);
    }catch(PDOException $e){
        echo "Error".$e->getMessage();
        http_response_code(500);
    }
    $conn=null;
