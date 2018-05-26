<?php
  if($this->input->post('is_submitted')){
    if($this->session->userdata("mebel") == 'lemari'){
      $kayu =set_value('kayu');
      $triplek = set_value('triplek');}
    elseif($this->session->userdata("mebel") == 'sofa'){
      $lapisan = set_value('lapisan');
      $busa = set_value('busa');
    }
  }
 ?>
<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <h1>PESANAN KUSTOM</h1>
    <!-- /.row -->
    <div class="row">
      <div class="col-lg-6">
        <form method="POST" action="<?php echo base_url()."/KantinController/pesan_kustom"; ?>" enctype="multipart/form-data">
          <div class="form-group row">
            <h4>Upload Foto Furnitur yang Diinginkan</h4>
            <input input type="file" name="foto" required>
          </div>
          <div class="form-group row">
            <h4>Dimensi Barang Dalam Meter</h4>
              <div class="col-xs-2">
                <label>Panjang</label>
                <input type="text" class="form-control" name="panjang" placeholder="Panjang">
              </div>
              <div class="col-xs-2">
                <label class="col-sm-5 col-form-label">Tinggi</label>
                <input type="text" class="form-control" name="tinggi" placeholder="Tinggi">
              </div>
              <div class="col-xs-2">
                <label class="col-sm-2 col-form-label">Lebar</label>
                <input type="text" class="form-control" name="lebar" placeholder="Lebar">
              </div>
            </div>
            <?php if ($this->session->userdata("mebel") == 'lemari'){ ?>
            <div class="form-group row">
              <h4>Material yang Akan digunakan</h4>
              <label>Jenis Kayu</label>
                <select class="form-check-input" name="kayu" value="<?=$kayu?>">
                  <?php foreach ($materials as $material): ?>
                    <?php if ($material->jenis == 'Kayu Solid'): ?>
                      <option value="<?=$material->harga ?>"><?=$material->nama_material ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                      <option value="0">Tidak dipilih</option>
                </select>
            </div>
            <div class="form-group row">
              <label>Triplek</label>
                <select class="form-check-input" name="triplek" value="<?=$triplek?>">
                  <?php foreach ($materials as $material): ?>
                    <?php if ($material->jenis == 'Triplek'): ?>
                      <option value="<?=$material->harga ?>"><?=$material->nama_material ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                      <option value="0">Tidak dipilih</option>
                </select>
              </div>
            <?php }elseif ($this->session->userdata("mebel") == 'sofa') { ?>
            <div class="form-group row">
                <label>Lapisan Sofa</label>
                  <select class="form-check-input" name="lapisan" value="<?=$lapisan?>">
                    <?php foreach ($materials as $material): ?>
                      <?php if ($material->jenis == 'lapisan sofa'): ?>
                        <option value="<?=$material->harga ?>"><?=$material->nama_material ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                        <option value="0">Tidak dipilih</option>
                  </select>
                </div>
            <div class="form-group row">
                <label>Busa Sofa</label>
                  <select class="form-check-input" name="busa" value="<?=$busa?>">
                    <?php foreach ($materials as $material): ?>
                      <?php if ($material->jenis == 'busa sofa'): ?>
                        <option value="<?=$material->harga ?>"><?=$material->nama_material ?></option>
                      <?php endif; ?>
                    <?php endforeach; ?>
                        <option value="0">Tidak dipilih</option>
                  </select>
                </div>
            <?php } ?>
            <div class="form-group row">
              <h4>Kuantitas Pesanan</h4>
              <input type="text" name="qPesanan" placeholder="Jumlah Pesan">
            </div>
            <div class="form-group row">
                <input type="hidden" name="is_submitted" value="1"/>
                <input type="submit" class="btn btn-success" name="submit" value="Save" />
                <a href="<?php echo base_url("admin/menu") ?>" class="btn btn-danger" role="button">Cancel</a>
            </div>
          </div>
        </form>
      </div>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
