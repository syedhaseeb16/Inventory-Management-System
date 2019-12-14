<!doctype html>

<html><head>
<meta charset="utf-8">
<title>Inventory Management System</title>
</head>
<body>

 <?php		
$timers=time();
session_start();
$_SESSION["timer"]=$timers+2500;
//auto log out after 10 min of inactivity


//re login---------------
	 //Delete user  profile 
	if(isset($_GET['type']))
	{
$usertype_log=$_GET['type'];
if($usertype_log==0)
				{
				$_SESSION["type"]=0;
				header("LOCATION:admin/adminpanel.php");
		       	}
		else if($usertype_log==1)
				{
				$_SESSION["type"]=1;
				echo "this is enduser";
				header("LOCATION:enduser/enduser.php");
		       	}
			
		else if($usertype_log==2)
				{

				$_SESSION["type"]=2;
				header("LOCATION:supervisor/supervisor.php");
		       	}
		else if($usertype_log==3)
				{
				$_SESSION["type"]=3;
				header("LOCATION:storekeeper/storekeeper.php");
		       	}
		else if($usertype_log==4)
				{
				$_SESSION["type"]=4;
				header("LOCATION:Managerd/poip.php");
		       	}
		else if($usertype_log==5)
				{
				$_SESSION["type"]=5;
				header("LOCATION:ManagerM/poip.php");
		       	}
		else if($usertype_log==6)
				{
				$_SESSION["type"]=6;
				header("LOCATION:ManagerT/poip.php");
		       	}



	}


 	//----------------------------------------------------------------------------------------
	 //user login definition 
	if(isset($_POST['Login']))
	{ 
	$p=$_POST['password'];
	$uid=$_POST['u_id'];
	include('config.php');
	$s="select * from users";
	$q=mysqli_query($conn,$s); 
	$flag=0;
	    while($ro=mysqli_fetch_array($q)){
			if (($ro['User_Id']==$uid) && ($ro['User_Password']==$p)){
		  		//$usertype_log= $ro['User_Type'];

		  		$admin= $ro['admin'];
		  		$enduser= $ro['User_Type'];
		  		$supervisor= $ro['supervisor'];
		  		$storekeeper= $ro['storekeeper'];
		  		$managerd= $ro['managerd'];
		  		$managerm= $ro['managerm'];
		  		$managert= $ro['managert'];


				$flag=1; 
				//session_start();
				$_SESSION["id"]=$uid;

				$allrole=array($admin,$enduser,$supervisor,$storekeeper,$managerd,$managerm,$managert);
				$max=max($allrole);
				$usertype_log=$max;				
			}
  



		}
	
		
		if($flag==1){
			if($usertype_log==0)
				{
				$_SESSION["type"]=0;
				header("LOCATION:admin/adminpanel.php");
		       	}
		else if($usertype_log==1)
				{
				$_SESSION["type"]=1;
				echo "this is enduser";
				header("LOCATION:enduser/enduser.php");
		       	}
			
		else if($usertype_log==2)
				{

				$_SESSION["type"]=2;
				header("LOCATION:supervisor/supervisor.php");
		       	}
		else if($usertype_log==3)
				{
				$_SESSION["type"]=3;
				header("LOCATION:storekeeper/storekeeper.php");
		       	}
		else if($usertype_log==4)
				{
				$_SESSION["type"]=4;
				header("LOCATION:Managerd/poip.php");
		       	}
		else if($usertype_log==5)
				{
				$_SESSION["type"]=5;
				header("LOCATION:ManagerM/poip.php");
		       	}
		else if($usertype_log==6)
				{
				$_SESSION["type"]=6;
				header("LOCATION:ManagerT/poip.php");
		       	}
 
	       }
		elseif($flag==0){
		
		session_start();
		$_SESSION["error"]="Invalid User ID/Password";
		header("LOCATION:index.php");		
	}	
	
	} 
//----------------------------------------------------------------------------------------
	 //Delete user  profile 
	if(isset($_GET['del_profile']))
	{
		include('config.php');
		$del_profile=$_GET['del_profile'];
		$q="DELETE FROM users WHERE User_Email_Address='$del_profile'";
		$q=mysqli_query($conn,$q); 
		
		if($q)
	  	{
	  		if(($_GET['del_profile'])==($_SESSION["id"]))
	  		{
	  		session_start();
			$_SESSION["del_profile_same"]="Login Again.";
			header("LOCATION:index.php");
	  		}
	  		else
	  		{	
		    session_start();
			$_SESSION["del_profile_se"]="User Profile has been Successfully deleted.";
			header("LOCATION:admin/adminpanel.php");
			 }
		 }
	
	}
	//----------================================================================================
