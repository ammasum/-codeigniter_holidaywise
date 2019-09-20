<?php
    $assets_path = base_url() . "assets/home/";        
?>

<!-- start footer -->
<section id="footer" class="ftr-heading-o ftr-heading-mgn-1 ">
        
            <div id="footer-top" class="banner-padding ftr-top-grey ftr-text-white pt-5 pb-4">
                <div class="container pt-5">
                    <div class="row">
            
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-contact">
                            <h3 class="footer-heading">CONTACT US</h3>
                            <ul class="list-unstyled">
                              <li><span><i class="fa fa-map-marker"></i></span>29 Land St, Lorem City, CA</li>
                              <li><span><i class="fa fa-phone"></i></span>+00 123 4567</li>
                                <li><span><i class="fa fa-envelope"></i></span>info@holidaywise.com</li>
                            </ul>
                        </div><!-- end columns -->
                        
                        <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2 footer-widget ftr-links">
                            <h3 class="footer-heading">COMPANY</h3>
                            <ul class="list-unstyled">
                              <li><a href="index.php">Home</a></li>
                              <li><a href="flights.php">Flight</a></li>
                                <li><a href="hotels.php">Hotel</a></li>
                                <li><a href="#">Tours</a></li>
                                <li><a href="#">Hajj</a></li>
                                <li><a href="#">Umrah</a></li>
                            </ul>
                        </div><!-- end columns -->
                        
                        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 footer-widget ftr-links ftr-pad-left">
                          <h3 class="footer-heading">RESOURCES</h3>
                            <ul class="list-unstyled">
                              <li><a href="#">Blogs</a></li>
                              <li><a href="#">Contact Us</a></li>
                                <li><a href="#">Login</a></li>
                                <li><a href="#">Register</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div><!-- end columns -->

                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 footer-widget ftr-about">
                            <h3 class="footer-heading">ABOUT US</h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.</p>
                            <ul class="social-links list-inline list-unstyled">
                              <li class="list-inline-item"><a href="#"><span><i class="fab fa-facebook-f"></i></span></a></li>
                              <li class="list-inline-item"><a href="#"><span><i class="fab fa-twitter"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span><i class="fab fa-google-plus"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span><i class="fab fa-pinterest-p"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span><i class="fab fa-instagram"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span><i class="fab fa-linkedin"></i></span></a></li>
                                <li class="list-inline-item"><a href="#"><span><i class="fab fa-youtube-play"></i></span></a></li>
                            </ul>
                        </div><!-- end columns -->
                        
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end footer-top -->

            <div id="footer-bottom" class="ftr-bot-black">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" id="copyright">
                            <p>&copy; <?= date('Y') ?> <a href="#">HolidayWise</a>. All rights reserved.</p>
                        </div><!-- end columns -->
                        
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 text-right" >
                            <ul class="list-unstyled list-inline">
                              <li  class="list-inline-item"><a href="#">Terms &amp; Condition</a></li>
                                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div><!-- end columns -->
                    </div><!-- end row -->
                </div><!-- end container -->
            </div><!-- end footer-bottom -->
            
        </section>
<!-- end footer -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="<?php echo $assets_path . 'js/jquery-3.3.1.min.js'; ?>" ></script>
    <script src="<?php echo $assets_path . 'js/bootstrap.min.js'; ?>" ></script>
    <script src="<?php echo $assets_path . 'js/owl.carousel.min.js'; ?>"></script>
    <script src="<?php echo $assets_path . 'js/jquery.waypoints.min.js'; ?>"></script>
    <script src="<?php echo $assets_path . 'js/jquery.counterup.min.js' ?>"></script>
    <script src="<?php echo $assets_path . 'js/wow.min.js'; ?>"></script>
    <script src="<?php echo $assets_path . 'js/custom.js'; ?>"></script>

  </body>
</html>