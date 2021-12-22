
<!doctype html>
<html class="no-js" lang="zxx">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Corano - Jewellery Shop eCommerce Bootstrap 4 Template</title>
        <meta name="robots" content="noindex, follow" />
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
        <script src="https://kit.fontawesome.com/8f7c5a9c29.js" crossorigin="anonymous"></script>
    
        <!-- CSS
        ============================================ -->
        <!-- google fonts -->
        <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- Pe-icon-7-stroke CSS -->
        <!-- <link rel="stylesheet" href="css/pe-icon-7-stroke.css"> -->
        <link rel="stylesheet" href="https://template.hasthemes.com/corano/corano/assets/css/vendor/pe-icon-7-stroke.css">
       
        <!-- Font-awesome CSS -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <!-- Slick slider css -->
        <link rel="stylesheet" href="css/plugins/slick.min.css">
        <!-- animate css -->
        <link rel="stylesheet" href="css/plugins/animate.css">
        <!-- Nice Select css -->
        <link rel="stylesheet" href="css/plugins/nice-select.css">
        <!-- jquery UI css -->
        <link rel="stylesheet" href="css/plugins/jqueryui.min.css">
        <!-- main style css -->
        <link rel="stylesheet" href="css/style.css">
    
    </head>
    <style>
        .pass-bx{
            position: relative;

        }
        .pass-bx .toggleeye {
            position: absolute;
            top: 19px;
            right: 19px;
            cursor: pointer;
        }
        .list li{
            list-style: disc;
            color: #b1abab;
        }

    </style>
    

<body>
    <!-- Start Header Area -->
    <?php
    include "component/_navbar.php";
    ?>
    <!-- end Header Area -->


    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">login-Register</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- login register wrapper start -->
        <div class="login-register-wrapper section-padding">
            <div class="container">
                <div class="member-area-from-wrap">
                    <div class="row">


                           <!-- Register Content Start -->
                           <div class="col-lg-6">
                               <div class="login-reg-form-wrap sign-up-form">
                                <div id="msg"></div>
                                <h5>Singup Form</h5>
                                <form action="operation/register_process.php" method="post" id="regForm">
                                    <div class="single-input-item">
                                        <input type="text" id="uname" placeholder="Full Name" required/>
                                        <span id="Nerr"></span>
                                    </div>
                                    <div class="single-input-item">
                                        <input type="email" id="uemail" placeholder="Enter your Email" required />
                                        <span id="emError"></span>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item pass-bx" >
                                                <input type="password" id="rpass" class="rgpwd"  placeholder="Enter your Password" required />
                                                <span id="Perr"></span>
                                                    <i class="fas fa-eye toggleeye" id="Reyebtn1"></i>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="single-input-item pass-bx">
                                                <input type="password" id="rcpass" class="rgcpwd" placeholder="Confirm your Password" required />                                     
                                                <span id="cPerr"></span>
                                                    <i class="fas fa-eye toggleeye" id="RCeyebtn2"></i>
                                            </div>
                                        </div>
                                        <ul class="my-2 mx-3 list" >
                                            <li class="maxlength">password must be between 8 to 12 charecter</li>
                                            <li class="upcase">atleast 1 capital letter</li>
                                            <li class="oneNum">atleast 1 number</li>
                                            <li class="onespcial">atleast 1 special character</li>
                                        </ul>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">Subscribe
                                                        Our Newsletter</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="button" id="rgBtn" class="btn btn-sqr">Register</button>
                                        <!-- <button  id="tryBtn" class="btn btn-sqr">try btn</button> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Register Content End -->


                        <!-- Login Content Start -->
                        <div class="col-lg-6">
                            <div class="login-reg-form-wrap">
                                <div id="lgmsg"></div>
                                <h5>Sign In</h5>
                                <form action="operation/login_process.php" method="post" id="lgform">
                                    <div class="single-input-item">
                                        <input type="email" id="lguname" placeholder="Enter your Email" required />
                                    </div>
                                    <div class="single-input-item pass-bx">
                                        <input type="password" class="passw lgpwd" id="pwd" placeholder="Enter your Password" required />
                                            <i class="fas fa-eye toggleeye" id="eyebtn"></i>
                                    </div>
                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember Me</label>
                                                </div>
                                            </div>
                                            <a href="#" class="forget-pwd">Forget Password?</a>
                                        </div>
                                    </div>
                                    <div class="single-input-item">
                                        <button type="button" id="lgBtn" class="btn btn-sqr">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Login Content End -->

                     
                    </div>
                </div>
            </div>
        </div>
        <!-- login register wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <!-- footer area start -->
    <?php
    include "component/_footer.php";
    ?>
    <!-- footer area end -->

    <!-- Quick view modal start -->
    <!-- <div class="modal" id="quick_view">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-large-img img-zoom">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img1.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img2.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img3.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img4.jpg" alt="product-details" />
                                    </div>
                                    <div class="pro-nav-thumb">
                                        <img src="assets/img/product/product-details-img5.jpg" alt="product-details" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html">HasTech</a>
                                    </div>
                                    <h3 class="product-name">Handmade Golden Necklace</h3>
                                    <div class="ratings d-flex">
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <span><i class="fa fa-star-o"></i></span>
                                        <div class="pro-review">
                                            <span>1 Reviews</span>
                                        </div>
                                    </div>
                                    <div class="price-box">
                                        <span class="price-regular">$70.00</span>
                                        <span class="price-old"><del>$90.00</del></span>
                                    </div>
                                    <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                    <div class="product-countdown" data-countdown="2022/02/20"></div>
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>200 in stock</span>
                                    </div>
                                    <p class="pro-desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy
                                        eirmod tempor invidunt ut labore et dolore magna.</p>
                                    <div class="quantity-cart-box d-flex align-items-center">
                                        <h6 class="option-title">qty:</h6>
                                        <div class="quantity">
                                            <div class="pro-qty"><input type="text" value="1"></div>
                                        </div>
                                        <div class="action_link">
                                            <a class="btn btn-cart2" href="#">Add to cart</a>
                                        </div>
                                    </div>
                                    <div class="useful-links">
                                        <a href="#" data-bs-toggle="tooltip" title="Compare"><i
                                            class="pe-7s-refresh-2"></i>compare</a>
                                        <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                            class="pe-7s-like"></i>wishlist</a>
                                    </div>
                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Quick view modal end -->

    <!-- offcanvas mini cart start -->
    <?php
    include "component/_mini_cart.php";
   ?>
    <!-- offcanvas mini cart end -->

    <!-- JS
