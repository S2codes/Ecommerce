<?php 
// session_start();
include "component/_connect.php";

?>
<header class="header-area header-wide">
<!-- main header start -->
<div class="main-header d-none d-lg-block">
    <!-- header top start -->
   
    <!-- header top end -->

    <!-- header middle area start -->
    <div class="header-main-area sticky">
        <div class="container">
            <div class="row align-items-center position-relative">

                <!-- start logo area -->
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="Brand Logo">
                        </a>
                    </div>
                </div>
                <!-- start logo area -->

                <!-- main menu area start -->
                <div class="col-lg-6 position-static">
                    <div class="main-menu-area">
                        <div class="main-menu">
                            <!-- main menu navbar start -->
                            <nav class="desktop-menu" id="navbar">
                                <ul>
                                    <li class="active"><a href="index.php">Home </a>
                                     
                                    </li>
                                    <li class="position-static"><a href="#">About Us </a>
                                       
                                    </li>
                                    <li><a href="shop.php">shop </a>
                                      
                                    </li>
                                    <li><a href="#">Blog </a>
                                    
                                    </li>
                                    <li><a href="contact-us.php">Contact us</a></li>
                                </ul>
                            </nav>
                            <!-- main menu navbar end -->
                        </div>
                    </div>
                </div>
                <!-- main menu area end -->

                <!-- mini cart area start -->
                <div class="col-lg-4">
                    <div class="header-right d-flex align-items-center justify-content-xl-between justify-content-lg-end">
                        <div class="header-search-container">
                            <button class="search-trigger d-xl-none d-lg-block"><i class="fas fa-search"></i></button>
                            <form class="header-search-box d-lg-none d-xl-block animated jackInTheBox">
                                <input type="text" placeholder="Search entire store hire" class="header-search-field">
                                <button class="header-search-btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="header-configure-area">
                            <ul class="nav justify-content-end">
                                <li class="user-hover">
                                    <a href="#">
                                        <i class="pe-7s-user"></i>
                                    </a>
                                    <ul class="dropdown-list">
                                         <?php
                                            if (!isset ($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                                                echo '<li><a href="login-register.php">login</a></li>
                                                <li><a href="login-register.php">register</a></li>';
                                            }else {
                                                echo '<li><a href="my-account.php">'. $_SESSION['name'] .'</a></li>
                                                <li><a href="component/_logout.php">logout</a></li>';
                                                // echo 'hello';
                                                
                                            }
                                        ?> 

                                        <!-- <li><a href="login-register.php">login</a></li>
                                        <li><a href="login-register.php">register</a></li>
                                        <li><a href="my-account.php">my account</a></li> -->
                                    </ul>
                                </li>
                                <li>
                                    <a href="wishlist.php">
                                        <i class="pe-7s-like"></i>
                                        <div class="notification" id="wishproduct"> 0</div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="minicart-btn">
                                        <i class="pe-7s-shopbag"></i>
                                        <div class="notification" id="totalProduct">
                                            <!-- <span>0</span> -->
                                            0
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- mini cart area end -->

            </div>
        </div>
    </div>
    <!-- header middle area end -->
</div>
<!-- main header start -->

<!-- mobile header start -->
<!-- mobile header start -->
<div class="mobile-header d-lg-none d-md-block sticky">
    <!--mobile header top start -->
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-12">
                <div class="mobile-main-header">
                    <div class="mobile-logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="Brand Logo">
                        </a>
                    </div>
                    <div class="mobile-menu-toggler">
                        <div class="mini-cart-wrap">
                            <a href="cart.php">
                                <i class="pe-7s-shopbag"></i>
                                <div class="notification" id="totalProduct2">
                                    <span>0</span>
                                </div>
                            </a>
                        </div>
                        <button class="mobile-menu-btn">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- mobile header top start -->
</div>
<!-- mobile header end -->
<!-- mobile header end -->

<!-- offcanvas mobile menu start -->
<!-- off-canvas menu start -->
<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="pe-7s-close"></i>
        </div>

        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box-offcanvas">
                <form>
                    <input type="text" placeholder="Search Here...">
                    <button class="search-btn"><i class="pe-7s-search"></i></button>
                </form>
            </div>
            <!-- search box end -->

            <!-- mobile menu start -->
            <div class="mobile-navigation">

                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="index.php">Home</a></li>
                        <li class="menu-item-has-children"><a href="#">About Us</a> </li>
                        <li class="mega-title menu-item-has-children"><a href="#">Shop</a></li>
                        <li class="menu-item-has-children "><a href="#">shop</a>
                        </li>
                        <li class="menu-item-has-children "><a href="#">Blog</a>

                        </li>
                        <li><a href="contact-us.php">Contact us</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->

            <div class="mobile-settings">
                <ul class="nav">
                    
                    <li>
                        <div class="dropdown mobile-top-dropdown">
                            <a href="#" class="dropdown-toggle" id="myaccount" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                My Account
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="myaccount">
                            <?php
                                            if (!isset ($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                                                echo '<li><a href="login-register.php">login</a></li>
                                                <li><a href="login-register.php">register</a></li>
                                                <li><a href="my-account.php">my account</a></li>';
                                            }else {
                                                echo '<li><a href="#">'. $_SESSION['name'] .'</a></li>';
                                                
                                            }
                                        ?>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <ul>
                        <li><i class="fa fa-mobile"></i>
                            <a href="#">0123456789</a>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <a href="#">info@yourdomain.com</a>
                        </li>
                    </ul>
                </div>
                <div class="off-canvas-social-widget">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-pinterest-p"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                </div>
            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>
<!-- off-canvas menu end -->
<!-- offcanvas mobile menu end -->
</header>