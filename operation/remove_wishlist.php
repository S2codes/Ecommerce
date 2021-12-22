<?php
    // include "./_connect.php";
    include "../component/_connect.php";
    $productId = $_POST['productid'];
    $userId = $_POST['userid'];
    $sql = "DELETE FROM `wishlistdata` WHERE productid = '$productId' AND userid = '$userId'";
    $result = mysqli_query($conn , $sql);
    if ($result) {
        echo 'true';
        // $row = mysqli_num_rows($result);
        // if ($row > 0)  {
        //     echo 'true -'. $row;
        // }else {
        //     echo 'false';
        // }
    }else {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle"></i> Error!</strong> please reload and try agian.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';

    }

?>