<?php
    include "../component/_connect.php";
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $email = str_replace(' ', '', $email);
    $pass = str_replace(' ', '', $pass);
    $sql = "SELECT * FROM `customerdata` WHERE useremail = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $num_row = mysqli_num_rows($result);
        if ($num_row == 1) {
            while ($row = mysqli_fetch_assoc($result)) {
                if (password_verify($pass, $row['pwd'])) {
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $row['SrNo'];
                    $_SESSION['name'] = $row['username'];

                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-check-circle"></i> Success!</strong> you have successfully logged in.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                } else {
                    // echo 'Wrong password. please Enter a Valid Password';
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong><i class="fas fa-exclamation-triangle"></i> Wrong Password!</strong> please Enter a Valid Password.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                }
            }
        } else {
            // echo 'No account found. Please check your email or create an account if you do not have one.';
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-info-circle"></i>No account found!</strong> Please check your email or create an account if you do not have one.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
    }
