<div class="cart-main-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Cart Table Area -->
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-price">Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <!-- <th class="pro-subtotal">Total</th> -->
                                            <th class="pro-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "./_navbar.php";
                                        $subTotalprice = 0;
                                        $shipingPrice = 50;
                                        $id = 1;
                                            // $id = $_SERVER['id'];
                                            $sql = "SELECT * FROM `cartdata` WHERE userId = '$id'";
                                            $result = mysqli_query($conn, $sql);
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $tp = 0;
                                                // echo  "Total Price is : ".$tp;

                                                echo ' <tr>
                                                    <td class="pro-thumbnail"><a href="/yoginee-E-com/product-details.php?product-query=' . $row['productId'] . '"><img class="img-fluid" src="images/product/' . $row['productImage'] . '" alt="Product"/></a></td>
                                                    <td class="pro-title"><a href="/yoginee-E-com/product-details.php?product-query=' . $row['productId'] . '"">' . $row['productName'] . '</a></td>
                                                    <td class="pro-price"><span>&#8377; ' . $row['totalPrice'] . '</span></td>
                                                    <td class="pro-quantity">
                                                        <div class="pro-qty"><input type="text" value="' . $row['Quantity'] . '"></div>
                                                    </td>
                                                    <td class="pro-remove"><a href="#"><i class="fa fa-trash-o" id = "' . $row['productId'] . '"></i></a></td>
                                                </tr>';

                                                $tp = ($row['Quantity'] * $row['totalPrice']);
                                                $subTotalprice = ($subTotalprice + $tp);
                                                $tp = 0;
                                            }

                                        ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- Cart Update Option -->
                            <div class="cart-update-option d-block d-md-flex justify-content-end">

                                <div class="cart-update">
                                    <a href="#" class="btn btn-sqr">Update Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 ml-auto">
                            <!-- Cart Calculation Area -->
                            <div class="cart-calculator-wrapper">
                                <div class="cart-calculate-items">
                                    <h6>Cart Totals</h6>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total</td>
                                                <td>&#8377; <?php echo $subTotalprice; ?></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td>&#8377;<?php echo $shipingPrice; ?></td>
                                            </tr>
                                            <tr class="total">
                                                <td>Total</td>
                                                <td class="total-amount">&#8377; <?php echo ($subTotalprice + $shipingPrice); ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <a href="checkout.php" class="btn btn-sqr d-block">Proceed Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>