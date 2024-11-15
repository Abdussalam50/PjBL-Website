<?php
//make port connection to database

$hostname="localhost";
$username="nlpteamm_abdus";
$password="7nyw=oZm+E,-";
$dbName="nlpteamm_web_database";
$conn=mysqli_connect($hostname,$username,$password,$dbName);

if(mysqli_connect_errno()){
    echo "Failed to Connect:".mysqli_connect_error();
    exit;
}
