<?php
session_start();

// Hapus semua data sesi
session_unset();
session_destroy();

// Arahkan kembali ke halaman login
header("Location: ../admin/login.php?error=Berhasil logout!");
exit;
?>
