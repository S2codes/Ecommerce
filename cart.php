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
    session_start();
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
                                    <li class="breadcrumb-item active" aria-current="page">cart</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->
        <div id="alert"></div>
        <!-- cart main wrapper start -->


        <div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <?php
                                $set = true;
                                $subTotalprice = 0;
                                if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                                    echo '<div class="container d-flex justify-content-center">
                                    <h1 class = "my-2" style = "color : #c29958;">No Product in Cart</h1>
                                    </div>';
                                    $set = false;
                                } else {
                                    $id = $_SESSION['id'];
                                    echo ' <input type="hidden" name="" id="userid" value="' . $id . '">';
                                    $sql = "SELECT * FROM `cartdata` WHERE userId = '$id'";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        echo '<table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="pro-thumbnail">Thumbnail</th>
                                                    <th class="pro-title">Product</th>
                                                    <th class="pro-price">Price</th>
                                                    <th class="pro-quantity">Quantity</th>
                                                    <th class="pro-quantity">Total Price</th>
                                                    <th class="pro-remove">Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody>';
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $tp = 0;
                                            // echo  "Total Price is : ".$tp;
                                            echo ' <tr id = "tr' . $row['productId'] . '">
                                                       <td class="pro-thumbnail"><a href="/yoginee-E-com/product-details.php?product-query=' . $row['productId'] . '"><img class="img-fluid" src="' . $row['productImage'] . '" alt="Product"/></a></td>
                                                       <td class="pro-title"><a href="/yoginee-E-com/product-details.php?product-query=' . $row['productId'] . '"">' . $row['productName'] . '</a></td>
                                                       <td class="pro-price">
                                                       <input type="hidden"  id = "productprice' . $row['productId'] .'" value="' . $row['totalPrice'] . '">

                                                       &#8377;<span > ' . $row['totalPrice'] . '</span>
                                                       </td>
                                                       <td class="pro-quantity"> 
                                                        <div class="">
                                                        <input type="number" maxlength="2" class = "qtyValue" id = "' . $row['productId'] .'" value="' . $row['Quantity'] . '"  style = "width: 80px;
                                                        height: 35px; padding-left: 31px; border: 1.5px solid #7a787859; ">
                                                        </div>
                                                        </td>

                                                        <td class="pro-price"> &#8377;
                                                        <span id = "totalPrice' . $row['productId'] .'"> ' . ($row['Quantity'] * $row['totalPrice'] ). '</span>
                                                        <input type="hidden"  id = "grossTotalPrice' . $row['productId'] .'" value="' . ($row['Quantity'] * $row['totalPrice'] ). '">
                                                        </td>
                                                        
                                                       <td class="pro-remove"><a href="#">
                                                       <i class="fa fa-trash-o removebtn"  id = "' . $row['productId'] . '"></i>
                                                       </a></td>
                                                      
                                                    </tr>';

                                            $tp = ($row['Quantity'] * $row['totalPrice']);
                                            $subTotalprice +=  $tp;
                                            $tp = 0;
                                        }
                                        echo '    </tbody>
                                        </table>';
                                    } else {
                                        echo '<div class="container d-flex justify-content-center">
                                        <h1 class = "my-2" style = "color : #c29958;">No Product in Cart</h1></div>';
                                        $set = false;
                                    }
                                }
                                ?>
                            </div>

                            <!-- Cart tottal price Option -->
                            <?php
                            if ($set) {
                                echo '<div class="cart-update-option d-block d-md-flex justify-content-end" style="background-color: #f8f8f8;">
                                <div class="cart-update d-flex align-items-center justify-content-between " >
                                    
                                    <h6 >Total</h6>
                                    <span class="mx-5" style="color: #c29958; font-weight: 700; ">&#8377; <span id = "grossTotal">'.$subTotalprice.'</span></span>
                                    <a href="checkout.php" class="btn btn-sqr">Check Out</a>
                                </div>
                            </div>';
                            }
                            ?>
                        </div>
                    </div>

                    <!-- <div class="row">
                        <div class="col-lg-5 ml-auto">
                             <?php
                                if ($set) {  
                                        echo '
                                            <div class="cart-calculator-wrapper">
                                            <div class="cart-calculate-items">
                                                <h6>Cart Totals</h6>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Sub Total</td>
                                                            <td>&#8377; ' . $subTotalprice . '</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Shipping</td>
                                                            <td>&#8377; ' . $shipingPrice . '</td>
                                                        </tr>
                                                        <tr class="total">
                                                            <td>Total</td>
                                                            <td class="total-amount">&#8377; ' . ($subTotalprice + $shipingPrice) . '</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                            <a href="checkout.php" class="btn btn-sqr d-block">Proceed Checkout</a>
                                            </div> ';
                                    }    
                              ?>
  

                        </div>
                    </div> -->

                </div>
            </div>
        </div>
        <!-- cart main wrapper end -->
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
    <script src="js/update.js"></script>
    <script src="js/remove.js"></script>

</body>

</html>