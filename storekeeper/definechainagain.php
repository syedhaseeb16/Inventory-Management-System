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
      <li class="nav-item active">
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
             <li class="nav-item">
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














        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Define Chain</div>

         <div class="card-body">
            <div class="table-responsive">


         <?php  

                   include('../config.php');
                    $uid=$_GET['sid'];
                    $sum=0;
                    $sql="SELECT * from order_item_detail WHERE order_no = '".$uid."'" ; 

                    $result=mysqli_query($conn,$sql); 
                   while( $row = mysqli_fetch_array($result))
                   {

                   $sum=$sum+ $row['pqty']*$row ['unitprice'];
                    

                   }


                    $uid=$_GET['sid'];
                    
                    $sql="SELECT * from orders" ; 
                       $cy=date("Y");

                    $result=mysqli_query($conn,$sql); 
                   while( $row = mysqli_fetch_array($result))
                   {
                     //echo "nnn1";
               $oidc=$row['segment']."/".$cy."/".'I'."/".$row['order_no'];
                    if($oidc==$uid && $row['ordertype']=='International'){
                    //  echo "nnn2";
                     $sum =$row['drate']*$sum;
                    }

                   }


 





                     include('../config.php');
                    $uid=$_GET['sid'];
                    
                    $sql="SELECT * from limits" ; 

                    $result=mysqli_query($conn,$sql); 
                   $row = mysqli_fetch_array($result);
                   $lower=$row['ist'];
                   $middle=$row['second'];
                   $high=$row['third'];
                   
                   
                   //echo $uid;
          if ($sum<=$lower) {
            ?>
                     <div class="alert alert-info">
                     <strong>Info!</strong> Amount is less than lower Limit.First Manger Will Approve.
                      </div> 
<?php     


            }elseif ($sum>$lower && $sum<=$middle) {


                   ?>
                     <div class="alert alert-info">
                      <strong>Info!</strong> Amount Exceeded first Limit and lie in second Limit.First and second Manger Will Approve.
                     </div> 
<?php     
             

            }elseif ($sum>$middle ) {


              ?>
                     <div class="alert alert-info">
  <strong>Info!</strong> Amount Lie in third Limit.All manger will Aprove
</div> 
<?php   
            


            }
            
              ?>

                          




<?php 
if ($sum<=$lower) {


              ?>

<form action="getdata.php?id=<?php echo $_GET['sid']; ?> "   method="post" enctype="multipart/form-data">
        <table>
         <TD>Manager 1: <input  value="" size="15" style="font-size: 10pt" placeholder="Manager 1" name="m1" type="text" list="m1"  /> 
              <?php  
            include('../config.php');
            $s1="SELECT * from users WHERE User_Type=4"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="m1">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>
             
          
          </table>
          <br>
          <input style="font-size: 9pt" value="Confirm Approval Chain" class="btn btn-primary" type="submit" name="chain11">
</form>
                   
<?php }else if($sum>$lower && $sum<=$middle){?>

<form action="getdata.php?id=<?php echo $_GET['sid']; ?> "   method="post" enctype="multipart/form-data">
        <table>
         <TD>Manager 1: <input  value="" size="15" style="font-size: 10pt" placeholder="Manager 1" name="m1" type="text" list="m1"  /> 
              <?php  
            include('../config.php');
            $s1="SELECT * from users WHERE User_Type=4"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="m1">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>
                  <TD>Manager 2: <input  value="" size="15" style="font-size: 10pt" placeholder="Manager 2" name="m2" type="text" list="m2"  /> 
              <?php  
            include('../config.php');
            $s1="SELECT * from users WHERE User_Type=5"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="m2">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>
             
          
          </table>
          <br>
          <input style="font-size: 9pt" value="Confirm Approval Chain" class="btn btn-primary" type="submit" name="chain22">
</form>







<?php 
} else if($sum>$middle ){
 ?>


<form action="getdata.php?id=<?php echo $_GET['sid']; ?> "   method="post" enctype="multipart/form-data">
        <table>
         <TD>Manager 1: <input  value="" size="15" style="font-size: 10pt" placeholder="Manager 1" name="m1" type="text" list="m1"  /> 
              <?php  
            include('../config.php');
            $s1="SELECT * from users WHERE User_Type=4"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="m1">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>
                  <TD>Manager 2: <input  value="" size="15" style="font-size: 10pt" placeholder="Manager 2" name="m2" type="text" list="m2"  /> 
              <?php  
            include('../config.php');
            $s1="SELECT * from users WHERE User_Type=5"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="m2">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>



                  <TD>Manager 3: <input  value="" size="15" style="font-size: 10pt" placeholder="Manager 2" name="m3" type="text" list="m3"  /> 
              <?php  
            include('../config.php');
            $s1="SELECT * from users WHERE User_Type=6"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="m3">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>
             
          
          </table>
          <br>
          <input style="font-size: 9pt" value="Confirm Approval Chain" class="btn btn-primary" type="submit" name="chain33">
</form>


<?php
}else{
  ?>

<div class="alert alert-warning">
  <strong>Warning!</strong> Limit Exceeded.
</div>

<?php  }?>   
              
                                            <?php
                                            //session_start();
                                            if(isset($_SESSION["cnotdefine"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["cnotdefine"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>


<br>
<div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-8 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Manager Approval Limits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> 
                        
        

<hr>
<font style="color: blue">
<h4>Order Amount: <span class="label label-default">
 <?php echo  $sum; ?></span></h4>

<h4>Mangers  1 Approval limit: <span class="label label-default">
 <?php echo  $lower; ?></span></h4>
 <h4>Mangers  2 Approval limits: <span class="label label-default">
 <?php echo  $middle; ?></span></h4>
 <h4>Manger   3 Approval Limits: <span class="label label-default">
 <?php echo  $high; ?></span></h4>
 <hr>

</font>










                    </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            

          

            <!-- Pending Requests Card Example -->
          
          </div>













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