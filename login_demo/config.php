<?php
$host = "localhost";
$user = "root";       // ตั้งตาม MySQL ของคุณ
$pass = "";           // ใส่รหัสผ่านถ้ามี
$db   = "login_demo";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("❌ Database connection failed: " . $conn->connect_error);
}
?>
