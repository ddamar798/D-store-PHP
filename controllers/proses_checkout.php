<?php
include '../config/koneksi.php';
session_start();

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$alamat   = $_POST['alamat'];
$no_hp    = $_POST['no_hp'];
$produk_id = $_POST['produk_id'];
$qty      = $_POST['qty'];
$harga    = $_POST['harga'];
$total    = $harga * $qty;

$query = "INSERT INTO checkout (nama, email, alamat, no_hp, produk_id, qty, total_harga) 
          VALUES ('$nama', '$email', '$alamat', '$no_hp', '$produk_id', '$qty', '$total')";

if(mysqli_query($db, $query)) {
    // kosongkan keranjang
    unset($_SESSION['keranjang']);

    echo "<script>
        alert('Checkout berhasil! Terima kasih telah berbelanja di Dstore.');
        window.location.href = '../public/index.php';
    </script>";
} else {
    echo "<script>
        alert('Checkout gagal. Silakan coba lagi.');
        window.history.back();
    </script>";
}
