<?php
include_once '../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "Produk tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$query = "SELECT * FROM produk WHERE id = $id";
$result = mysqli_query($db, $query);
$produk = mysqli_fetch_assoc($result);

if (!$produk) {
    echo "Produk tidak tersedia.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - <?= htmlspecialchars($produk['nama_produk']) ?> | Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <nav class="bg-blue-700 text-white p-4">
        <div class="max-w-6xl mx-auto flex items-center gap-3">
            <img src="../assets/img/LOgo.png" class="w-10 h-10 rounded-full" alt="Logo">
            <h1 class="text-xl font-bold">Dstore</h1>
        </div>
    </nav>

    <main class="max-w-2xl mx-auto bg-white shadow-md rounded-xl p-6 mt-6">
        <h2 class="text-2xl font-bold mb-4">Checkout Produk</h2>

        <div class="flex items-center gap-4 mb-6">
            <img src="../assets/img/<?= htmlspecialchars($produk['gambar']) ?>" class="w-24 h-24 object-cover rounded-md">
            <div>
                <h3 class="text-lg font-bold"><?= htmlspecialchars($produk['nama_produk']) ?></h3>
                <p class="text-blue-600 font-semibold">Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>
            </div>
        </div>

        <form action="../controllers/proses_checkout.php" method="POST" class="space-y-4">
            <input type="hidden" name="produk_id" value="<?= $produk['id']; ?>">
            <input type="hidden" name="harga" value="<?= $produk['harga']; ?>">

            <div>
                <label class="block font-medium">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Email</label>
                <input type="email" name="email" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">No. HP</label>
                <input type="text" name="no_hp" required class="w-full border px-3 py-2 rounded">
            </div>

            <div>
                <label class="block font-medium">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" required class="w-full border px-3 py-2 rounded"></textarea>
            </div>

            <div>
                <label class="block font-medium">Jumlah</label>
                <input type="number" name="qty" value="1" min="1" required class="w-full border px-3 py-2 rounded">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 rounded font-semibold">
                Pesan Sekarang
            </button>
        </form>
    </main>
</body>
</html>
