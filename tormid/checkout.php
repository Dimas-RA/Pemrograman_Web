<?php
require_once 'config/auth.php';
require_once 'config/database.php';

if (!is_logged_in()) {
    header("Location: login.php");
    exit;
}

$cart = $_SESSION['cart'] ?? [];
if (empty($cart)) {
    header("Location: katalog.php");
    exit;
}

$subtotal = 0;
foreach ($cart as $c) {
    $subtotal += $c['harga'] * $c['qty'];
}

$ongkir = 20000;
$diskon = (!empty($_POST['voucher']) && $_POST['voucher'] === 'HEMAT10') ? 10000 : 0;
$total = $subtotal + $ongkir - $diskon;

/* PROSES SIMPAN */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nama'])) {

    $uid = (int)$_SESSION['user_id'];
    $nama = trim($_POST['nama']);
    $alamat = trim($_POST['alamat']);

    /* aman: escape sederhana (minimal risk) */
    $namaEsc = mysqli_real_escape_string($conn, $nama);
    $alamatEsc = mysqli_real_escape_string($conn, $alamat);

    mysqli_query(
        $conn,
        "INSERT INTO orders (user_id, nama, alamat, total)
         VALUES ($uid, '$namaEsc', '$alamatEsc', $total)"
    );

    $order_id = mysqli_insert_id($conn);

    foreach ($cart as $item) {
        $n = mysqli_real_escape_string($conn, $item['nama']);
        $h = (int)$item['harga'];
        $q = (int)$item['qty'];
        mysqli_query(
            $conn,
            "INSERT INTO order_items (order_id, produk_nama, harga, qty)
             VALUES ($order_id, '$n', $h, $q)"
        );
    }

    unset($_SESSION['cart']);
    echo "<script>alert('Pesanan berhasil dibuat');location='index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checkout - Torm.ID</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include 'partials/header.php'; ?>

<section class="container" style="margin-top:30px">
  <div class="page-grid">

    <main>
      <div class="card card-pad">
        <h2>Checkout</h2>
        <p class="card-sub" style="margin-top:6px">Lengkapi data untuk membuat pesanan.</p>

        <form method="POST" style="margin-top:14px">
          <label>Nama Lengkap</label>
          <input name="nama" required>

          <label>Alamat</label>
          <textarea name="alamat" required rows="4"></textarea>

          <label>Voucher</label>
          <input name="voucher" placeholder="contoh: HEMAT10">

          <button class="btn" style="margin-top:14px">Buat Pesanan</button>
        </form>
      </div>
    </main>

    <aside class="page-side">
      <div class="card card-pad">
        <h3 class="card-title">Ringkasan Belanja</h3>

        <div style="margin-top:10px;display:flex;justify-content:space-between">
          <span style="color:#6b7280">Subtotal</span>
          <strong>Rp <?= number_format((int)$subtotal) ?></strong>
        </div>

        <div style="margin-top:8px;display:flex;justify-content:space-between">
          <span style="color:#6b7280">Ongkir</span>
          <strong>Rp <?= number_format((int)$ongkir) ?></strong>
        </div>

        <div style="margin-top:8px;display:flex;justify-content:space-between">
          <span style="color:#6b7280">Diskon</span>
          <strong>- Rp <?= number_format((int)$diskon) ?></strong>
        </div>

        <hr style="margin:14px 0">

        <div style="display:flex;justify-content:space-between;align-items:center">
          <span style="color:#111827;font-weight:900">Total</span>
          <span style="color:#e11d48;font-weight:900;font-size:20px">
            Rp <?= number_format((int)$total) ?>
          </span>
        </div>

        <div style="margin-top:14px;color:#6b7280;font-size:13px;line-height:1.6">
          Voucher demo: <strong>HEMAT10</strong> potong Rp 10.000
        </div>
      </div>

      <div class="card" style="margin-top:14px;overflow:hidden">
        <img src="assets/images/banner/checkout.jpg"
             onerror="this.src='assets/images/no-image/no-image.png'"
             style="width:100%;height:220px;object-fit:cover;display:block">
      </div>
    </aside>

  </div>
</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>
