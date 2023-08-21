<?php

include 'page/pelanggan/header.php';

if (!isset($_GET['p'])) {
    include 'page/pelanggan/home.php';
}
else {
    if (!isset($_SESSION['login'])) {
        setPesan("Silahkan Login Terlebih Dahulu", "error");
        header("Location: login.php");
        ob_end_flush();
    }

    if ($_GET['p'] == 'detail') {
        include 'page/pelanggan/detail_produk.php';
    }
    elseif ($_GET['p'] == 'keranjang') {
        include 'page/pelanggan/keranjang.php';
    }
    elseif ($_GET['p'] == 'pesan') {
        include 'page/pelanggan/pemesanan.php';
    }
    elseif ($_GET['p'] == 'list_pesanan') {
        include 'page/pelanggan/list_pesanan.php';
    }
    elseif ($_GET['p'] == 'bayar') {
        include 'page/pelanggan/pembayaran.php';
    }
}


include 'page/pelanggan/footer.php';
