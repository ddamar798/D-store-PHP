<?php
include_once '../config/koneksi.php';

$query = "
    SELECT produk.*, 
           brands.nama AS nama_brand, 
           kategori.nama AS nama_kategori 
    FROM produk 
    LEFT JOIN brands ON produk.brand_id = brands.id 
    LEFT JOIN kategori ON produk.kategori_id = kategori.id
";

$result = mysqli_query($db, $query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Beranda - Dstore</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <h1>Produk Dstore</h1>
    <div class="produk-list">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="produk-item">
                <img src="../assets/img/<?= htmlspecialchars($row['gambar']) ?>" alt="<?= htmlspecialchars($row['nama_produk']) ?>" width="150">
                <h3><?= htmlspecialchars($row['nama_produk']) ?></h3>
                <p>Brand: <?= htmlspecialchars($row['nama_brand']) ?></p>
                <p>Kategori: <?= htmlspecialchars($row['nama_kategori']) ?></p>
                <p>Harga: Rp<?= number_format($row['harga'], 0, ',', '.') ?></p>
            </div>
        <?php endwhile; ?>
    </div>
</body>
</html>
