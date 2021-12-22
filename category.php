
<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/getcatg.js"></script>

<script>

productCategories();
// subCategories()

// fetch product categories
    function productCategories() {
        apiRequest('http://localhost/Yoginee-E-com/ecom/api/fetch_categories.php', 123, function(data){
            $.each(data, function (key, val) {
                    $('#ctgdata').append('Category Name : '+val.name + '<br>');
                });
        });

    }

// fetch product sub categories
    function subCategories() {
        apiRequest('http://localhost/Yoginee-E-com/ecom/api/fetch_subcategories.php', 123, function(data){
            $.each(data, function (key, val) {
                    $('#ctgdata').append('subCategory Name : '+val.name + '<br>');
                });
        });

    }
// fetch product product


</script>