

<?php
//to handle manager 1--------------------------------------------------------***********************

if(isset($_POST['rm1'])){
	echo "return r1 is running";
	
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET stk='r', m1a='r', m1remarks='$re' ,fa='processing'  WHERE order_no='$on'";
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


if(isset($_POST['am1'])){
	echo "return r1 is running";
	
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET  m1a='ok', m1remarks='$re' ,fa='processing'  WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 
		if($q)
            {session_start();
                $_SESSION['isssus'] = " Approval successfully submitted";
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












if(isset($_POST['am1f'])){
	//echo "aopproval r1 is running";
include('../config.php');
$on= $_GET['update'];
$re= $_POST['remarksm1'];

	
		$q = "UPDATE approval_chain SET  m1a='ok' , m1remarks='$re' ,fa='approved'  WHERE order_no='$on'";
		$q=mysqli_query($conn,$q); 

		if($q)
            {session_start();
                $_SESSION['isssus'] = " Approval successfully submitted";
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

//to handle manager 1----------------------------------END----------------------***********************


//to handle manager 2--------------------------------------------------------***********************



























  ?>