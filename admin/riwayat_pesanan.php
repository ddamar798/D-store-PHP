<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/koneksi.php';

$query = "SELECT checkout.*, produk.nama_produk FROM checkout 
          JOIN produk ON checkout.produk_id = produk.id
          ORDER BY checkout.tanggal_checkout DESC";
$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Pesanan - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="max-w-6xl mx-auto mt-8 bg-white p-6 rounded-xl shadow">
        <h1 class="text-2xl font-bold mb-6 text-center">Riwayat Pesanan</h1>

        <table class="w-full border border-gray-300 text-sm">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">Produk</th>
                    <th class="p-2 border">Jumlah</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($row = mysqli_fetch_assoc($result)) : ?>
                <tr class="border-t">
                    <td class="p-2 border"><?= $no++; ?></td>
                    <td class="p-2 border"><?= htmlspecialchars($row['nama']); ?></td>
                    <td class="p-2 border"><?= htmlspecialchars($row['email']); ?></td>
                    <td class="p-2 border"><?= htmlspecialchars($row['nama_produk']); ?></td>
                    <td class="p-2 border"><?= $row['qty']; ?></td>
                    <td class="p-2 border">Rp<?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                    <td class="p-2 border"><?= $row['tanggal_checkout']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="text-center mt-6">
            <a href="dashboard.php" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
