<?php
require_once '../config/auth.php';
require_once '../config/database.php';

/* Proteksi: hanya admin */
require_admin();
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard - Torm.ID</title>
  <link rel="stylesheet" href="../assets/css/style.css">
  <style>
    /* ===== ADMIN DASHBOARD STYLE ===== */
    .admin-wrap{
      display:grid;
      grid-template-columns: 1fr;
      gap:24px;
    }

    .admin-card{
      background:#fff;
      border-radius:18px;
      padding:24px;
      box-shadow: var(--shadow);
      border:1px solid rgba(229,231,235,.8);
    }

    .admin-header h2{
      font-size:26px;
      margin-bottom:6px;
    }

    .admin-header p{
      color:var(--muted);
    }

    .online-list{
      margin-top:12px;
      padding-left:18px;
    }

    .online-list li{
      margin-bottom:6px;
      font-weight:600;
    }

    .admin-menu{
      display:grid;
      grid-template-columns: repeat(auto-fit, minmax(220px,1fr));
      gap:18px;
      margin-top:12px;
    }

    .admin-menu a{
      display:block;
      padding:20px;
      border-radius:16px;
      background:#fff;
      border:1px solid rgba(229,231,235,.9);
      box-shadow: var(--shadow);
      transition:.25s ease;
    }

    .admin-menu a:hover{
      transform: translateY(-6px);
      box-shadow: var(--shadowHover);
      background:#f9fafb;
    }

    .admin-menu h4{
      margin-bottom:6px;
      font-size:17px;
    }

    .admin-menu p{
      font-size:14px;
      color:var(--muted);
      line-height:1.5;
    }

    .admin-icon{
      font-size:26px;
      margin-bottom:10px;
      display:inline-block;
    }
  </style>
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="margin-top:40px">
  <div class="admin-wrap">

    <!-- HEADER -->
    <div class="admin-card admin-header">
      <h2>Dashboard Admin</h2>
      <p>Selamat datang, <b><?= htmlspecialchars($_SESSION['username']) ?></b></p>
    </div>

    <!-- USER ONLINE -->
    <div class="admin-card">
      <h3>👤 User Sedang Online</h3>
      <ul class="online-list">
        <li>admin</li>
      </ul>
    </div>

    <!-- MENU ADMIN -->
    <div class="admin-card">
      <h3>⚙️ Menu Admin</h3>

      <div class="admin-menu">

        <!-- PRODUK -->
        <a href="products.php">
          <div class="admin-icon">📦</div>
          <h4>Kelola Produk</h4>
          <p>Tambah, edit, hapus produk, atur harga & promo.</p>
        </a>

        <!-- BRAND (BARU) -->
        <a href="brands.php">
          <div class="admin-icon">🏷️</div>
          <h4>Kelola Brand</h4>
          <p>Edit nama brand dan upload logo brand.</p>
        </a>

        <!-- KATEGORI (BARU) -->
        <a href="categories.php">
          <div class="admin-icon">🗂️</div>
          <h4>Kelola Kategori</h4>
          <p>Edit kategori produk dan gambar kategori.</p>
        </a>

        <!-- TAG -->
        <a href="tags.php">
          <div class="admin-icon">🔖</div>
          <h4>Kelola Tag</h4>
          <p>Atur tag untuk search & filter produk.</p>
        </a>

        <!-- KONTAK -->
        <a href="kontak.php">
          <div class="admin-icon">📨</div>
          <h4>Pesan Kontak</h4>
          <p>Lihat pesan dari halaman kontak.</p>
        </a>

      </div>
    </div>

  </div>
</section>

<?php include '../partials/footer.php'; ?>

<script src="../assets/js/realtime.js"></script>
</body>
</html>
