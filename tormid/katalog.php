<?php
require_once 'config/auth.php';
require_once 'config/database.php';

$categories = mysqli_query($conn, "SELECT * FROM categories ORDER BY nama ASC");

/* ambil parameter */
$kategori  = trim($_GET['kategori'] ?? '');
$brand_id  = trim($_GET['brand_id'] ?? '');
$q         = trim($_GET['q'] ?? '');
$min       = trim($_GET['min'] ?? '');
$max       = trim($_GET['max'] ?? '');

$autoKategori = false;
if ($q !== '' && $kategori === '') {
    if (stripos($q, 'laptop') !== false) {
        $kategori = 'Laptop';
        $autoKategori = true;
    }
}

/* query utama */
$sql = "
SELECT DISTINCT p.*
FROM products p
LEFT JOIN brands b ON p.brand_id = b.id
LEFT JOIN product_tags pt ON p.id = pt.product_id
LEFT JOIN tags t ON pt.tag_id = t.id
";

$where = [];
$params = [];
$types  = "";

/* kategori */
if ($kategori !== '') {
    $where[] = "p.kategori = ?";
    $types  .= "s";
    $params[] = $kategori;
}

/* brand */
if ($brand_id !== '') {
    $where[] = "p.brand_id = ?";
    $types  .= "i";
    $params[] = (int)$brand_id;
}

/* search */
if ($q !== '' && !$autoKategori) {
    $where[] = "(
        p.nama_produk LIKE ?
        OR b.nama LIKE ?
        OR t.nama LIKE ?
        OR p.kebutuhan LIKE ?
    )";
    $types  .= "ssss";
    $like = "%".$q."%";
    $params[] = $like;
    $params[] = $like;
    $params[] = $like;
    $params[] = $like;
}

/* harga */
if ($min !== '' && is_numeric($min)) {
    $where[] = "p.harga >= ?";
    $types  .= "i";
    $params[] = (int)$min;
}
if ($max !== '' && is_numeric($max)) {
    $where[] = "p.harga <= ?";
    $types  .= "i";
    $params[] = (int)$max;
}

if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}
$sql .= " ORDER BY p.created_at DESC";

/* eksekusi */
$stmt = mysqli_prepare($conn, $sql);
if (!empty($types)) {
    mysqli_stmt_bind_param($stmt, $types, ...$params);
}
mysqli_stmt_execute($stmt);
$products = mysqli_stmt_get_result($stmt);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Katalog Produk - Torm.ID</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">

  <!-- ✅ HERO FIX STYLE -->
  <style>
    .hero-video{
      position:relative;
      height:420px;
      overflow:hidden;
      background:#000;
    }
    .hero-slide{
      position:absolute;
      inset:0;
      background-size:cover;
      background-position:center;
      opacity:0;
      transition:opacity .8s ease;
    }
    .hero-slide.active{ opacity:1; }

    .hero-overlay{
      position:relative;
      z-index:2;
      height:100%;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      color:#fff;
      text-align:center;
      background:rgba(0,0,0,.35);
    }
  </style>
</head>
<body>

<?php include 'partials/header.php'; ?>

<!-- ================= HERO SLIDER ================= -->
<section class="hero-video" id="heroSlider">
  <div class="hero-slide active" style="background-image:url('assets/images/banner/katalog-1.jpg')"></div>
  <div class="hero-slide" style="background-image:url('assets/images/banner/katalog-2.png')"></div>
  <div class="hero-slide" style="background-image:url('assets/images/banner/katalog-3.jpg')"></div>

  <div class="hero-overlay">
    <h1>Katalog Produk</h1>
    <p>Temukan laptop, PC, dan aksesoris terbaik</p>
  </div>
</section>

<section class="container" style="margin-top:40px">
  <div class="page-grid">

    <!-- SIDEBAR -->
    <aside class="page-side">
      <div class="card card-pad filter-box">
        <h3 class="card-title">Filter & Pencarian</h3>

        <form method="GET">
          <label>Kata kunci</label>
          <input type="text" name="q" value="<?= htmlspecialchars($q) ?>">

          <label>Harga Min</label>
          <input type="number" name="min" value="<?= htmlspecialchars($min) ?>">

          <label>Harga Max</label>
          <input type="number" name="max" value="<?= htmlspecialchars($max) ?>">

          <input type="hidden" name="kategori" value="<?= htmlspecialchars($kategori) ?>">
          <input type="hidden" name="brand_id" value="<?= htmlspecialchars($brand_id) ?>">

          <div style="margin-top:12px;display:flex;gap:10px">
            <button class="btn">Terapkan</button>
            <a href="katalog.php" class="btn" style="background:#111827">Reset</a>
          </div>
        </form>
      </div>
    </aside>

    <!-- MAIN -->
    <main>
      <?php if (mysqli_num_rows($products) === 0): ?>
        <div class="empty-state">
          <h3>Produk tidak ditemukan</h3>
          <p>Coba ubah filter atau kata kunci.</p>
        </div>
      <?php else: ?>
        <div class="product-list">
          <?php while ($p = mysqli_fetch_assoc($products)) : ?>
            <?php
              $gambar = $p['gambar']
                ? "assets/images/product/".$p['gambar']
                : "assets/images/no-image/no-image.png";
            ?>
            <div class="product-row">
              <a href="produk.php?id=<?= (int)$p['id'] ?>">
                <img src="<?= htmlspecialchars($gambar) ?>">
              </a>

              <div>
                <h4><?= htmlspecialchars($p['nama_produk']) ?></h4>
                <div class="meta">Kategori: <?= htmlspecialchars($p['kategori']) ?></div>
              </div>

              <div class="actions">
                <div class="price">Rp <?= number_format($p['harga']) ?></div>
                <form method="POST" action="proses_cart.php">
                  <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                  <button class="btn">Tambah</button>
                </form>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </main>

  </div>
</section>

<?php include 'partials/footer.php'; ?>

<!-- ✅ HERO SLIDER JS -->
<script>
document.addEventListener('DOMContentLoaded', () => {
  const slides = document.querySelectorAll('#heroSlider .hero-slide');
  if (!slides.length) return;

  let index = 0;
  setInterval(() => {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
  }, 10000);
});
</script>

</body>
</html>
