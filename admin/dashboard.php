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

            <a href="produk.php" class="bg-gray-100 hover:bg-gray-200 transition text-center p-6 rounded-xl shadow text-gray-700 font-medium">
                Kelola Produk
            </a>

            <a href="brand.php" class="bg-gray-100 hover:bg-gray-200 transition text-center p-6 rounded-xl shadow text-gray-700 font-medium">
                Kelola Brand
            </a>

            <a href="kategori.php" class="bg-gray-100 hover:bg-gray-200 transition text-center p-6 rounded-xl shadow text-gray-700 font-medium">
                Kelola Kategori
            </a>

            <a href="promo.php" class="bg-gray-100 hover:bg-gray-200 transition text-center p-6 rounded-xl shadow text-gray-700 font-medium">
                Kelola Promo
            </a>

        </div>

        <form action="../controllers/logout.php" method="POST" class="text-center">
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white py-2 px-6 rounded-lg">
                Logout
            </button>
        </form>

    </div>

</body>
</html>
