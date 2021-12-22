// product Categories - call
productCategories();


// product Categories
function productCategories() {
    apiRequest('../ecom/api/fetch_categories.php', 123, function(data){
        $.each(data, function (key, val) {
                if (val.status == 1) {
                    $('#productCategories').append(`<li><a href="#">${val.name}</a></li>`);
                }
        });
    });

}

