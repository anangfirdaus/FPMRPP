<?php
  if ($this->session->userdata("user") != null) {
    redirect('dashboard');
  }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>
    <link href="<?php echo base_url() ?>assets/css/templateloginuser/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/templateloginuser/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/templateloginuser/prettyPhoto.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/templateloginuser/price-range.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/templateloginuser/animate.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/templateloginuser/main.css" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/css/templateloginuser/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/imagesuser/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url() ?>assets/imagesuser/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url() ?>assets/imagesuser/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url() ?>assets/imagesuser/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo base_url() ?>assets/imagesuser/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body style="background-color:black;">
	<header id="header"><!--header-->
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="<?php echo base_url()."index.php/KantinController/index" ?>" style="color:white;">Home</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">

					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2 style="text-align:center; color:white;"><strong>Login</strong></h2>
						<form method="post" action="<?php echo base_url("LoginController/userlogin")?>">
							<input type="text" placeholder="Username" name="user" required/>
							<input type="password" placeholder="Password" name="pass" required/>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2 style="text-align:center; color:white;"><strong>Register</strong></h2>
						<?php echo form_open('LoginController/validateuser'); ?>

							<input id="username" type="text" placeholder="Username" name="username" required/>
							<?php echo form_error('username'); ?>

							<input id="password" type="password" placeholder="Password" name="password" required/>
							<?php echo form_error('password'); ?>

							<input type="email" placeholder="Email" name="email" required/>
							<?php echo form_error('email'); ?>

							<input id="username" type="text" placeholder="Nama" name="name" required/>
							<?php echo form_error('name'); ?>

              <input id="address" type="text" placeholder="Address" name="address" required/>
							<?php echo form_error('address'); ?>

							<p><?php if (isset($message)) { ?>
							<h3><?php echo $message; ?></h3><br>
							<?php } ?>
							<?php if (isset($message)){
								unset($message);
								} ?></p>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->


    <script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
	<script src="<?php echo base_url() ?>assets/js/price-range.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.scrollUp.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/jquery.prettyPhoto.js"></script>
    <script src="<?php echo base_url() ?>assets/js/main.js"></script>
</body>
</html>

<script type="text/javascript">
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

 var nama = document.getElementById('nama'),
 usernmae = document.getElementById('username');

function validateUser(){
	if(nama.value != username.value){
		username.setCustomValidity("");
	}
	else{
		username.setCustomValidity("Username dan Nama Tidak Boleh Sama");
	}
}
nama.onchange = validateUser;
username.onkeyup = validateUser;
</script>
