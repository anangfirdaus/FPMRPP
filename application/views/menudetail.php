<div class="row">
  <div class="col-xs-12 col-md-4">
    <div class="img-container" style="background-image: url(<?php echo base_url("/uploads/".$data[0]['gambar']) ?>); height: 300px;"></div>
  </div>
  <div class="col-xs-12 col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h2><strong><?php echo $data[0]['nama'] ?></strong>
          <!-- <span class="pull-right">
            <a href="btn btn-primary pull-right" class="btn btn-primary" role="button"><i class="fa fa-lg fa-shopping-cart"></i></a>
          </span> -->
        </h2>

      </div>
      <div class="panel-body">
        <h4><strong>Rp <?php echo number_format($data[0]['harga'], 2, ',', '.') ?></strong></h4>
        <br>
        <p style="font-size: 12pt"><?php echo $data[0]['deskripsi'] ?></p>
      </div>
    </div>
  </div>
</div>
