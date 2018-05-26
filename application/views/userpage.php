<?php
  if ($this->session->userdata("user") == null) {
    redirect(base_url('login'));
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>User Page</title>
  <link href='http://fonts.googleapis.com/css?family=Playball' rel='stylesheet' type='text/css'>
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url()."assets/css/bootstrap.min.css"?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url()."assets/css/sb-admin.css"?>" rel="stylesheet">
  <!-- Custom Fonts -->
  <link href="<?php echo base_url()."assets/fonts/font-awesome.min.css"?>" rel="stylesheet" type="text/css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
  .navbar-brand{
      font-family: 'Playball', cursive;
      font-size: 24px !important;
      text-decoration: none;
      color: white !important;
  }
  body {
    background-color: white;
  }
  </style>
</head>
<body>
  <div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo base_url('admin/menu') ?>">Segersumyah</a>
      </div>
      <!-- Top Menu Items -->
      <ul class="nav navbar-right top-nav">
        <li>
         <a href="<?php echo base_url("admin/logout")?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
        </li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>Selamat Datang, <?php echo $this->session->userdata('user'); ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li>
             <a href="<?php echo base_url()."index.php/LoginController/logout/"?>"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
            </li>
          </ul>
        </li> -->
      </ul>
      <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li>
            <a href="<?php echo base_url("KantinController/pesanan_kustom") ?>"><strong>Pesanan Kustom</strong></a>
          </li>
          <li>
            <a href="<?php echo base_url("KantinController/pesanan") ?>"><strong>Pesanan</strong></a>
          </li>
          <li>
            <a href="<?php echo base_url("KantinController/halaman_keluhan") ?>"><strong>Keluhan</strong></a>
          </li>
          <li>
            <a href="<?php echo base_url("KantinController/halaman_balasan") ?>"><strong>Balasan Keluhan</strong></a>
          </li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </nav>
    <?php $this->load->view($this->session->userdata('userpage')); ?>
  </div>
  <!-- /#wrapper -->
  <!-- jQuery -->
  <script src="<?php echo base_url()."assets/js/jquery.js"?>"></script>
  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url()."assets/js/bootstrap.min.js"?>"></script>
</body>
</html>
