<?php
include_once '../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "Produk tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT * FROM produk WHERE id = $id";
$result = mysqli_query($db, $sql);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Produk tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Checkout - <?= $data['nama']; ?> | Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center gap-3">
            <img src="../assets/img/LOgo.png" alt="Logo Dstore" class="w-10 h-10 rounded-full">
            <h1 class="text-xl font-bold">Dstore</h1>
        </div>
    </nav>

    <div class="max-w-2xl mx-auto p-6 mt-6 bg-white rounded-xl shadow-md">

        <!-- Ringkasan Produk -->
        <div class="flex items-center gap-4 mb-6">
            <img src="../assets/img/produk/<?= $data['gambar']; ?>" alt="<?= $data['nama']; ?>" class="w-20 h-20 rounded-md object-cover">
            <div>
                <h2 class="text-xl font-bold"><?= $data['nama']; ?></h2>
                <p class="text-blue-600 font-semibold">Rp <?= number_format($data['harga'], 0, ',', '.'); ?></p>
            </div>
        </div>

        <!-- Form Pemesanan -->
        <form action="../controllers/proses_checkout.php" method="POST" class="space-y-4">
            <input type="hidden" name="produk_id" value="<?= $data['id']; ?>">

            <div>
                <label class="block font-semibold">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold">No. HP</label>
                <input type="text" name="no_hp" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div>
                <label class="block font-semibold">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" required class="w-full border rounded-lg px-3 py-2"></textarea>
            </div>

            <div>
                <label class="block font-semibold">Catatan Tambahan (Opsional)</label>
                <input type="text" name="catatan" class="w-full border rounded-lg px-3 py-2">
            </div>

            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 rounded-lg font-semibold">
                Pesan Sekarang
            </button>
        </form>
    </div>

</body>
</html>
