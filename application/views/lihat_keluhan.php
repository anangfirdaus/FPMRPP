<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Keluhan
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <br>
    <div class="row">
      <div class="col-lg-12">
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped">
            <thead>
              <tr>
                <th class="col-xs-2">Customer</th>
                <th class="col-xs-1">Tanggal</th>
                <th class="col-xs-1">Keluhan</th>
                <th class="col-xs-1">Balasan</th>
                <th class="col-xs-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d){ ?>
                <tr>
                  <td><?php echo $d['customerName']; ?></td>
                  <td><?php echo $d['tanggal_keluhan']; ?></td>
                  <td><?php echo $d['keluhan']; ?></td>
                  <td><?php echo $d['balasan']; ?></td>
                  <td align="center">
                    <?php if ($d['balasan']==""): ?>
                      <a href=<?php echo base_url("AdminController/balas_keluhan/".$d['id'])?> class="btn btn-primary" role="button">Balas</a>
                    <?php endif; ?>
                    <a href="<?php echo base_url("AdminController/detail_keluhan/".$d['id']); ?>" class="btn btn-default" role="button">Detail</a>
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
