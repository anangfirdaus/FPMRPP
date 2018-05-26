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
        <form method="POST" action="<?php echo base_url("AdminController/do_balas/").$keluhan['id']; ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label>Keluhan</label>
            <p><?php echo $keluhan['keluhan'] ?></p>
          </div>
          <div class="form-group">
            <label>Tuliskan Balasan</label>
            <input class="form-control" input type="text" name="balasan" required>
          </div>
          <input type="submit" class="btn btn-success" name="submit" value="Kirim" />
          <a href="<?php echo base_url("dashboard") ?>" class="btn btn-danger" role="button">Back</a>
        </form>
      </div>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
