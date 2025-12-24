<?php
require_once 'config/auth.php';
require_once 'config/database.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header("Location: katalog.php");
    exit;
}

/* Ambil detail produk + nama brand */
$stmt = mysqli_prepare(
    $conn,
    "SELECT p.*, b.nama AS brand_nama
     FROM products p
     LEFT JOIN brands b ON p.brand_id = b.id
     WHERE p.id = ?
     LIMIT 1"
);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$produk = mysqli_fetch_assoc($res);

if (!$produk) {
    // Produk tidak ditemukan
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
      <meta charset="UTF-8">
      <title>Produk Tidak Ditemukan - Torm.ID</title>
      <link rel="stylesheet" href="/tormid/assets/css/style.css">
    </head>
    <body>
    <?php include 'partials/header.php'; ?>

    <section class="container" style="margin-top:40px">
      <div style="background:#fff;padding:50px 30px;border-radius:16px;text-align:center;box-shadow:0 6px 18px rgba(0,0,0,.08)">
        <h3 style="font-size:20px;margin-bottom:10px">Produk tidak ditemukan</h3>
        <p style="color:#6b7280;margin-bottom:20px">Produk yang kamu cari tidak tersedia.</p>
        <a href="katalog.php" class="btn">Kembali ke Katalog</a>
      </div>
    </section>

    <?php include 'partials/footer.php'; ?>
    </body>
    </html>
    <?php
    exit;
}

/* Gambar produk */
$gambar = !empty($produk['gambar'])
    ? "assets/images/product/" . $produk['gambar']
    : "assets/images/no-image/no-image.png";

/* Field opsional (tanpa asumsi berlebihan) */
$brandNama   = $produk['brand_nama'] ?? null;
$kategori    = $produk['kategori'] ?? null;
$kebutuhan   = $produk['kebutuhan'] ?? null;
$deskripsi   = $produk['deskripsi'] ?? '';
$namaProduk  = $produk['nama_produk'] ?? 'Produk';
$harga       = (int)($produk['harga'] ?? 0);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($namaProduk) ?> - Torm.ID</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <style>
    .detail-wrap{
      display:flex;
      gap:28px;
      align-items:flex-start;
    }
    .detail-left, .detail-right{
      background:#fff;
      border-radius:16px;
      box-shadow:0 6px 20px rgba(0,0,0,.08);
      padding:18px;
    }
    .detail-left{ flex: 1; }
    .detail-right{ width: 380px; }
    .detail-img{
      width:100%;
      height:360px;
      object-fit:contain;
    }
    .meta-row{
      display:flex;
      gap:10px;
      flex-wrap:wrap;
      margin-top:12px;
    }
    .pill{
      background:#f3f4f6;
      padding:8px 12px;
      border-radius:999px;
      font-size:13px;
    }
    .price{
      color:#e11d48;
      font-weight:800;
      font-size:22px;
      margin:10px 0 18px;
    }
    .big-btn{
      width:100%;
      padding:14px;
      font-size:16px;
      font-weight:700;
      border-radius:10px;
    }
    .btn-outline{
      display:block;
      text-align:center;
      width:100%;
      padding:14px;
      font-size:16px;
      font-weight:700;
      border-radius:10px;
      border:1px solid #e11d48;
      color:#e11d48;
      background:#fff;
      margin-top:10px;
    }
    .btn-outline:hover{
      background:#fef2f2;
    }
    @media (max-width: 900px){
      .detail-wrap{ flex-direction:column; }
      .detail-right{ width:100%; }
      .detail-img{ height:280px; }
    }
  </style>
</head>
<body>

<?php include 'partials/header.php'; ?>

<section class="container" style="margin-top:40px">
  <div class="detail-wrap">

    <!-- KIRI: FOTO + DESKRIPSI -->
    <div class="detail-left">
      <img src="<?= $gambar ?>" class="detail-img" alt="<?= htmlspecialchars($namaProduk) ?>">

      <div class="meta-row">
        <?php if (!empty($brandNama)): ?>
          <span class="pill">Brand: <?= htmlspecialchars($brandNama) ?></span>
        <?php endif; ?>
        <?php if (!empty($kategori)): ?>
          <span class="pill">Kategori: <?= htmlspecialchars($kategori) ?></span>
        <?php endif; ?>
        <?php if (!empty($kebutuhan)): ?>
          <span class="pill">Kebutuhan: <?= htmlspecialchars($kebutuhan) ?></span>
        <?php endif; ?>
      </div>

      <h2 style="margin-top:16px"><?= htmlspecialchars($namaProduk) ?></h2>

      <h3 style="margin-top:18px;font-size:18px">Spesifikasi / Detail</h3>
      <p style="margin-top:10px;line-height:1.6;color:#374151;white-space:pre-line">
        <?= htmlspecialchars($deskripsi) ?>
      </p>
    </div>

    <!-- KANAN: RINGKASAN + ACTION -->
    <div class="detail-right">
      <h3 style="font-size:18px;margin-bottom:6px">Ringkasan</h3>
      <div class="price">Rp <?= number_format($harga) ?></div>

      <form action="proses_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?= (int)$produk['id'] ?>">
        <button class="btn big-btn" type="submit">Tambah ke Keranjang</button>
      </form>

      <a href="cart.php" class="btn-outline">Checkout (via Keranjang)</a>

      <div style="margin-top:16px;color:#6b7280;font-size:13px;line-height:1.5">
        Tips: Setelah tambah ke keranjang, kamu bisa langsung checkout dari halaman keranjang.
      </div>
    </div>

  </div>

  <div style="margin-top:20px">
    <a href="katalog.php" style="color:#e11d48;font-weight:600">← Kembali ke Katalog</a>
  </div>
</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>
