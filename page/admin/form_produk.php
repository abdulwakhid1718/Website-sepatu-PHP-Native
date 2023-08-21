<?php
ob_start();
$data_suplier = getAllData("SELECT * FROM tb_suplier");

if (isset($_POST['submit'])) {
  $id = $_POST['id_produk'];
  $nama = $_POST['nama'];
  $merek = $_POST['merek'];
  $kategori = $_POST['kategori'];
  $harga = $_POST['harga'];
  $warna = $_POST['warna'];
  $ukuran = $_POST['ukuran'];
  $stok = $_POST['stok'];
  $suplier = $_POST['suplier'];
  $deskripsi = $_POST['deskripsi'];

  $uploadFoto = uploadImage($_FILES['foto'], "assets/img/produk/");

  $insertProduk = executeQuery("INSERT INTO tb_produk 
      VALUES
      ('$id', '$suplier', '$nama', '$merek', '$kategori', '$harga', 0, '$warna', '$deskripsi', '$uploadFoto')");

  for ($i=0; $i < count($ukuran); $i++) { 
    $insertDetailProduk = executeQuery("INSERT INTO tb_detail_produk VALUES 
      ('$id', '$ukuran[$i]', '$stok[$i]')");
  } 

  if ($insertProduk > 0) {
    setPesan("Data Produk Berhasil Ditambahkan", "success");
    header('location: index.php?p=produk');
    ob_end_flush();
  }else {
    setPesan("Data Produk Gagal Ditambahkan", "error");
  }
}


?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Tambah Produk</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?p=d_Produk">Data Produk</a></li>
          <li class="breadcrumb-item active">Tambah</li>
        </ol>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<div class="card card-primary">
  <!-- form start -->
  <form action="" method="post" enctype="multipart/form-data">
    <div class="card-body">
      <div class="form-group">
        <label for="id">ID Produk</label>
        <input
          type="text"
          class="form-control"
          id="id"
          readonly
          required
          name="id_produk"
          value="<?= getOneData("CALL generate_id('Produk');")['id']; ?>"
        />
      </div>
      <div class="form-group">
        <label for="nama">Nama Sepatu</label>
        <input
          type="text"
          class="form-control"
          id="nama"
          name="nama"
          required
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
          required
          placeholder="Masukan merek"
        />
      </div>
      <div class="form-group">
        <label for="kategori">Kategori</label>
        <select name="kategori" class="custom-select rounded-0" id="kategori" required>
          <option value="Sepatu Pria">Sepatu Pria</option>
          <option value="Sepatu Betina">Sepatu Betina</option>
        </select>
      </div>
      <div class="form-group">
        <label for="suplier">Suplier</label>
        <select name="suplier" class="custom-select rounded-0" id="suplier" required>
          <?php foreach ($data_suplier as $suplier): ?>
            <option value="<?= $suplier['id_suplier']; ?>">
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
          required
          class="form-control" 
          placeholder="Masukan Harga"
        />
      </div>
      <div class="form-group">
        <label for="ukuran">Ukuran & Stok</label><br>
        <code>Minimal mengisi 1 ukuran!!</code>
        <div class="row mt-2">
          <div class="col-2">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="35" value="35">
              <label for="35" class="custom-control-label">35</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="36" value="36">
              <label for="36" class="custom-control-label">36</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="37" value="37">
              <label for="37" class="custom-control-label">37</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="38" value="38">
              <label for="38" class="custom-control-label">38</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="39" value="39">
              <label for="39" class="custom-control-label">39</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="40" value="40">
              <label for="40" class="custom-control-label">40</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
          </div>
          <div class="col-4">
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="41" value="41">
              <label for="41" class="custom-control-label">41</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="42" value="42">
              <label for="42" class="custom-control-label">42</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="43" value="43">
              <label for="43" class="custom-control-label">43</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="44" value="44">
              <label for="44" class="custom-control-label">44</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="45" value="45">
              <label for="45" class="custom-control-label">45</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
            <div class="custom-control custom-checkbox">
              <input class="custom-control-input checkbox-size" name="ukuran[]" type="checkbox" id="46" value="46">
              <label for="46" class="custom-control-label">46</label>
              <input type="number" class="form-control-sm ml-2 mb-2 inp-stok" style="width:50px; height:20px;" name="stok[]" disabled>
            </div>
          </div>
        </div>
      </div>
      
      <div class="form-group">
        <label for="warna">Warna</label>
        <input
          type="text"
          class="form-control"
          id="warna"
          name="warna"
          placeholder="Masukan Warna"
        />
      </div>
      <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="deskripsi" rows="3" placeholder="Masukan Deskripsi.." required></textarea>
      </div>
      <div class="form-group">
        <label for="pickfoto">File input</label>
        <img id="imagePreview" src="#" alt="Preview Gambar" class="img-bordered mb-3" style="max-width: 300px; max-height: 300px; display: none;">
        <div class="input-group">
          <div class="custom-file">
            <input type="file" name="foto" class="custom-file-input" id="pickfoto" required>
            <label class="custom-file-label" for="pickfoto">Choose file</label>
          </div>
        </div>
      </div>
    </div>
    
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
    </div>
  </form>
</div>