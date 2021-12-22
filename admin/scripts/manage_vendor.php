<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../includes/auth.php");
//Database access object
$DAO = new Database();
if ($_POST['type'] == 'NEW') {
    $login = "off";
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
    }
    $status = "off";
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    $photo = "images/placeholder_profile.png";
    if (strlen($_POST['photo'])) {
        $photo = $_POST['photo'];
    }

    if ($_POST['password'] == $_POST['confirm_password']) {
        $s = "INSERT INTO `vendors`(`name`, `proprietor_name`, `email`, `phone`, `gst`, `license_no`, `description`, `house`, `area`, `landmark`, `city`, `pin`, `state`, `username`, `password`, `login`, `status`, `photo`, `reg_date`) VALUES 
        ('" . $_POST['name'] . "','" . $_POST['proprietor_name'] . "','" . $_POST['email'] . "','" . $_POST['phone'] . "','" . $_POST['gst'] . "','" . $_POST['license_no'] . "','" . $_POST['description'] . "','" . $_POST['house'] . "','" . $_POST['area'] . "','" . $_POST['landmark'] . "','" . $_POST['city'] . "','" . $_POST['pin'] . "','" . $_POST['state'] . "','" . $_POST['username'] . "','" . $_POST['password'] . "','" . $login . "','" . $status . "','" . $photo . "','" . date('Y-m-d') . "')";
        if ($DAO->Query($s)) {
            echo "Vendor Successfully Registered";
        } else {
            echo "Ops! It seems something went wrong";
        }
    }else{
        echo "Password doesn't matched";
    }
    
}
if ($_POST['type'] == 'UPDATE') {
    //print_r($_POST);
    $login = "off";
    if (isset($_POST['login'])) {
        $login = $_POST['login'];
    }
    $status = "off";
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    $photo = "images/placeholder_profile.png";
    if (strlen($_POST['photo'])) {
        $photo = $_POST['photo'];
    }

    if ($_POST['password'] == $_POST['confirm_password']) {
        $s = "UPDATE `vendors` SET `name`='".$_POST['name']."',`proprietor_name`='".$_POST['proprietor_name']."',`email`='".$_POST['email']."',`phone`='".$_POST['phone']."',`gst`='".$_POST['gst']."',`license_no`='".$_POST['license_no']."',`description`='".$_POST['description']."',`house`='".$_POST['house']."',`area`='".$_POST['area']."',`landmark`='".$_POST['landmark']."',`city`='".$_POST['city']."',`pin`='".$_POST['pin']."',`state`='".$_POST['state']."',`username`='".$_POST['username']."',`password`='".$_POST['password']."',`login`='".$login."',`status`='".$status."',`photo`='".$photo."' WHERE `id`='".$_POST['id']."' ";
        if ($DAO->Query($s)) {
            echo "Profile Saved";
        } else {
            echo "Ops! It seems something went wrong";
        }
    }else{
        echo "Password doesn't matched";
    }
    
}
if ($_POST['type'] == 'DELETE') {
    //print_r($_POST);
    
        $s = "DELETE FROM `vendors` WHERE `id`='".$_POST['id']."' ";
        if ($DAO->Query($s)) {
            echo "Profile Removed";
        } else {
            echo "Ops! It seems something went wrong";
        }

    
}

