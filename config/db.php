<?php
// config/db.php | FILE INI WAJIB DI INCLUDE (include_once 'config/db.php';) DI SETIAP FILE YANG MEMBUTUHKAN AKSES DATABASE.

// Setting koneksi database
$host     = "localhost";
$user     = "root";         // default di Laragon/XAMPP
$password = "";             // kosong kalau tidak ada password
$database = "dstore";       // nama database yang tadi Anda import

// Membuat koneksi
$db = mysqli_connect($host, $user, $password, $database);

// Cek koneksi berhasil atau tidak
if (!$db) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
?>
