<?php
  if ($this->session->userdata("user") == null) {
    redirect(base_url('login'));
  }
?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/normalize.css";?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/main.css";?>" media="screen" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/bootstrap.css"?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/style-portfolio.css"?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/picto-foundry-food.css"?>">
    <link rel="stylesheet" href="<?php echo base_url()."assets/css/jquery-ui.css"?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url("assets/css/font-awesome.min.css")?>" rel="stylesheet">
    <link rel="icon" href="<?php echo base_url("assets/favicon-1.ico")?>" type="image/x-icon">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .thumbnail, .btn, .panel, .panel-heading, .panel-body {
          border-radius: 0px !important;
          border: 0px;
        }
        .thumbnail {
          min-height: 325px;
          padding: 0px;
          box-shadow: 2px 2px 10px #ddd;
        }
        .thumbnail:hover {
          box-shadow: 4px 12px 20px #ddd;
        }
        .img-container {
          width: 100%;
          height: 200px;
          background-position: center center;
          background-repeat: no-repeat;
          background-size: 100%;
        }
        .img-container:hover {
          filter: saturate(150%);
        }
        .btn-primary {
          background-color: #6c8f34;
          padding: 12px;
        }
        .btn-primary:hover {
          background-color: #5C782F;
        }
        a, a:hover {
          color: #5C782F;
        }
        .panel {
          min-height: 300px;
          box-shadow: 2px 2px 10px #ddd;
        }
        select option[data-default] {
          color: #F83C22;
        }
    </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="row">
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Rizki Mebel</a>
        </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav main-nav  clear navbar-right">
            <li><a class="color_animation" href="<?php echo base_url("dashboard/") ?>">PRODUK</a></li>
            <li><a class="color_animation" href="<?php echo base_url("dashboard/keranjang") ?>">KERANJANG</a></li>
            <li><a class="color_animation" href="<?php echo base_url("KantinController/Penjelasan_kustom") ?>">KUSTOM PESANAN</a></li>
            <li><a class="color_animation" href="<?php echo base_url("KantinController/pesanan/") ?>">PESANAN</a></li>
            <li>
              <a href="<?php echo base_url('logout'); ?>" class="color_animation">
                LOGOUT
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <div class="container-fluid" style="margin-top: 100px;">
      <?php $this->load->view($this->session->userdata('userpage')); ?>
  </div>
</body>
<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery-1.10.2.min.js"?>"> </script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/bootstrap.min.js"?>"> </script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery-1.10.2.js"?>"> </script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.mixitup.min.js"?>"> </script>
<script type="text/javascript" src="<?php echo base_url()."assets/js/main.js"?>"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('.cart_add').click(function(){
      console.log("clicked");
      var kode    = $(this).data("kode");
      var nama  = $(this).data("nama");
      var harga = $(this).data("harga");
      var jumlah  = $('#' + kode).val();
      console.log(kode + " " + nama + " " + jumlah);
      $.ajax({
        url : "<?php echo base_url("KantinController/cart_add");?>",
        method : "POST",
        data : {kode: kode, nama: nama, harga: harga, jumlah: jumlah},
        success: function(data){
          console.log("success");
          $('#' + kode).val(0);
        }
      });
    });

    $('.btn-pesan').click(function(){
      console.log("pesan clicked");
      var kode  = $(this).data("kode");
      var nama  = $(this).data("nama");
      var harga = $(this).data("harga");
      var jumlah  = $('#' + kode).val();
      console.log(kode + " " + nama + " " + jumlah);
      $.ajax({
        url : "<?php echo base_url("KantinController/cart_add");?>",
        method : "POST",
        data : {kode: kode, nama: nama, harga: harga, jumlah: jumlah},
        success: function(data){
          console.log("success");
        }
      });
    });

    $('#detail_cart').load("<?php echo base_url("KantinController/show_cart");?>");

    $(document).on('click','.hapus_cart',function(){
            var row_id=$(this).attr("id");
            $.ajax({
                url : "<?php echo base_url('KantinController/hapus_cart');?>",
                method : "POST",
                data : {row_id : row_id},
                success :function(data){
                    console.log('success hapus');
                    window.location.href = "<?php echo base_url('dashboard/keranjang'); ?>";
                }
            });
        });
  });
</script>
</html>
