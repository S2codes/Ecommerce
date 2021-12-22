$(document).ready(function () {
    var alphabet = new RegExp('[a-zA-Z]');
    // var number = new RegExp('[0-9]');
    var productdata ;
    getproductdata(); 
    var uid = $('#userid').val();
    var name = $('#name').val();
    var uemail = $('#uemail').val();
    var zip = $('#postcode');
    var city = $('#town');
    var street = $('#street-address');
    var state = $('#state');
    var phone = $('#phone');
    var totalprice = $('#grosstotal');

    // pherr

    zip.keyup(function () {
        zipchcek();
    });
    city.keyup(function () {
        citychcek();
    });
    street.keyup(function () {
        streetchcek();
    });
    state.on('change', function () {
        // console.log('state change');
        statechcek();
    });
    phone.keyup(function () {
        contactchcek();
    });




    function contactchcek() {
        var err = $('#pherr');
        var contact = phone.val();
        contact = contact.trim();
        // console.log('contact numis : ' + contact);
        if (contact == '') {
            showError(err, 'Zip value must be filled');
        }
        else {
            // $('#ziperr').html('');
            if (contact.match(alphabet)) {
                showError(err, 'Please enter a valid contact number');
            } else {
                if (/^[a-zA-Z0-9- ]*$/.test(contact) == false) {
                    showError(err, 'Contact number must be only 10 digit number');
                } else {
                    if (contact.length > 10) {
                        showError(err, 'Contact number must be only 10 digit number');
                    } else {
                        clearError(err);
                        return true;
                    }
                }
            }
        }
    }

    function statechcek() {
        var err = $('#statererr');
        if (state.val() == 1) {
            // $('#statererr').html('Please select your state');
            // console.log('sate'+ state.val());
            showError(err, 'Please select your state')
            return false;
        } else {
            clearError(err);
            return true;
        }
    }

    function streetchcek() {
        var err = $('#strerr');
        var streetVal = street.val();
        streetVal = streetVal.trim();
        if (streetVal == '') {
            // $('#strerr').html('Address value must be filled');
            showError(err, 'Address value must be filled');
        }
        else {
            if (streetVal.length > 55) {
                // $('#strerr').html('Address must be between 56 charecter');
                showError(err, 'Address must be between 56 charecter');
            } else {
                // $('#strerr').html('');
                clearError(err);
                return true;
            }
        }

    }

    function citychcek() {
        var err = $('#cityerr');
        var cityVal = city.val();
        cityVal = cityVal.trim();
        if (cityVal == '') {
            // $('#cityerr').html('City value must be filled');
            showError(err, 'City value must be filled');
        }
        else {
            if (/^[a-zA-Z0-9- ]*$/.test(cityVal) == false) {
                $('#cityerr').html('No special character are allowed');
                // showError(err, 'No special character are allowed');
            } else {
                if (cityVal.length < 3 || cityVal.length > 29) {
                    // $('#cityerr').html('City must be between 3 to 29 charecter');
                    showError(err, 'City must be between 3 to 29 charecter');
                } else {
                    // $('#cityerr').html('');
                    clearError(err);
                    return true;
                }
            }
        }

    }


    function zipchcek() {
        var err = $('#ziperr');
        var value = zip.val();
        value = value.trim();
        if (value == '') {
            // $('#ziperr').html('Zip value must be filled');
            showError(err, 'Zip value must be filled');
        }
        else {
            // $('#ziperr').html('');
            if (value.match(alphabet)) {
                // $('#ziperr').html('Zip value should only 6 digit number');
                showError(err, 'Zip value should only 6 digit number');
            } else {
                if (/^[a-zA-Z0-9- ]*$/.test(value) == false) {
                    // $('#ziperr').html('No special character are allowed');
                    showError(err, 'No special character are allowed');
                } else {
                    if (value.length > 7) {
                        // $('#ziperr').html('Zip value have to be only 6 digit number');
                        showError(err, 'Zip value have to be only 6 digit number');
                    } else {
                        // $('#ziperr').html('');
                        clearError(err);
                        return true;
                    }
                }
            }
        }

    }

    // errors 
    function showError(id, msg) {
        id.html(msg);
    }
    function clearError(id) {
        // console.log('id'+id);
        id.html('');
    }



    $('#checkoutBtn').click(function () {
        console.log('checkout');
        // if (zipchcek() & citychcek() & streetchcek() & statechcek() & contactchcek()) {
            // getproductdata(); 
            senddatas();
        // }else{
        //     console.log('fallse');
        // }
    });


    
    // get product 
    function getproductdata() {
        var url = 'http://localhost/Yoginee-E-com/jsonData/userproduct-json.php?orderquery=' + uid;
        // var key = 123;
        // console.log('url' + url);
        $.ajax({
            url: url,
            // data : {"api" : key},
            dataType: 'json',
            success: function (data) {
                productdata = data;
                // console.log('data :');
                // console.log(data);
                // senddata();
            }
        })
    }


    function senddatas() {

        

        // console.log('all check true');
        // console.log('userid ' + uid);
        // console.log('email :' + uemail);
        // console.log('zip'+ zip.val());
        // console.log('city'+ city.val());
        // console.log('addr'+ street.val());
        // console.log('state'+ state.val());
        // console.log('phone'+ phone.val());
        // console.log('pdata :');
        // console.log(productdata);
        // console.log('hm');

        $.ajax({
            url: './operation/proceed.php',
            type: 'post',
            // data: {"name" : name},
            data: { "userid" : uid,
                    "name" : name,
                    "email" : uemail,
                    "zip" :  zip.val(), 
                    "city" : city.val(), 
                    "street" : street.val(), 
                    "phone" : phone.val(),
                    "product": productdata,
                    "price" : totalprice },
            //  contentType:false,
            //  processData:false,

            success: function (data, status) {
                if (status) {
                    console.log('data from proceed ->');
                    console.log(data);

                } else {
                    console.log('failed');
                }
            }

        });
    }










});