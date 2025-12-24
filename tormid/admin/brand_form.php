<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = (int)($_GET['id'] ?? 0);
if ($id <= 0) {
  header("Location: brands.php");
  exit;
}

/* ambil data brand */
$stmt = mysqli_prepare($conn, "SELECT * FROM brands WHERE id=?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$brand = mysqli_stmt_get_result($stmt)->fetch_assoc();

if (!$brand) {
  header("Location: brands.php");
  exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = trim($_POST['nama'] ?? '');

  if ($nama === '') {
    $error = 'Nama brand wajib diisi.';
  }

  /* upload logo */
  if ($error === '' && isset($_FILES['logo']) && $_FILES['logo']['error'] === UPLOAD_ERR_OK) {
    $tmp  = $_FILES['logo']['tmp_name'];
    $ext  = strtolower(pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION));
    $allow = ['png','jpg','jpeg','webp'];

    if (!in_array($ext, $allow, true)) {
      $error = 'Format logo harus png / jpg / jpeg / webp.';
    } else {
      $fileName = "brand_{$id}.{$ext}";
      $dest = __DIR__ . "/../assets/images/brand/" . $fileName;
      move_uploaded_file($tmp, $dest);

      mysqli_query(
        $conn,
        "UPDATE brands SET logo='".mysqli_real_escape_string($conn,$fileName)."' WHERE id={$id}"
      );
    }
  }

  if ($error === '') {
    $stmtU = mysqli_prepare($conn, "UPDATE brands SET nama=? WHERE id=?");
    mysqli_stmt_bind_param($stmtU, "si", $nama, $id);
    mysqli_stmt_execute($stmtU);

    header("Location: brands.php");
    exit;
  }
}

$preview = $brand['logo']
  ? "../assets/images/brand/".$brand['logo']
  : "../assets/images/no-image/no-image.png";
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Brand</title>
  <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="max-width:600px;margin-top:40px">
  <h2>Edit Brand</h2>

  <?php if ($error): ?>
    <div class="empty-state"><?= htmlspecialchars($error) ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data" style="margin-top:20px">

    <label>Nama Brand</label>
    <input type="text" name="nama" required
           value="<?= htmlspecialchars($brand['nama']) ?>">

    <label>Logo Saat Ini</label>
    <img src="<?= htmlspecialchars($preview) ?>"
         style="width:180px;height:100px;object-fit:contain;
                background:#fff;padding:10px;border-radius:12px">

    <label>Ganti Logo (opsional)</label>
    <input type="file" name="logo" accept="image/*">

    <div style="margin-top:20px;display:flex;gap:10px">
      <button class="btn">Simpan</button>
      <a href="brands.php" class="btn" style="background:#6b7280">Batal</a>
    </div>

  </form>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
