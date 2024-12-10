<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['username'] !== "admin") {
    header("Location: login.php"); // Kembali ke login jika bukan admin
    exit();
}

// Koneksi ke database
include 'db.php';

// Inisialisasi pesan
$message = "";

// Tangani form untuk memperbarui status
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_status = $_POST['status_text'];
    $id = 1; // ID status tetap (untuk satu status saja)

    $sql = "UPDATE status_table SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $new_status, $id);

    if ($stmt->execute()) {
        $message = "Status berhasil diperbarui!";
    } else {
        $message = "Terjadi kesalahan saat memperbarui status.";
    }
}

// Ambil status saat ini dari database
$sql = "SELECT status FROM status_table WHERE id = 1";
$result = $conn->query($sql);
$current_status = ($result->num_rows > 0) ? $result->fetch_assoc()['status'] : "Status belum tersedia.";
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        .content {
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            height: 100px;
            font-size: 1rem;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1rem;
        }

        button:hover {
            background-color: #555;
        }

        .message {
            margin: 15px 0;
            padding: 10px;
            background-color: #e0f7fa;
            color: #00695c;
            border-left: 4px solid #004d40;
        }
    </style>
</head>
<body>
<header>
    <h1>Selamat Datang, Admin</h1>
    <nav>
        <a href="logout_admin.php" style="
            color: white;
            text-decoration: none;
            background-color: #d9534f;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 1rem;
            float: right;
            margin-top: -25px;
        ">Logout</a>
    </nav>
</header>
    <div class="content">
        <h2>Dashboard</h2>
        <p>Kelola data penting di sini.</p>

        <!-- Pesan jika ada -->
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>

        <!-- Form untuk mengubah status -->
        <form method="POST">
            <div class="form-group">
                <label for="status_text">Edit Status Gaya Hidup Ramah Lingkungan</label>
                <textarea id="status_text" name="status_text"><?php echo htmlspecialchars($current_status); ?></textarea>
            </div>
            <button type="submit">Perbarui Status</button>
        </form>
    </div>
</body>
</html>
