<?php
require_once 'config/auth.php';

// Kalau sudah login, langsung arahkan
if (is_logged_in()) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include 'partials/header.php'; ?>

<!-- ===== LOGIN CONTENT ===== -->
<section class="container" style="margin-top:60px; max-width:420px">

    <div class="login-container">
        <form class="login-form" action="proses_login.php" method="POST">
            <h2>Login</h2>
            <p>Masuk untuk akses fitur.</p>

            <div class="input-group">
                <label for="username">Username</label>
                <input id="username" type="text" name="username" required autocomplete="username">
            </div>

            <div class="input-group">
                <label for="password">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <button type="submit">Masuk</button>
        </form>
    </div>

</section>

<?php include 'partials/footer.php'; ?>

</body>
</html>
