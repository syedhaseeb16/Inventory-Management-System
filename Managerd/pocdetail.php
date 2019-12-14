<?php  
session_start();
if(isset($_SESSION["id"]) && $_SESSION["type"]==4)
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

    <a class="navbar-brand mr-1" href="#">Manager 1 Panel</a>

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

      <li class="nav-item">
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

      <?php  

                   include('../config.php');
                    $uid=$_GET['idd'];
                    $sum=0;
                    $sql="SELECT * from order_item_detail WHERE order_no = '".$uid."'" ; 

                    $result=mysqli_query($conn,$sql); 
                   while( $row = mysqli_fetch_array($result))
                   {

                   $sum=$sum+ $row['pqty']*$row ['unitprice'];
                    

                   }


                    $uid=$_GET['idd'];
                    
                    $sql="SELECT * from orders" ; 
                       $cy=date("Y");
                       $flag1=0;
                    $result=mysqli_query($conn,$sql); 
                   while( $row = mysqli_fetch_array($result))
                   {
                     //echo "nnn1";
               $oidc=$row['segment']."/".$cy."/".'I'."/".$row['order_no'];
                    if($oidc==$uid && $row['ordertype']=='International'){
                    //  echo "nnn2";
                      $flag1=1;
                     $dsum =$row['drate']*$sum;
                    }

                   }
                   ?>




    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
   <hr size="2" color="Black">
<font size="2" color="black" style="font-weight: bold;"  >PO Number # :<?php echo "",$_GET['idd'];  ?>&nbsp;&nbsp;
<?php echo " | Total Amount:",$sum;  ?>&nbsp;&nbsp;
<?php if ($flag1==1){    echo " | Amount in Pkr:",$dsum, " | "; }  ?>
<?php
$req_no=$_GET['idd'];

  ?>
  <a href='pogeneration.php?idd=<?php echo $_GET['idd']; ?> '><button>Download PO </button> </a></font>
            <div>
      
             
             </div>


        <!-- Icon Cards-->
 
<hr size="3" color="blue">

  

        <!-- Area Chart Example-->


        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Detail of PO</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr style="background: #302F2F;  color: white; ">

                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Req. QTY</th>

                      <th>Unit</th>
                      <th>Unit Price</th>
                      <th>Total Price</th>
                      <th>Qty Recieved</th>

                                                          
                  </tr>
                </thead>
              
                <tbody>
                  <tr>
                            <?php  
                            $pon=$_GET['idd'];
                            $icount=0;
                            $available=0;
                            $missing=0;
                            $iiname=array();
                            $iicode=array();
                            $iiqty=array();
                       include('../config.php');
                        $s="select * from order_item_detail";
                        $q=mysqli_query($conn,$s); 
                        
                            while($ro=mysqli_fetch_array($q))
                            {
                              if($ro['order_no']==$_GET['idd'])
                              {
                              ?>

                              <TD><input id="1" value="<?php echo $ro['pname'];  ?>" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="7" style="font-size: 10pt" placeholder="name" name="pname[]" type="text" list="pname" onchange="setvalues(this.id,this.value)" /> </TD>
                  
             <TD><input id="2" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['pcode'];  ?>" size="7" placeholder="code" style="font-size: 10pt" name="pcode[]" type="text" list="pcode" onchange="setvaluesc(this.id,this.value)" />  </TD>    

 <TD><INPUT id="3"  placeholder="QTY" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['pqty'];  ?>" size="6"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
              
                                 <TD><INPUT id="3"  placeholder="QTY" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['unit'];  ?>" size="6"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>

                                 <TD><INPUT id="3"  placeholder="QTY" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['unitprice'];  ?>" size="6"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
                                 <TD><INPUT id="3"  placeholder="QTY" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['unitprice']*$ro['pqty'];;  ?>" size="6"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>

<TD><INPUT id="4"  placeholder="Recieved Qty" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" value="<?php echo $ro['precieved']  ?>" size="6"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>






              <?php
      include('../config.php');
      $sql="SELECT * from current_state WHERE item_name = '".$ro['pname']."' or  item_code = '".$ro['pcode']."'" ; 

      $result=mysqli_query($conn,$sql); 
      $row = mysqli_fetch_array($result);
      $a=$row['qty'] ;
      $u=$row['unit'] ;
      $loc=$row['loc_in_store'] ;
  
      $icount++;
}
   ?>  </tr> <?php 
} 
                              ?>
                   
               </tbody>
          
              </table>

              <hr>


