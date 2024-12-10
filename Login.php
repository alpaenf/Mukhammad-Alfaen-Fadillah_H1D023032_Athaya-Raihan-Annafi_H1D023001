<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Link Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #005959;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
        }

        .btn-primary {
            background-color: #008080d6;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 50px;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #005959;
        }

        .form-control {
            border-radius: 10px;
            padding: 10px;
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 100px;
        }

        .card-title {
            text-align: center;
            color: #008080d6;
            font-weight: bold;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card p-4" style="max-width: 400px; margin: auto;">
            <div class="logo">
                <img src="user.png" alt="Logo">
            </div>
            <h3 class="card-title">Masuk</h3>
            <?php
            session_start();
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Cek username di database
                $sql = "SELECT * FROM users WHERE username = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    // Verifikasi password
                    if (password_verify($password, $user['password'])) {
                        $_SESSION['username'] = $user['username'];

                        // Kata kunci untuk admin
                        if ($username === "admin" && $password === "admin123") {
                            header("Location: admin_dashboard.php"); // Redirect ke dashboard admin
                        } else {
                            header("Location: index.php"); // Redirect ke halaman utama
                        }
                        exit();
                    } else {
                        echo "<div class='alert alert-danger'>Password salah!</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Username tidak ditemukan!</div>";
                } 
            }
            ?>
            <form method="POST">
                <div class="mb-3">
                    <input type="text" name="username" class="form-control" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
            <div class="text-center mt-3">
                <p>Belum punya akun? <a href="register.php" class="text-decoration-none">Daftar</a></p>
            </div>
        </div>
    </div>

    <!-- Link Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
