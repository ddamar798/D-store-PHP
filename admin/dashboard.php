<?php
session_start();
include_once '../includes/auth_admin.php'; // Cek login admin
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Dstore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <div class="max-w-4xl mx-auto mt-10 bg-white rounded-xl shadow-lg p-6">

        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">
            Selamat Datang, Admin Dstore 👋
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
            
            <!-- Produk -->
            <a href="produk.php" class="block bg-blue-500 hover:bg-blue-600 text-white text-center py-3 rounded-lg transition-all">
                Kelola Produk
            </a>
            <a href="tambah_produk.php" class="block bg-blue-100 hover:bg-blue-200 text-blue-700 text-center py-3 rounded-lg transition-all">
                Tambah Produk
            </a>

            <!-- Kategori -->
            <a href="kategori.php" class="block bg-yellow-500 hover:bg-yellow-600 text-white text-center py-3 rounded-lg transition-all">
                Kelola Kategori
            </a>
            <a href="tambah_kategori.php" class="block bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-center py-3 rounded-lg transition-all">
                Tambah Kategori
            </a>

            <!-- Brand -->
            <a href="brand.php" class="block bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-lg transition-all">
                Kelola Brand
            </a>
            <a href="tambah_brand.php" class="block bg-green-100 hover:bg-green-200 text-green-800 text-center py-3 rounded-lg transition-all">
                Tambah Brand
            </a>

            <!-- Promo -->
            <a href="promo.php" class="block bg-purple-500 hover:bg-purple-600 text-white text-center py-3 rounded-lg transition-all">
                Kelola Promo
            </a>
            <a href="tambah_promo.php" class="block bg-purple-100 hover:bg-purple-200 text-purple-800 text-center py-3 rounded-lg transition-all">
                Tambah Promo
            </a>

        </div>

        <form action="../controllers/logout.php" method="POST" class="text-center mt-6">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-lg transition-all">
                Logout
            </button>
        </form>

    </div>

</body>
</html>
