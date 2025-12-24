<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$brands = mysqli_query($conn, "SELECT * FROM brands ORDER BY nama ASC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Kelola Brand</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="max-width:900px;margin-top:40px">
  <h2>Kelola Brand</h2>

  <table style="margin-top:20px">
    <tr>
      <th>Logo</th>
      <th>Nama</th>
      <th>Aksi</th>
    </tr>

    <?php while ($b = mysqli_fetch_assoc($brands)) : ?>
      <?php
        $logo = $b['logo']
          ? "../assets/images/brand/".$b['logo']
          : "../assets/images/no-image/no-image.png";
      ?>
      <tr>
        <td>
          <img src="<?= htmlspecialchars($logo) ?>"
               style="width:80px;height:50px;object-fit:contain">
        </td>
        <td><?= htmlspecialchars($b['nama']) ?></td>
        <td style="display:flex;gap:8px">
            <a class="btn" href="brand_form.php?id=<?= (int)$b['id'] ?>">
                Edit
            </a>

            <a class="btn"
                href="brand_delete.php?id=<?= (int)$b['id'] ?>"
                onclick="return confirm('Yakin hapus brand ini?')"
                style="background:#6b7280">
                Hapus
            </a>
        </td>

      </tr>
    <?php endwhile; ?>
  </table>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
