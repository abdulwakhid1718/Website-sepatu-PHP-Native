<?php
ob_start();
$id = $_GET['id'];

$hapus = executeQuery("DELETE FROM tb_produk 
        WHERE id_produk='$id'");

if ($hapus > 0) {
    setPesan("Data Produk Berhasil Dihapus", "success");
    header("location: ?p=produk");
    ob_end_flush();
}else{
    setPesan("Data Produk Gagal Dihapus", "error");
}