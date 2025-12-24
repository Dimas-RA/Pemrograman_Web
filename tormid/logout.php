<?php
require_once 'config/auth.php';
require_once 'config/database.php';

// Jika user sedang login, set status offline
if (isset($_SESSION['user_id'])) {
    $uid = (int) $_SESSION['user_id'];
    mysqli_query($conn, "UPDATE users SET is_online = 0 WHERE id = $uid");
}

// Hapus semua session
session_unset();
session_destroy();

// Redirect ke login
header("Location: login.php");
exit;
