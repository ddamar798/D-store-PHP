<?php
session_start();
include_once '../config/koneksi.php';

$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-700 text-white p-4">
        <div class="max-w-6xl mx-auto flex items-center gap-3">
            <img src="../assets/img/LOgo.png" class="w-10 h-10 rounded-full" alt="Logo">
            <h1 class="text-xl font-bold">Dstore</h1>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto bg-white shadow-md rounded-xl p-6 mt-6">
        <h2 class="text-2xl font-bold mb-6">Keranjang Belanja</h2>

        <?php if (empty($keranjang)) : ?>
            <p class="text-center text-gray-500">Keranjang masih kosong.</p>
        <?php else : ?>
            <table class="w-full border mb-6">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2">Produk</th>
                        <th class="p-2">Harga</th>
                        <th class="p-2">Jumlah</th>
                        <th class="p-2">Subtotal</th>
                        <th class="p-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $total = 0; foreach ($keranjang as $item) : 
                        $subtotal = $item['harga'] * $item['qty'];
                        $total += $subtotal;
                    ?>
                    <tr class="border-t">
                        <td class="p-2 flex items-center gap-3">
                            <img src="../assets/img/<?= htmlspecialchars($item['gambar']); ?>" class="w-12 h-12 object-cover rounded">
                            <?= htmlspecialchars($item['nama']); ?>
                        </td>
                        <td class="p-2">Rp<?= number_format($item['harga'], 0, ',', '.'); ?></td>
                        <td class="p-2"><?= $item['qty']; ?></td>
                        <td class="p-2">Rp<?= number_format($subtotal, 0, ',', '.'); ?></td>
                        <td class="p-2">
                            <a href="hapus_keranjang.php?id=<?= $item['id']; ?>" class="text-red-600 hover:underline">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="text-right font-bold text-lg">
                Total: Rp<?= number_format($total, 0, ',', '.'); ?>
            </div>

            <div class="mt-4 text-right">
                <a href="checkout.php?id=<?= reset($keranjang)['id']; ?>" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded">Checkout</a>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
