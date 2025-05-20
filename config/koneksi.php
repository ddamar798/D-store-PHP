<?php
$db = mysqli_connect("localhost", "root", "", "dstore");

if (!$db) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
