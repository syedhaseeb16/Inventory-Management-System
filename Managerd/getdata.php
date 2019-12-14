
<?php

//define chain for re chain defination

if(isset($_POST['chain33'])){
	
include('../config.php');
$ordern= $_GET['id'];
$m1n= $_POST['m1'];
$m2n=$_POST['m2'];
$m3n= $_POST['m3'];

  
if($m1n!="" && $m2n!="" && $m3n!="" ){
$sql = "UPDATE approval_chain SET stk='ok',m1='$m1n',m1a='r' ,m2='$m2n',m2a='r' ,m3='$m3n',m3a='r'  WHERE order_no='$ordern'";

	if ($conn->query($sql) === TRUE) {
	    header("LOCATION:poip.php");
	     session_start();
          $_SESSION['crde'] = "Chain has been Redefined";

	} else {

	     header("LOCATION:definechain.php?sid=$ordern");
	     session_start();
          $_SESSION['cnotdefine'] = "Chain is not define correctly.";
	}
}


}


if(isset($_POST['chain22'])){
	
include('../config.php');
$ordern= $_GET['id'];
$m1n= $_POST['m1'];
$m2n=$_POST['m2'];
$m3n= $_POST['m3'];

  
if($m1n!="" && $m2n!=""){
$sql = "UPDATE approval_chain SET stk='ok',m1='$m1n',m1a='r' ,m2='$m2n',m2a='r' ,m3='0',m3a='0'   WHERE order_no='$ordern'";

	if ($conn->query($sql) === TRUE) {
	    header("LOCATION:poip.php");
	     session_start();
          $_SESSION['crde'] = "Chain has been Redefined";

	} else {

	     header("LOCATION:definechain.php?sid=$ordern");
	     session_start();
          $_SESSION['cnotdefine'] = "Chain is not define correctly.";
	}
}


}


if(isset($_POST['chain11'])){
	
include('../config.php');
$ordern= $_GET['id'];
$m1n= $_POST['m1'];
$m2n=$_POST['m2'];
$m3n= $_POST['m3'];

  
if($m1n!="" ){
$sql = "UPDATE approval_chain SET stk='ok',m1='$m1n',m1a='r' ,m2='0',m2a='0' ,m3='0',m3a='0'   WHERE order_no='$ordern'";

	if ($conn->query($sql) === TRUE) {
	    header("LOCATION:poip.php");
	     session_start();
          $_SESSION['crde'] = "Chain has been Redefined";

	} else {

	     header("LOCATION:definechain.php?sid=$ordern");
	     session_start();
          $_SESSION['cnotdefine'] = "Chain is not define correctly.";
	}
}


}









//define chai first

if(isset($_POST['chain3'])){
	echo "c3";
include('../config.php');
$ordern= $_GET['id'];
$m1n= $_POST['m1'];
$m2n=$_POST['m2'];
$m3n= $_POST['m3'];

  
if($m1n!="" && $m2n!="" && $m3n!="" ){
$sql = "INSERT INTO approval_chain (order_no,stk, m1, m1a,m2,m2a,m3,m3a)
	VALUES ('$ordern','ok','$m1n','r','$m2n','r','$m3n','r')";

	if ($conn->query($sql) === TRUE) {
	    header("LOCATION:placeorder.php");
	  //   session_start();
        //  $_SESSION['order_submitted'] = "Order has been placed.";

	} else {

	     header("LOCATION:definechain.php?sid=$ordern");
	     session_start();
          $_SESSION['cnotdefine'] = "Chain is not define correctly.";
	}
}


}




if(isset($_POST['chain2'])){

include('../config.php');
$ordern= $_GET['id'];
$m1n= $_POST['m1'];
$m2n=$_POST['m2'];



if($m1n!="" && $m2n!="" ){
$sql = "INSERT INTO approval_chain (order_no,stk, m1, m1a,m2,m2a)
	VALUES ('$ordern','ok','$m1n','r','$m2n','r')";

	if ($conn->query($sql) === TRUE) {
	   header("LOCATION:placeorder.php");
	    // session_start();
        //  $_SESSION['order_submitted'] = "order has been placed.";

	} else {
	    header("LOCATION:definechain.php?sid=$ordern");
	     session_start();
          $_SESSION['cnotdefine'] = "Chain is not define correctly.";
	}
	}

}


if(isset($_POST['chain1'])){
include('../config.php');
$ordern= $_GET['id'];
$m1n= $_POST['m1'];
if($m1n!="" ){
$sql = "INSERT INTO approval_chain (order_no,stk ,m1, m1a)
	VALUES ('$ordern','ok','$m1n','r')";

	if ($conn->query($sql) === TRUE) {
	    header("LOCATION:placeorder.php");
	    // session_start();
        //  $_SESSION['order_submitted'] = "Order has been placed.";
	//    header("LOCATION:request_products.php");

	} else {
	    header("LOCATION:definechain.php?sid=$ordern");
	     session_start();
          $_SESSION['cnotdefine'] = "Chain is not define correctly.";
	}
	}
}






















































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





