<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id         = (int) $_POST['id'];
$nama       = mysqli_real_escape_string($db, $_POST['nama']);
$harga      = (int) $_POST['harga'];
$kategori   = (int) $_POST['kategori_id'];
$brand      = (int) $_POST['brand_id'];

// Ambil data produk lama untuk cek gambar lama
$result = mysqli_query($db, "SELECT gambar FROM produk WHERE id = $id");
$produk = mysqli_fetch_assoc($result);
$gambar_lama = $produk['gambar'];

// Cek apakah ada gambar baru diupload
if ($_FILES['gambar']['name'] != '') {
    $gambar     = $_FILES['gambar']['name'];
    $tmp        = $_FILES['gambar']['tmp_name'];
    $ext        = pathinfo($gambar, PATHINFO_EXTENSION);
    $namafile   = uniqid() . '.' . $ext;

    $upload_path = "../assets/img/" . $namafile;

    // Upload gambar baru
    if (move_uploaded_file($tmp, $upload_path)) {
        // Hapus gambar lama
        $gambar_path_lama = "../assets/img/" . $gambar_lama;
        if (file_exists($gambar_path_lama)) {
            unlink($gambar_path_lama);
        }
    } else {
        echo "Gagal upload gambar baru!";
        exit;
    }
} else {
    $namafile = $gambar_lama; // Pakai gambar lama
}

// Update database
$query = "UPDATE produk SET 
            nama_produk = ?, 
            harga = ?, 
            gambar = ?, 
            kategori_id = ?, 
            brand_id = ? 
          WHERE id = ?";

$stmt = mysqli_prepare($db, $query);
mysqli_stmt_bind_param($stmt, "sisiii", $nama, $harga, $namafile, $kategori, $brand, $id);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../admin/produk.php");
    exit;
} else {
    echo "Gagal update produk: " . mysqli_error($db);
}
?>
