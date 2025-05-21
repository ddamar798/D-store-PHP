<?php
include_once '../config/koneksi.php';

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
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Navbar -->
    <nav class="bg-blue-700 p-4 flex items-center justify-between text-white">
        <div class="flex items-center gap-3">
            <img src="../assets/img/LOgo.png" alt="Logo" class="h-10 w-10 rounded-full">
            <h1 class="text-xl font-bold">Dstore</h1>
        </div>
    </nav>

    <!-- Filter -->
    <div class="max-w-6xl mx-auto px-4 py-6">
        <form method="GET" class="flex flex-wrap gap-4">
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
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-4 pb-10">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <a href="detail.php?id=<?= $row['id']; ?>" class="block bg-white shadow-md rounded-xl overflow-hidden transform transition duration-300 hover:-translate-y-1">
                <img src="../assets/img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>" class="w-full h-52 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-1"><?= htmlspecialchars($row['nama_produk']) ?></h3>
                    <p class="text-sm text-gray-500 mb-1">Brand: <?= htmlspecialchars($row['nama_brand']) ?></p>
                    <p class="text-sm text-gray-500 mb-1">Kategori: <?= htmlspecialchars($row['nama_kategori']) ?></p>
                    <p class="text-blue-600 font-semibold">Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
                </div>
            </a>
        <?php endwhile; ?>
    </div>
</body>
</html>
