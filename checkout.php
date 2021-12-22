<?php
    session_start();
?>
<!doctype html>
<html class="no-js" lang="en">

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
.single-input-item {
    margin-top: 5px;
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
                                    <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb area end -->

        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Checkout Login Coupon Accordion Start -->
                        <!-- <div class="checkoutaccordion" id="checkOutAccordion">


                            <div class="card">
                                <h6>Have A Coupon? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">Click
                                        Here To Enter Your Code</span></h6>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                    <button class="btn btn-sqr">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Checkout Login Coupon Accordion End -->
                    </div>
                </div>
                <div class="row">
                    <?php
                          $userid = $_SESSION['id'];
                          echo'<input type="hidden" id="userid" value="'.$userid.'">';
                          $sql = "SELECT`username`, `useremail` FROM `customerdata` WHERE `SrNo` = '$userid'";
                          $result = mysqli_query($conn, $sql);
                          if ($result) {
                            if (mysqli_num_rows($result) == 1) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // echo '<p class = "fs-23">'.$row['username'].'</p>';
                                    $name = $row['username'];
                                    $email = $row['useremail'];
                                }
                            }
                          }
                    ?>
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">
                                <form action="POST">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name">Name</label>
                                                <?php  echo '<p class = "fs-23">'.$name.'</p>';  
                                                        echo'<input type="hidden" id="name" value="'.$name.'">';
                                                ?>
                                            </div>
                                        </div>

                                        <!-- <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div> -->
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email">Email Address</label>
                                        <!-- <input type="email" id="email" placeholder="Email Address" required /> -->
                                        <?php echo '<p class = "fs-23">'.$email.'</p>';
                                                echo'<input type="hidden" id="uemail" value="'.$email.'">';
                                          ?>
                                    </div>


                                    <div class="single-input-item">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <span id="ziperr" style="color: red; font-size: 13px"></span>
                                        <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="town" class="required">City</label>
                                        <span id="cityerr" style="color: red; font-size: 13px"></span>
                                        <input type="text" id="town" placeholder="Town / City" required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="street-address" class="required ">Street address</label>
                                        <p id="cityerr" style="color: #695d5d; font-size: 13px; margin: 0;">Please
                                            include the nearest land mark</p>
                                        <span id="strerr" style="color: red; font-size: 13px"></span>
                                        <input type="text-area" id="street-address" placeholder="Street address "
                                            required />
                                    </div>
                                    <div class="single-input-item">
                                        <label for="state" class="required">State </label>
                                        <span id="statererr" style="color: red; font-size: 13px"></span>
                                        <select class=" nice-select" id="state" style="display: none;" required>
                                            <option value="1" selected>Select Your State</option>
                                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                            </option>
                                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                            <option value="Assam">Assam</option>
                                            <option value="Bihar">Bihar</option>
                                            <option value="Chandigarh">Chandigarh</option>
                                            <option value="Chhattisgarh">Chhattisgarh</option>
                                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                                            <option value="Daman and Diu">Daman and Diu</option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Lakshadweep">Lakshadweep</option>
                                            <option value="Puducherry">Puducherry</option>
                                            <option value="Goa">Goa</option>
                                            <option value="Gujarat">Gujarat</option>
                                            <option value="Haryana">Haryana</option>
                                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                            <option value="Jharkhand">Jharkhand</option>
                                            <option value="Karnataka">Karnataka</option>
                                            <option value="Kerala">Kerala</option>
                                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                                            <option value="Maharashtra">Maharashtra</option>
                                            <option value="Manipur">Manipur</option>
                                            <option value="Meghalaya">Meghalaya</option>
                                            <option value="Mizoram">Mizoram</option>
                                            <option value="Nagaland">Nagaland</option>
                                            <option value="Odisha">Odisha</option>
                                            <option value="Punjab">Punjab</option>
                                            <option value="Rajasthan">Rajasthan</option>
                                            <option value="Sikkim">Sikkim</option>
                                            <option value="Tamil Nadu">Tamil Nadu</option>
                                            <option value="Telangana">Telangana</option>
                                            <option value="Tripura">Tripura</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="West Bengal">West Bengal</option>
                                        </select>

                                    </div>
                                    <div class="single-input-item">
                                        <label for="phone" class="required">Phone</label>
                                        <span id="pherr" style="color: red; font-size: 13px"></span>
                                        <input type="tel" id="phone" placeholder="Phone" required />
                                    </div>

                                    <!-- another address  -->


                                    <!-- <div class="single-input-item">
                                        <label for="ordernote">Order Note</label>
                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div> -->
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <?php
                    include "component/_ordersummry.php";
                ?>
                    </div>

                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>

    <!-- Scroll to top start -->
    <div class="scroll-top not-visible">
        <i class="fa fa-angle-up"></i>
    </div>
    <!-- Scroll to Top End -->

    <?php
    include "component/_footer.php";
    ?>
    <!-- footer area end -->


    <!-- Quick view modal end -->





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
    <script src="js/orderjs/checkout.js"></script>
</body>

</html>