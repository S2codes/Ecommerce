$(document).ready(function () {
    // var id = $('.qtyValue').attr('id'); 
    // $('#'+id).val();
    $('.qtyValue').on('change', function () {
      var id = $(this).attr('id');
    //   alert(id);

      borderRed(id);
    });

    var userid = $('#userid').val();
    function borderRed(id) {
        var productid = id;
        var productprice = $('#productprice'+id).val();
        var totalprice = $('#totalPrice'+id);
        var quantityid = $('#'+id);
        var qunatity = quantityid.val();
        //  bid.css('border', '2px solid red');
        //  alert('value ' + qunatity);
        //  alert('userid ' + userid);
        //  alert('product price ' + productprice);

         $.post(
             './operation/update_cart.php',
             {productid : productid , qunatity : qunatity , userid : userid},
             function (data,status) {
                 if (status) {
                         var grosstotal = (productprice * qunatity);
                    //  productprice.html('totalPrice is ' + totalPrice);
                    //  alert(grosstotal);
                    if (data == 'true') {
                        totalprice.html(grosstotal);
                        // alert('incr : ' + grosstotal);
                        // console.log('hello');
                        grossTotal()

                    }else{
                        $('#alert').html(data)
                    }
                 }
             }

         )

    }



    function grossTotal() {
        // alert('total function'+ userid);
        $.post(
            './operation/grossTotal_cart.php',
            {userid : userid},
            function (data, status) {
                if (status) {
                    // alert('Data from gross total :'+data);
                    // console.log(data);
                    $('#grossTotal').html(data);
                }
            }
        )
    }
});