<?php 
include('../config.php');
$sql="SELECT * from approval_chain WHERE order_no = '".$_GET['idd']."'" ; 

$result=mysqli_query($conn,$sql); 
$rod = mysqli_fetch_array($result);

 
             
             ?>

            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->



                      <?php  
                          $s="select * from orders";
                           $cy=date("Y");
                        $qg=mysqli_query($conn,$s); 
                        
                            while($rg=mysqli_fetch_array($qg))
                            {


                                 if($rg['ordertype']=="International")
                                {
                                  $oidc=$rg['segment']."/".$cy."/".'I'."/".$rg['order_no'];

                                }
                                else
                                {
                                 $oidc=$rg['segment']."/".$cy."/".'L'."/".$rg['order_no'];

                                }
                               
                               $oidc=strtoupper($oidc);
                                $oidc=strval($oidc);










                              //$oidc=$rg['segment']."/".$rg ['order_no'];
                              if($oidc==$_GET['idd']){
                                ?>
                                             
                               <br> <div class="row" style=" background-color: blue; color: white;">
                              <?php if($rg['q1']!='0')  { $url1='../quotations/'.$rg['q1'];?>
                              <div class="col-sm-4" style="background-color:lavender;"><font color="black" font-size: 10pt; style="bold"> <a target="_blank" href="<?php echo $url1; ?>">QUOTATION 1</a> </font></div>
                            <?php }?>

                           
                              <?php if($rg['q2']!='0')  { $url2='../quotations/'.$rg['q2'];?>
                              <div class="col-sm-4" style="background-color:lavender;"><font color="black" font-size: 10pt; style="bold"> <a target="_blank" href="<?php echo $url1; ?>">QUOTATION 2</a> </font></div>
                            <?php }?>


                           
                              <?php if($rg['q3']!='0')  { $url3='../quotations/'.$rg['q3'];?>
                              <div class="col-sm-4" style="background-color:lavender;"><font color="black" font-size: 10pt; style="bold"> <a target="_blank" href="<?php echo $url1; ?>">QUOTATION 3</a> </font></div>
                            <?php }?>
                              
                            </div>

                            <?php                                    
                              }}


                       include('../config.php');
                        
                        $sqlll="SELECT * from approval_chain" ; 

                         $resultsss=mysqli_query($conn,$sqlll);
                        
                            while($roa=mysqli_fetch_array($resultsss))
                            {
                              if( $roa['order_no']==$_GET['idd'] ){?>

                                                            <br>
                            <div class="row">
                              <?php if($roa['m1']!='0')  {?>
                              <div class="col-sm-4" style="background-color:lavender;"><font color="black" font-size: 10pt; style="bold"> Manager 1:<?php echo $roa['m1'];?><br>Remarks:<?php echo $roa['m1remarks'];?></font></div>
                            <?php }?>

                            <?php if($roa['m2']!='0')  {?>
                              <div class="col-sm-4" style="background-color:lavenderblush;"><font color="black" font-size: 10pt; style="bold"> Manager 2:<?php echo $roa['m2'];?><br>Remarks:<?php echo $roa['m2remarks'];?></font></div>
                            <?php }?>


                            <?php if($roa['m3']!='0')  {?>
                              <div class="col-sm-4" style="background-color:lavender;"><font color="black" font-size: 10pt; style="bold"> Manager 3:<?php echo $roa['m3'];?><br>Remarks:<?php echo $roa['m3remarks'];?></font></div>
                            <?php }?>
                              
                            </div>

                              <?php 
                              }
                            }


                         ?>   








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