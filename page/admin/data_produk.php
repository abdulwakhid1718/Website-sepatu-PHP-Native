<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Produk</h1>
      </div>
      <!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Data Produk</li>
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
                  <a href="?p=produk&a=tambah" class="btn btn-success mr-2"><i class="fa fa-plus-square mr-2"></i>Tambah Data</a>
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
                          aria-label="ID Produk: activate to sort column descending"
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
                          Nama Sepatu
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Platform(s): activate to sort column ascending"
                        >
                          Merek
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="Engine version: activate to sort column ascending"
                        >
                          Kategori
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="CSS grade: activate to sort column ascending"
                        >
                          Harga
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="CSS grade: activate to sort column ascending"
                        >
                          Total Stok
                        </th>
                        <th
                          class="sorting"
                          tabindex="0"
                          aria-controls="example2"
                          rowspan="1"
                          colspan="1"
                          aria-label="CSS grade: activate to sort column ascending"
                        >
                          Warna
                        </th>
                        <th>
                          Aksi
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $no = 1;
                        $data_produk = getAllData("SELECT * FROM tb_produk");
                        while ($produk = $data_produk->fetch_assoc()):
                      ?>
                        <tr class="odd">
                        <td class="dtr-control sorting_1" tabindex="0">
                          <?= $no++; ?>
                        </td>
                        <td><?= $produk['nama_produk']; ?></td>
                        <td><?= $produk['merek']; ?></td>
                        <td><?= $produk['kategori']; ?></td>
                        <td><?= $produk['harga']; ?></td>
                        <td><?= $produk['total_stok']; ?></td>
                        <td><?= $produk['warna']; ?></td>
                        <td>
                          <a href="?p=produk&a=detail&id=<?= $produk['id_produk']; ?>" type="button" class="btn btn-primary btn-sm mr-1"><i class="fa fa-info-circle mr-2"></i>Detail</a>
                          <a href="?p=produk&a=hapus&id=<?= $produk['id_produk']; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td>
                      </tr>
                      <?php endwhile; ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">No.</th>
                        <th rowspan="1" colspan="1">Nama Sepatu</th>
                        <th rowspan="1" colspan="1">Merek</th>
                        <th rowspan="1" colspan="1">Kategori</th>
                        <th rowspan="1" colspan="1">Harga</th>
                        <th rowspan="1" colspan="1">Total Stok</th>
                        <th rowspan="1" colspan="1">Warna</th>
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
