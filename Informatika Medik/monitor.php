<?php
$status = ""; // Inisialisasi variabel status

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil jawaban dari form
    $question1 = $_POST['question1'];
    $question2 = $_POST['question2'];
    $question3 = $_POST['question3'];

    // Tentukan status berdasarkan jawaban
    if ($question1 == "yes" && $question2 == "yes" && $question3 == "yes") {
        $status = "Sangat Baik! Anda telah menjalankan banyak aktivitas ramah lingkungan!";
    } elseif ($question1 == "yes" || $question2 == "yes" || $question3 == "yes") {
        $status = "Baik! Anda sudah mulai mengadopsi gaya hidup ramah lingkungan!";
    } else {
        $status = "Perlu Perbaikan. Mari lebih banyak berkontribusi untuk lingkungan!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan Aktivitas Ramah Lingkungan</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
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
            color: white;
            padding: 15px 20px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        header h1 {
            font-size: 2rem;
            letter-spacing: 1px;
        }

        nav {
            margin-top: 10px;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        nav ul li {
            display: inline;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1rem;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #e0f7fa;
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

        /* Tabel Riwayat Aktivitas */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #008080;
            color: white;
        }

        table tr:hover {
            background-color: #f1f1f1;
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
        <!-- Form untuk mencatat aktivitas -->
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
                <div class="form-group">
                    <label for="question1">Apakah Anda menggunakan transportasi ramah lingkungan?</label>
                    <select name="question1" id="question1" required>
                        <option value="yes">Ya</option>
                        <option value="no">Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question2">Apakah Anda mengurangi penggunaan plastik sekali pakai?</label>
                    <select name="question2" id="question2" required>
                        <option value="yes">Ya</option>
                        <option value="no">Tidak</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="question3">Apakah Anda mendaur ulang sampah?</label>
                    <select name="question3" id="question3" required>
                        <option value="yes">Ya</option>
                        <option value="no">Tidak</option>
                    </select>
                </div>
                <button type="submit">Simpan Aktivitas</button>
            </form>

            <?php
            // Menampilkan status setelah form disubmit
            if ($status) {
                echo "<div class='status'><p>Status gaya hidup Anda: $status</p></div>";
            }
            ?>
        </section>

        <!-- Grafik Pemantauan Aktivitas -->
        <section>
            <h2>Grafik Pemantauan Aktivitas Ramah Lingkungan</h2>
            <div class="chart-container">
                <canvas id="activityChart"></canvas>
            </div>
        </section>

        <!-- Riwayat Aktivitas -->
        <section>
            <h2>Riwayat Aktivitas Anda</h2>
            <table>
                <thead>
                    <tr>
                        <th>Aktivitas</th>
                        <th>Tanggal</th>
                        <th>Skor</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Bersepeda ke kantor</td>
                        <td>2024-11-20</td>
                        <td>Baik</td>
                    </tr>
                    <tr>
                        <td>Mengurangi plastik di rumah</td>
                        <td>2024-11-19</td>
                        <td>Sangat Baik</td>
                    </tr>
                    <tr>
                        <td>Mendaur ulang sampah plastik</td>
                        <td>2024-11-18</td>
                        <td>Baik</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>

    <footer>
        <p>© 2024 Pemantauan Aktivitas Ramah Lingkungan | <a href="contact.php">Hubungi Kami</a></p>
    </footer>

    <script>
        // Grafik Pemantauan Aktivitas menggunakan Chart.js
        var ctx = document.getElementById('activityChart').getContext('2d');
        var activityChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Transportasi Ramah Lingkungan', 'Pengurangan Plastik', 'Daur Ulang'],
                datasets: [{
                    label: 'Aktivitas Ramah Lingkungan',
                    data: [15, 20, 25], // Gantilah dengan data yang sesuai
                    backgroundColor: ['#008080', '#006666', '#004d4d'],
                    borderColor: ['#005959', '#003d3d', '#002828'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
