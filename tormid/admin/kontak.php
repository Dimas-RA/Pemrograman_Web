<?php
require_once '../config/auth.php';
require_once '../config/database.php';

// Proteksi admin
require_admin();

// Ambil data kontak
$data = mysqli_query($conn, "SELECT * FROM contacts ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kontak - Admin | Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<!-- ===== DATA KONTAK ADMIN ===== -->
<section class="container" style="margin-top:40px">

    <h2>Data Pesan Masuk</h2>
    <p>Berikut adalah pesan yang dikirim melalui form kontak.</p>

    <div style="overflow-x:auto; margin-top:20px">
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Pesan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($data) > 0): ?>
                    <?php while ($c = mysqli_fetch_assoc($data)) : ?>
                        <tr>
                            <td><?= htmlspecialchars($c['nama']) ?></td>
                            <td><?= htmlspecialchars($c['email']) ?></td>
                            <td><?= htmlspecialchars($c['pesan']) ?></td>
                            <td><?= htmlspecialchars($c['created_at']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" style="text-align:center">
                            Belum ada pesan masuk.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

        <div style="margin-top:20px">
            <a href="index.php" class="btn" style="background:#6b7280">
                ← Kembali ke Dashboard
            </a>
        </div>
</section>

<?php include '../partials/footer.php'; ?>

</body>
</html>
