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
  <script type="text/javascript">
  	function printElem(divId) {
    var content = document.getElementById(divId).innerHTML;
    var mywindow = window.open('', 'Print', 'height=600,width=800');

    mywindow.document.write('<html><head><title>Print</title>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(content);
    mywindow.document.write('</body></html>');

    mywindow.document.close();
    mywindow.focus()
    mywindow.print();
    mywindow.close();
    return true;
}
  </script>
  <SCRIPT language="javascript">







window.onload = function(){
  document.getElementById("sidebarToggle").click();
}



    function addRow(tableID) {
            var rowss = document.getElementById(tableID).getElementsByTagName("tr").length;
      for(var j=rowss; j<rowss+9; j++) {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;
      
      var row = table.insertRow(rowCount);
      var colCount = table.rows[0].cells.length;

      for(var i=0; i<colCount; i++) {

        var newcell = row.insertCell(i);

        newcell.innerHTML = table.rows[0].cells[i].innerHTML;
        //alert(newcell.childNodes);
        switch(newcell.childNodes[0].type) {
          case "text":
              //newcell.childNodes[0].value = j + "" + i;
                            newcell.childNodes[0].id = j + "" + i;
              break;
          case "checkbox":
              newcell.childNodes[0].checked = false;
                            newcell.childNodes[0].id = j + "" + i;
              break;
          case "select":
              //newcell.childNodes[0].selectedIndex = 4;
                            newcell.childNodes[0].id = j + "" + i;
              break;
        }
      }
      }
    }



function setvalues(idname,pname) {
  
var ajax=new XMLHttpRequest();
  var method="GET";
  var url="getdata.php?q="+pname;
  var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.send();

    ajax.onreadystatechange=function() {

      
       if (this.readyState==4 && this.status==200) {
        var data=JSON.parse (this.responseText);
   
          var pn =parseInt(idname);
          pn=pn+1;
          var pn=pn.toString();
          document.getElementById(pn).value=data[1];


          var pn =parseInt(idname);
          pn=pn+2;
          var pn=pn.toString();
          document.getElementById(pn).value=data[3];


          var pn =parseInt(idname);
          pn=pn+4;
          var pn=pn.toString();
          document.getElementById(pn).value=data[2];

          var pn =parseInt(idname);
          pn=pn+5;
          var pn=pn.toString();
          document.getElementById(pn).value=data[4];




       }
   }
}



function setvaluesc(idname,pname) {
  
var ajax=new XMLHttpRequest();
  var method="GET";
  var url="getdata.php?q="+pname;
  var asynchronous=true;
    ajax.open(method,url,asynchronous);
    ajax.send();

    ajax.onreadystatechange=function() {

      
       if (this.readyState==4 && this.status==200) {
        var data=JSON.parse (this.responseText);
   
          var pn =parseInt(idname);
          pn=pn-1;
          var pn=pn.toString();
          document.getElementById(pn).value=data[0];


          var pn =parseInt(idname);
          pn=pn+1;
          var pn=pn.toString();
          document.getElementById(pn).value=data[3];


          var pn =parseInt(idname);
          pn=pn+3;
          var pn=pn.toString();
          document.getElementById(pn).value=data[2];

          var pn =parseInt(idname);
          pn=pn+4;
          var pn=pn.toString();
          document.getElementById(pn).value=data[4];
       }
   }
}





function deleteRow(r) {
  var rc = document.getElementById("dataTable").getElementsByTagName("tr").length;
  if(rc!=1){
  var i = r.parentNode.parentNode.rowIndex;
  document.getElementById("dataTable").deleteRow(i);
}
else
{
  alert("Minimum one row is needed");
}
}

function sumof()

{
  //alert("ssds");
  var sum=0;

for(var i=8; i<500; i=i+10) {
  var j=i-4;
  if(document.getElementById(i)!=null)
    sum=sum+Number(document.getElementById(i).value)*Number(document.getElementById(j).value);
    if(document.getElementById(i)!=null){  
    sum1=Number(document.getElementById(i).value)*Number(document.getElementById(j).value);
    document.getElementById(i+1).value=sum1;

}


}

 document.getElementById("totalall").value=sum; 

}

function drate(val)
{
 if(val=="Dollar")
 { document.getElementById("dcrv").hidden="";
   document.getElementById("dcrl").hidden="";
}
else
{
    document.getElementById("dcrv").hidden="hidden";
    document.getElementById("dcrl").hidden="hidden";
    //alert("Currency is Already Selected");
}

}

  </SCRIPT>

  <title>Place Order</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

 <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">Storekeeper Panel</a>

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
         <li class="nav-item active">
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
                                            if(isset($_SESSION["subsucc"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["subsucc"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>


                                              <?php
                                            //session_start();
                                            if(isset($_SESSION["order_submitted"]))
                                            {
                                            ?>                                             
                                     
                                          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                                            <span class="badge badge-pill badge-success">
                                            <?php echo $_SESSION["order_submitted"] ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                            </button>
                                          </div> 

                                            <?php
                                            
                                            }
                                            ?>
                                            


  <div class="row">
    <div class="col-sm-8" style="background-color:white;">
      <h5 style="color: black" >Search:</h5>
    </div>


    <div class="col-sm-4" style="background-color:white;">
   
    </div>
  </div>
                                            





        
<?php
  $ido=$_SESSION["id"];
 
  ?>
  <form action="http://localhost/used/storekeeper/alltrans.php"   method="post" > 



  <p style="color:black ; " >Request No :&nbsp;<INPUT type="text" id="project" placeholder="Request #" value="" size="10" style="font-size: 10pt"  type="text" name="req" list="userid"/> 
           <?php  
            include('../config.php');
            $s11="SELECT * from users_requests"; 
            $q11=mysqli_query($conn,$s11); 
            ?>
            <datalist   id="userid">
                <?php 
               while($ro11=mysqli_fetch_array($q11)){
                $nn=$ro11['ActualReqNo'];                                                     
                ?>

              <option  value="<?php echo $nn;?>" > <?php echo $nn;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>





   UserID : 


    &nbsp;&nbsp;
<input id="2" value="" size="15" style="font-size: 10pt" placeholder="User ID" name="userid" type="text" list="user"/> 
            <?php  
            include('../config.php');
            $s1="SELECT * from users"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="user">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['User_Id'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>  
  	From : <INPUT id="date"  value="<?php echo date('D-M-Y'); ?>" size="6" type="date"   style="font-size: 10pt"  name="dodfrom" placeholer="DOD"/> &nbsp;&nbsp;To : <INPUT id="date"  value="<?php echo date('D-M-Y'); ?>" size="6" type="date"   style="font-size: 10pt"  name="dodto" placeholer="DOD"/>Item name :&nbsp;<input id="1" value="" size="15" style="font-size: 10pt" placeholder="P. Name" name="pname" type="text" list="pname"/> 
            <?php  
            include('../config.php');
            $s1="SELECT * from current_state ORDER BY sr_no ASC"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="pname">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['item_name'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
 





       &nbsp;&nbsp; 
   <input type="submit" name="search" value="Search">
   <button value="Print" onclick="printElem('results')">Print</button>
</form>
<?php 

if(isset($_POST['search'])){
	$request_1=$_POST['req'];
$u_id=$_POST['userid'];
$from=$_POST['dodfrom'];
$to=$_POST['dodto'];
$item=$_POST['pname'];
$item_flag="no";
if($to==""){
$DateEnd = date('Y-m-d', strtotime("2099-12-30"));  
}else{
  $DateEnd = date('Y-m-d', strtotime($to));

}
$DateBegin = date('Y-m-d', strtotime($from)); 


// 0 0 0
if($_POST['req']=="" && $_POST['userid']==""&&$_POST['pname']=="" ){
 $s="select * from users_requests";
 
 }
 //001
else if($_POST['req']=="" && $_POST['userid']==""&&$_POST['pname']!="" ){
 $s="select * from users_requests";
// $s="select * from store_outward WHERE product_name='$item'";
$item_flag="yes";
}
//010
else if($_POST['req']=="" && $_POST['userid']!=""&&$_POST['pname']=="" ){
 $s="select * from users_requests WHERE UserId='$u_id'";

}
//011
else if($_POST['req']=="" && $_POST['userid']!=""&&$_POST['pname']!="" ){
 $s="select * from users_requests WHERE UserId='$u_id'";
 $item_flag="yes";
}
//100
else if($_POST['req']!="" && $_POST['userid']==""&&$_POST['pname']=="" ){
 $s="select * from users_requests WHERE ActualReqNo='$request_1' ";

}
//101
else if($_POST['req']!="" && $_POST['userid']==""&&$_POST['pname']!="" ){
$item_flag="yes";
 $s="select * from users_requests WHERE ActualReqNo='$request_1' ";
}
//110
else if($_POST['req']!="" && $_POST['userid']!=""&&$_POST['pname']=="" ){

 $s="select * from users_requests WHERE ActualReqNo='$request_1' AND UserId='$u_id'";
}
//111
else if($_POST['req']!="" && $_POST['userid']!=""&&$_POST['pname']!="" ){

 $s="select * from users_requests WHERE ActualReqNo='$request_1' AND UserId='$u_id'";
$item_flag="yes";
}
/*
if($_POST['dodfrom']!=""){
$req="request_no='$request_1'";
}
if($_POST['dodto']!=""){
$req="request_no='$request_1'";
}
*/
$qtysum=0;

?>

  <div class="card mb-3" id="results">
          <div class="card-header">
            <i class="fas fa-table"></i>
           Search Results</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered"  width="100%" cellspacing="0">
                <thead>
                  <tr style="background: #302F2F;  color: white; ">
                      <th>Req. #</th>
                      <th>UserName</th>
                      <th>Item Name</th>
                      <th>Issue Date</th>
                      <th>Issued Qty</th>
                      <th>Approved by</th>                                     
                  </tr>
                </thead>
              
                <tbody>
                    <?php  
                       include('../config.php');
                       
                        $q=mysqli_query($conn,$s); 
                        
                            while($ro=mysqli_fetch_array($q))
                            {
$paymentDate=$ro['DOI'];
                            	 $paymentDate=date('Y-m-d', strtotime($paymentDate));
                            	  if (($paymentDate >= $DateBegin) && ($paymentDate <= $DateEnd)){
   
                              $curr_req=$ro["ActualReqNo"];
                              $s1="select * from store_outward WHERE ActualReqNo='$curr_req'";

                        $q1=mysqli_query($conn,$s1); 
                            while($ro1=mysqli_fetch_array($q1)){
if($item_flag=="yes"){
	if($ro1['product_name']!=$item)
		continue;
}
                           ?> 
                           
                    <tr>
                      <td>   <?php echo  $ro["ActualReqNo"];  ?>  </td>
                      <td><?php  echo $ro['UserName'].'('.$ro['UserId'].')';  ?></td>
                      <td><?php  echo $ro1['product_name']; ?></td>
                      <td><?php  echo $ro['DOI']; ?></td>                       
                      <td><?php  echo $ro1['qty']; ?></td>
                      <td><?php  echo $ro['Supervisor']; ?></td>
                     <?php (int)$qtysum=(int)$qtysum+(int)$ro1['qty'];?>
                    </tr>
                   
                    <?php 
                         }

                          }
                          else{
                          	continue;
                          }
                      }
                    ?>
                   <tr style="background: #302F2F;  color: white; ">
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th> </th>
                      <th><?php echo $qtysum;?></th>
                      <th> </th>                                     
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>






<?php
}
?>

 


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
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/chart.js/Chart.min.js"></script>
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>
  <script src="../js/demo/chart-area-demo.js"></script>

</body>

</html>
<?php  
    

unset($_SESSION['subsucc']);

}              
  ?>