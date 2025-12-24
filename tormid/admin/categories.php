<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$categories = mysqli_query(
  $conn,
  "SELECT * FROM categories ORDER BY nama ASC"
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Kategori</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="margin-top:40px">
  <div class="card card-pad">
    <h2>🗂️ Kelola Kategori</h2>
    <p style="color:var(--muted);margin-bottom:16px">
      Edit nama kategori dan gambar kategori.
    </p>

    <a href="category_form.php" class="btn" style="margin-bottom:16px;display:inline-block">
      + Tambah Kategori
    </a>

    <table>
      <tr>
        <th>Nama</th>
        <th>Gambar</th>
        <th>Aksi</th>
      </tr>

      <?php while ($c = mysqli_fetch_assoc($categories)) : ?>
        <tr>
          <td><?= htmlspecialchars($c['nama']) ?></td>
          <td>
            <?php if (!empty($c['icon'])): ?>
              <img src="../assets/images/category/<?= htmlspecialchars($c['icon']) ?>"
                   style="height:50px;object-fit:contain">
            <?php else: ?>
              <span style="color:#999">Belum ada</span>
            <?php endif; ?>
          </td>
            <td style="display:flex;gap:8px">
            <a href="category_form.php?id=<?= (int)$c['id'] ?>" class="btn">
                Edit
            </a>

            <a href="category_delete.php?id=<?= (int)$c['id'] ?>"
                class="btn"
                style="background:#6b7280"
                onclick="return confirm('Yakin hapus kategori ini?')">
                Hapus
            </a>
            </td>

        </tr>
      <?php endwhile; ?>
    </table>

  </div>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
