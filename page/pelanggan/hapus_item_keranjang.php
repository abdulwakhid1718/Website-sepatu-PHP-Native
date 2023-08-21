<?php

require '../../functions.php';
ob_start();
$id = $_GET['id'];

$hapus = executeQuery("DELETE FROM tb_keranjang 
        WHERE id_keranjang='$id'");

if ($hapus > 0) {
    header("location: ../../index.php?p=keranjang");
    ob_end_flush();
}