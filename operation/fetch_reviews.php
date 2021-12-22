<?php
    // include "../component/_connect.php";
    $sql = "SELECT * FROM `reviews` WHERE `productId` = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        if (mysqli_num_rows($result) > 0 ) {
            while ($review = mysqli_fetch_assoc($result)) {
                echo '<div class="total-reviews mt-2">
                <div class="rev-avatar">
                    <img src="assets/img/about/avatar.jpg" alt="">
                </div>
                <div class="review-box">
                    <div class="ratings">
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span class="good"><i class="fa fa-star"></i></span>
                        <span><i class="fa fa-star"></i></span>
                    </div>
                    <div class="post-author">
                        <p><span>'.$review['username'].' -</span>'.$review['date'].'</p>
                    </div>
                    <p>'.$review['review'].'</p>
                </div>
            </div>';
            }
        }else{
            echo '<div class="total-reviews my-3">
            <div class="review-box">
                    <p>No Review Available</p>
                </div>
            </div>';
        }
    }
?>

