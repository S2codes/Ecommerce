<?php
    include "../component/_connect.php";
    $sql = "SELECT * FROM `cartdata`";
    $result = mysqli_query($conn, $sql);
    while ($fetchdata = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
        $data = json_encode($fetchdata);
        echo $data;
    }


?>