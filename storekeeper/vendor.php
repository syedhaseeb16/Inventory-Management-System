<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==3)
                          {          


$ct=time();
if($ct>$_SESSION["timer"])
{
session_start();
$_SESSION["sessionexp"]="Session Expired";
header("LOCATION:../index.php");
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

  <title>Storekeeper</title>
  

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.html">Storekeeper Panel</a>

    <button class=" btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>
    
<script type="text/javascript">
  function loginagain(id,type)
  {

window.location.href="../checking.php?id="+id+"&type="+type+"";
  }


</script>
<?php  $lid=$_SESSION["id"] ?>
<div class="dropdown">
<select style="font-size: 10pt" value="" required name="<?php echo $lid; ?>" onchange="loginagain( this.name,this.value )"  >
                                    <option selected>Select Role</option>
                                  <?php
                                      include('../config.php');
                                    $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                     ?>
                                      <?php
                                       $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['admin']=='0'))
                                          {  ?>


                                      <option value="0">Admin</option>
                                       <?php
                                         }}
                                         ?>
                                                        <?php
                                                         $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['User_Type']=='1'))
                                          {  ?>


                                       <option value="1">End User</option>
                                       <?php
                                         }}
                                         ?>

                                                        <?php
                                                         $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['supervisor']=='2'))
                                          {  ?>


                                      <option value="2">Supervisor</option>
                                       <?php
                                         }}
                                         ?>
                                                        <?php
                                                         $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['storekeeper']=='3'))
                                          {  ?>


                                      <option value="3">Storekeeper </option>
                                       <?php
                                         }}
                                         ?>



                                       <?php
                                        $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['managerd']=='4'))
                                          {  ?>


                                      <option value="4">Manger 1 </option>
                                       <?php
                                         }}
                                         ?>






                                                        <?php
                                                         $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['managerm']=='5'))
                                          {  ?>


                                      <option value="5">Manager 2</option>
                                       <?php
                                         }}
                                         ?>
                                                        <?php
                                                         $s="select * from users";
                                    $q=mysqli_query($conn,$s); 
                                      while($ro=mysqli_fetch_array($q)){
                                        if (($ro['User_Id']==$lid) && ($ro['managert']=='6'))
                                          {  ?>


                                       <option value="6">Manager3</option>
                                       <?php
                                         }}
                                         ?>





                                     
                                     
                                     
                                      
                                      
                                     
                                  
    </select>
  </div>

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
      <li class="nav-item">
        <a class="nav-link" href="storekeeper.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="requesthistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>All Requests</span></a>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link" href="poip.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>P/O in Process</span>
        </a>
      <li class="nav-item">
        <a class="nav-link" href="poc.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>P/O Completed</span></a>
      </li>
  
            <li class="nav-item">
        <a class="nav-link" href="placeorder.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Place Order</span></a>
      </li>
         <li class="nav-item">
        <a class="nav-link" href="alltrans.php">
          <i class="fas fa-fw fa-table"></i>
          <span>All Transtions</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inventory Status</span></a>
      </li>
             <li class="nav-item active">
        <a class="nav-link" href="vendor.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Vendor</span></a>
      </li>
           

    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->

        <!-- Icon Cards-->
     
                                            <?php
                                          
                                            if(isset($_SESSION["del_profile_se"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["del_profile_se"]; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>



                                           

                                                  <?php
                                                   if(isset($_SESSION["email_exist"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["email_exist"]; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>


                                            <?php
                                                  if(isset($_SESSION["Update_profile_se"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["Update_profile_se"]; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>
                                                <?php
                                                  if(isset($_SESSION["userAdded"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["userAdded"]; ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>








 <div class="table-data-feature">
                                                
                                           

                                                    <a href="addnewvendor.php"> <button style="color:white; font-size: .9em; background-color: black; " class="item" data-toggle="tooltip" data-placement="top" title="Add new">Add New Vendor
                                                     </button></a>
                                                   
                                                    
                                                </div>






        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Detail of all Vendors</div>

         <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" cellpadding="0" style="text-align: center;" >

                                    <thead style="background: #302F2F;  color: white; ">
                                        <tr >
                                            <th >Company Name</th>
                                            <th>Person Name</th>
                                            <th>Address</th>
                                            <th>Email Address</th>
                                            <th>Contact #</th>

                                            <th>Deals in</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php 

                                           include('../config.php');
                                            $s="select * from vendor";
                                            $q=mysqli_query($conn,$s); 
                                            
                                            while($ro=mysqli_fetch_array($q)){

                                              ?>


                                            <tr class="tr-shadow">
                                         
                                            <td><?php   echo $ro['company_name']; ?></td>
                                            <td>
                                                <span class="block-email"><?php   echo $ro['person_name'];?></span>
                                              </td>
               
         
                                               <td class="desc">

                                            
                                                     <?php   echo $ro['address']; ?>
                                 
                                                    
                                                    </td>
                                            
                                                    <td class="desc">

                                            
                                                     <?php   echo $ro['company_email']; ?>
                                 
                                                    
                                                    </td>
                                                      <td class="desc">

                                            
                                                     <?php   echo $ro['contactno']; ?>
                                 
                                                    
                                                    </td>




                                                       <td class="desc">

                                            
                                                     <?php   echo $ro['deal_in']; ?>
                                 
                                                    
                                                    </td>






                                            <td>
                                                <div class="table-data-feature">
                                                
                                                   <a href="profileupdate.php?update_profile=<?php  echo $ro['company_email'];?>"> <button style="color:white; font-size: .8em; background-color: green; " class="item" data-toggle="tooltip" data-placement="top" title="Delete">Update
                                                     </button></a>


                                                    <a href="../checking.php?del_vendor=<?php echo $ro['company_email'];?>"> <button style="color:white; font-size: .8em; background-color: red; " class="item" data-toggle="tooltip" data-placement="top" title="Delete">Delete
                                                     </button></a>
                                                   
                                                    
                                                </div>
                                            </td>
                                        </tr>
                                        
                                                <?php
                                            
                                            } 
                                            ?>

                                                <!--script to display password by clicking on check box-->
                                                 <script>
                                                function myFunction(n) {
                                                    var x = document.getElementById(n);
                                                    if (x.type === "password") {
                                                        x.type = "text";
                                                    } else {
                                                        x.type = "password";
                                                    }
                                                }
                                                </script>

                                                                                                                               
                                        
                                    </tbody>
                                </table>
                            </div>
</div></div>


        </div>

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
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

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
    unset($_SESSION["userAdded"]);
    unset($_SESSION["del_profile_se"]);
    unset($_SESSION["Update_profile_se"]);
    unset($_SESSION["Update_error"]);
     unset($_SESSION["email_exist"]);



}              
  ?>