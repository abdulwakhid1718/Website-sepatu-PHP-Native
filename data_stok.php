<?php

require 'koneksi.php';
$id = $_POST['id'];
$ukuran = $_POST['ukuran'];
// Query database untuk mendapatkan jumlah stok berdasarkan ukuran sepatu
$sql = "SELECT stok FROM tb_detail_produk WHERE id_produk='$id' AND ukuran = '$ukuran'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row['stok'];
} else {
  echo 0;
}

?>
