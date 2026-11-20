<?php
$host = "127.0.0.1"; $user = "root"; $pass = "root"; $port = 3306; $db = "tugas_besar";
mysqli_report(MYSQLI_REPORT_OFF);
$conn = new mysqli($host,$user,$pass,$db,$port);
if ($conn->connect_error) { die("Koneksi database gagal. Periksa config/database.php (host, password, port) dan pastikan database tugas_besar sudah diimpor. Detail: ".htmlspecialchars($conn->connect_error)); }
$conn->set_charset("utf8mb4");
