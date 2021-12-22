// ajax operation for fetch api from cp 

// url,request,callback 
apiRequest = function (url, request, callback) {
    $.ajax({
        // url: 'http://localhost/Yoginee-E-com/ecom/api/fetch_categories.php',
        url: url,
        type: 'POST',
        data: { "api_key": request },
        dataType: 'json',
        success: function (data, status) {
            if (status) {
                // console.log(data);
                // $.each(data, function (key, val) {
                //     console.log(key+' is : ' + val.name);
                //     // $('#ctgdata').append(val.name + '<br>');
                // });
                callback(data);
            } else {
                console.log('error');
            }
        }
    });
}






