<?php require_once("includes/auth.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $DAO=new Database();
    $query="SELECT * FROM `categories` ORDER BY `name` ASC ";
    $data=$DAO->RetriveArray($query);
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Categories - <?php echo $site_name;?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/style.css">
  <!-- endinject -->
  <?php include "views/head.php";?>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.0/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "views/nav.php";?>
    <!-- partial -->
    <form id='form' class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include "views/sidenav.php";?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="container row mb-3">
              <div class="col-md-6">
                <h4>All Category</h4>
              </div>
              <div class="col-md-6 text-right">
                <a href='category' class="btn btn-primary mr-2">New Category</a>                
              </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include "views/footer.php";?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </form>
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
  <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
  <script src="js/script.js"></script>
  <script>
   $(document).ready(function(){
      //Filter data
      HttpRequest("views/view_categories.php","",LoadData);
      function LoadData(data){
        $('.card-body').html(data);
      }

   })
  </script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://cdn.datatables.net/1.10.0/js/jquery.dataTables.js"></script>
  <!-- End custom js for this page-->

</body>

</html>
