<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Detail Balasan
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6">
        <div class="form-group">
          <label>Keluhan</label>
          <p><?php echo $balasan['keluhan'] ?></p>
        </div>
        <?php if ($balasan['balasan']!=""): ?>
          <div class="form-group">
            <label>Isi Balasan</label>
            <p><?php echo $balasan['balasan'] ?></p>
          </div>
        <?php endif; ?>
      </div>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
