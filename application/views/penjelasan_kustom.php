<div id="page-wrapper">
  <div class="container-fluid">
    <!-- Page Heading -->
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header">
          PESANAN KUSTOM
        </h1>
      </div>
    </div>
    <!-- /.row -->
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <div class="list-group">
  				<div class="panel panel-primary">
  					<div style="text-align:center; font-size:25px" class="panel-heading">Penjelasan Kustom Sofa</div>
  					<div style="font-size:15px; "class="panel-body">
              <img src="<?php echo base_url("/assets/images/index.jpg")?>" alt="Gambar Sofa" style="width:250px;height:150px;display:block;margin-left:auto;margin-right:auto;">
                Sofa terdiri dari beberapa bagian yaitu lapisan yang membalut sofa, busa, dan lainnya. untuk pembuatan
                sofa dihitung berdasarkan beberapa faktor yaitu bahan yang digunakan dan dimensi dari sofa. Setiap dimensi
                1x1meter membutuhkan 2 lapisan sofa dan 2buah busa untuk mengisi sofa.
            </div>
            <div class="panel-footer" style="display:block;">
              <?=anchor('KantinController/Custom_order/sofa', 'Kustom Sofamu Sekarang', ['class'=>'btn btn-primary btn-sm','style'=>'display:block;margin-left:auto;margin-right:auto;'])?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-sm-6">
        <div class="list-group">
  				<div class="panel panel-primary">
  					<div style="text-align:center; font-size:25px" class="panel-heading">Penjelasan Kustom Lemari</div>
  					<div style="font-size:15px; "class="panel-body">
              <img src="<?php echo base_url("/assets/images/lemari.jpg") ?>" alt="Gambar Sofa" style="width:200px;height:150px;display:block;margin-left:auto;margin-right:auto;">
                Lemari terdiri dari beberapa bagian yaitu kayu solid untuk exterior, triplek untuk bagian tertentu,
                dan lainnya. untuk pembuatan lemari dihitung berdasarkan beberapa faktor yaitu bahan yang digunakan dan
                dimensi dari lemari. Setiap dimensi 1x1 meter membutuhkan 2 kayu solid dan 2 buah triplek.
            </div>
            <div class="panel-footer" style="display:block;">
              <?=anchor('KantinController/Custom_order/lemari', 'Kustom Lemarimu Sekarang', ['class'=>'btn btn-primary btn-sm','style'=>'display:block;margin-left:auto;margin-right:auto;'])?>
            </div>
          </div>
        </div>
      </div>
	   </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
