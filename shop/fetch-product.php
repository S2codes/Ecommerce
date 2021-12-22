<?php
//  echo 'Hello World';
?>
<div class="shop-product-wrap grid-view row mbn-30" id="productContainer">

</div>

<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/shopScript/getjsondata.js"></script>
<script>
    Products()
    // product 
    function Products() {

        // subcategory = "";
        // category = "";
        // search = "";
        // filter = "";

        // form = new FormData();
        // form.append("api_key", api_key);
        // form.append("subcategory", subcategory);
        // form.append("category", category);
        // form.append("search", search);
        // form.append("filter", filter);

        apiRequest("http://localhost/Yoginee-E-com/ecom/api/fetch_products.php", 123, function(data) {
            // document.write(data);
            // console.log('Data is : =>');
            // console.log(data);
            $.each(data, function(key, val) {
                // console.log('product name is :> '+ val.name);
                $('#productContainer').append(`
                    <div class="col-md-4 col-sm-6">
                     <div class="product-item">
            <figure class="product-thumb">
                <a href="product-details.php?product-query=${val.id}">
                    <img class="pri-img" src="./${val.featured_photo}" alt="product">
                </a>
                <div class="product-badge">
                    <div class="product-label new">
                        <span>new</span>
                    </div>
                    <div class="product-label discount">
                        <span>${val.discount}</span>
                    </div>
                </div>
               
                <div class="cart-hover">
                    <a href = "product-details.php?product-query=${val.id}" class="btn btn-cart">add to cart</a>
                </div>
            </figure>
            <div class="product-caption text-center">
                <div class="product-identity">
                    <p class="manufacturer-name"><a href="product-details.html">${val.category}</a></p>
                </div>
                
                <h6 class="product-name">
                    <a href="product-details.html">${val.name}</a>
                </h6>
                <div class="price-box">
                    <span class="price-regular">&#8377; ${val.product_price}</span>
                    <span class="price-old"><del>&#8377; ${val.mrp}</del></span>
                    </div>
                    </div>
        </div>
    </div>`);
            })
        });

    }
</script>