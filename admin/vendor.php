<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("includes/auth.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    $DAO = new Database();
    $exists = false;
    if (isset($_GET['edit'])) {

        $q = "SELECT * FROM `vendors` WHERE `id`='" . $_GET['edit'] . "' ";
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
            else echo "New"; ?> Vendor - <?php echo $site_name; ?></title>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/autocomplete/jquery.autocompleter.min.css" type="text/css">
    <link rel="stylesheet" href="assets/tagsinput/bootstrap-tagsinput.css" type="text/css">

    <style>
        .select2-selection__rendered {
            border: 1px solid #f3f3f3 !important;
        }

        .bootstrap-tagsinput .tag {
            margin-right: 5px;
            color: #4d82f7;
            background-color: #bcd1ff;
            padding: 2px;
            border-radius: 3px;
        }

        .bootstrap-tagsinput {
            width: 100%;
            border-radius: 0px;
            border: 1px solid #f3f3f3;
            padding: 0.875rem 1.375rem;
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
                        <div class="col-md-8">
                            <h4><?php if ($exists) echo "Edit";
                                else echo "New"; ?> Vendor</h4>
                        </div>
                        <div class="col-md-4 text-right">
                            <button id='save' class="btn btn-primary mr-2">Save</button>
                            <?php
                            if ($exists) {
                                echo "<span id='delete' class='btn btn-danger mr-2'>Delete</span>";
                            } else {
                                echo "<span id='discard' class='btn btn-danger mr-2'>Discard</span>";
                            }
                            ?>

                        </div>
                    </div>
                    <form class="row" id='form' autocomplete="off">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Vendor Info</h4>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Business Name</label>
                                        <input type="text" class="form-control" name='name' value="<?php if ($exists) echo $data['name']; ?>" placeholder="Enter Category Name" required>
                                        <input type='hidden' name='type' value="<?php if ($exists) echo 'UPDATE';
                                                                                else echo 'NEW'; ?>" />
                                        <input type='hidden' name='id' value="<?php if ($exists) echo $data['id']; ?>" />
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Proprietor Name</label></br>
                                        <input type="text" class="form-control" name='proprietor_name' value="<?php if ($exists) echo $data['proprietor_name']; ?>" placeholder="Enter Proprietor Name" required>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Email</label></br>
                                                <input type="email" class="form-control" name='email' value="<?php if ($exists) echo $data['email']; ?>" placeholder="Enter Email" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Phone</label></br>
                                                <input type="number" maxlength="10" minlength="10" class="form-control" name='phone' value="<?php if ($exists) echo $data['phone']; ?>" placeholder="Enter Phone No" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">GST</label></br>
                                                <input type="text" class="form-control" name='gst' value="<?php if ($exists) echo $data['gst']; ?>" placeholder="Enter GST No" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Business License No.</label></br>
                                                <input type="text" class="form-control" name='license_no' value="<?php if ($exists) echo $data['license_no']; ?>" placeholder="Enter Trade License No./Business License No" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea id="description" class='form-control' name="description"><?php if ($exists) echo $data['description']; ?></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Flat/House no./Building</label></br>
                                                <input type="text" class="form-control" name='house' value="<?php if ($exists) echo $data['house']; ?>" placeholder="Enter Building/Flat No/House No" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Area</label></br>
                                                <input type="text" class="form-control" name='area' value="<?php if ($exists) echo $data['area']; ?>" placeholder="Enter Area" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Landmark</label></br>
                                                <input type="text" class="form-control" name='landmark' value="<?php if ($exists) echo $data['landmark']; ?>" placeholder="Enter Landmark" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">Town/City</label></br>
                                                <input type="text" class="form-control" name='city' value="<?php if ($exists) echo $data['city']; ?>" placeholder="Enter City Name" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">PIN</label></br>
                                                <input type="number" class="form-control" maxlength="6" minlength="6" name='pin' value="<?php if ($exists) echo $data['pin']; ?>" placeholder="Enter Pincode" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="exampleInputUsername1">State</label></br>
                                                <select class="form-control" name='state' required>
                                                    <?php
                                                    if ($exists) {
                                                        echo "<option value='" . $data['state'] . "'>" . $data['state'] . "</option>";
                                                    }
                                                    ?>
                                                    <option value="">Select state</option>
                                                    <option value="ANDAMAN &amp; NICOBAR ISLANDS">ANDAMAN &amp; NICOBAR ISLANDS</option>
                                                    <option value="ANDHRA PRADESH">ANDHRA PRADESH</option>
                                                    <option value="ARUNACHAL PRADESH">ARUNACHAL PRADESH</option>
                                                    <option value="ASSAM">ASSAM</option>
                                                    <option value="BIHAR">BIHAR</option>
                                                    <option value="CHANDIGARH">CHANDIGARH</option>
                                                    <option value="CHHATTISGARH">CHHATTISGARH</option>
                                                    <option value="DADRA AND NAGAR HAVELI AND DAMAN AND DIU">DADRA AND NAGAR HAVELI AND DAMAN AND DIU</option>
                                                    <option value="DELHI">DELHI</option>
                                                    <option value="GOA">GOA</option>
                                                    <option value="GUJARAT">GUJARAT</option>
                                                    <option value="HARYANA">HARYANA</option>
                                                    <option value="HIMACHAL PRADESH">HIMACHAL PRADESH</option>
                                                    <option value="JAMMU &amp; KASHMIR">JAMMU &amp; KASHMIR</option>
                                                    <option value="JHARKHAND">JHARKHAND</option>
                                                    <option value="KARNATAKA">KARNATAKA</option>
                                                    <option value="KERALA">KERALA</option>
                                                    <option value="LADAKH">LADAKH</option>
                                                    <option value="LAKSHADWEEP">LAKSHADWEEP</option>
                                                    <option value="MADHYA PRADESH">MADHYA PRADESH</option>
                                                    <option value="MAHARASHTRA">MAHARASHTRA</option>
                                                    <option value="MANIPUR">MANIPUR</option>
                                                    <option value="MEGHALAYA">MEGHALAYA</option>
                                                    <option value="MIZORAM">MIZORAM</option>
                                                    <option value="NAGALAND">NAGALAND</option>
                                                    <option value="ODISHA">ODISHA</option>
                                                    <option value="PUDUCHERRY">PUDUCHERRY</option>
                                                    <option value="PUNJAB">PUNJAB</option>
                                                    <option value="RAJASTHAN">RAJASTHAN</option>
                                                    <option value="SIKKIM">SIKKIM</option>
                                                    <option value="TAMIL NADU">TAMIL NADU</option>
                                                    <option value="TELANGANA">TELANGANA</option>
                                                    <option value="TRIPURA">TRIPURA</option>
                                                    <option value="UTTAR PRADESH">UTTAR PRADESH</option>
                                                    <option value="UTTARAKHAND">UTTARAKHAND</option>
                                                    <option value="WEST BENGAL">WEST BENGAL</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Profile Image/ Business Logo</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label text-center">
                                                        <img src="<?php if ($exists) echo $data['photo'];
                                                                    else echo 'images/placeholder_profile.png'; ?>" id='thumbnail' style='height:200px;width:200px;border-radius:50%'>
                                                        <button type='button' onclick="$('#profile_image').click();" class='btn btn-primary mt-3'>Change Image</button>
                                                        <input type='file' name='file' id='profile_image' style='display:none' />
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-title mt-4">Account Information</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Username</label>
                                                <input type="text" class='form-control' value="<?php if ($exists) echo $data['username']; ?>" name='username' placeholder="Enter Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Password</label>
                                                <input type="password" minlength="6" class='form-control' value="<?php if ($exists) echo $data['password']; ?>" name='password' placeholder="Enter Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Confirm Password</label>
                                                <input type="password" minlength="6" class='form-control' value="<?php if ($exists) echo $data['password']; ?>" name='confirm_password' placeholder="Confirm Password">
                                            </div>
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name='login' class="form-check-input" <?php if ($exists) {
                                                                                                                            if ($data['login'] == 'on') echo "checked";
                                                                                                                        } else {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                                                        Enable Login
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <h4 class="card-title mt-4">Status</h4>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" name='status' class="form-check-input" <?php if ($exists) {
                                                                                                                            if ($data['status'] == 'on') echo "checked";
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
    <script src="assets/autocomplete/jquery.autocompleter.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {

            vendor_photo = "";
            $("#profile_image").on("change", function() {
                data = new FormData();
                data.append("image", $('#profile_image')[0].files[0]);
                HttpRequest("scripts/upload_photo.php", data, function(response) {
                    vendor_photo = response;
                    $('#thumbnail').attr('src', vendor_photo);
                })

            })


            $("#form-id").on("keypress", function(event) {
                console.log("aaya");
                var keyPressed = event.keyCode || event.which;
                if (keyPressed === 13) {
                    alert("You pressed the Enter key!!");
                    event.preventDefault();
                    return false;
                }
            });
            $('.js-example-basic-single').select2({
                placeholder: 'Select a category',
                padding: 'style',
                width: 'resolve'
            });
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
            $('#save').on('click', function() {
                $('#form').submit();
            })
            $('#form').on('submit', function(e) {
                e.preventDefault();
                form = new FormData(this);
                form.append('photo', vendor_photo);
                HttpRequest("scripts/manage_vendor.php", form, callback);
            })
            var callback = function(data) {
                if (data == "Password doesn't matched") {
                    swal(data);
                } else {
                    swal("Successful!", data, "success");
                    if (data == 'Profile Removed') {
                        window.location = 'vendors-list';
                    }
                }

            }
            //deleteing
            $('#delete').on('click', function() {
                swal("Are you sure want to delete this vendor?", {
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
                            window.location = 'subcategories';
                        }
                    });
            })
        })
    </script>
    <script src="assets/autocomplete/jquery.autocompleter.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="assets/tagsinput/bootstrap-tagsinput.min.js"></script>
    <!-- End custom js for this page-->

</body>

</html>