<?php
require_once __DIR__ . '/../config/auth.php';
require_once __DIR__ . '/../config/database.php';

/* deteksi kalau dipanggil dari /admin/ biar path assets & link aman */
$isAdminPath = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false);
$base = $isAdminPath ? '../' : '';

/* ambil kategori */
$navKategori = mysqli_query($conn, "SELECT * FROM categories");

/* hitung cart count */
$cartCount = 0;
if (!empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['qty'];
    }
}

/* ambil foto profil user */
$profilePhoto = null;
if (is_logged_in()) {
    $uid = $_SESSION['user_id'];
    $stmt = mysqli_prepare(
        $conn,
        "SELECT profile_photo FROM users WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "i", $uid);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt)->fetch_assoc();

    if (!empty($res['profile_photo'])) {
        $profilePhoto = $base . "assets/images/profile/" . $res['profile_photo'];
    } else {
        $profilePhoto = $base . "assets/images/no-image/no-image.png";
    }
}

/* value search agar tetap nempel */
$searchValue = '';
if (isset($_GET['q'])) {
    $searchValue = trim($_GET['q']);
}

/*
  FIX SEARCH:
  - Banyak user mengetik "laptop" untuk mencari kategori Laptop.
  - Kalau cuma pakai q=laptop, hasil bisa kosong karena "Laptop" bukan bagian dari nama_produk.
  - Jadi kalau keyword mengandung "laptop", kita tambahkan kategori=Laptop secara otomatis.
*/
$searchKategori = '';
if ($searchValue !== '') {
    $sv = strtolower($searchValue);
    if (strpos($sv, 'laptop') !== false) {
        $searchKategori = 'Laptop';
    }
}
?>

<!-- ===== FIXED HEADER STYLE ===== -->
<style>
/* ===== TOP BAR ===== */
.top-bar {
  background: #111827;
  color: #fff;
  font-size: 13px;
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  z-index: 1000;
  height: 32px;
  display: flex;
  align-items: center;
}

/* ===== MAIN HEADER ===== */
.main-header {
  background: #fff;
  border-bottom: 1px solid var(--border);
  position: fixed;
  top: 32px;
  left: 0;
  right: 0;
  z-index: 999;
}

/* ===== NAVBAR ===== */
.nav-menu {
  background: #fff;
  border-bottom: 1px solid var(--border);
  position: fixed;
  top: 110px;
  left: 0;
  right: 0;
  z-index: 998;
  height: 52px;
  display: flex;
  align-items: center;
}

.nav-flex {
  height: 100%;
  display: flex;
  align-items: center;
  gap: 10px;
}

/* HILANGKAN GAP DEFAULT */
.nav-links {
  margin: 0;
  padding: 0;
}

/* ===== MOBILE FIX ===== */
@media (max-width: 768px){
  .nav-menu{
    position: static;
    height: auto;
  }
}
</style>

<!-- ===== TOP BAR ===== -->
<div class="top-bar">
  <div class="container top-flex">
    <div class="top-left">
      <span>Torm.ID</span>
      <span>Tech Store</span>
    </div>
    <div class="top-right">
      <span>📞 0812-9700-9800</span>
      <span>✉️ sales@tormid.id</span>
    </div>
  </div>
</div>

<!-- ===== MAIN HEADER ===== -->
<header class="main-header">
  <div class="container header-flex">
    <div class="logo">
      <a href="<?= $base ?>index.php">
        <img src="<?= $base ?>assets/images/logo.png" alt="Torm.ID">
      </a>
    </div>

    <!-- SEARCH (GET ke katalog.php?q=...) -->
    <form class="search-box" method="GET" action="<?= $base ?>katalog.php">
      <input type="text" name="q" placeholder="Cari produk ..." value="<?= htmlspecialchars($searchValue) ?>">

      <?php if ($searchKategori !== ''): ?>
        <!-- Tambahan kecil: kalau keyword mengandung "laptop" maka force kategori Laptop -->
        <input type="hidden" name="kategori" value="<?= htmlspecialchars($searchKategori) ?>">
      <?php endif; ?>

      <button type="submit">🔍</button>
    </form>

    <div class="header-action">
      <?php if (is_logged_in()): ?>

        <a href="<?= $base ?>profile.php" style="display:flex;align-items:center;gap:8px">
          <img src="<?= htmlspecialchars($profilePhoto) ?>"
               style="width:32px;height:32px;border-radius:50%;object-fit:cover">
          <span><?= htmlspecialchars($_SESSION['username']) ?></span>
        </a>

        <a href="<?= $base ?>cart.php" style="margin-left:12px;position:relative">
          🛒
          <?php if ($cartCount > 0): ?>
            <span style="
              position:absolute;
              top:-8px;
              right:-10px;
              background:red;
              color:white;
              border-radius:50%;
              padding:2px 6px;
              font-size:12px;
            ">
              <?= $cartCount ?>
            </span>
          <?php endif; ?>
        </a>

        <a href="<?= $base ?>logout.php" style="margin-left:12px">Logout</a>

      <?php else: ?>
        <a href="<?= $base ?>login.php">Login</a>
        <a href="<?= $base ?>register.php">Daftar</a>
      <?php endif; ?>
    </div>
  </div>
</header>

<!-- ===== NAV MENU ===== -->
<nav class="nav-menu">
  <div class="container nav-flex">
    <div class="menu-dropdown" tabindex="0">
      ☰ Menu
      <ul class="dropdown">
        <?php while ($c = mysqli_fetch_assoc($navKategori)) : ?>
          <li>
            <a href="<?= $base ?>katalog.php?kategori=<?= urlencode($c['nama']) ?>">
              <?= htmlspecialchars($c['nama']) ?>
            </a>
          </li>
        <?php endwhile; ?>
      </ul>
    </div>

    <ul class="nav-links">
      <li><a href="<?= $base ?>index.php">Home</a></li>
      <li><a href="<?= $base ?>katalog.php">Katalog</a></li>
      <li><a href="<?= $base ?>about.php">Tentang</a></li>

      <?php if (is_logged_in()): ?>
        <li><a href="<?= $base ?>profile.php">Profil</a></li>
      <?php endif; ?>

      <?php if (is_logged_in() && is_admin()): ?>
        <li><a href="<?= $base ?>admin/index.php">Admin</a></li>
      <?php endif; ?>
    </ul>
  </div>
</nav>
