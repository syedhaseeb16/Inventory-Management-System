<?php  
session_start();
 include('../config.php');
if(isset($_SESSION["id"]) && $_SESSION["type"]==3)
                          {          


$ct=time();
if($ct>$_SESSION["timer"])
{
session_start();
$_SESSION["sessionexp"]="Session Expired";
header("LOCATION:../index.php");
}




if(isset($_GET['reject'])){
  $qa=$_GET['reject'];
  $qty="r";
  $zero="0";
  $pname=$_GET['pname'];

 
  $s="UPDATE user_request_item SET Qty_s='$qty', approved_qty='$zero' where ReqNo='$qa' AND ProductName='$pname'";
  $q=mysqli_query($conn,$s); 
        
}

if(isset($_GET['approve'])){
  $qa=$_GET['approve'];
  $qty="0";
  $pname=$_GET['pname'];

 
  $s="UPDATE user_request_item SET Qty_s='$qty' where ReqNo='$qa' AND ProductName='$pname'";
  $q=mysqli_query($conn,$s); 
        
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

    <a class="navbar-brand mr-1" href="#">StoreKeeper</a>

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
   <hr size="2" color="Black">

                         <?php  
                        include('../config.php');
                        $req_no=$_GET['id'];
                        $s="SELECT * from user_request_item WHERE ReqNo='$req_no';";
                        $q=mysqli_query($conn,$s); 
                        $ro=mysqli_fetch_array($q);   
                        $ARNo=$ro['ActualReqNo'];



                         ?>

<font size="4" color="black"  >Request # :<?php echo "",$ro['ActualReqNo'];   ?>&nbsp;&nbsp;
Request from :<?php echo "",$_GET['name'];  ?>&nbsp;&nbsp;
</font>
<?php
$req_no=$_GET['id'];

  ?>


        <!-- Icon Cards-->   
 
<hr size="3" color="blue">
<form action="order_na.php?rqn=<?php echo $req_no; ?>&arno=<?php echo $ARNo;?>"   method="post">
  

        <!-- Area Chart Example-->


        <!-- DataTables Example -->
       <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Request Details</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr style="background: #302F2F;  color: white; ">

                      <th>Product Name</th>
                      <th>Product Code</th>
                      <th>Requested QTY</th>
                      <th>Ava. QTY-WLE</th>
                      <th>Ava. QTY-IWLS</th>
                      <th>Unit</th>
                      <th>Approved Qty</th>
                      <th>Issued Qty</th>
                    
                                                          
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
                              if($ro['ReqNo']==$_GET['id'] )
                              {

                              
                              ?>

                              <TD>


                                <?php if ($ro['Qty_s']=="r") {
                                  
                                 ?>

                                <input id="1" value="<?php echo $ro['ProductName'];  ?>" style="font-size: 10pt;border: none;
border-color: red; background-color: red; color: solid black; text-align: center;" size="7" style="font-size: 10pt" placeholder="name" name="pname[]" type="text" list="pname" onchange="setvalues(this.id,this.value)" /> 
            <?php } else {  ?>



                                <input id="1" value="<?php echo $ro['ProductName'];  ?>" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="7" style="font-size: 10pt" placeholder="name" name="pname[]" type="text" list="pname" onchange="setvalues(this.id,this.value)" /> 

<?php }  ?>
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



              <?php
      include('../config.php');
      $sqll="SELECT * from current_state_wle WHERE item_name = '".$ro['ProductName']."' or  item_code = '".$ro['ProductCode']."'" ; 

      $resultt=mysqli_query($conn,$sqll); 
      $roww = mysqli_fetch_array($resultt);
      $aa=$roww['qty'] ;
      $uu=$roww['unit'] ;
      $locc=$roww['loc_in_store'] ;


        ?>  


 <TD><INPUT id="5" placeholder="Description" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="10" readonly value="<?php echo $aa; ?>"  type="text" name="dis[]"/></TD>



              <?php
      include('../config.php');
      $sqlll="SELECT * from current_state_iwls WHERE item_name = '".$ro['ProductName']."' or  item_code = '".$ro['ProductCode']."'" ; 

      $resulttt=mysqli_query($conn,$sqlll); 
      $rowww = mysqli_fetch_array($resulttt);
      $aaa=$rowww['qty'] ;
      $uuu=$rowww['unit'] ;
      $loccc=$rowww['loc_in_store'] ;

 ?>  


 <TD><INPUT id="5" placeholder="Description" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="10" readonly value="<?php echo $aaa; ?>"  type="text" name="dis[]"/></TD>











      <TD><INPUT id="4" placeholder="unit" value="<?php echo $u; ?>" style="font-size: 10pt;border: none;
border-color: transparent; background-color: transparent; color: solid black; text-align: center;" size="6" type="text" readonly name="unit[]"/></TD>
      <?php 
      if($ro['approved_qty']<=$a)
      {
      ?>  <input type="hidden"  name="iiqty[]" value="<?php echo $ro['ProductQty'] ?>">
           <input type="hidden"  name="iiname[]" value="<?php echo $ro['ProductName'] ?>">
            <input type="hidden"  name="iicode[]" value="<?php echo $ro['ProductCode'] ?>">
      <?php 

        $available++;
        ?>


<TD><INPUT id="6" placeholder="A.Qty" value="<?php echo $ro['approved_qty'] ;?>" size="6" style="font-size: 8pt;
 border: none; text-align: center;" style="font-size: 8pt"  type="text" name="aqty[]"/></TD>

<?php 
      }
  
else if($a<$ro['approved_qty'] &&  $a!=0)
      {
                                    
                            $missing++;
        ?>
<TD><INPUT id="6" placeholder="A.Qty" value="<?php echo $ro['approved_qty'] ; ?>" size="6" style="font-size: 8pt;border:none ;
 text-align: center;"  type="text" name="aqty[]"/></TD>

<?php } 

else if( $ro['approved_qty']-$a==$ro['approved_qty'])
      {
            ?>

            <input type="hidden"  name="naiqty[]" value="<?php echo $ro['approved_qty'] ?>">        
           <input type="hidden"  name="nainame[]" value="<?php echo $ro['ProductName'] ?>">
            <input type="hidden"  name="naicode[]" value="<?php echo $ro['ProductCode'] ?>">

<TD ><INPUT id="6" placeholder="issued Qty" style="font-size: 8pt;border: ;
border-color: black; background-color: red  ; color: white; text-align: center;" value="<?php echo $ro['approved_qty'] ; ?>" size="6" style="font-size: 10pt"  type="text" name="aqty[]"/></TD>


<?php }
?>
<TD><INPUT id="6" placeholder="Issued" value="<?php echo $ro['IssuedQty'] ; ?>" size="6" style="font-size: 8pt;border: none ;
 text-align: center;" readonly type="text" name="aqty[]"/></TD>


<!-- <td>

     <a href='requestdetail.php?reject=<?php echo $ro['ReqNo'];?>&pname=<?php echo $ro['ProductName'];?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name'];?>&dor=<?php echo $_GET['dor'];?> &dod=<?php echo $_GET['dod'];?>'>
                                <button type="button" style="background: red; color:white; font-size: .8em;">
          <span class="glyphicon glyphicon-repeat"></span>   Reject
        </button>

                            </a> |
     <a href='requestdetail.php?approve=<?php echo $ro['ReqNo'];?>&pname=<?php echo $ro['ProductName'];?>&id=<?php echo $_GET['id']; ?>&name=<?php echo $_GET['name'];?>&dor=<?php echo $_GET['dor'];?> &dod=<?php echo $_GET['dod'];?>'>
                                <button type="button" style="background: green; color:white; font-size: .8em;">
          <span class="glyphicon glyphicon-repeat"></span>   Approve
        </button>

                            </a> 




</td> -->

</tr>
                             <?php    
                          } $icount++;}
                            

                        include('../config.php');
                        $req_no=$_GET['id'];
                        $s="SELECT * from users_requests WHERE ReqNo='$req_no';";
                        $q=mysqli_query($conn,$s); 
                        $ro=mysqli_fetch_array($q);   
                        $supr=$ro['SupervisorRemarks'];
                        $strre=$ro['StorekeeperRemarks'];
                        
                    

 




                              ?>
                
                </tbody>
              </table>

              <br>

<b>Supervisor  Remarks: </b><div class="well"><?php echo $supr;?></div>
<b>Storekeeper Remarks: </b><div class="well"> <?php echo $strre; ?></div>


  
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