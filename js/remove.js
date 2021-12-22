$(document).ready(function () {
    // remove product from cart 
    $('.removebtn').click(function () {
        var productId = $(this).attr('id');
        var userId = $('#userid').val()
        var tr = $('#tr' + productId);

        // console.log( 'product id is ' + productId + 'and' + userId);
        // alert(productId);
        $.post(
            './operation/remove_cart.php',
            { productId: productId, userId: userId },
            function (data, status) {
                if (status) {
                    if (data == 'true') {
                        tr.remove();
                    } else {
                        $('#alert').html(data).slideDown();
                    }
                }
            }

        )
    });


    // remove product from wishlist 
    $('.removewish').click(function () {
        var productid = $(this).attr('id');
        var userid = $('#userid').val()
        var trwishlistRow = $('#wishlistRow' + productid);

        // console.log( 'product id is ' + productid + 'and session id ' + userid);
        // alert(productid);
        $.post(
            './operation/remove_wishlist.php',
            { productid: productid, userid: userid },
            function (data, status) {
                if (status) {
                    // alert(data);
                    if (data == 'true') {
                        // alert(data);
                        trwishlistRow.remove();
                        wishlist_count()

                    } else {
                        $('#alert').html(data).slideDown();
                    }
                }
            }
        )
    });





});