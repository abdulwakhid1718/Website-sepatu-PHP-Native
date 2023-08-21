<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<?php 

$latest_order = getAllData("SELECT * FROM tampil_list_pesanan ORDER BY tgl_pesanan DESC");
$dashboard = getOneData("CALL dashboard()");

?>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fa-solid fa-car fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Supplier</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_supplier'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <i class="fa-solid fa-cart-shopping fa-bounce"></i>    
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Produk</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_produk'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix hidden-md-up"></div>

        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fa-solid fa-store fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Jumlah Stok</span>
            <span class="info-box-number"><?= $dashboard['jumlah_stok'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1">
                <i class="fa-solid fa-users fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Users</span>
            <span class="info-box-number"><?= $dashboard['jumlah_user'] ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1">
                <i class="fa-solid fa-sack-dollar fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Pendapatan</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_pendapatan'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-6">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <i class="fa-solid fa-face-tired fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Pesanan Belum Lunas</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_belum_bayar'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1">
                <i class="fa-solid fa-credit-card fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Pesanan Lunas</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_lunas'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        
        <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1">
                <i class="fa-solid fa-truck-fast fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Dikirim</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_dikirim'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1">
                <i class="fa-solid fa-clock fa-bounce"></i>
            </span>

            <div class="info-box-content">
            <span class="info-box-text">Pesanan Diproses</span>
            <span class="info-box-number">
                <?= $dashboard['jumlah_diproses'] ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        </div>
        
        <!-- /.col -->
    </div>
    <!-- /.row -->



    <div class="row">
        <div class="col-md-5">
        <div class="card">
            <div class="card-header">
            <h5 class="card-title">Monthly Recap Report</h5>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <div class="btn-group">
                <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fas fa-wrench"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-right" role="menu">
                    <a href="#" class="dropdown-item">Action</a>
                    <a href="#" class="dropdown-item">Another action</a>
                    <a href="#" class="dropdown-item">Something else here</a>
                    <a class="dropdown-divider"></a>
                    <a href="#" class="dropdown-item">Separated link</a>
                </div>
                </div>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <div class="row">
                <div class="col-md-8">
                <p class="text-center">
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <p class="text-center">
                        <strong>Goal Completion | </strong>
                        <strong>Sales: 1 Jan, 2014 - 30 Jul, 2014</strong>
                </p>

                <div class="progress-group">
                    Pemesanan
                    <span class="float-right"><b><?= $dashboard['jumlah_pesanan_bulan']?></b>/50</span>
                    <div class="progress progress-sm">
                    <div class="progress-bar bg-danger" style="width: <?= $dashboard['jumlah_pesanan_bulan'] / 50 * 100;?>%"></div>
                    </div>
                </div>

                <!-- /.progress-group -->
                <div class="progress-group">
                    <span class="progress-text">
                        Pendapatan
                    </span>
                    <span class="float-right"><b>Rp. <?= $dashboard['jumlah_pendapatan_bulan']?></b>/ Rp. 80000000</span>
                    <div class="progress progress-sm">
                    <div class="progress-bar bg-success" style="width: <?= ($dashboard['jumlah_pendapatan_bulan'] / 8000000) * 100 ;?>%"></div>
                    </div>
                </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- ./card-body -->
            
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
        <!-- TABLE: LATEST ORDERS -->
        <div class="col-md-7">
        <div class="card">
            <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table m-0">
                <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Status</th>
                    <th>Popularity</th>
                </tr>
                </thead>
                <tbody>
                <?php
                
                
                foreach ($latest_order as $key => $value) :
                ?>
                <tr>
                    <td><a href="pages/examples/invoice.html"><?= $value['id_pesanan']?></a></td>
                    <td><?= $value['nama_produk']?></td>
                    <td><span class="badge badge-<?= $value['status'] == 'pending' ? 'danger' : 'success'?>"><?= $value['status']?></span></td>
                    <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20"><?= $value['tgl_pesanan']?></div>
                    </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Place New Order</a>
            <a href="javascript:void(0)" class="btn btn-sm btn-secondary float-right">View All Orders</a>
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->

    </div>
    <!-- /.row -->
    </div><!--/. container-fluid -->
</section>
<!-- /.content -->