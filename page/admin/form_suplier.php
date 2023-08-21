<?php
ob_start();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $suplier = getOneData("SELECT * FROM tb_suplier where id_suplier='$id'");
}

if (isset($_POST['submit'])) {
  $id = $_POST['id_suplier'];
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $telp = $_POST['telp'];

  $query = $_GET['a'] == 'tambah' ?
    executeQuery("INSERT INTO tb_suplier VALUE('$id', '$nama', '$alamat', '$telp');") 
  : 
    executeQuery("UPDATE tb_suplier SET nama_suplier='$nama', alamat='$alamat', no_telp='$telp' WHERE id_suplier='$id'");

  if ($query > 0) {
    setPesan("Data Suplier Berhasil Di".$_GET['a'] , "success");
    header('location: index.php?p=suplier');
    ob_end_flush();
  }else {
    setPesan("Data Suplier Gagal Di".$_GET['a'] , "error");
  }
}


?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-capitalize"><?= $_GET['a'] ?> Suplier</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?p=suplier">Data Suplier</a></li>
          <li class="breadcrumb-item active text-capitalize"><?= $_GET['a'] ?></li>
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
  <form action="" method="post" enctype="multipart/form-data" role="form">
    <div class="card-body">
      <div class="form-group">
        <label for="id">ID Suplier</label>
        <input
          type="text"
          class="form-control"
          id="id"
          readonly
          name="id_suplier"
          value="<?= isset($suplier) ? $suplier['id_suplier'] : getOneData("CALL generate_id('suplier');")['id'];; ?>"
        />
      </div>
      <div class="form-group">
        <label for="nama">Nama Suplier</label>
        <input
          type="text"
          class="form-control"
          id="nama"
          name="nama"
          value="<?= isset($suplier) ? $suplier['nama_suplier'] : ''; ?>"
          placeholder="Masukan Nama Lengkap"
        />
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat.."><?= isset($suplier) ? $suplier['alamat'] : ''; ?></textarea>
      </div>
      <div class="form-group">
        <label for="telp">No Telepon</label>
        <input
          type="tel"
          pattern="[0-9]{12}"
          class="form-control"
          id="telp"
          name="telp"
          value="<?= isset($suplier) ? $suplier['no_telp'] : ''; ?>"
          placeholder="Masukan Telepon"
        />
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>Simpan</button>
    </div>
  </form>
</div>

