<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SolarImprovements</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">



<?php 
 require "./include/connection.php";
 session_start();
 if (!isset($_SESSION['logintrue'])) {  
       header("location:./login.php");

}

      $username = $_SESSION['logintrue'];

?>
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-sun"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Solar Improvements</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <!-- <li class="nav-item ">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li> -->

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Tables


      </div>
      <!-- Nav Item - Tables -->
      <li class="nav-item active">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Solar Quotations</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="tables.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Contact Us</span></a>
      </li> -->


      <!-- Nav Item - Pages Collapse Menu -->
      
      <!-- Divider -->
      <hr class="sidebar-divider">
       <li class="nav-item">
        <a class="nav-link" href="contact.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Contact us</span></a>
      </li>



      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

           
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo  $username ?></span>
                <img class="img-profile rounded-circle" src="https://www.pngitem.com/pimgs/m/78-786293_1240-x-1240-0-avatar-profile-icon-png.png">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>



        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Solar Quotations</h1>
          <p class="mb-4">All the data Recived is being fetch in the table below</a>.</p>

          <?php $sql = "SELECT COUNT(customer_id)
                FROM customer";
                $sqlr = "SELECT COUNT(customer_id)
                FROM customer
                WHERE property_type = 'Residential'
                ";
                $sqlc = "SELECT COUNT(customer_id)
                FROM customer
                WHERE property_type = 'Commercial'
                ";
                 $sqlrecent = "SELECT date_entered
                  FROM customer
                  ORDER BY customer_id DESC
                  LIMIT 1";

                
               $result = $conn->query($sql);
               $alpha = $result->fetch_array();
              $total = $alpha[0];

                $resultc = $conn->query($sqlc);
                $gamma = $resultc->fetch_array();
                $commercial = $gamma[0];


                $resultrecent = $conn->query($sqlrecent);
                $alpharecent= $resultrecent->fetch_row();
                $entry = $alpharecent[0];

                // ago code here

                $time_ago = strtotime($entry);
                $current_time = time();
                $time_difference = $current_time - $time_ago;
                $seconds = $time_difference;
                $minutes = round($seconds / 60);
                $hours = round($seconds /3600);
                $days = round($seconds /86400);
                $weeks = round($seconds / 604800);
                $months = round($seconds/2629440);
                $years = round($seconds/31553280);

                if($seconds <= 60) {
                  $ago = "Just moments ago";
                } else if ($minutes <= 60) {
                            if($minutes ==1) {
                              $ago = "One minute ago";
                            }else {
                              $ago = $minutes . " minutes ago";
                            }
                }else if($hours <=24) {
                            if($hours ==1) {
                              $ago = "An hour ago";
                            }else {
                              $ago = $hours . " hours ago";
                            }
                }else if ($weeks <=4.3)  //4.3= 52/12 
                 {
                              if($weeks==1){
                                $ago = "A week ago";
                              } else {
                                $ago = $weeks. " weeks ago";
                              }

                }else if ($months <=12) {
                            if($months==1){
                              $ago = "A month ago";
                            } else {
                              $ago = $months . " months ago";
                            }
                }else {
                            if($years==1){
                              $ago = "A year ago";

                            }else {
                              $ago = "No Recent Entry";
                            }
                }


                
                ?>


          <!-- DataTales Example -->
         
          <div class="card shadow mb-4">
            <div class="card-header py-3">


            <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-primary shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Entries</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $total ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-calendar fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->

<?php 
$resultr = $conn->query($sqlr);
$beta = $resultr->fetch_array();
$residential = $beta[0];
?>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-success shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
          <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Residencial Entries</div>
          <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $residential ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-home fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Earnings (Monthly) Card Example -->
 <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-">Commercial</div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $commercial ?></div>
                        </div>
                        <div class="col">
                        
                        </div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-building  fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

<!-- Pending Requests Card Example -->
<?php 
$resultc = $conn->query($sqlc);
$gamma = $resultc->fetch_array();
$commercial = $gamma[0];
?>
<div class="col-xl-3 col-md-6 mb-4">
  <div class="card border-left-info shadow h-100 py-2">
    <div class="card-body">
      <div class="row no-gutters align-items-center">
        <div class="col mr-2">
         <div class="text-xs font-weight-bold text-info text-uppercase mb-">Recent Entry</div>
          <div class="h6 mb-0 font-weight-bold text-gray-800"><?php echo $ago ?></div>
        </div>
        <div class="col-auto">
          <i class="fas fa-clipboard-list    fa-2x text-gray-300"></i>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Content Row -->

            
            </div>
            <div class="card-body">

           
            
              
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>

                    <tr>
                      <th>ID</th>
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>Contact</th>
                      <th>Property Type</th>
                      <th>shade</th>
                      <th>Credit Score</th>
                      <th>Electric BIll</th>
                      <th>Callback</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <th>ID</th>
                      <th>Customer Name</th>
                      <th>Address</th>
                      <th>State</th>
                      <th>Contact</th>
                      <th>Property Type</th>
                      <th>shade</th>
                      <th>Credit Score</th>
                      <th>Electric BIll</th>
                      <th>Callback</th>
                    </tr>
                  </tfoot>
                  <tbody>
                  <?php 
                  
                   $sql = "SELECT customer.customer_id ,customer.customer_name, customer.address , states.state_name , customer.contact , customer.property_type , customer.shade , customer.credit_score , customer.electric_bill , customer.callback
                   FROM customer
                   JOIN states
                   ON customer.state_name = states.state_id  
                   ";
                  if($result = $conn->query($sql)) {
                    // echo "executing";
                  }else {
                    echo "error";
                  }
                  $rows = $result->num_rows;
                  if( $rows > 0 ) {                  
                  while ( $result_analyze = $result->fetch_array()) {
                    // to see th whole array 
                // print_r($result_analyze);
                    ?>
                    <tr>
                      <td><?php echo $result_analyze[0]; ?></td>
                      <td><?php echo $result_analyze[1]; ?></td>
                      <td><?php echo $result_analyze[2]; ?></td>
                      <td><?php echo $result_analyze[3]; ?></td>
                      <td><?php echo $result_analyze['contact']; ?></td>
                      <td><?php echo $result_analyze['property_type']; ?></td>
                      <td><?php echo $result_analyze['shade']; ?></td>
                      <td><?php echo $result_analyze['credit_score'];?></td>
                      <td><?php echo $result_analyze['electric_bill']; ?></td>
                      <td><?php echo $result_analyze['callback']; ?></td>
                    </tr>

                    <?php } }
                    
                    else {
                      echo "no data";
                    }
                    ?>
                    
                  </tbody>
                </table>
                 <!-- buttons start -->
             <form action="include/excel.php" method="POST">
                     <input type="submit" class="btn btn-danger" value="Delete All" name="delete">
                      <input type="submit" class="btn btn-primary" value="Refresh" name="refresh">
                     <input type="submit" class="btn btn-success" value="Export to Excel" name="excel">
              </form>
              <!-- button ends -->

              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
