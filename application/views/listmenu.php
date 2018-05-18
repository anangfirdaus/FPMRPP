<div class="row">
  <?php foreach ($data as $menu) { ?>
  <div class="col-xs-12 col-md-3 ">
    <div class="thumbnail">
      <a href="<?php echo base_url('dashboard/detail/'.$menu['kode']) ?>">
        <div class="img-container" style="background-image: url(<?php echo base_url("/uploads/".$menu['gambar']) ?>);"></div>
      </a>
      <div class="caption" style="margin-right: 16px;">
        <div class="col-xs-9 col-md-9">
          <h4><strong><a href="<?php echo base_url('dashboard/detail/'.$menu['kode']) ?>"><?php echo $menu['nama'] ?></a></strong></h4>
          <p>Rp <?php echo number_format($menu['harga'], 2, ',', '.') ?></p>

        </div>
        <div class="col-xs-3 col-md-3" style="padding: 0px;">
          <a
            class="cart_add btn btn-primary"
            role="button"
            data-kode="<?php echo $menu['kode'];?>"
            data-nama="<?php echo $menu['nama'];?>"
            data-harga="<?php echo $menu['harga'];?>">
              <i class="fa fa-3x fa-shopping-cart" id=""></i>
            </a>
          <p style="margin-top: 8px; width: 100%;">
            <input
              id="<?php echo $menu['kode'];?>"
              class="form-control"
              type="number"
              name="quantity"
              min=0
              value="0">
          </p>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
</div>
