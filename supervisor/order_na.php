<?php  
session_start();
if(isset($_SESSION["id"])&&isset($_SESSION["type"])==2)
                   {
 
include('../config.php');

if(isset($_POST['Issue'])){
  $rn=$_GET['rqn'];

$l=0;

while ($l < sizeof($_POST['aqty'])) {
  $sqll="UPDATE user_request_item SET approved_qty='".$_POST['aqty'][$l]."'  WHERE ReqNo = '".$rn."' and ( ProductName = '".$_POST['pname'][$l]."' or  ProductCode = '".$_POST['pcode'][$l]."') " ; 
  $conn->query($sqll);

 $l++;


 }
$sql="UPDATE users_requests SET FStatus='Approved'  WHERE ReqNo = '".$rn."'" ; 
$conn->query($sql);

 session_start();
  $_SESSION['isssus'] = "Request Approved.";
  header("LOCATION:supervisor.php");

            

}


if(isset($_POST['Reject'])){
  	$rn=$_GET['rqn'];
  	$remarks=$_POST['sremarks'];
  	$qty="r";
	$zero=0;
	$s="UPDATE user_request_item SET Qty_s='$qty',  approved_qty='$zero' where ReqNo='$rn'";
	$q=mysqli_query($conn,$s); 
		    


 
	$sql="UPDATE users_requests SET FStatus='Rejected', supervisorRemarks='$remarks'  WHERE ReqNo = '".$rn."'" ; 
	$conn->query($sql);

    session_start();
  	$_SESSION['isssus'] = "Request has been Rejected.";
  	header("LOCATION:supervisor.php");
}
            

}










 ?>

