<?php
$id = null;
$userid = null;
  $id = $_POST['pid'];
  $name = $_POST['pname'];
  $image = $_POST['pimage'];
  $price = $_POST['pprice'];
  $quantity = $_POST['pquantity'];
  $size = $_POST['psize'];
  $userid = $_POST['userid'];

//     // check product is already added or not 
  include "../component/_connect.php";
  $sql = "SELECT * FROM `wishlistdata` WHERE productId = '$id' AND userId = '$userid'";
  $result = mysqli_query($conn, $sql);
  $num_rows = mysqli_num_rows($result);
  if ($num_rows > 0) {
    // echo "Your Product is already added to your cart";
    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
    <strong><i class="fas fa-info-circle"></i>  Note! </strong> already in your wishlist.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';


  }else {

    $sql = "INSERT INTO `wishlistdata` (`productid`, `productname`, `productimage`, `size`, `quantity`, `price`, `userid`) VALUES ('$id', '$name', '$image', '$size', '$quantity', '$price', '$userid');";

    $result = mysqli_query($conn, $sql);
    if ($result) {
    echo 'true';

    }else {
      echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong><i class="fas fa-exclamation-triangle"></i> Sorry! </strong> Unable to add product to cart.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';

    }
  }



?>