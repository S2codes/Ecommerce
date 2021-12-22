<?php
include "../component/_connect.php";
// $userId = $_POST['userid'];
$userId = 3;

$sql = "SELECT `Quantity`, `totalPrice` FROM `cartdata` WHERE `userId` = '$userId'";
$result = mysqli_query($conn, $sql);
if ($result) {
    // echo 'true';
    if (mysqli_num_rows($result) > 0) {
        $qty = 0;
        $price = 0;
        $grossTotal = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $qty = $row['Quantity'];
            $price = $row['totalPrice'];
            $grossTotal += ($qty * $price);
        }
        echo $grossTotal;
    }
} else {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-exclamation-triangle"></i> Error!</strong> please reload and try agian.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
