<?php
include_once '../config/koneksi.php';

$query = "
    SELECT produk.*, 
           brands.nama AS nama_brand, 
           kategori.nama AS nama_kategori 
    FROM produk 
    LEFT JOIN brands ON produk.brand_id = brands.id 
    LEFT JOIN kategori ON produk.kategori_id = kategori.id
";

$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-blue-700 p-4 flex items-center justify-between text-white">
        <div class="flex items-center gap-3">
            <img src="../assets/img/LOgo.png" alt="Logo" class="h-10 w-10 rounded-full">
            <h1 class="text-xl font-bold">Dstore</h1>
        </div>
    </nav>

    <!-- Judul -->
    <div class="max-w-6xl mx-auto px-4 py-6 text-center">
        <h2 class="text-2xl font-bold">Sepatu Terkece Sedunia 100% Orii</h2>
    </div>

    <!-- Daftar Produk -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 pb-10">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="bg-white shadow-md rounded-xl overflow-hidden transform transition duration-300 hover:-translate-y-1">
                <img src="../assets/img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>" class="w-full h-52 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-1"><?= htmlspecialchars($row['nama_produk']) ?></h3>
                    <p class="text-sm text-gray-500 mb-1">Brand: <?= htmlspecialchars($row['nama_brand']) ?></p>
                    <p class="text-sm text-gray-500 mb-1">Kategori: <?= htmlspecialchars($row['nama_kategori']) ?></p>
                    <p class="text-blue-600 font-semibold">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
