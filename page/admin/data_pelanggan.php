<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Pelanggan</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Pelanggan</li>
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
                  <a href="?p=pelanggan&a=tambah" class="btn btn-success mr-2"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a>
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
                          aria-label="ID Pelanggan: activate to sort column descending"
                        >
                          No.
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Browser: activate to sort column ascending"
                        >
                          Nama
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Platform(s): activate to sort column ascending"
                        >
                          Username
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Engine version: activate to sort column ascending"
                        >
                          Alamat
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="CSS grade: activate to sort column ascending"
                        >
                          No Telp
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        $data_pelanggan = getAllData("SELECT * FROM tb_users where id_user NOT LIKE '%ADM%'");
                        while ($pelanggan = $data_pelanggan->fetch_assoc()):
                      ?>
                        <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0">
                          <?= $no++; ?>
                        </td>
                        <td><?= $pelanggan['nama']; ?></td>
                        <td><?= $pelanggan['username']; ?></td>
                        <td><?= $pelanggan['alamat']; ?></td>
                        <td><?= $pelanggan['no_telp']; ?></td>
                        <td>
                          <a href="?p=pelanggan&a=ubah&id=<?= $pelanggan['id_user']; ?>" type="button" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                          <a href="?p=pelanggan&a=hapus&id=<?= $pelanggan['id_user']; ?>" type="button" class="btn btn-danger btn-sm" id="confirmDelete"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">No.</th>
                        <th rowspan="1" colspan="1">Nama</th>
                        <th rowspan="1" colspan="1">Username</th>
                        <th rowspan="1" colspan="1">Alamat</th>
                        <th rowspan="1" colspan="1">No Telp</th>
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
