<?php
session_start();
include_once '../includes/auth_admin.php'; // Cek login admin
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - Dstore</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-6">
        
        <h1 class="text-2xl font-bold mb-6 text-center">
            Hellow Atminn 👋😈
        </h1>
        
        <div class="grid grid-cols-2 gap-4 mb-6">

            <a href="produk.php" class="block bg-blue-500 hover:bg-blue-600 text-white text-center py-3 rounded-lg">
                Kelola Produk
            </a>

            <a href="brand.php" class="block bg-green-500 hover:bg-green-600 text-white text-center py-3 rounded-lg">
                Kelola Brand
            </a>

            <a href="kategori.php" class="block bg-yellow-500 hover:bg-yellow-600 text-white text-center py-3 rounded-lg">
                Kelola Kategori
            </a>

            <a href="promo.php" class="block bg-purple-500 hover:bg-purple-600 text-white text-center py-3 rounded-lg">
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
