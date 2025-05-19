<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id = (int) $_POST['id'];
$nama = mysqli_real_escape_string($db, $_POST['nama']);

$query = "UPDATE brand SET nama = '$nama' WHERE id = $id";
$result = mysqli_query($db, $query);

if ($result) {
    header("Location: ../admin/brand.php");
    exit;
} else {
    echo "Gagal update brand: " . mysqli_error($db);
}
?>