============================================ -->

     <!-- Modernizer JS -->
     <script src="js/modernizr-3.6.0.min.js"></script>
     <!-- jQuery JS -->
     <script src="js/jquery-3.6.0.min.js"></script>
     <!-- Bootstrap JS -->
     <script src="js/bootstrap.bundle.min.js"></script>
     <!-- slick Slider JS -->
     <script src="js/plugins/slick.min.js"></script>
     <!-- Countdown JS -->
     <script src="js/plugins/countdown.min.js"></script>
     <!-- Nice Select JS -->
     <script src="js/plugins/nice-select.min.js"></script>
     <!-- jquery UI JS -->
     <script src="js/plugins/jqueryui.min.js"></script>
     <!-- Image zoom JS -->
     <script src="js/plugins/image-zoom.min.js"></script>
     <!-- Images loaded JS -->
     <script src="js/plugins/imagesloaded.pkgd.min.js"></script>
     <!-- mail-chimp active js -->
     <script src="js/plugins/ajaxchimp.js"></script>
     <!-- contact form dynamic js -->
     <script src="js/plugins/ajax-mail.js"></script>
     <!-- google map api -->
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
     <!-- google map active js -->
     <script src="js/plugins/google-map.js"></script>
     <!-- Main JS -->
     <script src="js/main.js"></script>
     <!-- cart ajax  -->
     <script src="js/cart.js"></script>
     <!-- form ajax  -->
     <script src="js/login.js"></script>
    
     <script src="js/logval.js"></script>
     <script src="js/cart.js"></script>
</body>

</html>