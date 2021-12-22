<?php
/***
 * FetchCategories
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Database Access Object
require_once("../includes/database.php");

//Authentication is to check access for API
include "auth.php";
$DAO = new Database();
// $api_key = $_POST['api_key'];
$api_key = 123 ;
if (CheckAuthentication($api_key)) {
    $s = "SELECT * FROM `categories` ORDER BY `name` ASC ";
    $data = $DAO->RetriveArray($s);
    $categories=array();
    foreach($data as $category){
        $temp=array(
            "name"=>$category['name'],
            "sort_by"=>$category['sort'],
            "status"=>$category['status'],
            "top_menu"=>$category['top_menu'],
            "featured"=>$category['homepage_featured'],
        );
        array_push($categories,$temp);
    }
    echo json_encode($categories);
}else {
    echo "invalid credantials";
}
