<?php
require_once 'config/auth.php';
require_once 'config/database.php';

require_login();

$user_id  = $_SESSION['user_id'];
$username = trim($_POST['username']);
$about    = trim($_POST['about']);

/* Cek username unik (kecuali milik sendiri) */
$stmt = mysqli_prepare(
    $conn,
    "SELECT id FROM users WHERE username = ? AND id != ?"
);
mysqli_stmt_bind_param($stmt, "si", $username, $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username sudah digunakan');history.back();</script>";
    exit;
}

/* Handle upload foto */
$photo_name = null;

if (!empty($_FILES['profile_photo']['name'])) {

    $allowed = ['jpg', 'jpeg', 'png'];
    $ext = strtolower(pathinfo($_FILES['profile_photo']['name'], PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        echo "<script>alert('Format foto harus JPG atau PNG');history.back();</script>";
        exit;
    }

    $photo_name = "user_" . $user_id . "_" . time() . "." . $ext;
    $target = "assets/images/profile/" . $photo_name;

    if (!move_uploaded_file($_FILES['profile_photo']['tmp_name'], $target)) {
        echo "<script>alert('Gagal upload foto');history.back();</script>";
        exit;
    }
}

/* Update data */
if ($photo_name) {
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET username = ?, about = ?, profile_photo = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "sssi", $username, $about, $photo_name, $user_id);
} else {
    $stmt = mysqli_prepare(
        $conn,
        "UPDATE users SET username = ?, about = ? WHERE id = ?"
    );
    mysqli_stmt_bind_param($stmt, "ssi", $username, $about, $user_id);
}

mysqli_stmt_execute($stmt);

/* Update session username */
$_SESSION['username'] = $username;

echo "<script>alert('Profil berhasil diperbarui');location='profile.php';</script>";
