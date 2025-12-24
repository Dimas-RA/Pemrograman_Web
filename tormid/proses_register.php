<?php
require_once 'config/auth.php';
require_once 'config/database.php';

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';
$password_confirm = $_POST['password_confirm'] ?? '';

// Validasi
if ($username === '' || $password === '' || $password_confirm === '') {
    echo "<script>alert('Semua field wajib diisi');window.location='register.php';</script>";
    exit;
}

if ($password !== $password_confirm) {
    echo "<script>alert('Password tidak sama');window.location='register.php';</script>";
    exit;
}

// Cek username sudah ada?
$stmt = mysqli_prepare($conn, "SELECT id FROM users WHERE username = ?");
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('Username sudah digunakan');window.location='register.php';</script>";
    exit;
}

// Hash password
$hash = password_hash($password, PASSWORD_DEFAULT);

// Insert user (role USER)
$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')"
);
mysqli_stmt_bind_param($stmt, "ss", $username, $hash);
mysqli_stmt_execute($stmt);

// Redirect ke login
echo "<script>
    alert('Pendaftaran berhasil, silakan login');
    window.location='login.php';
</script>";
exit;
