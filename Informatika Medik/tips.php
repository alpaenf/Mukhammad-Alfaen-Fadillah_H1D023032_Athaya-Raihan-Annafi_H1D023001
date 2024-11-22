<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tips Ramah Lingkungan</title>
    <style>
        /* Global Styling */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
    color: #333;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px;
    background-color: #008080;
    color: #fff;
}

header .logo h1 {
    margin: 0;
}

nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
}

nav ul li a:hover {
    text-decoration: underline;
}

/* Hero Section */
.hero {
    background-color: #e0f7fa;
    padding: 50px 20px;
    text-align: center;
    border-bottom: 2px solid #008080;
}

.hero h2 {
    font-size: 2em;
    margin-bottom: 20px;
}

.hero p {
    font-size: 1.2em;
    color: #555;
}

/* About Section */
.about-details {
    padding: 30px 20px;
    background-color: #fff;
    margin: 20px auto;
    border-radius: 8px;
    max-width: 800px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.about-details h3 {
    text-align: center;
    color: #008080;
    margin-bottom: 20px;
}

.about-details p {
    font-size: 1.1em;
    color: #555;
}

/* Tips Section */
.tips-list {
    padding: 30px 20px;
    background-color: #fff;
    margin: 20px auto;
    border-radius: 8px;
    max-width: 800px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.tips-list ul {
    list-style: none;
    padding: 0;
}

.tips-list ul li {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.tips-list ul li:last-child {
    border-bottom: none;
}

.tips-list ul li strong {
    color: #008080;
}

/* Form Section */
form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin: 20px auto;
}

form input, form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 1em;
}

form button {
    background-color: #008080;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 1.2em;
    cursor: pointer;
}

form button:hover {
    background-color: #006666;
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
            <h2>Tips Hidup Ramah Lingkungan</h2>
            <p>Berikut adalah beberapa tips yang dapat Anda lakukan untuk menjalani gaya hidup yang lebih ramah lingkungan dan berdampak positif bagi bumi.</p>
        </section>
        <section class="tips-list">
            <ul>
                <li><strong>Kurangi Penggunaan Plastik:</strong> Gantilah plastik sekali pakai dengan tas belanja kain atau wadah yang bisa digunakan kembali.</li>
                <li><strong>Hemat Energi:</strong> Matikan lampu dan peralatan listrik yang tidak digunakan.</li>
                <li><strong>Tanam Pohon:</strong> Tanamlah pohon untuk membantu mengurangi polusi udara dan menyediakan oksigen.</li>
                <li><strong>Gunakan Transportasi Umum:</strong> Pilih menggunakan transportasi umum atau bersepeda untuk mengurangi emisi kendaraan.</li>
                <li><strong>Kurangi Limbah Makanan:</strong> Masak sesuai kebutuhan dan manfaatkan sisa makanan untuk kompos.</li>
            </ul>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Pemantauan Gaya Hidup Ramah Lingkungan. Semua hak dilindungi.</p>
    </footer>
</body>
</html>
