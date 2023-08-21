<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pesanan Sukses</title>
    <style>
      * {
        box-sizing: border-box;
      }

      body {
        font-family: Arial, sans-serif;
        background-color: #f2f2f2;
        margin: 0;
        padding: 0;
      }

      .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      h1 {
        text-align: center;
        color: #333;
      }

      .success-icon {
        display: block;
        text-align: center;
        margin-bottom: 30px;
      }

      .success-icon img {
        width: 100px;
        height: 100px;
      }

      .success-message {
        text-align: center;
        color: #555;
        margin-bottom: 20px;
      }

      .order-details {
        border-top: 1px solid #ddd;
        padding-top: 20px;
      }

      .order-details h2 {
        color: #333;
        margin-bottom: 10px;
      }

      .order-details p {
        color: #777;
        margin: 5px 0;
      }

      .back-to-home {
        text-align: center;
        margin-top: 30px;
      }

      .back-to-home a {
        color: #333;
        text-decoration: none;
        font-weight: bold;
      }
    </style>
  </head>

  <?php 
  
  session_start();
  require 'functions.php';

  $id_pesanan = $_SESSION['id_pesanan'];
  $transaksi = getOneData("SELECT * FROM tb_pesanan where id_pesanan='$id_pesanan'");
  
  ?>

  <body>
    <div class="container">
      <div class="success-icon">
        <img src="assets/img/success.png" alt="Pesanan Sukses" />
      </div>
      <h1>Pesanan Sukses!</h1>
      <p class="success-message">Terima kasih atas pesanan Anda, jangan lupa bayar.😊</p>
      <div class="order-details">
        <h2>Detail Pesanan</h2>
        <p><strong>Nomor Pesanan: </strong> <?= $id_pesanan ?></p>
        <p><strong>Tanggal Pesanan: </strong><?= $transaksi['tgl_pesanan']?></p>
        <p><strong>Total yang harus dibayar: </strong><?= $transaksi['total_harga_pesanan']?></p>
      </div>
      <div class="back-to-home">
        <a href="index.php?p=bayar&no=<?= $id_pesanan ?>">Konfirmasi Pembayaran</a>
      </div>
      <div class="back-to-home">
        <a href="index.php">Kembali ke Halaman Utama</a>
      </div>
    </div>
  </body>
</html>
