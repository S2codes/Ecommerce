<?php
 function FileUpload($file){
    if(isset($file)){
        $file_name = $file['name'];
        $file_tmp =$file['tmp_name'];
        $file_ext=explode('.',$file['name']);
        $file_ext=end($file_ext);
        $file_ext=strtolower($file_ext);
        $name="uploads/".time()."_".$file_name;
        $status="Error";
        if(move_uploaded_file($file_tmp,"../".$name)){
            $status="Success";
        }
        $response=array(
            "status"=>$status,
            "link"=>$name,
            "type"=>$file_ext
        );
        return $response;
    }
 }
?>