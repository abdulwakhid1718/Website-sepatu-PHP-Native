<?php
ob_start();
$id = $_GET['id'];
$uk = $_GET['uk'];

$hapusUk = executeQuery("DELETE FROM tb_detail_produk 
        WHERE id_produk='$id' AND ukuran='$uk'");

if ($hapusUk > 0) {
    setPesan("Ukuran $ukuran Berhasil Dihapus", "success");
    header("location: ?p=produk&a=detail&id=$id");
    ob_end_flush();
}else{
    setPesan("Ukuran $ukuran Gagal Dihapus", "error");
}