<?php session_start(); ?>

<?php if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
} ?>

<?php include_once '../config/db.php'; // include dari koneksi database ?> 

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - Dstore</title>
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="w-full max-w-sm p-6 bg-white rounded-xl shadow-md">

        <h2 class="text-xl font-bold mb-4 text-center">Login Admin</h2>

        <form action="../controllers/admin_login.php" method="POST">
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Username</label>
                <input type="text" name="username" required class="w-full px-3 py-2 border rounded-lg">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Password</label>
                <input type="password" name="password" required class="w-full px-3 py-2 border rounded-lg">
            </div>

            <?php if (isset($_GET['error'])): ?>
                <p class="text-red-500 text-sm mb-3"><?= htmlspecialchars($_GET['error']) ?></p>
            <?php endif; ?>

            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600">
                Login
            </button>
        </form>
    </div>
</body>
</html>
