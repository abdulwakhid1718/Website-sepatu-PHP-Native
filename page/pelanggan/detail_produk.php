<?php

    $id = $_GET['id'];
    if (isset($_GET['uk'])) {
        $uk = $_GET['uk'];
        $stok = getOneData("SELECT stok FROM tb_detail_produk WHERE id_produk='$id' AND ukuran='$uk'");
    }

    if (isset($_POST['beli'])) {
        $_SESSION['data'] = [
            "produk" => [$_GET['id'] . "," . $_SESSION['id_user'] . "," . $_POST['ukuran']],
            "jumlah" => [$_POST['jumlah']]
        ];

        header("Location: index.php?p=pesan");
        ob_end_flush();

    }

    if (isset($_POST['cart'])) {
        $ukuran = $_POST['ukuran'];
        $jumlah = $_POST['jumlah'];
        $id_user = $_SESSION['id_user'];

        $tambahKeranjang = executeQuery("CALL tambah_keranjang('$id_user','$id','$ukuran','$jumlah')");

        if ($tambahKeranjang) {
            echo "
                <script>alert(Berhasil Menambahkan keranjang)</script>
            ";
        }
    }
    $new_products = getAllData("SELECT * FROM tampil_produk_terbaru");

    $detailProduct = getAllData("CALL show_detail_produk('$id')");
    $infoProduct = $detailProduct->fetch_assoc();
?>
    <form action="" method="post">

    <section class="buy-product">
        <div class="left">
            <img src="assets/img/produk/<?= $infoProduct['gambar'] ?>" alt="">
        </div>
        <div class="right">
            <h1><?= $infoProduct['nama_produk']; ?></h1>
            <div class="description">
                <p><?= $infoProduct['deskripsi']; ?></p>
            </div>
            <div class="varians">
                <div class="varian-size varian">
                    <h3>Ukuran</h3>
                    <?php foreach ($detailProduct as $product) :?>
                    <div class="size">
                        <?= $product['ukuran'] ?>
                        <input type="radio" data-id="<?= $id ?>" class="item-radio" name="ukuran" value="<?= $product['ukuran'] ?>">
                        <div></div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="varian-stok">
                    <h3>Jumlah Beli</h3>
                    <div class="stok">
                        <button type="button" id="kurang-btn">-</button>
                        <input type="number" name="jumlah" id="stok-input" value="1" readonly>
                        <button type="button" id="tambah-btn">+</button>
                    </div>
                    <code style="color: red;">* Stok tersedia <span id="stok-tersedia">0</span></code>
                </div>
            </div>
            <span id="harga-per-stok" style="display: none;"><?= $infoProduct['harga'];?></span>
            <h3 id="total-harga">Rp. <?= $infoProduct['harga'];?></h3>
            <div class="buy">
                <button type="submit" name="beli" class="btn">Beli Sekarang</button>
                <button type="submit" name="cart" class="btn">
                    <i class="bi bi-cart3"></i>
                </button>
            </div>
        </div>
    </section>
    
    </form>
    
    <section class="products" id="product">
        <h1 style="text-transform: capitalize;">Rekomendasi Product</h1>
        <div class="product-kosong">Product Kosong!</div>
        <?php 
        
        foreach ($new_products as $key => $produk_terbaru) : ?>
        <div class="product" data-kategori="aksesoris">
            <h4 class="harga"><?= $produk_terbaru['harga']?></h4>
            <picture>
                <img src="assets/img/produk/<?= $produk_terbaru['gambar']?>" alt="">
            </picture>
            <div class="detail">
                <p class="icon">
                    <span><i class="bi bi-cart3"></i></span>
                    <span><i class="bi bi-share"></i></span>
                </p>
                <strong><?= $produk_terbaru['nama_produk']?></strong>
                <span><?= batasTextPanjang($produk_terbaru['deskripsi'])?></span>
                <a href="index.php?p=detail&id=<?= $produk_terbaru['id_produk']?>" class="btn btn-buy">Beli Sekarang!</a>
            </div>
        </div>
        <?php endforeach; ?>
        
    </section>
