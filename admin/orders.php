<?php require_once("includes/auth.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>all Orders - <?php
       echo $site_name;
    ?></title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- endinject -->
    <?php include "views/head.php"; ?>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- <body> -->
    <body data-new-gr-c-s-check-loaded="14.1040.0" data-gr-ext-installed="">
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <?php include "views/nav.php"; ?>
        <!-- partial -->
        <form id='form' class="container-fluid page-body-wrapper">
          <?php include "views/sidenav.php"; ?>
            <!-- partial:partials/_sidebar.html -->
            <!-- partial -->



            <div class="card-body">
                <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="col-sm-12"><table id="example1" class="table table-bordered table-striped dataTable dtr-inline collapsed" role="grid" aria-describedby="example1_info">
                  <thead>
                  <tr role="row">
                    <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                          Sr No.</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                              Product Name</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                              Price</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                  Details</th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                  Payment Status</th>
                          <th class="sorting p-hide" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                Created at</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                  Status</th>

                                  <!-- <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                                    Phone</th>
                                    <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                      Qunatity</th> -->
                                      <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                                        Payment_id</th> -->
                    </tr>
                  </thead>
                  <tbody>                
                  <form action='' method=''>
                        <tr role='row' class='odd'>
                            <td>1</td>
                            <td>Diamond Ring x <strong> 3</strong></td>
                            <td>5216514 rup</td>
                            <td>
                              <strong>Name :</strong> mr xyz abc <br>
                              <strong>Phone :</strong> 65415 46542 <br>
                              <strong>Email :</strong> dsfaa@gmail.com <br>
                              <strong>City :</strong> Siliguri <br>
                              <strong> Address :</strong> Siliguri, Darjeling, WB<br>
                              <strong> Pin :</strong> 730334<br>
                          </td> 
                          <td>cod</td>
                        <td>15 jun, 2022</td>
                        <td>
                        <a href="./order.php?order_status=1"><span class="btn btn-primary"> Status</span>
                        </a>
                      </td>
                            <!-- <td>65415 46542</td>
                            <td>1</td>
                            <td>pym1</td> -->
                        </tr>
                        </form>
                  <!-- <?php
                    //  include "../includes/database.php";
                     include "includes/database.php";
                    $s="SELECT * FROM `payment` ORDER BY `id` DESC LIMIT 200";
                    $r=mysqli_query($connect,$s);
                    while($u=mysqli_fetch_array($r)){
                        echo "
                        <form action='' method=''>
                        <tr role='row' class='odd'>
                            <td class='sorting_1 dtr-control' tabindex='0'>".$u['name']."</td>
                            <td>".$u['phone']."</td>
                            <td>".$u['email']."</td>
                            <td>".$u['city']."</td>
                            <td>".$u['address']."</td>
                            <td>".$u['payment_id']."</td>
                            <td>".$u['payment_status']."</td>
                            <td>".$u['added_on']."</td>
                        </tr>
                        </form>
                        ";
                    }
                  ?> -->
                </tbody>
                  
                </table></div>
              </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </form>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php include "views/footer.php"; ?>
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








