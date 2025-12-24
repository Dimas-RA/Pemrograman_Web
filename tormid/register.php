<?php
require_once 'config/auth.php';

// Kalau sudah login, tidak boleh daftar lagi
if (is_logged_in()) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Akun - Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include 'partials/header.php'; ?>

<section class="container" style="margin-top:60px; max-width:420px">

    <div class="login-container">
        <form class="login-form" action="proses_register.php" method="POST">
            <h2>Daftar Akun</h2>
            <p>Buat akun baru untuk berbelanja</p>

            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required>
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>

            <div class="input-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirm" required>
            </div>

            <button type="submit">Daftar</button>

            <p style="margin-top:15px;font-size:14px">
                Sudah punya akun?
                <a href="login.php" style="color:#e11d48">Login</a>
            </p>
        </form>
    </div>

</section>

<?php include 'partials/footer.php'; ?>

</body>
</html>
