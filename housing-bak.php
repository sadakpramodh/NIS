<?php 
    include_once("inc/essentials.php");
    include('inc/config.php');
?>
<?php
	$conn = mysqli_connect("sql207.epizy.com", "epiz_25826984", "OQsUAzGnUmhaJV", "epiz_25826984_nis");	
	$with_any_one_of = "";
	$with_the_exact_of = "";
	$without = "";
	$starts_with = "";
	$search_in = "";
	$advance_search_submit = "";
	
	$queryCondition = "";
	if(!empty($_POST["search"])) {
		$advance_search_submit = $_POST["advance_search_submit"];
		foreach($_POST["search"] as $k=>$v){
			if(!empty($v)) {

				$queryCases = array("with_any_one_of","with_the_exact_of","without","starts_with");
				if(in_array($k,$queryCases)) {
					if(!empty($queryCondition)) {
						$queryCondition .= " AND ";
					} else {
						$queryCondition .= " WHERE ";
					}
				}
				switch($k) {
					case "with_any_one_of":
						$with_any_one_of = $v;
						$wordsAry = explode(" ", $v);
						$wordsCount = count($wordsAry);
						for($i=0;$i<$wordsCount;$i++) {
							if(!empty($_POST["search"]["search_in"])) {
								$queryCondition .= $_POST["search"]["search_in"] . " LIKE '%" . $wordsAry[$i] . "%'";
							} else {
								$queryCondition .= "title LIKE '" . $wordsAry[$i] . "%' OR description LIKE '" . $wordsAry[$i] . "%'";
							}
							if($i!=$wordsCount-1) {
								$queryCondition .= " OR ";
							}
						}
						break;
					case "with_the_exact_of":
						$with_the_exact_of = $v;
						if(!empty($_POST["search"]["search_in"])) {
							$queryCondition .= $_POST["search"]["search_in"] . " LIKE '%" . $v . "%'";
						} else {
							$queryCondition .= "title LIKE '%" . $v . "%' OR description LIKE '%" . $v . "%'";
						}
						break;
					case "without":
						$without = $v;
						if(!empty($_POST["search"]["search_in"])) {
							$queryCondition .= $_POST["search"]["search_in"] . " NOT LIKE '%" . $v . "%'";
						} else {
							$queryCondition .= "title NOT LIKE '%" . $v . "%' AND description NOT LIKE '%" . $v . "%'";
						}
						break;
					case "starts_with":
						$starts_with = $v;
						if(!empty($_POST["search"]["search_in"])) {
							$queryCondition .= $_POST["search"]["search_in"] . " LIKE '" . $v . "%'";
						} else {
							$queryCondition .= "title LIKE '" . $v . "%' OR description LIKE '" . $v . "%'";
						}
						break;
					case "search_in":
						$search_in = $_POST["search"]["search_in"];
						break;
				}
			}
		}
	}
	$orderby = " ORDER BY id desc"; 
	$sql = "SELECT * FROM Housing_Eligible_list " . $queryCondition;
	$result = mysqli_query($conn,$sql);
	
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
    <title>Adminmart Template - The Ultimate Multipurpose admin template</title>
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
  <script>
		function showHideAdvanceSearch() {
			if(document.getElementById("advanced-search-box").style.display=="none") {
				document.getElementById("advanced-search-box").style.display = "block";
				document.getElementById("advance_search_submit").value= "1";
			} else {
				document.getElementById("advanced-search-box").style.display = "none";
				document.getElementById("with_the_exact_of").value= "";
				document.getElementById("without").value= "";
				document.getElementById("starts_with").value= "";
				document.getElementById("search_in").value= "";
				document.getElementById("advance_search_submit").value= "";
			}
		}
	</script>
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
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Hi Nis!</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Top Leaders</h4>
                                  <form name="frmSearch" method="post" action="housingEligible.php">
                                      <input type="hidden" id="advance_search_submit" name="advance_search_submit" value="<?php echo $advance_search_submit; ?>">
                                      <div class="search-box">
                                        <label class="search-label">With Any One of the Words:</label>
                                        <div>
                                          <input type="text" name="search[with_any_one_of]" class="demoInputBox" value="<?php echo $with_any_one_of; ?>"	/>
                                          <span id="advance_search_link" onClick="showHideAdvanceSearch()">Advance Search</span>
                                        </div>				
                                        <div id="advanced-search-box" <?php if(empty($advance_search_submit)) { ?>style="display:none;"<?php } ?>>
                                          <label class="search-label">With the Exact String:</label>
                                          <div>
                                            <input type="text" name="search[with_the_exact_of]" id="with_the_exact_of" class="demoInputBox" value="<?php echo $with_the_exact_of; ?>"	/>
                                          </div>
                                          <label class="search-label">Without:</label>
                                          <div>
                                            <input type="text" name="search[without]" id="without" class="demoInputBox" value="<?php echo $without; ?>"	/>
                                          </div>
                                          <label class="search-label">Starts With:</label>
                                          <div>
                                            <input type="text" name="search[starts_with]" id="starts_with" class="demoInputBox" value="<?php echo $starts_with; ?>"	/>
                                          </div>
                                          <label class="search-label">Search Keywords in:</label>
                                          <div>
                                            <select name="search[search_in]" id="search_in" class="demoInputBox">
                                              <option value="">Select Column</option>
                                              <option value="Aadhar_Number" <?php if($search_in=="Aadhar_Number") { echo "selected"; } ?>>Aadhar Number</option>
                                              <option value="Application_Number" <?php if($search_in=="Application_Number") { echo "selected"; } ?>>Application Number</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div>
                                          <input type="submit" name="go" class="btnSearch" value="Search">
                                        </div>
                                      </div>
                                 </form>	
                                    
                                </div>
                              <?php while($row = mysqli_fetch_assoc($result)) { 
                                
                              
                              ?>
                                <div>
                                  <?php print_r($row); ?>
                                  <div><strong><?php echo $row["Aadhar_Number"]; ?></strong></div>
                                  <div class="result-description"><?php echo $row["Application_Number"]; ?></div>
                                </div>
                                <?php } ?>
                              
                    
                            </div>
                        </div>
                    </div>
                </div>
               
               
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
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
</body>

</html>