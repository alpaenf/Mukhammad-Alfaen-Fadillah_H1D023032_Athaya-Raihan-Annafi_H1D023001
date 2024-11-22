<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemantauan Gaya Hidup Ramah Lingkungan</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #e0f7fa, #f4f4f4);
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

        header .logo h1 {
            margin: 0;
            font-size: 2.5em;
        }

        nav ul {
            list-style: none;
            margin: 20px 0 0;
            padding: 0;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: #fff;
            font-size: 1.1em;
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
            max-width: 1000px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
        }

        .hero {
            background-color: #008080;
            color: #fff;
            padding: 50px 20px;
            text-align: center;
            border-radius: 10px;
            margin-bottom: 40px;
            animation: slideIn 1s ease-out;
        }

        .hero h2 {
            font-size: 2.5em;
            margin-bottom: 20px;
        }

        .hero p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        .stats h2 {
            font-size: 2em;
            color: #008080;
            margin-bottom: 20px;
            text-align: center;
        }

        .stats ul {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        .stats ul li {
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            font-size: 1.1em;
            transition: all 0.3s ease;
        }

        .stats ul li:hover {
            background-color: #e0f7fa;
            transform: scale(1.05);
        }

        footer {
            background-color: #008080;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer p {
            font-size: 1em;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-50px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Pemantauan Gaya Hidup Ramah Lingkungan</h1>
        </div>
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
        <section class="hero">
            <h2>Gaya Hidup Ramah Lingkungan untuk Masa Depan yang Lebih Baik</h2>
            <p>Mulai dari sekarang, setiap langkah kecil yang kita ambil dapat membuat perbedaan besar untuk bumi.</p>
        </section>
        <section class="stats">
            <h2>Fakta Penting</h2>
            <ul>
            <?php
                // Mengambil data dari database untuk ditampilkan di halaman
                $sql = "SELECT * FROM aktivitas LIMIT 5";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Menampilkan data setiap aktivitas
                    while($row = $result->fetch_assoc()) {
                        echo "<li><strong>Aktivitas:</strong> " . $row["activity"] . " | <strong>Tanggal:</strong> " . $row["date"] . "</li>";
                    }
                } else {
                    echo "<li>Belum ada aktivitas yang tercatat.</li>";
                }
                ?>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pemantauan Gaya Hidup Ramah Lingkungan. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
