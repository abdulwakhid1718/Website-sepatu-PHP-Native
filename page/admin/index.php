<?php 
ob_start(); 

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Sweet Alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.min.css">
  <!-- My style -->
  <link rel="stylesheet" href="assets/css/style1.css">
  <script src="https://kit.fontawesome.com/c9c55908e1.js" crossorigin="anonymous"></script>
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="logout.php" class="nav-link">Logout</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">T-SHOES</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="assets/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block text-capitalize"><?= $_SESSION['nama_user'];?></a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link 
            <?=
              !isset($_GET['p']) ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-header">Data Master</li>
          <li class="nav-item">
            <a href="?p=produk" class="nav-link 
            <?=
              isset($_GET['p']) && $_GET['p'] == 'produk' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fa-solid fa-cart-shopping"></i>
              <p>
                Data Produk
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?p=pelanggan" class="nav-link
            <?=
              isset($_GET['p']) && $_GET['p'] == 'pelanggan' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-user-alt"></i>
              <p>
                Data Pelanggan
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?p=suplier" class="nav-link
            <?=
              isset($_GET['p']) && $_GET['p'] == 'suplier' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-car-alt"></i>
              <p>
                Data Supplier
              </p>
            </a>
          </li>
          
          <li class="nav-header">Data Transaksi</li>
          
          <li class="nav-item">
            <a href="?p=pending" class="nav-link 
            <?=
              isset($_GET['p']) && $_GET['p'] == 'pending' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-face-tired"></i>
              <p>
                Pesanan Pending
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?p=diproses" class="nav-link
            <?=
              isset($_GET['p']) && $_GET['p'] == 'diproses' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Pesanan Diproses
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?p=sedang dikirim" class="nav-link
            <?=
              isset($_GET['p']) && $_GET['p'] == 'sedang dikirim' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-truck-fast"></i>
              <p>
                Pesanan Dikirim
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="?p=pembayaran" class="nav-link
            <?=
              isset($_GET['p']) && $_GET['p'] == 'pembayaran' ? 'active' : ''; 
            ?> ">
              <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Pembayaran
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php
      if (!isset($_SESSION['login'])) {
          header("Location: login.php");
          ob_end_flush();
      }

      if (!isset($_GET['p'])) {
        include 'dashboard.php';
      }else{
        // Pelanggan
        if ($_GET['p'] == 'pelanggan') {
          if (!isset($_GET['a'])) {
            include 'data_pelanggan.php';
          }
          else if ($_GET['a'] == 'tambah' || $_GET['a'] == 'ubah') {
            include 'form_pelanggan.php';
          }
          else if ($_GET['a'] == 'hapus') {
            include 'hapus_pelanggan.php';
          }
        }

        // Produk
        if ($_GET['p'] == 'produk') {
          if (!isset($_GET['a'])) {
            include 'data_produk.php';
          }
          elseif ($_GET['a'] == 'tambah') {
            include 'form_produk.php';
          }
          else if ($_GET['a'] == 'detail') {
            include 'detail_produk.php';
          }
          else if ($_GET['a'] == 'hapus') {
            include 'hapus_produk.php';
          }
          else if ($_GET['a'] == 'hapus_ukuran') {
            include 'hapus_ukuran.php';
          }
        }

        // Suplier
        if ($_GET['p'] == 'suplier') {
          if (!isset($_GET['a'])) {
            include 'data_suplier.php';
          }
          else if ($_GET['a'] == 'tambah' || $_GET['a'] == 'ubah') {
            include 'form_suplier.php';
          }
          else if ($_GET['a'] == 'hapus') {
            include 'hapus_suplier.php';
          }
        }

        if ($_GET['p'] == 'pending' || $_GET['p'] == 'diproses' || $_GET['p'] == 'sedang dikirim') {
          include 'data_transaksi.php';
        }
        if ($_GET['p'] == 'pembayaran') {
          include 'data_pembayaran.php';
        }
      }

      
    
    ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.2.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="plugins/raphael/raphael.min.js"></script>
<script src="plugins/jquery-mapael/jquery.mapael.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="assets/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="assets/js/pages/dashboard2.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>


<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>

<script>
  const checkboxes = document.querySelectorAll(".checkbox-size");
  const inputs = document.querySelectorAll(".inp-stok");

  checkboxes.forEach((checkbox, index) => {
    checkbox.addEventListener("change", function() {
      if (this.checked) {
        inputs[index].disabled = false;
        inputs[index].value = 1;
      } else {
        inputs[index].disabled = true;
        inputs[index].value = '';
      }
    });
  });
</script>
<script>
  const imageInput = document.getElementById("pickfoto");
  const imagePreview = document.getElementById("imagePreview");

  imageInput.addEventListener("change", function() {
    const file = this.files[0];

    if (file) {
      const reader = new FileReader();

      reader.addEventListener("load", function() {
        imagePreview.src = reader.result;
        imagePreview.style.display = "block";
      });

      reader.readAsDataURL(file);
    }
  });
</script>
<script>
  $(document).ready(function() {
    // Mendengarkan peristiwa click pada elemen dengan kelas .btn-primary
    $('.btn-tambah-stok').click(function() {
      var uk = $(this).data('ukuran');

      // Menempatkan data ke dalam elemen dengan id dataModal
      $('#dataUkuran').val(uk);
    });
  });
</script>
<script>
  $(document).ready(() => {
    $('#ubah-produk').click(() => {
      $('#submitproduk').prop('disabled', false);
      $('.form-group input').prop('disabled', false);
      $('.form-group select').prop('disabled', false);
      $('.form-group textarea').prop('disabled', false);

      $('#ubah-produk').prop('disabled', true);
    })
  })
</script>
<script>
  $(document).ready(() => {
    $('.lihat_bukti').click(function() {
      var bukti = $(this).data('gambar');
      var id = $(this).data('id');
      $('#gambar_bukti').attr('src', 'assets/img/bukti/' + bukti);
      $('#id_pesanan').val(id);
    });
  });

</script>
</body>
</html>
