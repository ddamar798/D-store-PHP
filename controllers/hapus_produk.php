<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    // Ambil nama file gambar dulu
    $query = mysqli_query($db, "SELECT gambar FROM produk WHERE id = $id");
    $produk = mysqli_fetch_assoc($query);

    if ($produk) {
        $gambar_path = "../assets/img/" . $produk['gambar'];

        // Hapus file gambar jika ada
        if (file_exists($gambar_path)) {
            unlink($gambar_path);
        }

        // Hapus data dari database
        mysqli_query($db, "DELETE FROM produk WHERE id = $id");

        header("Location: ../admin/produk.php");
        exit;
    } else {
        echo "Produk tidak ditemukan.";
    }
} else {
    echo "ID tidak valid.";
}
?>
