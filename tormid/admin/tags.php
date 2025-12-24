<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$data = mysqli_query($conn, "SELECT * FROM tags ORDER BY nama ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tags - Admin | Torm.ID</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">  
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="margin-top:40px">
  <div style="display:flex;justify-content:space-between;align-items:center;gap:15px;flex-wrap:wrap">
    <div>
      <h2>Manajemen Tags</h2>
      <p style="color:#6b7280;margin-top:6px">Tambah, edit, hapus tags untuk search & filter.</p>
    </div>
    <a href="tag_form.php" class="btn">+ Tambah Tag</a>
  </div>

  <div style="overflow-x:auto;margin-top:20px">
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>Nama Tag</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php if (mysqli_num_rows($data) > 0): ?>
          <?php while ($t = mysqli_fetch_assoc($data)): ?>
            <tr>
              <td><?= htmlspecialchars($t['nama']) ?></td>
              <td style="white-space:nowrap">
                <a href="tag_form.php?id=<?= (int)$t['id'] ?>" style="color:#e11d48;font-weight:600">Edit</a>
                |
                <a href="tag_delete.php?id=<?= (int)$t['id'] ?>"
                   onclick="return confirm('Yakin hapus tag ini? (Relasi produk ikut terhapus)')"
                   style="color:#b91c1c;font-weight:600">Hapus</a>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="2" style="text-align:center">Belum ada tag.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <div style="margin-top:20px;display:flex;gap:10px;flex-wrap:wrap">
    <a href="products.php" class="btn">← Kembali ke Produk</a>
    <a href="index.php" class="btn" style="background:#6b7280">Dashboard</a>
  </div>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
