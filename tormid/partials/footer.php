<?php
$isAdminPath = (strpos($_SERVER['PHP_SELF'], '/admin/') !== false);
$base = $isAdminPath ? '../' : '';
?>
<footer class="footer">
  <div class="container footer-grid">
    <div>
      <h4>Torm.ID</h4>
      <p>Platform jual beli laptop & PC terpercaya.</p>
    </div>

    <div>
      <h4>Akun</h4>
      <ul>
        <li><a href="<?= $base ?>login.php">Login</a></li>
        <li><a href="<?= $base ?>about.php">Kontak</a></li>
      </ul>
    </div>

    <div>
      <h4>Bantuan</h4>
      <ul>
        <li>FAQ</li>
        <li>Kebijakan</li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
    © 2025 Torm.ID – All Rights Reserved
  </div>
</footer>
