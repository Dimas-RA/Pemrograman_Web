<?php
require_once '../config/database.php';

$nama  = trim($_POST['nama'] ?? '');
$email = trim($_POST['email'] ?? '');
$pesan = trim($_POST['pesan'] ?? '');

if ($nama === '' || $email === '' || $pesan === '') {
    echo "<p style='color:red'>Semua field wajib diisi.</p>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<p style='color:red'>Email tidak valid.</p>";
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "INSERT INTO contacts (nama, email, pesan) VALUES (?, ?, ?)"
);
mysqli_stmt_bind_param($stmt, "sss", $nama, $email, $pesan);
mysqli_stmt_execute($stmt);

echo "<p style='color:green'>Pesan berhasil dikirim 👍</p>";
