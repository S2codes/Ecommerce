<?php
    include "../component/_connect.php";
    $name =  $_POST['Name']; 
    $name = str_replace('<','&lt',$name); 
    $name = str_replace('>','&gt',$name); 

    $email =  $_POST['Email']; 
    $email = str_replace('<','&lt',$email); 
    $email = str_replace('>','&gt',$email); 

    $pwd =  $_POST['Pass']; 
    
    $pwd = password_hash($pwd, PASSWORD_DEFAULT);
    // echo 'hello'.$name.'from '.$email.' and pass : '.$pwd.' from php';
    // chechk 
    $sql = "SELECT * FROM `customerdata` WHERE useremail = '$email'";
    $result = mysqli_query($conn, $sql);
    $num_row = mysqli_num_rows($result);

    if ($result) {
        if ($num_row > 0) {
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-info-circle"></i> Note!</strong> Email address is already registered
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
        else {
            $sql = "INSERT INTO `customerdata` (`username`, `useremail`, `pwd`) VALUES ('$name', '$email', '$pwd')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Success!</strong> Your account was created Successfully. Now please Sign in to continue.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i> Error!</strong> some error occurred reload and try again
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }

