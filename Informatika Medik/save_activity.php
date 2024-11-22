<?php
include 'db.php';

// Bagian 1: Proses Penyimpanan Data Aktivitas
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $activity = $_POST['activity'];
    $date = $_POST['date'];
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    // Hitung skor berdasarkan jawaban kuis
    $score = 0;
    if ($question1 == 'yes') $score++;
    if ($question2 == 'yes') $score++;
    if ($question3 == 'yes') $score++;

    // Tentukan status berdasarkan skor
    if ($score == 3) {
        $status = "Gaya hidup Anda sangat ramah lingkungan!";
    } elseif ($score == 2) {
        $status = "Anda sudah cukup ramah lingkungan, namun ada beberapa hal yang bisa diperbaiki.";
    } else {
        $status = "Cobalah untuk meningkatkan gaya hidup ramah lingkungan Anda!";
    }

    // Query untuk menyimpan data aktivitas dan status gaya hidup ke dalam database
    $sql = "INSERT INTO aktivitas (activity, date, question1, question2, question3, status) 
            VALUES ('$activity', '$date', '$question1', '$question2', '$question3', '$status')";

    if ($conn->query($sql) === TRUE) {
        // Menampilkan pesan setelah data berhasil disimpan
        echo "Aktivitas berhasil disimpan!<br>";
        echo "Status gaya hidup Anda: $status";

        // Redirect ke halaman pemantauan setelah menyimpan data
        header("Location: monitor.php"); // Pastikan kamu mengganti monitor.php dengan halaman yang sesuai
        exit();
    } else {
        // Menampilkan pesan error jika ada kesalahan saat menyimpan data
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Bagian 2: Menampilkan Riwayat Aktivitas
$sql = "SELECT activity, date, status FROM aktivitas ORDER BY date DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Menampilkan riwayat aktivitas dalam bentuk tabel
    echo "<table class='table'>
            <thead>
                <tr>
                    <th>Aktivitas</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>";
    
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['activity']}</td>
                <td>{$row['date']}</td>
                <td>{$row['status']}</td>
              </tr>";
    }
    
    echo "</tbody></table>";
} else {
    echo "Tidak ada data riwayat aktivitas.";
}

$conn->close();
?>
