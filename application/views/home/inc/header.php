<?php
    $assets_path = base_url() . "assets/home/";        
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.png" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $assets_path . 'css/bootstrap.min.css'; ?>" >
    <link rel="stylesheet" href="<?php echo $assets_path . 'css/font-awesome/css/all.css'; ?>" >
    <link rel="stylesheet" href="<?php echo $assets_path . 'css/owl.carousel.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo $assets_path . 'css/owl.theme.default.min.css'; ?>">
    <link rel="stylesheet" href="<?php echo $assets_path . 'css/animate.css'; ?>">


    <link rel="stylesheet" href="<?php echo $assets_path . 'flight-search/flightSearch.css'; ?>" >
    <link rel="stylesheet" href="<?php echo $assets_path . 'css/styles.css'; ?>" >

    <title>HolidayWise, Best holiday offers!</title>
  </head>
  <body>
    <div id="top-bar" class="tb-text-white">
            <div class="container">
                <div class="row">          
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div id="info">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><span><i class="fas fa-map-marker-alt
"></i></span>29 Land St, Lorem City, CA</li>
                                <li class="list-inline-item"><span><i class="fas fa-phone-alt"></i></span>+00 123 4567</li>
                            </ul>
                        </div><!-- end info -->
                    </div><!-- end columns -->
                    
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div id="links">
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-lock"></i></span>Login</a></li>
                                <li class="list-inline-item"><a href="#"><span><i class="fa fa-plus"></i></span>Sign Up</a></li>
                                
                            </ul>
                        </div><!-- end links -->
                    </div><!-- end columns -->        
                </div><!-- end row -->
            </div><!-- end container -->
        </div>
        <!-- end top bar -->
        <!-- start navbar -->
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light topnavbar">
          <div class="container">
  <a class="navbar-brand" href="index.php">
    <img src="<?php echo $assets_path . 'images/logo.png'; ?>"/>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto ">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="flights.php">Flight</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="hotels.php">Hotel</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Tour</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="#">Hajj</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Umrah</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo lang('blog'); ?>">Blog</a>
      </li>

    </ul>

  </div>
  </div>
</nav>

        <!-- end navbar -->