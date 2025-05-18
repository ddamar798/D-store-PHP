<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

// Ambil data dari form
$nama       = mysqli_real_escape_string($db, $_POST['nama']);
$harga      = (int) $_POST['harga'];
$kategori   = (int) $_POST['kategori_id'];
$brand      = (int) $_POST['brand_id'];

// Cek & upload gambar
$gambar     = $_FILES['gambar']['name'];
$tmp        = $_FILES['gambar']['tmp_name'];
$ext        = pathinfo($gambar, PATHINFO_EXTENSION);
$namafile   = uniqid() . '.' . $ext; // Nama unik biar tidak bentrok

$upload_dir = "../assets/img/";
$upload_path = $upload_dir . $namafile;

if (move_uploaded_file($tmp, $upload_path)) {

    // Simpan data ke database
    $query = "INSERT INTO produk (nama_produk, harga, gambar, kategori_id, brand_id)
              VALUES (?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "sisii", $nama, $harga, $namafile, $kategori, $brand);

    if (mysqli_stmt_execute($stmt)) {
        header("Location: ../admin/produk.php");
        exit;
    } else {
        echo "Gagal menyimpan ke database: " . mysqli_error($db);
    }

} else {
    echo "Gagal mengupload gambar!";
}
?>
