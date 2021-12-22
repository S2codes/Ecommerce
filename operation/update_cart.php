<?php
    // include "./_connect.php";
    include "../component/_connect.php";
    $productId = $_POST['productid'];
    $quantity = $_POST['qunatity'];
    $userId = $_POST['userid'];
    // echo " user : ". $userId .". product id : ".$productId."quantity : ".$quantity;




    $sql = "UPDATE `cartdata` SET `Quantity`= '$quantity'  WHERE `productId` = '$productId' AND `userId` = '$userId'";
    $result = mysqli_query($conn , $sql);
    if ($result) {
        echo 'true';
    }else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle"></i> Error!</strong> please reload and try agian.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

    }

?>