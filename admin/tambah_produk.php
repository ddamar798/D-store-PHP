<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

// Ambil kategori
$kategori = mysqli_query($db, "SELECT * FROM kategori");

// Ambil brand
$brands = mysqli_query($db, "SELECT * FROM brands");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk - Admin</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-xl mx-auto bg-white rounded-xl shadow-md p-6">

        <h2 class="text-xl font-bold mb-6 text-center">
            Tambah Produk Sepatu 👟
        </h2>

        <form action="../controllers/tambah_produk.php" method="POST" enctype="multipart/form-data">
            
            <div class="mb-4">
                <label class="block mb-1 font-medium">Nama Produk</label>
                <input type="text" name="nama" required class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Harga (Rp)</label>
                <input type="number" name="harga" required class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Kategori</label>
                <select name="kategori_id" required class="w-full border px-3 py-2 rounded-lg">
                    <option value="">-- Pilih Kategori --</option>
                    <?php while ($k = mysqli_fetch_assoc($kategori)) : ?>
                        <option value="<?= $k['id']; ?>"><?= htmlspecialchars($k['nama_kategori']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Brand</label>
                <select name="brand_id" required class="w-full border px-3 py-2 rounded-lg">
                    <option value="">-- Pilih Brand --</option>
                    <?php while ($b = mysqli_fetch_assoc($brands)) : ?>
                        <option value="<?= $b['id']; ?>"><?= htmlspecialchars($b['nama_brand']); ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-medium">Gambar Produk</label>
                <input type="file" name="gambar" accept="image/*" required class="w-full border px-3 py-2 rounded-lg">
            </div>

            <div class="text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                    Simpan Produk
                </button>
            </div>

        </form>

    </div>

</body>
</html>
