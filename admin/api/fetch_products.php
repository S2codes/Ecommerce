<?php
/***
 * FetchProducts
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
$api_key = 123;
if (CheckAuthentication($api_key)) {
    // $category =      $_POST['category'];
    // $subcategory =   $_POST['subcategory'];
    // $search =        $_POST['search'];
    // $s = "SELECT * FROM `products` WHERE `subcategory` LIKE '%" . $subcategory . "%' AND `category` LIKE '%" . $category . "%' AND `name` LIKE '%" . $search . "%' ";
    $s = "SELECT * FROM `products`";
    $data = $DAO->RetriveArray($s);
    $products=array();
    foreach($data as $product){
        $available="false";
        if($product['status']=='on'){
            $available="true";
        }
        $raw_photos=json_decode($product['photos'],true);
        $photos=array();
        foreach($raw_photos as $photo){
            array_push($photos,"ecom/".$photo);
        }
        $temp=array(
            "id"=>$product['id'],
            "name"=>$product['name'],
            "subcategory"=>$product['subcategory'],
            "category"=>$product['category'],
            "manufacturer"=>$product['manufacturer'],
            "short_description"=>$product['short_description'],
            // "description"=>$product['description'],
            "mrp"=>$product['mrp'],
            "product_price"=>$product['product_price'],
            "discount" => $product['discount'],
            "stock" => $product['stock'],
            "delivery_charge"=>$product['delivery_charge'],
            "available"=>$available,
            "featured_photo"=>"ecom/".$product['featured_photo'],
            "photos"=>$photos,
            "attributes"=>$product['attributes']
        );
        array_push($products,$temp);
    }
    echo json_encode($products);
}
