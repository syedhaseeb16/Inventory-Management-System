<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==5)
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

  <title>Manager</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Manager L2 Panel</a>

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
        <a class="nav-link" href="poip.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
          <li class="nav-item">
        <a class="nav-link" href="requesthistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Requests History</span></a>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="poc.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>P/O Completed</span></a>
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
    <?php
                                            //session_start();
                                            if(isset($_SESSION["isssus"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["isssus"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>
                                             <?php
                                            //session_start();
                                            if(isset($_SESSION["crde"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["crde"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>

        <!-- Icon Cards-->
 

        <!-- Area Chart Example-->


        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Closed Order Detail</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr style="background: #302F2F;  color: white; ">
                          <th>P/O. #</th>
                      <th>Date of Order.</th>
                     
                      <th>Amount</th>
                       <th>Order Type</th>
                      <th>Approved by </th>
                      <th>Closing Date</th>     


                      


                  </tr>
                </thead>
              
                <tbody>
                    <?php  
                       
                       include('../config.php');
                        
                        $sql="SELECT * from approval_chain" ; 

                         $result=mysqli_query($conn,$sql);
                        
                            while($ro=mysqli_fetch_array($result))
                            {
                              if( $ro['fa']=="closed"  ){

                              


                   ?>   
                           
                    <tr>
                      <td>    <a href='pocdetail.php?idd=<?php echo $ro['order_no']; ?> '><?php echo $ro['order_no'];  ?>  </a></td>
         <?php  
                     $sum=0;
                     $dlrflag=0;
                    $sqls="SELECT * from order_item_detail WHERE order_no = '".$ro['order_no']."'" ; 

                    $resultss=mysqli_query($conn,$sqls); 

    



                   while( $rowss = mysqli_fetch_array($resultss))
                   {
                   $sum=$sum+ $rowss['pqty']*$rowss ['unitprice'];
                                   }

                   $s="SELECT * from orders" ; 
                    $cy=date("Y");
                    $res=mysqli_query($conn,$s); 

     
                   while( $r = mysqli_fetch_array($res))
                   {
                   if($r['ordertype']=="International")
                    {
                      $oidc=$r['segment']."/".$cy."/".'I'."/".$r ['order_no'];

                    }
                    else
                    {
                     $oidc=$r['segment']."/".$cy."/".'L'."/".$r ['order_no'];

                    }
                   
                   $oidc=strtoupper($oidc);
                    $oidc=strval($oidc);
              

                    if($oidc==$ro['order_no'] && $r['ordertype']=="International"){

                    // $sum =intval($r['drate'])*$sum;
                     $dlrflag=1;
                    }

                       if(strval($oidc)==strval($ro['order_no']))
                       {                    
                        

                        ?> <td><?php  echo $r['doo'] ; ?> </td><?php 
                      }

                   }    
                  
                        
                   if($dlrflag==0){


                    ?>

                    <td>Rs.<?php  echo $sum; ?>  </td>
                    <td> Local</td>
                    <?php 


                   }
                  else if ($dlrflag==1) {
                     ?>

                    <td> $  <?php  echo $sum; ?></td>
                    <td> International</td>
                    <?php
                      

                    }

                    if($ro['m1a']!='0' && $ro['m2a']!='0' && $ro['m3a']!='0')
                    {
                      if($ro['m1a']=='r'){
                      
                        ?>
                      <td>
                       <?php  echo "TL:3-Waiting for:M1:". $ro['m1']; ?> &nbsp;&nbsp;&nbsp;
                          
                      </td>
                    
                    
                   <?php  }

                    if($ro['m1a']=='ok' && $ro['m2a']=='r' ){?>
                      <td>
                       <?php  echo "TL:3-Waiting for:M2:". $ro['m2']; ?>&nbsp;&nbsp;&nbsp;
                          
                        
                      </td>
                    
                      
                   <?php  }

                   if($ro['m1a']=='ok' && $ro['m2a']=='ok' && $ro['m3a']=='r' ){?>
                      <td>
                       <?php  echo "TL:3-Waiting for:M3:". $ro['m2']; ?>&nbsp;&nbsp;&nbsp;
                          
                        
                      </td>
                    
                      
                   <?php  }

                   if($ro['m1a']=='ok' && $ro['m2a']=='ok' && $ro['m3a']=='ok' ){?>
                      <td>
                       <?php  echo "Approved by ALL(3)"; ?>
                        
                      </td>
                      <td>
                       <?php  echo "Approved"; ?>
                        
                      </td>
                    
                      
                   <?php  }else{?>

                    <td>
                       <?php  echo "In Process"; ?>
                        
                      </td>

<?php
                   }
                    }

                    else if($ro['m1a']!='0' && $ro['m2a']!='0' && $ro['m3a']=='0')
                    {


                        if($ro['m1a']=='r'){?>
                      <td>
                       <?php  echo "TL:2-Waiting for:M1:". $ro['m1']; ?>&nbsp;&nbsp;&nbsp;
                          
                        
                      </td>
                    
                      
                   <?php  }

                    if($ro['m1a']=='ok' && $ro['m2a']=='r' ){?>
                      <td>
                       <?php  echo "TL:2-Waiting for:M2:". $ro['m2']; ?>&nbsp;&nbsp;&nbsp; 
                          
                        
                      </td>
                    
                      
                   <?php  }

                   

                   if($ro['m1a']=='ok' && $ro['m2a']=='ok' ){?>
                      <td>
                       <?php  echo "Approved by ALL(2)"; ?>
                        
                      </td>
                      <td>
                       <?php  echo "Approved"; ?>
                        
                      </td>

                    
                      
                   <?php  }else{?>

                    <td>
                       <?php  echo "In Process"; ?>
                        
                      </td>

<?php
                   }




                    }


                   else if($ro['m1a']!='0' && $ro['m2a']=='0' && $ro['m3a']=='0')
                    {
                        if($ro['m1a']=='r'){?>
                      <td>
                       <?php  echo "TL:1-Waiting for:M1:". $ro['m1']; ?>&nbsp;&nbsp;&nbsp;
                          
                        
                      </td>
                    
                      
                   <?php  }

                                     

                   if($ro['m1a']=='ok'  ){?>
                      <td>
                       <?php  echo "Approved by M1"; ?>
                        
                      </td>
                      <td>
                       <?php  echo "Approved"; ?>
                        
                      </td>
                    
                      
                   <?php  }else{?>

                    <td>
                       <?php  echo "In Process"; ?>
                        
                      </td>

<?php
                   }  



                    }


?>    <?php  




                      ?>    


                    








                                                                
                    </tr>
                   
                    <?php 
                         } 
                          }
                    ?>
                  
                </tbody>
              </table>
            </div>
          </div>
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
     
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript-->
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
</body>

</html>
<?php  
    


   unset($_SESSION["isssus"]);
  unset($_SESSION["crde"]);

}              
  ?>