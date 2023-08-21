    <section class="hero">
        <div class="hero-content left">
            <h1>T-SHOES <span>STORE</span></h1>
            <p>T-SHOES Store Menyediakan berbagai produk yang sangat berkualitas, dijamin produk terbaik dan anda puas. Dengan komitmen kami untuk memberikan pengalaman berbelanja yang luar biasa, T-SHOES Store senantiasa menghadirkan koleksi produk terbaru dan terbaik untuk kepuasan Anda.</p>
        </div>
        <div class="hero-content right">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php 
                    $new_products = getAllData("SELECT * FROM tampil_produk_terbaru");
                    foreach ($new_products as $key => $produk_terbaru) : ?>
                    <div class="swiper-slide">
                        <span>Rp. <?= $produk_terbaru['harga']?></span>
                        <h3><?= $produk_terbaru['nama_produk']?></h3>
                        <img src="assets/img/produk/<?= $produk_terbaru['gambar']?>" alt="product1" width="100%">
                        <a href="index.php?p=detail&id=<?= $produk_terbaru['id_produk']?>" class="btn btn-swiper">Lihat Produk</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>


    <section class="products" id="product">
        <h1>Product</h1>
        <div class="head-products">
            <div class="categories">
                <span class="category kategori active" data-kategori="semua">Semua</span>
                <span class="category kategori" data-kategori="pria">Sepatu Pria</span>
                <span class="category kategori" data-kategori="wanita">Sepatu Wanita</span>
            </div>
            <input type="text" id="input-cari" placeholder="Cari Produk">
        </div>
        <div class="product-kosong">Product Kosong!</div>
        <?php 
        $result = $con->query("SELECT * FROM tampil_produk");

        foreach ($result as $key => $produk): ?>
            <div class="product" data-kategori="aksesoris">
                <h5 class="harga">Rp. <?= $produk['harga']; ?></h5>
                <picture>
                    <img src="assets/img/produk/<?= $produk['gambar']; ?>" alt="">
                </picture>
                <div class="detail">
                    <p class="icon">
                        <span><i class="bi bi-cart3"></i></span>
                        <span><i class="bi bi-share"></i></span>
                    </p>
                    <strong><?= $produk['nama_produk']; ?></strong>
                    <span><?= batasTextPanjang($produk['deskripsi']); ?></span>
                    <a href="?p=detail&id=<?= $produk['id_produk'];?>" class="btn btn-buy">Detail Produk!</a>
                </div>
            </div>
        <?php endforeach; ?>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" style="margin-top: -5px;" viewBox="0 0 1440 250"><path fill="#f5f5f5" fill-opacity="1" d="M0,32L60,58.7C120,85,240,139,360,138.7C480,139,600,85,720,90.7C840,96,960,160,1080,160C1200,160,1320,96,1380,64L1440,32L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path></svg>

    <?php ?>
    <section class="about" id="about">
        <div class="left">
            <img src="assets/img/ilustrasi.png" alt="" width="100%">
        </div>
        <div class="right">
            <h1>About <span>us</span></h1>
            <p>T-SHOES Store Menyediakan berbagai produk yang sangat berkualitas, dijamin produk terbaik dan anda puas. Dengan komitmen kami untuk memberikan pengalaman berbelanja yang luar biasa, T-SHOES Store senantiasa menghadirkan koleksi produk terbaru dan terbaik untuk kepuasan Anda. Kami memahami pentingnya kualitas dan kepuasan pelanggan, sehingga setiap produk yang kami tawarkan telah melewati seleksi ketat untuk memastikan standar kualitas yang tinggi. Dari sepatu olahraga, sepatu casual, hingga sepatu formal, T-SHOES Store memiliki pilihan yang luas untuk semua gaya dan kebutuhan Anda. Dapatkan produk terbaik dan rasakan kenyamanan serta kepuasan dalam setiap langkah Anda.</p>
            <a href="#contact" class="btn">Contact us</a>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#f5f5f5" fill-opacity="1" d="M0,64L60,74.7C120,85,240,107,360,128C480,149,600,171,720,149.3C840,128,960,64,1080,53.3C1200,43,1320,85,1380,106.7L1440,128L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"></path></svg>

    <section class="contact" id="contact">
        <h1>Contact US</h1>
        <div class="left">
            <div class="informasi">
                <span><i class="bi bi-telephone-fill"></i></span>
                <div>
                    <h3>Telpon</h3>
                    <span>+6285708900012</span>
                </div>
            </div>
            <div class="informasi">
                <span><i class="bi bi-envelope-fill"></i></span>
                <div>
                    <h3>Email</h3>
                    <span>T-SHOESutm2@gmail.com</span>
                </div>
            </div>
            <div class="informasi">
                <span><i class="bi bi-geo-alt-fill"></i></span>
                <div>
                    <h3>Lokasi</h3>
                    <span>Bangkalan, Madura</span>
                </div>
            </div>
        </div>
        <form action="" method="post" class="right">
            <div class="contacts-input">
                <div class="contact-content">
                    <label for="nama">Nama</label>
                    <input type="text" class="contact-input" name="nama" id="nama">
                </div>
                <div class="contact-content">
                    <label for="email">Email</label>
                    <input type="email" class="contact-input" name="email" id="email">
                </div>
            </div>
            <div class="contact-content">
                <label for="pesan">Kirim Pesan</label>
                <textarea name="pesan" class="contact-input" id="pesan" cols="0" rows="7" style="resize: none;"></textarea>
            </div>
            <button type="submit" class="btn">Kirim Saran</button>
        </form>
    </section>
