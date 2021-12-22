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
                                    <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="shop.php">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">wishlist</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- wishlist main wrapper start -->

        <div class="wishlist-main-wrapper section-padding">
            <div class="container">
                <!-- Wishlist Page Content Start -->
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Wishlist Table Area -->
                            <div class="cart-table table-responsive">
                               
                                        <?php
                                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                                            echo '<div class="container d-flex justify-content-center">
                                                    <h1 class = "my-2" style = "color : #c29958;">No Product in Wishlist</h1>
                                                    </div>';
                                            
                                        } else {
                                            $id = $_SESSION['id'];
                                             echo ' <input type="hidden" name="" id="userid" value="' . $id . '">';
                                            $sql = "SELECT * FROM `wishlistdata` WHERE `userid` = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            if ($result) {
                                                if (mysqli_num_rows($result) > 0) {
                                                    echo ' <table class="table table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th class="pro-thumbnail">Thumbnail</th>
                                                            <th class="pro-title">Product</th>
                                                            <th class="pro-price">Price</th>
                                                            <th class="pro-quantity">Stock Status</th>
                                                            <th class="pro-subtotal">Add to Cart</th>
                                                            <th class="pro-remove">Remove</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>';
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        $wno = $row['wno'];
                                                        $productid = $row['productid'];
                                                        $productName = $row['productname'];
                                                        $productImage = $row['productimage'];
                                                        $productSize = $row['size'];
                                                        $productQuantity = $row['quantity'];
                                                        $productPrice = $row['price'];
                                                        $userId =  $_SESSION['id'];

                                                        echo ' <tr id = "wishlistRow'.$productid.'">
                                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="'.$productImage.'" alt="Product" /></a></td>
                                                        <td class="pro-title"><a href="#">'.$productName.'</a></td>
                                                        <td class="pro-price"><span> &#8377; '.$productPrice.'</span></td>
                                                        <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                                        <td class="pro-subtotal"><a href="cart.php" class="btn btn-sqr">Add to
                                                                Cart</a></td>
                                               <td class="pro-remove"><a href="#" ><i class="fa fa-trash-o removewish" id = "'.$productid.'"></i></a></td>
                                                    </tr>';
                                                    }
                                                    echo ' </tbody>
                                                    </table>';
                                                }else {
                                                    echo '<div class="container d-flex justify-content-center">
                                                    <h1 class = "my-2" style = "color : #c29958;">No Product in Cart</h1>
                                                    </div>';
                                                }
                                            }
                                        }
                                        ?>
                                        
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Wishlist Page Content End -->
            </div>
        </div>
        <!-- wishlist main wrapper end -->
    </main>

    <!-- Quick view modal start -->

    <!-- Quick view modal end -->

    <!-- offcanvas mini cart start -->
    <?php
    include "component/_mini_cart.php";
    ?>
    <!-- offcanvas mini cart end -->



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

<!-- offcanvas mini cart end -->

<!-- JS
============================================ -->

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
<script src="js/cart.js"></script>
<script src="js/remove.js"></script>

</body>

</html>