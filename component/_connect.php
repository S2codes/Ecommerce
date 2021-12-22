<?php
$server = "localhost";
$username = "root";
$pass = "";
$db = "yoginee";

$conn = mysqli_connect($server, $username, $pass, $db);
if (!$conn) {
    echo " Unable to connect to DataBasae";
}

?>