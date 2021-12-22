<?php
    require_once("../includes/auth.php");
    //Database access object
    $DAO=new Database();
    //Status
    $status=0;
    if(isset($_POST['status'])){
        $status=1;
    }
    $type=$_POST['type'];

    //check data type
    if($type=='NEW'){
        //New Manufacturer Entry
        $query="INSERT INTO `coupons`(`name`, `type`, `category`, `min_amt`, `max_amt`, `amount`, `percent`, `code`, `status`) VALUES 
        ('".$_POST['name']."','".$_POST['coupon_type']."','".$_POST['category']."','".$_POST['min_amt']."','".$_POST['max_amt']."','".$_POST['amount']."','".$_POST['percent']."','".$_POST['code']."','".$status."')";
        if($DAO->CheckUnique($_POST['code'],'code','coupons')){
            if($DAO->Query($query)){
                echo "Coupon Details Saved";
            }else{
                echo "Error Occued";
            }
        }else{
            echo "Coupon with same code already exists";
        }
    }
    if($type=="UPDATE"){
        //Updte Existing Coupon
        $query="UPDATE `coupons` SET `name`='".$_POST['name']."',`type`='".$_POST['coupon_type']."',`category`='".$_POST['category']."',`min_amt`='".$_POST['min_amt']."',`max_amt`='".$_POST['max_amt']."',`amount`='".$_POST['amount']."',`percent`='".$_POST['percent']."',`code`='".$_POST['code']."',`status`='".$status."' WHERE `id`='".$_POST['id']."' ";
        if($DAO->Query($query)){
            echo "Coupon Details Saved";
        }else{
            echo "Some error occured";
        }
    }
    if($type=="DELETE"){
        //Delete Existing Manufacturer
        $query="DELETE FROM `coupons` WHERE `id`='".$_POST['id']."' ";
        if($DAO->Query($query)){
            echo "Coupon Deleted";
        }else{
            echo "Some error occured";
        }
    }
?>