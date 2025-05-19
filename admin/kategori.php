<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$kategori = mysqli_query($db, "SELECT * FROM kategori ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Kategori</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Kategori</h1>

    <a href="tambah_kategori.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">
        + Tambah Kategori
    </a>

    <table class="w-full bg-white rounded-lg shadow p-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2 text-left">No</th>
                <th class="p-2 text-left">Nama Kategori</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; while($row = mysqli_fetch_assoc($kategori)) : ?>
            <tr class="border-b">
                <td class="p-2"><?= $no++; ?></td>
                <td class="p-2"><?= htmlspecialchars($row['nama']); ?></td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
