<?php
require_once 'config/auth.php';
require_once 'config/database.php';

if (!is_logged_in()) {
    echo "<script>alert('Silakan login terlebih dahulu');location='login.php';</script>";
    exit;
}

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$id = (int)$_POST['product_id'];

$q = mysqli_query($conn, "SELECT id, nama_produk, harga FROM products WHERE id = $id");
$p = mysqli_fetch_assoc($q);

if (!$p) {
    header("Location: katalog.php");
    exit;
}

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['qty']++;
} else {
    $_SESSION['cart'][$id] = [
        'nama' => $p['nama_produk'],
        'harga' => $p['harga'],
        'qty' => 1
    ];
}

header("Location: cart.php");
exit;
