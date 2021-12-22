<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("includes/auth.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $exists = false;
    $DAO = new Database();
    if (isset($_GET['edit'])) {
        $exists = false;
        $q = "SELECT * FROM `products` WHERE `id`='" . $_GET['edit'] . "' ";

        $data = array();
        if ($DAO->CountRows($q)) {
            $exists = true;
            $data = $DAO->RetriveSingle($q);
        }
    }
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if ($exists) echo $data['name'] . " - Edit";
            else echo "New"; ?> Product - <?php echo $site_name; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <?php include "views/head.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="css/style2.css" />
    <link rel="stylesheet" type="text/css" href="css/style-example.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.Jcrop.min.css" />

    <style>
        .clickable:hover {
            cursor: pointer;
            box-shadow: 0px 0px 2px #c1c1c1;
        }

        .clickable {
            border: 1px solid #fafafa;
            padding: 5px;
            border-radius: 5px;
        }

        .product_photo {
            height: 158px !important;
            width: 158px !important;
        }

        .featured_photo {
            height: 320px !important;
            width: 320px !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include "views/nav.php"; ?>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include "views/sidenav.php"; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container row mb-3">
                        <div class="col-md-6">
                            <h4><?php if ($exists) echo "Edit";
                                else echo "New"; ?> Product</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button id='submit' class="btn btn-primary mr-2">Save</button>
                            <?php
                            if ($exists) {
                                echo "<span id='delete' data-id='" . $data['id'] . "' class='btn btn-danger mr-2'>Delete</span>";
                            } else {
                                echo "<span id='discard' class='btn btn-danger mr-2'>Discard</span>";
                            }
                            ?>

                        </div>
                    </div>
                    <form id='form' class="row">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Product Info</h4>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Category Name</label>
                                        <input type="text" class="form-control" tabIndex='1' name='name' value="<?php if ($exists) echo $data['name']; ?>" placeholder="Enter Product Name" required>
                                        <input type='hidden' name='type' value="<?php if ($exists) echo 'UPDATE';
                                                                                else echo 'NEW'; ?>" />
                                        <input type='hidden' name='id' value="<?php if ($exists) echo $data['id']; ?>" />
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Subcategory</label>
                                                <select name='subcategory' tabIndex='2' class='form-control'>
                                                    <?php
                                                    if ($exists) {
                                                        echo "<option>" . $data['subcategory'] . "</option>";
                                                    }
                                                    ?>
                                                    <option value="">Select Subcategory</option>
                                                    <?php

                                                    $subcategories = $DAO->RetriveArray("SELECT * FROM `subcategories` ");
                                                    foreach ($subcategories as $category) {
                                                        echo "<option>" . $category['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <small><a href="subcategories" target='_blank'>Manage subcategories</a></small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Category</label>
                                                <input type='text' name='category' value="<?php if ($exists) echo $data['category']; ?>" placeholder='Select Category' class='form-control' required readonly />
                                                <small><a href="categories" target='_blank'>Manage categories</a></small>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Manufacturer</label>
                                                <select name='manufacturer' tabIndex='3' class='form-control'>
                                                    <?php
                                                    if ($exists) {
                                                        echo "<option selected>" . $data['manufacturer'] . "</option>";
                                                    }
                                                    ?>
                                                    <option value="">Select Manufacturer</option>
                                                    <?php
                                                    $subcategories = $DAO->RetriveArray("SELECT * FROM `manufacturers` ");
                                                    foreach ($subcategories as $category) {
                                                        echo "<option>" . $category['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <small><a href="manufacturers" target='_blank'>Manage manufacturers</a></small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">

                                        <div class="row">

                                            <div class="col-6">
                                                <label for="exampleInputEmail1">Featured Photo</label>
                                                <div class="form-group mt-3">
                                                    <img src='images/photo_upload.jpg' class='clickable featured_photo' id='featured_photo_placeholder' onclick="document.getElementById('featured_photo').click();" style='width:100%'>
                                                    <input type='file' name='image' id='featured_photo' style='display:none' />
                                                </div>
                                            </div>
                                            <div class="col-6" style='display:flex;overflow-y:scroll'>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Product Photos</label>
                                                    <div class="row" id='photos'>

                                                        <div class="item col-6">
                                                            <img src="images/photo_upload.jpg" class='clickable product_photo' onclick="document.getElementById('product_photo').click();" style='width:100%'>
                                                            <input type='file' name='image' id='product_photo' style='display:none' />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Short Description</label>
                                        <textarea class='form-control' tabIndex='4' name="short_description"><?php if ($exists) echo $data['short_description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Long Description</label>
                                        <textarea id="description" tabIndex='5' class='form-control' name="description"><?php if ($exists) echo $data['description']; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">MRP</label>
                                                    <input type="number" tabIndex='6' value="<?php if ($exists) echo $data['mrp']; ?>" name='mrp' value='0' class='form-control'>
                                                </div>
                                            </div>
                                            <div class="col-4" style='display:flex;overflow-y:scroll'>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Selling Price</label>
                                                    <input type="number" tabIndex='7' name='selling_price' value="<?php if ($exists) echo $data['selling_price']; ?>" value='0' class='form-control'>
                                                </div>
                                            </div>
                                            <div class="col-4" style='display:flex;overflow-y:scroll'>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Discount %</label>
                                                    <input type="text" name='discount' value="<?php if ($exists) echo $data['discount']; ?>" value='0' class='form-control' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">GST %</label>
                                                    <input name='gst' tabIndex='8' type="number" value="<?php if ($exists) echo $data['gst'];
                                                                                                        else echo '0'; ?>" class='form-control'>
                                                </div>
                                            </div>
                                            <div class="col-4" style='display:flex;overflow-y:scroll'>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Delivery Charge</label>
                                                    <input name='delivery_charge' tabIndex='9' value="<?php if ($exists) echo $data['delivery_charge'];
                                                                                                        else echo "0"; ?>" type="number" class='form-control'>
                                                </div>
                                            </div>
                                            <div class="col-4" style='display:flex;overflow-y:scroll'>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Total Price</label>
                                                    <input type="text" class='form-control' value="<?php if ($exists) echo $data['product_price'];
                                                                                                    echo '0'; ?>" name='product_price' readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-4" style='display:flex;overflow-y:scroll'>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Commision <small id='commision_label' style='color:#1100ff'></small> </label>
                                                    <input type="text" name='commision' value="<?php if ($exists) echo $data['commission'];
                                                                                                echo "0"; ?>" class='form-control' readonly>
                                                </div>
                                            </div>
                                            <div class="col-4" style='display:flex;overflow-y:scroll'>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Total Earnings</label>
                                                    <input type="text" class='form-control' value="<?php if ($exists) echo $data['total_earning']; ?>" value='0' name='total_earning' readonly>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Attributes</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" id='attributes'>

                                                <small style='padding:20px'>No Attributes</small>

                                            </div>
                                        </div>

                                    </div>
                                    <h4 class="card-title mt-4">Stock Management</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" id='attributes'>

                                                <label>Stock Amount</label>
                                                <input type="text" value="<?php if ($exists) echo $data['stock'];
                                                                            else echo "10"; ?>" class='form-control' name='stock'>

                                            </div>
                                        </div>

                                    </div>
                                    <h4 class="card-title mt-4">View Options</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name='available' class="form-check-input" <?php if ($exists) {
                                                                                                                                if ($data['available'] == 'on') echo "checked";
                                                                                                                            } else {
                                                                                                                                echo "checked";
                                                                                                                            } ?>>
                                                        Available
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name='status' class="form-check-input" <?php if ($exists) {
                                                                                                                            if ($data['status'] == 'on') echo "checked";
                                                                                                                        } else {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                        Published
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include "views/footer.php"; ?>
                <!--Hidden forms-->
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <div id="tui-image-editor"></div>
    <div class="modal" id='photo_modal' tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style='border:none'>
                    <h5 class="modal-title">Preview</h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="$('.modal').modal('hide');" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src='' id='preview_photo' style='width:100%' />
                </div>
                <div class="modal-footer" style='border:none'>
                    <button type="button" class="remove_photo btn btn-danger">Remove</button>
                    <button type="button" class="btn btn-secondary" onclick="$('.modal').modal('hide');" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="js/file-upload.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
    <script src="https://uicdn.toast.com/tui-image-editor/latest/tui-image-editor.js"></script>
    <script>
        $(document).ready(function() {
            //Photos
            featured_photo = "";
            photos = [];
            commision = 0;
            split = [];
            attributes = [];
            attribute_values = [];

            LoadAttributes();

            $('#featured_photo').on("change", function() {
                data = new FormData();
                data.append("image", $('#featured_photo')[0].files[0]);
                HttpRequest("scripts/upload_photo.php", data, function(response) {
                    featured_photo = response;
                    LoadFeaturedPhoto();
                })
            })

            $('#photos').delegate('.photo_upload_btn', 'click', function() {
                $('#product_photo').click();
                $('#product_photo').on("change", function() {
                    data = new FormData();
                    data.append("image", $('#product_photo')[0].files[0]);
                    HttpRequest("scripts/upload_photo.php", data, function(response) {
                        if (!photos.includes(response)) {
                            photos.push(response);
                            LoadProductPhoto();
                        }
                    })
                })

            })

            $('#product_photo').on("change", function() {
                data = new FormData();
                data.append("image", $('#product_photo')[0].files[0]);
                HttpRequest("scripts/upload_photo.php", data, function(response) {
                    if (!photos.includes(response)) {
                        photos.push(response);
                        LoadProductPhoto();
                    }

                })
            })

            function LoadFeaturedPhoto() {
                if (featured_photo.length != 0) {
                    $('#featured_photo_placeholder').attr("src", featured_photo);
                } else {
                    $('#featured_photo_placeholder').attr("src", "images/photo_upload.jpg");
                }
            }

            function LoadProductPhoto() {
                photo_elements = "";
                for (i = 0; i < photos.length; i++) {
                    photo_elements += "<div class='item col-6 mt-3'><img src='" + photos[i] + "' class='product_photo clickable preview' style='width:100%'><input type='file' name='image' id='product_photo' style='display:none' /></div>";
                }
                photo_elements += "<div class='item col-6 mt-3'><img src='images/photo_upload.jpg' class='clickable photo_upload_btn' style='width:100%'><input type='file' name='image' id='product_photo' style='display:none' /></div>";
                $('#photos').html(photo_elements);
            }

            function LoadAttributes() {
                index = 9;
                element = "";
                for (i = 0; i < attributes.length; i++) {
                    attribute = attributes[i];
                    value = '';
                    if (attribute_values[i] != undefined) {
                        value = attribute_values[i];
                    }
                    element += "<div class='form-group'><label>" + attribute + "</label><input tabIndex='" + index + "' type='text' value='" + value + "' data-label='" + attribute + "' class='attribute_entry form-control'></div>";
                    index++;
                }
                if (attributes.length == 0) {
                    element = "<small style='padding:20px'>No Attributes</small>";
                }
                $('#attributes').html(element);
                //set last index values
                $('[name="stock"]').attr('tabIndex', index);
                $('#submit').attr('tabIndex', index + 1);
            }

            $('#description').summernote({
                placeholder: 'Enter Category Description Here',
                tabsize: 2,
                height: 120,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
            //auto category select on subcategory changes
            $('[name="subcategory"]').on("change", function() {
                subcategory = $('[name="subcategory"]').val();
                data = new FormData();
                data.append("type", "GET_CATEGORY");
                data.append("name", subcategory);
                HttpRequest("scripts/manage_subcategory.php", data, function(response) {
                    $('[name="category"]').val(response);
                });
                //Get commision
                data = new FormData();
                data.append("type", "GET_COMMISION");
                data.append("name", subcategory);
                HttpRequest("scripts/manage_subcategory.php", data, function(response) {
                    commision = parseInt(response);
                    $('#commision_label').html(response + " %");
                });

                //get attributes
                attributes = [];
                attribute_values = [];
                data = new FormData();
                data.append("type", "GET_ATTRIBUTES");
                data.append("name", subcategory);
                HttpRequest("scripts/manage_subcategory.php", data, function(response) {
                    if (response.length != 0) {
                        attributes = response.split(",");
                    }
                    LoadAttributes();
                    GeneratePrice();
                });
            })

            //preview
            $('#photos').delegate('.preview', 'click', function() {
                src = $(this).attr('src');
                $('#preview_photo').attr('src', src);

                $('#photo_modal').modal('show');
                $('.remove_photo').click(function() {
                    $('#photo_modal').modal('hide');
                    swal("Are you sure want to remove this image?", {
                            buttons: {
                                cancel: "No",
                                catch: {
                                    text: "Yes",
                                    value: "yes",
                                }
                            },
                        })
                        .then((value) => {
                            if (value == 'yes') {
                                new_photos = [];
                                photos.forEach(element => {
                                    if (element != src) {
                                        new_photos.push(element);
                                    }
                                })
                                photos = new_photos;
                                LoadProductPhoto();
                            }
                        });
                })
            })

            //event action
            $('[name="mrp"]').on('keyup', function() {
                GeneratePrice();
            })
            $('[name="selling_price"]').on('keyup', function() {
                GeneratePrice();
            })
            $('[name="gst"]').on('keyup', function() {
                GeneratePrice();
            })

            //generate price
            function GeneratePrice() {
                console.log('blaa bla'+commision);
                product_price = 0;
                mrp = $('[name="mrp"]').val();
                selling_price = $('[name="selling_price"]').val();
                //discount calculate
                discount = parseInt(mrp) - parseInt(selling_price);
                discount_percent = (discount / parseInt(mrp)) * 100;
                discount_percent = Math.round(discount_percent);
                $('[name="discount"]').val(discount_percent.toString() + "%");

                //gst calculate
                gst = $('[name="gst"]').val();
                delivery_charge = $('[name="delivery_charge"]').val();
                gst_amount = (parseInt(gst) / 100) * selling_price;

                //commision calculate
                commision_amount = (parseInt(commision) / 100) * selling_price;

                product_price = Math.round(parseInt(selling_price) + parseInt(gst_amount));

                total_earning = product_price - commision_amount;

                $('[name="product_price"]').val(product_price);
                $('[name="total_earning"]').val(total_earning);
                $('[name="commision"]').val(commision_amount);

            }
            $('#submit').click(function() {
                $('#form').submit();
            })
            $('#form').on('submit', function(e) {
                e.preventDefault();
                attr = GenerateAttributes();
                data = new FormData(this);
                data.append("attributes", attr);
                data.append("featured_photo", featured_photo);
                data.append("photos", JSON.stringify(photos));
                HttpRequest("scripts/manage_product.php", data, function(response) {
                    if(response=="Product has been successfully removed" || response=="Product has been successfully registered"){
                        swal(response);
                        window.location='products';
                    }else{
                        swal(response);
                    }
                    
                })
            })
            //Generate attributes
            function GenerateAttributes() {
                attribute_entries = document.querySelectorAll('.attribute_entry');
                console.log(attribute_entries.length);
                arr = [];
                object = {};
                for (i = 0; i < attribute_entries.length; i++) {
                    //attribute_values.push(attribute_entries[i].value);
                    label = attribute_entries[i].getAttribute('data-label');
                    val = attribute_entries[i].value;
                    //console.log(label+" "+val);
                    object = {};
                    object[label] = val;
                    arr.push(object);
                }
                json = JSON.stringify(arr);
                return json;
            }
            //Get Attributes from server fetched data
            <?php if ($exists) echo "GetAttributes();GetProductPhotos();"; ?>

            function GetAttributes() {
                att_data = '<?php if ($exists) echo $data['attributes']; ?>';
                att_data = JSON.parse(att_data);
                att_data.forEach(element => {
                    key = Object.keys(element)[0];
                    value = element[key];
                    attributes.push(key);
                    attribute_values.push(value);
                });
                LoadAttributes();
            }

            //Get photos
            function GetProductPhotos() {
                photos_ = '<?php if ($exists) echo $data['photos']; ?>';
                photos_ = JSON.parse(photos_);
                photos_.forEach(element => {
                    photos.push(element);
                });
                LoadProductPhoto();

                //Featured Photo
                featured_photo = '<?php if ($exists) echo $data['featured_photo']; ?>';
                LoadFeaturedPhoto();
            }

            //discard
            $('#discard').on('click', function() {
                swal("Are you sure want to discard editing?", {
                        buttons: {
                            cancel: "No",
                            catch: {
                                text: "Yes",
                                value: "yes",
                            }
                        },
                    })
                    .then((value) => {
                        if (value == 'yes') {
                            window.location = 'products';
                        }
                    });
            })
            //deleting product
            $('#delete').on('click', function() {
                swal("Are you sure want to delete this product?", {
                        buttons: {
                            cancel: "No",
                            catch: {
                                text: "Yes",
                                value: "yes",
                            }
                        },
                    })
                    .then((value) => {
                        if (value == 'yes') {
                            $('[name="type"]').val('DELETE');
                            $('#form').submit();
                        }
                    });
            })


        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src='js/shortcuts.js'></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>