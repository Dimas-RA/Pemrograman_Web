<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$nama = '';
$error = '';

if ($id > 0) {
  $stmt = mysqli_prepare($conn, "SELECT nama FROM tags WHERE id = ? LIMIT 1");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt)->fetch_assoc();
  if ($res) {
    $nama = $res['nama'];
  } else {
    header("Location: tags.php");
    exit;
  }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = trim($_POST['nama'] ?? '');
  if ($nama === '') {
    $error = 'Nama tag wajib diisi.';
  } else {
    if ($id > 0) {
      $stmtU = mysqli_prepare($conn, "UPDATE tags SET nama = ? WHERE id = ?");
      mysqli_stmt_bind_param($stmtU, "si", $nama, $id);
      @mysqli_stmt_execute($stmtU);
      header("Location: tags.php");
      exit;
    } else {
      $stmtI = mysqli_prepare($conn, "INSERT INTO tags (nama) VALUES (?)");
      mysqli_stmt_bind_param($stmtI, "s", $nama);
      @mysqli_stmt_execute($stmtI);
      header("Location: tags.php");
      exit;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= ($id > 0) ? 'Edit Tag' : 'Tambah Tag' ?> - Admin | Torm.ID</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="margin-top:40px; max-width:600px">
  <h2><?= ($id > 0) ? 'Edit Tag' : 'Tambah Tag' ?></h2>

  <?php if ($error !== ''): ?>
    <div style="background:#fef2f2;border:1px solid #fecaca;color:#b91c1c;padding:12px 14px;border-radius:10px;margin-top:15px">
      <?= htmlspecialchars($error) ?>
    </div>
  <?php endif; ?>

  <form method="POST" style="margin-top:18px">
    <label>Nama Tag</label>
    <input name="nama" required value="<?= htmlspecialchars($nama) ?>" placeholder="contoh: keyboard">

    <div style="margin-top:18px;display:flex;gap:10px;flex-wrap:wrap">
      <button class="btn" type="submit">Simpan</button>
      <a href="tags.php" class="btn" style="background:#6b7280">Batal</a>
    </div>
  </form>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
