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
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

    <div class="w-full max-w-4xl bg-white shadow-lg rounded-2xl p-8">
        
        <h1 class="text-3xl font-semibold text-gray-800 text-center mb-8 border-b pb-4">
            Dashboard Admin D`store
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-8">

           <div class="grid grid-cols-2 gap-4 mb-6">
    <a href="produk.php" class="block bg-blue-500 hover:bg-blue-600 text-white text-center py-3 rounded-lg">
        Kelola Produk
    </a>
    <a href="tambah_produk.php" class="block bg-blue-500 hover:bg-blue-600 text-white text-center py-3 rounded-lg">
        Tambah Produk
    </a>

    <a href="kategori.php" class="block bg-yellow-500 hover:bg-yellow-600 text-white text-center py-3 rounded-lg">
        Kelola Kategori
    </a>
    <a href="tambah_kategori.php" class="block bg-yellow-500 hover:bg-yellow-600 text-white text-center py-3 rounded-lg">
        Tambah Kategori
    </a>

    <a href="brand.php" class="block bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-lg">
        Kelola Brand
    </a>
    <a href="tambah_brand.php" class="block bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-lg">
        Tambah Brand
    </a>

    <a href="promo.php" class="block bg-purple-500 hover:bg-purple-600 text-white text-center py-3 rounded-lg">
        Kelola Promo
    </a>
    <a href="tambah_promo.php" class="block bg-purple-500 hover:bg-purple-600 text-white text-center py-3 rounded-lg">
        Tambah Promo
    </a>
</div>


        </div>

        <form action="../controllers/logout.php" method="POST" class="text-center">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-lg">
                Logout
            </button>
        </form>

    </div>

</body>
</html>
