<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==2)
                          {          


$ct=time();
if($ct>$_SESSION["timer"])
{
session_start();
$_SESSION["sessionexp"]="Session Expired";
header("LOCATION:../index.php");
}



if(isset($_POST['req'])){
include('../config.php');
$uid=$_SESSION["id"];
$msg = $_POST['message'];

date_default_timezone_set("Asia/Karachi");
$dom =  date("j-n-Y") ;

echo $msg,$uid;
$sql = "INSERT INTO new_item_request (req_from,Message,Dom,type,status)
  VALUES ('$uid','$msg','$dom','msg','notseen')";

  if ($conn->query($sql) === TRUE) {
                session_start();
                $_SESSION['submitmsg'] = "Your Request has been submitted Successfully.";
                header("LOCATION:requestfornewitem.php");

  } else {
                session_start();
                $_SESSION['submitmsg'] = "Error Occured.";
                header("LOCATION:requestfornewitem.php");
  }

}

 ?>





<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Request for New Item</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Supervisor Panel</a>

    <button class=" btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        
        <div class="input-group-append">
          <div style=" font:bold; color:white"> <?php   echo $_SESSION["id"]; ?> </div>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="../index.php" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       <div style="font:bold; color: red; "> Log Out</div>
        </a>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item ">
        <a class="nav-link" href="supervisor.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown ">
       <a class="nav-link" href="placerequest.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Place Request</span>
        </a>
      <li class="nav-item ">
        <a class="nav-link" href="draft.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Draft</span></a>
      </li>
      <li class="nav-item ">
        <a class="nav-link" href="requesthistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Request History</span></a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inventory</span></a>
      </li>
            <li class="nav-item active">
        <a class="nav-link" href="requestfornewitem.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Request for new Item</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">
                                    <?php  
                                     if(isset($_SESSION["submitmsg"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["submitmsg"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>












        <!-- Breadcrumbs-->
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header"></div>
      <div class="card-body">
        <div class="text-center mb-4">
          <h4>Request For New Item.</h4>
          <p>Put request to add new Item</p>
        </div>
        <form action="requestfornewitem" Method="POST">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" name="message" placeholder="Enter email address" required="required" autofocus="autofocus">
              <label for="inputEmail">New Item</label>
            </div>
          </div>
          
          <button class="btn btn-primary btn-block" name="req" value="Submit Request"> Submit Request </button>
        </form>

      </div>
    </div>
  </div>

        <!-- Icon Cards-->
 

        <!-- Area Chart Example-->


        <!-- DataTables Example -->
      

      </div>
      <!-- /.container-fluid -->

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->


  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>
  <script src="js/demo/chart-area-demo.js"></script>

</body>

</html>
<?php  
   



}              
  ?>