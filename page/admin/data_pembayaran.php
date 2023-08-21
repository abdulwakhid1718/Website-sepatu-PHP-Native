<?php

if (isset($_POST['konfirmasi_bayar'])) {
    $id_pesanan = $_POST['id_pesanan'];
    $update_status = executeQuery("UPDATE tb_pesanan SET status = 'diproses' WHERE id_pesanan = '$id_pesanan'");


    if ($update_status) {
        executeQuery("DELETE FROM tb_pembayaran WHERE id_pesanan = '$id_pesanan'");
        setPesan("Berhasil Konfirmasi Pembayaran", "success");
    }
}

?>
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Pembayaran</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Pembayaran</li>
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
                          Tanggal Dibayar
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Engine version: activate to sort column ascending"
                        >
                          Total Harga
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Engine version: activate to sort column ascending"
                        >
                          Metode Pembayaran
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $data_pembayaran = getAllData("SELECT * FROM tampil_pembayaran");
                        foreach ($data_pembayaran as $key => $value) :
                      ?>
                        <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0">
                          <?= $value['nama']; ?>
                        </td>
                        <td><?= $value['id_pesanan']; ?></td>
                        <td><?= $value['tgl_pesanan']; ?></td>
                        <td><?= $value['total_harga_pesanan']; ?></td>
                        <td><?= $value['nama_bank']; ?></td>
                        <td>
                          <button data-toggle="modal" data-id="<?= $value['id_pesanan']; ?>" data-gambar="<?= $value['bukti_pembayaran']; ?>" data-target="#modal-cek-bayar" type="button" class="btn btn-success btn-sm lihat_bukti"><i class="fa fa-info-circle"> </i> Bukti Pembayaran</button>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">Nama Pembeli</th>
                        <th rowspan="1" colspan="1">ID Pesanan</th>
                        <th rowspan="1" colspan="1">Tanggal Dibayar</th>
                        <th rowspan="1" colspan="1">Total Harga</th>
                        <th rowspan="1" colspan="1">Metode Pembayaran</th>
                        <th rowspan="1" colspan="1">Aksi</th>
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

<!-- Modal Box Tambah Ukuran -->
<div class="modal fade" id="modal-cek-bayar">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="" method="post">
        <div class="modal-header">
          <h4 class="modal-title">Bukti Pembayaran</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="text" id="id_pesanan" name="id_pesanan" hidden>
          <img src="assets/img/bukti/" id="gambar_bukti" class="img-responsive img-thumbnail" alt="">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" name="konfirmasi_bayar" class="btn btn-primary">Konfirmasi</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
