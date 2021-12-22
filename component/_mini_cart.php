<div class="offcanvas-minicart-wrapper">
    <div class="minicart-inner">
        <div class="offcanvas-overlay"></div>
        <div class="minicart-inner-content">
            <div class="minicart-close">
                <i class="pe-7s-close"></i>
            </div>
            <div class="minicart-content-box">
                <div class="minicart-item-wrapper">
                    <ul>
                   
                        <!-- fetch cart product from db  -->
                        <?php
                        $subtotal = 0;
                        $deliverycharge = 0;
                        $total = 0;
                        $id = 0;
                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
                           echo ' <li class="minicart-item" id = "noproduct">
                           <div class="minicart-content">
                               <h3 class="product-name">
                                   No Product in Cart
                               </h3>
                               <p>
                                   Please add your to Cart
                               </p>
                           </div> </li>';
                        }
                        else {
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM `cartdata` WHERE userId = '$id'";
                            $result = mysqli_query($conn, $sql);
                            $deliverycharge = 50;
                            while ($row = mysqli_fetch_assoc($result)) {
                                // $total = 0;
                                echo '<li class="minicart-item" id = "item' . $row['cno'] . '">
                                        <div class="minicart-thumb">
                                            <a href="product-details.php">
                                                <img src="' . $row['productImage'] . '" alt="product">
                                            </a>
                                        </div>
                                        <div class="minicart-content">
                                            <h3 class="product-name">
                                                <a href="product-details.php">' . $row['productName'] . '</a>
                                            </h3>
                                            <p>
                                                <span class="cart-quantity">' . $row['Quantity'] . ' <strong>&times;</strong></span>
                                                <span class="cart-price">&#8377;' . $row['totalPrice'] . '</span>
                                            </p>
                                        </div>
                                        <button type = "button" class="minicart-remove" id = "mdltBtn' . $row['cno'] . '"><i class="pe-7s-close"></i></button>
                                    </li>';
    
                                $total = ($row['Quantity'] * $row['totalPrice']);
                                $subtotal = ($subtotal + $total);
                                $total = 0;
                            }
                        }

                       
                        ?>


                    </ul>
                </div>
               
                <div class="minicart-pricing-box">
                    <ul>
                        <li>
                            <span>sub-total</span>
                            <span><strong>&#8377; <?php echo $subtotal; ?></strong></span>
                        </li>

                        <li>
                            <span>delivery charge</span>
                            <span><strong>&#8377; <?php echo $deliverycharge; ?></strong></span>
                        </li>
                        <li class="total">
                            <span>total</span>
                            <span><strong>&#8377; <?php echo $subtotal + $deliverycharge; ?></strong></span>
                        </li>
                    </ul>
                </div>

                <div class="minicart-button">
                    <a href="cart.php"><i class="fa fa-shopping-cart"></i> View Cart</a>
                    <a href="cart.php"><i class="fa fa-share"></i> Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>