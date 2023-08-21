<style>
  .container {
    max-width: 100%;
    padding: var(--container);
    background-color: whitesmoke;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  h1 {
    text-align: center;
  }

  .form-group {
    margin: 20px 0;
  }

  label {
    display: block;
    font-weight: bold;
    margin-bottom:10px;
  }
  

  button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  table td{
    padding: 5px 0;
  }
</style>

<?php

$id_pesanan = $_GET['no'];

if (isset($_POST['bayar'])) {
  $tgl_bayar = date('Y-m-d');
  $nama = $_SESSION['nama_user'];
  $bukti_bayar = uploadImage($_FILES['bukti'], "assets/img/bukti/");

  $tambah_pembayaran = executeQuery("INSERT INTO tb_pembayaran VALUES('','$id_pesanan','$tgl_bayar','$bukti_bayar')");

  if ($tambah_pembayaran) {
    echo "
      <script>alert('Pembayaran Berhasil')</script>
    ";
    header("Location: index.php?p=list_pesanan");
  }
}

$detail_pesanan = getOneData("SELECT * FROM tampil_pesanan WHERE id_pesanan = '$id_pesanan'");

?>

<div class="container">
  <h1>Pembayaran</h1> <br>
  <div class="detail_pesanan">
    <label for="bukti">Detail Pesanan:</label>
    <table>
      <tr>
        <td>Nama Penerima</td>
        <td align="center">:</td>
        <td><?= $detail_pesanan['nama'] ?></td>
      </tr>
      <tr>
        <td>ID Pesanan</td>
        <td width="5%" align="center">:</td>
        <td><?= $detail_pesanan['id_pesanan'] ?></td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td align="center">:</td>
        <td><?= $detail_pesanan['alamat'] ?></td>
      </tr>
      <tr>
        <td>No Telp</td>
        <td align="center">:</td>
        <td><?= $detail_pesanan['no_telp'] ?></td>
      </tr>
      <tr>
        <td>Metode Pembayaran</td>
        <td align="center">:</td>
        <td><?= $detail_pesanan['nama_bank'] ?></td>
      </tr>
      <tr>
        <td>Total Pesanan</td>
        <td align="center">:</td>
        <td>Rp. <?= $detail_pesanan['total_harga_pesanan'] ?></td>
      </tr>
    </table>
    <br>
    <code style="color:red;">* Kirim pembayaran lewat no.rekening berikut : <?= $detail_pesanan['no_rekening']?></code>

  </div>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="bukti">Bukti Pembayaran:</label>
      <input type="file" id="bukti" name="bukti" placeholder="Masukkan bukti" required/>
    </div>
    <button type="submit" name="bayar">Bayar</button>
  </form>
</div>
