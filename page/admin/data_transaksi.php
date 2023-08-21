<?php 
    $status = $_GET['p']; 
    
    if (isset($_POST['kirim'])) {
        $id_pesanan = $_POST['id']; 
        $ubah_status = executeQuery("UPDATE tb_pesanan SET status='sedang dikirim' where id_pesanan='$id_pesanan'");
    }
?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-capitalize">Data Transaksi <?= $status?></h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item text-capitalize active">Data Transaksi <?= $status?></li>
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
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row mb-2">
                <div class="col-sm-12 col-md-6">
                  <div class="dt-buttons btn-group flex-wrap">
                    <button
                      class="btn btn-secondary buttons-csv buttons-html5"
                      tabindex="0"
                      aria-controls="example1"
                      type="button"
                    >
                      <span>CSV</span>
                    </button>
                    <button
                      class="btn btn-secondary buttons-excel buttons-html5"
                      tabindex="0"
                      aria-controls="example1"
                      type="button"
                    >
                      <span>Excel</span>
                    </button>
                    <button
                      class="btn btn-secondary buttons-pdf buttons-html5"
                      tabindex="0"
                      aria-controls="example1"
                      type="button"
                    >
                      <span>PDF</span>
                    </button>
                  </div>
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" class="dataTables_filter">
                    <label
                      >Search:
                      <input
                        type="search"
                        class="form-control form-control-sm"
                        placeholder=""
                        aria-controls="example1"
                      />
                    </label>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
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
                          aria-label="ID Suplier: activate to sort column descending"
                        >
                          No.
                        </th>
                        <th
                          class="sorting sorting_asc"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-sort="ascending"
                          aria-label="ID Suplier: activate to sort column descending"
                        >
                          Nama Pembeli
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Browser: activate to sort column ascending"
                        >
                          ID Pesanan
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Engine version: activate to sort column ascending"
                        >
                          Alamat Pemesan
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Engine version: activate to sort column ascending"
                        >
                          Tanggal Pesanan
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="CSS grade: activate to sort column ascending"
                        >
                          Total
                        </th>
                        <?php if ($status == 'diproses') : ?>
                        <th>
                          Aksi
                        </th>
                        <?php endif; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        $data_list_pesanan = getAllData("SELECT * FROM tampil_list_pesanan INNER JOIN tb_users usr ON id_users = usr.id_user WHERE status='$status'");
                        while ($pesanan = $data_list_pesanan->fetch_assoc()):
                      ?>
                        <tr class="odd">
                        <td><?= $no++ ?></td>
                        <td class="dtr-control sorting_1" tabindex="0">
                          <?= $pesanan['nama']; ?>
                        </td>
                        <td><?= $pesanan['id_pesanan']; ?></td>
                        <td><?= $pesanan['alamat']; ?></td>
                        <td><?= $pesanan['tgl_pesanan']; ?></td>
                        <td><?= $pesanan['total_harga_pesanan']; ?></td>
                        <?php if ($status == 'diproses') : ?>
                        <td>
                            <form action="" method="post">
                                <input type="text" name="id" value="<?= $pesanan['id_pesanan']; ?>" hidden>
                                <button type="submit" class="btn btn-primary"name="kirim"><i class="fa fa-truck-fast"> </i> Kirim</button>
                            </form>
                        </td>
                        <?php endif; ?>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">No.</th>
                        <th rowspan="1" colspan="1">Nama Pembeli</th>
                        <th rowspan="1" colspan="1">ID Pesanan</th>
                        <th rowspan="1" colspan="1">Alamat Pemesan</th>
                        <th rowspan="1" colspan="1">Tanggal Pesanan</th>
                        <th rowspan="1" colspan="1">Total</th>
                        <?php if ($status == 'diproses') : ?>
                        <th>
                          Aksi
                        </th>
                        <?php endif; ?>
                      </tr>
                    </tfoot>
                  </table>
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
