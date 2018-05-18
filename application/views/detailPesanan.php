<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Pesanan <?php echo $data[0]['id_pesanan']; ?>
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
                <th class="col-xs-1">No.</th>
                <th class="col-xs-3">Nama item</th>
                <th class="col-xs-1">Jumlah</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach($data as $d){ ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $d['nama']; ?></td>
                  <td><?php echo $d['jumlah']; ?></td>
                </tr>
              <?php $no++; }?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
      <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
