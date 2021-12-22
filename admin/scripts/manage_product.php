<?php
require_once("../includes/auth.php");
//Database access object
$DAO = new Database();
if ($_POST['type'] == 'NEW') {
    if (!$DAO->CountRows("SELECT * FROM `products` WHERE `name`='" . $_POST['name'] . "' AND `subcategory`='" . $_POST['subcategory'] . "' ")) {
        $s = "INSERT INTO `products`(`name`, `subcategory`, `category`,`manufacturer`, `short_description`, `description`, `mrp`, `selling_price`, `discount`, `gst`, `delivery_charge`, `product_price`, `commission`, `total_earning`, `stock`, `available`, `status`, `attributes`, `featured_photo`, `photos`, `date`) VALUES 
            ('" . $_POST['name'] . "','" . $_POST['subcategory'] . "','" . $_POST['category'] . "','" . $_POST['manufacturer'] . "','" . $_POST['short_description'] . "','" . $_POST['description'] . "','" . $_POST['mrp'] . "','" . $_POST['selling_price'] . "','" . $_POST['discount'] . "','" . $_POST['gst'] . "','" . $_POST['delivery_charge'] . "','" . $_POST['product_price'] . "','" . $_POST['commision'] . "','" . $_POST['total_earning'] . "','" . $_POST['stock'] . "','" . $_POST['available'] . "','" . $_POST['status'] . "','" . $_POST['attributes'] . "','" . $_POST['featured_photo'] . "','" . $_POST['photos'] . "','" . date('Y-m-d') . "')";
        if ($DAO->Query($s)) {
            echo "Product has been successfully registered";
        } else {
            echo "Something went wrong!";
        }
    } else {
        echo "Product with same name already exists";
    }
}
if ($_POST['type'] == 'UPDATE') {

    $s = "UPDATE `products` SET `name`='" . $_POST['name'] . "',`subcategory`='" . $_POST['subcategory'] . "',`category`='" . $_POST['category'] . "',`manufacturer`='" . $_POST['manufacturer'] . "',`short_description`='" . $_POST['short_description'] . "',`description`='" . $_POST['description'] . "',`mrp`='" . $_POST['mrp'] . "',`selling_price`='" . $_POST['selling_price'] . "',`discount`='" . $_POST['discount'] . "',`gst`='" . $_POST['gst'] . "',`delivery_charge`='" . $_POST['delivery_charge'] . "',`product_price`='" . $_POST['product_price'] . "',`commission`='" . $_POST['commision'] . "',`total_earning`='" . $_POST['total_earning'] . "',`stock`='" . $_POST['stock'] . "',`available`='" . $_POST['available'] . "',`status`='" . $_POST['status'] . "',`attributes`='" . $_POST['attributes'] . "',`featured_photo`='" . $_POST['featured_photo'] . "',`photos`='" . $_POST['photos'] . "',`date`='" . date('Y-m-d') . "' WHERE `id`='" . $_POST['id'] . "'";
    if ($DAO->Query($s)) {
        echo "Product has been successfully updated";
    } else {
        echo "Something went wrong!";
    }
    
}
if ($_POST['type'] == 'DELETE') {

    $s = "DELETE FROM `products` WHERE `id`='" . $_POST['id'] . "'";
    if ($DAO->Query($s)) {
        echo "Product has been successfully removed";
    } else {
        echo "Something went wrong!";
    }
    
}
