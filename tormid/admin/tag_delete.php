<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
if ($id <= 0) {
    header("Location: tags.php");
    exit;
}

/* hapus relasi produk-tag dulu (aman walau FK sudah ada) */
$stmt1 = mysqli_prepare($conn, "DELETE FROM product_tags WHERE tag_id = ?");
mysqli_stmt_bind_param($stmt1, "i", $id);
mysqli_stmt_execute($stmt1);

/* hapus tag */
$stmt2 = mysqli_prepare($conn, "DELETE FROM tags WHERE id = ?");
mysqli_stmt_bind_param($stmt2, "i", $id);
mysqli_stmt_execute($stmt2);

header("Location: tags.php");
exit;
