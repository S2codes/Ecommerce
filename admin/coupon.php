<?php

require_once("includes/auth.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $DAO = new Database();
    $exists = false;
    if (isset($_GET['edit'])) {
        $q = "SELECT * FROM `coupons` WHERE `id`='" . $_GET['edit'] . "' ";
        $data = array();
        if ($DAO->CountRows($q)) {
            $exists = true;
            $data = $DAO->RetriveSingle($q);
        }
    }
    $code=substr(strtoupper(md5(rand())),0,6);
    $test="#".$code;
    ?>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php if ($exists) echo $data['name'] . " - Edit";
            else echo "New"; ?> Coupon - <?php echo $site_name; ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <?php include "views/head.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
                                else echo "New"; ?> Coupon</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button id='save' class="btn btn-primary mr-2">Save</button>
                        </div>
                    </div>
                    <form id='form' class="row">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Offer Info</h4>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Offer Name</label>
                                        <input type="text" class="form-control" name='name' value="<?php if ($exists) echo $data['name']; ?>" placeholder="Enter Manufacturer Name" required>
                                        <input type='hidden' name='type' value="<?php if ($exists) echo 'UPDATE';
                                                                                else echo 'NEW'; ?>" />
                                        <input type='hidden' name='id' value="<?php if ($exists) echo $data['id']; ?>" />
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Coupon Type</label>
                                                <select class='form-control' name='coupon_type'>
                                                    <?php if($exists) echo "<option>".$data['type']."</option>";?>
                                                    <option value="">Select Coupon Type</option>
                                                    <option value="FLAT">Flat Discount</option>
                                                    <option value="PERCENT">Percent Discount</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Product Categories</label>
                                                <select class='form-control' name='category'>
                                                    <?php if($exists) echo "<option>".$data['category']."</option>";?>
                                                    <option value="">Select Category</option>
                                                    <option value="All Categories">All Categories</option>
                                                    <?php
                                                    $c = "SELECT * FROM `categories`";
                                                    $cat = $DAO->RetriveArray($c);
                                                    foreach ($cat as $category) {
                                                        echo "<option value='" . $category['name'] . "'>" . $category['name'] . "</option>";
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Min. Cart Amount</label>
                                                <input type='number' class='form-control' value="<?php if ($exists) echo $data['min_amt']; else echo "0"; ?>" name='min_amt'>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Max. Cart Amount</label>
                                                <input type='number' class='form-control' value="<?php if ($exists) echo $data['max_amt']; else echo "10000"; ?>" name='max_amt'>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Discount Amount</label>
                                                <input type='number' class='form-control'  value="<?php if ($exists) echo $data['amount']; else echo "0";?>" name='amount'>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label>Discount Percent (%)</label>
                                                <input type='number' class='form-control' value="<?php if ($exists) echo $data['percent']; else echo "0"; ?>" name='percent'>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">View Options</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Coupon Code</label>
                                                <input type='text' class='form-control' value="<?php if ($exists) echo $data['code']; else echo $code;?>" name='code'/>
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name='status' class="form-check-input" <?php if ($exists) {
                                                                                                                            if ((int)$data['status']) echo "checked";
                                                                                                                        } else {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                        Active
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
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
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
    <script>
        $(document).ready(function() {
            <?php if(!$exists){ ?>
                $('[name="percent"]').attr('disabled',true);
                $('[name="amount"]').attr('disabled',true);
                <?php
            } ?>
            
            $('[name="coupon_type"]').on("change",function(){
                type=$('[name="coupon_type"]').val();
                
                if(type=='FLAT'){
                    $('[name="percent"]').attr('disabled',true);
                    $('[name="amount"]').attr('disabled',false);
                }else if(type=='PERCENT'){
                    $('[name="amount"]').attr('disabled',true);
                    $('[name="percent"]').attr('disabled',false);
                }
            })

            $('#save').on('click', function() {
                $('#form').submit();
            })
            $('#form').on('submit', function(e) {
                e.preventDefault();
                form = new FormData(this);
                HttpRequest("scripts/manage_coupon.php", form, callback);
            })
            var callback = function(data) {
                swal("Successful!", data, "success");
                if (data == 'Coupon Deleted') {
                    window.location = 'coupons';
                }
            }
            //Deleteing a category
            $('#delete').on('click', function() {
                swal("Are you sure want to delete this coupon?", {
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
                            window.location = 'coupons';
                        }
                    });
            })
        })
    </script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- End custom js for this page-->

</body>

</html>