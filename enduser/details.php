<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==1)
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

  <title>Supervisor</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Requester Panel</a>

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
        <a class="nav-link" href="enduser.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
       <a class="nav-link" href="placerequest.php">
          <i class="fas fa-fw fa-folder"></i>
          <span>Place Request</span>
        </a>
      <li class="nav-item">
        <a class="nav-link" href="draft.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Draft</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="requesthistory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Request History</span></a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="inventory.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inventory</span></a>
      </li>
            <li class="nav-item">
        <a class="nav-link" href="requestfornewitem.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Request for new Item</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
   <hr size="2" color="Black">
<font size="4" color="black"  >Request # :<?php echo "",$_GET['id'];  ?>&nbsp;&nbsp;
Request from :<?php echo "",$_GET['name'];  ?>&nbsp;&nbsp;
Required Before #:<?php echo "",$_GET['dod'];  ?></font>
<?php
$req_no=$_GET['id'];

  ?>


        <!-- Icon Cards-->
 
<hr size="3" color="blue">

  

        <!-- Area Chart Example-->


        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Detail of request:</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="" width="100%" cellspacing="0">
                <thead>
<?php  
include('../config.php');
                        $sc="SELECT * from user_request_item ";
                        $qc=mysqli_query($conn,$sc); 
                        
                            


                            while($roc=mysqli_fetch_array($qc)){

                              if($roc['ActualReqNo']==$_GET['id'])
                              { 

                                if($roc['ProductName']!="3P" && $roc['ProductCode']!="3P" )
                              { 

                              ?>


                  <tr style="background: #302F2F;  color: white; ">

                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Req. QTY</th>                      
                      <th>Unit</th>
                      <th>Issued Qty</th>
                                                          
                  </tr>

<?php break; }}} ?>

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
                              if($ro['ActualReqNo']==$_GET['id'])
                              { 

                                if($ro['ProductName']!="3P" && $ro['ProductCode']!="3P" )
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


 

      <TD><INPUT id="4" placeholder="unit" value="<?php echo $u; ?>" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="6" type="text" readonly name="unit[]"/></TD>


   <TD ><INPUT id="6" placeholder="issued Qty" style="font-size: 8pt; 
 text-align: center;" value="<?php echo $ro['IssuedQty']; ?>" size="6" style="font-size: 10pt"  type="text" name="aqty[]" readonly/></TD>

</tr>
                             <?php    
                          } 

                          else
                          {

                         include('../config.php');
                        $sa="select * from users_requests";
                        $qa=mysqli_query($conn,$sa); 
                        $ros=mysqli_fetch_array($qa);

                    ?> <b><div style="background-color: lightblue; width: 30%;"><h3 style="background-color: black; color:white;">Service Request</h3>  <?php   

                        echo "Client Name :".$ros['client']."<br>";
                        echo "Well Name   :  ".$ros['well']."<br>";
                        echo "JOB         :".$ros['job']."<br>";
                        echo "Purpose     :".$ros['purpose']."<br>";  
                      
                    ?> </div> </b> <?php  

                          }

                        }$icount++;}
                              ?>
                   
                </tbody>
              </table>

              <br>




            </div>
          </div>
        </div>

<?php
 include('../config.php');
                      
                        $sss="SELECT * from users_requests WHERE ActualReqNo='$req_no';";
                        $qqq=mysqli_query($conn,$sss); 
                        $rooo=mysqli_fetch_array($qqq);   
                        $supr=$rooo['SupervisorRemarks'];
                        $str=$rooo['StorekeeperRemarks'];

                        
                



                              ?>
                              <b>Supervisor  Remarks: </b><div class="well"><?php echo $supr;?></div>
                             <b>StoreKeeper  Remarks: </b><div class="well"><?php echo $str;?></div>





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