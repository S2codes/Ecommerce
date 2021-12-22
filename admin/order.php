<?php require_once("includes/auth.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    if (isset($_GET['edit'])) {
        $exists = false;
        $q = "SELECT * FROM `categories` WHERE `id`='" . $_GET['edit'] . "' ";
        $DAO = new Database();
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
    <title>Order - <?php echo $site_name; ?></title>
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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <style>
        .add_new i {
            font-size: 30px;
            color: #4d83ff;
        }

        .add_new i:hover {
            color: #0c3eb1;
            cursor: pointer;
        }
        .modal-header{
            border-bottom: none;
        }
        .modal-footer{
            border-top: none;
        }
        
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include "views/nav.php"; ?>
        <!-- partial -->
        <form id='form' class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include "views/sidenav.php"; ?>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="container row mb-3">
                        <div class="col-md-6">
                            <h4>Order for Mr Xyz </h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="submit" class="btn btn-primary mr-2">Download</button>
                            <button type="submit" class="btn btn-primary mr-2">Update</button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-10">
                                            <h4 class="card-title" style='margin-top:10px'>Products</h4>
                                        </div>
                                        <div class="col-2">
                                            <a class='add_new'><i class='mdi mdi-plus-circle'></i></a>
                                        </div>
                                    </div>
                                    <div class="row container">
                                        <center style='padding:7px'>1. Diamond Jwelery</center>
                                        <center style='padding:7px'>2. Gold Jwelery</center>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Order Info</h4>
                                    <strong>Name :</strong> mr xyz abc <br>
                                    <strong>Phone :</strong> 65415 46542 <br>
                                    <strong>Email :</strong> dsfaa@gmail.com <br>
                                    <strong>City :</strong> Siliguri <br>
                                    <strong> Address :</strong> Siliguri, Darjeling, WB<br>
                                    <strong> Pin :</strong> 730334<br>
                                    <strong> Date :</strong> 15 jan 2022<br>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:partials/_footer.html -->
                <?php include "views/footer.php"; ?>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </form>
        <!-- page-body-wrapper ends -->
    </div>

    <div class="modal fade" id="new_product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Products</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    
                </div>
                <div class="modal-body">
                <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                <label>Search</label>
                                <input type='search' placeholder="Search something..." class='form-control'/>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Categories</label>
                                <select class='form-control'>
                                    <option>All Categories</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label>Subcategories</label>
                                <select class='form-control'>
                                    <option>All Categories</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Add</button>
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
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="js/script.js"></script>
    <script>
        $(document).ready(function() {
            //Filter data
            $('.add_new').click(function() {
                $('#new_product').modal('show');
                //alert();
            })

        })
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
    <!-- End custom js for this page-->

</body>

</html>