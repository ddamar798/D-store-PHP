<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id = (int) $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($db, "SELECT * FROM brand WHERE id = $id"));
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Brand</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h1 class="text-2xl font-bold mb-4">Edit Brand</h1>

    <form action="../controllers/edit_brand.php" method="POST" class="bg-white p-4 rounded shadow w-full max-w-md">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">

        <label class="block mb-2">Nama Brand:</label>
        <input type="text" name="nama" required value="<?= htmlspecialchars($data['nama']); ?>" class="w-full p-2 border rounded mb-4">

        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">
            Update
        </button>
    </form>
</body>
</html>
