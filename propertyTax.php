<?php 
    include_once("inc/essentials.php");
    include('inc/config.php');
    // Table Name to perform various operation no need to change everwhere
    $tableName = 'Property Tax';
    $pageName = 'propertyTax.php';
?>
<?php

  if(isset($_POST['id']))
  {
    // To generate individual modal content it is just like API
    $id = $_POST['id'];
    $sql = "SELECT * FROM `" . $tableName . "` WHERE `id`=\"$id\"";
    // echo $sql;
    $query = $connection->prepare($sql);
    $query->execute();
    // Use fetchAll as you have
    $aResults = $query->fetchAll(PDO::FETCH_ASSOC);

    // Then, check you have results
    $numResults = count($aResults);
    if (count($numResults) > 0) {
      // Dynamic form allows to Update and Delete Record
      echo'<form class="mt-3" method="POST" action="'. $pageName . '">';
       foreach ($aResults[0] as $fieldName=>$value) {
?>

            <label class="form-control-label" for="<?php echo htmlspecialchars($value); ?>" name="<?php echo htmlspecialchars($fieldName); ?>"><?php echo htmlspecialchars($fieldName); ?></label>
            <input type="text" class="form-control is-valid" id="<?php echo htmlspecialchars($value); ?>" value="<?php echo htmlspecialchars($value); ?>" name="<?php echo htmlspecialchars($fieldName); ?>">


    <?php
         //  echo '<th>' . htmlspecialchars($fieldName) .'   '. $value .'</th>';
      }
      
     ?>
  <?php 
//       If($_SESSION['role'] == "admin")
//        {
          
     echo'<br><div class="form-control-label"> <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary" name="update">Update</button>';
     echo'<button type="submit" class="btn waves-effect waves-light btn-rounded btn-danger" name="delete">Delete</button> </div>';
//      }
      ?>
  <?php
     echo'</form>';

    }
    exit();
    }
?>

<?php

if(isset($_POST['addRecord']))
  {
    // Add Record Dynamic form Generation Allows Insert Functionality, Like API
    $sql = "SELECT * FROM `". $tableName ."` WHERE 1 LIMIT 1";
    $query = $connection->prepare($sql);
    $query->execute();
    // Use fetchAll as you have
    $aResults = $query->fetchAll(PDO::FETCH_ASSOC);

    // Then, check you have results
    $numResults = count($aResults);
    if (count($numResults) > 0) {
      echo'<form class="mt-3" method="POST" action="'. $pageName . '">';
       foreach ($aResults[0] as $fieldName=>$value) {
         ?>

            <label class="form-control-label" 
                   for="<?php echo htmlspecialchars($value); ?>" 
                   name="<?php echo htmlspecialchars($fieldName); ?>" 
                   <?php if($fieldName == 'id') { echo "hidden"; } ?>
            >
                        <?php echo htmlspecialchars($fieldName); ?>
            </label>


            <input type=<?php if($fieldName == 'id') { echo "hidden"; } else { echo "text"; } ?> class="form-control is-valid" id="<?php echo htmlspecialchars($value); ?>" name="<?php echo htmlspecialchars($fieldName); ?>"  >


    <?php
         //  echo '<th>' . htmlspecialchars($fieldName) .'   '. $value .'</th>';
      }
     echo'<br><div class="form-control-label"> <button type="submit" class="btn waves-effect waves-light btn-rounded btn-primary" name="insert">Insert</button>';
     echo'</div>';
     echo'</form>';

    }
    exit();
  }
?>
<?php

if(isset($_POST['delete']))
  {
    // Delete Record
    $sql = "DELETE FROM `" . $tableName ."` WHERE ";
    $i = 0;
    $conditionVariable;
    $conditionValue;

     foreach($_POST as $key => $value){
     if($i==0){
     $conditionVariable = $key;
     $conditionValue = $value;
     $i = 1;
     break;
     }
     }
     $sql .="`". $conditionVariable ."` = ". $conditionValue;
    $query = $connection->prepare($sql);
    $query->execute();
    // echo $sql;
    echo "<script> alert('Records DELETED successfully!');";

    echo "</script>";
       // exit();

  }

