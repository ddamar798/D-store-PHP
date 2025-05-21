<?php
session_start();
include_once '../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID produk tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM produk WHERE id = $id";
$result = mysqli_query($db, $query);
$produk = mysqli_fetch_assoc($result);

if (!$produk) {
    echo "Produk tidak ditemukan di database.";
    exit;
}

// Buat session keranjang jika belum ada
if (!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang'] = [];
}

// Jika produk sudah ada di keranjang, tambah jumlah
if (isset($_SESSION['keranjang'][$id])) {
    $_SESSION['keranjang'][$id]['qty']++;
} else {
    $_SESSION['keranjang'][$id] = [
        'id' => $produk['id'],
        'nama' => $produk['nama_produk'],
        'harga' => $produk['harga'],
        'gambar' => $produk['gambar'],
        'qty' => 1
    ];
}

// Redirect ke halaman keranjang
header("Location: keranjang.php");
exit;
