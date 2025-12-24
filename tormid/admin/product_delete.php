<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header("Location: products.php");
    exit;
}

/* hapus relasi tag dulu (aman walau FK sudah ada) */
$stmt1 = mysqli_prepare($conn, "DELETE FROM product_tags WHERE product_id = ?");
mysqli_stmt_bind_param($stmt1, "i", $id);
mysqli_stmt_execute($stmt1);

/* hapus produk */
$stmt2 = mysqli_prepare($conn, "DELETE FROM products WHERE id = ?");
mysqli_stmt_bind_param($stmt2, "i", $id);
mysqli_stmt_execute($stmt2);

header("Location: products.php");
exit;
