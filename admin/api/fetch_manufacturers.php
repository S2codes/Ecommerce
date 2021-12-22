<?php
/***
 * FetchManufacturers
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
if (CheckAuthentication($api_key)) {
    $s = "SELECT * FROM `manufacturers` ORDER BY `name` ASC ";
    $data = $DAO->RetriveArray($s);
    $manufacturers=array();
    foreach($data as $manufacturer){
        $temp=array(
            "name"=>$manufacturer['name'],
            "status"=>$manufacturer['status'],
        );
        array_push($manufacturers,$temp);
    }
    echo json_encode($manufacturers);
}