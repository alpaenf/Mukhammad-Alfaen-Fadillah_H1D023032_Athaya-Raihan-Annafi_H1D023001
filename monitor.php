<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan Aktivitas Ramah Lingkungan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        /* Gaya CSS tetap sama seperti sebelumnya */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #008080;
            color: #fff;
            text-align: center;
            padding: 20px;
            position: sticky;
            top: 0;
            z-index: 1000;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav ul {
            list-style: none;
            margin: 10px 0 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1em;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        nav ul li a:hover {
            background-color: #005959;
            transform: scale(1.1);
        }

        main {
            padding: 40px 20px;
            max-width: 900px;
            margin: 40px auto;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            font-size: 1.8rem;
            color: #008080;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"],
        select {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus,
        select:focus {
            border-color: #008080;
        }

        button {
            padding: 12px 20px;
            background-color: #008080;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            width: 100%;
        }

        button:hover {
            background-color: #006666;
            transform: scale(1.05);
        }

        .status {
            background-color: #e0f7fa;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
        }

        .chart-container {
            margin: 40px 0;
            width: 100%;
            height: 350px;
        }

        footer {
            text-align: center;
            padding: 15px;
            background-color: #008080;
            color: white;
            font-size: 1rem;
        }

        footer a {
            color: #e0f7fa;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        table {
            width: 100%;
            max-width: 800px;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #008080;
            color: #fff;
        }

        table th, table td {
            text-align: left;
            padding: 12px 15px;
            border-bottom: 1px solid #ddd;
        }

        table tr:last-child td {
            border-bottom: none;
        }

        table tr:hover {
            background-color: #f9f9f9;
            cursor: pointer;
        }

        table th {
            text-transform: uppercase;
            font-weight: bold;
        }

        table td {
            font-size: 1em;
        }
        .activity-recap {
    margin: 30px 0;
}

.activity-recap h3 {
    color: #008080;
    margin-bottom: 15px;
    text-align: center;
}

.activity-recap table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.activity-recap th, 
.activity-recap td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.activity-recap th {
    background-color: #008080;
    color: white;
}

.activity-recap tr:hover {
    background-color: #f5f5f5;
}
    </style>
</head>
<body>
    <header>
        <h1>Pemantauan Aktivitas Ramah Lingkungan</h1>
        <nav>
            <ul>
                <li><a href="index.php">Beranda</a></li>
                <li><a href="about.php">Tentang</a></li>
                <li><a href="tips.php">Tips</a></li>
                <li><a href="monitor.php">Pemantauan</a></li>
                <li><a href="contact.php">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Catat Aktivitas Ramah Lingkungan Anda</h2>

<form action="monitor.php" method="POST">
    <div class="form-group">
        <label for="activity">Jenis Aktivitas:</label>
        <input type="text" name="activity" id="activity" placeholder="Contoh: Bersepeda, Mengurangi Plastik, Daur Ulang" required>
    </div>
    <div class="form-group">
        <label for="date">Tanggal Aktivitas:</label>
        <input type="date" name="date" id="date" required>
    </div>
    <button type="submit" name="save_activity">Simpan Aktivitas</button>
</form>

<?php
// Inisialisasi array untuk menyimpan aktivitas jika belum ada di session
if (!isset($_SESSION['activities'])) {
    $_SESSION['activities'] = [];
}

// Proses penyimpanan aktivitas baru
if (isset($_POST['save_activity'])) {
    $newActivity = [
        'activity' => $_POST['activity'],
        'date' => $_POST['date']
    ];
    $_SESSION['activities'][] = $newActivity;
}

// Tampilkan tabel rekap jika ada aktivitas
if (!empty($_SESSION['activities'])) {
    echo "<div class='activity-recap' style='margin-top: 30px;'>";
    echo "<h3>Rekap Aktivitas Anda</h3>";
    echo "<table>";
    echo "<thead><tr><th>No</th><th>Tanggal</th><th>Jenis Aktivitas</th></tr></thead>";
    echo "<tbody>";
    
    foreach ($_SESSION['activities'] as $index => $activity) {
        $no = $index + 1;
        $tanggal = date('d-m-Y', strtotime($activity['date']));
        echo "<tr>";
        echo "<td>$no</td>";
        echo "<td>$tanggal</td>";
        echo "<td>{$activity['activity']}</td>";
        echo "</tr>";
    }
    
    echo "</tbody></table>";
    echo "</div>";
}
?>

        </section>
        
        <form method="post" action="">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Kegiatan</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $activities = [
                        "Gunakan tas kain",
                        "Matikan lampu jika tidak digunakan",
                        "Bawa botol minum sendiri",
                        "Gunakan transportasi umum",
                        "Buat kompos dari sisa makanan",
                        "Kurangi penggunaan plastik sekali pakai",
                        "Daur ulang sampah plastik",
                        "Tanam pohon di sekitar rumah",
                        "Gunakan energi matahari (solar panel)",
                        "Belanja produk lokal",
                        "Gunakan produk eco-friendly",
                        "Kurangi penggunaan kertas",
                        "Hindari penggunaan sedotan plastik",
                        "Bawa kotak makan sendiri",
                        "Gunakan perangkat elektronik hemat energi"
                    ];
                    foreach ($activities as $index => $activity) {
                        echo "<tr>
                                <td>" . ($index + 1) . "</td>
                                <td>$activity</td>
                                <td>
                                    <select name='activity_$index'>
                                        <option value='yes'>Ya</option>
                                        <option value='no'>Tidak</option>
                                    </select>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" name="submit">Kirim Jawaban</button>
        </form>

<?php
if (isset($_POST['submit'])) {
    $score = 0;
    foreach ($activities as $index => $activity) {
        $answer = $POST["activity$index"] ?? 'no';
        if ($answer === "yes") {
            $score++;
        }
    }

    // Hitung persentase
    $totalActivities = count($activities);
    $percentage = ($score / $totalActivities) * 100;
    
    // Tentukan status
    $status = $score >= 10 ? "Ramah Lingkungan" : "Tidak Ramah Lingkungan";
    
    echo "<div class='status' style='margin-top: 20px; text-align: center;'>";
    echo "<p>Status Anda: <strong>$status</strong></p>";
    echo "<p>Anda telah melakukan <strong>" . number_format($percentage, 1) . "%</strong> dari total aktivitas ramah lingkungan</p>";
    echo "<p>(" . $score . " dari " . $totalActivities . " aktivitas)</p>";
    echo "</div>";
}
?>

    </main>

    <footer>
        <p>© 2024 Pemantauan Aktivitas Ramah Lingkungan | <a href="contact.php">Hubungi Kami</a></p>
    </footer>
</body>
</html>