// assets/js/realtime.js

function loadOnlineUsers() {
    fetch("../ajax/online_users.php")
        .then(response => response.text())
        .then(html => {
            document.getElementById("online-users").innerHTML = html;
        })
        .catch(err => {
            console.error("Gagal load user online", err);
        });
}

// load pertama
loadOnlineUsers();

// refresh tiap 5 detik
setInterval(loadOnlineUsers, 5000);
