<?php

$servername = "localhost"; // Nama server MySQL (misalnya localhost)
$username = "root"; // Nama pengguna MySQL
$password = ""; // Kata sandi pengguna MySQL
$database = "db_toko_sepatu"; // Nama database yang ingin Anda akses

// Membuat koneksi
$con = new mysqli($servername, $username, $password, $database);

// Memeriksa koneksi
if ($con->connect_error) {
    die("Koneksi gagal: " . $con->connect_error);
}

?>
