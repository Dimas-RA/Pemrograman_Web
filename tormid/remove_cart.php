<?php
require_once 'config/auth.php';

// Pastikan user login
if (!is_logged_in()) {
    header("Location: login.php");
    exit;
}

$id = (int) ($_GET['id'] ?? 0);

if ($id > 0 && isset($_SESSION['cart'][$id])) {
    unset($_SESSION['cart'][$id]);
}

// Kalau keranjang kosong, hapus session cart
if (empty($_SESSION['cart'])) {
    unset($_SESSION['cart']);
}

header("Location: cart.php");
exit;
