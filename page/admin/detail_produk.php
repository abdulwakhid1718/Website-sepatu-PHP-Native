<?php 

$id = $_GET['id'];
$lokasiFotoProduk = "assets/img/produk/";
$data_suplier = getAllData("SELECT * FROM tb_suplier");

// Untuk mengubah Produk
if (isset($_POST['ubahproduk'])) {
  $id = $_POST['id_produk'];
  $nama = $_POST['nama'];
  $merek = $_POST['merek'];
  $kategori = $_POST['kategori'];
  $harga = $_POST['harga'];
  $warna = $_POST['warna'];
  $suplier = $_POST['suplier'];
  $deskripsi = $_POST['deskripsi'];

  $updateProduk = executeQuery("UPDATE tb_produk SET id_suplier='$suplier', nama_produk='$nama', merek='$merek', kategori='$kategori', harga='$harga', warna='$warna', deskripsi='$deskripsi' WHERE id_produk='$id'");

  $pesan = $updateProduk > 0 ? ["Info Produk Berhasil Diperbarui", "success"] : ["Info Produk Gagal Diperbarui", "error"];

  setPesan($pesan[0], $pesan[1]);
}

// Untuk menambah ukuran sepatu
if (isset($_POST['tambah_ukuran'])) {
  $stok = $_POST['stok'];
  $ukuran = $_POST['ukuran'];

  try{
    $queryUkuran = $con->query("INSERT INTO tb_detail_produk VALUES('$id', '$ukuran', '$stok')");

    if (!$queryUkuran) throw new Exception("Terjadi kesalahan: " . $con->error);

    setPesan("Ukuran Berhasil Ditambahkan", "success");
    
  } catch (Exception $e) {
    // Tangani kesalahan yang terjadi
    setPesan($e->getMessage(), "error");
  }
}

// Untuk menambah stok ukuran sepatu
if (isset($_POST['tambah_stok'])) {
  $stok = $_POST['stok'];
  $ukuran = $_POST['ukuran'];
  $queryStok = $con->query("CALL tambah_stok('$id', '$ukuran', '$stok')");

  if ($queryStok) {
    setPesan("Stok Berhasil Ditambahkan", "success");
  }else{
    setPesan("Stok Gagal Ditambahkan", "error");
  }
}

// Untuk mengubah gambar Produk
if (isset($_POST["ubahgambar"])) {
  $foto = uploadImage($_FILES['foto'], $lokasiFotoProduk);

  if ($foto) {
    executeQuery("UPDATE tb_produk SET gambar='$foto' WHERE id_produk='$id'");

    $foto_lama = $lokasiFotoProduk.$_POST['gambar'];
    if (file_exists($foto_lama)) {
      unlink($foto_lama);
      setPesan("Gambar Produk Berhasil Diubah", "success");
    }
  }
}


?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Detail Produk</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Produk</a></li>
          <li class="breadcrumb-item active">Detail Produk</li>
        </ol>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="content">
  <div class="container-fluid">
    <?php getPesan(); ?>
  </div>
