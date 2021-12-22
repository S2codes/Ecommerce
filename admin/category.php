<?php require_once("includes/auth.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    if(isset($_GET['edit'])){
      $exists=false;
      $q="SELECT * FROM `categories` WHERE `id`='".$_GET['edit']."' ";
      $DAO = new Database();
      $data=array();
      if($DAO->CountRows($q)){
        $exists=true;
        $data=$DAO->RetriveSingle($q);
      }
    }
  ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title><?php if($exists) echo $data['name']." - Edit" ; else echo "New";?> Category - <?php echo $site_name;?></title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css" integrity="sha512-uq8QcHBpT8VQcWfwrVcH/n/B6ELDwKAdX4S/I3rYSwYldLVTs7iII2p6ieGCM13QTPEKZvItaNKBin9/3cjPAg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js" integrity="sha512-TToQDr91fBeG4RE5RjMl/tqNAo35hSRR4cbIFasiV2AAMQ6yKXXYhdSdEpUcRE6bqsTiB+FPLPls4ZAFMoK5WA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "views/nav.php";?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include "views/sidenav.php";?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="container row mb-3">
              <div class="col-md-6">
                <h4><?php if($exists) echo "Edit"; else echo "New";?> Category</h4>
              </div>
              <div class="col-md-6 text-right">
                <button id='save' class="btn btn-primary mr-2">Save</button>
                <?php
                  if($exists){
                    echo "<span id='delete' class='btn btn-danger mr-2'>Delete</span>";
                  }else{
                    echo "<span id='discard' class='btn btn-danger mr-2'>Discard</span>";
                  }
                ?>
                
              </div>
          </div>
          <form id='form' class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category Info</h4>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Category Name</label>
                      <input type="text" class="form-control" name='name' value="<?php if($exists) echo $data['name'];?>" placeholder="Enter Category Name" required>
                      <input type='hidden' name='type' value="<?php if($exists) echo 'UPDATE'; else echo 'NEW';?>"/>
                      <input type='hidden' name='id' value="<?php if($exists) echo $data['id'];?>"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Sorting Order</label>
                      <select class='form-control' name='sort'>
                      <?php 
                        if($exists){
                          echo "<option>".$data['sort']."</option>";
                        }
                      ?>
                        <option>Popularity</option>
                        <option>Newest First</option>
                        <option>Price - Low to High</option>
                        <option>Price - High to Low</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Description</label>
                      <textarea id="description" class='form-control' name="description"><?php if($exists) echo $data['description'];?></textarea>
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
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name='top_menu' class="form-check-input" <?php if($exists){ if((int)$data['top_menu']) echo "checked"; }else{ echo "checked";}?>>
                              Show on Top Menu
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name='homepage_featured' class="form-check-input" <?php if($exists){ if((int)$data['homepage_featured']) echo "checked"; }else{ echo "checked";}?>>
                              Featured on Homepage
                            </label>
                          </div>
                          <div class="form-check">
                            <label class="form-check-label">
                              <input type="checkbox" name='status' class="form-check-input" <?php if($exists){ if((int)$data['status']) echo "checked"; }else{ echo "checked";}?>>
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
        <?php include "views/footer.php";?>
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
   $(document).ready(function(){
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
      $('#save').on('click',function(){
        $('#form').submit();
      })
      $('#form').on('submit',function(e){
          e.preventDefault();
          form=new FormData(this);
          HttpRequest("scripts/manage_category.php",form,callback);
      })
      var callback=function(data){
        swal("Successful!", data, "success");
        if(data=='Category Deleted'){
            window.location='categories';
        }
      }
      //Deleteing a category
      $('#delete').on('click',function(){
        swal("Are you sure want to delete this subcategory?", {
        buttons: {
            cancel: "No",
            catch: {
            text: "Yes",
            value: "yes",
            }
        },
        })
        .then((value) => {
            if(value=='yes'){
                $('[name="type"]').val('DELETE');
                $('#form').submit();
            }
        });
      })
      //discard
      $('#discard').on('click',function(){
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
            if(value=='yes'){
                window.location='categories';
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
