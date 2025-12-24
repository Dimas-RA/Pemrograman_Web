<?php
require_once 'config/auth.php';
require_once 'config/database.php';

// Ambil input
$username = isset($_POST['username']) ? trim($_POST['username']) : '';
$password = isset($_POST['password']) ? $_POST['password'] : '';

// Validasi awal
if ($username === '' || $password === '') {
    header("Location: login.php");
    exit;
}

// Ambil data user berdasarkan username
$stmt = mysqli_prepare(
    $conn,
    "SELECT id, username, password, role FROM users WHERE username = ? LIMIT 1"
);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

// Jika user ditemukan & password cocok
if ($user && password_verify($password, $user['password'])) {

    // Set session login
    $_SESSION['user_id']  = (int) $user['id'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']     = $user['role'];

    // Update status online + last login
    $uid = (int) $user['id'];
    mysqli_query(
        $conn,
        "UPDATE users 
         SET is_online = 1, last_login = NOW() 
         WHERE id = $uid"
    );

    // Redirect sesuai role
    if ($user['role'] === 'admin') {
        header("Location: admin/index.php");
    } else {
        header("Location: index.php");
    }
    exit;
}

// Jika gagal login
echo "<script>
    alert('Username atau password salah!');
    window.location = 'login.php';
</script>";
exit;
