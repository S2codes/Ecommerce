<?php
    require_once("../includes/auth.php");
    //Database access object
    $DAO=new Database();

    $type=$_POST['type'];
    $name=$_POST['name'];
    $description=$_POST['description'];
    //Status
    $status=0;
    if(isset($_POST['status'])){
        $status=1;
    }

    //check data type
    if($type=='NEW'){
        //New Manufacturer Entry
        $query="INSERT INTO `manufacturers`(`name`, `description`,`status`) VALUES ('".$name."','".$description."','".$status."')";
        if($DAO->CheckUnique($name,'name','manufacturers')){
            if($DAO->Query($query)){
                echo "Manufacturer Details Saved";
            }else{
                echo "Error Occued";
            }
        }else{
            echo "Manufacturer with same name already exists";
        }
    }
    if($type=="UPDATE"){
        //Updte Existing Manfacturer
        $query="UPDATE `manufacturers` SET `name`='".$name."',`description`='".$description."', `status`='".$status."' WHERE `id`='".$_POST['id']."' ";
        if($DAO->Query($query)){
            echo "Manufacturer Details Saved";
        }else{
            echo "Some error occured";
        }
    }
    if($type=="DELETE"){
        //Delete Existing Manufacturer
        $query="DELETE FROM `manufacturers` WHERE `id`='".$_POST['id']."' ";
        if($DAO->Query($query)){
            echo "Manufacturer Deleted";
        }else{
            echo "Some error occured";
        }
    }
?>