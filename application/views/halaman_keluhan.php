<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Balas Keluhan
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6">
        <form method="POST" action="<?php echo base_url("KantinController/do_ngeluh/"); ?>" enctype="multipart/form-data">
          <div class="form-group">
            <label>Tuliskan Saran atau Keluhan anda</label>
            <input class="form-control" input type="text" name="keluhan" required>
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
