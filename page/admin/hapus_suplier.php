<?php
ob_start();
$id = $_GET['id'];
$hapus = executeQuery("DELETE FROM tb_suplier WHERE id_suplier = '$id'");

if ($hapus > 0) {
    setPesan("Data Suplier Berhasil Dihapus", "success");
}else {
    setPesan("Data Suplier Berhasil Dihapus", "error");
}
header('Location: ?p=suplier');
ob_end_flush();