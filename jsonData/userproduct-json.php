<?php
include "../component/_connect.php";
// $id = $_SESSION['id'];
// $id = 3;
// $auth = 123;
$id = $_GET['orderquery'];
// $api_key = $_GET['api'];

// if ($api_key = $auth) {
    

$sql = "SELECT * FROM `cartdata` WHERE `userId` = '$id'";
$result = mysqli_query($conn, $sql);
$orders = array();
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        // $row = mysqli_fetch_assoc($result);

        while ($row = mysqli_fetch_assoc($result)) {
            $temporder = array(
                "productid" => $row['productId'],
                "productname" => $row['productName'],
                "productquantity" => $row['Quantity'],
                "productprice" => $row['totalPrice'],
                "productimage" => $row['productImage']
            );
            array_push($orders, $temporder);
        }
        $probj = json_encode($orders);
        // echo 'order is';
        // echo '<pre>';
        print_r ($probj);
        // echo '</pre>';
           
    }else{
        echo false;
    }
}else{
    echo false;
}

// }

?>