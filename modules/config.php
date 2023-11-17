<?php 

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "score_card";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} 

?>