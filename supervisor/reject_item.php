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

  <title>StoreKeeper</title>

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


                       <?php  
                        include('../config.php');
                        $req_no=$_GET['id'];
                        $s="SELECT * from user_request_item WHERE ReqNo='$req_no';";
                        $q=mysqli_query($conn,$s); 
                        $ro=mysqli_fetch_array($q);      
                         ?>




        <!-- Breadcrumbs-->

   <hr size="2" color="Black">
<font size="4" color="black"  >Request # :<?php echo "",$ro['ActualReqNo'];  ?>&nbsp;&nbsp;
Request from :<?php echo "",$_GET['name'];  ?>&nbsp;&nbsp;
Required Before #:<?php echo "",$_GET['dod'];  ?></font>
<?php
$req_no=$_GET['id'];

  ?>


        <!-- Icon Cards-->
 
<hr size="3" color="blue">
<form action="order_na.php?rqn=<?php echo $req_no; ?> "   method="post">
  
<INPUT id="" placeholder="Available" style="font-size: 7pt;border: ;
border-color: black; background-color: green  ; color: white; text-align: center;" value="Avalable" readonly size="9" style="font-size: 10pt"  type="text" /> 
<INPUT id="" placeholder="Partial Avalable" style="font-size: 7pt;border: ;
border-color: black; background-color: brown  ; color: white; text-align: center;" value="Partial Avalable" readonly size="9" style="font-size: 10pt"  type="text" /> 
<INPUT id="" placeholder="Not Avalable" style="font-size: 7pt;border: ;
border-color: black; background-color: red  ; color: white; text-align: center;" value="Not Avalable" readonly size="9" style="font-size: 10pt"  type="text" /> 
        <!-- Area Chart Example-->


        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Request Analysis from Supervisor</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr style="background: #302F2F;  color: white; ">

                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Approved. QTY</th>
                      <th>Ava. QTY</th>
                      <th>Unit</th>
                      <th>To Be Issued </th>
                                                          
                  </tr>
                </thead>
              
                <tbody>


                            <?php  
                            $icount=0;
                            $available=0;
                            $missing=0;
                            $iiname=array();
                            $iicode=array();
                            $iiqty=array();
                       include('../config.php');
                        $s="select * from user_request_item";
                        $q=mysqli_query($conn,$s); 
                        
                            while($ro=mysqli_fetch_array($q))
                            {
                              if($ro['ReqNo']==$_GET['id'])
                              {
                              ?>

                              <TD><input id="1" value="<?php echo $ro['ProductName'];  ?>" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="7" style="font-size: 10pt" placeholder="name" name="pname[]" type="text" list="pname" onchange="setvalues(this.id,this.value)" /> 
            

                  </TD>
                  
             <TD><input id="2" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['ProductCode'];  ?>" size="7" placeholder="code" style="font-size: 10pt" name="pcode[]" type="text" list="pcode" onchange="setvaluesc(this.id,this.value)" /> 
  
                  </TD>    


                   <TD><INPUT id="3"  placeholder="QTY" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['ProductQty'];  ?>" size="6"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
              
              <?php
      include('../config.php');
      $sql="SELECT * from current_state WHERE item_name = '".$ro['ProductName']."' or  item_code = '".$ro['ProductCode']."'" ; 

      $result=mysqli_query($conn,$sql); 
      $row = mysqli_fetch_array($result);
      $a=$row['qty'] ;
      $u=$row['unit'] ;
      $loc=$row['loc_in_store'] ;


 ?>  


 <TD><INPUT id="5" placeholder="Description" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="10" readonly value="<?php echo $a; ?>"  type="text" name="dis[]"/></TD>
      <TD><INPUT id="4" placeholder="unit" value="<?php echo $u; ?>" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="6" type="text" readonly name="unit[]"/></TD>
      <?php 
      if($ro['approved_qty']<=$a)
      {
      ?>  <input type="hidden"  name="iiqty[]" value="<?php echo $ro['approved_qty'] ?>">
           <input type="hidden"  name="iiname[]" value="<?php echo $ro['ProductName'] ?>">
            <input type="hidden"  name="iicode[]" value="<?php echo $ro['ProductCode'] ?>">
      <?php 

        $available++;
        ?>


<TD><INPUT id="6" placeholder="A.Qty" value="<?php echo $ro['approved_qty'] ?>" size="6" style="font-size: 8pt;
border-color:black  ; background-color: green; color: white; text-align: center;" style="font-size: 8pt"  type="text" name="aqty[]"/></TD>

<?php 
      }
  
else if($a<$ro['approved_qty'] &&  $a!=0)
      {
                                    
                            $missing++;
        ?>
<TD><INPUT id="6" placeholder="A.Qty" value="<?php echo $a; ?>" size="6" style="font-size: 8pt;border: ;
border-color: black; background-color: brown ; color: white; text-align: center;"  type="text" name="aqty[]"/></TD>

<?php } 

else if( $ro['approved_qty']-$a==$ro['approved_qty'])
      {
            ?>

            <input type="hidden"  name="naiqty[]" value="<?php echo $ro['approved_qty'] ?>">        
           <input type="hidden"  name="nainame[]" value="<?php echo $ro['ProductName'] ?>">
            <input type="hidden"  name="naicode[]" value="<?php echo $ro['ProductCode'] ?>">

<TD ><INPUT id="6" placeholder="issued Qty" style="font-size: 8pt;border: ;
border-color: black; background-color: red  ; color: white; text-align: center;" value="<?php echo $a; ?>" size="6" style="font-size: 10pt"  type="text" name="aqty[]"/></TD>
<?php }

?>

</tr>
                             <?php    
                          } $icount++;}
                              ?>
                   
                </tbody>
              </table>

              <br>
  <input type="submit" class="btn btn-primary" name="Issue" value="Proceed Request" style="font-size: 8pt;" >

  </form>
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
    
 unset($_SESSION['submitmsg']);


}              
  ?>