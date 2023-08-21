

      <style>
      section {
        display: grid;
        gap: 50px;
        background-color: whitesmoke;
        grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
        padding: 50px var(--container);
      }

      .info-pelanggan {
        display: grid;
        gap: 30px;
      }

      .form-control {
        display: grid;
        gap: 10px;
        font-weight: 500; 
      }

      .form-control input, textarea {
        border: none;
        border-radius: 5px;
        outline: 1px solid #959fa5;
        background: #e1ecf2;
        padding: 10px;
      }

      .order-detail table {
        margin: 30px 0;
        border-radius: 5px;
        display: grid;
        vertical-align: top;
        border: 1px solid #dedede;
      }

      .order-detail table img {
        width: 100px;
        height: auto;
        border: 1px solid #bbb;
        border-radius: 5px;
        padding: 5px 10px;
      }

      .order-detail .sub-total{
        display: flex;
        justify-content: space-between;
      }

      .btn-beli{
        border: none;
        border-radius:5px;
        background-color: var(--warna-utama);
        font-weight: bold; 
        transition: .3s;
      }

      .btn-beli:hover{
        background-color: var(--aksen-kuning);
        color: var(--warna-utama);
      }

      .form-group select {
        margin-top: 10px;
        width: 100%;
        border: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px;
      }
      .form-group input[type="text"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
    </style>

<?php 
  $produkDibeli = $_SESSION['data']['produk'];
  $jumlahBeli = $_SESSION['data']['jumlah'];
  $total_harga = 0;
  $id_pesanan = substr(uniqid(), 0, 11);
?>

<form action="" method="post">
  <section>
    <div class="info-pelanggan">
      <?php 
        $id_user = $_SESSION["id_user"];
        $infoPelanggan = getOneData("SELECT * FROM tb_users WHERE id_user='$id_user'");
        // var_dump($infoPelanggan);
      ?>
      <h1>Info Pembeli</h1>
        <div class="form-control">
          <label for="nama">Nama Pembeli</label>
          <input type="text" id="nama" name="nama" value="<?= $infoPelanggan['nama'] ?>" disabled />
        </div>
        <div class="form-control">
          <label for="alamat">Alamat</label>
          <textarea name="alamat" id="alamat" cols="30" rows="5" disabled><?= $infoPelanggan['alamat'] ?></textarea>
        </div>
        <div class="form-control">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?= $infoPelanggan['email'] ?>" disabled />
        </div>
        <div class="form-control">
          <label for="no_telp">No Telp</label>
          <input type="text" id="no_telp" name="no_telp" value="<?= $infoPelanggan['no_telp']?>" disabled/>
        </div>
    </div>
    <div class="order-detail">
      <h1>Order Detail</h1>
      <div>
        <table cellspacing="20">
          <?php foreach ($produkDibeli as $i => $produk):

            $produk = explode(",",$produk);
            $resultProduk = getAllData("SELECT * FROM tb_produk p
            INNER JOIN tb_detail_produk dp ON p.id_produk=dp.id_produk
            WHERE dp.id_produk = '$produk[0]' AND dp.ukuran = '$produk[2]'");

            if (isset($_POST['beli'])) {
              $id_user = $_SESSION["id_user"];
              $id_produk = $produk[0];
              $ukuran = $produk[2];
              $id_bank = $_POST['bank'];

              $tambah_pesanan = executeQuery("CALL tambah_pesanan('$id_pesanan','$id_user','$id_produk','$id_bank','$jumlahBeli[$i]','$ukuran')");

              if ($tambah_pesanan) {
                executeQuery("CALL remove_keranjang('$id_produk', '$id_user', '$ukuran')");
                
                $_SESSION['id_pesanan'] = $id_pesanan;
                header("Location: tr_success.php");
                ob_end_flush();
              }
            }

            while($infoProduk = $resultProduk->fetch_assoc()):
              $total_harga += $jumlahBeli[$i] * $infoProduk['harga'];
              
          ?>
          <tr>
            <td rowspan="4">
              <img
                src="assets/img/produk/<?= $infoProduk['gambar']?>"
                alt=""
              />
            </td>
            <td><h4><?=$infoProduk['nama_produk']?> (Size : <?=$infoProduk['ukuran']?>)</h4></td>
            <td rowspan="4"><h3><?= $jumlahBeli[$i]?></h3></td>
          </tr>
          <tr>
            <td><h5>Rp. <?= $jumlahBeli[$i] * $infoProduk['harga']?></h5></td>
          </tr>
          <tr></tr>
          <tr></tr>
          <?php endwhile; ?>
          <?php endforeach; ?>
        </table>
      </div>
      <div class="form-group" style="margin-bottom:20px;">
        <h1 for="bank">Metode Pembayaran :</h1>
        <select name="bank" id="bank" required>
          <option value="">-- Pilih Bank --</option>
          <?php
            $banks = getAllData("SELECT * FROM tb_bank_bayar");
            var_dump($banks);
            foreach ($banks as $bank) : ?>
            <option class="no_rek" data-no="<?= $bank['no_rekening']?>" value="<?= $bank['id_bank']?>"><?= $bank['nama_bank']?></option>
          <?php endforeach; ?>
        </select>
        <code style="color: red;">Kirim pembayaran Lewat No. <span id="no_rek"></span></code>
      </div>
      <div style="margin-bottom:10px;" class="sub-total">
        <h1>Sub Total :</h1>
        <h3>Rp. <?= $total_harga ?></h3>
      </div>
      <button class="btn btn-beli" type="submit" name="beli">
        BUAT PESANAN 
      </button>
    </div>
  </section>
</form>

<?php

if (isset($_POST['beli'])) {
  $id_pesanan = substr(uniqid(), 0, 11);
  $id_user = $_SESSION["id_user"];

}

?>