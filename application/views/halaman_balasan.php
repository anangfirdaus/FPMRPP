<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Balasan Keluhan
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
                <th class="col-xs-1">Tanggal</th>
                <th class="col-xs-1">Isi Keluhan</th>
                <th class="col-xs-1">Balasan</th>
                <th class="col-xs-1">Detail</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($balasan as $d){ ?>
                <?php if ($d['balasan']!=""){ ?>
                  <tr>
                    <td><?php echo $d['tanggal_keluhan']; ?></td>
                    <td><?php echo $d['keluhan']; ?></td>
                    <td><?php echo $d['balasan']; ?></td>
                    <td><a href="<?php echo base_url("KantinController/balasan_detail/".$d['id']); ?>" class="btn btn-default" role="button">Detail</a></td>
                  </tr>
              <?php }}?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
