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

      for(var i=0; i<colCount+1; i++) {

        var newcell = row.insertCell(i);

        newcell.innerHTML = table.rows[1].cells[i].innerHTML;
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



  </SCRIPT>

  <title>Place Request</title>

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
      <li class="nav-item ">
        <a class="nav-link" href="enduser.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown active">
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

          <div class="d-sm-flex align-items-center justify-content-between mb-1">
            <h5 style="color: black" >Place Your Request:</h5>
      
          </div>
<?php
  $ido=$_SESSION["id"];
  ?>


        <!-- Icon Cards-->
 <form action="getdata.php?id=<?php  echo $ido; ?> "   method="post">
  
  <p style="color:black ; " >Project Name :&nbsp;<INPUT id="project" placeholder="Project Name" value="" size="60" style="font-size: 10pt"  type="text" name="project"/>&nbsp;&nbsp;  Required on : <INPUT id="date"   size="6" type="date"  style="font-size: 10pt"  name="dod" placeholer="DOD"/>




  

                Supervisor:<input id="1" value="" size="15" style="font-size: 10pt" placeholder="Supervisor" name="super" type="text" list="super"  /> 
            <?php  
            include('../config.php');
            $s1="SELECT * from users "; 
            $q1=mysqli_query($conn,$s1); 
            ?>
            <datalist   id="super">
                <?php 
               while($ro1=mysqli_fetch_array($q1)){
                if($ro1['supervisor']==2 && $ro1['User_Id']!=$lid){
                $n=$ro1['User_Id'];    

                ?>

              <option  value="<?php echo $n;?>" > <?php echo $n;?> </option>
                <?php
                 }  }                                     
                 ?>  
                  </datalist>

                                  
                  Request From: <select  type="list"  name="fcompany" placeholder="dropdown" >
                                       <option value="IWLS">IWLS</option>
                                      <option value="WLE">WLE</option>
                                   
                                      </select>
                            <br height="10px">


Client Name:&nbsp; &nbsp; <INPUT id="project" placeholder="Client" value="" size="25" style="font-size: 10pt"  type="text" name="client"/>
Well:&nbsp; <INPUT id="project" placeholder="Well" value="" size="25" style="font-size: 10pt"  type="text" name="well"/>
Job:&nbsp;<INPUT id="project" placeholder="Job Name" value="" size="25" style="font-size: 10pt"  type="text" name="job"/>
Purpose:&nbsp;<INPUT id="project" placeholder="Purpose" value="" size="35" style="font-size: 10pt"  type="text" name="purpose"/>
 
  </p>



  <TABLE  id="dataTable" >
        
      <th><input type="text" size="1" hidden="hidden" value="" style="font-size: 10pt ;font-weight:bold;  border: none; " ></th>
      <th><input type="text" size="13" value="Product Name" style="font-size: 10pt ;font-weight:bold;  border: none; " > </th>
      <th><input type="text" size="14" value="Part#" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " > </th>
      <th><input type="text" size="52" value="Description" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="5" value="QTY" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="5" value="UOM" style="font-size: 10pt ;font-weight:bold;  border: none; background: ; " ></th>
      <th><input type="text" size="4" value="A.QTY" style="font-size: 10pt ;font-weight:bold;  border: none;  " ></th>
    

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
         
      <TD><INPUT id="3" placeholder="Description" style="font-size: 10pt ; " size="60" readonly value=""  type="text" name="dis[]"/></TD>
      
          
      <TD><INPUT id="4"  placeholder="QTY" value="" size="5"  type="text" style="font-size: 10pt"  name="qty[]" placeholer="QTY"/></TD>
      <TD><INPUT id="5" placeholder="UOM" value="" style="font-size: 10pt" size="5" type="text" readonly name="unit[]"/></TD>
      
      <TD><INPUT id="6" placeholder="A.Qty" value="" size="5" style="font-size: 10pt" readonly type="text" name="aqty[]"/></TD>


      <TD><input  type="button" id="7"  style="color:white; font-size: .9em; background-color: black; "  value="DeleteRow"  onclick="deleteRow(this)"/></TD>





    </TR>
  </TABLE>

                 
                            


  <br>
   
  <input style="color:white; font-size: 10pt; background-color: black; class="btn btn-primary" type="submit" name="all" value="Submit Request">
   <input style="color:white; font-size: 10pt; background-color: black; class="btn btn-primary" type="submit" name="Draft" value="Save Draft">
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
    

unset($_SESSION['subsucc']);

}              
  ?>