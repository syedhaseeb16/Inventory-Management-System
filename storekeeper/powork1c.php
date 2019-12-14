<?php  
session_start();
if(isset($_SESSION["id"])&&isset($_SESSION["type"])==2)
                   {
                    ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <script>

</script>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>End User</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

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

 /*   function deleteRows(tableID) {
      try {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;

      for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if(null != chkbox && true == chkbox.checked) {
          if(rowCount <= 1) {
            alert("Cannot delete all the rows.");
            break;
          }
          table.deleteRow(i);
          rowCount--;
          i--;
        }

      }
      }catch(e) {
        alert(e);
      }


      try {
      var table = document.getElementById(tableID);
      var rowCount = table.rows.length;

      for(var i=0; i<rowCount; i++) {
        var row = table.rows[i];
        var chkbox = row.cells[0].childNodes[0];
        if(null != chkbox && true == chkbox.checked) {
          if(rowCount <= 1) {
            alert("Cannot delete all the rows.");
            break;
          }
          table.deleteRow(i);
          rowCount--;
          i--;
        }


      }
      }catch(e) {
        alert(e);
      }

    } */

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
  alert("Minimum one row is Required");
}
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

function sumof()

{
  //alert("ssds");
  var sum=0;

for(var i=8; i<500; i=i+10) {
  var j=i-4;
  if(document.getElementById(i)!=null)
    sum=sum+Number(document.getElementById(i).value)*Number(document.getElementById(j).value);

}
  document.getElementById("totalall").value=sum;

}







  </SCRIPT>

