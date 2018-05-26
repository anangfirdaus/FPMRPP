<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1>KONFIRMASI PESANAN KUSTOM</h1>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6">
          <div class="form-group row">
            <h4>Desain yang Diinginkan</h4>
            <img src="<?php echo base_url().'assets/pesanan/'.$confirm['foto']?>">
            <input type="hidden" name="foto" value="<?php $confirm['foto']?>"/>
          </div>
          <div class="form-group row">
            <h4>Dimensi Barang Anda</h4>
              <div class="col-xs-2">
                <label>Panjang : <?php echo $confirm['panjang']; ?>m</label>
              </div>
              <div class="col-xs-2">
                <label>Tinggi : <?php echo $confirm['tinggi']; ?>m</label>
                <p></p>
              </div>
              <div class="col-xs-2">
                <label>Lebar : <?php echo $confirm['lebar']; ?>m</label>
              </div>
            </div>
            <div class="form-group row">
              <h4>Kuantitas Pesanan</h4>
              <p><?php echo $confirm['qpesan']; ?></p>
              <input type="hidden" name="qpesan" value="<?php $confirm['qpesan']?>"/>
            </div>
            <div class="form-group row">
              <h4>Total Harga Dasar</h4>
              <p><?php echo $confirm['harga']; ?></p>
              <p>Total harga akan segera diberitahukan setelah admin memvalidasi pesanan.</p>
              <input type="hidden" name="harga" value="<?php $confirm['harga']?>"/>
            </div>
            <div class="form-group row">
                <input type="hidden" name="is_submitted" value="1"/>
                <a href="<?php echo base_url("dashboard") ?>" class="btn btn-primary" role="button">Oke</a>
                <a href="<?php echo base_url("dashboard") ?>" class="btn btn-danger" role="button">Cancel</a>
            </div>
          </div>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
