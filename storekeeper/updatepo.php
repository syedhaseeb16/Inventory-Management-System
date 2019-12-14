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
  
            <li class="nav-item active">
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
      <h5 style="color: black" >Place Your Request:</h5>
    </div>


    <div class="col-sm-4" style="background-color:white;">
   <font style="font-weight: bold; ">Total Amount of P/O:<u> <INPUT id="totalall" align="align-items-center"  placeholder="Total Amount."  size="10"  style="font-size: 10pt background-color:transparent; border-left: none; border-right: none; border-top: none; font-weight: bold; text-align: center;" readonly type="text" font:bold; value=""/></u></font>
    </div>
  </div>
                                            





        
<?php
  $ido=$_SESSION["id"];
  ?>


        <!-- Icon Cards-->
 <form action="getdata.php?id=<?php echo $ido; ?> "   method="post" enctype="multipart/form-data">
  
  <p style="color:black ; " >Project :&nbsp;<INPUT id="project" placeholder="Purpose of order" value="" size="40" style="font-size: 10pt"  type="text" name="project"/>&nbsp;&nbsp;DoD : <INPUT id="date"  value="<?php echo date('D-M-Y'); ?>" size="6" type="date" required style="font-size: 10pt"  name="dod" placeholer="DOD"/>
       &nbsp;&nbsp; 
    Company: <select style="font-size: 10pt" required name="company" >
                                     <option value="IWSS">IWSS</option>
                                      <option value="IWLS">IWLS</option>
                                      <option value="WLE">WLE</option>
    </select>
    &nbsp;
    Segment: <select style="font-size: 10pt" required name="segment" >
                                      <option value="WLS">WLS</option>
                                      <option value="TS">TS</option>
                                      <option value="TCP">TCP</option>
                                      <option value="SWT">SWT </option>
                                      <option value="CT">CT </option>
                                      <option value="TS">TS</option>
                                      <option value="MAG">MAG </option>
                                      <option value="STM">STM</option>
    </select>
        Order Type: <select style="font-size: 10pt" required name="ot" >
                                      <option value="WLS">Services</option>
                                      <option value="TS">Supplies</option>
                     
    </select>
    &nbsp;&nbsp; 
     <select style="font-size: 10pt" required name="currency" onchange="drate(this.value)">
        <option value="Pkr">Pkr</option>
        <option value="Dollar" >Dollar</option>
    </select>&nbsp;&nbsp; 
    <input type="text" id="dcrl" size="10" hidden="hidden" value="Dollar Rate:" name="dcrl" style="font-size: 10pt ;font-weight:bold;  border:none; color " readonly >
    <input type="text" id="dcrv" size="4" hidden="hidden" value="" name="dcrv" style="font-size: 10pt ;font-weight:bold;  border:; color " >
          <input id="ven" value="" size="15" placeholder="Vendor" style="font-size: 10pt" name="vendor" type="text" list="vendor" /> 
            <?php  
            include('../config.php');
            $s11="SELECT * from vendor ORDER BY sr_name ASC"; 
            $q11=mysqli_query($conn,$s11); 
            ?>
            <datalist   id="vendor">
                <?php 
               while($ro11=mysqli_fetch_array($q11)){
                $nn=$ro11['company_name'];                                                     
                ?>

              <option  value="<?php echo $nn;?>" > <?php echo $nn;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                
 
  </p>


  <TABLE  id="dataTable" >
    

    <TR>


      <TD><INPUT size="1" type="text" hidden="hidden" value="1" name="chk" id="00"/></TD>
  

                <TD><input id="1" value="" size="15" style="font-size: 10pt" placeholder="P. Name" name="pname[]" type="text" list="pname" onchange="setvalues(this.id,this.value)" /> 
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
                  </TD>

             <TD><input id="2" value="" size="15" placeholder="part #" style="font-size: 10pt" name="pcode[]" type="text" list="pcode" onchange="setvaluesc(this.id,this.value)" /> 
            <?php  
            include('../config.php');
            $s1="SELECT * from current_state ORDER BY sr_no ASC"; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="pcode">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                $n=$ro1['item_code'];                                                     
                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }                                     
                 ?>  
                  </datalist>
                  </TD>     
         
      <TD><INPUT id="3" placeholder="Description" style="font-size: 10pt ; " size="70pt" readonly value=""  type="text" name="dis[]"/></TD>
      
          
      <TD><INPUT id="4"  placeholder="QTY" value="" size="5"  type="text" style="font-size: 10pt;text-align: center;"  name="qty[]" placeholer="QTY"/></TD>
      <TD><INPUT id="5" placeholder="UOM" value="" style="font-size: 10pt" size="5" type="text" readonly name="unit[]"/></TD>
      
      <TD><INPUT id="6" placeholder="A.Qty" value="" size="5" style="font-size: 10pt; text-align: center;" readonly type="text" name="aqty[]"/></TD>
      <TD><INPUT id="7" hidden="hidden" placeholder="A.Qt" value="" size=""   type="text" /></TD>




      <TD><INPUT id="8" placeholder="Quotation" value="" size="8" style="font-size: 10pt; text-align: center;" onfocusout="sumof()" type="text" name="prize[]"/></TD>
      <TD><INPUT id="9" align="align-items-center"  placeholder="QTYxUnit Pr."  size="8" size="8" style="font-size: 10pt; text-align: center;" readonly type="text" /></TD>

      <TD><input  type="button"  " style="color:white; font-size: 10pt; background-color: black; "  value="DeleteRow"  onclick="deleteRow(this)"/></TD>
    </TR>




  </TABLE>



  
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="text" id="dcrl" size="7" value="Quotation 1:" name="" style="font-size: 9pt ;font-weight:bold;  border:none; color " readonly >
    <input type="file" name="q1" id="q1"  style="font-size: 9pt">
    
     <input type="text" id="dcrl" size="7" value="Quotation 2:" name="" style="font-size: 9pt ;font-weight:bold;  border:none; color " readonly >

    <input type="file" name="q2" id="q2"  style="font-size: 9pt">
     <input type="text" id="dcrl" size="7" value="Quotation 3:" name="" style="font-size: 9pt ;font-weight:bold;  border:none; color " readonly >
    <input type="file" name="q3" id="q3"  style="font-size: 9pt">
     <br>
                 
                   <hr>         