if(isset($_POST['insert']))
  {
    // Insert Record
    // print_r($_POST);
    $sql = "INSERT INTO `" . $tableName . "` (";
    $i = 0;
     foreach($_POST as $key => $value){
     if($i==0){
     $conditionVariable = $key;
     $conditionValue = $value;
     $i = 1;
     continue;
     }

      // POST Array spefic field removal
      if($key == "insert")
      {
        continue;
      }
      //POST data space replaced by underscore we are reversing it
      $key = str_replace('_', ' ', $key);
      $sql .="`" . $key . "`,";
       
      // Checks condition does value is NULL or Not we are using space instead of NULL
      if($value=="") {
      // $sql .="' ',";
      }
      else {
       // $sql .="'" . $value ."',";
      }
    }
  
    // Programatic , removal in sql statement
    $sql = substr($sql, 0, -1);
    // $sql .= " WHERE `". $conditionVariable ."` = ". $conditionValue ."";
    $sql .=")";
    // echo $sql;


    $sql .= " VALUES (";
    $i = 0;
     foreach($_POST as $key => $value){
     if($i==0){
     $conditionVariable = $key;
     $conditionValue = $value;
     $i = 1;
     continue;
     }


      if($key == "insert")
      {
        continue;
      }
      $key = str_replace('_', ' ', $key);
      // $sql .="`" . $key . "`,";
      if($value=="") {
      $sql .="' ',";
      }
      else {
       $sql .="'" . $value ."',";
      }
    }
    $sql = substr($sql, 0, -1);
    // $sql .= " WHERE `". $conditionVariable ."` = ". $conditionValue ."";
    $sql .=")";
    // echo $sql;




    $query = $connection->prepare($sql);
    $query->execute();
    echo "<script> alert(' ". $query->rowCount() ." records Inserted successfully!');";

    echo "</script>";
    // exit();
  }

