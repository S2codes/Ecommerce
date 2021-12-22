var produtcid = $('#prid').val();

// var produtcid = 5;
var pName = $('#pName');
var pCategory = $('#pCategory');
var sellprice = $('#sellprice');
var mrp = $('#mrp');
var stock = $('#stock');
var description = $('#description');
var featured = $('#featured');
var otherimages = $('#otherimages');
var info = $('#info');
var manufactured =$('#manufactured');

// hidden 
console.log('product id is :' + produtcid);
var hpoductid = $('#poductid'+produtcid);
var hpoductname = $('#poductname'+produtcid);
var hpoductprice = $('#poductprice'+produtcid);
var hpoductimage = $('#poductimage'+produtcid);
// console.log('hiddein productname is ::'+hpoductname);


Products()
// product 
function Products() {
    // ../ecom/api/fetch_products.php
    apiRequest("http://localhost/Yoginee-E-com/ecom/api/fetch_products.php", 123, function (data) {
        // document.write(data);
        // console.log('Data is : =>');
        // console.log(data);
        $.each(data, function (key, val) {
            // console.log(val.id +'the id x product name is :> '+ val.name);
            if (val.id == produtcid) {
                // console.log('Attr :=>> '+ val.attributes);
                hpoductid.val(val.id);
                pName.html(val.name);
                hpoductname.val(val.name);

                pCategory.html(val.category);
                mrp.html(val.mrp);

                sellprice.html(val.product_price);
                hpoductprice.val(val.product_price);
                if (val.stock <= 10) {
                    stock.html(`Only ${val.stock} in stock`);
                } if (val.stock == 0) {
                    stock.html(` Sorry! No Product available`);
                }else{
                    stock.html(`${val.stock} in stock`);
                }
                // stock.html(`${val.stock} in stock`);
                description.html(val.short_description);
                manufactured.html(val.manufacturer);
                featured.html(`<img src="./${val.featured_photo}" alt="">`);
                hpoductimage.val(`./${val.featured_photo}`);
                // attributes of products 
                if (val.attributes != '') {
                    console.log('in loop');
                    var obj = val.attributes;
                    var parse = JSON.parse(obj);
                    console.log(typeof (parse));
                    $.each(parse, function (key, value) {
                        // console.log(key +'is'+value);
                        $.each(value, function (key, val) {
                            console.log(key + ' is ->' + val);
                            info.append(`<tr>
                                            <td>${key}</td>
                                            <td>${val}</td>
                                        </tr>`);
                        });
                    });
                }
                // attributes of products end




            }

        })
    });

}