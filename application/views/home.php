<?php
  if ($this->session->userdata("user") != null) {
    redirect(base_url('dashboard'));
  }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Rizki Mebel</title>
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
        <link rel="icon" href="<?php echo base_url()."assets/favicon-1.ico"?>" type="image/x-icon">
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
                        <a class="navbar-brand" href="#">Riki Mebel</a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav main-nav  clear navbar-right">
                            <li><a class="navactive color_animation" href="#top">HOME</a></li>
                            <li><a class="color_animation" href="#story">ABOUT</a></li>
                            <li><a class="color_animation" href="#contact">CONTACT</a></li>
                            <li>
                              <a href="<?php echo base_url('login'); ?>" class="color_animation" style="background-color: #96E16B; color: #1E1E1E !important;">
                                LOGIN
                              </a>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div><!-- /.container-fluid -->
        </nav>

        <div id="top" class="starter_container bg">
            <div class="follow_container">
                <div class="col-md-6 col-md-offset-3">
                    <h2 class="top-title"> Rizki Mebel</h2>
                    <h2 class="white second-title">" Mebel Berkualitas "</h2>
                    <hr>
                </div>
            </div>
        </div>

        <!-- ============ About Us ============= -->

        <section id="story" class="description_content">
            <div class="text-content container">
                <div class="col-md-6">
                    <h1>About us</h1>
                    <div class="fa fa-cutlery fa-2x"></div>
                    <p class="desc-text">Rizki Mebel adalah sebuah manufaktur mebel
khususnya dibidang sofa yang memiliki pusat di Sidoarjo tepatnya di Jl Singajaya Ds. Singopadu
RT.01/RW.02 Tulangan. </p>
                </div>
                <div class="col-md-6">
                    <div class="img-section">
                       <img src="<?php echo base_url()."assets/images/icon1.jpg"?>" width="250" height="220">
                       <img src="<?php echo base_url()."assets/images/icon2.jpg"?>" width="250" height="220">
                       <div class="img-section-space"></div>
                       <img src="<?php echo base_url()."assets/images/icon3.jpg"?>"  width="250" height="220">
                       <img src="<?php echo base_url()."assets/images/icon4.jpg"?>"  width="250" height="220">
                   </div>
                </div>
            </div>
        </section>

        <!-- ============ Social Section  ============= -->

        <section class="social_connect"  id="contact">
            <div class="text-content container">
                <div class="col-md-6">
                    <span class="social_heading">FOLLOW</span>
                    <ul class="social_icons">
                        <li><a class="icon-twitter color_animation" href="#" target="_blank"></a></li>
                        <li><a class="icon-github color_animation" href="#" target="_blank"></a></li>
                        <li><a class="icon-linkedin color_animation" href="#" target="_blank"></a></li>
                        <li><a class="icon-mail color_animation" href="#"></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <span class="social_heading">OR DIAL</span>
                    <span class="social_info"><a class="color_animation" href="tel:081231659999">081231659999</a></span>
                </div>
            </div>
        </section>

        <!-- ============ Contact Section  ============= -->

        <!-- ============ Footer Section  ============= -->

        <footer class="sub_footer">
            <div class="container">
                <div class="col-md-4"><p class="sub-footer-text text-center">&copy;Anang</p></div>
                <div class="col-md-4"><p class="sub-footer-text text-center">Back to <a href="#top">TOP</a></p>
                </div>
                <div class="col-md-4"><p class="sub-footer-text text-center">Built With Care By <a href="#" target="_blank">Us</a></p></div>
            </div>
        </footer>


        <script type="text/javascript" src="<?php echo base_url()."assets/js/jquery-1.10.2.min.js"?>"> </script>
        <script type="text/javascript" src="<?php echo base_url()."assets/js/bootstrap.min.js"?>"> </script>
        <script type="text/javascript" src="<?php echo base_url()."assets/js/jquery-1.10.2.js"?>"> </script>
        <script type="text/javascript" src="<?php echo base_url()."assets/js/jquery.mixitup.min.js"?>"> </script>
        <script type="text/javascript" src="<?php echo base_url()."assets/js/main.js"?>"></script>

    </body>
</html>
