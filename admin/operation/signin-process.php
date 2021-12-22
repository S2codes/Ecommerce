<?php
$Email = "admin.yoginee@gmail.com";
$pass = "@#eenigoY00!";
if (isset($_POST['subBtn'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // echo 'post';
        $email = $_POST['emial'];
        $pwd = $_POST['password'];
        
        if ($email == $Email) {
            if ($pwd == $pass) {
                header("Location: ../index.php");
                session_start();
                $_SESSION['loggedin'] = true;
            }
        }
    }
}
