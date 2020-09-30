<?php 
    include_once("inc/essentials.php");
    include('inc/config.php');
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
    <title><?php echo TITLE; ?> - Dashboard</title>
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
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hi <?php echo $_SESSION['displayName']; ?>!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
              
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    
                    
                <?php // print_r($_SESSION); ?>
                    
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    
                   <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                      
                                        <?php 
                                          if($_SESSION['office'] == "1012012")  {
                                            $office = "21012012";
                                          } else  {
                                            $office = "21012013";
                                          }
                                          $sql = "SELECT count(*) FROM `Civil Supplies Data` WHERE `Secretariat Code` = ". $office;
                                          if($_SESSION['designation'] == "volunteer") {
                                            $sql .= ' AND `Cluster` = "' . $_SESSION['cluster'] . '"';
                                          }
                                          $sql .= " order by `rid` ";
                                          // echo $sql;
                                          $query = $connection->prepare($sql);
                                          $query->execute();
                                          $number_of_rows = $query->fetchColumn();
                                          
                                          echo $number_of_rows;
                                          ?>
                                        </h2>
                                        <span
                                            class="badge bg-primary font-12 text-white font-weight-medium badge-pill ml-2 d-lg-block d-md-none">+/- 5%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total rice cards</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                          <?php 
                                          if($_SESSION['office'] == "1012012")  {
                                            $office = "1012012";
                                          } else  {
                                            $office = "1012013";
                                          }
                                          $sql = "SELECT count(*) FROM `Property Tax` WHERE `SECRETARIAT NO` = '". $office .'\'';
                                          if($_SESSION['designation'] == "volunteer") {
                                            $sql .= ' AND `Cluster` = "' . $_SESSION['cluster'] . '"';
                                          }
                                          $sql .= " order by `id` ";
//                                           echo $sql;
                                          $query = $connection->prepare($sql);
                                          $query->execute();
                                          $number_of_rows = $query->fetchColumn();
                                          
                                          echo $number_of_rows;
                                          ?>
                                      
                                        </h2>
                                        <span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">+/- 10%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Property Tax</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                     
                     <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                          <?php 
                                          if($_SESSION['office'] == "1012012")  {
                                            $office = "1012012";
                                          } else  {
                                            $office = "1012013";
                                          }
                                          $sql = "SELECT count(*) FROM `Health card data` WHERE `Office` = '". $office .'\'';
                                          if($_SESSION['designation'] == "volunteer") {
                                            $sql .= ' AND `Cluster` = "' . $_SESSION['cluster'] . '"';
                                          }
                                          $sql .= " order by `UHID` ";
//                                           echo $sql;
                                          $query = $connection->prepare($sql);
                                          $query->execute();
                                          $number_of_rows = $query->fetchColumn();
                                          
                                          echo $number_of_rows;
                                          ?>
                                         </h2>
                                        <span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">0%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Health Cards</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                     
                     
                    
                </div>
                   
                </div>
              <div class="row">
                <div class="card-group">
                  <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                      
                                          <?php 
                                          if($_SESSION['office'] == "1012012")  {
                                            $office = "1012012";
                                          } else  {
                                            $office = "1012013";
                                          }
                                          $sql = "SELECT count(*) FROM `Property Tax` WHERE `SECRETARIAT NO` = '". $office .'\' AND `MUNICIPAL WATER TAP CONNECTION` = "YES"';
                                          if($_SESSION['designation'] == "volunteer") {
                                            $sql .= ' AND `Cluster` = "' . $_SESSION['cluster'] . '"';
                                          }
                                          $sql .= " order by `id` ";
//                                           echo $sql;
                                          $query = $connection->prepare($sql);
                                          $query->execute();
                                          $number_of_rows = $query->fetchColumn();
                                          
                                          echo $number_of_rows;
                                          ?>
                                        </h2>
                                        <span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">+/- 5%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Tap connections</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     
                     <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                          <?php 
                                          if($_SESSION['office'] == "1012012")  {
                                            $office = "1012012";
                                          } else  {
                                            $office = "1012013";
                                          }
                                          $sql = "SELECT count(*) FROM `Property Tax` WHERE `SECRETARIAT NO` = '". $office .'\' AND `UNDERGROUND DRAINAGE CONNECTION` = "YES"';
                                          if($_SESSION['designation'] == "volunteer") {
                                            $sql .= ' AND `Cluster` = "' . $_SESSION['cluster'] . '"';
                                          }
                                          $sql .= " order by `id` ";
//                                           echo $sql;
                                          $query = $connection->prepare($sql);
                                          $query->execute();
                                          $number_of_rows = $query->fetchColumn();
                                          
                                          echo $number_of_rows;
                                          ?>
                                      
                                        </h2>
                                        <span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">+/- 10%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">UDS connections</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium">
                                            <?php 
                                          if($_SESSION['office'] == "1012012")  {
                                            $office = "DIVISION 1";
                                          } else  {
                                            $office = "DIVISION 2";
                                          }
                                          $sql = "SELECT count(*) FROM `TABLE 10` WHERE `Office` = '". $office .'\'';
                                          if($_SESSION['designation'] == "volunteer") {
                                            $sql .= ' AND `Cluster` = "' . $_SESSION['cluster'] . '"';
                                          }
                                          $sql .= " order by `id` ";
//                                           echo $sql;
                                          $query = $connection->prepare($sql);
                                          $query->execute();
                                          $number_of_rows = $query->fetchColumn();
                                          
                                          echo $number_of_rows;
                                          ?>
                                      
                                        </h2>
                                        <span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">0%</span>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Housing Benificeries</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><i data-feather="file-plus"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
              
               
                <!-- *************************************************************** -->
                <!-- End Location and Earnings Charts Section -->
                <!-- *************************************************************** -->
              
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
          
          
          
          
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