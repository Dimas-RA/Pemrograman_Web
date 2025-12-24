<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

/* ambil id jika edit */
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$kategori = null;

if ($id > 0) {
  $stmt = mysqli_prepare($conn, "SELECT * FROM categories WHERE id = ?");
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $kategori = mysqli_stmt_get_result($stmt)->fetch_assoc();
}

/* submit */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = trim($_POST['nama']);
  $iconLama = $_POST['icon_lama'] ?? null;
  $iconBaru = $iconLama;

  /* upload gambar */
  if (!empty($_FILES['icon']['name'])) {
    $ext = pathinfo($_FILES['icon']['name'], PATHINFO_EXTENSION);
    $allowed = ['jpg','jpeg','png','webp'];

    if (in_array(strtolower($ext), $allowed)) {
      $iconBaru = time() . '-' . preg_replace('/[^a-zA-Z0-9]/','', strtolower($nama)) . '.' . $ext;
      move_uploaded_file(
        $_FILES['icon']['tmp_name'],
        "../assets/images/category/" . $iconBaru
      );
    }
  }

  if ($id > 0) {
    /* update */
    $stmt = mysqli_prepare(
      $conn,
      "UPDATE categories SET nama = ?, icon = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "ssi", $nama, $iconBaru, $id);
    mysqli_stmt_execute($stmt);
  } else {
    /* insert */
    $stmt = mysqli_prepare(
      $conn,
      "INSERT INTO categories (nama, icon) VALUES (?, ?)"
    );
    mysqli_stmt_bind_param($stmt, "ss", $nama, $iconBaru);
    mysqli_stmt_execute($stmt);
  }

  header("Location: categories.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= $id ? 'Edit' : 'Tambah' ?> Kategori</title>
  <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="margin-top:40px">
  <div class="card card-pad" style="max-width:620px;margin:auto">

    <h2><?= $id ? '✏️ Edit' : '➕ Tambah' ?> Kategori</h2>
    <p style="color:var(--muted);margin-bottom:16px">
      Atur nama dan gambar kategori (ditampilkan di homepage).
    </p>

    <form method="POST" enctype="multipart/form-data">

      <label>Nama Kategori</label>
      <input type="text" name="nama" required
        value="<?= htmlspecialchars($kategori['nama'] ?? '') ?>">

      <label>Gambar Kategori</label>
      <input type="file" name="icon" accept=".jpg,.jpeg,.png,.webp">

      <?php if (!empty($kategori['icon'])): ?>
        <input type="hidden" name="icon_lama"
               value="<?= htmlspecialchars($kategori['icon']) ?>">

        <div style="margin-top:10px">
          <img src="../assets/images/category/<?= htmlspecialchars($kategori['icon']) ?>"
               style="height:90px;object-fit:contain">
        </div>
      <?php endif; ?>

      <div style="margin-top:20px;display:flex;gap:10px">
        <button class="btn">Simpan</button>
        <a href="categories.php" class="btn" style="background:#111827">
          Batal
        </a>
      </div>

    </form>

  </div>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