//user registration
	 	if(isset($_POST['userregistration']))
	{
	session_start();
	$user_name=$_POST['name'];
	$user_email=$_POST['email'];
	$user_id=$_POST['user_id'];
	$user_password=$_POST['password'];
	$user_segment=$_POST['segment'];

	$admin="n";
	$enduser="n";
	$supervisor="n";
	$storekeeper="n";
	$managerd ="n";
	$managerm ="n";
	$managert="n";



	foreach($_POST['usertype'] as $values)
	{
	if($values='0') 
	{
		$admin=$values;

	}
	if($values='1') 
		{
	$enduser=$values;
	}
	if($values='2') 
	{
	$supervisor=$values;
	}
	if($values='3') 
	{
		$storekeeper=$values;
	}
	if($values='4') 
	{
		$managerd=$values;
	}
	if($values='5') 
	{
	$managerm=$values;
	}
	if($values='6') 
	{
	$managert=$values;
	}

}
	$user_company=$_POST['company'];

		  include('config.php');
		  $s="select * from users";
		  $q=mysqli_query($conn,$s);
			$flag_ac_check=0;	
			while($ro=mysqli_fetch_array($q)){
			if (($ro['User_Email_Address']==$user_email) || ($ro['User_Id']==$user_id) )  {
				$flag_ac_check=1;
			}

		}
		if	($flag_ac_check==0)
		{
		//include('config.php');
		$query = "INSERT INTO users (User_Name,User_Email_Address,User_Password,admin,User_Type,supervisor,storekeeper,managerd,managerm,managert,User_Id,User_Segment,Company) VALUES('$user_name','$user_email','$user_password','$admin','$enduser','$supervisor','$storekeeper','$managerd','$managerm','$managert','$user_id','$user_segment','$user_company')";
    	$res = mysqli_query($conn,$query);
	    	 if ($res) {
		      	session_start();
		    	$_SESSION['userAdded'] = "User Successfully added";
				header("LOCATION:admin/adminpanel.php");
	    	 			}
	    }
    	else
    	{
    	session_start();
    	$_SESSION['email_exist'] = "Account  Already Exist with this Email ID. Try with other ID";
		header("LOCATION:admin/addnewuser.php");

    	}
 

		 }
	
//------------------------------------profile update
	//profile updation
		if(isset($_POST['profile_updation']))
		{
		include('config.php');
		$user_name=$_POST['name'];
		$user_id=$_POST['user_id'];
		$user_email=$_POST['email'];
		$user_password=$_POST['password'];
		$user_type=$_POST['type'];
		$user_segment=$_POST['segment'];
		$company=$_POST['company'];
		
		$updates_profile=$_GET['updateprofile'];


		$s="select * from users";
		$q=mysqli_query($conn,$s); 
		$match_found=0;
		    while($ro=mysqli_fetch_array($q))
		    {
				if (($ro['User_Email_Address']==$user_email)){
			  		$usertype_up= $ro['User_Type'];
					$match_found=1;
				}
			}

			If($match_found==1)
			{
			$q="UPDATE users SET User_Name='$user_name',User_Email_Address='$user_email',User_Password='$user_password', User_Type='$user_type' , User_Segment='$user_segment',User_Id='$user_id',Company='$company'   WHERE User_Email_Address='$updates_profile'";
			$q=mysqli_query($conn,$q); 

				if($user_type==0)
		  		{
				session_start();
				$_SESSION["Update_profile_se"]="User Profile has been Successfully updated.";
				header("LOCATION:admin/adminpanel.php");
				}
				else	
				session_start();
				$_SESSION["Update_profile_se"]="User Profile has been Successfully updated.";
				header("LOCATION:admin/adminpanel.php");
			}
			else if ($match_found==0) {
			session_start();
			$_SESSION["Update_error"]="User Profile has not updated";
			header("LOCATION:admin/adminpanel.php");
				
			}

		
		}	







