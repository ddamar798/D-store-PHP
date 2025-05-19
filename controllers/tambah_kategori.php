<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

if (isset($_POST['nama'])) {
    $nama = mysqli_real_escape_string($db, $_POST['nama']);

    $query = "INSERT INTO kategori (nama) VALUES ('$nama')";
    $result = mysqli_query($db, $query);

    if ($result) {
        header("Location: ../admin/kategori.php");
        exit;
    } else {
        echo "Gagal menambahkan kategori: " . mysqli_error($db);
    }
}
?>
