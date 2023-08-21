<style>
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }

  .container {
    width: 100%;
    padding: 50px var(--container);
    background-color: whitesmoke;
  }

  th,
  td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  table input{
    width: 70px;
    padding: 5px 0 5px 30px;
  }

  .delete-btn {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
  }

  input[type="checkbox"][name="produk[]"]{
    width: 20px;
    height: 20px;
  }

  .submit-btn {
    background-color: var(--warna-aksen);
    color: white;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
  }
  .submit-btn:hover {
    background-color: var(--warna-utama);
  }

  .delete-btn:hover {
    background-color: #d32f2f;
  }
</style>


<?php 
ob_start();

if (isset($_POST['btn-chekout'])) {
    $_SESSION["data"] = $_POST;
    header("Location: index.php?p=pesan");
    ob_end_flush();
  }

?>


<div class="container">
<h1>Keranjang Belanja</h1>
  <form method="POST" action="">
  <table>
    <thead>
      <tr>
        <th>Pilih</th>
        <th>Gambar</th>
        <th>Nama Produk</th>
        <th>Jumlah</th>
        <th>Harga Satuan</th>
        <th>Ukuran</th>
        <th style="text-align:right;">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $id = $_SESSION["id_user"];
      $keranjang = getAllData("SELECT * FROM tampil_keranjang WHERE id_user = '$id'");
      foreach ($keranjang as $productKeranjang) : ?>
      <tr>
        <td>
          <input type="checkbox" class="item-check" data-harga="<?= $productKeranjang['harga']?>" name="produk[]" 
          value="<?= $productKeranjang['id_produk']?>,<?= $productKeranjang['id_user']?>,<?= $productKeranjang['ukuran']?>
          " />
        </td>
        <td>
          <img src="assets/img/produk/<?= $productKeranjang['gambar']?>" alt="" width="100">
        </td>
        <td><?= $productKeranjang['nama_produk']?></td>
        <td>
          <input type="number" class="jumlah" name="jumlah[]" value="<?= $productKeranjang['jumlah']?>" />
        </td>
        <td>Rp. <?= $productKeranjang['harga']?></td>
        <td><?= $productKeranjang['ukuran']?></td>
        <td style="text-align:right;">
          <a href="page/pelanggan/hapus_item_keranjang.php?id=<?= $productKeranjang['id_keranjang'] ?> "class="delete-btn" onclick="return confirm('Yakin Mau Hapus?')">
            Hapus
          </a>
        </td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <br />
  <button type="submit" name="btn-chekout" class="submit-btn" disabled>Checkout</button>
  <h3 id="total-checkout" style="float:right;">Rp. 0</h3>
</form>
</div>