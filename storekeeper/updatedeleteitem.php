

<?php
//to delete and update item one  by one change qty e.g

if(isset($_GET['idel'])){
	
include('../config.php');
$on= $_GET['idel'];
$pname= $_GET['pname'];
$pcode= $_GET['pcode'];

$pcode=urldecode($pcode);
echo $pcode;
	
		$q="DELETE   FROM order_item_detail WHERE order_no='$on' AND pcode='$pcode'";
		$q=mysqli_query($conn,$q); 


		if($q)
            {//	session_start();
               // $_SESSION['subsucc'] = "Your draft has been deleted Successfully.";
                header("LOCATION:powork1.php?idd=$on");

			//echo "string";
            }
   		
		else
		{
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}

  
}




if(isset($_GET['delete'])){
	
include('../config.php');
$on= $_GET['delete'];


$pcode=urldecode($pcode);

	
		$q="DELETE   FROM order_item_detail WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 
		$q="DELETE   FROM orders WHERE fullpo='$on'";
		$q=mysqli_query($conn,$q); 
		$q="DELETE   FROM approval_chain WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 


		if($q)
            {//	session_start();
               // $_SESSION['subsucc'] = "Your draft has been deleted Successfully.";
                header("LOCATION:poip.php");
			//echo "string";
            }
   		
		else
		{
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}

  
}

//to handle store keeper

if(isset($_POST['astk'])){
	//echo "return r1 is running";
	
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET stk='ok', m1a='r', stkremarks='$re' ,fa='processing'  WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 
		if($q)
            {	session_start();
                $_SESSION['isssus'] = " Submitted Successfully.";
                header("LOCATION:poip.php");
			//echo "string";
            }
   				else
		{
			echo "Error: " . $q . "<br>" . $conn->error;
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}

}

//------------------------------------close order-----
include('../config.php');
if(isset($_POST['close'])){
include('../config.php');

$rn=$_GET['update'];
echo $rn;
		date_default_timezone_set("Asia/Karachi");
		$dop =  date("j-n-Y") ;
$l=0;
$s=sizeof($_POST['aqty']);
while ($l< $s) {
	# code...

  $sqll="UPDATE order_item_detail SET precieved='".$_POST['aqty'][$l]."' , unitpricen='".$_POST['unitpricen'][$l]."'   WHERE order_no = '".$rn."' and ( pname = '".$_POST['pname'][$l]."' or  pcode = '".$_POST['pcode'][$l]."') " ; 
  $conn->query($sqll);
  
  $pname = $_POST['pname'][$l];
  $pcode = $_POST['pcode'][$l];
  $pqty = $_POST['aqty'][$l];

  $sqls = "INSERT INTO store_inward (dop,product_name,product_code,po_no,qty)
  VALUES ('$dop','$pname','$pcode','$rn','$pqty')";

	if ($conn->query($sqls) === TRUE) {
	  //  echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $sqls . "<br>" . $conn->error;
	}



  $sqlq="SELECT * from current_state WHERE item_name = '".$pname."' or  item_code = '".$_POST['pcode'][$l]."' "  ; 

  $result=mysqli_query($conn,$sqlq); 
  $row = mysqli_fetch_array($result);


    $updatedqty=$row['qty']+$_POST['aqty'][$l];
    $sqlup="UPDATE current_state SET qty='".$updatedqty."' WHERE item_name = '".$_POST['pname'][$l]."' or  item_code = '".$_POST['pcode'][$l]."'" ; 
  $conn->query($sqlup);




$l++;
   }




	
		$q = "UPDATE approval_chain SET fa='closed'  WHERE order_no='$rn'";
		$q=mysqli_query($conn,$q); 
		if($q)
            {	session_start();
                $_SESSION['isssus'] = " order Closed .";
                header("LOCATION:poip.php");
			//echo "string";
            }
   				else
		{
			echo "Error: " . $q . "<br>" . $conn->error;
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}







}

































  ?>