<?php
include_once '../config/koneksi.php';

// Ambil data brand dan kategori untuk filter
$brands = mysqli_query($db, "SELECT * FROM brand");
$kategoris = mysqli_query($db, "SELECT * FROM kategori");

// Ambil data produk
$query = "SELECT produk.*, brand.nama AS nama_brand, kategori.nama AS nama_kategori 
          FROM produk
          JOIN brand ON produk.brand_id = brand.id
          JOIN kategori ON produk.kategori_id = kategori.id";

$produk = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-gray-50 text-gray-800">

    <!-- Navbar -->
    <nav class="bg-blue-600 text-white shadow">
        <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <img src="../assets/img/LOgo.png" alt="Logo Dstore" class="w-10 h-10 rounded-full">
                <h1 class="text-xl font-bold">Dstore</h1>
            </div>
        </div>
    </nav>

    <!-- Filter -->
    <section class="max-w-6xl mx-auto px-4 py-6">
        <h2 class="text-xl font-semibold mb-4">Filter Produk</h2>
        <form method="GET" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            <select name="brand" class="p-2 rounded border border-gray-300">
                <option value="">Semua Brand</option>
                <?php while ($b = mysqli_fetch_assoc($brands)) : ?>
                    <option value="<?= $b['id']; ?>"><?= $b['nama']; ?></option>
                <?php endwhile; ?>
            </select>

            <select name="kategori" class="p-2 rounded border border-gray-300">
                <option value="">Semua Kategori</option>
                <?php while ($k = mysqli_fetch_assoc($kategoris)) : ?>
                    <option value="<?= $k['id']; ?>"><?= $k['nama']; ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Terapkan Filter
            </button>
        </form>
    </section>

    <!-- Daftar Produk -->
    <section class="max-w-6xl mx-auto px-4 pb-12">
        <h2 class="text-xl font-semibold mb-4">Produk Terbaru</h2>
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 md:grid-cols-3">
            <?php while ($row = mysqli_fetch_assoc($produk)) : ?>
                <div class="bg-white rounded-xl shadow hover:shadow-md transition overflow-hidden"
                     data-aos="fade-up">
                    <img src="../assets/img/produk/<?= $row['gambar']; ?>" alt="<?= $row['nama']; ?>"
                         class="w-full h-48 object-cover">
                    <div class="p-4 space-y-2">
                        <h3 class="text-lg font-semibold"><?= $row['nama']; ?></h3>
                        <p class="text-sm text-gray-500">Brand: <?= $row['nama_brand']; ?> | Kategori: <?= $row['nama_kategori']; ?></p>
                        <p class="font-bold text-blue-600">Rp <?= number_format($row['harga'], 0, ',', '.'); ?></p>
                        <a href="detail.php?id=<?= $row['id']; ?>" class="block text-center bg-blue-500 hover:bg-blue-600 text-white rounded py-2 mt-2">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>

    <!-- Script Animasi -->
    <script>
        AOS.init({
            duration: 600,
            offset: 100,
        });
    </script>

</body>
</html>
