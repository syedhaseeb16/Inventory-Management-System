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

     
       // document.getElementById("11").hidden="hidden";

          


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
  //alert("test id"+idname);

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
        <a class="nav-link" href="..\enduser\enduser.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item ">
        <a class="nav-link" href="..\enduser\place_order.php">
          <i class="fas fa-shipping-fast"></i>
          <span>Place Request</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="..\enduser\draft.php">
          <i class="fas fa-shipping-fast"></i>
          <span>Drafts</span></a>
      </li>


              <!-- Nav Item - Charts -->
         <li class="nav-item">
        <a class="nav-link" href="..\enduser\orderhistory.php">
          <i class="fas fa-box"></i>
          <span>Requests History </span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="inventory_status.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Inventory Status</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="..\enduser\reqnewitem.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Request for New Item</span></a>
      </li>
           
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
                                            
                                              




          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h5 style="color: black" >Place Your Request:</h5>
      
          </div>


                                            
<form action="getdata.php?id=<?php echo $ido; ?> "   method="post">
  
  <p style="color:black ; " >Project :&nbsp;<INPUT id="project" placeholder="Purpose of order" value="<?php echo $_GET['project'];?>" size="60" style="font-size: 10pt"  type="text" name="project"/>&nbsp;&nbsp;DoD : <INPUT id="date"  value="<?php echo $_GET['dod']; ?>" size="6" type="date" required style="font-size: 10pt"  name="dod" placeholer="DOD"/>
 
  </p>

<script type="text/javascript">var x=1;</script>

  <TABLE>
    <tr bgcolor="">
      <th><input type="text" size="1" hidden="hidden" value="" style="font-size: 10pt ;font-weight:bold;  border: none; " ></th>
      <th><input type="text" size="16" value="Product Name" style="font-size: 10pt ;font-weight:bold;  border: none; " > </th>
      <th><input type="text" size="15" value="Part#" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " > </th>
      <th><input type="text" size="61" value="Description" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="5" value="QTY" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="6" value="UOM" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="5" value="A.QTY" style="font-size: 10pt ;font-weight:bold;  border: none;  " ></th>
    </tr>
 <?php  
                       include('config.php');
                        $s="select * from draftitems";
                        $q=mysqli_query($conn,$s); 
                        $cdi=0;
                            while($ro=mysqli_fetch_array($q))
                            {
                             // echo $ro['req_no'],"-",$_GET['idd'];
                             if((int)$ro['req_no']==(int)$_GET['idd'] ){
                             
                                  $cdi++;
                             }
                          
                           }

                           $check=0;
                           ?> 



  </TABLE>

  <TABLE  id="dataTable" >




<TR>
      <TD><INPUT size="1" type="text" hidden="hidden" value="1" name="chk" id="00"/></TD>
  

                <TD><input id="aa" value="" size="15" style="font-size: 10pt" placeholder="P. Name" name="pname[]" type="text" list="pname"  onchange="setvalues(this.id,this.value)" /> 

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

             <TD><input id="" value="" size="15" placeholder="part #" style="font-size: 10pt" name="pcode[]" type="text" list="pcode" onchange="setvaluesc(this.id,this.value)" /> 
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
         
      <TD><INPUT id="" placeholder="Description" style="font-size: 10pt ; " size="60" readonly value=""  type="text" name="dis[]"/></TD>
      
          
      <TD><INPUT id=""  placeholder="QTY" value="<?php echo  $ro['product_qty']; ?>" size="5"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
      <TD><INPUT id="" placeholder="UOM" value="" style="font-size: 10pt" size="5" type="text" readonly name="unit[]"/></TD>
      
      <TD><INPUT id="" placeholder="A.Qty" value="" size="5" style="font-size: 10pt" readonly type="text" name="aqty[]"/></TD>
      <TD><input  type="button" style="font-size: 6pt ; " style="font-size: 10pt" class="btn btn-primary" value="DeleteRow"  onclick="deleteRow(this)"/></TD>
    </TR>





























     <?php 
      if($check<=$cdi){
                       include('config.php');
                        $s="select * from draftitems";
                        $q=mysqli_query($conn,$s); 
                        $colid=1;
                            while($ro=mysqli_fetch_array($q))
                            {
                             // echo $ro['req_no'],"-",$_GET['idd'];
                             if((int)$ro['req_no']==(int)$_GET['idd'] ){
                             // echo $ro['req_no'],$_GET['idd'],"tt";
                              $check++;
                           ?> 
    

    <TR>
      <TD><INPUT size="1" type="text" hidden="hidden" value="1" name="chk" id="00"/></TD>
  

                <TD><input id="<?php echo $colid; $colid++; ?>" value="<?php echo $ro['product_name']; ?>" size="15" style="font-size: 10pt" placeholder="P. Name" name="pname[]" type="text" list="pname"  onchange="setvalues(this.id,this.value)" /> 









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
      
          
      <TD><INPUT id="<?php echo $colid; $colid++; ?>"  placeholder="QTY" value="<?php echo  $ro['product_qty']; ?>" size="5"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
      <TD><INPUT id="<?php echo $colid; $colid++; ?>" placeholder="UOM" value="" style="font-size: 10pt" size="5" type="text" readonly name="unit[]"/></TD>
      
      <TD><INPUT id="<?php echo $colid; $colid=$colid+5; ?>" placeholder="A.Qty" value="" size="5" style="font-size: 10pt" readonly type="text" name="aqty[]"/></TD>
      <TD><input  type="button" style="font-size: 6pt ; " style="font-size: 10pt" class="btn btn-primary" value="DeleteRow"  onclick="deleteRow(this)"/></TD>
    </TR>


    <script type="text/javascript">
xyz(x);
 x=x+10;

</script>

<?php
if($cdi>=$check)
{
?>


<?php


}

}



}
}
?>








<?php  ?>




  </TABLE>


                 
                            


  <br>
    <input style="font-size: 10pt" class="btn btn-primary" type="submit" name="Draft" value="Save Draft">
  <input style="font-size: 10pt" class="btn btn-primary" type="submit" name="alld" value="Submit Request">
  <INPUT type="button" style="font-size: 10pt " value="Add More 10+" class="btn btn-primary" onclick="addRow('dataTable')" />
</form>


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

}
 ?>

  