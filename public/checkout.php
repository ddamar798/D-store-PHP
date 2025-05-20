<?php
include '../includes/koneksi.php';

$id = $_GET['id'];
$produk = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = $id");
$data = mysqli_fetch_assoc($produk);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">Checkout Produk</h2>

        <form action="../controllers/proses_checkout.php" method="POST">
            <input type="hidden" name="produk_id" value="<?= $data['id']; ?>">
            <input type="hidden" name="total_harga" value="<?= $data['harga']; ?>">

            <div class="mb-4">
                <label class="block font-medium">Nama</label>
                <input type="text" name="nama" required class="w-full border p-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Email</label>
                <input type="email" name="email" required class="w-full border p-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block font-medium">No. HP</label>
                <input type="text" name="no_hp" required class="w-full border p-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block font-medium">Alamat</label>
                <textarea name="alamat" required class="w-full border p-2 rounded-lg"></textarea>
            </div>

            <div class="mb-4">
                <label class="block font-medium">Jumlah</label>
                <input type="number" name="qty" value="1" min="1" required class="w-full border p-2 rounded-lg">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 rounded-lg">
                Bayar Sekarang
            </button>
        </form>
    </div>
</body>
</html>
