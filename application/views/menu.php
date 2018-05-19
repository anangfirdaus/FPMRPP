<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Menu
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <a href="menu/tambah" class="btn btn-success pull-right" role="button">Tambah Menu</a>
        </div>
    </div>
    <br>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th class="col-xs-1">Kode</th>
                <th class="col-xs-2">Nama</th>
                <th class="col-xs-1">Harga</th>
                <th class="col-xs-4">Deskripsi</th>
                <th class="col-xs-1">Gambar</th>
                <th class="col-xs-2">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d){ ?>
                <tr>
                  <td><?php echo $d['kode']; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td>Rp <?php echo number_format($d['harga'], 2, ',', '.'); ?></td>
                  <td><?php echo $d['deskripsi']; ?></td>
                  <td><a href="<?php echo base_url("/uploads/".$d['gambar']); ?>">Link</a></td>
                  <td align="center">
                    <a href="<?php echo base_url("AdminController/editMenu/".$d['kode']); ?>" class="btn btn-primary" role="button">Update</a>
                    <a href="<?php echo base_url("AdminController/deleteMenu/".$d['kode']); ?>" class="btn btn-danger" role="button">Delete</a>
                  </td>
                </tr>
              <?php }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
