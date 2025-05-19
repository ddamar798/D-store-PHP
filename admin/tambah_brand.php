<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Brand</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Tambah Brand</h1>

    <form action="../controllers/tambah_brand.php" method="POST" class="bg-white p-4 rounded shadow w-full max-w-md">
        <label class="block mb-2">Nama Brand:</label>
        <input type="text" name="nama" required class="w-full p-2 border rounded mb-4">

        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">
            Simpan
        </button>
    </form>
</body>
</html>
