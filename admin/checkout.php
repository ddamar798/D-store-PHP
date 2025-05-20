<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../includes/koneksi.php';

$query = "SELECT checkout.*, produk.nama_produk FROM checkout 
          JOIN produk ON checkout.produk_id = produk.id
          ORDER BY checkout.tanggal_checkout DESC";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Checkout - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-6xl mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">Data Checkout Pengguna</h1>

        <table class="w-full border border-gray-300">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="p-2 border">No</th>
                    <th class="p-2 border">Nama</th>
                    <th class="p-2 border">Email</th>
                    <th class="p-2 border">No HP</th>
                    <th class="p-2 border">Alamat</th>
                    <th class="p-2 border">Produk</th>
                    <th class="p-2 border">Qty</th>
                    <th class="p-2 border">Total</th>
                    <th class="p-2 border">Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; while($row = mysqli_fetch_assoc($result)): ?>
                    <tr class="border-t">
                        <td class="p-2 border"><?= $no++; ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($row['nama']); ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($row['email']); ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($row['no_hp']); ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($row['alamat']); ?></td>
                        <td class="p-2 border"><?= htmlspecialchars($row['nama_produk']); ?></td>
                        <td class="p-2 border"><?= $row['qty']; ?></td>
                        <td class="p-2 border">Rp<?= number_format($row['total_harga'], 0, ',', '.'); ?></td>
                        <td class="p-2 border"><?= $row['tanggal_checkout']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <div class="mt-6 text-center">
            <a href="dashboard.php" class="inline-block bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">Kembali ke Dashboard</a>
        </div>
    </div>
</body>
</html>
