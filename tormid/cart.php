<?php
require_once 'config/auth.php';

$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang - Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include 'partials/header.php'; ?>

<section class="container" style="margin-top:40px">
    <h2>Keranjang Belanja</h2>

    <?php if (empty($cart)): ?>
        <div class="cart-empty">
            <p>Keranjang masih kosong.</p>
            <a href="katalog.php" class="btn">Belanja Sekarang</a>
        </div>
    <?php else: ?>
        <table>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>

            <?php
            $total = 0;
            foreach ($cart as $id => $c):
                $sub = $c['harga'] * $c['qty'];
                $total += $sub;
            ?>
            <tr>
                <td><?= htmlspecialchars($c['nama']) ?></td>
                <td>Rp <?= number_format($c['harga']) ?></td>
                <td><?= $c['qty'] ?></td>
                <td>Rp <?= number_format($sub) ?></td>
                <td>
                    <a href="remove_cart.php?id=<?= $id ?>"
                       onclick="return confirm('Hapus produk ini dari keranjang?')"
                       style="color:red;font-weight:bold">
                       ✕
                    </a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>

        <h3 style="margin-top:20px">
            Total: Rp <?= number_format($total) ?>
        </h3>

        <a href="checkout.php"
           class="btn"
           style="margin-top:15px;display:inline-block">
           Checkout
        </a>
    <?php endif; ?>
</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>
