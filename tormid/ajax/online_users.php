<?php
require_once '../config/auth.php';
require_once '../config/database.php';

// hanya admin yang boleh akses
if (!is_admin()) {
    http_response_code(403);
    exit('Forbidden');
}

$result = mysqli_query(
    $conn,
    "SELECT username FROM users WHERE is_online = 1 ORDER BY username ASC"
);

if (mysqli_num_rows($result) === 0) {
    echo "<p>Tidak ada user online</p>";
    exit;
}

echo "<ul>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<li>" . htmlspecialchars($row['username']) . "</li>";
}
echo "</ul>";