if(isset($_POST['all'])){
include('../config.php');
$uid=$_GET['id'];
$sql="SELECT * from users WHERE user_ids = '".$uid."'" ; 

$result=mysqli_query($conn,$sql); 
$row = mysqli_fetch_array($result);
  		$department=$row['User_Department'];
		$Uemail=$row['User_Email_Address'];
		$Uname=$row['User_Name']; 		
		$dod = $_POST['dod'];
		$dod = date("d-m-Y", strtotime($dod));
		$project = $_POST['project'];
		$pname = $_POST['pname'];
		$tpcode = $_POST['pcode'];
		$unit = $_POST['unit'];
		$qty = $_POST['qty'];
		$dis = $_POST['dis'];
		$at = $_POST['aqty'];

		$ctype = $_POST['currency'];
		$drate = $_POST['dcrv'];
		$ven = $_POST['vendor'];
		$qou = $_POST['prize'];
		$segment = $_POST['segment'];
		$company = $_POST['company'];
		$ot = $_POST['ot'];
	$ds = $_POST['ds'];
		$pterm = $_POST['pterm'];
		$ptr = $_POST['ptr'];
		$rb = $_POST['rb'];






 	





		//Get the content of the image and then add slashes to it 
	





		if ($ctype=="Pkr")
		{
			$order_type="local";
			$order_typepre="L";
			
			
		}
		else
		{
			$order_type="International";
			$order_typepre="I";
		

		}


		//genrating order number accrding to segment
		$s="select order_no from orders where segment = '".$company."'";
        $q=mysqli_query($conn,$s); 
         $cou=mysqli_num_rows($q);
        
        if($cou>0)
        {
	        	$storeArray = array();
	         while($ro=mysqli_fetch_array($q)){
	                 array_push($storeArray,$ro['order_no']);
	         }
	         $largestNumber=(max($storeArray));
	         $orderid=$largestNumber+1;

        }
        elseif ($cou==0) {
        	

		$orderid=1;



        }
	





        $cy=date("Y");
       	
       	$po=$company."/".$cy."/".$order_typepre."/".$orderid;
		date_default_timezone_set("Asia/Karachi");
		$dateoforder =  date("j-n-Y") ;
		$status="Pending";

		 $msg="";
		 $qu1=0;
		 $qu2=0;
		 $qu3=0;
		 if( strlen($_FILES['q1']['name'])>0){
    	$q1 = $_FILES['q1']['name'];
    	$q1=$segment."_".$orderid."_".$q1;
    	$target1 = "../quotations/".basename($q1);
    	$qu1=1;
		}
		else
		{

			$q1="0";

		}


				 if( strlen($_FILES['q2']['name'])>0){
    	$q2 = $_FILES['q2']['name'];
    	$q2=$segment."__".$orderid."_".$q2;
    	$target2 = "../quotations/".basename($q2);
    	$qu2=1;
		}
		else
		{

			$q2="0";

		}


				 if( strlen($_FILES['q3']['name'])>0){
    	$q3 = $_FILES['q3']['name'];
    	$q3=$segment."___".$orderid."_".$q3;
    	$target3 = "../quotations/".basename($q3);
    	$qu3=1;
		}
		else
		{

			$q3="0";

		}

/*

 $result = mysqli_query($conn, "SELECT * FROM orders");
while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='../quotations/".$row['q1']."' >";
     
      echo "</div>";
    }

*/











		if($_POST['qty'][0]!=""){  
	$sql = "INSERT INTO orders (order_no,fullpo,requester_name,req_dep,dod,doo,message,status,segment,company,q1,q2,q3,ordertype,ot,drate,vendor,ds,pterm,ptr,rb)
	VALUES ('$orderid','$po','$Uname','$department','$dod','$dateoforder','$project','$status','$company','$segment','$q1','$q2','$q3','$order_type','$ot','$drate','$ven','$ds','$pterm','$ptr','$rb')";

	if ($conn->query($sql) === TRUE) {
	$ch = "INSERT INTO approval_chain (order_no,stk,m1,m1a)
	VALUES ('$po','ok','m1','r')";

	if ($conn->query($ch) === TRUE) {
	  //  echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $ch . "<br>" . $conn->error;
	}


	  //  echo "New record created successfully in ussssssssssssssssss";
	   // header("LOCATION:place_order.php");

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
if($qu1==1){
if (move_uploaded_file($_FILES['q1']['tmp_name'], $target1)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
}
if($qu2==1){
if (move_uploaded_file($_FILES['q2']['tmp_name'], $target2)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
}
if($qu3==1){
if (move_uploaded_file($_FILES['q3']['tmp_name'], $target3)) {
      $msg = "Image uploaded successfully";
    }else{
      $msg = "Failed to upload image";
    }
}


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
  		   $query = "INSERT INTO order_item_detail  (order_no,pname,pcode,pqty,unit,unitprice) VALUES";

  		     if($qj!="") {
                    $qj .= ",";
                }

  		   $qj.="('$po','" . $_POST["pname"][$i] . "', '" . $_POST["pcode"][$i] . "','" . $_POST["qty"][$i] . "','" . $_POST["unit"][$i] . "','" . $_POST["prize"][$i] . "')";
  		   $sq=$query.$qj;		
            $i++;
        }

if ($conn->query($sq) === TRUE) {
            	$flag=TRUE;
            	//echo "successfully";
              // echo " <meta http-equiv='refresh' content='0;URL='end_user_form.php' />";
               // echo "<meta http-equiv='refresh' content='3;url=end_user_form.php'>";
            } 
            else {
		    echo "Error: " . $sq . "<br>" . $conn->error;
		}

            if($flag==TRUE)
            {	session_start();
                $_SESSION['subsucc'] = "Your Request has been submitted Successfully.";
                header("LOCATION:definechain.php?sid=$po");

            }




			}
			else
		{
				session_start();
                $_SESSION['subsucc'] = "Please enter form correctly.";
                header("LOCATION:placeorder.php");
		}






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







   

