<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
  header("Location: brands.php");
  exit;
}

/* ambil logo */
$stmt = mysqli_prepare($conn, "SELECT logo FROM brands WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt)->fetch_assoc();

/* hapus file logo */
if (!empty($res['logo'])) {
  $path = "../assets/images/brand/" . $res['logo'];
  if (file_exists($path)) {
    unlink($path);
  }
}

/* hapus brand */
$stmt = mysqli_prepare($conn, "DELETE FROM brands WHERE id = ?");
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

header("Location: brands.php");
exit;
