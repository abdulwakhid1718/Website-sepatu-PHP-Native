<?php
ob_start();
$id = $_GET['id'];


$hapus = executeQuery("DELETE FROM tb_users WHERE id_user = '$id'");

if ($hapus > 0) {
    setPesan("Data Pelanggan Berhasil Dihapus", "success");
}else {
    setPesan("Data Pelanggan Berhasil Dihapus", "error");
}
header('Location: ?p=pelanggan');
ob_end_flush();