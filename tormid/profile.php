<?php
require_once 'config/auth.php';
require_once 'config/database.php';

require_login();

$user_id = $_SESSION['user_id'];

/* Ambil data user */
$stmt = mysqli_prepare(
    $conn,
    "SELECT username, profile_photo, about FROM users WHERE id = ?"
);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$user = mysqli_stmt_get_result($stmt)->fetch_assoc();

$photo = $user['profile_photo']
    ? "assets/images/profile/" . $user['profile_photo']
    : "assets/images/no-image/no-image.png";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Profil Saya - Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include 'partials/header.php'; ?>

<section class="container" style="margin-top:40px; max-width:600px">

    <h2>Profil Saya</h2>

    <div style="text-align:center; margin-bottom:20px">
        <img src="<?= $photo ?>"
             style="width:120px;height:120px;border-radius:50%;object-fit:cover">
    </div>

    <form method="POST" action="proses_profile.php" enctype="multipart/form-data">

        <label>Username</label>
        <input type="text" name="username"
               value="<?= htmlspecialchars($user['username']) ?>"
               required>

        <label>Foto Profil</label>
        <input type="file" name="profile_photo" accept="image/*">

        <label>About Me</label>
        <textarea name="about" rows="4"
                  placeholder="Ceritakan tentang dirimu..."><?= htmlspecialchars($user['about']) ?></textarea>

        <button class="btn" style="margin-top:15px">Simpan Perubahan</button>
    </form>

</section>

<?php include 'partials/footer.php'; ?>
</body>
</html>
