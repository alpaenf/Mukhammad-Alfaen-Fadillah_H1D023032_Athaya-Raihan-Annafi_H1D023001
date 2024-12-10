<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
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
            <h3 class="card-title">Buat Akun Baru</h3>
            <?php
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = htmlspecialchars(trim($_POST['username']));
                $password = htmlspecialchars(trim($_POST['password']));
                $confirm_password = htmlspecialchars(trim($_POST['confirm_password']));

                if (empty($username) || empty($password) || empty($confirm_password)) {
                    echo "<div class='alert alert-danger'>Harap isi semua kolom!</div>";
                } elseif ($password !== $confirm_password) {
                    echo "<div class='alert alert-danger'>Password dan konfirmasi password tidak cocok!</div>";
                } else {
                    $check_sql = "SELECT * FROM users WHERE username = ?";
                    $check_stmt = $conn->prepare($check_sql);
                    $check_stmt->bind_param("s", $username);
                    $check_stmt->execute();
                    $result = $check_stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<div class='alert alert-danger'>Username sudah digunakan. Gunakan username lain.</div>";
                    } else {
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ss", $username, $hashed_password);

                        if ($stmt->execute()) {
                            echo "<div class='alert alert-success'>Pendaftaran berhasil! Silakan <a href='login.php' class='text-decoration-none'>login</a>.</div>";
                        } else {
                            echo "<div class='alert alert-danger'>Terjadi kesalahan. Coba lagi!</div>";
                        }
                    }
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
                <div class="mb-3">
                    <input type="password" name="confirm_password" class="form-control" placeholder="Konfirmasi Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Daftar</button>
            </form>
            <div class="text-center mt-3">
                <p>Sudah punya akun? <a href="login.php" class="text-decoration-none">Login</a></p>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
