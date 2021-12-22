<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once("includes/auth.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    $DAO = new Database();
    $exists=false;
    if(isset($_GET['edit'])){
      
      $q="SELECT * FROM `subcategories` WHERE `id`='".$_GET['edit']."' ";
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
  <title><?php if($exists) echo $data['name']." - Edit" ; else echo "New";?> Subcategory - <?php echo $site_name;?></title>
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
      .bootstrap-tagsinput{
        width:100%;
        border-radius:0px;
        border:1px solid #f3f3f3;
        padding:0.875rem 1.375rem;
      }
  </style>

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "views/nav.php";?>
    <!-- partial -->
    
    <div class="container-fluid page-body-wrapper" >
      <!-- partial:partials/_sidebar.html -->
      <?php include "views/sidenav.php";?>
      <!-- partial -->
      <div class="main-panel">        
        <div class="content-wrapper">
          <div class="container row mb-3">
              <div class="col-md-6">
                <h4><?php if($exists) echo "Edit"; else echo "New";?> Subcategory</h4>
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
          <form class="row" id='form' autocomplete="off">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Subcategory Info</h4>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Subcategory Name</label>
                      <input type="text" class="form-control" name='name' value="<?php if($exists) echo $data['name'];?>" placeholder="Enter Category Name" required>
                      <input type='hidden' name='type' value="<?php if($exists) echo 'UPDATE'; else echo 'NEW';?>"/>
                      <input type='hidden' name='id' value="<?php if($exists) echo $data['id'];?>"/>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Parent Category</label>
                      <select style="padding:10px;width:100%" class="js-example-basic-single form-control" name="category" required>
                        <option value="">Select Category</option>
                        <?php
                            $query="SELECT * FROM `categories` ORDER BY `name` ASC ";
                            $categories=$DAO->RetriveArray($query);
                            foreach($categories as $category){
                                if($data['category']==$category['name']){
                                    echo "<option selected>".$category['name']."</option>";
                                }else{
                                    echo "<option>".$category['name']."</option>";
                                }       
                            }  
                        ?>
                      </select>

                    </div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Attributes</label></br>
                      <input type="text" class="form-control"  data-role="tagsinput" name='attributes' value="<?php if($exists) echo $data['attributes'];?>" placeholder="Enter Attributes" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Subcategory Description</label>
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
  <script src="assets/autocomplete/jquery.autocompleter.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="js/script.js"></script>
  <script>
   $(document).ready(function(){
      $("#form-id").on("keypress", function (event) {
            console.log("aaya");
            var keyPressed = event.keyCode || event.which;
            if (keyPressed === 13) {
                alert("You pressed the Enter key!!");
                event.preventDefault();
                return false;
            }
        });
     $('.js-example-basic-single').select2({
        placeholder:'Select a category',
        padding:'style',
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
      $('#save').on('click',function(){
        $('#form').submit();
      })
      $('#form').on('submit',function(e){
          e.preventDefault();
          form=new FormData(this);
          HttpRequest("scripts/manage_subcategory.php",form,callback);
      })
      var callback=function(data){
          swal("Successful!", data, "success");
          if(data=='Subcategory Deleted'){
              window.location='subcategories';
          }
      }
      //deleteing
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
                window.location='subcategories';
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