<div class="row">
    <div class="col-sm-3" style="background-color:white;">
      DELIVERY SCHEDULE <br>
         <INPUT id="9" align="align-items-center"  placeholder=" e.g 15-30 Days "  size="30"  style="font-size: 10pt; text-align: center;" required type="text" name="ds"/>
      
    </div>
    <div class="col-sm-3" style="background-color:white;">
       PAYMENT TERMS <br>
         <TEXTAREA rows="4" cols="40" id="9"    style="font-size: 10pt; text-align: left;" required type="text" name="pterm" >  </TEXTAREA>
    </div>
    <div class="col-sm-3" style="background-color:white;">
      PREFFERED TRANSPORT <br>
         <INPUT id="9" align="align-items-center"  placeholder=" Preffered Transport"  size="30"  style="font-size: 10pt; text-align: center;" required type="text" name="ptr"/>
    </div>
    <div class="col-sm-3" style="background-color:white;">
      REQUESTED BY<br>
         <INPUT id="9" align="align-items-center"  placeholder=" Requester Name/Segment."  size="30"  style="font-size: 10pt; text-align: center;" required type="text" name="rb"/>
    </div>

  </div>








  <br>
  <input style="color:white; font-size: 10pt; background-color: black; class="btn btn-primary" type="submit" name="all">
  <INPUT type="button" style="color:white; font-size: 10pt; background-color: black; class="btn btn-primary" value="Add More 10+"  onclick="addRow('dataTable')" />
</form>


<script type="text/javascript">
  
window.onload=addRow('dataTable');


</script>


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