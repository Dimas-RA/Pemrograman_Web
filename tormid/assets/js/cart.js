// ================= CART INTERACTION (DUMMY UAS) =================
document.addEventListener("DOMContentLoaded", function () {

  /* ================== VOUCHER CHECK ================== */
  const voucherInput = document.querySelector("input[name='voucher']");
  const totalText = document.getElementById("totalBayar");

  if (voucherInput) {
    voucherInput.addEventListener("keyup", function () {
      const voucher = voucherInput.value.trim().toUpperCase();

      let diskon = 0;
      if (voucher === "HEMAT10") {
        diskon = 10000;
      }

      const subtotal = parseInt(document.getElementById("subtotal").dataset.value);
      const ongkir = parseInt(document.getElementById("ongkir").dataset.value);

      const total = subtotal + ongkir - diskon;
      totalText.innerText = "Rp " + total.toLocaleString("id-ID");
    });
  }

  /* ================== ADD TO CART FEEDBACK ================== */
  const addButtons = document.querySelectorAll(".produk-card form");

  addButtons.forEach(form => {
    form.addEventListener("submit", function () {
      alert("Produk ditambahkan ke keranjang");
    });
  });

});
