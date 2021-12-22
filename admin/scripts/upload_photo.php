<?php
    require_once("upload_file.php");
    if(isset($_FILES['image'])){
        $upload=FileUpload($_FILES['image']);
        echo $upload['link'];
    }
?>