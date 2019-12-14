	<?php  
	include('config.php');
	$ch = "INSERT INTO approval_chain (order_no,stk,m1,m1a)
	VALUES ('$po','ok','m1','r')";

	if ($conn->query($ch) === TRUE) {
	  //  echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $ch . "<br>" . $conn->error;
	}

	?>