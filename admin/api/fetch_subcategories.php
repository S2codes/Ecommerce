<?php
/***
 * FetchSubcategories
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Database Access Object
require_once("../includes/database.php");

//Authentication is to check access for API
include "auth.php";
$DAO = new Database();
$api_key = $_POST['api_key'];
// $api_key = 123;
if (CheckAuthentication($api_key)) {
    $s = "SELECT * FROM `subcategories` ORDER BY `name` ASC ";
    $data = $DAO->RetriveArray($s);
    $subcategories=array();
    foreach($data as $subcategory){
        $temp=array(
            "name"=>$subcategory['name'],
            "status"=>$subcategory['status'],
        );
        array_push($subcategories,$temp);
    }
    echo json_encode($subcategories);
}
