<?php
require_once 'config/auth.php';
require_once 'config/database.php';

/* kategori (FILTER UI SAJA) */
$kategori = mysqli_query(
    $conn,
    "SELECT * FROM categories
     WHERE nama NOT IN (
       'All-in-One PC',
       'Komponen PC',
       'PC Gaming',
       'PC Workstation'
     )
     ORDER BY nama ASC"
);

/* brands */
$brands = mysqli_query(
    $conn,
    "SELECT id, nama FROM brands ORDER BY nama ASC"
);

/* promo produk */
$promo = mysqli_query(
    $conn,
    "SELECT * FROM products
     WHERE is_promo = 1
     ORDER BY created_at DESC
     LIMIT 18"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Torm.ID</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">

  <!-- ✅ CSS KHUSUS KATEGORI FULL IMAGE -->
  <style>
    .kategori-card.kategori-bg{
      position:relative;
      height:140px;
      border-radius:16px;
      background-size:cover;
      background-position:center;
      overflow:hidden;
      display:flex;
      align-items:flex-end;
      text-decoration:none;
      box-shadow:0 6px 18px rgba(0,0,0,.12);
      transition:.25s ease;
    }
    .kategori-card.kategori-bg:hover{
      transform:translateY(-3px);
      box-shadow:0 12px 28px rgba(0,0,0,.25);
    }
    .kategori-overlay{
      position:absolute;
      inset:0;
      background:linear-gradient(
        to top,
        rgba(0,0,0,.65),
        rgba(0,0,0,.15)
      );
    }
    .kategori-text{
      position:relative;
      z-index:2;
      width:100%;
      padding:14px;
      color:#fff;
      font-weight:800;
      font-size:16px;
      text-align:center;
      letter-spacing:.3px;
    }
  </style>
</head>
<body>

<?php include 'partials/header.php'; ?>

<!-- ================= HERO FULL SCREEN ================= -->
<section class="hero-video" style="height:calc(100vh - 180px);min-height:520px;">
  <video autoplay muted loop playsinline>
    <source src="assets/video/hero.mp4" type="video/mp4">
  </video>

  <div class="hero-overlay">
    <h1>Upgrade Teknologimu</h1>
    <p>Laptop, PC, dan Komponen Terbaik</p>
    <a href="katalog.php" class="btn-hero">Lihat Katalog</a>
  </div>
</section>

<!-- ================= MAIN CONTENT ================= -->
<section class="container" style="margin-top:40px">
  <div class="page-grid">

    <!-- ===== SIDE ===== -->
    <aside class="page-side">
      <div class="card card-pad">
        <h3 class="card-title">Rekomendasi Cepat</h3>
        <p class="card-sub">
          Cari kategori, brand, dan promo tanpa scroll panjang.
        </p>

        <div style="margin-top:14px;display:flex;gap:10px;flex-wrap:wrap">
          <a class="btn" href="katalog.php">Semua Produk</a>
          <a class="btn" href="katalog.php?q=gaming" style="background:#111827">
            Gaming
          </a>
        </div>
      </div>

      <div class="card" style="margin-top:14px;overflow:hidden">
        <img src="assets/images/banner/logotorm.png"
             style="width:100%;height:220px;object-fit:cover">
      </div>
    </aside>

    <!-- ===== MAIN ===== -->
    <main>

      <!-- ===== KATEGORI ===== -->
      <div class="section-head">
        <div class="section-left">
          <div class="section-banner">
            <img src="assets/images/banner/kategori.png">
          </div>
          <div class="section-title">
            <h2>Kategori Produk</h2>
            <p>Pilih kategori untuk melihat produk yang relevan.</p>
          </div>
        </div>
      </div>

      <div class="kategori-grid">
        <?php if ($kategori && mysqli_num_rows($kategori) > 0): ?>
          <?php while ($k = mysqli_fetch_assoc($kategori)) : ?>

            <?php
              $bg = !empty($k['icon'])
                ? "assets/images/category/".$k['icon']
                : "assets/images/no-image/no-image.png";
            ?>

            <a href="katalog.php?kategori=<?= urlencode($k['nama']) ?>"
               class="kategori-card kategori-bg"
               style="background-image:url('<?= htmlspecialchars($bg) ?>')">

              <div class="kategori-overlay"></div>
              <div class="kategori-text">
                <?= htmlspecialchars($k['nama']) ?>
              </div>

            </a>

          <?php endwhile; ?>
        <?php else: ?>
          <div class="empty-state">
            <p>Belum ada kategori.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- ===== SHOP BY BRAND ===== -->
      <div style="margin-top:40px">
        <div class="section-head">
          <div class="section-left">
            <div class="section-banner">
              <img src="assets/images/banner/brand.jpg">
            </div>
            <div class="section-title">
              <h2>Shop by Brand</h2>
              <p>Brand populer yang tersedia.</p>
            </div>
          </div>
        </div>

        <?php if ($brands && mysqli_num_rows($brands) > 0): ?>
          <div class="kategori-grid">
            <?php while ($b = mysqli_fetch_assoc($brands)) : ?>
              <?php
                // nama brand → file gambar
                $brandFile = strtolower(str_replace(' ', '', $b['nama'])) . '.png';
                $brandPath = "assets/images/brand/" . $brandFile;

                if (!file_exists($brandPath)) {
                  $brandPath = "assets/images/no-image/no-image.png";
                }
              ?>
              <a href="katalog.php?brand_id=<?= (int)$b['id'] ?>"
                class="kategori-card brand-card">

                <!-- background image -->
                <div class="brand-bg"
                    style="background-image:url('<?= htmlspecialchars($brandPath) ?>')">
                </div>

                <!-- overlay text -->
                <div class="brand-overlay">
                  <?= htmlspecialchars($b['nama']) ?>
                </div>

              </a>
            <?php endwhile; ?>
          </div>
        <?php else: ?>
          <div class="empty-state">
            <p>Belum ada brand.</p>
          </div>
        <?php endif; ?>
      </div>

      <!-- ===== PROMO ===== -->
      <div style="margin-top:40px">
        <div class="section-head">
          <div class="section-left">
            <div class="section-banner">
              <img src="assets/images/banner/promo.png">
            </div>
            <div class="section-title">
              <h2>Promo Minggu Ini</h2>
              <p>Produk pilihan dengan promo terbaik.</p>
            </div>
          </div>
        </div>

        <div class="promo-grid">
          <?php if ($promo && mysqli_num_rows($promo) > 0): ?>
            <?php while ($p = mysqli_fetch_assoc($promo)) : ?>
              <?php
                $gambar = $p['gambar']
                  ? "assets/images/product/".$p['gambar']
                  : "assets/images/no-image/no-image.png";
              ?>
              <div class="produk-card">
                <a href="produk.php?id=<?= (int)$p['id'] ?>">
                  <img src="<?= htmlspecialchars($gambar) ?>">
                </a>
                <h4><?= htmlspecialchars($p['nama_produk']) ?></h4>
                <p>Rp <?= number_format((int)$p['harga']) ?></p>

                <form action="proses_cart.php" method="POST">
                  <input type="hidden" name="product_id" value="<?= (int)$p['id'] ?>">
                  <button class="btn">Tambah ke Keranjang</button>
                </form>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <div class="empty-state">
              <p>Belum ada promo.</p>
            </div>
          <?php endif; ?>
        </div>
      </div>

    </main>
  </div>
</section>

<?php include 'partials/footer.php'; ?>

</body>
</html>
