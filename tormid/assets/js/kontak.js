document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("contactForm");
    const notif = document.getElementById("contactNotif");

    if (!form) return;

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        const nama = document.getElementById("nama").value.trim();
        const email = document.getElementById("email").value.trim();
        const pesan = document.getElementById("pesan").value.trim();

        if (nama === "" || email === "" || pesan === "") {
            notif.innerHTML = "<p style='color:red'>Semua field wajib diisi.</p>";
            return;
        }

        notif.innerHTML = "<p>Mengirim pesan...</p>";

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "ajax/simpan_kontak.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onload = function () {
            notif.innerHTML = this.responseText;
            form.reset();
        };

        xhr.send(
            "nama=" + encodeURIComponent(nama) +
            "&email=" + encodeURIComponent(email) +
            "&pesan=" + encodeURIComponent(pesan)
        );
    });
});
