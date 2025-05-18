<?php
session_start();
include_once '../config/db.php';

// Ambil data dari form login
$username = $_POST['username'];
$password = $_POST['password'];

// Query ke tabel admin
$sql = "SELECT * FROM admins WHERE username = ?";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

// Cek hasil query
if ($user = mysqli_fetch_assoc($result)) {
    
    // Cek password
    if (password_verify($password, $user['password'])) {
        
        // Simpan sesi admin
        $_SESSION['admin'] = $user['username'];
        
        // Arahkan ke dashboard
        header("Location: ../admin/dashboard.php");
        exit;
        
    } else {
        // Password salah
        header("Location: ../admin/login.php?error=Password salah!");
        exit;
    }

} else {
    // Username tidak ditemukan
    header("Location: ../admin/login.php?error=Username tidak ditemukan!");
    exit;
}
?>
