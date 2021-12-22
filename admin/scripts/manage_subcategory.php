<?php
require_once("../includes/auth.php");
//Database access object
$DAO = new Database();


$type=$_POST['type']; 
$name = $_POST['name']; 

//Status
$status = 0;
if (isset($_POST['status'])) {
    $status = 1;
}
//Get Category Name
if ($type == 'GET_CATEGORY') {
    $query = "SELECT * FROM `subcategories` WHERE `name`='" . $name . "' ";
    $data = $DAO->RetriveSingle($query);
    echo $data['category'];
}
//Get Subcategory Commision
if ($type == 'GET_COMMISION') {
    $query = "SELECT * FROM `subcategories` WHERE `name`='" . $name . "' ";
    $data = $DAO->RetriveSingle($query);
    echo $data['commision'];
}
//Get Subcategory Attributes
if ($type == 'GET_ATTRIBUTES') {
    $query = "SELECT * FROM `subcategories` WHERE `name`='" . $name . "' ";
    $data = $DAO->RetriveSingle($query);
    if (strlen($data['attributes'])) {
        echo $data['attributes'];
    }
}
//check data type
if ($type == 'NEW') {
    $category = $_POST['category'];
    $description = $_POST['description'];
    $attributes = $_POST['attributes'];
    //New Category Entry
    $query = "INSERT INTO `subcategories`(`name`, `description`, `category`, `attributes`, `status`) VALUES ('" . $name . "','" . $description . "','" . $category . "','" . $attributes . "','" . $status . "') ";
    if ($DAO->CheckUnique($name, 'name', 'subategories')) {
        if ($DAO->Query($query)) {
            echo "Subcategory Saved";
        } else {
            echo "Error Occued";
        }
    } else {
        echo "Subcategory with same name already exists";
    }
}
if ($type == "UPDATE") {
    $category = $_POST['category'];
    $description = $_POST['description'];
    $attributes = $_POST['attributes'];
    //Updte Existing Category
    $query = "UPDATE `subcategories` SET `name`='" . $name . "', `description`='" . $description . "', `category`='" . $category . "', `attributes`='" . $attributes . "', `status`='" . $status . "' WHERE `id`='" . $_POST['id'] . "' ";
    if ($DAO->Query($query)) {
        echo "Subcategory Saved";
    } else {
        echo "Some error occured";
    }
}
if ($type == "DELETE") {
    //Delete Existing Category
    $query = "DELETE FROM `subcategories` WHERE `id`='" . $_POST['id'] . "' ";
    if ($DAO->Query($query)) {
        echo "Subcategory Deleted";
    } else {
        echo "Some error occured";
    }
}
