<div id="page-wrapper">
  <div class="container-fluid">
  <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          Pesanan
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
                <th class="col-xs-2">Customer</th>
                <th class="col-xs-3">Alamat</th>
                <th class="col-xs-1">Kelurahan</th>
                <th class="col-xs-1">Tanggal</th>
                <th class="col-xs-1">No.HP</th>
                <th class="col-xs-1">Status</th>
                <th class="col-xs-3">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data as $d){ ?>
                <tr>
                  <td><?php echo $d['id_order']; ?></td>
                  <td><?php echo $d['customerName']; ?></td>
                  <td><?php echo $d['alamat']; ?></td>
                  <td><?php echo $d['kelurahan']; ?></td>
                  <td><?php echo $d['dateCreated']; ?></td>
                  <td><?php echo $d['phone']; ?></td>
                  <td><?php echo $d['status']; ?></td>
                  <td align="center">
                    <?php if ($d['status'] == 'sedang diproses')
                          {
                            echo '<a href='.base_url("AdminController/kirimPesanan/".$d['id_order']).' class="btn btn-success" role="button">Kirim</a>';
                          } else if ($d['status'] == 'dikirim')
                          {
                            echo '<a href='.base_url("AdminController/hapusPesanan/".$d['id_order']).' class="btn btn-danger" role="button">Hapus</a>';
                          } ?>
                    <a href="<?php echo base_url("admin/pesanan/details/".$d['id_order']); ?>" class="btn btn-primary" role="button">Detail</a>
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
