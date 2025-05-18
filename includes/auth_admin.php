<?php
// Harus dipanggil setelah session_start()

if (!isset($_SESSION['admin'])) {
    
    // Admin belum login, arahkan ke halaman login
    header("Location: login.php?error=Silakan login terlebih dahulu!");
    exit;
}

/* 
Fungsi :
 Cek apakah admin sudah login.
 Kalau belum login, langsung arahkan ke halaman login (login.php). 

 Cara Pakai Script ini :
 Di setiap file admin (selain login.php), cukup tambahkan ini setelah session_start();
 [ include_once '../includes/auth_admin.php'; ]

 */


?>
