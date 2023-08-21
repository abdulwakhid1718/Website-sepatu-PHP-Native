<style>
  .container {
    max-width: 100%;
    padding: 20px var(--container);
    background-color: #f9f9f9;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    display: grid;
    gap: 10px;
  }

  .product-list {
    list-style-type: none;
    padding: 0;
  }

  .product {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    height: 130px;
    padding: 10px;
    justify-content: space-between;
    background-color: #ededed;
  }

  .product-detail{
    display: flex;
  }

  .product img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 10px;
  }

  .product-info {
    flex: 1;
  }

  .product h2 {
    margin-top: 0;
  }

  .product button{
    padding: 10px; margin-right: 10px; background-color: var(--warna-aksen);
    border-radius: 5px;
    border: none;
    color: #fff;
  }

  .product p {
    margin: 5px 0;
  }

  .product .btn-beli{
    padding: 10px; 
    margin-right: 10px; 
    background-color: var(--warna-aksen); 
    text-decoration: none; color: #fff; border-radius:5px;
  }
  .product .btn-beli:hover{
    background-color: var(--warna-utama);
  }
</style>

<div class="container">
  <h1>List Produk Pesanan</h1>

  <hr><br>
  <span style="float:right; padding:5px; border-radius: 5px; font-weight: bold; text-align: right;">Belum Dibayar</span>
  
  <?php
  $id_user = $_SESSION['id_user'];
  $belum_bayar = getAllData("SELECT * FROM tampil_list_pesanan WHERE id_users = '$id_user' AND STATUS = 'pending' group by id_pesanan;");

  foreach ($belum_bayar as $i => $pesanan_pending): ?>
  <ul class="product-list">
    <li class="product">
      <?php
      $id_pesanan = $pesanan_pending['id_pesanan'];
      $detail = getAllData("SELECT * FROM tampil_list_pesanan WHERE id_pesanan = '$id_pesanan' AND STATUS = 'pending' ORDER BY tgl_pesanan DESC");

      foreach ($detail as $key => $detail_psn) :
      ?>
      <div class="product-detail">
        <img src="assets/img/produk/<?= $pesanan_pending['gambar']?>" alt="Product 2" />
        <div class="product-info">
          <h2><?= $detail_psn['nama_produk']?></h2>
          <p>Ukuran: <?= $detail_psn['ukuran']?></p>
          <p>Jumlah Beli: <?= $detail_psn['jumlah']?></p>
          <p>Harga: <?= $detail_psn['total_harga']?></p>
        </div>
      </div>
      <?php endforeach; ?>
      
      <a href="index.php?p=bayar&no=<?= $id_pesanan?>" class="btn-beli">
        Bayar Rp. <?= $pesanan_pending['total_harga_pesanan']?>
      </a>

    </li>
  </ul>
  <?php endforeach; ?>

  <hr><br>
  <span style="float:right; padding:5px; border-radius: 5px; font-weight: bold; text-align: right;">Sudah Dibayar</span>
  
  <?php
  $id_user = $_SESSION['id_user'];
  $proses = getAllData("SELECT * FROM tampil_list_pesanan WHERE id_users = '$id_user' AND STATUS != 'pending' group by id_pesanan;");

  foreach ($proses as $i => $pesanan_proses): ?>
  <ul class="product-list">
    <li class="product">
      <?php
      $id_pesanan = $pesanan_proses['id_pesanan'];
      $detail = getAllData("SELECT * FROM tampil_list_pesanan WHERE id_pesanan = '$id_pesanan' AND STATUS != 'pending' ORDER BY status");

      foreach ($detail as $key => $detail_psn) :
      ?>
      <div class="product-detail">
        <img src="assets/img/produk/<?= $pesanan_proses['gambar']?>" alt="Product 2" />
        <div class="product-info">
          <h2><?= $detail_psn['nama_produk']?></h2>
          <p>Ukuran: <?= $detail_psn['ukuran']?></p>
          <p>Jumlah Beli: <?= $detail_psn['jumlah']?></p>
          <p>Harga: <?= $detail_psn['total_harga']?></p>
        </div>
      </div>
      <?php endforeach; ?>
      
      <span href="index.php?p=bayar" class="btn-beli" style="background-color: <?= $pesanan_proses['status'] == 'diproses' ? 'green' : 'salmon';?> ;">
        <?= $pesanan_proses['status']?>
      </span>

    </li>
  </ul>
  <?php endforeach; ?>
  <hr>
</div>
