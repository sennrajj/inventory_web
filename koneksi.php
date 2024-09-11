<?php

// Membuat Koneksi ke dalam Database
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "db_inventory";

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>