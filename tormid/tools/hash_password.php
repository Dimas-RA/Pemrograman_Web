<?php
// tools/hash_password.php
// Cara pakai: buka http://localhost/tormid/tools/hash_password.php
// lalu copy hasil hash-nya ke phpMyAdmin.

echo "<pre>";
echo "Hash untuk 'admin123':\n";
echo password_hash("admin123", PASSWORD_DEFAULT);
echo "\n\nHash untuk 'user123':\n";
echo password_hash("user123", PASSWORD_DEFAULT);
echo "</pre>";
