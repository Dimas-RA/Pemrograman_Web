<?php
include 'config/auth.php';
include 'config/database.php';

$data = mysqli_query($conn, "SELECT * FROM products");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk - Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<header>
    <nav class="navbar">
        <div class="logo-area">
            <img src="assets/images/Logo.png" class="logo" alt="Logo">
            <h1>Torm.ID</h1>
        </div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="main.php" class="active">Produk</a></li>
            <li><a href="about.php">Tentang</a></li>

            <?php if (is_logged_in()): ?>
                <?php if (is_admin()): ?>
                    <li><a href="admin/index.php">Admin</a></li>
                <?php endif; ?>
                <li><b><?= htmlspecialchars($_SESSION['username']) ?></b></li>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.php">Login</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <h2>Daftar Produk</h2>

    <div class="produk-container">
        <?php while ($p = mysqli_fetch_assoc($data)) : ?>
            <?php
              $gambar = $p['gambar']
                ? "assets/images/product/" . $p['gambar']
                : "assets/images/no-image/no-image.png";
            ?>
            <div class="produk-card">
                <img src="<?= htmlspecialchars($gambar) ?>"
                     onerror="this.src='assets/images/no-image/no-image.png'">
                <h3><?= htmlspecialchars($p['nama_produk']); ?></h3>
                <p><?= htmlspecialchars($p['deskripsi']); ?></p>
                <p><b>Rp <?= number_format((int)$p['harga']); ?></b></p>
            </div>
        <?php endwhile; ?>
    </div>
</main>

<footer>© 2025 Torm.ID</footer>
</body>
</html>