<script type="text/javascript">
function xyz(x) {
  // body...

 
  var idname=document.getElementById(x).id;
  idname=parseInt(idname);
  var pname=document.getElementById(x).value;

  //alert(idname+" -" + pname);
  
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
</script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="..\enduser\enduser.php">  
        <i class='fas fa-warehouse'></i>
        <div class="sidebar-brand-text mx-3">ISS Store <sup></sup></div>
      </a>

      <!-- Divider -->
       <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="..\storekeeper\storekeeper.php"">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>


      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="pending_order.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Pending Requests</span></a>
      </li>

        <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="orderhistory.php">
          <i class="fas fa-box"></i>
          <span>Requests History</span></a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="poip.php">
          <i class="fas fa-box"></i>
          <span>P/O in Process</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="poc.php">
          <i class="fas fa-box"></i>
          <span>P/O Completed</span></a>
      </li>



      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="place_order.php">

          <i class="fas fa-shipping-fast"></i>
          <span>Place Order</span></a>
      </li>
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-dolly"></i>
          <span>Transations</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Transtions</h6>
            <a class="collapse-item" href="utilities-color.html">Inward Transtions</a>
            <a class="collapse-item" href="utilities-color.html">Outward Transtions</a>
            <a class="collapse-item" href="utilities-border.html">Submissions</a>
  
          </div>
        </div>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="inventory_status.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inventory Status</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>update Inventory</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-address-book"></i>
          <span>Vendor</span></a>
      </li>
      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-address-book"></i>
          <span>Add New Vendor</span></a>
      </li>
            <!-- Nav Item - Tables -->
      
        <!-- Divider -->
      <hr class="sidebar-divider">



      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button hidden="hidden" class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
               <div class="input-group-append">

              
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

          

            

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php   echo $_SESSION["id"];   $ido=$_SESSION["id"]; ?></span>
              
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
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
                                            
                                              




          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h8 style="color: black" >Order # <?php echo $_GET['idd']; ?></h8>
            
          </div>
          <div>
          <h8 style="color: black" >
             <a href='pogeneration.php?idd=<?php echo $_GET['idd']; ?> '>Download PO  </a></h8>
             </div>
<?php 
                        include('config.php');
                        $s="select * from orders";
                        $q=mysqli_query($conn,$s); 
                        
                            while($ro=mysqli_fetch_array($q))
                            {
                              $oidc=$ro['segment']."/".$ro ['order_no'];
                              if($oidc==$_GET['idd']){

                           $project=$ro['message'];
                           $dod=$ro['dod'];
                           $otype=$ro['ordertype'];
                           $segment=$ro['segment'];

                             }
                          
                           }



 ?>
 <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h8 style="color: black;  " >Order Type: <?php echo $otype; ?></h8>
          </div>

                                            
<form action="getdata.php?id=<?php echo $ido; ?> "   method="post" enctype="multipart/form-data">
  <script type="text/javascript">var x=1;</script>
  <p style="color:black ; " >Project :&nbsp;<INPUT id="project" placeholder="Purpose of order" value="<?php  echo $project ?>" size="60" style="font-size: 10pt"  type="text" name="project"/>&nbsp;&nbsp;DoD : <INPUT id="date"  value="<?php  echo $dod; ?>" size="6" type="date" required style="font-size: 10pt"  name="dod" placeholer="DOD"/>
    &nbsp;&nbsp; 
    Segment:


    <input list="segment"  value="<?php  echo $segment ?>" style="font-size: 10pt" name="segment">
     <DATALIST id="segment">
        <option value="WSS">WSS</option>
      <option value="WSO" >WSO</option>
       <option value="HMS">HMS</option>
      <option value="POF" >POF</option>
   </DATALIST> 
    &nbsp;&nbsp; 
    
 
  </p>
  <TABLE>
    <tr bgcolor="">
     <th><input type="text" size="1" hidden="hidden" value="" style="font-size: 10pt ;font-weight:bold;  border: none; " ></th>
      <th><input type="text" size="16" value="Product Name" style="font-size: 10pt ;font-weight:bold;  border: none; " > </th>
      <th><input type="text" size="17" value="Part#" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " > </th>
      <th><input type="text" size="60" value="Description" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="7" value="Req.Qty" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="5" value="UOM" style="font-size: 10pt ;font-weight:bold;  border: none;  " ></th>
      <th><input type="text" size="7" value="Av.Qty" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="12" value="Vendor" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="8" value="U.Price" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
    </tr>
  </TABLE>







                          <?php   //to count no of rows for data
                       include('config.php');
                        $s="select * from order_item_detail";
                        $q=mysqli_query($conn,$s); 
                        $cdi=0;
                            while($ro=mysqli_fetch_array($q))
                            {
                             // echo $ro['req_no'],"-",$_GET['idd'];
                             if($ro['order_no']==$_GET['idd']){
                             
                                  $cdi++;
                             }
                          
                           }
                           //echo $cdi;
                           $check=0;//check no of rows that will print 

                        $sql="SELECT * from orders" ; 

                    $result=mysqli_query($conn,$sql); 
                   while( $row = mysqli_fetch_array($result))
                   {

                   $oidc=$row['segment']."/".$row ['order_no'];
                    if($oidc==$_GET['idd']){

                     $vendor =$row['vendor'];
                    }

                   }






                           ?> 












  <TABLE  id="dataTable" >
    
                         <?php 
                         $colid=1;
                          if($check<=$cdi){
                        include('config.php');
                        $s="select * from order_item_detail";
                        $q=mysqli_query($conn,$s); 
                        $cdi=0;
                            while($ro=mysqli_fetch_array($q))
                            {
                               if($ro['order_no']==$_GET['idd']){

                              ?>

    <TR>
      <TD><INPUT size="1" type="text" hidden="hidden" value="1" name="chk" id="00"/></TD>
  

                <TD><input id="<?php echo $colid; $colid++; ?>" value="<?php echo $ro['pname']; ?>"" size="15" style="font-size: 10pt" placeholder="P. Name" name="pname[]" type="text" list="pname" onchange="setvalues(this.id,this.value)" /> 
            <?php  
            include('config.php');
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

             <TD><input id="<?php echo $colid; $colid++; ?>" value="" size="15" placeholder="part #" style="font-size: 10pt" name="pcode[]" type="text" list="pcode" onchange="setvaluesc(this.id,this.value)" /> 
            <?php  
            include('config.php');
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
         
      <TD><INPUT id="<?php echo $colid; $colid++; ?>" placeholder="Description" style="font-size: 10pt ; " size="60" readonly value=""  type="text" name="dis[]"/></TD>
      
          
      <TD><INPUT id="<?php echo $colid; $colid++; ?>"  placeholder="QTY" value="<?php echo $ro['pqty']; ?>"" size="5"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
      <TD><INPUT id="<?php echo $colid; $colid++; ?>" placeholder="UOM" value="" style="font-size: 10pt" size="5" type="text" readonly name="unit[]"/></TD>
      
      <TD><INPUT id="<?php echo $colid; $colid++; ?>" placeholder="A.Qty" value="" size="5" style="font-size: 10pt" readonly type="text" name="aqty[]"/></TD>


      <TD><input id="<?php echo $colid; $colid=$colid++; ?>" value="<?php echo $vendor; ?>" size="15" placeholder="Vendor" style="font-size: 10pt" name="vendor[]" type="text" list="vendor" /> 
            <?php  
            include('config.php');
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
                  </TD>  


      <TD><INPUT id="<?php echo $colid; $colid=$colid+4; ?>" placeholder="Quotation" value="<?php echo $ro['unitprice']; ?>" size="8" style="font-size: 10pt" onfocusout="sumof()" type="text" name="prize[]"/></TD>

      <TD><input  type="button" style="font-size: 6pt ; " style="font-size: 10pt; font-style: bold" class="btn btn-primary" value="DeleteRow"  onclick="deleteRow(this)"/></TD>
    </TR>
   <script type="text/javascript">
xyz(x);
 x=x+10;

</script>
        <?php

        $check++;
      }}}

          ?>


  </TABLE>
  <div align="right" style=" width:89%;">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font style="color: black;">Total:</font> &nbsp;<INPUT  align="align-items-center" id="totalall" placeholder="total" value="" size="7" style="font-size: 10pt font-weight:bold; text-align: center; border size: 2: ; border-color:black ; " readonly type="text" name=""/>
</div>
  
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <input type="text" id="dcrl" size="7" value="Quotation 1:" name="" style="font-size: 9pt ;font-weight:bold;  border:none; color " readonly >
    <input type="file" name="q1" id="q1"  style="font-size: 9pt">
    
     <input type="text" id="dcrl" size="7" value="Quotation 2:" name="" style="font-size: 9pt ;font-weight:bold;  border:none; color " readonly >

    <input type="file" name="q2" id="q2"  style="font-size: 9pt">
     <input type="text" id="dcrl" size="7" value="Quotation 3:" name="" style="font-size: 9pt ;font-weight:bold;  border:none; color " readonly >
    <input type="file" name="q3" id="q3"  style="font-size: 9pt">
     <br>
                 
                            


  <br>
  <?php 
include('config.php');
$sql="SELECT * from approval_chain WHERE order_no = '".$_GET['idd']."'" ; 

$result=mysqli_query($conn,$sql); 
$rod = mysqli_fetch_array($result);
  if ($rod['stk']=='r'){ ?>
  <input style="font-size: 10pt" class="btn btn-primary" type="submit" value="Submit changes" name="changes"><?php } 
 
 if($rod['m1a']!='0' && $rod['m2a']!='0' && $rod['m3a']!='0')
                    {
                      if($rod['m1a']=='ok' && $rod['m2a']=='ok' && $rod['m3a']=='ok'){?>
                      <td>
                      <input style="font-size: 10pt" class="btn btn-primary" type="submit" value="Generate P/O Email" name="approved">
                        
                      </td>
                    
                      
                   <?php  }


                 }
                 if($rod['m1a']!='0' && $rod['m2a']!='0' && $rod['m3a']=='0')
                    {
                      if($rod['m1a']=='ok' && $rod['m2a']=='ok' ){?>
                      <td>
                      <input style="font-size: 10pt" class="btn btn-primary" type="submit" value="Generate P/O Email" name="approved">
                        
                      </td>
                    
                      
                   <?php  }


                 } 

                 if($rod['m1a']!='0' && $rod['m2a']=='0' && $rod['m3a']=='0')
                    {
                      if($rod['m1a']=='ok' ){?>
                      <td>
                      <input style="font-size: 10pt" class="btn btn-primary" type="submit" value="Generate P/O Email" name="approved">
                        
                      </td>
                    
                      
                   <?php  }


                 }?>















 <!-- <INPUT type="button" style="font-size: 10pt " value="Add More 10+" class="btn btn-primary" onclick="addRow('dataTable')" />-->
</form>


                      <?php  

                          $s="select * from orders";
                        $qg=mysqli_query($conn,$s); 
                        
                            while($rg=mysqli_fetch_array($qg))
                            {
                              $oidc=$rg['segment']."/".$rg ['order_no'];
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





                    
                  
                  




                       include('config.php');
                        
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





<script type="text/javascript">
  
//window.onload=addRow('dataTable');


</script>


          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

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
          <a class="btn btn-primary" href="//localhost/inventoryiss/index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>
<SCRIPT language="javascript">
window.onload = function(){
  document.getElementById("sidebarToggle").click();
}
</SCRIPT>

</html>
<?php 

unset($_SESSION['subsucc']);
unset($_SESSION["order_submitted"]);

}
 ?>

