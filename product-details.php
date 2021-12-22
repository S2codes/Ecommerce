<?php
    session_start();
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Yoginee - Jewellery Shop eCommerce Bootstrap 4 Template</title>
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
    <!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
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
/* .pro-nav-thumb img{
            max-width: 150px;
        } */
</style>

<body>
    <!-- Start Header Area -->
    <?php
    include "component/_navbar.php";
        $sessionCheck = true;
    // $_GET = $product-query;
    $id = $_GET['product-query'];
    // $username = $_SESSION['name'];

    ?>

    <main>
        <!-- breadcrumb area start -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-wrap">
                            <nav aria-label="breadcrumb">
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">product details</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- breadcrumb area end -->

        <div id="notif-alert">

        </div>
        <!-- page main wrapper start -->
        <div class="shop-main-wrapper section-padding pb-0">
            <div class="container">
                <div class="row">
                    <!-- product details wrapper start -->
                    <div class="col-lg-12 order-1 order-lg-2">
                        <!-- product details inner end -->
                        <div class="product-details-inner">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="product-large-slider">
                                        <div class="pro-large-img img-zoom" id="featured">
                                            <!-- product image  -->
                                        </div>

                                    </div>
                                    <!-- extra image  -->
                                    <!-- <div class="pro-nav slick-row-10 slick-arrow-style" id="otherimages">
                                        <div class="pro-nav-thumb">
                                            <img src="images/product/product-1.webp" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="images/product/product-2.webp" alt="product-details" />
                                        </div>
                                        <div class="pro-nav-thumb">
                                            <img src="images/product/product-3.webp" alt="product-details" />
                                        </div>
                                        
                                    </div> -->

                                </div>
                                <div class="col-lg-7">
                                    <div class="product-details-des">
                                        <div class="manufacturer-name">
                                            <!-- product category  -->
                                            <a href="product-details.php" id="pCategory">
                                            </a>

                                        </div>
                                        <!-- product name  -->
                                        <h3 class="product-name" id="pName"> </h3>
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
                                            <!-- product price  -->
                                            <span class="price-regular"> &#8377; <span id="sellprice"></span></span>
                                            <span class="price-old"><del> &#8377; <span id="mrp"></span></del></span>
                                        </div>
                                        <!-- <h5 class="offer-text"><strong>Hurry up</strong>! offer ends in:</h5>
                                        <div class="product-countdown" data-countdown="2021/12/20"></div> -->
                                        <div class="availability">
                                            <i class="fa fa-check-circle"></i>
                                            <!-- product stock  -->
                                            <span id="stock"></span>
                                        </div>
                                        <!-- product short description  -->
                                        <p class="pro-desc" id="description"></p>
                                        <p><b>Manufactured by</b> : <span style="color: #c29958;"
                                                id="manufactured">abcd</span></p>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">qty:</h6>
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" id="productQuanty<?php echo $id;?>" value="1">
                                                </div>
                                            </div>
                                            <div class="pro-size" style="margin-bottom:0px;">
                                                <h6 class="option-title">size :</h6>
                                                <select class="nice-select" id="productSize<?php echo $id;?>">
                                                    <option value="S">S</option>
                                                    <option value="M">M</option>
                                                    <option value="L">L</option>
                                                    <option value="XL">XL</option>
                                                </select>
                                            </div>
                                        </div>
                                        <!-- attribute  -->
                                        <!-- <div class="color-option">
                                            <h6 class="option-title">color :</h6>
                                            <ul class="color-categories">
                                                <li>
                                                    <a class="c-lightblue" href="#" title="LightSteelblue"></a>
                                                </li>
                                                <li>
                                                    <a class="c-darktan" href="#" title="Darktan"></a>
                                                </li>
                                                <li>
                                                    <a class="c-grey" href="#" title="Grey"></a>
                                                </li>
                                                <li>
                                                    <a class="c-brown" href="#" title="Brown"></a>
                                                </li>
                                            </ul>
                                        </div> -->

                                        <!-- hidden form  start -->
                                        <input type="hidden" name="" id="prid" value="<?php echo $id;?>">
                                        <input type="hidden" name="userid" id="user" value="<?php echo $_SESSION['id'];?>">
                                        <input type="hidden" name="pid" id="poductid<?php echo $id;?>" value="">
                                        <input type="hidden" name="pname" id="poductname<?php echo $id;?>" value="">
                                        <input type="hidden" name="pprice" id="poductprice<?php echo $id;?>" value="">

                                        <input type="hidden" name="piamge" id="poductimage<?php echo $id;?>" value="">
                                        <div class="useful-links my-3">
                                            <?php
                                                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                                                    $sessionCheck = false;
                                                    echo '<a href="#" data-bs-toggle="tooltip" title="Wishlist" class="addtowish" id="nowishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>';
                                                }else {
                                                 echo '<a href="#" data-bs-toggle="tooltip" title="Wishlist" class="addtowish" id="'.$id.'"><i
                                                 class="pe-7s-like"></i>wishlist</a>';
                                                }
                                            ?>
                                            <!-- <a href="#" data-bs-toggle="tooltip" title="Wishlist" class="addtowish" id="<?php echo $id;?>"><i
                                                    class="pe-7s-like"></i>wishlist</a> -->
                                        </div>
                                        <div class="action_link">
                                            <?php
                                            // $_SESSION['loggedin'] = true;
                                                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                                                    echo '
                                                    <button type="button" class="btn btn-cart2" id = "nologin">Add to cart</button>
                                                    ';
                                                }else {
                                                 echo '<button type="button" class="btn btn-cart2 cartBtn" id="'.$id.'">Add to cart</button>';
                                                }
                                            ?>


                                        </div>

                                        <!-- hidden form  end -->

                                        <!-- <div class="useful-links my-3">
                                            <a href="#" data-bs-toggle="tooltip" title="Wishlist"><i
                                                    class="pe-7s-like"></i>wishlist</a>
                                        </div> -->


                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details inner end -->

                        <!-- product details reviews start -->
                        <div class="product-details-reviews section-padding pb-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="product-review-info">
                                        <ul class="nav review-tab">
                                            <li>
                                                <a class="active" data-bs-toggle="tab" href="#tab_one">description</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_two">information</a>
                                            </li>
                                            <li>
                                                <a data-bs-toggle="tab" href="#tab_three">reviews (1)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content reviews-tab">
                                            <div class="tab-pane fade show active" id="tab_one">
                                                <div class="tab-one">
                                                    <!-- product details  -->
                                                    <p>Dummy description</p>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="tab_two">
                                                <table class="table table-bordered">
                                                    <tbody id="info">
                                                        <!-- product attribute  -->
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- review system  -->
                                            <div class="tab-pane fade" id="tab_three">
                                                <form action="#" class="review-form">
                                                    <?php
                                                        include "operation/add_review.php";

                                                    include "operation/fetch_reviews.php";
                                                    ?>
                                                </form>
                                            </div>
                                            <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- product details reviews end -->
                    </div>
                    <!-- product details wrapper end -->
                </div>
            </div>
        </div>
        <!-- page main wrapper end -->

        <!-- related products area start -->
        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- section title start -->
                        <div class="section-title text-center">
                            <h2 class="title">Related Products</h2>
                            <p class="sub-title">Add related products to weekly lineup</p>
                        </div>
                        <!-- section title start -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <!-- product item start -->
                            <?php  include "component/_product.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- related products area end -->
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
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script> -->
    <!-- google map active js -->
    <script src="js/plugins/google-map.js"></script>
    <!-- Main JS -->
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
    <!-- fetch data from api  -->
    <script src="js/shopScript/getjsondata.js"></script>
    <!-- prodct append  -->
    <script src="js/shopScript/product-details.js"></script>
</body>

</html>