//----------------------------------------------------------------------------------------
	 //Delete user  profile 
	if(isset($_GET['del_vendor']))
	{
		include('config.php');
		$del_vendor=$_GET['del_vendor'];
		$q="DELETE FROM vendor WHERE company_email='$del_vendor'";
		$q=mysqli_query($conn,$q); 
		
		if($q)
	  	{
	  	
		    session_start();
			$_SESSION["del_profile_se"]="vendor profile has been Successfully deleted.";
			header("LOCATION:storekeeper/vendor.php");
			 
		 }
		 else
		 {

	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	}
	//----------========


//====================
//user registration
	 	if(isset($_POST['vendorregistration']))
	{
	session_start();
	$cname=$_POST['cname'];
	$pname=$_POST['pname'];
	$cemail=$_POST['cemail'];
	$ccontact=$_POST['ccontact'];
	$caddress=$_POST['caddress'];
	$adarea=$_POST['cdarea'];

		  include('config.php');
		$query = "INSERT INTO vendor (company_name,person_name,company_email,contactno,address,deal_in) VALUES('$cname','$pname','$cemail','$ccontact','$caddress','$adarea')";
    	$res = mysqli_query($conn,$query);
	    	 if ($res) {
		      	session_start();
		    	$_SESSION['userAdded'] = "Vendor Successfully added";
				header("LOCATION:storekeeper/vendor.php");
	    	 			}
	    
    	else
    	{
    	
		header("LOCATION:storekeeper/vendor.php");

    	}
 

		 }
	//---------------------------------------------



//------------------------------------profile update
	//profile updation
		if(isset($_POST['vendor_profile_updation']))
		{
		include('config.php');
	$cname=$_POST['cname'];
	$pname=$_POST['pname'];
	$cemail=$_POST['cemail'];
	$ccontact=$_POST['ccontact'];
	$caddress=$_POST['caddress'];
	$adarea=$_POST['cdarea'];
		
	$updates_profile=$_GET['updateprofile'];

		
			$q="UPDATE vendor SET company_name='$cname',person_name='$pname',company_email='$cemail', contactno='$ccontact' , address='$caddress',deal_in='$adarea'   WHERE company_email='$updates_profile'";
				$q=mysqli_query($conn,$q); 


		if($q)
	  	{
	  	
		    session_start();
				$_SESSION["Update_profile_se"]="vendor Profile has been Successfully updated.";
				header("LOCATION:storekeeper/vendor.php");
			 
		 }
		 else
		 {

	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
				
		
		
		}	








//limits for manager 


		if(isset($_POST['limits']))
		{
		include('config.php');
	$lower=$_POST['lower'];
	$middle=$_POST['middle'];
	$upper=$_POST['upper'];
		

		
			$q="UPDATE limits SET ist='$lower',second='$middle',third='$upper'";
				$q=mysqli_query($conn,$q); 


			if($q)
	  	{
	  	
				session_start();
				$_SESSION["Update_profile_se"]="Limits set sussessfully.";
				header("LOCATION:admin/adminpanel.php");




			 
		 }
		 else
		 {

	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
				
				
		
		}	


//add new item
	 	if(isset($_POST['addnewitem']))
	{
		//echo "string";
	$pname=$_POST['pname'];
	$pcode=$_POST['pcode'];
	$pdis=$_POST['pdis'];
	$ploc=$_POST['ploc'];
	$minl=$_POST['minl'];
	$maxl=$_POST['maxl'];
	$punit=$_POST['punit'];


		  include('config.php');
		  $s="select * from current_state";
		  $q=mysqli_query($conn,$s);
			$flag_ac_check=0;	
			while($ro=mysqli_fetch_array($q)){
			if (($ro['item_name']==$pname) || ($ro['item_code']==$pcode) )  {
				session_start();
				$flag_ac_check=1;	
		    	$_SESSION['item_exist'] = "Item Already Exist with same Name or Code.";
				header("LOCATION:storekeeper/addnewitem.php");
			}

		}
	

		if ($flag_ac_check==0	){
		$query = "INSERT INTO current_state (item_name,item_code,unit,Discreption,loc_in_store,Min_Limit,Max_Limit) VALUES('$pname','$pcode','$punit','$pdis','$ploc','$minl','$maxl')";
		$query1 = "INSERT INTO current_state_wle (item_name,item_code,unit,Discreption,loc_in_store,Min_Limit,Max_Limit) VALUES('$pname','$pcode','$punit','$pdis','$ploc','$minl','$maxl')";
		$query2 = "INSERT INTO current_state_iwls (item_name,item_code,unit,Discreption,loc_in_store,Min_Limit,Max_Limit) VALUES('$pname','$pcode','$punit','$pdis','$ploc','$minl','$maxl')";




		mysqli_query($conn,$query1); 
		mysqli_query($conn,$query2); 


			if ($conn->query($query) === TRUE) {
			    
				      	session_start();
				    	$_SESSION['userAdded'] = "Prodcut Name added Successfully.";
						header("LOCATION:storekeeper/Inventory.php");
			   // header("LOCATION:place_order.php");

			} else {
			    echo "Error: " . $query . "<br>" . $conn->error;
			}














			}









	    	 			
    
    
		    //	echo "Error: " . $res . "<br>" . $conn->error;
		    	

    	}
 

		 
	





















	?>	 

</body>
</html>