<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kami</title>
    <style>
        /* Global Styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            background-image: url(bgprofil.jpeg);
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

        /* Hero Section */
        .hero {
            background-color: rgba(0, 0, 0, 0.4);
            padding: 50px 20px;
            text-align: center;
            border-bottom: 2px solid #008080;
        }

        .hero h2 {
            font-size: 2em;
            margin-bottom: 50px;
            color: aqua;
        }

        .hero p {
            font-size: 1.2em;
            color: white;
        }

        /* Profiles Section */
        .profiles {
            display: flex;
            justify-content: space-around;
            margin: 40px 0;
        }

        .profile {
            background-color: #fff;
            padding: 20px;
            border-radius: 15px;
            width: 200px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            border: 4px solid;
            border-image: linear-gradient(45deg, #008080, #00cccc) 1;
        }

        .profile:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 8px rgba(0, 128, 128, 0.4);
            border-image: linear-gradient(45deg, #00cccc, #008080) 1;
        }

        .profile img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .profile h4 {
            margin-top: 15px;
            color: #008080;
        }

        .profile p {
            color: #555;
        }

        /* About Section */
        .about-details {
            padding: 30px 20px;
            background-color: rgba(0, 0, 0, 0.4);
            margin: 20px auto;
            border-radius: 8px;
            max-width: 800px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .about-details h3 {
            text-align: center;
            color: aqua;
            margin-bottom: 20px;
        }

        .about-details p {
            font-size: 1.1em;
            color: white;
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #008080;
            color: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <h1>Tentang Kami</h1>
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
            <h2>Tentang Pemantauan Gaya Hidup Ramah Lingkungan</h2>
            <p>Tujuan dari website ini adalah untuk memantau dan mendorong masyarakat untuk menerapkan gaya hidup ramah lingkungan. Kami berharap setiap langkah kecil dapat memberikan dampak positif yang besar bagi bumi.</p>
        </section>

        <!-- Profiles Section -->
        <section class="profiles">
            <div class="profile">
                <img src="https://mfiles.alphacoders.com/101/thumb-350-1012645.png" alt="Fadil">
                <h4>Mukhammad Alfaen Fadillah</h4>
                <p>NIM: H1D023032</p>
            </div>
            <div class="profile">
                <img src="https://mfiles.alphacoders.com/101/thumb-350-1012645.png" alt="Rekan">
                <h4>Athaya Raihan Annafi</h4>
                <p>NIM: H1D023001</p>
            </div>
        </section>

        <!-- About Section -->
        <section class="about-details">
            <h3>Visi dan Misi</h3>
            <p>Visi kami adalah menciptakan dunia yang lebih hijau dan sehat dengan melibatkan individu dalam memantau aktivitas ramah lingkungan mereka.</p>
            <p>Misi kami adalah menyediakan platform yang mudah digunakan untuk membantu orang mencatat, melacak, dan berbagi aktivitas ramah lingkungan mereka.</p>

            <h3>Tentang Website</h3>
            <p>Website ini bertujuan untuk menyediakan platform bagi masyarakat untuk memantau gaya hidup ramah lingkungan mereka. Kami menyediakan berbagai fitur yang memungkinkan pengguna untuk mencatat aktivitas ramah lingkungan dan berbagi tips serta informasi untuk hidup lebih hijau.</p>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Pemantauan Gaya Hidup Ramah Lingkungan. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
