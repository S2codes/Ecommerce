<?php
    include "_connect.php";
?>
<div class="order-summary-details">

                    <h5 class="checkout-title">Your Order Summary</h5>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="background-color: #c29958; color : white;"><b>Products</b></th>
                                        <th style="background-color: #c29958; color : white;"><b>Total</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    
                                    <?php
                                        // $id = $_SESSION['id'];
                                        $id = 3;
                                        
                                        $shipingCharge = 50;
                                        $sql = "SELECT * FROM `cartdata` WHERE `userId` = '$id'";
                                        $result = mysqli_query($conn, $sql);
                                        $grossTotal = 0;
                                        $orders = array();
                                        if ($result) {
                                            if (mysqli_num_rows($result) > 0) {
                                                // $row = mysqli_fetch_assoc($result);
                                                
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo ' <tr>
                                                    <td><a href="product-details.html">'.$row['productName'].' <b> × '.$row['Quantity'].'</b></a>
                                                    </td>
                                                    <td>&#8377; '.($row['totalPrice'] * $row['Quantity']).'</td>
                                                </tr>';
                                                    $grossTotal +=  ($row['Quantity'] * $row['totalPrice']);
                                                    
                                                    $temporder = array(
                                                        "\productid" => $row['productId'],
                                                        "productname" => $row['productName'],
                                                        "productquantity" => $row['Quantity'],
                                                        "productprice" => $row['totalPrice'],
                                                        "productimage" => $row['productImage']
                                                    );
                                                    array_push($orders, $temporder);
                                                    // echo 'order is';
                                                    // echo '<pre>';
                                                    // print_r ($orders);
                                                    // echo '</pre>';

                                                    
                                                }
                                            }
                                        }
                                    ?>
                                   <?php
                                        // $probj = (object) $orders;
                                        // $probj = json_decode(json_encode($orders), FALSE);
                                        $probj = json_encode($orders);
                                        // echo 'obj is';
                                        // echo '<pre>';
                                        // print_r ($probj);
                                        // echo '</pre>';
                                        echo '<input type="hidden"  id="pdata" value="'.$probj.'">';
                                   ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td style="color: #c29958;">Sub Total</td>
                                        <td><strong>&#8377; <span><?php echo $grossTotal; ?></span></strong></td>
                                    </tr>
                                    <tr>
                                        <td style="color: #c29958;">Shipping</td>
                                        <td class="d-flex justify-content-center">
                                        <strong>&#8377; <span><?php echo $shipingCharge; ?></span></strong>
                                        <input type="hidden" name="ship" id="shipcharge" value="<?php echo $shipingCharge; ?>">
                                            <!-- <ul class="shipping-type">
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="flatrate" name="shipping" class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="flatrate">Flat
                                                            Rate: $70.00</label>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="freeshipping" name="shipping" class="custom-control-input" />
                                                        <label class="custom-control-label" for="freeshipping">Free
                                                            Shipping</label>
                                                    </div>
                                                </li>
                                            </ul> -->
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="color: #c29958; font-weight: 700;">Total Amount</td>
                                        <td><b>&#8377; <span><?php echo ($grossTotal + $shipingCharge) ?></span></b>
                                        <input type="hidden" name="ship" id="grosstotal" value="<?php echo ($grossTotal + $shipingCharge); ?>">
                                    </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- Order Payment Method -->
                        <div class="order-payment-method">
                            <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                        <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="cash">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div>
                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                        <label class="custom-control-label" for="directbank">Credit Card</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="bank">
                                    <p>Make your payment directly into our bank account. Please use your Order
                                        ID as the payment reference. Your order will not be shipped until the
                                        funds have cleared in our account..</p>
                                </div>
                            </div>
                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="checkpayment" name="paymentmethod" value="check" class="custom-control-input" />
                                        <label class="custom-control-label" for="checkpayment">UPI </label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="check">
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                        / County, Store Postcode.</p>
                                </div>
                            </div>
                            <!-- <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />
                                        <label class="custom-control-label" for="paypalpayment">Paypal <img src="assets/img/paypal-card.jpg" class="img-fluid paypal-card" alt="Paypal" /></label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="paypal">
                                    <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                        PayPal account.</p>
                                </div>
                            </div> -->
                            <div class="summary-footer-area">
                                <div class="custom-control custom-checkbox mb-20">
                                    <!-- <input type="checkbox" class="custom-control-input" id="terms" required /> -->
                                    <label class="" for="terms">Please read 
                                        the <b><a href="#">terms and conditions.</a> </b></label>
                                </div>
                                <button type="button" class="btn btn-sqr" id="checkoutBtn">Place Order</button>
                            </div> 
                        </div>
                    </div>
                </div>