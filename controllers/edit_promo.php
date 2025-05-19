<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id = (int) $_POST['id'];
$kode = mysqli_real_escape_string($db, $_POST['kode']);
$deskripsi = mysqli_real_escape_string($db, $_POST['deskripsi']);
$potongan = (int) $_POST['potongan'];
$tanggal = $_POST['tanggal_berlaku'];

$query = "UPDATE promo SET kode='$kode', deskripsi='$deskripsi', potongan=$potongan, tanggal_berlaku='$tanggal'
          WHERE id = $id";
$result = mysqli_query($db, $query);

if ($result) {
    header("Location: ../admin/promo.php");
    exit;
} else {
    echo "Gagal update promo: " . mysqli_error($db);
}
?>
