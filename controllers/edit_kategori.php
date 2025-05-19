<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id = (int) $_POST['id'];
$nama = mysqli_real_escape_string($db, $_POST['nama']);

$query = "UPDATE kategori SET nama = '$nama' WHERE id = $id";
$result = mysqli_query($db, $query);

if ($result) {
    header("Location: ../admin/kategori.php");
    exit;
} else {
    echo "Gagal update kategori: " . mysqli_error($db);
}
?>
