<?php
ob_start();

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $pelanggan = getOneData("SELECT * FROM tb_users where id_user NOT LIKE '%ADM%' AND id_user='$id'");
}

if (isset($_POST['submit'])) {
  $id = $_POST['id_pelanggan'];
  $nama = $_POST['nama'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $alamat = $_POST['alamat'];
  $email = $_POST['email'];
  $telp = $_POST['telp'];

  $query = $_GET['a'] == 'tambah' ? 
    executeQuery("INSERT INTO tb_users VALUES
    ('$id', '$nama', '$username', '$password', '$alamat', '$email', '$telp')")
  : 
    executeQuery("CALL update_user('$id', '$nama', '$username', '$password', '$alamat', '$email', '$telp');"); 

  if ($query > 0) {
    setPesan("Data Pelanggan Berhasil Di". $_GET['a'], "success");
    header('location: index.php?p=pelanggan');
    ob_end_flush();
  }else {
    setPesan("Data Pelanggan Gagal Di". $_GET['a'], "error");
  }
}


?>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-capitalize"><?= $_GET['a']?> Pelanggan</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="?p=d_pelanggan">Data Pelanggan</a></li>
          <li class="breadcrumb-item active text-capitalize"><?= $_GET['a']?></li>
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
        <label for="id">ID Pelanggan</label>
        <input
          type="text"
          class="form-control"
          id="id"
          readonly
          name="id_pelanggan"
          value="<?= isset($pelanggan) ? $pelanggan['id_user'] : getOneData("CALL generate_id('pelanggan');")['id']; ?>"
        />
      </div>
      <div class="form-group">
        <label for="nama">Nama</label>
        <input
          type="text"
          class="form-control"
          id="nama"
          name="nama"
          value="<?= isset($pelanggan) ? $pelanggan['nama'] : ''; ?>"
          placeholder="Masukan Nama Lengkap"
        />
      </div>
      <div class="form-group">
        <label for="username">Username</label>
        <input
          type="text"
          class="form-control"
          id="username"
          name="username"
          value="<?= isset($pelanggan) ? $pelanggan['username'] : ''; ?>"
          placeholder="Masukan Username"
        />
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input
          type="password"
          class="form-control"
          id="password"
          name="password"
          placeholder="Masukan Password <?= isset($pelanggan) ? 'jika ingin mengubahnya' : ''; ?>"
        />
      </div>
      <div class="form-group">
        <label for="alamat">Alamat</label>
        <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Masukan Alamat.."><?= isset($pelanggan) ? $pelanggan['alamat'] : ''; ?></textarea>
      </div>
      <div class="form-group">
        <label for="email">Email</label>
        <input
          type="email"
          class="form-control"
          id="email"
          name="email"
          value="<?= isset($pelanggan) ? $pelanggan['email'] : ''; ?>"
          placeholder="Masukan Email"
        />
      </div>
      <div class="form-group">
        <label for="telp">No Telepon</label>
        <input
          type="tel"
          pattern="[0-9]{12}"
          class="form-control"
          id="telp"
          name="telp"
          value="<?= isset($pelanggan) ? $pelanggan['no_telp'] : ''; ?>"
          placeholder="Masukan Telepon"
        />
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i><?= isset($pelanggan) ? 'Ubah' : 'Simpan'; ?></button>
    </div>
  </form>
</div>

