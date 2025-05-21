<?php
include_once '../config/koneksi.php';

if (!isset($_GET['id'])) {
    echo "Produk tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);
$query = "
    SELECT produk.*, 
           brands.nama AS nama_brand, 
           kategori.nama AS nama_kategori 
    FROM produk 
    LEFT JOIN brands ON produk.brand_id = brands.id 
    LEFT JOIN kategori ON produk.kategori_id = kategori.id 
    WHERE produk.id = $id
";

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
    <title><?= htmlspecialchars($produk['nama_produk']) ?> - Dstore</title>
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
        <div class="grid md:grid-cols-2 gap-6">
            <img src="../assets/img/<?= htmlspecialchars($produk['gambar']) ?>" alt="<?= htmlspecialchars($produk['nama_produk']) ?>" class="w-full h-auto rounded-lg shadow">

            <div>
                <h2 class="text-2xl font-bold mb-2"><?= htmlspecialchars($produk['nama_produk']) ?></h2>
                <p class="text-gray-600 mb-1">Brand: <strong><?= htmlspecialchars($produk['nama_brand']) ?></strong></p>
                <p class="text-gray-600 mb-1">Kategori: <strong><?= htmlspecialchars($produk['nama_kategori']) ?></strong></p>
                <p class="text-blue-600 text-xl font-bold mt-2">Rp<?= number_format($produk['harga'], 0, ',', '.') ?></p>

                <p class="mt-4 text-gray-700 leading-relaxed">Deskripsi produk belum tersedia.</p>

                <a href="checkout.php?id=<?= $produk['id']; ?>" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">
                    Pesan Sekarang
                </a>
            </div>
        </div>
    </main>
</body>
</html>
