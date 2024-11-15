<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    session_start();
    session_unset();
   if(session_destroy()){;
    echo json_encode(["status" => "ok"]);
    setcookie("grpName", "", time() - 3600, "/");
    exit;
   }
}

http_response_code(405); // Metode tidak diizinkan
echo json_encode(["status" => "error", "message" => "Method not allowed"]);
    // exit();
