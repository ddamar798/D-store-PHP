<?php
include_once '../config/koneksi.php';
session_start();

// Hitung total item di keranjang
$total_item = 0;
if (isset($_SESSION['keranjang'])) {
    foreach ($_SESSION['keranjang'] as $item) {
        $total_item += $item['qty'];
    }
}

// Ambil data brand dan kategori untuk filter
$brands = mysqli_query($db, "SELECT * FROM brands");
$kategoris = mysqli_query($db, "SELECT * FROM kategori");

// Proses filter jika ada input
$where = [];
if (!empty($_GET['brand'])) {
    $brand = intval($_GET['brand']);
    $where[] = "produk.brand_id = $brand";
}
if (!empty($_GET['kategori'])) {
    $kategori = intval($_GET['kategori']);
    $where[] = "produk.kategori_id = $kategori";
}

$where_sql = $where ? "WHERE " . implode(" AND ", $where) : "";

// Query produk
$query = "
    SELECT produk.*, 
           brands.nama AS nama_brand, 
           kategori.nama AS nama_kategori 
    FROM produk 
    LEFT JOIN brands ON produk.brand_id = brands.id 
    LEFT JOIN kategori ON produk.kategori_id = kategori.id
    $where_sql
";

$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <script>
        // Theme toggle
        function toggleTheme() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
    </script> -->
</head>
<body class="bg-gray-100 white:bg-gray-900 text-black-800 dark:text-black-100">
    <!-- Navbar -->
    <nav class="bg-blue-700 dark:bg-cyant-900 p-4 flex items-center justify-between text-white">
        <div class="flex items-center gap-3">
            <img src="../assets/img/LOgo.png" alt="Logo" class="h-10 w-10 rounded-full">
            <h1 class="text-xl font-bold">D`store</h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="keranjang.php" class="relative px-3 py-1 bg-white text-blue-700 rounded text-sm font-medium">
                🛒 Keranjang
                <?php if ($total_item > 0): ?>
                    <span class="absolute -top-1 -right-1 bg-red-600 text-white text-xs px-1 rounded-full">
                        <?= $total_item; ?>
                    </span>
                <?php endif; ?>
            </a>
            <button onclick="toggleTheme()" class="bg-white text-blue-700 px-3 py-1 rounded text-sm">🌓</button>
        </div>
    </nav>

    <!-- Filter Bar -->
    <div class="max-w-7xl mx-auto px-4 py-6">
        <form method="GET" class="flex flex-wrap gap-4 justify-start">
            <select name="brand" class="px-3 py-2 border rounded-lg">
                <option value="">Semua Brand</option>
                <?php mysqli_data_seek($brands, 0); while($b = mysqli_fetch_assoc($brands)) : ?>
                    <option value="<?= $b['id']; ?>" <?= (isset($_GET['brand']) && $_GET['brand'] == $b['id']) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($b['nama']); ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <select name="kategori" class="px-3 py-2 border rounded-lg">
                <option value="">Semua Kategori</option>
                <?php while($k = mysqli_fetch_assoc($kategoris)) : ?>
                    <option value="<?= $k['id']; ?>" <?= (isset($_GET['kategori']) && $_GET['kategori'] == $k['id']) ? 'selected' : ''; ?>>
                        <?= htmlspecialchars($k['nama']); ?>
                    </option>
                <?php endwhile; ?>
            </select>

            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">Filter</button>
        </form>
    </div>

    <!-- Produk -->
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 px-4 pb-10">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="bg-grey blue:bg-cyant-300 shadow-md rounded-xl overflow-hidden transform transition duration-300 hover:-translate-y-1">
                <img src="../assets/img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>" class="w-full h-52 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-1"><?= htmlspecialchars($row['nama_produk']) ?></h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Brand: <?= htmlspecialchars($row['nama_brand']) ?></p>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mb-1">Kategori: <?= htmlspecialchars($row['nama_kategori']) ?></p>
                    <p class="text-blue-600 dark:text-blue-400 font-semibold mb-3">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
                    <div class="flex justify-between">
                        <a href="detail.php?id=<?= $row['id']; ?>" class="text-sm text-blue-500 hover:underline">Lihat Detail</a>
                        <a href="tambah_keranjang.php?id=<?= $row['id']; ?>" class="text-sm bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">+ Keranjang</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
