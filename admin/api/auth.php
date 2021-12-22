<?php
    define("api_key","123");
    function CheckAuthentication($api){
        if($api==api_key){
            return true;
        }
        return false;
    }
?>