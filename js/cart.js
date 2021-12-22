$(document).ready(function () {
    
    // alert -> add to cart without login 
    $('#nologin').click(function () {
        // console.log('No login');
        $('#notif-alert').append(`<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-info-circle"></i> info! </strong> Please login first to add to cart
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`);
    })
    // alert -> add to cart without login 
    $('#nowishlist').click(function () {
        // console.log('No login');
        $('#notif-alert').append(`<div class="alert alert-info alert-dismissible fade show" role="alert">
        <strong><i class="fas fa-info-circle"></i> info! </strong> Please login first to add to wishlist
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>`);
    })


    // var e = false;
    // cart_count(e);
    // count how many product area vailable in cart 
    function cart_count() {
        $.post(
            'operation/cart_count.php',


            function (data) {
                // console.log(data);
                // alert(data);
                $('#totalProduct').html(data);
                $('#totalProduct2').html(data);
                // $('#totalProduct').text(data);
            }
        )
    }


    cart_count();

    // add to cart ajax start here 
    
    $('.cartBtn').click(function () {
        var id = $(this).attr('id');
        var productId = $('#poductid'+id+'').val();
        var productName = $('#poductname'+id+'').val();
        var productPrice = $('#poductprice'+id+'').val();
        var productQuanty = $('#productQuanty'+id+'').val();
        var productSize = $('#productSize'+id+'').val();
        var productImage = $('#poductimage'+id+'').val();
        var userid = $('#user').val();
        // post request 
        $.post(
            'operation/product_process.php',
            {
                 pid : productId,
                 pname : productName, 
                 pimage : productImage,
                 pprice : productPrice, 
                 pquantity : productQuanty, 
                 psize :productSize,
                 userid : userid
            },

            function (data, status) {
                // console.log(data);
                // alert(status);
                // var e = false;
                if (status) {
                    $('#notif-alert').html(data);
                    // var e = true;
                    cart_count();
                }
            }


        )

    });


    // wish list
    wishlist_count();
    // wishlist product count 
    function wishlist_count() {
        $.post(
            'operation/wishlist_count.php',


            function (data) {
                // console.log(data);
                $('#wishproduct').html(data);
                // $('#totalProduct').text(data);
            }
        )
    }

    $('.addtowish').click(function () {
        var id = $(this).attr('id');
        var productId = $('#poductid'+id+'').val();
        var productName = $('#poductname'+id+'').val();
        var productPrice = $('#poductprice'+id+'').val();
        var productQuanty = $('#productQuanty'+id+'').val();
        var productSize = $('#productSize'+id+'').val();
        var productImage = $('#poductimage'+id+'').val();
        var userid = $('#user').val();
        // post request 
        $.post(
            'operation/wishlist_process.php',
            {
                 pid : productId,
                 pname : productName, 
                 pimage : productImage,
                 pprice : productPrice, 
                 pquantity : productQuanty, 
                 psize :productSize,
                 userid : userid
            },

            function (data, status) {
                if (status) {
                    if (data = "true") {
                        wishlist_count();
                    }else{
                        $('#notif-alert').html(data);

                    }
                }
            }
        )
    });
   
    // update 
    

});
