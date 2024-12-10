<?php
include 'db.php';

// Ambil data dari form
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Query untuk menyimpan pesan ke dalam database
$sql = "INSERT INTO kontak (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Pesan berhasil dikirim!";
    header("Location: contact.php"); // Redirect setelah sukses
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
