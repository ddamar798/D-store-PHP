<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

// Ambil ID dari URL
$id = (int) $_GET['id'];

// Ambil data produk berdasarkan ID
$query = "SELECT * FROM produk WHERE id = $id"; 
$result = mysqli_query($db, $query); 
$produk = mysqli_fetch_assoc($result); 

// Ambil semua kategori & brand
$kategori = mysqli_query($db, "SELECT * FROM kategori"); 
$brands = mysqli_query($db, "SELECT * FROM brands"); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk - Admin</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">

        <h2 class="text-xl font-bold mb-6 text-center">
            Edit Produk Sepatu 👟
        </h2>

        <form action="../controllers/edit_produk.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?= $produk['id']; ?>">

            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Produk</label>
                <input type="text" name="nama" value="<?= htmlspecialchars($produk['nama_produk']); ?>" required class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Harga (Rp)</label>
                <input type="number" name="harga" value="<?= $produk['harga']; ?>" required class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Kategori</label>
                <select name="kategori_id" required class="w-full border px-3 py-2 rounded-lg">
                    <?php while ($k = mysqli_fetch_assoc($kategori)) : ?>
                        <option value="<?= $k['id']; ?>" <?= $produk['kategori_id'] == $k['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($k['nama_kategori']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Brand</label>
                <select name="brand_id" required class="w-full border px-3 py-2 rounded-lg">
                    <?php while ($b = mysqli_fetch_assoc($brands)) : ?>
                        <option value="<?= $b['id']; ?>" <?= $produk['brand_id'] == $b['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($b['nama_brand']); ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Gambar Produk</label>
                <input type="file" name="gambar" class="w-full border px-3 py-2 rounded-lg">
                <p class="text-sm text-gray-500 mt-1">Kosongkan jika tidak ingin mengubah gambar.</p>
                <img src="../assets/img/<?= $produk['gambar']; ?>" alt="gambar" class="w-32 mt-2 rounded-lg border">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg">
                    Simpan Perubahan
                </button>
            </div>

        </form>

    </div>

</body>
</html>
