

<?php
//to handle manager 1--------------------------------------------------------***********************

if(isset($_POST['rm2'])){
//	echo "return r1 is running";
	
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET m2a='r', m1a='r', m2remarks='$re' ,fa='processing'  WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 
		if($q)
            {session_start();
                $_SESSION['isssus'] = " Returened to previous Level.";
                header("LOCATION:poip.php");
            }
   				else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}

}

//


if(isset($_POST['am2'])){
	echo "return r1 is running";
	
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET  m2a='ok', m2remarks='$re' ,fa='processing'  WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 
		if($q)
            {session_start();
                $_SESSION['isssus'] = " Approval successfully submitted";
                header("LOCATION:poip.php");
			//echo "string";
            }
   				else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}

}












if(isset($_POST['am2f'])){
	//echo "aopproval r1 is running";
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET  m2a='ok' , m2remarks='$re' ,fa='approved'  WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 

		if($q)
            {session_start();
                $_SESSION['isssus'] = " Approval successfully submitted";
                header("LOCATION:poip.php");
			//echo "string";
            }
   		
		else
		{
			echo "Error: " . $sql . "<br>" . $conn->error;
			//	session_start();
             //   $_SESSION['subsucc'] = "draft not saved.";
            //    header("LOCATION:draft.php");
		}

}

//to handle manager 1----------------------------------END----------------------***********************


//to handle manager 2--------------------------------------------------------***********************



























  ?>