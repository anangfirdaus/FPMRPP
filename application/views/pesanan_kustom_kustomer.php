<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Pesanan Kustom
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
                <th class="col-xs-1">ID</th>
                <th class="col-xs-1">Foto</th>
                <th class="col-xs-1">Tanggal</th>
                <th class="col-xs-1">Status</th>
                <th class="col-xs-3">Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d){ ?>
                <tr>
                  <td><?php echo $d['id_order']; ?></td>
                  <td><?php echo $d['foto']; ?></td>
                  <td><?php echo $d['dateCreated']; ?></td>
                  <td><?php echo $d['status']; ?></td>
                  <td><?php echo $d['harga']; ?></td>
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
