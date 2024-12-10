<?php
$servername = "localhost";  // Nama server (umumnya localhost)
$username = "root";         // Username database (default root untuk XAMPP)
$password = "";             // Password (kosong untuk XAMPP)
$dbname = "pemantauan"; // Nama database yang sudah dibuat

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
