<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id = (int) $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM promo WHERE id = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Promo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Promo</h1>

    <form action="../controllers/edit_promo.php" method="POST" class="bg-white p-4 rounded shadow w-full max-w-lg">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <label class="block mb-2">Kode Promo:</label>
        <input type="text" name="kode" required value="<?= $data['kode']; ?>" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Deskripsi:</label>
        <input type="text" name="deskripsi" required value="<?= $data['deskripsi']; ?>" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Potongan (%):</label>
        <input type="number" name="potongan" min="1" max="100" required value="<?= $data['potongan']; ?>" class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Tanggal Berlaku:</label>
        <input type="date" name="tanggal_berlaku" required value="<?= $data['tanggal_berlaku']; ?>" class="w-full p-2 border rounded mb-4">

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
            Update
        </button>
    </form>
</body>
</html>
