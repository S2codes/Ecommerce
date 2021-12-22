<?php
    require_once("../includes/auth.php");
    //Database access object
    $DAO=new Database();

    $type=$_POST['type'];
    $name=$_POST['name'];
    $sort=$_POST['sort'];
    $description=$_POST['description'];
    //Top menu visibility
    $top_menu=0;
    if(isset($_POST['top_menu'])){
        $top_menu=1;
    }
    //Homepage featuring
    $homepage_featured=0;
    if(isset($_POST['homepage_featured'])){
        $homepage_featured=1;
    }
    //Status
    $status=0;
    if(isset($_POST['status'])){
        $status=1;
    }

    //check data type
    if($type=='NEW'){
        //New Category Entry
        $query="INSERT INTO `categories`(`name`, `description`, `top_menu`, `homepage_featured`,`sort`, `status`) VALUES ('".$name."','".$description."','".$top_menu."','".$homepage_featured."','".$sort."','".$status."')";
        if($DAO->CheckUnique($name,'name','Categories')){
            if($DAO->Query($query)){
                echo "Category Saved";
            }else{
                echo "Error Occued";
            }
        }else{
            echo "Category with same name already exists";
        }
    }
    if($type=="UPDATE"){
        //Updte Existing Category
        $query="UPDATE `categories` SET `name`='".$name."',`sort`='".$sort."' ,`description`='".$description."', `top_menu`='".$top_menu."', `homepage_featured`='".$homepage_featured."', `status`='".$status."' WHERE `id`='".$_POST['id']."' ";
        if($DAO->Query($query)){
            echo "Category Saved";
        }else{
            echo "Some error occured";
        }
    }
    if($type=="DELETE"){
        //Delete Existing Category
        $query="DELETE FROM `categories` WHERE `id`='".$_POST['id']."' ";
        if($DAO->Query($query)){
            echo "Category Deleted";
        }else{
            echo "Some error occured";
        }
    }
?>