<?php 
    include_once("inc/essentials.php");
?>
<?php  
if(isset($_FILES['fileToUpload'])) {
  
  $target_path = "welfareforms/";  
  $target_path = $target_path.basename( $_FILES['fileToUpload']['name']);   

  if(move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_path)) {  
      echo '<script> alert("File uploaded successfully!");</script>';  
  } else{  
      echo '<script> alert("Sorry, file not uploaded, please try again!");</script>';
  }  
}

?>  
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title><?php echo TITLE; ?> - Welfare Forms</title>
    <!-- This page plugin CSS -->
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
      
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
      
      <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    
                  
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                      <?php include("inc/logo.php"); ?>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                  
                      <?php include("inc/navigation.php"); ?>
                  </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        
        
        
        
        
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
          <?php include("inc/leftSidebar.php"); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        
        
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                
              <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welfare Forms</h3>
                        
                    </div>
                </div>
              </div>
              
              
              
              <div class="row">
                    <div class="col-12 mt-4">
                        <div class="card">
                            <div class="card-body">
                                

                                <div class="alert alert-primary bg-white text-primary" role="alert">
                                  <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                                                          <thead>
                                                                              <tr>
                                                                                <th>Form Name</th>
                                                                            </tr>
                                      </thead>
                                      <tbody>
                                    <?php
                                        if ($handle = opendir('welfareforms/')) {

                                            while (false !== ($entry = readdir($handle))) {

                                                if ($entry != "." && $entry != "..") {
                                                  echo '<tr><td><div class="alert alert-info bg-info text-white border-0 bg-white" role="alert">';
                                                  echo "<a href=\"welfareforms/$entry\" > $entry </a><br>";
                                                
                                                  echo "</div></td></tr>";

                                                   // echo "<a href=\"../Downloads/PhysicalForms/Physical forms/$entry\" > $entry </a><br>";
                                                }
                                            }

                                            closedir($handle);
                                        }

                                    ?>
                                      </tbody>
                                    </table>
                                  </div>
                              </div>


                                
                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
              </div>
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
          
          <?php If($_SESSION['role'] == "admin")
          {
          echo' <div class="card">
                            <div class="card-body">
                            <form action="reports.php" method="post" enctype="multipart/form-data">  
                              <div class="btn-list">
                                Select File:  
                                <input type="file" name="fileToUpload"/>  
                                <input type="submit" value="Upload File" name="submit" class="btn waves-effect waves-light btn-rounded btn-outline-primary"/>  
                              </div>
                            </form>  
                            
                            </div>
                        </div>';
          }?>
          
          
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
                <?php include("inc/footer.php"); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
          
          
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
                
  </div>
      
      
 <!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.min.js"></script>
      <?php 
    include_once("inc/footerEssentials.php");
    
?>
</body>

</html>
