<?php
session_start();
include_once '../includes/auth_admin.php';
include_once '../config/db.php';

$id = (int) $_GET['id'];
$query = mysqli_query($db, "DELETE FROM promo WHERE id = $id");

header("Location: ../admin/promo.php");
exit;
?>
