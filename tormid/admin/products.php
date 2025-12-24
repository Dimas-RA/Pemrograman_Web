<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$sql = "
SELECT p.id, p.nama_produk, p.kategori, p.harga, p.is_promo, p.created_at, b.nama AS brand_nama
FROM products p
LEFT JOIN brands b ON p.brand_id = b.id
ORDER BY p.created_at DESC
";
$data = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Produk - Admin | Torm.ID</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="margin-top:40px">
  <div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap">
    <div>
      <h2>Manajemen Produk</h2>
      <p style="color:#6b7280;margin-top:6px">Tambah, edit, hapus produk dan atur tag.</p>
    </div>
    <a href="product_form.php" class="btn">+ Tambah Produk</a>
  </div>

  <div style="overflow-x:auto;margin-top:20px">
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nama</th>
          <th>Brand</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Promo</th>
          <th>Waktu</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($data) > 0): ?>
          <?php while ($p = mysqli_fetch_assoc($data)): ?>
            <tr>
              <td><?= htmlspecialchars($p['nama_produk']) ?></td>
              <td><?= htmlspecialchars($p['brand_nama'] ?? '-') ?></td>
              <td><?= htmlspecialchars($p['kategori'] ?? '-') ?></td>
              <td>Rp <?= number_format((int)$p['harga']) ?></td>
              <td><?= ((int)$p['is_promo'] === 1) ? 'Ya' : 'Tidak' ?></td>
              <td><?= htmlspecialchars($p['created_at'] ?? '') ?></td>
              <td style="white-space:nowrap">
                <a href="product_form.php?id=<?= (int)$p['id'] ?>" style="color:#e11d48;font-weight:600">Edit</a>
                |
                <a href="product_delete.php?id=<?= (int)$p['id'] ?>"
                   onclick="return confirm('Yakin hapus produk ini?')"
                   style="color:#b91c1c;font-weight:600">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr>
            <td colspan="7" style="text-align:center">Belum ada produk.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;display:flex;gap:10px;flex-wrap:wrap">
    <a href="index.php" class="btn" style="background:#6b7280">← Dashboard</a>
    <a href="tags.php" class="btn">Kelola Tags</a>
  </div>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
