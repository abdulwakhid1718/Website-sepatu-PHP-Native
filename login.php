<?php
session_start();
require 'koneksi.php';
require 'functions.php';

if (isset($_POST['daftar'])) {
    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $telp = $_POST['telp'];

    // query tambah registrasi
    $tambah = executeQuery("INSERT tb_users (id_user, nama, username, password, email, no_telp) VALUES ('$id', '$nama', '$username', '$password', '$email', '$telp')");

    $pesan = $tambah > 0 ? ["Daftar Berhasil!", "success"] : ["Daftar Gagal Silahkan coba lagi!", "error"];

    setPesan($pesan[0], $pesan[1]);
}

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    try {
        $query = "CALL login('$user','$pass')";
        $query = $con->query($query);

        if (!$query) throw new Exception("Terjadi kesalahan: " . $con->error);
        
        $query = $query->fetch_assoc();
        // kalau berhasil login 
        $_SESSION['id_user'] = $query['txtid_user'];
        $_SESSION['nama_user'] = $query['txtnama'];
        $_SESSION['login'] = true;

        header("Location: index.php");
    } catch (Exception $e) {
        // Tangani kesalahan yang terjadi
        setPesan($e->getMessage(), "error");
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style1.css">
    <link rel="stylesheet" href="assets/css/login1.css">
    
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/c9c55908e1.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div class="main-login-content">
            <div class="body-login">
                <?php getPesan(); ?>
                <i class="fa-solid fa-users fa-2xl"></i>
                <div class="header-login">
                    <h1>Selamat Datang</h1>
                    <span>Silahkan Login untuk berbelanja</span>
                </div>
            
                <form class="form-login" action="" method="post">
                    <div class="input-form">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" placeholder="Masukan Username">
                    </div>
                    <div class="input-form">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Masukan Password">
                    </div>
                    <button type="submit" class="btn-submit" name="login">Sign In</button>
                </form>
                <a href="#" data-toggle="modal" data-target="#modal-register" class="text-sm">belum memiliki akun ?</a>
            </div>
        </div>
        <div class="right-content">
        </div>
        <div class="modal fade" id="modal-register">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                    <h4 class="modal-title">Daftar Pengguna baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" value="<?= getOneData("CALL generate_id('pelanggan');")['id']; ?>" hidden>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" placeholder="Masukan Nama" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" placeholder="Masukan Username" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" placeholder="Masukan Password"  class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="2" placeholder="Masukan Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" placeholder="Masukan Email" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="telp">Telepon</label>
                        <input type="tel" pattern="[0-9]{12}" class="form-control" id="telp" name="telp" placeholder="Masukan No" >
                    </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" name="daftar" class="btn btn-primary">Tambahkan</button>
                    </div>
                </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>