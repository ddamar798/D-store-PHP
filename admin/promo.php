<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$promo = mysqli_query($db, "SELECT * FROM promo ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kelola Promo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Kode Promo</h1>

    <a href="tambah_promo.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg mb-4 inline-block">
        + Tambah Promo
    </a>

    <table class="w-full bg-white rounded-lg shadow p-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-2">Kode</th>
                <th class="p-2">Deskripsi</th>
                <th class="p-2">Potongan (%)</th>
                <th class="p-2">Berlaku Sampai</th>
                <th class="p-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while($row = mysqli_fetch_assoc($promo)) : ?>
            <tr class="border-b">
                <td class="p-2"><?= htmlspecialchars($row['kode']); ?></td>
                <td class="p-2"><?= htmlspecialchars($row['deskripsi']); ?></td>
                <td class="p-2"><?= $row['potongan']; ?>%</td>
                <td class="p-2"><?= $row['tanggal_berlaku']; ?></td>
                <td class="p-2">
                    <a href="edit_promo.php?id=<?= $row['id']; ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded mr-2">Edit</a>
                    <a href="../controllers/hapus_promo.php?id=<?= $row['id']; ?>"
                       onclick="return confirm('Yakin ingin menghapus promo ini?')"
                       class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Hapus</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>
