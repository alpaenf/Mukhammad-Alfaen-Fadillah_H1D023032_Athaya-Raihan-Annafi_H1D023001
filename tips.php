<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penilaian Ramah Lingkungan</title>
    <style>
        /* Global Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            background-image: url(bgtips.jpeg);
            background-size: cover; 
            background-position: center; 
            background-repeat: no-repeat;
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

        /* Main Section */
        main {
            padding: 20px;
        }

        .hero {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.4);
            border-bottom: 2px solid #008080;
            margin-bottom: 100px;
        }

        .hero h2 {
            font-size: 2em;
            margin-bottom: 10px;
            color: aqua;
        }

        .hero p {
            font-size: 1.2em;
            color: white;
        }

        
        .tips {
            background-color: rgba(0, 0, 0, 0.4);
            border: 1px solid #008080;
            border-radius: 5px;
            margin: 20px auto;
            padding: 15px;
            max-width: 800px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .tips h3 {
            margin-top: 0;
            color: aqua;
            font-size: 2em;
        }
        

        .tips ul {
            padding-left: 20px;
        }

        .tips li {
            margin-bottom: 10px;
            font-size: 1.1em;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <h1>Penilaian Ramah Lingkungan</h1>
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
            <h2>Pilih Aktivitas Ramah Lingkungan Anda</h2>
            <p>Tentukan apakah Anda sudah melakukan aktivitas berikut ini!</p>
        </section>

        

        <section class="tips">
            <h3>Tips untuk Menjadi Lebih Ramah Lingkungan</h3>
            <ul>
                <li>Kurangi penggunaan plastik sekali pakai dan mulai gunakan tas kain.</li>
                <li>Matikan lampu dan perangkat elektronik saat tidak digunakan.</li>
                <li>Coba tanam pohon kecil di rumah untuk membantu penghijauan.</li>
                <li>Gunakan transportasi umum atau sepeda untuk mengurangi emisi karbon.</li>
                <li>Daur ulang sampah plastik dan kertas untuk mengurangi limbah.</li>
                <li>Hemat Penggunaan Air</li>
                <li>Kurangi penggunaan wadah sekali pakai dengan membawa kotak makan dan botol minum sendiri.</li>
                <li>Olah sampah organik menjadi kompos untuk mengurangi limbah yang berakhir di TPA.</li>
                <li>Gunakan cahaya alami sebanyak mungkin untuk mengurangi konsumsi listrik.</li>
                <li>Ikut serta dalam program penghijauan dengan menanam pohon di area sekitar.</li>
            </ul>
        </section>
    </main>
</body>
</html>
