
<?php

if(isset($_GET['q'])){
	$q=$_GET['q'];
include('../config.php');
$sql="SELECT * from current_state WHERE item_name = '".$q."' or  item_code = '".$q."'" ; 

$result=mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);
  		$a=$row['item_name'] ;
   		$b=$row['item_code'] ;
 		$c= $row['unit'] ;
 	 	$d=  $row['Discreption'];
   		$e= $row['qty'];
   		 $data=array($a,$b,$c,$d,$e);
   echo json_encode($data);
}























if(isset($_POST['alld'])){
include('../config.php');
$uid=$_GET['id'];
$sql="SELECT * from users WHERE user_ids = '".$uid."'" ; 

$result=mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);
  		$department=$row['User_Department'];
		$Uemail=$row['User_Email_Address'];
		$Uname=$row['User_Name']; 		

		$dod = $_POST['dod'];
		$project = $_POST['project'];
		$pname = $_POST['pname'];
		$tpcode = $_POST['pcode'];
		$unit = $_POST['unit'];
		$qty = $_POST['qty'];
		$dis = $_POST['dis'];
		$at = $_POST['aqty'];
		$dateoforder =  date("D-M-Y") ;
		$status="Pending";

		if($_POST['qty'][1]!=""){  
	$sql = "INSERT INTO users_requests (user_name,user_email,req_dep,dod,dor,message,status)
	VALUES ('$uid','$Uemail','$department','$dod','$dateoforder','$project','$status')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}



		$s="select req_no from users_requests";
        $q=mysqli_query($conn,$s); 

            $storeArray = array();
         while($ro=mysqli_fetch_array($q)){
                  array_push($storeArray,$ro['req_no']);
            }
         $largestNumber=(max($storeArray));
         echo $largestNumber;
         echo count($qty);
         $i=1;
         $qj="";



			$flag=FALSE;
			while($i<$qty)
			{

				if($_POST["qty"][$i]=="")
				{
					break;
				}
  		   $query = "INSERT INTO user_request_item  (ReqNo,ProductName,ProductCode,ProductQty,ProductUnit) VALUES";

  		     if($qj!="") {
                    $qj .= ",";
                }

  		   $qj.="('$largestNumber','" . $_POST["pname"][$i] . "', '" . $_POST["pcode"][$i] . "','" . $_POST["qty"][$i] . "','" . $_POST["unit"][$i] . "')";
  		   $sq=$query.$qj;		
            $i++;
        }

        if ($conn->query($sq) === TRUE) {
            	$flag=TRUE;

              // echo " <meta http-equiv='refresh' content='0;URL='end_user_form.php' />";
               // echo "<meta http-equiv='refresh' content='3;url=end_user_form.php'>";
            } 


            if($flag==TRUE)
            {	session_start();
                $_SESSION['subsucc'] = "Your Request has been submitted Successfully.";
                header("LOCATION:placerequest.php");

            }

       
	
		}
		else
		{
				session_start();
                $_SESSION['subsucc'] = "Please enter form correctly.";
                header("LOCATION:placerequest.php");
		}

	}



















if(isset($_POST['all'])){
include('../config.php');
$uid=$_GET['id'];
$sql="SELECT * from users WHERE User_Id = '".$uid."'" ; 

$result=mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);
  		$department=$row['User_Segment'];
  		$Company=$row['Company'];
		$Userids=$row['User_Id'];
		$uname=$row['User_Name']; 		

		$dod = $_POST['dod'];
		$dod = date("d-m-Y", strtotime($dod));
		$project = $_POST['project'];
		$pname = $_POST['pname'];
		$tpcode = $_POST['pcode'];
		$unit = $_POST['unit'];
		$qty = $_POST['qty'];
		$dis = $_POST['dis'];
		$at = $_POST['aqty'];
		date_default_timezone_set("Asia/Karachi");
		$dateoforder =  date("j-n-Y") ;
	//	$dateoforder = date("j-n-y", strtotime($dateoforder));




		$status="aps";

		if($_POST['qty'][0]!=""){  
	$sql = "INSERT INTO users_requests (UserName,UserId,ReqSegment,ReqCompany,DORequirement,DORequest,Project,Fstatus,Supervisor)
	VALUES ('$uname','$Userids','$department','$Company','$dod','$dateoforder','$project','$status','$uname')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}



		$s="select ReqNo from users_requests";
        $q=mysqli_query($conn,$s); 

            $storeArray = array();
         while($ro=mysqli_fetch_array($q)){
                  array_push($storeArray,$ro['ReqNo']);
            }
         $largestNumber=(max($storeArray));
         echo $largestNumber;
         echo count($qty);
         $i=0;
         $qj="";



			$flag=FALSE;
			while($i<$qty)
			{

				if($_POST["qty"][$i]=="")
				{
					break;
				}
  		   $query = "INSERT INTO user_request_item  (ReqNo,ProductName,ProductCode,ProductQty,ProductUnit) VALUES";

  		     if($qj!="") {
                    $qj .= ",";
                }

  		   $qj.="('$largestNumber','" . $_POST["pname"][$i] . "', '" . $_POST["pcode"][$i] . "','" . $_POST["qty"][$i] . "','" . $_POST["unit"][$i] . "')";
  		   $sq=$query.$qj;		
            $i++;
        }

        if ($conn->query($sq) === TRUE) {
            	$flag=TRUE;

              // echo " <meta http-equiv='refresh' content='0;URL='end_user_form.php' />";
               // echo "<meta http-equiv='refresh' content='3;url=end_user_form.php'>";
            } 	else
		{ 
	    echo "Error: " . $sql . "<br>" . $conn->error;
	

			echo "else part";
		}


            if($flag==TRUE)
            {	session_start();
                $_SESSION['subsucc'] = "Your Request has been submitted Successfully.";
                header("LOCATION:placerequest.php");

            }

       
	
		}
		else
		{ 
	    echo "Error: " . $sql . "<br>" . $conn->error;
	

				session_start();
                $_SESSION['subsucc'] = "Please enter form correctly.";
                header("LOCATION:placerequest.php");
		}

	}