if(isset($_POST['update']))
  {
    // Update record
    // print_r($_POST);
    $sql = "UPDATE `". $tableName ."` SET ";
    $i = 0;
     foreach($_POST as $key => $value)
       {
         if($i==0){
         $conditionVariable = $key;
         $conditionValue = $value;
         $i = 1;
         continue;
       }


      if($key == "update")
        {
          continue;
        }
      $key = str_replace('_', ' ', $key);
      $sql .="`" . $key . "` = ";
      if($value=="") 
        {
         $sql .="' ',";
        }
      else 
        {
          $sql .="'" . $value ."',";
        }
    }
  
    $sql = substr($sql, 0, -1);
    $sql .= " WHERE `". $conditionVariable ."` = ". $conditionValue ."";

     echo $sql;
    $query = $connection->prepare($sql);
    $query->execute();
    echo "<script> alert(' ". $query->rowCount() ." records UPDATED successfully!');";

    echo "</script>";
    //exit();
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
    <title><?php echo TITLE; ?> - Propertytax Data</title>
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
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item">Propertytax Data
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
                                    <h4 class="card-title"> </h4>
                                  
                                    
                                </div>
                              <?php 
                                    if($_SESSION['office'] == "1012012")
                                    {
                                      $office = '"1012012"';
                                    }
                                    else
                                    {
                                      $office = '"1012013"';
                                    }
                              
                                    if($_SESSION['cluster'] =="")
                                    {
                                      $x = "";
                                    }
                                    else
                                    {
                                      $x = ' AND `CLUSTER NUMBER` = "' . $_SESSION['cluster'] .'"';
                                    }
                                    $sql = "SELECT * FROM `". $tableName ."` Where `SECRETARIAT NO` = ". $office . $x . " order by `id` ";
//                                     echo $sql;
                                    $query = $connection->prepare($sql);
                                    $query->execute();
                                    // Use fetchAll as you have
                                    $aResults = $query->fetchAll(PDO::FETCH_ASSOC);

                                    // Then, check you have results
                                    $numResults = count($aResults);
                                    if (count($numResults) > 0) {
                                      // Output the table header
                              
                                      // Output the table header
                                      echo '<div class="table-responsive"> <table id="zero_config" class="table table-striped table-bordered display no-wrap">
                                                                          <thead>
                                                                              <tr>';
                                      foreach ($aResults[0] as $fieldName=>$value) {
                                          echo '<th>' . htmlspecialchars($fieldName) . '</th>';
                                      }
                                      echo '</tr> </thead>
                                                                          <tbody>';

                                      // Now output all the results
                                      foreach($aResults as $row) {
                                          $i = 0;
                                          echo '<tr>';
                                          foreach ($row as $fieldName=>$value) {
                                              echo '<td>';
                                                if($i == 0)
                                                {
                                                  echo '<button class="btn btn-lg btn-rounded btn-success modalButton"  data-toggle="modal"
                                        data-target="#full-width-modal" data-id="';
                                                 echo $value;
                                                   echo '">' . $value . "</button>";
                                                  $i = 1;
                                                }
                                                else 
                                                {
                                                  echo $value . '</td>';
                                                }
                                          }
                                          echo '</tr>';
                                      }

                                      // Close the table
                                      echo '</tbody>

                                                                      </table></div>';
                                      } else {
                                      echo 'No results';
                                    }

                                    ?>            
                                    

                              
                    
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
               
   <?php 
//           If($_SESSION['role'] == "admin")
//           {
          echo' <div class="card">
                            <div class="card-body">
                               
                                <div class="btn-list">
                                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-outline-primary addRecordmodalButton" data-toggle="modal"
                                        data-target="#addRecord-full-width-modal">Add Record</button>
                                   

                                </div>
                            </div>
                        </div>';
          // }
          ?>
           <!-- Full width modal content -->
                                <div id="addRecord-full-width-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="fullWidthModalLabel">Requested data</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-dismiss="modal">Close</button>
                                                
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
          
          
          <!-- Full width modal content -->
                                <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-full-width">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="fullWidthModalLabel">Requested data</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                                
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light"
                                                    data-dismiss="modal">Close</button>
                                                
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->

          
          
          
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
      <!--This page plugins -->
     <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.21/af-2.3.5/b-1.6.2/b-colvis-1.6.2/b-flash-1.6.2/b-html5-1.6.2/b-print-1.6.2/cr-1.5.2/fc-3.3.1/fh-3.1.7/kt-2.5.2/r-2.2.5/rg-1.1.2/rr-1.2.7/sc-2.0.2/sp-1.1.1/sl-1.3.1/datatables.min.js"></script>
    
      <script>
      $(document).ready( function () {
        $('#zero_config').DataTable( {
    dom: 'Bfrtip',
    buttons: [
        
        'excel',
        'print',
        'pdf',
        'csv',
        'copy'
    ]
})
        $(".modalButton").click(function(){
        var id =$(this).data('id');
        
        $.ajax({
            url:"<?php echo $pageName; ?>",
            method:"post",
            data:{id:id},
            success:function(response){
                $(".modal-body").html(response);
                $("#dynamicModal").modal('show'); 
            }
        })
    })
        
        $(".addRecordmodalButton").click(function(){
        var id =$(this).data('id');
        
        $.ajax({
            url:"<?php echo $pageName; ?>",
            method:"post",
            data:{addRecord:1},
            success:function(response){
                $(".modal-body").html(response);
                $("#dynamicModal").modal('show'); 
            }
        })
    })
} );
  </script>
  <?php 
    include_once("inc/footerEssentials.php");
    
?>

</body>

</html>