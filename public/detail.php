<?php
include_once '../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "Produk tidak ditemukan.";
    exit;
}

$id = $_GET['id'];
$sql = "SELECT produk.*, brand.nama AS nama_brand, kategori.nama AS nama_kategori 
        FROM produk 
        JOIN brand ON produk.brand_id = brand.id 
        JOIN kategori ON produk.kategori_id = kategori.id 
        WHERE produk.id = $id";
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
    <title><?= $data['nama']; ?> - Dstore</title>
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

    <!-- Detail Produk -->
    <div class="max-w-6xl mx-auto p-6 grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
        
        <!-- Gambar Produk -->
        <img src="../assets/img/produk/<?= $data['gambar']; ?>" alt="<?= $data['nama']; ?>" 
             class="w-full h-80 object-cover rounded-xl shadow-md">

        <!-- Info Produk -->
        <div class="space-y-4">
            <h2 class="text-2xl font-bold"><?= $data['nama']; ?></h2>
            <p class="text-gray-500">Brand: <span class="font-medium"><?= $data['nama_brand']; ?></span></p>
            <p class="text-gray-500">Kategori: <span class="font-medium"><?= $data['nama_kategori']; ?></span></p>
            <p class="text-blue-600 font-bold text-xl">Rp <?= number_format($data['harga'], 0, ',', '.'); ?></p>
            <p class="text-gray-700"><?= nl2br($data['deskripsi']); ?></p>

            <!-- Tombol Pesan -->
            <a href="checkout.php?id=<?= $data['id']; ?>"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg mt-4">
                Pesan Sekarang
            </a>
        </div>
    </div>

</body>
</html>
