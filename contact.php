<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami</title>
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
            padding: 20px;
            max-width: 800px;
            margin: 40px auto;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-out;
        }

        main h2 {
            color: #008080;
            margin-bottom: 20px;
            font-size: 2em;
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        form label {
            font-weight: bold;
            color: #555;
        }

        form input[type="text"],
        form input[type="email"],
        form textarea {
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            transition: all 0.3s ease;
        }

        form input:focus,
        form textarea:focus {
            border-color: #008080;
            box-shadow: 0 0 8px rgba(0, 128, 128, 0.3);
            outline: none;
        }

        form textarea {
            resize: vertical;
            height: 120px;
        }

        form button {
            padding: 12px 20px;
            background-color: #008080;
            color: #fff;
            font-size: 1.1em;
            font-weight: bold;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        form button:hover {
            background-color: #005959;
            transform: scale(1.05);
        }

        .form-feedback {
            display: none;
            font-size: 0.9em;
            margin-top: -15px;
            color: red;
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

        footer {
            background-color: #008080;
            color: #fff;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: #e0f7fa;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }

        /* Hover Effect */
        form input:hover,
        form textarea:hover {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <header>
        <h1>Kontak Kami</h1>
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
        <h2>Hubungi Kami</h2>
        <form id="contactForm">
            <label for="name">Nama:</label>
            <input type="text" name="name" id="name" placeholder="Masukkan nama Anda..." required>
            <span class="form-feedback" id="nameFeedback">Nama wajib diisi!</span>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Masukkan email Anda..." required>
            <span class="form-feedback" id="emailFeedback">Email harus valid!</span>

            <label for="message">Pesan:</label>
            <textarea name="message" id="message" placeholder="Tulis pesan Anda..." required></textarea>
            <span class="form-feedback" id="messageFeedback">Pesan tidak boleh kosong!</span>

            <button type="submit">Kirim Pesan</button>
        </form>
    </main>
    <footer>
        <p>© 2024 Pemantauan Aktivitas Ramah Lingkungan | <a href="index.php">Beranda</a></p>
    </footer>
    <script>
        document.getElementById("contactForm").addEventListener("submit", function(event) {
            let valid = true;

            // Validasi nama
            const name = document.getElementById("name");
            const nameFeedback = document.getElementById("nameFeedback");
            if (name.value.trim() === "") {
                nameFeedback.style.display = "block";
                valid = false;
            } else {
                nameFeedback.style.display = "none";
            }

            // Validasi email
            const email = document.getElementById("email");
            const emailFeedback = document.getElementById("emailFeedback");
            const emailPattern = /^[^@\s]+@[^@\s]+\.[^@\s]+$/;
            if (!emailPattern.test(email.value.trim())) {
                emailFeedback.style.display = "block";
                valid = false;
            } else {
                emailFeedback.style.display = "none";
            }

            // Validasi pesan
            const message = document.getElementById("message");
            const messageFeedback = document.getElementById("messageFeedback");
            if (message.value.trim() === "") {
                messageFeedback.style.display = "block";
                valid = false;
            } else {
                messageFeedback.style.display = "none";
            }

            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
