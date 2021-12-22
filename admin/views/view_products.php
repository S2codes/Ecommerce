
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<style>
    .single-line {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
<?php
/***
 * FetchProducts
 */

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//Database Access Object
require_once("../includes/database.php");

//Authentication is to check access for API

$DAO = new Database();

$category =      $_POST['category'];
$subcategory =   $_POST['subcategory'];
$search =        $_POST['search'];
$filter =        $_POST['filter'];
$s = "SELECT * FROM `products` WHERE `subcategory` LIKE '%" . $subcategory . "%' AND `category` LIKE '%" . $category . "%' AND `name` LIKE '%" . $search . "%' ";
if ($filter == 'Newsest First') {
    $s .= " ORDER BY `id` DESC ";
}
if ($filter == 'Oldest First') {
    $s .= " ORDER BY `id` ASC ";
}
if ($filter == 'Price - Low to High') {
    $s .= " ORDER BY `selling_price` ASC ";
}
if ($filter == 'Price - High to Low') {
    $s .= " ORDER BY `selling_price` DESC ";
}
$data = $DAO->RetriveArray($s);
//for ($i = 0; $i < 100; $i++) {
    foreach ($data as $product) {
        echo "
    <div class='col-sm-6 col-md-2 col-lg-2 mt-2'>
        <a href='product?edit=" . $product['id'] . "' class='product card' style='width:100%;'>
            <img class='card-img-top product-image style='height:242px !important;width:242px !important' lazyload src='" . $product['featured_photo'] . "'  style='padding:15px'  >
            <div class='card-body' style='padding:0.5rem 1.0rem'>
                <h5 class='card-title single-line' style='margin-bottom:0px'>" . $product['name'] . "</h5>
                <p class='card-text mt-1'>
                    <b>₹" . $product['product_price'] . "</b>
                    <small><strike>₹" . $product['mrp'] . "</strike></small></br>
                    <small class='single-line'>" . $product['subcategory'] . "</small></br>
                    <small class='single-line'>Category : " . $product['category'] . "</small>
                </p>
            </div>
        </a>
    </div>
    ";
    }
//}
if (!count($data)) {
    echo "<center style='padding:20px;text-align:center'>No Products Found</center>";
}
?>

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        lazyload();
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js" integrity="sha512-jNDtFf7qgU0eH/+Z42FG4fw3w7DM/9zbgNPe3wfJlCylVDTT3IgKW5r92Vy9IHa6U50vyMz5gRByIu4YIXFtaQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>