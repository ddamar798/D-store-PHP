<?php
session_start();
include_once '../config/db.php';

$username = mysqli_real_escape_string($db, $_POST['username']);
$password = $_POST['password'];

$query = "SELECT * FROM admin WHERE username = '$username'";
$result = mysqli_query($db, $query);

if (mysqli_num_rows($result) === 1) {
    $data = mysqli_fetch_assoc($result);

    // COCOKKAN password dengan password_verify()
    if (password_verify($password, $data['password'])) {
        $_SESSION['admin'] = $data['id'];
        header("Location: ../admin/dashboard.php");
        exit;
    } else {
        echo "Password anda salah!";
    }
} else {
    echo "Username tidak ditemukan!";
}
?>
