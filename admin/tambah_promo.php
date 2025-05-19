<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Promo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Kode Promo</h1>

    <form action="../controllers/tambah_promo.php" method="POST" class="bg-white p-4 rounded shadow w-full max-w-lg">
        <label class="block mb-2">Kode Promo:</label>
        <input type="text" name="kode" required class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Deskripsi:</label>
        <input type="text" name="deskripsi" required class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Potongan (%):</label>
        <input type="number" name="potongan" min="1" max="100" required class="w-full p-2 border rounded mb-4">

        <label class="block mb-2">Tanggal Berlaku:</label>
        <input type="date" name="tanggal_berlaku" required class="w-full p-2 border rounded mb-4">

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
            Simpan
        </button>
    </form>
</body>
</html>
