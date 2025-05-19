<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$kode = mysqli_real_escape_string($db, $_POST['kode']);
$deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
$potongan = (int) $_POST['potongan'];
$tanggal = $_POST['tanggal_berlaku'];

$query = "INSERT INTO promo (kode, deskripsi, potongan, tanggal_berlaku)
          VALUES ('$kode', '$deskripsi', $potongan, '$tanggal')";
$result = mysqli_query($db, $query);

if ($result) {
    header("Location: ../admin/promo.php");
    exit;
} else {
    echo "Gagal menambahkan promo: " . mysqli_error($db);
}
?>