</div>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4>Info Produk</h4>
            <?php $info_produk = getOneData("SELECT * FROM tb_produk WHERE id_produk='$id'"); ?>
            <div class="row">
              <div class="col-md-5 rounded p-1 m-1" style="background-color: #40474e !important;">
              <form action="" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="id">ID Produk</label>
                    <input
                      type="text"
                      class="form-control"
                      id="id"
                      readonly
                      name="id_produk"
                      value="<?= $info_produk['id_produk']?>"
                      disabled
                    />
                  </div>
                  <div class="form-group">
                    <label for="nama">Nama Sepatu</label>
                    <input
                      type="text"
                      class="form-control"
                      id="nama"
                      name="nama"
                      value="<?= $info_produk['nama_produk']?>"
                      disabled
                      placeholder="Masukan Nama Sepatu"
                    />
                  </div>
                  <div class="form-group">
                    <label for="merek">Merek</label>
                    <input
                      type="text"
                      class="form-control"
                      id="merek"
                      name="merek"
                      value="<?= $info_produk['merek']?>"
                      disabled
                      placeholder="Masukan merek"
                    />
                  </div>
                  <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select name="kategori" class="custom-select rounded-0" id="kategori" disabled>
                      <option value="Sepatu Pria" <?= $info_produk['kategori']=='Sepatu Pria'? 'selected' : ''; ?>>Sepatu Pria</option>
                      <option value="Sepatu Betina" <?= $info_produk['kategori']=='Sepatu Betina'? 'selected' : ''; ?>>Sepatu Betina</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="suplier">Suplier</label>
                    <select name="suplier" class="custom-select rounded-0" id="suplier" disabled>
                      <?php foreach ($data_suplier as $suplier): ?>
                        <option 
                          value="<?= $suplier['id_suplier']; ?>" 
                          <?= $info_produk['id_suplier'] == $suplier['id_suplier'] ? 'selected' : ''; ?>
                        >
                          <?= $suplier["nama_suplier"]; ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="harga">Harga</label>
                    <input 
                      type="number" 
                      name="harga" 
                      id="harga" 
                      class="form-control" 
                      value="<?= $info_produk['harga']?>"
                      disabled
                      placeholder="Masukan Harga"
                    />
                  </div>
                  <div class="form-group">
                    <label for="warna">Warna</label>
                    <input
                      type="text"
                      class="form-control"
                      id="warna"
                      name="warna"
                      value="<?= $info_produk['warna']?>"
                      disabled
                      placeholder="Masukan Warna"
                    />
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" 
                    id="deskripsi" rows="4" placeholder="Masukan Deskripsi.." disabled><?= $info_produk['deskripsi']?></textarea>
                  </div>
                </div>
                
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" id="ubah-produk" class="btn btn-success mr-2"><i class="fa fa-edit mr-2"></i>Ubah</button>
                  <button type="submit" name="ubahproduk" id="submitproduk" class="btn btn-primary" disabled><i class="fa fa-save mr-2"></i>Simpan</button>
                </div>
              </form>
              </div>
              <?php $detail_produk = getAllData("CALL show_detail_produk('$id')");?>
              <div class="col-md-6 m-1">
                <div class="row">
                  <div class="col-md-12 order-last">
                    <button type="button" class="btn btn-primary btn-tambah-stok mb-2" data-toggle="modal" data-target="#modal-ukuran"><i class="fa fa-plus-square mr-2"></i>Tambah Ukuran</button>
                    <table
                      id="example2"
                      class="table table-bordered table-hover dataTable dtr-inline"
                      aria-describedby="example2_info"
                    >
                      <thead>
                        <tr>
                          <th
                            class="sorting sorting_asc"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-sort="ascending"
                            aria-label="ID Produk: activate to sort column descending"
                          >
                            Ukuran
                          </th>
                          <th
                            class="sorting"
                            tabindex="0"
                            aria-controls="example2"
                            rowspan="1"
                            colspan="1"
                            aria-label="Browser: activate to sort column ascending"
                          >
                            Stok
                          </th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($detail_produk as $produk): ?>
                        <tr class="odd">
                          <td class="dtr-control sorting_1" tabindex="0">
                            <?= $produk['ukuran']; ?>
                          </td>
                          <td><?= $produk['stok']; ?></td>
                          <td>
                            <button
                              type="button" class="btn btn-primary btn-sm btn-tambah-stok" data-toggle="modal" data-ukuran="<?= $produk['ukuran']; ?>" data-target="#modal-stok"><i class="fa fa-plus-square mr-2"></i>Tambah Stok</button>
                            <a
                              href="?p=produk&a=hapus_ukuran&id=<?= $produk['id_produk']; ?>&uk=<?= $produk['ukuran']; ?>"
                              type="button"
                              class="btn btn-danger btn-sm"
                              ><i class="fa fa-trash mr-2"></i>Hapus</a
                            >
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th rowspan="1" colspan="1">Ukuran</th>
                          <th rowspan="1" colspan="1">Stok</th>
                          <th rowspan="1" colspan="1">Aksi</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="col-md-12 order-first order-md-last">
                    <hr style="background: #eee;">
                    <div class="form-group mt-3">
                      <form action="" method="post" enctype="multipart/form-data">
                        <label for="pickfoto">Gambar Produk</label>
                        <div class="row">
                          <div class="col-12 col-md-6" >
                            <img id="imagePreview" src="<?= $lokasiFotoProduk.$info_produk['gambar'];?>" alt="Preview Gambar" class="d-block img-rounded p-3 mb-3 img-fluid" style="background-color: #40474e !important;">
                          </div>
                        </div>
                        <input type="text" name="gambar" value="<?= $info_produk['gambar']; ?>" hidden>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="pickfoto" >
                            <label class="custom-file-label" for="pickfoto">Choose file</label>
                          </div>
                        </div>
                        <button type="submit" name="ubahgambar" class="btn btn-success mt-3"><i class="fa fa-edit mr-2"></i>Ubah Gambar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!--/. container-fluid -->
</section>
<!-- /.content -->

<!-- Modal Box Tambah Stok -->
<div class="modal fade" id="modal-stok">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Masukan Stok</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" id="dataUkuran" name="ukuran" hidden>
          <input type="text" class="form-control" id="stok" name="stok">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="tambah_stok" class="btn btn-primary">Tambahkan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal Box Tambah Ukuran -->
<div class="modal fade" id="modal-ukuran">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Tambah Ukuran Sepatu</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label for="ukuran">Ukuran</label>
            <input type="text" class="form-control" id="ukuran" name="ukuran">
          </div>
          <div class="form-group">
            <label for="stok">Stok Ukuran</label>
            <input type="text" class="form-control" id="stok" name="stok">
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="tambah_ukuran" class="btn btn-primary">Tambahkan</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