//----start of draft
if(isset($_POST['Draft'])){
include('../config.php');
$uid=$_GET['id'];
$sql="SELECT * from users WHERE User_Id = '".$uid."'" ; 

$result=mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);
  		$department=$row['User_Segment'];
  		$Company=$row['Company'];
		$Userids=$row['User_Id'];
		$uname=$row['User_Name']; 		

		$dod = $_POST['dod'];
		$dod = date("d-m-Y", strtotime($dod));
		$project = $_POST['project'];
		$pname = $_POST['pname'];
		$tpcode = $_POST['pcode'];
		$unit = $_POST['unit'];
		$qty = $_POST['qty'];
		$dis = $_POST['dis'];
		$at = $_POST['aqty'];
		date_default_timezone_set("Asia/Karachi");
		$dateoforder =  date("j-n-Y") ;
	//	$dateoforder = date("j-n-y", strtotime($dateoforder));




		$status="Pending";

		if($_POST['qty'][0]!=""){  
	$sql = "INSERT INTO draftby (UserName,UserId,ReqSegment,ReqCompany,DORequirement,DORequest,Project,Fstatus)
	VALUES ('$uname','$Userids','$department','$Company','$dod','$dateoforder','$project','$status')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}



		$s="select ReqNo from draftby";
        $q=mysqli_query($conn,$s); 

            $storeArray = array();
         while($ro=mysqli_fetch_array($q)){
                  array_push($storeArray,$ro['ReqNo']);
            }
         $largestNumber=(max($storeArray));
         echo $largestNumber;
         echo count($qty);
         $i=0;
         $qj="";



			$flag=FALSE;
			while($i<$qty)
			{

				if($_POST["qty"][$i]=="")
				{
					break;
				}
  		   $query = "INSERT INTO drafteditems  (ReqNo,ProductName,ProductCode,ProductQty,ProductUnit) VALUES";

  		     if($qj!="") {
                    $qj .= ",";
                }

  		   $qj.="('$largestNumber','" . $_POST["pname"][$i] . "', '" . $_POST["pcode"][$i] . "','" . $_POST["qty"][$i] . "','" . $_POST["unit"][$i] . "')";
  		   $sq=$query.$qj;		
            $i++;
        }

        if ($conn->query($sq) === TRUE) {
            	$flag=TRUE;

              // echo " <meta http-equiv='refresh' content='0;URL='end_user_form.php' />";
               // echo "<meta http-equiv='refresh' content='3;url=end_user_form.php'>";
            } 	else
		{ 
	    echo "Error: " . $sql . "<br>" . $conn->error;
	

			echo "else part";
		}


            if($flag==TRUE)
            {	session_start();
                $_SESSION['subsucc'] = "Your Draft  has been saved Successfully.";
                header("LOCATION:draft.php");

            }

       
	
		}
		else
		{ 
	    echo "Error: " . $sql . "<br>" . $conn->error;
	

				session_start();
                $_SESSION['subsucc'] = "Please enter form correctly.";
                header("LOCATION:placerequest.php");
		}

	}




//---end of draft



//delete draft

if(isset($_GET['idd'])){
	$draftid=$_GET['idd'];
include('../config.php');

		$del_profile=$_GET['idd'];
		$q="DELETE FROM draftby WHERE ReqNo='$del_profile'";
		$q=mysqli_query($conn,$q); 
		$q="DELETE FROM drafteditems WHERE ReqNo='$del_profile'";
		$q=mysqli_query($conn,$q); 
		

		if($q)
            {	session_start();
                $_SESSION['subsucc'] = "Your draft has been deleted Successfully.";
                header("LOCATION:draft.php");

            }

       
	
		
		else
		{
				session_start();
                $_SESSION['subsucc'] = "draft not saved.";
                header("LOCATION:draft.php");
		}



}

//delete draft






 ?>







   

