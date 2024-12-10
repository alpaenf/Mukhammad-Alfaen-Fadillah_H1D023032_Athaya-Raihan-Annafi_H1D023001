<?php
include 'db.php'; 
session_start();
?>

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
           background-color: #f4f4f4;
           color: #333;
       }

       header {
           background-color: #008080;
           color: #fff;
           padding: 15px 20px;
           position: sticky;
           top: 0;
           z-index: 1000;
           display: flex;
           justify-content: space-between;
           align-items: center;
           box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
       }

       header .logo {
           font-size: 1.5em;
           font-weight: bold;
       }

       nav ul {
           list-style: none;
           margin: 0;
           padding: 0;
           display: flex;
           gap: 20px;
       }

       nav ul li a {
           text-decoration: none;
           color: #fff;
           font-size: 1em;
           padding: 8px 12px;
           border-radius: 5px;
           transition: background-color 0.3s ease;
       }

       nav ul li a:hover {
           background-color: #005959;
       }

       main {
           padding: 20px;
       }

       .hero {
           text-align: center;
           background-image: url('background-image.jpg'); /* Ubah sesuai dengan gambar Anda */
           background-size: cover;
           background-position: center;
           padding: 100px 20px;
           color: #fff;
           text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
       }

       .hero h1 {
           font-size: 2.8em;
           margin: 0 0 20px;
       }

       .hero p {
           font-size: 1.2em;
       }

       .merch-section, .facts-section, .journey-section {
           padding: 50px 20px;
           text-align: center;
           background-color: #e0f7fa;
           margin: 20px 0;
           border-radius: 10px;
       }

       .merch-section h2, 
       .facts-section h2, 
       .journey-section h2 {
           font-size: 2em;
           margin-bottom: 20px;
       }

       .facts-section ul {
           list-style: none;
           padding: 0;
           margin: 0;
       }

       .facts-section ul li {
           margin: 10px 0;
           font-size: 1.2em;
           cursor: pointer;
           color: #008080;
           text-decoration: underline;
           transition: color 0.3s;
       }

       .facts-section ul li:hover {
           color: #005959;
       }

       .journey-section p {
           font-size: 1.2em;
           line-height: 1.6;
       }

       footer {
           background-color: #008080;
           color: #fff;
           text-align: center;
           padding: 15px;
           margin-top: 40px;
           box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
       }
   </style>
</head>
<body>
   <header>
       <div class="logo">Pemantauan Gaya Hidup</div>
       <nav>
           <ul>
               <li><a href="index.php">Beranda</a></li>
               <li><a href="about.php">Tentang</a></li>
               <li><a href="tips.php">Tips</a></li>
               <li><a href="monitor.php">Pemantauan</a></li>
               <li><a href="contact.php">Kontak</a></li>
               <?php if (isset($_SESSION['username'])): ?>
                   <li><a href="logout.php">Logout</a></li>
               <?php else: ?>
                   <li><a href="login.php">Login</a></li>
               <?php endif; ?>
           </ul>
       </nav>
   </header>
   <main>
       <section class="hero">
           <h1>Selamat Datang di Pemantauan Ramah Lingkungan!</h1>
           <p>Berkomitmen untuk masa depan yang lebih baik melalui gaya hidup yang bertanggung jawab.</p>
       </section>

       <section class="merch-section">
           <h2>Merchandise Pilihan</h2>
           <div class="items">
               <img src="merch1.jpg" alt="Merchandise 1">
               <img src="merch2.jpg" alt="Merchandise 2">
               <img src="merch3.jpg" alt="Merchandise 3">
           </div>
       </section>

       <section class="journey-section">
           <h2>Great Journey Awaits</h2>
           <p>Mulailah perjalanan ramah lingkungan Anda hari ini! Dapatkan tips, ide, dan alat bantu untuk membuat perubahan kecil yang menghasilkan dampak besar bagi planet kita.</p>
           <p>Jelajahi cerita inspiratif dari komunitas kami yang telah mengambil langkah menuju gaya hidup hijau. Bersama kita dapat menciptakan masa depan yang lebih baik!</p>
       </section>

       <section class="facts-section">
           <h2>Fakta Penting</h2>
           <ul>
               <li onclick="window.location.href='monitor.php'">Menghemat energi rumah tangga dapat mengurangi emisi hingga 20%.</li>
               <li onclick="window.location.href='monitor.php'">Limbah plastik butuh waktu lebih dari 400 tahun untuk terurai.</li>
               <li onclick="window.location.href='monitor.php'">Menggunakan transportasi umum membantu menurunkan polusi udara.</li>
           </ul>
       </section>
   </main>
   <footer>
       <p>&copy; 2024 Pemantauan Gaya Hidup Ramah Lingkungan. Semua hak dilindungi.</p>
   </footer>
</body>
</html>
