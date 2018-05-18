<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Tambah Menu
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6">
        <form method="POST" action="<?php echo base_url()."index.php/AdminController/do_insert"; ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" input type="text" name="nama" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input class="form-control" input type="text" name="harga" required>
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select class="form-control" name="jenis" required>
              <option value="makanan">Makanan</option>
              <option value="minuman">Minuman</option>
              <option value="snack">Snack</option>
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3" cols="80"></textarea>
          </div>
          <div class="form-group">
            <label style="margin-bottom: 16px;">Foto</label>
            <input input type="file" name="foto" required>
          </div>
          <input type="submit" class="btn btn-success" name="submit" value="Save" />
          <a href="<?php echo base_url("admin/menu") ?>" class="btn btn-danger" role="button">Cancel</a>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
