<?php
require_once 'config/auth.php';
require_once 'config/database.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tentang Kami - Torm.ID</title>
    <link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include 'partials/header.php'; ?>
<section class="about-hero">

  <div class="about-slides">
    <div class="about-slide active">
      <img src="assets/images/banner/about-1.jpg">
    </div>
    <div class="about-slide">
      <img src="assets/images/banner/about-2.jpg">
    </div>
    <div class="about-slide">
      <img src="assets/images/banner/about-3.jpg">
    </div>
  </div>

  <div class="hero-overlay">
    <h1>Tentang Torm.ID</h1>
    <p>
      Platform teknologi modern untuk kebutuhan gaming,
      produktivitas, dan masa depan digital.
    </p>
  </div>

</section>

<section class="container" style="margin-top:30px">
  <div class="page-grid">

    <aside class="page-side">
      <div class="card" style="overflow:hidden">
        <img src="assets/images/banner/about.jpg"
             onerror="this.src='assets/images/no-image/no-image.png'"
             style="width:100%;height:220px;object-fit:cover;display:block">
      </div>

      <div class="card card-pad" style="margin-top:14px">
        <h3 class="card-title">Kontak Cepat</h3>
        <p class="card-sub">Butuh bantuan? Hubungi tim kami.</p>
        <div style="margin-top:12px;color:#111827;font-weight:800;line-height:1.8">
          <div>📞 0812-9700-9800</div>
          <div>✉️ sales@tormid.id</div>
        </div>
      </div>
    </aside>

    <main>
      <div class="card card-pad">
        <h2 style="margin-bottom:10px">Tentang Kami</h2>
        <p style="color:#374151;line-height:1.8">
          Torm.ID adalah platform jual beli komputer dan laptop yang menyediakan
          produk berkualitas dengan harga terbaik serta pelayanan profesional.
        </p>
      </div>

      <div class="card card-pad" style="margin-top:14px">
        <h2 style="margin-bottom:10px">Hubungi Kami</h2>

        <form id="contactForm">
          <label>Nama</label>
          <input type="text" id="nama" placeholder="Nama Anda">

          <label>Email</label>
          <input type="email" id="email" placeholder="Email Anda">

          <label>Pesan</label>
          <textarea id="pesan" rows="4" placeholder="Pesan Anda"></textarea>

          <button class="btn" type="submit" style="margin-top:14px">Kirim</button>
        </form>

        <div id="contactNotif" style="margin-top:15px"></div>
      </div>
    </main>

  </div>
</section>

<?php include 'partials/footer.php'; ?>

<script src="assets/js/kontak.js"></script>
<script>
  const slides = document.querySelectorAll('.about-slide');
  let index = 0;

  setInterval(() => {
    slides[index].classList.remove('active');
    index = (index + 1) % slides.length;
    slides[index].classList.add('active');
  }, 10000); // 10 detik
</script>

</body>
</html>
