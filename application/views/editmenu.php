<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Edit Menu
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6">
        <form method="POST" action="<?php echo base_url("index.php/AdminController/do_update/".$kode); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label>Nama</label>
            <input class="form-control" input type="text" name="nama" value="<?php echo $nama; ?>" required>
          </div>
          <div class="form-group">
            <label>Harga</label>
            <input class="form-control" input type="text" name="harga" value="<?php echo $harga; ?>" required>
          </div>
          <div class="form-group">
            <label>Jenis</label>
            <select class="form-control" name="jenis" required>
              <option <?php if($jenis == "makanan") {echo "selected";} ?> value="makanan">Makanan</option>
              <option <?php if($jenis == "minuman") {echo "selected";} ?> value="minuman">Minuman</option>
              <option <?php if($jenis == "snack") {echo "selected";} ?> value="snack">Snack</option>
            </select>
          </div>
          <div class="form-group">
            <label>Deskripsi</label>
            <textarea class="form-control" name="deskripsi" rows="3" cols="80"><?php echo $deskripsi; ?></textarea>
          </div>
          <div class="form-group">
            <label style="margin-bottom: 16px;">Gambar</label>
            <br>
            <img style="margin-bottom:16px; width: 300px;" class="img-thumbnail" src="<?php echo base_url("/uploads/".$gambar) ?>"/>
            <input input type="file" name="foto">
          </div>
          <input type="submit" class="btn btn-success" name="submit" value="Update" />
          <a href="<?php echo base_url("admin/menu") ?>" class="btn btn-danger" role="button">Back</a>
        </form>
      </div>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
