<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  header("Location: categories.php");
  exit;
}

/* ambil icon */
$stmt = mysqli_prepare($conn, "SELECT icon FROM categories WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt)->fetch_assoc();

/* hapus file gambar */
if (!empty($res['icon'])) {
  $path = "../assets/images/category/" . $res['icon'];
  if (file_exists($path)) {
    unlink($path);
  }
}

/* hapus data */
$stmt = mysqli_prepare($conn, "DELETE FROM categories WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: categories.php");
exit;
