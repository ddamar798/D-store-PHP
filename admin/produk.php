<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

// Ambil semua produk dari database
$sql = "SELECT produk.*, brands.nama_brand, kategori.nama_kategori 
        FROM produk 
        LEFT JOIN brands ON produk.brand_id = brands.id 
        LEFT JOIN kategori ON produk.kategori_id = kategori.id";

$result = mysqli_query($db, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Produk - Admin</title>
    <link href="../assets/css/style.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <div class="max-w-5xl mx-auto bg-white rounded-xl shadow-md p-6">

    


        <h2 class="text-2xl font-bold mb-6 text-center">
            Daftar Produk Sepatu 👟
        </h2>

        <div class="text-right mb-4">
            <a href="tambah_produk.php"
       class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg">
        + Tambah Produk
    </a>

    <a href="edit_produk.php?id=<?= $row['id']; ?>"
       class="bg-yellow-500 hover:bg-yellow-600 text-white py-2 px-4 rounded-lg">
        ✎ Edit Produk
    </a>

    <a href="../controllers/hapus_produk.php?id=<?= $row['id']; ?>"
       onclick="return confirm('Yakin ingin menghapus produk ini?')"
       class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg">
        🗑️ Hapus Produk
    </a>

        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border border-gray-300 text-sm">

            
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-3 py-2">No</th>
                        <th class="border px-3 py-2">Nama</th>
                        <th class="border px-3 py-2">Brand</th>
                        <th class="border px-3 py-2">Kategori</th>
                        <th class="border px-3 py-2">Harga</th>
                        <th class="border px-3 py-2">Aksi</th>
                    </tr>
                </thead>


                <tbody>
                    <?php $no = 1; ?>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr class="text-center">
                            <td class="border px-2 py-1"><?= $no++; ?></td>
                            <td class="border px-2 py-1"><?= htmlspecialchars($row['nama_produk']); ?></td>
                            <td class="border px-2 py-1"><?= htmlspecialchars($row['nama_brand']); ?></td>
                            <td class="border px-2 py-1"><?= htmlspecialchars($row['nama_kategori']); ?></td>
                            <td class="border px-2 py-1">Rp<?= number_format($row['harga']); ?></td>
                            <td class="border px-2 py-1">
                                <a href="#" class="text-blue-600 hover:underline">Edit</a> |
                                <a href="#" class="text-red-600 hover:underline">Hapus</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>


            </table>
        </div>

    </div>

</body>
</html>
