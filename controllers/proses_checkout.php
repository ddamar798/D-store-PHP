<?php
include '../includes/koneksi.php';

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$alamat   = $_POST['alamat'];
$no_hp    = $_POST['no_hp'];
$produk_id = $_POST['produk_id'];
$qty      = $_POST['qty'];
$total    = $_POST['total_harga'] * $qty;

$query = "INSERT INTO checkout (nama, email, alamat, no_hp, produk_id, qty, total_harga) 
          VALUES ('$nama', '$email', '$alamat', '$no_hp', '$produk_id', '$qty', '$total')";

if(mysqli_query($koneksi, $query)) {
    echo "<script>alert('Checkout berhasil!'); window.location.href='../public/index.php';</script>";
} else {
    echo "<script>alert('Checkout gagal!'); window.history.back();</script>";
}
