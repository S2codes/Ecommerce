<?php
session_start();
$user_id = null;

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    echo 0;
} else {
    $user_id = $_SESSION['id'];
    include "../component/_connect.php";
    $sql = "SELECT `productid` FROM `cartdata` WHERE userId = '$user_id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo '0';
    } else {
        $num_rows = mysqli_num_rows($result);
        if ($num_rows > 0) {
            echo  $num_rows;
        } else {
            echo '0';
        }
    }
}
?>