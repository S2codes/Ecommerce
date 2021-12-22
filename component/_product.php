<?php
include "_connect.php";

// <!-- variable for new and sale -->

$saleBtn = 0;
$sql = "SELECT * FROM `product-details` ";
$result = mysqli_query($conn, $sql);
while ($rows = mysqli_fetch_assoc($result)) {
    // echo var_dump($rows);
    $pId = $rows['sno'];
    $productName = $rows['productName'];
    $type = $rows['type'];
    $originalPrice = $rows['originalPrice'];
    $discountedPrice = $rows['discountedPrice'];
    $image = $rows['image'];
    $new = $rows['new'];
    $sale = $rows['sale'];

    echo '
        <div class="product-item">
                                           
             <figure class="product-thumb">
                 <a href="product-details.php?product-query=' . $pId . '">
                     <img class="pri-img" src="/Yoginee-E-com/images/product/' . $image . '" alt="product">
                 </a>
                 <div class="product-badge">
                 
                 ';
    if ($new != 0) {
        $newBtn = "new Product";
        echo ' <div class="product-label new">
                    <span>' . $newBtn . '</span>  </div>
                    ';
    }
    if ($sale != 0) {
        $saleBtn = $sale;

        echo '
                        <div class="product-label discount">
                            <span>' . $saleBtn . '%</span> 
                            </div>';
    }

    echo '
                 </div>
                 
                 <div class="cart-hover">
                 <a href="product-details.php?product-query=' . $pId . '">
                 <button class="btn btn-cart cartbtn" id = "pbtn' . $pId . '">add to cart</button>
                 </a>
                 </div>
             </figure>
             <div class="product-caption text-center">
                 <div class="product-identity">
                     <p class="manufacturer-name"><a href="product-details.php" id = "type"> ' . $type . '</a></p>
                 </div>
                
                 <h6 class="product-name">
                     <a href="product-details.php">' . $productName . '</a>
                 </h6>
                 <div class="price-box">
                     <span class="price-regular" id - "pprice">&#8377; ' . $discountedPrice . '</span>
                     <span class="price-old"><del>&#8377; ' . $originalPrice . '</del></span>
                 </div>
             </div>
         </div>
        ';
}


?>

<!-- <ul class="color-categories">
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
</ul> -->

<!-- <form action="" method="post">
                 <input type="hidden" name="pid" id="pid'.$pId.'" value="'.$pId.'">
                 <input type="hidden" name="pname" id="pname'.$pId.'" value="' . $productName . '">
                 <input type="hidden" name="pprice" id="pprice'.$pId.'" value="' . $discountedPrice . '">
                 <button class="btn btn-cart cartbtn" id = "pbtn'.$pId.'">add to cart</button>
</form> -->